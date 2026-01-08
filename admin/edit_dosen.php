<?php
include "../koneksi.php";
include "../template_admin/header.php";
include "../template_admin/sidebar.php";
include "../template_admin/topbar.php";

if (isset($_GET['id'])) {
    $id_user = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user='$id_user'");
    $data = mysqli_fetch_assoc($query);
}
?>

<style>
/* ================= MAIN CONTENT ================= */
.main-content {
    margin-left: 240px;
    padding: 120px 40px 90px;
    background: #f4f7fb;
    min-height: 100vh;
}

/* ================= FORM CARD ================= */
.form-card {
    background: #ffffff;
    padding: 35px;
    border-radius: 16px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    width: 100%;
}

/* ================= FORM ================= */
.form-label {
    font-weight: 600;
    color: #0b3551;
}

.form-control,
.form-select {
    border-radius: 10px;
    padding: 11px 14px;
    border: 1px solid #cdd4da;
}

/* ================= BUTTON ================= */
.btn-custom {
    padding: 10px 24px;
    border-radius: 10px;
    font-weight: 600;
}

/* ================= RESPONSIVE ================= */
@media (max-width: 991px) {
    .main-content {
        margin-left: 0;
        padding: 100px 20px 90px;
    }

    .form-card {
        max-width: 100%;
        padding: 25px;
    }
}

@media (max-width: 576px) {
    h3.fw-bold {
        font-size: 20px;
    }

    .form-card {
        padding: 20px;
    }

    .btn-custom {
        width: 100%;
    }

    .d-flex.gap-2 {
        flex-direction: column;
    }
}
</style>

<div class="main-content">

    <div class="form-card">

        <h3 class="fw-bold mb-4 text-primary">Edit Data Dosen</h3>

        <form action="proses_edit_dosen.php" method="POST">

            <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" required
                       value="<?= $data['nama'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label"></label>
                <input type="text" name="username" class="form-control" required
                       value="<?= $data['username'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">NIP / ID Dosen</label>
                <input type="text" name="nim" class="form-control"
                       value="<?= $data['nim'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Kata Sandi Baru</label>
                <input type="text" name="password" class="form-control"
                       value="<?= $data['password'] ?>">
            </div>

            <div class="mb-4">
                <label class="form-label">Peran</label>
                <select name="role" class="form-select">
                    <option value="dosen" <?= ($data['role']=="dosen"?"selected":"") ?>>Dosen</option>
                    <option value="admin" <?= ($data['role']=="admin"?"selected":"") ?>>Admin</option>
                    <option value="mahasiswa" <?= ($data['role']=="mahasiswa"?"selected":"") ?>>Mahasiswa</option>
                </select>
            </div>

            <div class="d-flex gap-2">
                <a href="kelola_dosen.php" class="btn btn-secondary btn-custom">
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary btn-custom">
                    Simpan Perubahan
                </button>
            </div>

        </form>

    </div>

</div>

<?php include "../template_admin/footer.php"; ?>
