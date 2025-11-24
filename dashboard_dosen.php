<?php
include "koneksi.php";

// Load template
include "template_dosen/header.php";
include "template_dosen/sidebar.php";
include "template_dosen/topbar.php";

// Query ambil data proyek
$result = mysqli_query($koneksi, "SELECT * FROM projek ORDER BY id_projek DESC");
?>

<style>
  .content-wrapper {
    margin-left: 240px;
    padding: 120px 30px 40px;
  }

  .project-card {
    background-color: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
    padding: 1rem;
    text-align: center;
  }

  .project-card:hover {
    transform: translateY(-5px);
    transition: 0.2s;
  }

  .btn-penilaian {
    background-color: #0b3551;
    color: white;
    border-radius: 15px;
  }
</style>

<div class="content-wrapper">

  <!-- Search -->
  <div class="container text-center mb-4">
    <div class="col-12 col-md-6 mx-auto">
      <input type="text" class="form-control form-control-lg rounded-pill" placeholder="🔍  Cari proyek...">
    </div>
  </div>

  <!-- Konten -->
  <div class="row">

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="col-md-4 mb-4">
        <div class="project-card">

          <h5><?= $row['judul'] ?></h5>

          <img src="gambar/<?= $row['foto'] ?>" class="img-fluid rounded mb-3" style="height:140px; object-fit:cover;">

          <p class="text-muted"><?= substr($row['deskripsi'], 0, 120) ?>...</p>

          <a href="form_penilaian_dosen.php?id_projek=<?= $row['id_projek'] ?>" class="btn btn-penilaian px-4 mt-2">
            Tambah Penilaian
          </a>

        </div>
      </div>
    <?php } ?>

  </div>

</div>

<?php include "template/footer.php"; ?>
