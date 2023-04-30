<ul class="nav flex-column">
    <li>
        <a href="index.php" class="rounded-3 btn-client w-100 text-start d-block py-2 px-3 mb-3 <?php echo (URL_CLIENT . 'index.php' == $_SERVER['PHP_SELF']) ? 'btn-active-client' : ''; ?>"><i class="fas fa-money-bill-wave me-2"></i> Pesanan</a>
    </li>
    <li>
        <a href="cart.php" class="rounded-3 btn-client w-100 text-start d-block py-2 px-3 mb-3 <?php echo (URL_CLIENT . 'cart.php' == $_SERVER['PHP_SELF']) ? 'btn-active-client' : ''; ?>"><i class="fas fa-shopping-cart me-2"></i> Keranjang</a>
    </li>
    <li>
        <a href="settings.php" class="rounded-3 btn-client w-100 text-start d-block py-2 px-3 <?php echo (URL_CLIENT . 'settings.php' == $_SERVER['PHP_SELF']) ? 'btn-active-client' : ''; ?>"><i class="fas fa-user-cog me-2"></i> Settings</a>
    </li>
</ul>