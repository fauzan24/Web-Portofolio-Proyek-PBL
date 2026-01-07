  <?php
  include "../koneksi.php";
  include "../template_admin/header.php";
  include "../template_admin/sidebar.php";
  include "../template_admin/topbar.php";

  $id_user = $_SESSION['id_user'];
  $nama = $_SESSION['nama'];

  if (!isset($_SESSION['id_user'])) {
      echo "<script>alert('Silakan login terlebih dahulu'); 
            window.location='../login.php';</script>";
      exit;
  }

  // Hitung jumlah data
  $jumlahProjek = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM projek"))['total'];
  $jumlahMahasiswa = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM users WHERE role = 'mahasiswa'"))['total'];
  $jumlahDosen = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM users WHERE role = 'dosen'"))['total'];

  // Ambil 5 proyek terbaru
  $dataProjek = mysqli_query($koneksi, "SELECT * FROM projek ORDER BY id_projek DESC LIMIT 5");
  ?>

  <style>
    .content-wrapper {
      margin-left: 240px;
      padding: 90px 30px 40px;
    }

    .card-custom {
      border-radius: 15px;
      background-color: white;
      box-shadow: 0 5px 10px rgba(0,0,0,0.05);
      transition: .2s;
    }

    .card-custom:hover {
      transform: translateY(-4px);
    }

    .table thead {
      background-color: #0b3551;
      color: white;
    }
  </style>

  <div class="content-wrapper">
    <h3 class="fw-bold">Selamat Datang  <?= $nama ?></h3>
    <p class="text-muted">Ringkasan aktivitas sistem</p>

    <!-- CARD STATISTIK -->
    <div class="row mt-4">
      
      <div class="col-md-4 mb-3">
        <div class="card card-custom p-3 text-center">
          <h5>Total Proyek</h5>
          <h2 class="fw-bold text-primary"><?= $jumlahProjek ?></h2>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="card card-custom p-3 text-center">
          <h5>Total Mahasiswa</h5>
          <h2 class="fw-bold text-success"><?= $jumlahMahasiswa ?></h2>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="card card-custom p-3 text-center">
          <h5>Total Dosen</h5>
          <h2 class="fw-bold text-danger"><?= $jumlahDosen ?></h2>
        </div>
      </div>

    </div>

  </div>

  <?php include "../template_admin/footer.php"; ?>
