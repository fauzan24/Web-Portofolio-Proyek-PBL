<?php
include "../koneksi.php";

// Load template
include "../template_dosen/header.php";
include "../template_dosen/sidebar.php";
include "../template_dosen/topbar.php";

// ----------------------------
// FILTER & SEARCH IMPLEMENTASI
// ----------------------------

// Filter Jurusan
$filterJurusan = isset($_GET['jurusan']) ? $_GET['jurusan'] : "";

// Search NIM
$searchNIM = isset($_GET['nim']) ? $_GET['nim'] : "";

// Query Dynamic
$query = "SELECT * FROM users WHERE role = 'mahasiswa'";

// Jika filter jurusan dipilih
if ($filterJurusan != "") {
    $query .= " AND jurusan = '$filterJurusan'";
}

// Jika search NIM diisi
if ($searchNIM != "") {
    $query .= " AND nim LIKE '%$searchNIM%'";
}

$query .= " ORDER BY nama ASC";

// Ambil data mahasiswa
$result = mysqli_query($koneksi, $query);

// Ambil daftar jurusan untuk dropdown
$jurusanData = mysqli_query($koneksi, "SELECT DISTINCT jurusan FROM users WHERE role='mahasiswa'");
?>

<style>
  .content-wrapper {
    margin-left: 240px;
    padding: 90px 30px 40px;
  }

  .profile-card {
    background-color: #ffffff;
    border-radius: 18px;
    box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
    padding: 20px;
    text-align: center;
    transition: 0.2s;
  }

  .profile-card:hover {
    transform: translateY(-6px);
  }

  .profile-img-detail {
    width: 110px;
    height: 110px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #0b3551;
  }

  .btn-profile {
    background-color: #0b3551;
    color: white;
    border-radius: 12px;
    padding: 8px 20px;
  }

  /* FILTER STYLE */
  .filter-container {
    background: #ffffff;
    padding: 18px 22px;
    border-radius: 14px;
    box-shadow: 0px 4px 12px rgba(0,0,0,0.08);
    margin-bottom: 25px;
  }

  .filter-title {
    font-size: 16px;
    font-weight: 600;
    color: #0b3551;
    margin-bottom: 8px;
  }

  .filter-select {
    border-radius: 10px;
    padding: 10px;
  }

  .search-group {
    display: flex;
    gap: 8px;
  }

  .search-input {
    flex: 1;
    border-radius: 10px;
    padding: 10px;
  }

  .search-btn {
    background-color: #0b3551;
    color: white;
    border-radius: 10px;
    padding: 10px 18px;
    border: none;
  }

  .search-btn:hover {
    background-color: #124568;
  }

  .reset-btn {
    border-radius: 10px;
    padding: 10px 18px;
  }

  /* ============================== */
/*     RESPONSIVE CONTENT WRAP     */
/* ============================== */

@media (max-width: 1200px) {
  .content-wrapper {
    padding: 90px 20px !important;
  }
}

@media (max-width: 992px) {
  .content-wrapper {
    margin-left: 0 !important;
    padding: 85px 20px !important;
  }

  .filter-container {
    padding: 16px !important;
  }
}

@media (max-width: 768px) {
  .search-group {
    flex-direction: column;
  }

  .search-btn,
  .reset-btn {
    width: 100%;
  }
}

@media (max-width: 576px) {
  h3 {
    font-size: 20px;
  }

  .profile-card {
    padding: 15px !important;
  }

  .profile-img-detail {
    width: 90px;
    height: 90px;
  }
}

</style>

<div class="content-wrapper">
  
  <h3 class="fw-bold mb-3">Daftar Profil Mahasiswa</h3>
  <p class="text-muted">Berikut adalah seluruh mahasiswa yang terdaftar dalam sistem.</p>

  <!-- ============================= -->
  <!-- FILTER & SEARCH (BARU)        -->
  <!-- ============================= -->

  <div class="filter-container">

    <div class="row">

      <!-- Filter Jurusan -->
      <div class="col-md-4 mb-3">
        <div class="filter-title">Filter Jurusan</div>
        <form method="GET">
          <select name="jurusan" class="form-control filter-select" onchange="this.form.submit()">
            <option value="">Semua Jurusan</option>
          <?php while($j = mysqli_fetch_assoc($jurusanData)) { ?>
            <option value="<?= $j['jurusan'] ?>" 
              <?= ($filterJurusan == $j['jurusan']) ? 'selected' : '' ?>>
              <?= $j['jurusan'] ?>
            </option>
          <?php } ?>
          </select>
        </form>
      </div>

      <!-- Search NIM -->
      <div class="col-md-5 mb-3">
        <div class="filter-title">Cari NIM</div>
        <form method="GET">
          <div class="search-group">
            <input type="text" name="nim" class="form-control search-input"
                   placeholder="Masukkan NIM..."
                   value="<?= $searchNIM ?>">
            <button class="search-btn">Cari</button>
          </div>
        </form>
      </div>

      <!-- Reset -->
      <div class="col-md-3 mb-3 d-flex align-items-end">
        <a href="daftar_mahasiswa.php" class="btn btn-secondary w-100 reset-btn">Reset</a>
      </div>

    </div>

  </div>

  <!-- ============================= -->
  <!-- LIST MAHASISWA                -->
  <!-- ============================= -->

  <div class="row">

    <?php while ($mhs = mysqli_fetch_assoc($result)) { ?>

      <div class="col-md-4 mb-4">
        <div class="profile-card">

          <img src="<?= $mhs['profil']?>" class="profile-img-detail mb-3">

          <h5 class="fw-bold mb-1"><?= $mhs['nama'] ?></h5>

          <p class="text-muted mb-1">@<?= $mhs['username'] ?></p>

          <p class="fw-semibold text-primary mb-1" style="font-size: 14px;">
            NIM: <?= $mhs['nim'] ?>
          </p>

          <p class="fw-semibold text-secondary" style="font-size: 14px;">
            Jurusan: <?= $mhs['jurusan'] ?>
          </p>

          <a href="profil_mahasiswa.php?id_user=<?= $mhs['id_user'] ?>" class="btn btn-profile mt-2">
            Lihat Profil
          </a>

        </div>
      </div>

    <?php } ?>

  </div>

</div>

<?php include "../template/footer.php"; ?>
