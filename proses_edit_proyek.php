<?php
include "koneksi.php";

// Tangkap data dari form
$id_projek  = $_POST['id_projek'];
$judul      = $_POST['judul'];
$semester   = $_POST['semester'];
$deskripsi  = $_POST['deskripsi'];
$ketua      = $_POST['ketua'];
$anggota    = $_POST['anggota'];
$link_file  = $_POST['link_file'];
$link_yt    = $_POST['link_yt'];

$foto_lama  = $_POST['foto_lama']; // foto existing

// Cek apakah ada foto baru
if (!empty($_FILES['foto']['name'])) {

    $foto_baru   = $_FILES['foto']['name'];
    $tmp_file    = $_FILES['foto']['tmp_name'];

    // Pindahkan foto baru ke folder gambar
    move_uploaded_file($tmp_file, "gambar/" . $foto_baru);

    // Foto final yang disimpan
    $foto_final = $foto_baru;

} else {
    // Jika tidak upload baru → gunakan foto lama
    $foto_final = $foto_lama;
}

// Query UPDATE
$query = "UPDATE projek SET 
            judul       = '$judul',
            semester    = '$semester',
            deskripsi   = '$deskripsi',
            ketua       = '$ketua',
            anggota     = '$anggota',
            link_file   = '$link_file',
            link_yt     = '$link_yt',
            foto        = '$foto_final'
          WHERE id_projek = '$id_projek'";

// Eksekusi query
$hasil = mysqli_query($koneksi, $query);

if ($hasil) {
    echo "<script>
            alert('Data proyek berhasil diperbarui!');
            window.location.href='detail_proyek.php?id_projek=$id_projek';
          </script>";
} else {
    echo "<script>
            alert('Gagal memperbarui data: " . mysqli_error($koneksi) . "');
            window.history.back();
          </script>";
}
?>
