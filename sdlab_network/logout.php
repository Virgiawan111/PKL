<?php
session_start(); // Memulai sesi
session_destroy(); // Menghancurkan semua data sesi
header("Location: login.php"); // Mengalihkan pengguna ke halaman login
exit();
?>