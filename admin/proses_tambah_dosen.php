<?php
include "../koneksi.php";

$nama = $_POST['nama'];
$username = $_POST['username'];
$nim = $_POST['nim'];
$password = $_POST['password'];
$role = $_POST['role'];
$profil = $_POST['profil'];

// Query insert data
$query = mysqli_query($koneksi, "INSERT INTO users (nama, username, nim, password, role, profil) VALUES (
    '$nama', '$username', '$nim', '$password', '$role', '$profil'
)");

if ($query) {
    echo "<script>
            alert('Data dosen berhasil ditambahkan!');
            window.location='kelola_dosen.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menambahkan data!');
            window.history.back();
          </script>";
}
?>
