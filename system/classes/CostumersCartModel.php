<?php

class CostumersCartModel extends Database
{
    protected $security, $usersModel;

    public function __construct()
    {
        parent::__construct();
        $this->security = new Security();
        $this->usersModel = new UsersModel();
    }

    public function getAllByUserLogin($user_id)
    {
        $getAllCostumerUserLogin = $this->db->prepare('SELECT produk.id, produk.kode, produk.nama, produk.harga_jual, produk.image, costumer_carts.produk_id FROM costumer_carts INNER JOIN produk ON costumer_carts.produk_id = produk.id WHERE costumer_carts.produk_id = produk.id AND costumer_carts.user_id =:user_id ORDER BY costumer_carts.id DESC');
        $getAllCostumerUserLogin->bindParam(':user_id', $user_id);
        $getAllCostumerUserLogin->execute();
        return $getAllCostumerUserLogin->fetchAll(PDO::FETCH_OBJ);
    }

    public function get(array $cart)
    {
        $getCostumerCartStmt = $this->db->prepare('SELECT * FROM costumer_carts WHERE produk_id=:product_id AND user_id=:user_id');
        $getCostumerCartStmt->bindParam(':product_id', $cart['product_id']);
        $getCostumerCartStmt->bindParam(':user_id', $cart['user_id']);
        $getCostumerCartStmt->execute();

        return $getCostumerCartStmt->fetchObject();
    }

    public function getCostumerTotalCart($id)
    {
        $getCostumerTotalCart = $this->db->prepare('SELECT COUNT(*) AS total FROM costumer_carts WHERE user_id=:id');
        $getCostumerTotalCart->bindParam(':id', $id);
        $getCostumerTotalCart->execute();
        return $getCostumerTotalCart->fetchObject();
    }

    public function create($cart)
    {
        $createCostumerCartStmt = $this->db->prepare('INSERT INTO costumer_carts (produk_id, user_id) VALUES (:product_id, :user_id)');
        $createCostumerCartStmt->bindParam(':product_id', $cart['product_id']);
        $createCostumerCartStmt->bindParam(':user_id', $cart['user_id']);

        $createCostumerCartStmt->execute();
        return header('Location: ' . BASE_URL_LANDING . 'product.php?id=' . $cart['product_id']);
    }

    public function isProductSavedToCart($cart_id, $user_id)
    {
        $productSavedCartStmt = $this->db->prepare('SELECT * FROM costumer_carts WHERE produk_id=:product_id AND user_id=:user_id');
        $productSavedCartStmt->bindParam(':product_id', $cart_id);
        $productSavedCartStmt->bindParam(':user_id', $user_id);

        $productSavedCartStmt->execute();

        return (empty($productSavedCartStmt->fetchObject())) ? false : true;
    }

    public function destroy($cart, $client = false)
    {
        $deleteCostumerCartStmt = $this->db->prepare('DELETE FROM costumer_carts WHERE produk_id=:product_id AND user_id=:user_id');
        $deleteCostumerCartStmt->bindParam(':user_id', $cart['user_id']);
        $deleteCostumerCartStmt->bindParam(':product_id', $cart['product_id']);

        $deleteCostumerCartStmt->execute();

        if ($client) {
            return header('Location: ' . BASE_URL_CLIENT . 'cart.php');
        } else {
            return header('Location: ' . BASE_URL_LANDING . 'product.php?id=' . $cart['product_id']);
        }
    }
}
