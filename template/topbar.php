<?php
@session_start();
include "../koneksi.php";

if (!isset($_SESSION['id_user'])) {
    echo "<script>alert('Silakan login terlebih dahulu');window.location='../login.php';</script>";
    exit;
}
$id_user = $_SESSION['id_user'];
$nama = $_SESSION['nama'];
$profil = $_SESSION['profil'];
?>
<div class="header shadow">

  <!-- Tombol menu (muncul di HP) -->
  <button class="btn btn-outline-dark d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
    <i class="fa-solid fa-bars"></i>
  </button>

  <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle"
       data-bs-toggle="dropdown">

      <span class="fw-semibold d-none d-sm-inline me-2"><?= $nama ?></span>
      <img src="<?= $profil ?>" class="profile-img">

    </a>

    <ul class="dropdown-menu dropdown-menu-end shadow">
      <li><a class="dropdown-item" href="../universal/profil.php"><i class="fa-solid fa-user me-2"></i> Profil</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item text-danger" href="../logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i> Keluar</a></li>
    </ul>
  </div>
</div>

<!-- SIDEBAR MOBILE -->
<div class="offcanvas offcanvas-start" id="mobileSidebar">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Menu</h5>
    <button class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>

  <div class="offcanvas-body">
    <a class="nav-link mb-2" href="../mahasiswa/dashboard_mahasiswa.php"><i class="fa-solid fa-house me-2"></i> Beranda</a>
    <a class="nav-link mb-2" href="../mahasiswa/form_tambah_proyek.php"><i class="fa-solid fa-plus me-2"></i> Tambah Proyek</a>
    <a class="nav-link text-danger" href="../logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</a>
  </div>
</div>
