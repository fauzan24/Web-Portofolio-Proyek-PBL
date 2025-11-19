<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Proyek - Politeknik Negeri Batam</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <style>
    body {
      background:linear-gradient(rgba(5, 16, 75, 0.6), rgba(5, 16, 75, 0.6)), url('asset/GU.jpg') center/cover fixed no-repeat;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
    }

    .login-card {
      background-color: rgba(255, 255, 255, 0.85);
      border-radius: 10px;
      padding: 30px;
      width: 1000px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    }

    .form-control, .form-select {
      background-color: white;
      border: 1px solid #ced4da;
      padding: 10px 15px;
      color: #343a40;
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
      .login-card { padding: 25px 20px; }
      h1 { font-size: 1.8rem; }
      .btn-dark-custom { padding: 8px 0; }
    }
  </style>
</head>
<body class="text-dark">

  <div class="login-card">

    <h1 class="text-center mb-4 fw-bold">Tambah Proyek</h1>

    <form method = "POST" action = "proses_tambah_proyek.php" enctype="multipart/form-data">

      <div class="mb-3">
        <label class="form-label fw-bold">Judul Proyek</label>
        <input type="text" name="judul" class="form-control" placeholder="Masukkan judul proyek anda">
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Semester</label>
        <select class="form-select" name="semester">
          <option selected disabled>Pilih Semester Anda</option>
          <option value="ganjil">Ganjil</option>
          <option value="genap">Genap</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" placeholder="Masukkan deskripsi proyek" style="height: 100px;"></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Ketua Tim</label>
        <input type="text" name="ketua" class="form-control" placeholder="Masukkan nama ketua tim">
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Anggota Tim</label>
        <input type="text" name="anggota" class="form-control" placeholder="Masukkan nama anggota tim">
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">Link File</label>
        <input type="url" name="link_file" class="form-control" placeholder="Masukkan link file">
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold">URL YouTube</label>
        <input type="url" name="link_yt" class="form-control" placeholder="Masukkan URL YouTube">
      </div>

      <div class="mb-4">
        <label class="form-label fw-bold">Foto Proyek</label>
        <input type="file" name="foto" class="form-control" accept="image/*">
      </div>

      <div class="d-flex justify-content-between">
        <a href="dashboard_mahasiswa.php" class="btn btn-dark-custom text-white">Kembali</a>
        <button type="submit" class="btn btn-dark-custom text-white">Tambah</button>
      </div>

    </form>

  </div>

  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
