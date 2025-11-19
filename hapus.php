<?php
include "koneksi.php";

if (isset($_GET['id_projek'])) {
    $id = $_GET['id_projek'];

    $delete = mysqli_query($koneksi, "DELETE FROM projek WHERE id_projek='$id'");

    if ($delete) {
        header("Location: dashboard_mahasiswa.php?status=deleted");
    } else {
        echo "Gagal menghapus data!";
    }
} else {
    echo "ID tidak ditemukan!";
}
?>
