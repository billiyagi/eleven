<?php
require_once('../../system/bootstrap.php');
$typeProduct = $typesProductModel->get($_GET['id']);

if (empty($typeProduct)) {
    header('Location: ' . BASE_URL_ADMIN . 'type/index.php');
}

require_once('../session_admin.php');

$titlePage = 'Update Product Type';
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
                            <input type="hidden" name="id" value="<?php echo $typeProduct->id; ?>">
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" name="name" id="kategori" class="form-control" value="<?php echo $typeProduct->nama; ?>">
                                <?php echo getFlashValidation('name'); ?>
                            </div>
                            <button type="submit" name="type_update" class="btn btn-primary">Ubah Kategori</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once('../../system/templates/admin/footer.php') ?>