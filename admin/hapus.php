<?php
include "../koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $page = isset($_GET['page']) ? $_GET['page'] : "dashboard"; // default

    $delete = mysqli_query($koneksi, "DELETE FROM users WHERE id_user='$id'");

    if ($delete) {

        // Kondisi redirect berdasarkan halaman asal
        if ($page == "mahasiswa") {
            header("Location: kelola_mahasiswa.php?status=deleted");
        } 
        elseif ($page == "dosen") {
            header("Location: kelola_dosen.php?status=deleted");
        } 
        else {
            header("Location: dashboard_admin.php?status=deleted");
        }

    } else {
        echo "Gagal menghapus data!";
    }
} else {
    echo "ID tidak ditemukan!";
}
?>
