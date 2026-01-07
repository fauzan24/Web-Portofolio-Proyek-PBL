<?php
include "../koneksi.php";

$nilai = $_POST['nilai'];

if ($nilai < 0 || $nilai > 100) {
    echo "<script>alert('Nilai harus 0-100'); history.back();</script>";
    exit;
}

$id_projek = $_POST['id_projek'];
$id_user = $_POST['id_user'];

mysqli_query($koneksi,
    "INSERT INTO penilaian (id_projek, id_user, nilai) 
     VALUES ('$id_projek', '$id_user', '$nilai')"
);

echo "<script>alert('Penilaian berhasil disimpan');
window.location='detail_projek.php?id_projek=$id_projek';</script>";
