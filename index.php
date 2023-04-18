<?php require_once('system/bootstrap.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- Primary CSS -->
    <link rel="stylesheet" href="<?php echo assets('css/eleven.css'); ?>">

    <title><?php echo APP_NAME; ?></title>
</head>

<body>
    <header class="position-sticky top-0 bg-white">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="<?php echo assets('img/logo/eleven-dark-logo.png'); ?>" alt="Logo eleven" class="img-brand">
                <div class="nav">
                    <a href="#" class="nav-link text-dark py-3">Beranda</a>
                    <a href="#" class="nav-link text-dark py-3">Produk</a>
                    <a href="#" class="nav-link text-dark py-3">Reseller</a>
                    <a href="#" class="nav-link text-dark py-3">Tentang</a>
                </div>
            </div>
            <div class="d-flex">
                <!-- <i class="fas fa-search"></i> -->
                <a href="" class="nav-link text-dark"><i class="fas fa-sign-in-alt"></i> Login</a>
                <!-- <a href="" class="btn btn-outline-dark rounded-0 border-2">Login</a> -->
            </div>
        </div>
    </header>
    <main class="mt-2 mt-md-3">

        <!-- Intro -->
        <section class="hero-jumbotron">
            <div class="container px-md-0">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row h-100">
                            <div class="col-md-8">
                                <div class="d-flex align-items-center h-100">
                                    <div class="mb-4">
                                        <div class="fs-1 eleven-font fw-bold">Fashionable disemua gaya unikmu.</div>
                                        <p class="mt-2">Raih potongan hingga 80% untuk pengguna baru, daftar akun sekarang.</p>
                                        <a href="" class="btn btn-lg btn-outline-dark rounded-0 border-3">Daftar akun</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo assets('img/hero.jpg') ?>" alt="" style="width: 100%">
                    </div>
                </div>
            </div>
        </section>

        <!-- Designer -->
        <section>
            <div class="container bg-light">
                <div class="px-3 py-5">
                    <div class="fs-1 eleven-font mb-4"><strong>Beragam fashion</strong> dengan berbagai Desainer terbaik diseluruh dunia.</div>
                </div>
                <div class="row">
                    <div class="col-md-6 p-0">
                        <img src="<?php echo assets('img/designer-1.jpg') ?>" alt="" width="100%" height="700px" class="img-fit">
                    </div>
                    <div class="col-md-6 p-0">
                        <img src="<?php echo assets('img/designer-2.jpg') ?>" alt="" width="100%" height="700px" class="img-fit">
                    </div>
                </div>
            </div>
            <div class="container-fluid">
            </div>
        </section>

        <!-- Product -->
        <section class="mt-5">
            <div class="container pt-5">
                <div class="d-md-flex justify-content-between align-items-center pt-5 pb-3">
                    <div class="fs-1 eleven-font text-center"><strong>Fashion terbaik</strong> yang cocok untuk gayamu</div>
                    <a href="#" class="btn btn-lg btn-outline-dark rounded-0 border-3 d-md-block d-none">Lihat Semua <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="row mt-4 gy-4">
                    <div class="col-md-4">
                        <div class="card rounded-0 border-dark">
                            <img src="<?php echo assets('img/hero.jpg'); ?>" class="card-img-top rounded-0 img-fit" alt="..." height="400px">
                            <div class="card-body position-absolute bottom-0 bg-dark w-100 text-light">
                                <h5 class="card-title m-0 eleven-font text-center">Card title</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card rounded-0 border-dark">
                            <img src="<?php echo assets('img/hero.jpg'); ?>" class="card-img-top rounded-0 img-fit" alt="..." height="400px">
                            <div class="card-body position-absolute bottom-0 bg-dark w-100 text-light">
                                <h5 class="card-title m-0 eleven-font text-center">Card title</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card rounded-0 border-dark">
                            <img src="<?php echo assets('img/hero.jpg'); ?>" class="card-img-top rounded-0 img-fit" alt="..." height="400px">
                            <div class="card-body position-absolute bottom-0 bg-dark w-100 text-light">
                                <h5 class="card-title m-0 eleven-font text-center">Card title</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card rounded-0 border-dark">
                            <img src="<?php echo assets('img/hero.jpg'); ?>" class="card-img-top rounded-0 img-fit" alt="..." height="400px">
                            <div class="card-body position-absolute bottom-0 bg-dark w-100 text-light">
                                <h5 class="card-title m-0 eleven-font text-center">Card title</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn btn-lg btn-outline-dark rounded-0 border-3 d-md-none d-block mt-5">Lihat Semua <i class="fas fa-arrow-right"></i></a>
            </div>
        </section>

        <!-- Contact -->
        <section class="bg-light mt-5 pt-3 pb-5">
            <div class="container py-5">
                <div class="fs-1 eleven-font mb-4">Perlu bantuan atau ingin bermitra bersama kami? Hubungi kami sekarang juga.</div>
                <a href="#" class="btn btn-lg btn-outline-dark rounded-0 border-3"><i class="fab fa-whatsapp"></i> Whatsapp</a>
            </div>
        </section>
    </main>
    <footer class="bg-dark">
        <div class="container text-light text-center">
            <div class="nav justify-content-around">
                <a href="#" class="nav-link p-4 text-light">Beranda</a>
                <a href="#" class="nav-link p-4 text-light">Produk</a>
                <a href="#" class="nav-link p-4 text-light">Reseller</a>
                <a href="#" class="nav-link p-4 text-light">Tentang</a>
            </div>
            <p class="py-5 m-0">Sistem Website E-commerce bertema menjual pakaian dengan gaya desain yang unik.</p>
        </div>
        <div style="background-color: #000;" class="p-3 text-center text-light">
            &copy; <?php echo date('Y') ?> Copyright <strong>eleven</strong> by <a href="https://billiyagi.space">Febry Billiyagi</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>