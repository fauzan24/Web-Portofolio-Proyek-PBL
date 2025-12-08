<?php
session_start();
include "../koneksi.php";

// Cek login
if (!isset($_SESSION['id_user'])) {
    echo "<script>alert('Silakan login terlebih dahulu'); 
          window.location='../login.php';</script>";
    exit;
}

// Ambil ID proyek
if (!isset($_GET['id_projek'])) {
    echo "<script>alert('Proyek tidak ditemukan'); 
          window.location='dashboard_dosen.php';</script>";
    exit;
}

$id_projek = $_GET['id_projek'];

// Ambil data proyek + pemilik
$projek_query = mysqli_query($koneksi, 
    "SELECT p.*, u.nama AS pemilik, u.username, u.jurusan
     FROM projek p
     LEFT JOIN users u ON p.id_user = u.id_user
     WHERE p.id_projek = '$id_projek'"
);

$projek = mysqli_fetch_assoc($projek_query);

if (!$projek) {
    echo "<script>alert('Data proyek tidak ditemukan'); 
          window.location='dashboard_dosen.php';</script>";
    exit;
}

// Ambil semua penilaian dari semua dosen
$nilai_query = mysqli_query($koneksi,
    "SELECT n.*, u.nama AS nama_dosen
     FROM penilaian n
     LEFT JOIN users u ON n.id_user = u.id_user
     WHERE n.id_projek = '$id_projek'
     ORDER BY n.id_penilaian DESC"
);

// Ambil semua komentar
$komentar_query = mysqli_query($koneksi,
    "SELECT k.*, u.nama AS nama_pengomentar
     FROM komentar k
     LEFT JOIN users u ON k.id_user = u.id_user
     WHERE k.id_projek = '$id_projek'
     ORDER BY k.id_komentar DESC"
);

// Cek apakah dosen ini sudah pernah menilai proyek ini
$id_dosen = $_SESSION['id_user'];
$cek_nilai_dosen = mysqli_query($koneksi,
    "SELECT * FROM penilaian 
     WHERE id_projek = '$id_projek' 
     AND id_user = '$id_dosen'"
);
$nilai_saya = mysqli_fetch_assoc($cek_nilai_dosen);


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

    .project-card {
        background: #fff;
        padding: 35px;
        border-radius: 20px;
        box-shadow: 0px 6px 20px rgba(0,0,0,0.08);
        max-width: 900px;
        margin: auto;
    }

    .project-img {
        width: 100%;
        height: 330px;
        object-fit: cover;
        border-radius: 12px;
    }

    .section-title {
        font-weight: 700;
        font-size: 20px;
        margin-top: 25px;
        color: #0b3551;
    }

    .komentar-box, .nilai-box {
        background: #f7faff;
        border-left: 4px solid #0b3551;
        padding: 12px 18px;
        border-radius: 8px;
        margin-bottom: 12px;
    }
</style>

<div class="content-wrapper">

    <div class="project-card">

        <!-- FOTO -->
        <img src="../gambar/<?= $projek['foto'] ?>" class="project-img">

        <h2 class="mt-3 fw-bold"><?= $projek['judul'] ?></h2>

        <p class="text-muted mb-2" style="font-size: 14px;">
            Oleh: <b><?= $projek['pemilik'] ?></b> (<?= $projek['username'] ?>) — <?= $projek['jurusan'] ?>
        </p>

        <hr>

        <!-- DESKRIPSI -->
        <div>
            <div class="section-title">Deskripsi Proyek</div>
            <p><?= nl2br($projek['deskripsi']) ?></p>
        </div>

        <hr>

        <!-- FILE -->
        <div>
            <div class="section-title">File Dokumen</div>
            <a href="<?= $projek['link_file'] ?>" target="_blank" class="btn btn-outline-primary mt-2">
                Buka File Dokumen
            </a>

            <div class="section-title mt-4">Video Presentasi</div>
            <a href="<?= $projek['link_yt'] ?>" target="_blank" class="btn btn-outline-danger mt-2">
                Tonton di YouTube
            </a>
        </div>

        <hr>

        <!-- PENILAIAN -->
        <div>
            <div class="section-title">Penilaian Dosen</div>

            <?php
            if (mysqli_num_rows($nilai_query) == 0) {
                echo "<p class='text-muted'>Belum ada penilaian.</p>";
            } else {
                $total = 0;
                $jumlah = 0;

                while ($n = mysqli_fetch_assoc($nilai_query)) {
                    echo "
                        <div class='nilai-box'>
                            <b>Dosen: {$n['nama_dosen']}</b><br>
                            Nilai: <span class='badge bg-success p-2'>{$n['nilai']}</span>
                        </div>
                    ";
                    $total += $n['nilai'];
                    $jumlah++;
                }

                $rata = $total / $jumlah;
                echo "<h4 class='mt-3'>Rata-rata Nilai: <span class='badge bg-primary p-2'>".round($rata,2)."</span></h4>";
            }
            ?>
        </div>

        <hr>

        <!-- FORM PENILAIAN -->
        <div>
            <div class="section-title">
                <?= $nilai_saya ? "Edit Penilaian Anda" : "Tambah Penilaian" ?>
            </div>

            <form action="<?= $nilai_saya ? 'update_nilai.php' : 'simpan_nilai.php' ?>" method="POST">
                <input type="hidden" name="id_projek" value="<?= $id_projek ?>">
                <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">
                
                <?php if ($nilai_saya): ?>
                    <input type="hidden" name="id_penilaian" value="<?= $nilai_saya['id_penilaian'] ?>">
                <?php endif; ?>

                <label class="fw-semibold mt-2">Nilai:</label>
                <input type="number" name="nilai" class="form-control"
                    value="<?= $nilai_saya ? $nilai_saya['nilai'] : '' ?>"
                    placeholder="Masukkan nilai (0–100)" 
                    min="0" max="100" required>


                <button class="btn btn-primary mt-3">
                    <?= $nilai_saya ? "Update Nilai" : "Simpan Penilaian" ?>
                </button>
            </form>
        </div>

        <hr>

        <!-- KOMENTAR -->
        <div>
            <div class="section-title">Komentar</div>

            <?php
            if (mysqli_num_rows($komentar_query) == 0) {
                echo "<p class='text-muted'>Belum ada komentar.</p>";
            }

            while ($k = mysqli_fetch_assoc($komentar_query)) {
                echo "
                <div class='komentar-box'>
                    <b>{$k['nama_pengomentar']}:</b><br>
                    ".nl2br($k['komentar'])."
                </div>
                ";
            }
            ?>
        </div>

        <hr>

        <!-- FORM KOMENTAR -->
        <div>
            <div class="section-title">Tambah Komentar</div>

            <form action="simpan_komentar.php" method="POST">
                <input type="hidden" name="id_projek" value="<?= $id_projek ?>">
                <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">

                <textarea name="komentar" class="form-control" rows="3" placeholder="Tulis komentar..." required></textarea>

                <button class="btn btn-primary mt-3">Kirim Komentar</button>
            </form>
        </div>

        <hr>

        <a href="dashboard_dosen.php" class="btn btn-secondary">Kembali</a>

    </div>

</div>

<?php include "../template/footer.php"; ?>
