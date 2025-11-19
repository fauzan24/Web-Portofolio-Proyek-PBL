<?php
include "koneksi.php";

// Query ambil data proyek
$result = mysqli_query($koneksi, "SELECT * FROM projek ORDER BY id_projek DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Mahasiswa</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(rgba(5, 16, 75, 0.6), rgba(5, 16, 75, 0.6)),
                  url('asset/GU.jpg') center/cover no-repeat;
      font-family: 'Poppins', sans-serif;
    }

    .project-card {
      background-color: rgba(255,255,255,0.95);
      border-radius: 20px;
      padding: 1rem;
      box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
      transition: .2s;
    }

    .project-card:hover {
      transform: translateY(-5px);
    }

    .btn-portofolio {
      background-color: #0b3551;
      color: white;
      border-radius: 12px;
      padding: 8px 15px;
    }

    img.project-img {
      width: 100%;
      height: 160px;
      object-fit: cover;
      border-radius: 10px;
    }
  </style>
</head>

<body>

<!-- Tombol Tambah Proyek -->
<div class="container mt-4 text-end">
  <a href="form_tambah_proyek.php" class="btn btn-light fw-semibold rounded-pill px-4 shadow-sm">
    Tambah Proyek
  </a>
</div>

<!-- Konten -->
<div class="container content-section mt-4">
  <div class="row justify-content-center">

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="col-md-4 mb-4">
        <div class="project-card">

          <h5><?= $row['judul'] ?></h5>

          <img src="gambar/<?= $row['foto'] ?>" class="project-img" alt="gambar proyek">
          <p><?= $row['deskripsi']?></p>

          <a href="detail_proyek.php?id=<?= $row['id_projek'] ?>" class="btn btn-portofolio mt-2">
            Lihat Portofolio
          </a>

        </div>
      </div>
    <?php } ?>

  </div>
</div>

</body>
</html>
