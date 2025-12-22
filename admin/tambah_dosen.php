<?php
include "../koneksi.php";
include "../template_admin/header.php";
include "../template_admin/sidebar.php";
include "../template_admin/topbar.php";
?>

<style>
/* ================= MAIN CONTENT ================= */
.main-content {
    margin-left: 240px;
    padding: 120px 40px 90px; /* aman header & footer */
    background: #f4f7fb;
    min-height: 100vh;
}

/* ================= FORM CARD ================= */
.form-card {
    background: #fff;
    padding: 32px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    max-width: 720px;
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

        <h3 class="fw-bold mb-4 text-primary">Tambah Data Dosen</h3>

        <form action="proses_tambah_dosen.php" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" required
                       placeholder="Masukkan nama dosen">
            </div>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required
                       placeholder="Masukkan username login">
            </div>

            <div class="mb-3">
                <label class="form-label">NIP</label>
                <input type="text" name="nim" class="form-control"
                       placeholder="Masukkan NIP">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required
                       placeholder="Masukkan password">
            </div>

            <input type="hidden" name="role" value="dosen">

            <div class="d-flex gap-2 mt-4">
                <a href="kelola_dosen.php" class="btn btn-secondary btn-custom">
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary btn-custom">
                    Simpan
                </button>
            </div>

        </form>

    </div>

</div>

<?php include "../template_admin/footer.php"; ?>
