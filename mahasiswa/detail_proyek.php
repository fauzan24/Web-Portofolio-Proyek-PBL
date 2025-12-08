<?php
include "../koneksi.php";

// Template
include "../template/sidebar.php";
include "../template/header.php";
include "../template/topbar.php";

// Ambil ID
$id_projek = $_GET['id_projek'];

// Query proyek
$result = mysqli_query($koneksi, "SELECT * FROM projek WHERE id_projek = '$id_projek'");
$row = mysqli_fetch_assoc($result);

// Query komentar
$komentar_query = mysqli_query($koneksi,
    "SELECT k.*, u.nama AS nama_pengomentar
     FROM komentar k
     LEFT JOIN users u ON k.id_user = u.id_user
     WHERE k.id_projek = '$id_projek'
     ORDER BY k.id_komentar DESC"
);

// Query penilaian
$penilaian_query = mysqli_query($koneksi,
    "SELECT n.*, u.nama AS nama_dosen
     FROM penilaian n
     LEFT JOIN users u ON n.id_user = u.id_user
     WHERE n.id_projek = '$id_projek'"
);
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

    .komentar-box, .penilaian-box {
        background: #f7faff;
        border-left: 4px solid #0b3551;
        padding: 12px 18px;
        border-radius: 8px;
        margin-bottom: 12px;
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
        <p><?= nl2br($row['deskripsi']) ?></p>
        <div class="divider"></div>

        <!-- File -->
        <h6 class="section-title">File Dokumen</h6>
        <a href="<?= $row['link_file'] ?>" target="_blank"
           class="btn btn-outline-primary btn-custom mt-1">
            <i class="fa-brands fa-google-drive"></i> Buka File Dokumen
        </a>

        <!-- Video -->
        <h6 class="section-title mt-4">Video Presentasi</h6>
        <a href="<?= $row['link_yt'] ?>" target="_blank"
           class="btn btn-outline-danger btn-custom mt-1">
            <i class="fa-brands fa-youtube"></i> Tonton di YouTube
        </a>

        <div class="divider"></div>

        <!-- Ketua -->
        <h6 class="section-title">Ketua Tim</h6>
        <p><?= $row['ketua'] ?></p>

        <!-- Anggota -->
        <h6 class="section-title mt-3">Anggota Tim</h6>
        <p><?= $row['anggota'] ?></p>

        <div class="divider"></div>

        <!-- ============================= -->
        <!--        TAMPIL PENILAIAN       -->
        <!-- ============================= -->
        <h6 class="section-title">Penilaian dari Dosen</h6>

        <?php
        $total_nilai = 0;
        $jumlah_penilai = mysqli_num_rows($penilaian_query);

        if ($jumlah_penilai == 0) {
        ?>
            <p class="text-muted">Belum ada penilaian.</p>
        <?php
        }
        ?>

        <?php 
        while ($n = mysqli_fetch_assoc($penilaian_query)) { 
            $total_nilai += $n['nilai'];
        ?>
            <div class="penilaian-box">
                <b style="color:#0b3551;">Dosen Penilai :</b> <?= $n['nama_dosen'] ?><br>
                <b style="color:#0b3551;">Nilai :</b> 
                <span class="badge bg-success p-2"><?= $n['nilai'] ?></span>
            </div>
        <?php } ?>

        <?php if ($jumlah_penilai > 0) { 
            $rata = $total_nilai / $jumlah_penilai;
        ?>
            <div class="alert alert-primary mt-3" style="font-size:16px;">
                <b>Rata-rata Nilai :</b> <?= round($rata, 2) ?>
            </div>
        <?php } ?>

        <div class="divider"></div>



        <!-- ============================= -->
        <!--     BAGIAN TAMPIL KOMENTAR    -->
        <!-- ============================= -->
        <h6 class="section-title">Komentar dari Dosen</h6>

        <?php if (mysqli_num_rows($komentar_query) == 0) { ?>
            <p class="text-muted">Belum ada komentar.</p>
        <?php } ?>

        <?php while ($k = mysqli_fetch_assoc($komentar_query)) { ?>
            <div class="komentar-box">
                <b><?= $k['nama_pengomentar'] ?>:</b><br>
                <?= nl2br($k['komentar']) ?>
            </div>
        <?php } ?>

        <div class="divider"></div>

        <!-- Tombol -->
        <div class="d-flex gap-3 mt-3">
            <a href="dashboard_mahasiswa.php" class="btn btn-secondary btn-custom">Kembali</a>

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
