<?php
include "../koneksi.php";

$nilai = $_POST['nilai'];

if ($nilai < 0 || $nilai > 100) {
    echo "<script>alert('Nilai harus antara 0–100'); history.back();</script>";
    exit;
}

$id_penilaian = $_POST['id_penilaian'];

mysqli_query($koneksi,
    "UPDATE penilaian 
     SET nilai = '$nilai'
     WHERE id_penilaian = '$id_penilaian'"
);

echo "<script>alert('Nilai berhasil diperbarui');
window.location='detail_projek.php?id_projek=".$_POST['id_projek']."';</script>";
