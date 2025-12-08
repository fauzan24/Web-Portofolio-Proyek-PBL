<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

// Cek apakah username ada
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
$user = mysqli_fetch_assoc($query);

if (!$user) {
    header("Location: login.php?error=Username tidak ditemukan");
    exit();
}

// Cek password
if ($password !== $user['password']) {
    header("Location: login.php?error=Password salah");
    exit();
}

// Set session login
$_SESSION['id_user'] = $user['id_user'];
$_SESSION['nama'] = $user['nama'];
$_SESSION['username'] = $user['username'];
$_SESSION['role'] = $user['role'];
$_SESSION['profil'] = $user['profil'];

// Arahkan sesuai role
if ($user['role'] == 'mahasiswa') {
    header("Location: mahasiswa/dashboard_mahasiswa.php");
    exit();
}

if ($user['role'] == 'dosen') {
    header("Location: dosen/dashboard_dosen.php");
    exit();
}

if ($user['role'] == 'admin') {
    header("Location: admin/dashboard_admin.php");
    exit();
}
?>
