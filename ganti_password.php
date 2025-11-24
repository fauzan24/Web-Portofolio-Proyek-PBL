<?php
include "koneksi.php";

// Template
include "template/sidebar.php";
include "template/header.php";
include "template/topbar.php";

// Ambil data user (sesuaikan dengan session kamu)
session_start();
$id_user = $_SESSION['id_user']; 

$result = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user = '$id_user'");
$user = mysqli_fetch_assoc($result);
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
        margin-bottom: 15px;
    }

    .profile-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 6px;
    }

    .profile-input {
        background: #f8f9fc;
        border: 1px solid #dcdcdc;
        padding: 10px 14px;
        border-radius: 8px;
        width: 100%;
    }

    .btn-custom {
        padding: 10px 22px;
        border-radius: 10px;
    }
</style>

<!-- MAIN CONTENT -->
<div class="content-wrapper">

    <div class="profile-card">

        <h3 class="profile-title">Profil Akun</h3>
        <div class="divider"></div>

        <!-- NAMA -->
        <div class="mb-3">
            <label class="profile-label">Nama Lengkap</label>
            <input type="text" class="profile-input" value="<?= $user['nama'] ?>" readonly>
        </div>

        <!-- USERNAME -->
        <div class="mb-3">
            <label class="profile-label">Username</label>
            <input type="text" class="profile-input" value="<?= $user['username'] ?>" readonly>
        </div>

        <!-- PASSWORD (TERSEMBUNYI) -->
        <div class="mb-3">
            <label class="profile-label">Password</label>
            <input type="password" class="profile-input" value="********" readonly>
        </div>

        <div class="divider"></div>

        <!-- Tombol -->
        <div class="d-flex justify-content-between gap-3 mt-2">
            <a href="profil.php" class="btn btn-secondary btn-custom">
                Kembali
            </a>

            <a href="ganti_password.php" class="btn btn-primary btn-custom">
                Ganti Password
            </a>
        </div>

    </div>

</div>

<?php include "template/footer.php"; ?>
