<?php
include "../koneksi.php";

$nama = $_POST['nama'];
$username = $_POST['username'];
$nim = $_POST['nim'];
$jurusan = $_POST['jurusan'];
$password = $_POST['password']; // TANPA HASH
$role = $_POST['role'];

// Upload foto
if (!empty($_FILES['profil']['name'])) {
    $namaFile = time() . "_" . $_FILES['profil']['name'];
    $tmp = $_FILES['profil']['tmp_name'];
    move_uploaded_file($tmp, "../gambar/" . $namaFile);
} else {
    $namaFile = "../gambar/user.png"; // Foto default
}

// Query insert data
$query = mysqli_query($koneksi, 
    "INSERT INTO users (nama, username, nim, jurusan, password, role, profil) VALUES (
        '$nama', '$username', '$nim', '$jurusan', '$password', '$role', '$namaFile'
    )"
);

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
