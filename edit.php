<?php
include "koneksi.php";

// Template
include "template/sidebar.php";
include "template/header.php";
include "template/topbar.php";

// Query ambil data proyek
$id_projek = $_GET['id_projek'];
$result = mysqli_query($koneksi, "SELECT * FROM projek WHERE id_projek = '$id_projek'");
$row = mysqli_fetch_assoc($result);
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

    .form-control, .form-select, textarea {
        border-radius: 10px;
        padding: 12px 15px;
        border: 1px solid #cdd4da;
    }

    .project-img {
        max-height: 180px;
        border-radius: 10px;
        margin-bottom: 10px;
        box-shadow: 0px 6px 18px rgba(0,0,0,0.15);
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
        <h2 class="section-title">Edit Proyek</h2>

        <form action="proses_edit_proyek.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id_projek" value="<?= $row['id_projek'] ?>">
            <input type="hidden" name="foto_lama" value="<?= $row['foto'] ?>">

            <!-- Judul -->
            <div class="mb-3">
                <label class="form-label">Judul Proyek</label>
                <input type="text" name="judul" class="form-control" value="<?= $row['judul'] ?>">
            </div>

            <!-- Semester -->
            <div class="mb-3">
                <label class="form-label">Semester</label>
                <select name="semester" class="form-select">
                    <option disabled>Pilih Semester</option>
                    <option value="ganjil" <?= ($row['semester'] == "ganjil" ? "selected" : "") ?>>Ganjil</option>
                    <option value="genap" <?= ($row['semester'] == "genap" ? "selected" : "") ?>>Genap</option>
                </select>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="5"><?= $row['deskripsi'] ?></textarea>
            </div>

            <!-- Ketua -->
            <div class="mb-3">
                <label class="form-label">Ketua Tim</label>
                <input type="text" name="ketua" class="form-control" value="<?= $row['ketua'] ?>">
            </div>

            <!-- Anggota -->
            <div class="mb-3">
                <label class="form-label">Anggota Tim</label>
                <input type="text" name="anggota" class="form-control" value="<?= $row['anggota'] ?>">
            </div>

            <!-- Link File -->
            <div class="mb-3">
                <label class="form-label">Link File</label>
                <input type="url" name="link_file" class="form-control" value="<?= $row['link_file'] ?>">
            </div>

            <!-- YouTube -->
            <div class="mb-3">
                <label class="form-label">URL YouTube</label>
                <input type="url" name="link_yt" class="form-control" value="<?= $row['link_yt'] ?>">
            </div>

            <!-- Foto -->
            <div class="mb-4">
                <label class="form-label">Foto Proyek</label>
                <br>
                <img src="gambar/<?= $row['foto'] ?>" class="project-img">
                <input type="file" name="foto" class="form-control mt-2" accept="image/*">
            </div>

            <!-- Tombol -->
            <div class="d-flex gap-3">
                <a href="detail_proyek.php?id_projek=<?= $row['id_projek'] ?>" class="btn btn-secondary btn-custom">Kembali</a>
                <button type="submit" class="btn btn-primary btn-custom">Simpan Perubahan</button>
            </div>

        </form>
    </div>

</div>

<?php include "template/footer.php"; ?>
