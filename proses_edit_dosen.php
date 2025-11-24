<?php
include "koneksi.php";

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$nim = $_POST['nim'];
$role = $_POST['role'];
$password = $_POST['password'];

if (!empty($password)) {
    $query = "UPDATE users SET 
            nama='$nama',
            username='$username',
            nim='$nim',
            role='$role',
            password='$password'
            WHERE id_user='$id_user'";
} else {
    $query = "UPDATE users SET 
            nama='$nama',
            username='$username',
            nim='$nim',
            role='$role',
            WHERE id_user='$id_user'";
}

if (mysqli_query($koneksi, $query)) {
    echo "<script>
            alert('Data dosen berhasil diperbarui!');
            window.location='kelola_dosen.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal mengubah data!');
            window.history.back();
          </script>";
}
?>
