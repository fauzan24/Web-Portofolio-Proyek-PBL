<?php
include '../koneksi.php';
$id_mhs = $_GET['id_user'];

// Ambil data mahasiswa
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE `id_user` = '$id_mhs' AND `role` ='mahasiswa'");

if (!$query) {
    die("Query profil gagal: " . mysqli_error($koneksi));
}

$profil = mysqli_fetch_assoc($query);

if (!$profil) {
    echo "<script>alert('Data mahasiswa tidak ditemukan'); window.location='dashboard_dosen.php';</script>";
    exit;
}

// Ambil daftar proyek mahasiswa
$projek = mysqli_query($koneksi, 
    "SELECT * FROM projek 
     WHERE id_user = '$id_mhs' 
     ORDER BY id_projek DESC"
);

// Cek error query projek
if (!$projek) {
    die("Query proyek gagal: " . mysqli_error($koneksi));
}

// Load template
include "../template_dosen/header.php";
include "../template_dosen/sidebar.php";
include "../template_dosen/topbar.php";
?>

<style>
    .content-wrapper {
        margin-left: 240px;
        padding: 100px 40px;
    }

    .profile-card {
        background: #ffffff;
        padding: 40px;
        max-width: 650px;
        margin: auto;
        border-radius: 18px;
        box-shadow: 0 6px 22px rgba(0,0,0,0.08);
    }

    .profile-img-detail {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #0b3551;
    }

    .info-label {
        font-size: 14px;
        color: #6c757d;
    }

    .info-value {
        font-size: 18px;
        font-weight: 600;
        color: #333;
    }

    .info-box {
        background: #f8fbff;
        padding: 15px 18px;
        border-radius: 10px;
        margin-bottom: 15px;
        border: 1px solid #e3e7ed;
    }

    .btn-back {
        padding: 10px 22px;
        border-radius: 10px;
    }

    .project-card {
        background: #ffffff;
        padding: 18px;
        border-radius: 15px;
        box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
        transition: 0.2s;
        text-align: center;
    }

    .project-card:hover {
        transform: translateY(-5px);
    }

    .project-img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 12px;
        margin-bottom: 10px;
    }
</style>

<div class="content-wrapper">

    <!-- =============================== -->
    <!--   PROFILE CARD MAHASISWA        -->
    <!-- =============================== -->
    <div class="profile-card text-center">

        <img src="<?=$profil['profil']?>" class="profile-img-detail" alt="Foto Profil">

        <h3 class="fw-bold mb-1"><?= $profil['nama']?></h3>
        <p class="text-muted mb-0">@<?= $profil['username']?></p>
        <p class="text-primary fw-semibold" style="font-size: 15px;">
            Mahasiswa | <?= $profil['jurusan'] ?>
        </p>

        <hr class="my-4">

        <div class="info-box">
            <div class="info-label">Nama Lengkap</div>
            <div class="info-value"><?= $profil['nama'] ?></div>
        </div>

        <div class="info-box">
            <div class="info-label">Username</div>
            <div class="info-value"><?= $profil['username'] ?></div>
        </div>

        <div class="info-box">
            <div class="info-label">NIM</div>
            <div class="info-value"><?= $profil['nim'] ?></div>
        </div>

        <div class="info-box">
            <div class="info-label">Jurusan</div>
            <div class="info-value"><?= $profil['jurusan'] ?></div>
        </div>

        <hr class="my-4">

        <a href="dashboard_dosen.php" class="btn btn-secondary btn-back mb-3">
            Kembali
        </a>

    </div>

  <!-- =============================== -->
<!--  DAFTAR PROYEK MAHASISWA       -->
<!-- =============================== -->
<h3 class="fw-bold mt-5 mb-3">Proyek Milik <?= $profil['nama'] ?></h3>

<div class="row">

    <?php if (mysqli_num_rows($projek) == 0) : ?>

        <p class="text-muted">Mahasiswa ini belum memiliki proyek.</p>

    <?php else: ?>

        <?php while ($p = mysqli_fetch_assoc($projek)) : ?>

            <?php 
            // WAJIB: pastikan hasil fetch adalah array
            if (!is_array($p)) continue;

            // Semua data dijaga agar tidak melempar error offset
            $foto       = $p['foto'] ?? 'default.png';
            $judul      = $p['judul'] ?? '(Tanpa Judul)';
            $deskripsi  = $p['deskripsi'] ?? '';
            $id_projek  = $p['id_projek'] ?? 0;
            ?>

            <div class="col-md-4 mb-4">
                <div class="project-card">

                    <img src="../gambar/<?= $foto ?>" class="project-img">

                    <h5 class="fw-bold"><?= $judul ?></h5>

                    <p class="text-muted" style="font-size: 14px;">
                        <?= substr($deskripsi, 0, 100) ?>...
                    </p>

                    <a href="detail_projek.php?id_projek=<?= $id_projek ?>" 
                       class="btn btn-primary px-4"
                       style="border-radius:10px;">
                        Lihat Proyek
                    </a>

                </div>
            </div>

        <?php endwhile; ?>

    <?php endif; ?>

</div>

    </div>

</div>

<?php include "../template/footer.php"; ?>
