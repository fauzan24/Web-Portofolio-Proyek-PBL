<?php
include "../koneksi.php";
include "../template_admin/sidebar.php";
include "../template_admin/header.php";
include "../template_admin /topbar.php";

if (isset($_GET['id'])) {
    $id_user = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user = '$id_user'");
    $data = mysqli_fetch_assoc($query);
}
?>

<style>
    .main-content {
        margin-left: 260px;
        padding: 130px 60px 60px;
        background: #f4f7fb;
        min-height: 100vh;
    }

    .edit-card {
        background: #ffffff;
        padding: 35px;
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        width: 100%;
    }

    .section-title {
        font-size: 22px;
        font-weight: 700;
        color: #0d3d6a;
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 600;
        color: #0d3d6a;
    }

    .form-control, .form-select {
        border-radius: 10px;
        padding: 12px 15px;
        border: 1px solid #cdd4da;
    }

    .btn-custom {
        padding: 10px 28px;
        border-radius: 10px;
        font-weight: 600;
    }
</style>

<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="edit-card">
        <h2 class="section-title">Edit Data Mahasiswa</h2>

        <form action="proses_edit_mahasiswa.php" method="POST">

            <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" required
                       value="<?= $data['nama'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required
                       value="<?= $data['username'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control"
                       value="<?= $data['nim'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Jurusan</label>
                <select name="jurusan" class="form-control" required>
                    <option value="<?= $data['jurusan']?>"><?= $data['jurusan']?></option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Elektro">Teknik Elektro</option>
                    <option value="Teknik mesin">Teknik mesin</option>
                    <option value="Manajemen bisnis">Manajemen Bisnis</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Password Baru</label>
                <input type="text" name="password" class="form-control"
                       value="<?= $data['password']?>">
            </div>

            <div class="mb-4">
                <label class="form-label">Role</label>
                <select name="role" class="form-select">
                    <option value="mahasiswa" <?= ($data['role']=='mahasiswa' ? 'selected' : '') ?>>Mahasiswa</option>
                    <option value="dosen" <?= ($data['role']=='dosen' ? 'selected' : '') ?>>Dosen</option>
                    <option value="admin" <?= ($data['role']=='admin' ? 'selected' : '') ?>>Admin</option>
                </select>
            </div>

            <div class="d-flex gap-3">
                <a href="kelola_mahasiswa.php" class="btn btn-secondary btn-custom">Kembali</a>
                <button type="submit" class="btn btn-primary btn-custom">Simpan Perubahan</button>
            </div>

        </form>
    </div>
</div>

<?php include "../template_admin/footer.php"; ?>
