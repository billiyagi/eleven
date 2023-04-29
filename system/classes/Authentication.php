<?php

class Authentication extends Database
{
    protected $security, $userModel;

    public function __construct()
    {
        parent::__construct();
        $this->security = new Security();
        $this->userModel = new UsersModel();
    }

    public function setUserSession($user)
    {
        $_SESSION['userEleven'] = [
            'id'    =>  $user->ID,
            'username' => $user->username,
            'email' => $user->email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'role'  => $user->role_id
        ];
    }

    public function destroyUserSession()
    {
        session_unset();
        session_destroy();
    }

    public function logout()
    {
        $this->destroyUserSession();

        return header('Location: ' . BASE_URL_LANDING);
    }

    public function login()
    {
        /** 
         * Data login tamu
         */

        $email = $_POST['email'];
        $password = $_POST['password'];

        /** 
         * Data pengguna jika ditemukan
         */
        $user = $this->userModel->getUserByEmail($email);

        /** 
         * Termukan pengguna
         */
        if (!$user) {
            echo json_encode(['status' => 'error', 'message' => 'Email/password salah.']);
            return;
        }

        // Tambahkan terakhir kali login


        /** 
         * Verivikasi password
         */
        if (!password_verify($password, $user->password)) {
            // Feedback
            echo json_encode(['status' => 'error', 'message' => 'Email/password salah.']);
        } else {

            if ($user->status_activation == 0) {
                echo json_encode(['status' => 'warning', 'message' => 'Akun belum aktif.']);
                return;
            }

            // buat Sesi user
            $this->setUserSession($user);

            // Feedback
            echo json_encode(['status' => 'success', 'message' => 'Login berhasil.', 'role' => $user->role_id]);
        }
        return;
    }
}
