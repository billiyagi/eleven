<?php


class UsersModel extends Database
{
    protected $security;

    public function __construct()
    {
        parent::__construct();
        $this->security = new Security();
    }

    public function getAll()
    {
        $getUsersStmt = $this->db->prepare('SELECT users.ID, users.first_name, users.last_name, users.username, users.email, users.password, users.last_login, users.status_activation, users.created_at, user_roles.role AS previlege FROM users INNER JOIN user_roles ON users.role_id=user_roles.id ORDER BY ID DESC');
        $getUsersStmt->execute();

        return $getUsersStmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllByRoleAdmin()
    {
        $getUsersStmt = $this->db->prepare('SELECT users.ID, users.first_name, users.last_name, users.username, users.email, users.password, users.last_login, users.status_activation, users.created_at, user_roles.role AS previlege FROM users INNER JOIN user_roles ON users.role_id=user_roles.id WHERE role_id=1 ORDER BY ID DESC');
        $getUsersStmt->execute();

        return $getUsersStmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllByRoleCostumer()
    {
        $getUsersStmt = $this->db->prepare('SELECT users.ID, users.first_name, users.last_name, users.username, users.email, users.password, users.last_login, users.status_activation, users.created_at, user_roles.role AS previlege FROM users INNER JOIN user_roles ON users.role_id=user_roles.id WHERE role_id=2 ORDER BY ID DESC');
        $getUsersStmt->execute();

        return $getUsersStmt->fetchAll(PDO::FETCH_OBJ);
    }

    /** 
     * Mengambil data 1 pengguna
     */
    public function get($id)
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
     * @method create()
     * Menambahkan pengguna
     * 
     * @param array $user|boolean $json
     * @return void json|boolean
     */
    public function create(array $user, $json = false)
    {

        $userInsertValidation = $this->security->validation()->validate($user, [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email',
        ]);

        if ($userInsertValidation->fails()) {
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
                return $userInsertValidation->errors()->firstOfAll();
            }
        }

        // Users Data
        $firstName = $this->security->xss()->xss_clean($user['first_name']);
        $lastName = $this->security->xss()->xss_clean($user['last_name']);
        $username = $this->security->xss()->xss_clean($user['username']);
        $password = password_hash($user['password'], PASSWORD_DEFAULT);
        $email = $this->security->xss()->xss_clean($user['email']);
        $role = (isset($user['role'])) ? $user['role'] : 2;

        // Insert User Statements
        $insertUserStmt = $this->db->prepare('INSERT INTO users (first_name, last_name, username, email, password, role_id, status_activation) VALUES (:first_name, :last_name, :username, :email, :password, :role_id, :status_activation)');

        // User Insert Data Binding
        $insertUserStmt->bindParam(':first_name', $firstName);
        $insertUserStmt->bindParam(':last_name', $lastName);
        $insertUserStmt->bindParam(':username', $username);
        $insertUserStmt->bindParam(':email', $email);
        $insertUserStmt->bindParam(':password', $password);
        $insertUserStmt->bindParam(':role_id', $role);

        if ($json) {
            $status = 1;
            $insertUserStmt->bindParam(':status_activation', $status);
        } else {
            $status = 0;
            $insertUserStmt->bindParam(':status_activation', $status);
        }

        /** 
         * Periksa duplicated user
         */

        // Periksa data return yang diminta json atau boolean
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

            // 
        } else {
            if (!$this->getUserByUsername($username)) {
                if ($insertUserStmt->execute()) {
                    setFlashMessage('Pengguna berhasil dibuat');
                    return header('Location: ' . BASE_URL_ADMIN . 'users.php');
                } else {
                    setFlashMessage('Pengguna gagal dibuat');
                    return header('Location: ' . BASE_URL_ADMIN . 'users.php');
                }
            }
        }
    }

    public function update($user, $isEditRole = false, $costumer = false)
    {
        $userUpdateValidation = $this->security->validation()->validate($user, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
        ]);

