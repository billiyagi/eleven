<div class="position-fixed bottom-0 bg-light w-100 d-block d-md-none">
    <div class="container-fluid">
        <div class="row">
            <a href="<?php echo URL_CLIENT . 'index.php'; ?>" class="col-4 py-2 text-center btn-client <?php echo (URL_CLIENT . 'index.php' == $_SERVER['PHP_SELF']) ? 'btn-active-client' : ''; ?>">
                <i class="fas fa-money-bill-wave"></i>
                <span class="d-block">Pesanan</span>
            </a>
            <a href="<?php echo URL_CLIENT . 'cart.php'; ?>" class="col-4 py-2 text-center btn-client <?php echo (URL_CLIENT . 'cart.php' == $_SERVER['PHP_SELF']) ? 'btn-active-client' : ''; ?>">
                <i class="fas fa-shopping-cart"></i>
                <span class="d-block">Keranjang</span>
            </a>
            <a href="<?php echo URL_CLIENT . 'settings.php'; ?>" class="col-4 py-2 text-center btn-client <?php echo (URL_CLIENT . 'settings.php' == $_SERVER['PHP_SELF']) ? 'btn-active-client' : ''; ?>">
                <i class="fas fa-user-cog"></i>
                <span class="d-block">Settings</span>
            </a>
        </div>
    </div>
</div>