<?php 
session_start();
$id_user = $_SESSION['id_user'];
include "../koneksi.php"; 
include "../template/header.php"; 
include "../template/sidebar.php"; 
include "../template/topbar.php"; 

?>

<!-- MAIN CONTENT -->
 <div class="main-content" style="margin-left:260px; padding:100px 20px;">
  <div class="container">
    <div class="row g-4">

      <div class="login-card mx-auto mt-4">

      <h1 class="text-center mb-4 fw-bold">Tambah Proyek</h1>

      <form method="POST" action="proses_tambah_proyek.php" enctype="multipart/form-data">

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

        <input type="number" name="id_user" value="<?= $_SESSION['id_user'] ?>" hidden>

        <div class="d-flex justify-content-between">
          <a href="dashboard_mahasiswa.php" class="btn btn-dark-custom text-white">Kembali</a>
          <button type="submit" class="btn btn-dark-custom text-white">Tambah</button>
        </div>

      </form>

    </div>

    </div>
  </div>
</div>
<div class="main-content">
  <div class="container">

    

  </div>
</div>

<?php include "../template/footer.php"; ?>
