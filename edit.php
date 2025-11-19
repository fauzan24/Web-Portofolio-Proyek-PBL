<?php
include "koneksi.php";

// Query ambil data proyek
$id_projek = $_GET['id_projek']; // <-- NULL
$result = mysqli_query($koneksi, "SELECT * FROM projek WHERE `id_projek`= '$id_projek'");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Proyek - Politeknik Negeri Batam</title>

  <!-- Bootstrap Local -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <style>
    body {
      background: linear-gradient(rgba(5, 16, 75, 0.6), rgba(5, 16, 75, 0.6)), url('asset/GU.jpg') center/cover fixed no-repeat;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
      background-blend-mode: darken;
    }

    .form-card {
      background: rgba(255, 255, 255, 0.8);
      padding: 30px;
      border-radius: 10px;
      width: 1000px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    }

    .form-label {
      font-weight: bold;
      color: #343a40;
    }

    .form-control,
    .form-select {
      border: 1px solid #ced4da;
      background-color: white;
      color: #343a40;
      padding: 10px 15px;
    }

        .btn-dark-custom {
            background-color: #343a40;
            border-color: #343a40;
            width: 48%;
            padding: 10px 0;
            font-weight: bold;
        }

        .btn-dark-custom:hover {
            background-color: #212529;
            transform: translateY(-2px);
        }

    @media (max-width: 576px) {
      .form-card { padding: 25px 20px; }
      h1 { font-size: 1.8rem; }
      .btn-custom { padding: 8px 0; }
    }
  </style>
</head>

<body class="text-dark">

  <div class="form-card">
    <h1 class="text-center mb-4 fw-bold">Edit Proyek</h1>

    <form action="proses_edit_proyek.php" method="POST" enctype="multipart/form-data">

    <!-- wajib dikirim -->
    <input type="hidden" name="id_projek" value="<?= $row['id_projek'] ?>">
    <input type="hidden" name="foto_lama" value="<?= $row['foto'] ?>">

    <div class="mb-3">
        <label class="form-label">Judul Proyek</label>
        <input type="text" name="judul" class="form-control" value="<?= $row['judul'] ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Semester</label>
        <select name="semester" class="form-select">
            <option disabled>Pilih Semester Anda</option>
            <option value="ganjil" <?= ($row['semester'] == "ganjil" ? "selected" : "") ?>>Ganjil</option>
            <option value="genap" <?= ($row['semester'] == "genap" ? "selected" : "") ?>>Genap</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea class="form-control" name="deskripsi"><?= $row['deskripsi'] ?></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Ketua Tim</label>
        <input type="text" name="ketua" class="form-control" value="<?= $row['ketua'] ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Anggota Tim</label>
        <input type="text" name="anggota" class="form-control" value="<?= $row['anggota'] ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Link File</label>
        <input type="url" name="link_file" class="form-control" value="<?= $row['link_file'] ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">URL YouTube</label>
        <input type="url" name="link_yt" class="form-control" value="<?= $row['link_yt'] ?>">
    </div>

    <div class="mb-4">
        <label class="form-label">Foto Proyek</label>
        <img src="gambar/<?= $row['foto'] ?>" class="project-img img-fluid mb-2">
        <input type="file" name="foto" class="form-control" accept="image/*">
    </div>

    <div class="d-flex justify-content-between">
        <a href="detail_proyek.php?id_projek=<?= $row['id_projek'] ?>" class="btn btn-dark-custom text-white">Kembali</a>
        <button type="submit" class="btn btn-dark-custom text-white">Simpan</button>
    </div>

</form>

  </div>

  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
