<?php
include "koneksi.php";
include "template_admin/header.php";
include "template_admin/sidebar.php";
include "template_admin/topbar.php";
?>

<style>
    .main-content {
        margin-left: 240px;
        padding: 120px 40px 50px;
        background: #f4f7fb;
        min-height: 100vh;
    }
    .form-card {
        background: #fff;
        padding: 32px;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }
    .form-label {
        font-weight: 600;
        color: #0b3551;
    }
    .form-control, .form-select {
        border-radius: 10px;
        padding: 11px 14px;
        border: 1px solid #cdd4da;
    }
    .btn-custom {
        padding: 10px 24px;
        border-radius: 10px;
        font-weight: 600;
    }
</style>

<div class="main-content">

    <div class="form-card">
        <h3 class="fw-bold mb-4 text-primary">Tambah Data Mahasiswa</h3>

        <form action="proses_tambah_Mahasiswa.php" method="POST">

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" required placeholder="Masukkan nama ">
            </div>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required placeholder="Masukkan username ">
            </div>

            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM">
            </div>

           <div class="mb-3">
                <label class="form-label">Jurusan</label>
                <select name="jurusan" class="form-control" required>
                    <option value="">-- Pilih Jurusan --</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Elektro">Teknik Elektro</option>
                    <option value="Teknik mesin">Teknik mesin</option>
                    <option value="Manajemen bisnis">Manajemen Bisnis</option>
                </select>
            </div>


            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required placeholder="Masukkan password">
            </div>

            <input type="hidden" name="role" value="Mahasiswa">

            <div class="d-flex gap-2 mt-4">
                <a href="kelola_mahasiswa.php" class="btn btn-secondary btn-custom">Kembali</a>
                <button type="submit" class="btn btn-primary btn-custom">Simpan</button>
            </div>
            
        </form>
    </div>

</div>

<?php include "template/footer.php"; ?>
