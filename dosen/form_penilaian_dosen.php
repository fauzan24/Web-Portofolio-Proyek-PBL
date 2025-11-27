<?php
include "../koneksi.php";

// Template
include "../template_dosen/sidebar.php";
include "../template_dosen/header.php";
include "../template_dosen/topbar.php";

// Ambil ID
if (!isset($_GET['id_projek']) || empty($_GET['id_projek'])) {
    die("<div class='alert alert-danger'>ID Proyek tidak ditemukan!</div>");
}

$id_projek = mysqli_real_escape_string($koneksi, $_GET['id_projek']);

// Query
$result = mysqli_query($koneksi, "SELECT * FROM projek WHERE id_projek = '$id_projek'");

if (!$result || mysqli_num_rows($result) == 0) {
    die("<div class='alert alert-warning'>Data proyek tidak ditemukan!</div>");
}

$row = mysqli_fetch_assoc($result);
?>


<style>
    .content-wrapper {
        margin-left: 260px;
        padding: 120px 60px 60px;
        background: #f4f7fb;
        min-height: 100vh;
    }

    .project-card {
        background: #ffffff;
        padding: 40px;
        border-radius: 18px;
        box-shadow: 0 6px 25px rgba(0,0,0,0.08);
    }

    .section-title {
        font-size: 16px;
        font-weight: 700;
        color: #0d3d6a;
        margin-top: 35px;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .content-text {
        font-size: 15px;
        line-height: 1.7;
        color: #444;
    }

    .divider {
        height: 1px;
        background-color: #e6e6e6;
        margin: 30px 0;
    }

    .project-image {
        border-radius: 10px;
        box-shadow: 0 5px 22px rgba(0,0,0,0.12);
        width: 100%;
        max-height: 380px;
        object-fit: cover;
    }

    .btn-custom {
        padding: 10px 28px;
        border-radius: 10px;
    }

</style>

<!-- MAIN CONTENT -->
<div class="content-wrapper">

    <div class="project-card">

        <!-- Judul Proyek -->
        <h2 class="fw-bold mb-4"><?= $row['judul'] ?></h2>
        <div class="divider"></div>

        <!-- Gambar -->
        <img src="../gambar/<?= $row['foto'] ?>" class="project-image mb-4">

        <!-- Deskripsi -->
        <h6 class="section-title">Deskripsi Proyek</h6>
        <p class="content-text"><?= nl2br($row['deskripsi']) ?></p>
        <div class="divider"></div>

        <!-- File -->
        <h6 class="section-title">File Dokumen</h6>
        <a href="<?= $row['link_file'] ?>" target="_blank"
           class="btn btn-outline-primary btn-custom mt-1"><i class="fa-brands fa-google-drive"></i>
            Buka File Dokumen
        </a>

        <!-- Video -->
        <h6 class="section-title mt-4">Video Presentasi</h6>
        <a href="<?= $row['link_yt'] ?>" target="_blank"
           class="btn btn-outline-danger btn-custom mt-1"><i class="fa-brands fa-youtube"></i>
            Tonton di YouTube
        </a>

        <div class="divider"></div>

        <!-- Ketua -->
        <h6 class="section-title">Ketua Tim</h6>
        <p class="content-text"><?= $row['ketua'] ?></p>

        <!-- Anggota -->
        <h6 class="section-title mt-3">Anggota Tim</h6>
        <p class="content-text"><?= $row['anggota'] ?></p>

        <div class="divider"></div>

        
        <div class="mb-3">
            <label for="" class="form-label">Penilaian</label>
            <input
                type="number"
                name="penilaian"
                id="penilaian"
                class="form-control"
                placeholder="0-100" 
                aria-describedby="helpId"
                min="0" max="100"
            />
        </div>
        

        <!-- Tombol -->
        <div class="d-flex gap-3 mt-3">
            <a href="dashboard_dosen.php" class="btn btn-secondary btn-custom">Kembali</a>

            <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" 
               href="hapus.php?id_projek=<?= $row['id_projek'] ?>" 
               class="btn btn-danger btn-custom">
                Hapus
            </a>

            <a href="edit.php?id_projek=<?= $row['id_projek'] ?>" 
               class="btn btn-primary btn-custom">
                Edit
            </a>
        </div>

    </div>

</div>

<?php include "../template/footer.php"; ?>
