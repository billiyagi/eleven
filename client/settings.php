<?php
require_once('../system/bootstrap.php');
require_once('../system/templates/client/header.php');
require_once('../system/templates/landing/navbar.php');
require_once('session_client.php');

$user = $userModel->get($_SESSION['userEleven']['id']);
if ($costumerAddressModel->isUserHaveAddress($user->ID)) {
    $costumerAddress = $costumerAddressModel->getByUserID($user->ID);
}
?>

<main>
    <section>
        <div class="container">
            <div class="row my-5">
                <div class="col-md-3 pe-5 d-none d-md-block">
                    <?php require_once('../system/templates/client/side_menu.php') ?>
                </div>
                <div class="col-md-9">
                    <div class="card mb-4">
                        <div class="card-header">
                            <strong>Akun</strong>
                        </div>
                        <div class="card-body">
                            <form action="../system/request.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $user->ID; ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstName" class="form-label">Nama Depan</label>
                                            <input type="text" name="first_name" id="firstName" class="form-control" value="<?php echo $user->first_name; ?>">
                                            <?php echo getFlashValidation('first_name'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lastName" class="form-label">Nama Belakang</label>
                                            <input type="text" name="last_name" id="lastName" class="form-control" value="<?php echo $user->last_name; ?>">
                                            <?php echo getFlashValidation('last_name'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" id="username" class="form-control" value="<?php echo $user->username; ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" value="<?php echo $user->email; ?>">
                                    <?php echo getFlashValidation('email'); ?>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary" name="costumer_update">Simpan Perubahan Akun</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong>Pemesanan</strong>
                        </div>
                        <div class="card-body">
                            <form action="../system/request.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $user->ID; ?>">
                                <label for="costumerAddress" class="form-label">Alamat</label>
                                <textarea name="address" id="costumerAddress" cols="30" rows="5" class="form-control mb-3"><?php echo (isset($costumerAddress)) ? $costumerAddress->address : ''; ?></textarea>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-secondary" name="save_costumer_address">Simpan Alamat</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php require_once('../system/templates/client/mobile_menu.php') ?>
<?php require_once('../system/templates/landing/footer.php') ?>