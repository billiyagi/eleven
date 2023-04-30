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

    public function create($order)
    {
        // Validation
        $orderCreateValidation = $this->security->validation()->validate($order, [
            'size' => 'required',
            'phone' => 'required',
            'qty' => 'required',
        ]);

        if ($orderCreateValidation->fails()) {
            setFlashValidation($orderCreateValidation->errors()->firstOfAll());
            header('Location: ' . BASE_URL_LANDING . 'product.php?id=' . $order['product_id']);
        }

        $orderDate = date('Y-m-d H:i:s', time());
        $userEmail = $_SESSION['userEleven']['email'];
        $code = 'ORD/EL-' . strtoupper(substr(uniqid(), 6, 10));
        $orderQty = $this->security->xss()->xss_clean($_POST['qty']);
        $orderNote = $this->security->xss()->xss_clean($_POST['note']);
        $phoneNumber = $this->security->xss()->xss_clean($_POST['phone']);
        $userAddress = $this->userModel->get($_SESSION['userEleven']['id']);
        $productId = $this->security->xss()->xss_clean($_POST['product_id']);
        $userAddress = $this->costumerAddress->getByUserID($_SESSION['userEleven']['id']);
        $userFullName = $_SESSION['userEleven']['first_name'] . ' ' . $_SESSION['userEleven']['last_name'];

        die(var_dump($order));


        $createOrdersStmt = $this->db->prepare('INSERT INTO pesanan (kode, tgl_pemesanan, nama, alamat, no_hp, email, qty, catatan, ukuran, produk_id) VALUES (:kode, :tgl_pemesanan, :nama, :alamat, :no_hp, :email, :qty, :catatan, :ukuran, :produk_id)');

        if($createOrdersStmt->execute())
        {

        } else {
            
        }
    }
}