        if ($userUpdateValidation->fails()) {
            if ($costumer) {
                setFlashValidation($userUpdateValidation->errors()->firstOfAll());
                return header('Location: ' . URL_CLIENT . 'settings.php');
            } else {
                setFlashValidation($userUpdateValidation->errors()->firstOfAll());
                return header('Location: ' . BASE_URL_ADMIN . 'users/update.php?id=' . $user['id']);
            }
        }

        // Periksa edit role di izinkan
        if (!$isEditRole) {
            $roleId = $this->get($user['id'])->role_id;
        } else {
            $roleId = $user['role'];
        }

        // Periksa ganti password
        if (empty($user['password'])) {
            $password = $this->get($user['id'])->password;
        } else {
            $password = $this->security->xss()->xss_clean($user['password']);
        }

        $firstName = $this->security->xss()->xss_clean($user['first_name']);
        $lastName = $this->security->xss()->xss_clean($user['last_name']);
        $email = $this->security->xss()->xss_clean($user['email']);


        $userUpdateStmt = $this->db->prepare("UPDATE users SET first_name=:first_name, last_name=:last_name, email=:email, password=:password, role_id=:role_id WHERE id=:id");

        $userUpdateStmt->bindParam(':first_name', $firstName);
        $userUpdateStmt->bindParam(':last_name', $lastName);
        $userUpdateStmt->bindParam(':email', $email);
        $userUpdateStmt->bindParam(':password', $password);
        $userUpdateStmt->bindParam(':role_id', $roleId);
        $userUpdateStmt->bindParam(':id', $user['id']);


        if ($userUpdateStmt->execute()) {
            if ($costumer) {
                setFlashMessage('Pengguna berhasil diubah', 'success', 'Login ulang untuk melihat perubahan');
                return header('Location: ' . URL_CLIENT . 'settings.php');
            } else {
                setFlashMessage('Pengguna berhasil diubah', 'success', 'Login ulang untuk melihat perubahan');
                return header('Location: ' . BASE_URL_ADMIN . 'users.php');
            }
        } else {
            if ($costumer) {
                setFlashMessage('Pengguna gagal diubah');
                return header('Location: ' . URL_CLIENT . 'settings.php');
            } else {
                setFlashMessage('Pengguna gagal diubah');
                return header('Location: ' . BASE_URL_ADMIN . 'users.php');
            }
        }
    }

    public function destroy($id)
    {
        $userDeleteStmt = $this->db->prepare("DELETE FROM users WHERE id =:id");
        $userDeleteStmt->bindParam(':id', $id);

        if ($userDeleteStmt->execute()) {
            setFlashMessage('Pengguna berhasil dihapus');
            return header('Location: ' . BASE_URL_ADMIN . 'users.php');
        } else {
            setFlashMessage('Pengguna gagal dihapus');
            return header('Location: ' . BASE_URL_ADMIN . 'users.php');
        }
    }

    public function userSetActive($id)
    {
        $userActiveStmt = $this->db->prepare('UPDATE users SET status_activation=:status WHERE id=:id');
        $userActiveStmt->bindParam(':id', $id);
        $status = 1;
        $userActiveStmt->bindParam(':status', $status);

        if ($userActiveStmt->execute()) {
            setFlashMessage('Pengguna berhasil diaktifkan');
            return header('Location: ' . BASE_URL_ADMIN . 'users.php');
        } else {
            setFlashMessage('Pengguna gagal diaktifkan');
            return header('Location: ' . BASE_URL_ADMIN . 'users.php');
        }
    }

    public function userSetNonactive($id)
    {
        $userActiveStmt = $this->db->prepare('UPDATE users SET status_activation=:status WHERE id=:id');
        $userActiveStmt->bindParam(':id', $id);
        $status = 0;
        $userActiveStmt->bindParam(':status', $status);

        if ($userActiveStmt->execute()) {
            setFlashMessage('Pengguna berhasil dinonaktifkan');
            return header('Location: ' . BASE_URL_ADMIN . 'users.php');
        } else {
            setFlashMessage('Pengguna gagal dinonaktifkan');
            return header('Location: ' . BASE_URL_ADMIN . 'users.php');
        }
    }
}
