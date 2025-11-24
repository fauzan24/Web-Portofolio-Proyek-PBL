<?php 
$title = "Dashboard Mahasiswa";
include "template/header.php";
include "template/sidebar.php";
include "template/topbar.php";
?>

<!-- MAIN CONTENT -->
<div class="main-content" style="margin-left:260px; padding:100px 20px;">
  <div class="container">
    <div class="row g-4">

      <?php
      $result = mysqli_query($koneksi, "SELECT * FROM projek ORDER BY id_projek DESC");
      while ($row = mysqli_fetch_assoc($result)) { ?>
        
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="project-card bg-white shadow p-3 rounded">

            <h5><?= $row['judul'] ?></h5>
            <img src="gambar/<?= $row['foto'] ?>" class="project-img" style="width:100%; height:160px; object-fit:cover; border-radius:10px;">
            <p><?= $row['deskripsi'] ?></p>

            <a href="detail_proyek.php?id_projek=<?= $row['id_projek'] ?>" 
               class="btn btn-primary mt-2 w-100">
              Lihat Portofolio
            </a>

          </div>
        </div>

      <?php } ?>

    </div>
  </div>
</div>

<?php include "template/footer.php"; ?>
