<style>
  /* Agar dropdown tidak mengambang */
.sidebar .dropdown-menu {
  position: static !important;
  transform: none !important;
  background-color: transparent !important;
  border: none !important;
  width: 100%;
  padding-left: 15px;
}

/* Style item di dalam dropdown */
.sidebar .dropdown-item {
  color: #cfd9e5 !important;
  padding: 10px 20px;
  font-size: 14px;
}

.sidebar .dropdown-item:hover {
  background-color: #0d425f !important;
  border-radius: 6px;
  color: #ffffff !important;
}

</style>

<!-- SIDEBAR DESKTOP -->
<div class="sidebar d-none d-lg-block" 
     style="width:240px; height:100vh; position:fixed; top:0; left:0; background:#0b3551; padding-top:20px; color:white;">

  <h4 class="text-center fw-bold mb-4">Dashboard Admin</h4>

  <ul class="nav flex-column">
    <li><a class="nav-link active text-white" href="../admin/dashboard_admin.php"><i class="fa-solid fa-house me-2"></i> Beranda</a></li>
    <!-- Dropdown Kelola User -->
    <li class="nav-item dropdown">
  <a class="nav-link text-white dropdown-toggle"
     href="#" id="kelolaUserDropdown"
     role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-users-gear me-2"></i> Kelola User
  </a>

  <ul class="dropdown-menu" aria-labelledby="kelolaUserDropdown">
    <li><a class="dropdown-item" href="../admin/kelola_mahasiswa.php">Kelola Mahasiswa</a></li>
    <li><a class="dropdown-item" href="../admin/kelola_dosen.php">Kelola Dosen</a></li>
  </ul>

</li>



</div>
