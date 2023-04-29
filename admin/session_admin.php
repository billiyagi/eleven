<?php

// Kondisi ketika belum login
if (!isset($_SESSION['userEleven']) || $_SESSION['userEleven']['role'] != 1) {
    header('Location: ' . BASE_URL_LANDING);
}
