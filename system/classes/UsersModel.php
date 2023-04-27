<?php


class UsersModel extends Database
{
    protected $security;

    public function __construct()
    {
        parent::__construct();
        $this->security = new Security();
    }

    /** 
     * Mengambil data 1 pengguna
     */
    public function getUser($id)
    {
        $getUserStmt = $this->db->prepare('SELECT * FROM users WHERE id=:id');
        $getUserStmt->bindParam(':id', $id);
        $getUserStmt->execute();

        return $getUserStmt->fetchObject();
    }


    /** 
     * Temukan pengguna dengan username
     */
    public function getUserByUsername($username)
    {
        $getUserStmt = $this->db->prepare('SELECT * FROM users WHERE username=:username');
        $getUserStmt->bindParam(':username', $username);
        $getUserStmt->execute();

        return $getUserStmt->fetchObject();
    }


    /** 
     * Termukan pengguna dengan Email
     */
    public function getUserByEmail($email)
    {
        $getUserStmt = $this->db->prepare('SELECT * FROM users WHERE email=:email');
        $getUserStmt->bindParam(':email', $email);
        $getUserStmt->execute();

        return $getUserStmt->fetchObject();
    }

    /** 
     * @method insertUser()
     * Menambahkan pengguna
     * 
     * @param array $user|boolean $json
     * @return void json|boolean
     */
    public function insertUser(array $user, $json = false)
    {
        $this->security->validation()->setMessages([
            'required'
        ]);

        $userInsertValidation = $this->security->validation()->validate($user, [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email',
        ]);

        // echo json_encode($userInsertValidation->errors());

        if ($userInsertValidation->fails()) {
            // echo $userInsertValidation->fails();
            if ($json) {
                return json_encode([
                    'first_name' => $userInsertValidation->errors()->first('first_name'),
                    'last_name' => $userInsertValidation->errors()->first('last_name'),
                    'email' => $userInsertValidation->errors()->first('email'),
                    'username' => $userInsertValidation->errors()->first('username'),
                    'password' => $userInsertValidation->errors()->first('password'),
                ]);
                die();
            } else {
                return $userInsertValidation->errors()->toArray();
            }
        }

        // Users Data
        $first_name = $this->security->xss()->xss_clean($user['first_name']);
        $last_name = $this->security->xss()->xss_clean($user['last_name']);
        $username = $this->security->xss()->xss_clean($user['username']);
        $password = password_hash($user['password'], PASSWORD_DEFAULT);
        $email = $this->security->xss()->xss_clean($user['email']);

        // Insert User Statements
        $insertUserStmt = $this->db->prepare('INSERT INTO users (first_name, last_name, username, email, password) VALUES (:first_name, :last_name, :username, :email, :password)');

        // User Insert Data Binding
        $insertUserStmt->bindParam(':first_name', $first_name);
        $insertUserStmt->bindParam(':last_name', $last_name);
        $insertUserStmt->bindParam(':username', $username);
        $insertUserStmt->bindParam(':email', $email);
        $insertUserStmt->bindParam(':password', $password);


        /** 
         * Periksa duplicated user
         */
        if ($json) {
            if (!$this->getUserByUsername($username)) {
                if ($insertUserStmt->execute()) {
                    return json_encode(['status' => 'success']);
                } else {
                    return json_encode(['status' => 'error']);
                }
            } else {
                return json_encode(['status' => 'failed', 'message' => "Username $username telah digunakan."]);
            }
        } else {
            if (!$this->getUserByUsername($username)) {
                return $insertUserStmt->execute();
            }
        }
    }
}
