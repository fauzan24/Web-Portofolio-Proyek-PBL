<?php
include "../koneksi.php";

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$nim = $_POST['nim'];
$jurusan = $_POST['jurusan'];
$role = $_POST['role'];
$password = $_POST['password'];

// Cek apakah password diubah
if (!empty($password)) {
    // Simpan password baru
    $query = "UPDATE users SET 
              nama='$nama', username='$username', nim='$nim', jurusan='$jurusan', role='$role', 
              password='$password' 
              WHERE id_user='$id_user'";
} else {
    // Password tetap sama
    $query = "UPDATE users SET 
              nama='$nama', username='$username', nim='$nim', jurusan='$jurusan', role='$role'
              WHERE id_user='$id_user'";
}

if (mysqli_query($koneksi, $query)) {
    echo "<script>
            alert('Data berhasil diperbarui!');
            window.location.href='kelola_mahasiswa.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal memperbarui data!');
            window.history.back();
          </script>";
}
?>
