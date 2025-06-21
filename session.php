<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php"); // Alihkan pengguna ke halaman login jika belum log masuk
    exit();
}