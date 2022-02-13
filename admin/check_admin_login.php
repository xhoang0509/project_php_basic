<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['level'])) {
    echo $_SESSION['level'];
    // header("location:../logout_admin.php");
    exit();
}