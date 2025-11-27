<?php
session_start();
include "../koneksi.php";

// Template
include "../template/sidebar.php";
include "../template/header.php";
include "../template/topbar.php";

$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user='$id_user'");
$user = mysqli_fetch_assoc($query);
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
                <a href="../universal/profil.php" class="btn btn-secondary btn-custom">Kembali</a>
                <button type="submit" class="btn btn-primary btn-custom">Simpan Password</button>
            </div>

        </form>
    </div>
</div>

<?php include "../template/footer.php"; ?>
