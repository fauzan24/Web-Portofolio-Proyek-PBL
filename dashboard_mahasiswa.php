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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    body {
      background: linear-gradient(rgba(5, 16, 75, 0.6), rgba(5, 16, 75, 0.6)),
                  url('asset/GU.jpg') center/cover no-repeat;
      font-family: 'Poppins', sans-serif;
    }

    .navbar {
      background-color: #0b3551;
      padding: 0.8rem 1rem;
      transition: box-shadow 0.3s ease-in-out;
    }

    .project-card {
      background-color: rgba(255,255,255,0.95);
      border-radius: 20px;
      padding: 1rem;
      box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
      transition: .2s;
      text align: center;
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
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #0b3551;">>
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">
      <img src="asset/logo.png" width="30" class="me-2">
      PortoLearn
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
        <li class="nav-item"><a class="nav-link" href="daftar.html">Daftar Akun</a></li>
        <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Tombol Tambah Proyek -->
<div class="container mt-4 text-end">
  <a href="form_tambah_proyek.php" class="btn btn-light fw-semibold rounded-pill px-4 shadow-sm">
   <i class="fa-solid fa-plus"></i> Tambah Proyek
  </a>
</div>

<!-- Konten -->
<div class="container content-section mt-4">
  <div class="row justify-content-center">

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="col-md-4 mb-4">
        <div class="project-card text-center">

          <h5><?= $row['judul'] ?></h5>

          <img src="gambar/<?= $row['foto'] ?>" class="project-img" alt="gambar proyek">
          <p><?= $row['deskripsi']?></p>

          <a href="detail_proyek.php?id_projek=<?= $row['id_projek'] ?>" class="btn btn-portofolio mt-2">
            Lihat Portofolio
          </a>

        </div>
      </div>
    <?php } ?>

  </div>
</div>

</body>
</html>
