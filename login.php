<?php
session_start();

// Jika sudah login, arahkan langsung ke dashboard
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'mahasiswa') header("Location: mahasiswa/dashboard_mahasiswa.php");
    if ($_SESSION['role'] == 'dosen') header("Location: dosen/dashboard_dosen.php");
    if ($_SESSION['role'] == 'admin') header("Location: admin/dashboard_admin.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Politeknik Negeri Batam</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <style>
    body {
      background: linear-gradient(rgba(5, 16, 75, 0.6), rgba(5, 16, 75, 0.6)), 
                  url('asset/tecno.jpg') center/cover fixed no-repeat;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Poppins', sans-serif;
    }
    .card {
      backdrop-filter: blur(5px);
      background-color: rgba(255, 255, 255, 0.9);
    }
  </style>
</head>

<body>

<div class="container">
    <div class="row justify-content-center min-vh-100 align-items-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg border-0 rounded-4 p-4">
                <div class="card-body">

                    <h1 class="text-center mb-4 fw-bold text-dark">Masuk</h1>

                    <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger"><?= $_GET['error']; ?></div>
                    <?php } ?>

                    <form action="proses_login.php" method="POST">

                        <div class="mb-3">
                            <label class="form-label">Nama Pengguna</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan Nama Pengguna" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kata Sandi</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Kata Sandi" required>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                            <a href="landing_page.php" class="btn btn-dark fw-semibold w-100 me-md-2">Kembali</a>
                            <button type="submit" class="btn btn-dark fw-semibold w-100">Masuk</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
