<?php 
session_start();  // WAJIB DI PALING ATAS

include "../koneksi.php";

// Cek apakah user sudah login
if (!isset($_SESSION['id_user'])) {
    echo "<script>alert('Silakan login terlebih dahulu'); 
          window.location='../login.php';</script>";
    exit;
}

// Ambil ID user dari session
$id_user = $_SESSION['id_user'];

// Ambil data user dari database
$result = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user = '$id_user'");
$dataUser = mysqli_fetch_assoc($result);  // <- nama DIUBAH agar tidak bentrok

// Jika user tidak ditemukan
if (!$dataUser) {
    echo "<script>alert('Data user tidak ditemukan!'); 
          window.location='../login.php';</script>";
    exit;
}

// Tentukan role
$role = $dataUser['role'];


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
        padding: 120px 60px;
        background: #f4f7fb;
        min-height: 100vh;
    }

    .profile-card {
        background: #fff;
        padding: 40px;
        border-radius: 18px;
        max-width: 750px;
        margin: auto;
        box-shadow: 0 6px 22px rgba(0,0,0,0.08);
    }

    .profile-header {
        display: flex;
        align-items: center;
        gap: 20px;
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

    .profile-section-title {
        text-transform: uppercase;
        font-size: 14px;
        font-weight: 700;
        color: #0d6efd;
        margin-top: 25px;
        margin-bottom: 8px;
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
        color: #6c757d;
        font-size: 13px;
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
</style>

<!-- MAIN CONTENT -->
<div class="content-wrapper">

    <div class="profile-card">

        <!-- Profile Header -->
        <div class="profile-header">
            <img src="../asset/profile_default.png" class="profile-db">
            <div>
                <h2 class="profile-title"><?= $dataUser['nama'] ?></h2>
                <p class="text-secondary mb-0">@<?= $dataUser['username'] ?></p>
            </div>
        </div>

        <hr>

        <!-- Informasi Akun -->
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

        <!-- Tombol Aksi -->
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
