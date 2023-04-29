<?php

class ProductsModel extends Database
{
    protected $security;

    public function __construct()
    {
        parent::__construct();
        $this->security = new Security();
    }


    /** 
     * @method getAll
     * * Mengambil semua data produk
     */
    public function getAll()
    {
        $getProductsStmt = $this->db->prepare("SELECT produk.id, produk.kode, produk.nama, produk.harga_jual, produk.harga_beli, produk.stok, produk.min_stok, produk.deskripsi, produk.ukuran, produk.image, kategori_produk.nama AS tipe FROM produk INNER JOIN kategori_produk ON produk.kategori_produk_id = kategori_produk.id ORDER BY produk.id DESC");

        $getProductsStmt->execute();
        $getProducts = $getProductsStmt->fetchAll(PDO::FETCH_OBJ);

        return $getProducts;
    }


    /** 
     * @method get
     * * Mengambil 1 data produk
     */
    public function get($id)
    {
        $getProductStmt = $this->db->prepare("SELECT produk.id, produk.kode, produk.nama, produk.harga_jual, produk.harga_beli, produk.stok, produk.min_stok, produk.deskripsi, produk.ukuran, produk.image, kategori_produk.nama AS tipe, kategori_produk.id AS kategori_id FROM produk INNER JOIN kategori_produk ON produk.kategori_produk_id = kategori_produk.id WHERE produk.id=:id");

        $getProductStmt->bindParam(':id', $id);
        $getProductStmt->execute();

        return $getProductStmt->fetchObject();
    }

    public function create($product, $file)
    {
        // Validation Rules
        $createValidation = $this->security->validation()->validate($product + $file, [
            'name'              => 'required',
            'sale_price'        => 'required',
            'purchase_price'    => 'required',
            'stok'              => 'required|numeric',
            'stok_minimal'      => 'required|numeric',
            'description'       => 'required',
            'thumbnail'         => 'required|uploaded_file:0,1000K,png,jpeg',
            'category_id'       => 'required|numeric',
            'size'              => 'required'

        ]);

        // Validation fail redirect
        if ($createValidation->fails()) {
            setFlashValidation($createValidation->errors()->firstOfAll());
            setFlashMessage('Produk gagal ditambahkan', 'error');
            return header('Location: ' . BASE_URL_ADMIN . 'products/create.php');
        }

        // Buat Kode barang
        $code = 'EL-' . strtoupper(substr(uniqid(), 6, 10));

        // Acak nama file
        $fileNameAndExtension = explode('.', $file['thumbnail']['name']);
        $fileExtension = end($fileNameAndExtension);
        $fileName = uniqid();

        $imageName = $fileName . '.' . $fileExtension;
        $imageTemp = $file['thumbnail']['tmp_name'];


        // Kueri Tambah Produk
        $createProductStmt = $this->db->prepare("INSERT INTO produk (kode,nama,harga_jual,harga_beli,stok,min_stok,deskripsi,kategori_produk_id,ukuran,image) VALUES (:kode,:nama,:harga_jual,:harga_beli,:stok,:min_stok,:deskripsi,:kategori_produk_id,:ukuran,:image)");


        // Filter data from XSS Attack
        $name = $this->security->xss()->xss_clean($product['name']);
        $salePrice = $this->security->xss()->xss_clean($product['sale_price']);
        $purchasePrice = $this->security->xss()->xss_clean($product['purchase_price']);
        $stok = $this->security->xss()->xss_clean($product['stok']);
        $stokMinimal = $this->security->xss()->xss_clean($product['stok_minimal']);
        $description = $this->security->xss()->xss_clean($product['description']);
        $categoryId = $this->security->xss()->xss_clean($product['category_id']);
        $size = $this->security->xss()->xss_clean($product['size']);

        // Binding data produk
        $createProductStmt->bindParam(':kode', $code);
        $createProductStmt->bindParam(':nama', $name);
        $createProductStmt->bindParam(':harga_jual', $salePrice);
        $createProductStmt->bindParam(':harga_beli', $purchasePrice);
        $createProductStmt->bindParam(':stok', $stok);
        $createProductStmt->bindParam(':min_stok', $stokMinimal);
        $createProductStmt->bindParam(':deskripsi', $description);
        $createProductStmt->bindParam(':kategori_produk_id', $categoryId);
        $createProductStmt->bindParam(':ukuran', $size);
        $createProductStmt->bindParam(':image', $imageName);

        // Pindahkan File
        move_uploaded_file($imageTemp, '../assets/uploads/' . $imageName);

        // Execute
        if ($createProductStmt->execute()) {
            setFlashMessage('Produk berhasil ditambahkan');
            return header('Location: ' . BASE_URL_ADMIN . 'products.php');
        } else {
            setFlashMessage('Produk berhasil ditambahkan', 'error');
            return header('Location: ' . BASE_URL_ADMIN . 'products/create.php');
        }
    }

