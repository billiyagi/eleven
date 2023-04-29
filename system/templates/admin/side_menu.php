<aside class="position-fixed h-100 top-0" id="adminMenu">
    <div class="d-flex justify-content-center py-2">
        <img src="<?php echo assets('img/logo/eleven-dark-logo.png'); ?>" alt="Eleven Logo" width="150px">
    </div>
    <ul class="nav flex-column px-3 mt-5">
        <li class="nav-item mb-3">
            <a class="nav-link rounded-3 aside-btn-eleven <?php echo active('index.php'); ?>" aria-current="page" href="<?php echo BASE_URL_ADMIN . 'index.php'; ?>">
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width: 18px; height: 18px">
                        <path fill-rule="evenodd" d="M7.5 5.25a3 3 0 013-3h3a3 3 0 013 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0112 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 017.5 5.455V5.25zm7.5 0v.09a49.488 49.488 0 00-6 0v-.09a1.5 1.5 0 011.5-1.5h3a1.5 1.5 0 011.5 1.5zm-3 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                        <path d="M3 18.4v-2.796a4.3 4.3 0 00.713.31A26.226 26.226 0 0012 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 01-6.477-.427C4.047 21.128 3 19.852 3 18.4z" />
                    </svg>

                    <span class="ms-2">Dashboard</span>
                </div>
            </a>
        </li>
        <li class="nav-item mb-3">
            <a class="nav-link rounded-3 aside-btn-eleven <?php echo active('products.php') . active('products/create.php') . active('products/update.php') . active('type/index.php') . active('type/create.php') . active('type/update.php'); ?>" aria-current="page" href="<?php echo BASE_URL_ADMIN . 'products.php'; ?>">
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width: 18px; height: 18px">
                        <path d="M6 3a3 3 0 00-3 3v2.25a3 3 0 003 3h2.25a3 3 0 003-3V6a3 3 0 00-3-3H6zM15.75 3a3 3 0 00-3 3v2.25a3 3 0 003 3H18a3 3 0 003-3V6a3 3 0 00-3-3h-2.25zM6 12.75a3 3 0 00-3 3V18a3 3 0 003 3h2.25a3 3 0 003-3v-2.25a3 3 0 00-3-3H6zM17.625 13.5a.75.75 0 00-1.5 0v2.625H13.5a.75.75 0 000 1.5h2.625v2.625a.75.75 0 001.5 0v-2.625h2.625a.75.75 0 000-1.5h-2.625V13.5z" />
                    </svg>

                    <span class="ms-2">Produk</span>
                </div>
            </a>
        </li>
        <li class="nav-item mb-3">
            <a class="nav-link rounded-3 aside-btn-eleven <?php echo active('orders.php'); ?>" aria-current="page" href="<?php echo BASE_URL_ADMIN . 'orders.php'; ?>">
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width: 18px; height: 18px">
                        <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z" clip-rule="evenodd" />
                    </svg>

                    <span class="ms-2">Pesanan</span>
                </div>
            </a>
        </li>
        <li class="nav-item mb-3">
            <a class="nav-link rounded-3 aside-btn-eleven <?php echo active('users.php') . active('users/update.php') . active('users/create.php') ?>" aria-current="page" href="<?php echo BASE_URL_ADMIN . 'users.php'; ?>">
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width: 18px; height: 18px">
                        <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                    </svg>


                    <span class="ms-2">Pengguna</span>
                </div>
            </a>
        </li>
    </ul>

    <div class="d-flex justify-content-center flex-column position-absolute bottom-0 w-100 py-3 px-2">
        <div class="text-center mb-4">
            <h6 class="fw-bold m-0"><?php echo $_SESSION['userEleven']['first_name'] . ' ' . $_SESSION['userEleven']['last_name']; ?></h6>
            <small class="fw-lighter"><?php echo $_SESSION['userEleven']['email']; ?></small>
        </div>
        <div class="d-flex justify-content-between">
            <a href="<?php echo BASE_URL_LANDING; ?>" class="d-flex align-items-center btn btn-outline-secondary me-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 20px; height: 20px;" class="fw-bold">
                    <path fill-rule="evenodd" d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z" clip-rule="evenodd" />
                </svg>

                <small class="ms-2">Home</small>
            </a>

            <form action="<?php echo BASE_URL_SYSTEM . 'request.php'; ?>" method="post" id="logoutForm">
                <input type="hidden" name="user_logout" value="logout">
                <button type="button" id="logoutBtn" class="d-flex align-items-center btn btn-outline-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 20px; height: 20px;" class="fw-bold">
                        <path fill-rule="evenodd" d="M3 4.25A2.25 2.25 0 015.25 2h5.5A2.25 2.25 0 0113 4.25v2a.75.75 0 01-1.5 0v-2a.75.75 0 00-.75-.75h-5.5a.75.75 0 00-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 00.75-.75v-2a.75.75 0 011.5 0v2A2.25 2.25 0 0110.75 18h-5.5A2.25 2.25 0 013 15.75V4.25z" clip-rule="evenodd" />
                        <path fill-rule="evenodd" d="M19 10a.75.75 0 00-.75-.75H8.704l1.048-.943a.75.75 0 10-1.004-1.114l-2.5 2.25a.75.75 0 000 1.114l2.5 2.25a.75.75 0 101.004-1.114l-1.048-.943h9.546A.75.75 0 0019 10z" clip-rule="evenodd" />
                    </svg>

                    <small class="ms-2">Logout</small>
                </button>
            </form>

        </div>
    </div>
</aside>