<?php
include "../koneksi.php";

// Ambil data biasa
$judul     = $_POST['judul'];
$semester  = $_POST['semester'];
$deskripsi = $_POST['deskripsi'];
$ketua     = $_POST['ketua'];
$anggota   = $_POST['anggota'];
$link_file = $_POST['link_file'];
$link_yt   = $_POST['link_yt'];
$id_user   = $_POST['id_user'];

// Ambil file foto
$foto      = $_FILES['foto']['name'];
$lokasi    = $_FILES['foto']['tmp_name'];

// Folder penyimpanan
$folder = "../gambar/";

// Pindahkan file ke folder
move_uploaded_file($lokasi, $folder . $foto);

// Query database
$query = "INSERT INTO projek (judul, semester, deskripsi, ketua, anggota, link_file, link_yt, foto, id_user)
          VALUES ('$judul', '$semester', '$deskripsi', '$ketua', '$anggota', '$link_file', '$link_yt', '$foto', '$id_user')";

if (mysqli_query($koneksi, $query)) {
    header("Location: dashboard_mahasiswa.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
