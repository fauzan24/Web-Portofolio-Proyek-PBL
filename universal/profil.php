<?php 
@session_start();
$id_user = $_SESSION['id_user'];
include '../koneksi.php';

$result = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user = '$id_user'");
$dataUser = mysqli_fetch_assoc($result); 

$role = $dataUser['role'];

if ($role == 'admin') {
    include "../template_admin/sidebar.php";
    include "../template_admin/header.php";
    include "../template_admin/topbar.php";
} elseif ($role == 'dosen') {
    include "../template_dosen/sidebar.php";
    include "../template_dosen/header.php";
    include "../template_dosen/topbar.php";
} else {
    include "../template/sidebar.php";
    include "../template/header.php";
    include "../template/topbar.php";
}

if ($role == 'admin') {
    $link_kembali = "../admin/dashboard_admin.php";
} elseif ($role == 'dosen') {
    $link_kembali = "../dosen/dashboard_dosen.php";
} else {
    $link_kembali = "../mahasiswa/dashboard_mahasiswa.php";
}
?>

<style>
/* ================= CONTENT ================= */
.content-wrapper {
    margin-left: 260px;
    padding: 120px 50px 100px;
    background: #f4f7fb;
    min-height: 100vh;
}

/* ================= CARD ================= */
.profile-card {
    background: #fff;
    padding: 40px;
    border-radius: 18px;
    max-width: 760px;
    margin: auto;
    box-shadow: 0 6px 22px rgba(0,0,0,0.08);
}

/* ================= HEADER ================= */
.profile-header {
    display: flex;
    align-items: center;
    gap: 22px;
    margin-bottom: 30px;
}

.profile-db {
    width: 110px;
    height: 110px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #0d6efd;
}

.profile-title {
    font-size: 26px;
    font-weight: 700;
    color: #0d3d6a;
}

/* ================= INFO ================= */
.profile-section-title {
    font-size: 14px;
    font-weight: 700;
    color: #0d6efd;
    margin-top: 25px;
    margin-bottom: 10px;
    letter-spacing: 1px;
}

.info-box {
    background: #f9fbff;
    padding: 14px 18px;
    border-radius: 10px;
    border: 1px solid #e3e7ed;
    margin-bottom: 15px;
}

.info-label {
    font-size: 13px;
    color: #6c757d;
}

.info-value {
    font-size: 16px;
    font-weight: 600;
    color: #333;
}

.btn-custom {
    padding: 10px 22px;
    border-radius: 10px;
}

/* ================= RESPONSIVE ================= */
@media (max-width: 1200px) {
    .content-wrapper {
        margin-left: 240px;
        padding: 110px 40px;
    }
}

@media (max-width: 992px) {
    .content-wrapper {
        margin-left: 0 !important;
        padding: 100px 30px;
    }

    .profile-header {
        flex-direction: column;
        text-align: center;
    }

    .profile-db {
        width: 95px;
        height: 95px;
    }

    .profile-title {
        font-size: 22px;
    }

    .profile-card {
        max-width: 100%;
    }
}

@media (max-width: 768px) {
    .content-wrapper {
        padding: 90px 20px;
    }

    .profile-card {
        padding: 28px;
    }

    .btn-custom {
        width: 100%;
    }

    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 12px;
    }
}

@media (max-width: 576px) {
    .content-wrapper {
        padding: 80px 16px;
    }

    .profile-db {
        width: 80px;
        height: 80px;
    }

    .profile-title {
        font-size: 20px;
    }

    .info-value {
        font-size: 15px;
    }
}
</style>

<div class="content-wrapper">

    <div class="profile-card">

        <div class="profile-header">
            <img src="<?= $profil ?>" class="profile-db">
            <div>
                <h2 class="profile-title"><?= $dataUser['nama'] ?></h2>
                <p class="text-secondary mb-0">@<?= $dataUser['username'] ?></p>
            </div>
        </div>

        <hr>

        <div class="profile-section-title">Informasi Akun</div>

        <div class="info-box">
            <div class="info-label">Nama Lengkap</div>
            <div class="info-value"><?= $dataUser['nama'] ?></div>
        </div>

        <div class="info-box">
            <div class="info-label">Username</div>
            <div class="info-value"><?= $dataUser['username'] ?></div>
        </div>

        <div class="info-box">
            <div class="info-label">NIM</div>
            <div class="info-value"><?= $dataUser['nim'] ?></div>
        </div>

        <hr>

        <div class="d-flex justify-content-between mt-3">
            <a href="<?= $link_kembali ?>" class="btn btn-secondary btn-custom">
                Kembali
            </a>
            <a href="../kelola_akun/ganti_password.php" class="btn btn-primary btn-custom">
                Ganti Password
            </a>
        </div>

    </div>

</div>

<?php include "../template/footer.php"; ?>