    public function update($product, $file)
    {
        // Validation Rules
        $updateValidation = $this->security->validation()->validate($product + $file, [
            'name'              => 'required',
            'sale_price'        => 'required',
            'purchase_price'    => 'required',
            'stok'              => 'required|numeric',
            'stok_minimal'      => 'required|numeric',
            'description'       => 'required',
            'thumbnail'         => 'uploaded_file:0,1000K,png,jpeg',
            'category_id'       => 'required|numeric',
            'size'              => 'required'

        ]);

        // Validation fail redirect
        if ($updateValidation->fails()) {
            setFlashValidation($updateValidation->errors()->firstOfAll());
            setFlashMessage('Produk gagal diubah', 'error');
            return header('Location: ' . BASE_URL_ADMIN . 'products/update.php?id=' . $product['id']);
        }

        // Buat Kode barang
        $code = 'EL-' . strtoupper(substr(uniqid(), 6, 10));

        /** 
         * buat nama file baru ketika file thumbnail diganti
         */
        if ($file['thumbnail']['error'] != 4) {
            // Acak nama file
            $fileNameAndExtension = explode('.', $file['thumbnail']['name']);
            $fileExtension = end($fileNameAndExtension);
            $fileName = uniqid();

            $imageName = $fileName . '.' . $fileExtension;
            $imageTemp = $file['thumbnail']['tmp_name'];
            $imageOld = $this->get($product['id'])->image;
        } else {
            $imageName = $this->get($product['id'])->image;
        }


        // Kueri Tambah Produk
        $updateProductStmt = $this->db->prepare("UPDATE produk SET kode=:kode,nama=:nama,harga_jual=:harga_jual,harga_beli=:harga_beli,stok=:stok,min_stok=:min_stok,deskripsi=:deskripsi,kategori_produk_id=:kategori_produk_id,ukuran=:ukuran,image=:image WHERE id=:id");


        // Filter data from XSS Attack
        $name = $this->security->xss()->xss_clean($product['name']);
        $salePrice = $this->security->xss()->xss_clean($product['sale_price']);
        $purchasePrice = $this->security->xss()->xss_clean($product['purchase_price']);
        $stok = $this->security->xss()->xss_clean($product['stok']);
        $stokMinimal = $this->security->xss()->xss_clean($product['stok_minimal']);
        $description = $this->security->xss()->xss_clean($product['description']);
        $categoryId = $this->security->xss()->xss_clean($product['category_id']);
        $size = $this->security->xss()->xss_clean($product['size']);

        // Binding data produk
        $updateProductStmt->bindParam(':kode', $code);
        $updateProductStmt->bindParam(':nama', $name);
        $updateProductStmt->bindParam(':harga_jual', $salePrice);
        $updateProductStmt->bindParam(':harga_beli', $purchasePrice);
        $updateProductStmt->bindParam(':stok', $stok);
        $updateProductStmt->bindParam(':min_stok', $stokMinimal);
        $updateProductStmt->bindParam(':deskripsi', $description);
        $updateProductStmt->bindParam(':kategori_produk_id', $categoryId);
        $updateProductStmt->bindParam(':ukuran', $size);
        $updateProductStmt->bindParam(':image', $imageName);
        $updateProductStmt->bindParam(':id', $product['id']);


        /** 
         * Hanya pindahkan file ketika thumbnailnya diganti
         */
        if ($file['thumbnail']['error'] != 4) {
            // Pindahkan File
            move_uploaded_file($imageTemp, '../assets/uploads/' . $imageName);
            unlink('../assets/uploads/' . $imageOld);
        }

        // Execute
        if ($updateProductStmt->execute()) {
            setFlashMessage('Produk berhasil diubah');
            return header('Location: ' . BASE_URL_ADMIN . 'products.php');
        } else {
            setFlashMessage('Produk berhasil diubah', 'error');
            return header('Location: ' . BASE_URL_ADMIN . 'products/update.php?id=' . $product['id']);
        }
    }

    public function destroy($product)
    {
        // Validation rules
        $createValidation = $this->security->validation()->validate($product, [
            'id'              => 'required|numeric',
        ]);

        // Validation redirect
        if ($createValidation->fails()) {
            setFlashMessage('Data gagal dihapus', 'error');
            return header('Location: ' . BASE_URL_ADMIN . 'products.php');
        }

        $id = $product['id'];

        // Image File
        $productImage = $this->get($id)->image;

        // Delete Image File
        unlink('../assets/uploads/' . $productImage);

        // Delete Query
        $deleteProductStmt = $this->db->prepare("DELETE FROM produk WHERE id = :id");
        $deleteProductStmt->bindParam(':id', $id);

        // Execute
        if ($deleteProductStmt->execute()) {
            setFlashMessage('Data berhasil dihapus');
            header('Location: ' . BASE_URL_ADMIN . 'products.php');
        } else {
            setFlashMessage('Data gagal dihapus', 'error');
            header('Location: ' . BASE_URL_ADMIN . 'products.php');
        }
    }
}
