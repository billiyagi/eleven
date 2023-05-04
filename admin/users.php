<?php
require_once('../system/bootstrap.php');
require_once('session_admin.php');

$titlePage = 'Users Management';
require_once('../system/templates/admin/header.php');
require_once('../system/templates/admin/side_menu.php');

if (isset($_GET['id'])) {
    $user = $userModel->get($_GET['id']);
}

?>

<?php if (isset($user)) : ?>
    <main id="adminMainContent">
        <div class="container-fluid px-3 py-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <span>Profil</span>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover mb-0">
                                <tr>
                                    <th rowspan="2">Nama Lengkap</th>
                                </tr>
                                <tr>
                                    <td><?php echo $user->first_name . ' ' . $user->last_name; ?></td>
                                </tr>

                                <tr>
                                    <th rowspan="2">Username</th>
                                </tr>
                                <tr>
                                    <td><?php echo $user->username; ?></td>
                                </tr>

                                <tr>
                                    <th rowspan="2">Email</th>
                                </tr>
                                <tr>
                                    <td><?php echo $user->email; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            Aktifitas
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover mb-0">
                                <tr>
                                    <th rowspan="2">Peran</th>
                                </tr>
                                <tr>
                                    <td><?php echo ($user->role_id == 1) ? 'Administrator' : 'Costumer'; ?></td>
                                </tr>

                                <tr>
                                    <th rowspan="2">Status Aktivasi</th>
                                </tr>
                                <tr>
                                    <td><?php echo ($user->status_activation == 1) ? 'Aktif' : 'Nonaktif'; ?></td>
                                </tr>

                                <tr>
                                    <th rowspan="2">Waktu Login Terakhir</th>
                                </tr>
                                <tr>
                                    <td><?php echo toDate('d, M Y', $user->last_login); ?></td>
                                </tr>

                                <tr>
                                    <th rowspan="2">Didaftarakan pada</th>
                                </tr>
                                <tr>
                                    <td><?php echo toDate('d, M Y', $user->created_at); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex mt-3 justify-content-end">
                <a href="<?php echo BASE_URL_ADMIN . 'users.php'; ?>" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </main>
<?php else : ?>

    <main id="adminMainContent">
        <div class="container-fluid px-3 py-4">
            <div class="row">
                <div class="col-md-12">
                    <a href="users/create.php" class="btn btn-primary mb-3">Tambah Pengguna</a>
                    <div class="card mb-5">
                        <div class="card-header">
                            Administrator <span class="badge bg-primary"><?php echo count($userModel->getAllByRoleAdmin()); ?></span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $number = 1;
                                        foreach ($userModel->getAllByRoleAdmin() as $user) : ?>
                                            <?php if ($user->ID != $_SESSION['userEleven']['id']) : ?>

                                                <tr>
                                                    <td><?php echo $number; ?></td>
                                                    <td><?php echo $user->first_name . ' ' . $user->last_name; ?></td>
                                                    <td><?php echo $user->username; ?></td>
                                                    <td><?php echo $user->email; ?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <form action="../system/request.php" method="post" class="activation-form">
                                                                <input type="hidden" name="id" value="<?php echo $user->ID; ?>">
                                                                <?php if ($user->status_activation == 1) : ?>
                                                                    <input type="hidden" name="user_nonactive">
                                                                    <div class="btn btn-success me-3 user-active">
                                                                        <i class="fas fa-check-circle"></i>
                                                                    </div>
                                                                <?php else : ?>
                                                                    <input type="hidden" name="user_active">
                                                                    <div class="btn btn-secondary me-3 user-non-active" title="Status Pengguna nonaktif">
                                                                        <i class="fas fa-exclamation-circle"></i>
                                                                    </div>

                                                                <?php endif; ?>
                                                            </form>
                                                            <a href="users.php?id=<?php echo $user->ID; ?>" class="btn btn-warning">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="users/update.php?id=<?php echo $user->ID; ?>" class="btn btn-primary mx-3">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form action="../system/request.php" method="post" class="delete-form">
                                                                <input type="hidden" name="id" value="<?php echo $user->ID; ?>">
                                                                <input type="hidden" name="user_delete">
                                                                <div class="btn btn-danger delete-btn">
                                                                    <i class="fas fa-times-circle"></i>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php
                                            $number++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card mt-5">
                        <div class="card-header">
                            Pelanggan <span class="badge bg-secondary"><?php echo count($userModel->getAllByRoleCostumer()); ?></span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $number = 1;
                                        foreach ($userModel->getAllByRoleCostumer() as $user) : ?>
                                            <tr>
                                                <td><?php echo $number; ?></td>
                                                <td><?php echo $user->first_name . ' ' . $user->last_name; ?></td>
                                                <td><?php echo $user->username; ?></td>
                                                <td><?php echo $user->email; ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <form action="../system/request.php" method="post" class="activation-form">
                                                            <input type="hidden" name="id" value="<?php echo $user->ID; ?>">
                                                            <?php if ($user->status_activation == 1) : ?>
                                                                <input type="hidden" name="user_nonactive">
                                                                <div class="btn btn-success me-3 user-active">
                                                                    <i class="fas fa-check-circle"></i>
                                                                </div>
                                                            <?php else : ?>
                                                                <input type="hidden" name="user_active">
                                                                <div class="btn btn-secondary me-3 user-non-active" title="Status Pengguna nonaktif">
                                                                    <i class="fas fa-exclamation-circle"></i>
                                                                </div>

                                                            <?php endif; ?>
                                                        </form>

                                                        <a href="users.php?id=<?php echo $user->ID; ?>" class="btn btn-warning">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="users/update.php?id=<?php echo $user->ID; ?>" class="btn btn-primary mx-3">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="../system/request.php" method="post" class="delete-form">
                                                            <input type="hidden" name="id" value="<?php echo $user->ID; ?>">
                                                            <input type="hidden" name="user_delete">
                                                            <div class="btn btn-danger delete-btn">
                                                                <i class="fas fa-times-circle"></i>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                            $number++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php endif; ?>
<?php require_once('../system/templates/admin/footer.php') ?>