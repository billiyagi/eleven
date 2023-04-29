<?php
require_once('../../system/bootstrap.php');
$user = $userModel->get($_GET['id']);

if (empty($user)) {
    return header('Location: ' . BASE_URL_ADMIN . 'users.php');
}
require_once('../session_admin.php');

$titlePage = 'Update User';
require_once('../../system/templates/admin/header.php');
require_once('../../system/templates/admin/side_menu.php');


?>
<main id="adminMainContent">
    <div class="container-fluid px-3 py-4 vh-100">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="../../system/request.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $user->ID; ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">Nama depan</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo $user->first_name; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Nama belakang</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo $user->last_name; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" id="username" class="form-control" value="<?php echo $user->username; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?php echo $user->email; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <label for="peran" class="form-label">Peran</label>
                                    <select class="form-select" id="peran" name="role">
                                        <?php if ($user->role_id == 1) : ?>
                                            <option value="2">Costumer</option>
                                            <option value="1" selected>Administrator</option>
                                        <?php else : ?>
                                            <option value="2" selected>Costumer</option>
                                            <option value="1">Administrator</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="status_aktivasi" class="form-label">Status Aktivasi</label>
                                    <input type="text" id="status_aktivasi" value="<?php echo ($user->status_activation == 1) ? 'Aktif' : 'Nonaktif' ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="<?php echo BASE_URL_ADMIN . 'users.php'; ?>" class="btn btn-secondary me-3">Kembali</a>
                                <button type="submit" name="user_update" class="btn btn-primary">Ubah Pengguna</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once('../../system/templates/admin/footer.php') ?>