<?php
include "../koneksi.php";

$nama = $_POST['nama'];
$username = $_POST['username'];
$nim = $_POST['nim'];
$jurusan = $_POST['jurusan'];
$password = $_POST['password'];
$role = $_POST['role'];

// Query insert data
$query = mysqli_query($koneksi, "INSERT INTO users (nama, username, nim, jurusan, password, role) VALUES (
    '$nama', '$username', '$nim', '$jurusan', '$password', '$role'
)");

if ($query) {
    echo "<script>
            alert('Data Mahasiswa berhasil ditambahkan!');
            window.location='kelola_mahasiswa.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menambahkan data!');
            window.history.back();
          </script>";
}
?>
