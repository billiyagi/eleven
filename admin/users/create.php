<?php
require_once('../../system/bootstrap.php');
require_once('../session_admin.php');

$titlePage = 'Create User';
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">Nama depan</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Nama belakang</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <label for="peran" class="form-label">Peran</label>
                                    <select class="form-select" id="peran" name="role">
                                        <option value="2" selected>Costumer</option>
                                        <option value="1">Administrator</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="status_aktivasi" class="form-label">Status Aktivasi</label>
                                    <select class="form-select" id="status_aktivasi">
                                        <option value="0" selected>Nonaktif</option>
                                        <option value="1">Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" name="user_create" class="btn btn-primary">Tambah Pengguna</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once('../../system/templates/admin/footer.php') ?>