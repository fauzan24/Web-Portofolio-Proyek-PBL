<?php
include "../koneksi.php";

// Template
include "../template/sidebar.php";
include "../template/header.php";
include "../template/topbar.php";

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

    .profile-card {
        padding: 34px;
        max-width: 600px;
    }
}

@media (max-width: 992px) {
    .content-wrapper {
        margin-left: 0 !important; /* sidebar collapse ke mode mobile */
        padding: 100px 35px;
    }

    .profile-card {
        padding: 30px;
        max-width: 100%;
        border-radius: 16px;
    }

    .profile-title {
        font-size: 20px;
        text-align: center;
    }

    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 10px;
    }

    .btn-custom {
        width: 100%;
        text-align: center;
    }
}

@media (max-width: 768px) {
    .content-wrapper {
        padding: 90px 22px;
    }

    .profile-card {
        padding: 26px;
    }

    .profile-input {
        padding: 9px 12px;
    }
}

@media (max-width: 576px) {
    .content-wrapper {
        padding: 80px 18px;
    }

    .profile-title {
        font-size: 18px;
    }

    .profile-card {
        padding: 22px;
    }
}

</style>

<div class="content-wrapper">
    <div class="profile-card">

        <h3 class="profile-title">Ganti Password</h3>

        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger"><?= $_GET['error'] ?></div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success"><?= $_GET['success'] ?></div>
        <?php } ?>

        <form method="POST" action="proses_ganti_password.php">
            
            <div class="mb-3">
                <label class="profile-label">Password Lama</label>
                <input type="password" name="password_lama" class="profile-input" required>
            </div>

            <div class="mb-3">
                <label class="profile-label">Password Baru</label>
                <input type="password" name="password_baru" class="profile-input" required>
            </div>

            <div class="mb-3">
                <label class="profile-label">Konfirmasi Password</label>
                <input type="password" name="password_konfirmasi" class="profile-input" required>
            </div>

            <div class="d-flex justify-content-between mt-3 gap-3">
                <a href="../universal/profil.php?id_user=<?= $id_user ?>" class="btn btn-secondary btn-custom">Kembali</a>
                <button type="submit" class="btn btn-primary btn-custom">Simpan Password</button>
            </div>

        </form>
    </div>
</div>

<?php include "../template/footer.php"; ?>
