<?php
include "../koneksi.php";
session_start();

$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user='$id_user'");
$user = mysqli_fetch_assoc($query);

// Tentukan role
$role = $user['role'];

// ===============================
// LOAD TEMPLATE SESUAI ROLE
// ===============================
if ($role == 'admin') {
    include "../template_admin/sidebar.php";
    include "../template_admin/header.php";
    include "../template_admin/topbar.php";

} elseif ($role == 'dosen') {
    include "../template_dosen/sidebar.php";
    include "../template_dosen/header.php";
    include "../template_dosen/topbar.php";

} else { // mahasiswa
    include "../template/sidebar.php";
    include "../template/header.php";
    include "../template/topbar.php";
}

// ===============================
// TOMBOL KEMBALI SESUAI ROLE
// ===============================
if ($role == 'admin') {
    $link_kembali = "../admin/dashboard_admin.php";
} elseif ($role == 'dosen') {
    $link_kembali = "../dosen/dashboard_dosen.php";
} else {
    $link_kembali = "../mahasiswa/dashboard_mahasiswa.php";
}
?>

<style>
    .content-wrapper {
        margin-left: 260px;
        padding: 120px 60px 60px;
        background: #f4f7fb;
        min-height: 100vh;
    }
    .profile-card {
        background: #ffffff;
        padding: 40px;
        border-radius: 18px;
        max-width: 650px;
        margin: auto;
        box-shadow: 0 6px 25px rgba(0,0,0,0.08);
    }
    .profile-title {
        font-weight: 700;
        font-size: 22px;
        color: #0d3d6a;
        margin-bottom: 20px;
    }
    .profile-label {
        font-weight: 600;
        margin-bottom: 8px;
    }
    .profile-input {
        background: #f8f9fc;
        border: 1px solid #dcdcdc;
        padding: 10px 14px;
        border-radius: 8px;
        width: 100%;
    }

    /* ============================= */
    /*          RESPONSIVE          */
    /* ============================= */

    @media (max-width: 1200px) {
        .content-wrapper {
            margin-left: 230px;
            padding: 110px 50px;
        }
    }

    @media (max-width: 992px) {
        .content-wrapper {
            margin-left: 0 !important;
            padding: 100px 35px;
        }
    }
</style>

<div class="content-wrapper">
    <div class="profile-card">

        <h3 class="profile-title">Ganti Kata Sandi</h3>

        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger"><?= $_GET['error'] ?></div>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success"><?= $_GET['success'] ?></div>
        <?php } ?>

        <form method="POST" action="proses_ganti_password.php">

            <div class="mb-3">
                <label class="profile-label">Kata Sandi Lama</label>
                <input type="password" name="password_lama" class="profile-input" required>
            </div>

            <div class="mb-3">
                <label class="profile-label">Kata Sandi Baru</label>
                <input type="password" name="password_baru" class="profile-input" required>
            </div>

            <div class="mb-3">
                <label class="profile-label">Konfirmasi Kata Sandi</label>
                <input type="password" name="password_konfirmasi" class="profile-input" required>
            </div>

            <div class="d-flex justify-content-between mt-3 gap-3">
                <a href="<?= $link_kembali ?>" class="btn btn-secondary btn-custom">Kembali</a>
                <button type="submit" class="btn btn-primary btn-custom">Simpan Kata Sandi</button>
            </div>

        </form>
    </div>
</div>

<?php include "../template/footer.php"; ?>
