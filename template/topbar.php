<!-- HEADER -->
<div class="header shadow"
     style="margin-left:240px; padding:15px 25px; background:white; display:flex;
            justify-content:flex-end; align-items:center; position:fixed; top:0; left:0; 
            right:0; height:70px; z-index:2000; border-bottom:1px solid white;">

  <!-- Tombol sidebar untuk HP -->
  <button class="btn btn-outline-dark d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
    <i class="fa-solid fa-bars"></i>
  </button>

  <!-- Profile Dropdown -->
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle"
       id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false">

        <span class="fw-semibold d-none d-sm-inline me-2">Mahasiswa</span>
        <img src="asset/fauzan.jpg" class="profile-img">
    </a>

    <ul class="dropdown-menu dropdown-menu-end shadow">
      <li><a class="dropdown-item" href="profil.php"><i class="fa-solid fa-user me-2"></i> Profil</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item text-danger" href="logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</a></li>
    </ul>
  </div>

</div>

<!-- SIDEBAR MOBILE (OFFCANVAS) -->
<div class="offcanvas offcanvas-start" id="mobileSidebar">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Menu</h5>
    <button class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>

  <div class="offcanvas-body">
    <a class="nav-link mb-2" href="#"><i class="fa-solid fa-house me-2"></i> Beranda</a>
    <a class="nav-link mb-2" href="#"><i class="fa-solid fa-circle-info me-2"></i> Tentang</a>
    <a class="nav-link mb-2" href="form_tambah_proyek.php"><i class="fa-solid fa-plus me-2"></i> Tambah Proyek</a>
    <a class="nav-link text-danger" href="logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</a>
  </div>
</div>
