<?php

class OrdersModel extends Database
{
    protected $security, $userModel, $costumerAddress;

    public function __construct()
    {
        parent::__construct();
        $this->security = new Security();
        $this->userModel = new UsersModel();
        $this->costumerAddress = new CostumersAddressModel();
    }

    public function getTotalOrderPrice()
    {
        $getTotalOrderPriceStmt = $this->db->prepare('SELECT produk.nama ,pesanan.qty, produk.harga_jual, produk.harga_jual * pesanan.qty AS price_total FROM pesanan INNER JOIN produk ON produk.id = pesanan.produk_id');
        $getTotalOrderPriceStmt->execute();

        $orderPrice = 0;
        foreach ($getTotalOrderPriceStmt->fetchAll(PDO::FETCH_OBJ) as $order) {
            $orderPrice += $order->price_total;
        }

        return $orderPrice;
    }

    public function getAll()
    {
        $getAllStmt = $this->db->prepare('SELECT pesanan.id AS order_id, pesanan.kode, pesanan.tgl_pemesanan, pesanan.nama, pesanan.alamat, pesanan.no_hp, pesanan.email, pesanan.qty, pesanan.catatan, pesanan.ukuran AS order_size, produk.image, produk.nama AS product_name, produk.harga_jual FROM pesanan INNER JOIN produk ON produk.id = pesanan.produk_id ORDER BY pesanan.id DESC');
        $getAllStmt->execute();

        return $getAllStmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function get($orderId)
    {
        $getByUserLoginStmt = $this->db->prepare('SELECT pesanan.kode, pesanan.tgl_pemesanan, pesanan.nama, pesanan.alamat, pesanan.no_hp, pesanan.email, pesanan.qty, pesanan.catatan, pesanan.ukuran AS order_size, produk.image, produk.nama AS product_name, produk.harga_jual, pesanan.user_id FROM pesanan INNER JOIN produk ON produk.id = pesanan.produk_id WHERE pesanan.id=:order_id');
        $getByUserLoginStmt->bindParam(':order_id', $orderId);
        $getByUserLoginStmt->execute();

        return $getByUserLoginStmt->fetchObject();
    }

    public function getAllByUserLogin($userId)
    {
        $getAllByUserLoginStmt = $this->db->prepare('SELECT pesanan.id AS order_id, pesanan.kode, pesanan.tgl_pemesanan, pesanan.nama, pesanan.alamat, pesanan.no_hp, pesanan.email, pesanan.qty, pesanan.catatan, pesanan.ukuran AS order_size, produk.image, produk.nama AS product_name, produk.harga_jual FROM pesanan INNER JOIN produk ON produk.id = pesanan.produk_id WHERE pesanan.user_id=:user_id ORDER BY pesanan.id DESC');
        $getAllByUserLoginStmt->bindParam(':user_id', $userId);
        $getAllByUserLoginStmt->execute();

        return $getAllByUserLoginStmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getByUserLogin($userId, $orderId)
    {
        $getByUserLoginStmt = $this->db->prepare('SELECT pesanan.kode, pesanan.tgl_pemesanan, pesanan.nama, pesanan.alamat, pesanan.no_hp, pesanan.email, pesanan.qty, pesanan.catatan, pesanan.ukuran AS order_size, produk.image, produk.nama AS product_name, produk.harga_jual FROM pesanan INNER JOIN produk ON produk.id = pesanan.produk_id WHERE pesanan.user_id=:user_id AND pesanan.id=:order_id ORDER BY pesanan.id DESC');
        $getByUserLoginStmt->bindParam(':user_id', $userId);
        $getByUserLoginStmt->bindParam(':order_id', $orderId);
        $getByUserLoginStmt->execute();

        return $getByUserLoginStmt->fetchObject();
    }

    public function getUserOrderTotal($userId)
    {
        $getUserOrderTotal = $this->db->prepare('SELECT * FROM pesanan WHERE user_id=:user_id');
        $getUserOrderTotal->bindParam(':user_id', $userId);
        $getUserOrderTotal->execute();

        return $getUserOrderTotal->rowCount();
    }

    public function create($order)
    {
        // Validation
        $orderCreateValidation = $this->security->validation()->validate($order, [
            'size' => 'required',
            'phone' => 'required',
            'qty' => 'required',
        ]);

        if ($orderCreateValidation->fails()) {
            if ($orderCreateValidation->errors()->firstOfAll()['size']) {
                setFlashMessage('Pemesanan gagal, Ukuran Belum ditentukan', 'error', 'Mohon lakukan transaksi ulang.');
            } elseif ($orderCreateValidation->errors()->firstOfAll()['phone']) {
                setFlashMessage('Pemesanan gagal, Ukuran Belum ditentukan', 'error', 'Mohon lakukan transaksi ulang.');
            } elseif ($orderCreateValidation->errors()->firstOfAll()['qty']) {
                setFlashMessage('Pemesanan gagal, Ukuran Belum ditentukan', 'error', 'Mohon lakukan transaksi ulang.');
            } else {
                setFlashMessage('Pemesanan gagal, Alamat belum dibuat', 'error', 'Mohon lakukan transaksi ulang.');
            }
            header('Location: ' . BASE_URL_LANDING . 'product.php?id=' . $order['product_id']);
        }

        if (empty($this->costumerAddress->getByUserID($_SESSION['userEleven']['id'])->address)) {
            setFlashMessage('Pemesanan gagal, Alamat belum dibuat', 'error', 'Mohon lakukan transaksi ulang.');
            // header('Location: ' . BASE_URL_LANDING . 'product.php?id=' . $order['product_id']);
        }

        $orderDate = date('Y-m-d H:i:s', time());
        $userEmail = $_SESSION['userEleven']['email'];
        $code = 'ODL-' . strtoupper(substr(uniqid(), 7, 10));
        $userId = $_SESSION['userEleven']['id'];
        $orderSize = $this->security->xss()->xss_clean($_POST['size']);
        $orderQty = $this->security->xss()->xss_clean($_POST['qty']);
        $orderNote = $this->security->xss()->xss_clean($_POST['note']);
        $phoneNumber = $this->security->xss()->xss_clean($_POST['phone']);
        $userAddress = $this->userModel->get($_SESSION['userEleven']['id']);
        $productId = $this->security->xss()->xss_clean($_POST['product_id']);
        $userAddress = $this->costumerAddress->getByUserID($_SESSION['userEleven']['id'])->address;
        $userFullName = $_SESSION['userEleven']['first_name'] . ' ' . $_SESSION['userEleven']['last_name'];


        $createOrdersStmt = $this->db->prepare('INSERT INTO pesanan (kode, tgl_pemesanan, nama, alamat, no_hp, email, qty, catatan, ukuran, produk_id, user_id) VALUES (:kode, :tgl_pemesanan, :nama, :alamat, :no_hp, :email, :qty, :catatan, :ukuran, :produk_id, :user_id)');

        $createOrdersStmt->bindParam(':kode', $code);
        $createOrdersStmt->bindParam(':tgl_pemesanan', $orderDate);
        $createOrdersStmt->bindParam(':nama', $userFullName);
        $createOrdersStmt->bindParam(':alamat', $userAddress);
        $createOrdersStmt->bindParam(':no_hp', $phoneNumber);
        $createOrdersStmt->bindParam(':email', $userEmail);
        $createOrdersStmt->bindParam(':qty', $orderQty);
        $createOrdersStmt->bindParam(':catatan', $orderNote);
        $createOrdersStmt->bindParam(':ukuran', $orderSize);
        $createOrdersStmt->bindParam(':produk_id', $productId);
        $createOrdersStmt->bindParam(':user_id', $userId);

        if ($createOrdersStmt->execute()) {
            setFlashMessage('Pemesanan berhasil', 'success', 'Lihat di menu pemesanan untuk melihat detail transaksi.');
            // return header('Location: ' . BASE_URL_CLIENT . 'index.php');
        } else {
            setFlashMessage('Pemesanan gagal', 'error', 'Mohon lakukan transaksi ulang.');
            // header('Location: ' . BASE_URL_LANDING . 'product.php?id=' . $order['product_id']);
        }
    }
}
