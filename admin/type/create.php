<?php
require_once('../../system/bootstrap.php');
require_once('../session_admin.php');

$titlePage = 'Create Product Type';
require_once('../../system/templates/admin/header.php');
require_once('../../system/templates/admin/side_menu.php');
?>

<main id="adminMainContent">
    <div class="container-fluid px-3 py-4 vh-100">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="../../system/request.php" method="post">
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" name="name" id="kategori" class="form-control">
                                <?php echo getFlashValidation('name'); ?>
                            </div>
                            <button type="submit" name="type_create" class="btn btn-primary">Tambah Kategori</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once('../../system/templates/admin/footer.php') ?>