<?php 
$title = "Dashboard Mahasiswa";
include "../template/header.php";
include "../template/sidebar.php";
include "../template/topbar.php";

$id_user = $_SESSION['id_user'];
$nama = $_SESSION['nama'];
?>

<div class="main-content">
  <div class="container">
    <h3 class="fw-bold">Selamat Datang <?= $nama ?></h3>
    <p class="text-muted">Daftar proyekmu</p>

    <div class="row g-4">
      <?php
      $result = mysqli_query($koneksi, "SELECT * FROM projek WHERE id_user='$id_user' ORDER BY id_projek DESC");
      while ($row = mysqli_fetch_assoc($result)) { ?>
        
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="project-card bg-white shadow p-3 rounded">

            <h5><?= $row['judul'] ?></h5>

            <img src="../gambar/<?= $row['foto'] ?>" class="project-img">

            <p class="project-description"><?= $row['deskripsi'] ?></p>

            <a href="detail_proyek.php?id_projek=<?= $row['id_projek'] ?>" 
               class="btn btn-primary w-100 mt-2">
              Lihat Portofolio
            </a>

          </div>
        </div>

      <?php } ?>
    </div>

  </div>
</div>

<?php include "../template/footer.php"; ?>
