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

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.ckeditor.com/4.21.0/basic/ckeditor.js"></script>
    <!-- Primary CSS -->
    <link rel="stylesheet" href="<?php echo assets('css/eleven.css'); ?>">

    <title><?php echo APP_NAME; ?> Admin page</title>
</head>

<body>

    <?php
    // var_dump($_SESSION['userEleven']);
    ?>

    <header id="adminTopBar">
        <div id="adminMenuBtn" class="btn btn-light rounded-circle border-secondary">
            <i class="fas fa-bars" id="adminMenuBtnIcon"></i>
        </div>
        <div id="titlePage" class="container-fluid px-3 py-4 d-block d-md-flex justify-content-md-between align-items-center">
            <div class="ms-3">
                <h2 class="fw-bolder">Fashion Dashboard</h2>
                <p class="fw-lighter fs-6 m-0 p-0">Selamat datang, Billiyagi!</p>
            </div>
            <div class="d-md-flex justify-content-center align-items-center mb-4 mt-3 mt-md-0 d-none">
                <img src="" alt="Gambar Cuaca" id="weatherIcon" style="width: 30px; height: 30px;" class="me-3">
                <small class="w-100">
                    <span class="d-block" id="weatherLocation"></span>
                    <span class="d-block" id="weatherTemperature"></span>
                </small>
            </div>
        </div>
    </header>