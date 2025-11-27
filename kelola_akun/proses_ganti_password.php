<?php
session_start();
include "../koneksi.php";

$id_user = $_SESSION['id_user'];

$password_lama       = $_POST['password_lama'];
$password_baru       = $_POST['password_baru'];
$password_konfirmasi = $_POST['password_konfirmasi'];

// Ambil data user
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user='$id_user'");
$user  = mysqli_fetch_assoc($query);

// 1. Cek password lama
if ($password_lama !== $user['password']) {
    header("Location: ganti_password.php?error=Password lama salah");
    exit();
}

// 2. Cek konfirmasi password baru
if ($password_baru !== $password_konfirmasi) {
    header("Location: ganti_password.php?error=Konfirmasi password tidak cocok");
    exit();
}

// 3. Cek apakah password baru sama dengan lama
if ($password_lama === $password_baru) {
    header("Location: ganti_password.php?error=Password baru tidak boleh sama dengan password lama");
    exit();
}

// 4. Update password
$update = mysqli_query($koneksi, 
    "UPDATE users SET password='$password_baru' WHERE id_user='$id_user'"
);

if ($update) {
    header("Location: ganti_password.php?success=Password berhasil diperbarui");
    exit();
} else {
    header("Location: ganti_password.php?error=Gagal mengubah password");
    exit();
}
?>
