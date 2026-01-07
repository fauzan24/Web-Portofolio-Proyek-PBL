<?php
include "../koneksi.php";
include "../template_admin/header.php";
include "../template_admin/sidebar.php";
include "../template_admin/topbar.php";

// Validasi ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan'); window.location='kelola_dosen.php';</script>";
    exit;
}

$id_user = $_GET['id'];

// Prepared Statement (AMAN)
$stmt = $koneksi->prepare("SELECT * FROM users WHERE id_user = ?");
$stmt->bind_param("i", $id_user);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<script>alert('Data tidak ditemukan'); window.location='kelola_dosen.php';</script>";
    exit;
}

$data = $result->fetch_assoc();
?>
<div class="main-content">
    <div class="form-card">
        <h3 class="fw-bold mb-4 text-primary">Edit Data Dosen</h3>

        <form action="proses_edit_dosen.php" method="POST">
            <input type="hidden" name="id_user" value="<?= $data['id_user']; ?>">

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" required
                       value="<?= htmlspecialchars($data['nama']); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required
                       value="<?= htmlspecialchars($data['username']); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">NIP / ID Dosen</label>
                <input type="text" name="nim" class="form-control"
                       value="<?= htmlspecialchars($data['nim']); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">
                    Password Baru <small class="text-muted">(Kosongkan jika tidak diubah)</small>
                </label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-4">
                <label class="form-label">Role</label>
                <select name="role" class="form-select">
                    <option value="dosen" <?= $data['role']=="dosen" ? "selected" : ""; ?>>Dosen</option>
                    <option value="admin" <?= $data['role']=="admin" ? "selected" : ""; ?>>Admin</option>
                    <option value="mahasiswa" <?= $data['role']=="mahasiswa" ? "selected" : ""; ?>>Mahasiswa</option>
                </select>
            </div>

            <div class="d-flex gap-2">
                <a href="kelola_dosen.php" class="btn btn-secondary btn-custom">Kembali</a>
                <button type="submit" class="btn btn-primary btn-custom">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<?php include "../template_admin/footer.php"; ?>
