<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['id_user'])) {
    echo "<script>alert('Silakan login terlebih dahulu');
          window.location='../login.php';</script>";
    exit;
}

$session_id_user   = $_SESSION['id_user'];
$session_nama      = $_SESSION['nama'];
$session_profil    = $_SESSION['profil'];
$session_username  = $_SESSION['username'];
$session_jurusan   = $_SESSION['jurusan'];
?>

<!-- HEADER -->
<div class="header shadow"
     style="
     padding:15px 25px;
     background:white;
     display:flex;
     justify-content:space-between;
     align-items:center;
     position:fixed;
     top:0;
     left:0;
     right:0;
     height:70px;
     z-index:2000;
     border-bottom:1px solid #eee;
     ">

  <!-- Hamburger (Mobile Only) -->
  <button class="btn btn-outline-dark d-lg-none"
          data-bs-toggle="offcanvas"
          data-bs-target="#mobileSidebar">
    <i class="fa-solid fa-bars"></i>
  </button>

  <!-- Profile -->
  <div class="dropdown ms-auto">
    <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle"
       data-bs-toggle="dropdown">

      <span class="fw-semibold d-none d-sm-inline me-2">
        <?= $session_nama ?>
      </span>
      <img src="<?= $session_profil ?>" class="profile-img">
    </a>

    <ul class="dropdown-menu dropdown-menu-end shadow">
      <li>
        <a class="dropdown-item" href="../universal/profil.php">
          <i class="fa-solid fa-user me-2"></i> Profil
        </a>
      </li>
      <li><hr class="dropdown-divider"></li>
      <li>
        <a class="dropdown-item text-danger" href="../logout.php">
          <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
        </a>
      </li>
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
    <a class="nav-link mb-2" href="../dosen/dashboard_dosen.php">
      <i class="fa-solid fa-house me-2"></i> Beranda
    </a>
    <a class="nav-link mb-2" href="../dosen/laporan.php">
      <i class="fa-solid fa-plus me-2"></i> Laporan
    </a>
  </div>
</div>
