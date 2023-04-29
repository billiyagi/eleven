<?php

class TypesProductModel extends Database
{
    protected $security;

    public function __construct()
    {
        parent::__construct();
        $this->security = new Security();
    }

    /** 
     * @method getAll
     * * Mengambil semua data tipe produk
     */
    public function getAll()
    {
        $getTypesProductStmt = $this->db->prepare("SELECT * FROM kategori_produk ORDER BY id DESC");
        $getTypesProductStmt->execute();

        return $getTypesProductStmt->fetchAll(PDO::FETCH_OBJ);
    }


    /** 
     * @method get
     * * Mengambil 1 data dari tipe produk
     */
    public function get($id)
    {
        $getTypesProductStmt = $this->db->prepare("SELECT * FROM kategori_produk WHERE id=:id");
        $getTypesProductStmt->bindParam(':id', $id);
        $getTypesProductStmt->execute();

        return $getTypesProductStmt->fetchObject();
    }

    public function create($type)
    {
        $updateValidation = $this->security->validation()->validate($type, [
            'name'              => 'required',
        ]);

        // Validation fail redirect
        if ($updateValidation->fails()) {
            setFlashValidation($updateValidation->errors()->firstOfAll());
            setFlashMessage('Kategori gagal ditambahkan', 'error');
            return header('Location: ' . BASE_URL_ADMIN . 'type/create.php');
        }

        $nama = $this->security->xss()->xss_clean($type['name']);

        $createTypeProductStmt = $this->db->prepare('INSERT INTO kategori_produk (nama) VALUES (:nama)');
        $createTypeProductStmt->bindParam(':nama', $nama);

        // Execute
        if ($createTypeProductStmt->execute()) {
            setFlashMessage('Kategori berhasil ditambahkan');
            return header('Location: ' . BASE_URL_ADMIN . 'type/index.php');
        } else {
            setFlashMessage('Kategori berhasil ditambahkan', 'error');
            return header('Location: ' . BASE_URL_ADMIN . 'type/index.php');
        }
    }

    public function update($type)
    {
        $updateValidation = $this->security->validation()->validate($type, [
            'name'              => 'required',
        ]);

        // Validation fail redirect
        if ($updateValidation->fails()) {
            setFlashValidation($updateValidation->errors()->firstOfAll());
            setFlashMessage('Kategori gagal diubah', 'error');
            return header('Location: ' . BASE_URL_ADMIN . 'type/create.php');
        }

        $nama = $this->security->xss()->xss_clean($type['name']);

        $createTypeProductStmt = $this->db->prepare('UPDATE kategori_produk SET nama=:nama WHERE id=:id');
        $createTypeProductStmt->bindParam(':nama', $nama);
        $createTypeProductStmt->bindParam(':id', $type['id']);

        // Execute
        if ($createTypeProductStmt->execute()) {
            setFlashMessage('Kategori berhasil diubah');
            return header('Location: ' . BASE_URL_ADMIN . 'type/index.php');
        } else {
            setFlashMessage('Kategori berhasil diubah', 'error');
            return header('Location: ' . BASE_URL_ADMIN . 'type/index.php');
        }
    }

    public function destroy($id)
    {
        /** 
         * Periksa apakah masih ada produk yang mengacu pada kategori yang ingin dihapus
         */
        $typeProductLinksStmt = $this->db->prepare("SELECT * FROM produk WHERE kategori_produk_id=:id");
        $typeProductLinksStmt->bindParam(':id', $id);
        $typeProductLinksStmt->execute();

        if (!empty($typeProductLinksStmt->fetchAll())) {
            setFlashMessage('Kategori masih digunakan', 'error');
            return header('Location: ' . BASE_URL_ADMIN . 'type/index.php');
        }


        $deleteTypeProductStmt = $this->db->prepare('DELETE FROM kategori_produk WHERE id = :id');
        $deleteTypeProductStmt->bindParam(':id', $id);

        // Execute
        if ($deleteTypeProductStmt->execute()) {
            setFlashMessage('Kategori berhasil dihapus');
            return header('Location: ' . BASE_URL_ADMIN . 'type/index.php');
        } else {
            setFlashMessage('Kategori berhasil dihapus', 'error');
            return header('Location: ' . BASE_URL_ADMIN . 'type/index.php');
        }
    }
}
