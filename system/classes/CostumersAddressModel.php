<?php


class CostumersAddressModel extends Database
{
    protected $security, $usersModel;

    public function __construct()
    {
        parent::__construct();
        $this->security = new Security();
        $this->usersModel = new UsersModel();
    }

    public function get($id)
    {
        $getCostumerAddressStmt = $this->db->prepare("SELECT * FROM costumer_address WHERE id =:id");
        $getCostumerAddressStmt->bindParam(':id', $id);
        $getCostumerAddressStmt->execute();

        return $getCostumerAddressStmt->fetchObject();
    }

    public function getByUserID($userID)
    {
        $getCostumerAddressStmt = $this->db->prepare("SELECT * FROM costumer_address WHERE user_id =:user_id");
        $getCostumerAddressStmt->bindParam(':user_id', $userID);
        $getCostumerAddressStmt->execute();

        return $getCostumerAddressStmt->fetchObject();
    }

    public function getAll()
    {
    }

    public function create($address)
    {
        $createAddressValidation = $this->security->validation()->validate($address, [
            'address' => 'required',
        ]);

        if ($createAddressValidation->fails()) {
            setFlashValidation($createAddressValidation->errors()->firstOfAll());
            return header('Location: ' . URL_CLIENT . 'settings.php');
        }

        $createAddressStmt = $this->db->prepare("INSERT INTO costumer_address (user_id, address) VALUES (:user_id, :address)");
        $createAddressStmt->bindParam(':user_id', $address['id']);
        $createAddressStmt->bindParam(':address', $address['address']);

        if ($createAddressStmt->execute()) {
            setFlashMessage('Alamat berhasil ditambahkan');
            return header('Location: ' . URL_CLIENT . 'settings.php');
        } else {
            setFlashMessage('Alamat gagal ditambahkan');
            return header('Location: ' . URL_CLIENT . 'settings.php');
        }
    }

    public function update($address)
    {
        $createAddressValidation = $this->security->validation()->validate($address, [
            'address' => 'required',
        ]);

        if ($createAddressValidation->fails()) {
            setFlashValidation($createAddressValidation->errors()->firstOfAll());
            return header('Location: ' . URL_CLIENT . 'settings.php');
        }

        $createAddressStmt = $this->db->prepare("UPDATE costumer_address SET address=:address WHERE user_id=:user_id");
        $createAddressStmt->bindParam(':user_id', $address['id']);
        $createAddressStmt->bindParam(':address', $address['address']);

        if ($createAddressStmt->execute()) {
            setFlashMessage('Alamat berhasil diubah');
            return header('Location: ' . URL_CLIENT . 'settings.php');
        } else {
            setFlashMessage('Alamat gagal diubah');
            return header('Location: ' . URL_CLIENT . 'settings.php');
        }
    }

    public function isUserHaveAddress($userId)
    {
        $searchUserAddress = $this->db->prepare('SELECT * FROM costumer_address WHERE user_id =:id');
        $searchUserAddress->bindParam(':id', $userId);
        $searchUserAddress->execute();

        return $searchUserAddress->fetchObject();
    }
}
