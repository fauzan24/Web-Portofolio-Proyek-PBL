<?php
include "../koneksi.php";
include "../template_admin/header.php";
include "../template_admin/sidebar.php";
include "../template_admin/topbar.php";

// Query ambil data user
$result = mysqli_query($koneksi, "SELECT * FROM users WHERE `role` = 'dosen' ORDER BY id_user DESC");
?>

<style>
/* ================= CONTENT WRAPPER ================= */
.content-wrapper {
  margin-left: 240px;
  padding: 100px 30px 90px; /* aman header & footer */
  min-height: 100vh;
  background: #f5f7fb;
}

/* ================= CARD ================= */
.card-custom {
  border-radius: 15px;
  padding: 20px;
  background: #ffffff;
  box-shadow: 0 5px 15px rgba(0,0,0,0.08);
}

/* ================= TABLE ================= */
.table thead {
  background-color: #0b3551;
  color: white;
}

.table td,
.table th {
  vertical-align: middle;
}

/* ================= RESPONSIVE ================= */
@media (max-width: 991px) {
  .content-wrapper {
    margin-left: 0;
    padding: 95px 20px 90px;
  }
}

@media (max-width: 576px) {
  h3.fw-bold {
    font-size: 20px;
  }
}
</style>

<div class="content-wrapper">

  <h3 class="fw-bold">Kelola Dosen</h3>
  <p class="text-muted">Daftar seluruh user yang terdaftar pada sistem</p>

  <div class="card card-custom mt-3">

    <a href="tambah_dosen.php" class="btn btn-primary mb-3">
      + Tambah User
    </a>

    <!-- TABLE RESPONSIVE -->
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover align-middle mb-0">
        <thead>
          <tr class="text-center">
            <th>No</th>
            <th>Nama</th>
            <th>Nama Pengguna</th>
            <th>NIP</th>
            <th>Kata Sandi</th>
            <th>Peran</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          <?php 
          $no = 1;
          while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td class="text-center"><?= $no++ ?></td>
              <td><?= $row['nama'] ?></td>
              <td><?= $row['username'] ?></td>
              <td><?= $row['nim'] ?></td>
              <td><?= $row['password'] ?></td>
              <td class="text-center">
                <span class="badge 
                  <?= ($row['role'] == 'admin' ? 'bg-danger' :
                      ($row['role'] == 'dosen' ? 'bg-primary' : 'bg-success')) ?>">
                  <?= ucfirst($row['role']) ?>
                </span>
              </td>
              <td class="text-center d-flex gap-2 justify-content-center">
                <a href="edit_dosen.php?id=<?= $row['id_user'] ?>" 
                   class="btn btn-warning btn-sm mb-1">
                  Edit
                </a>
                <a href="hapus.php?id=<?= $row['id_user'] ?>&page=dosen" 
                   class="btn btn-danger btn-sm mb-1"
                   onclick="return confirm('Yakin ingin menghapus user ini?')">
                  Hapus
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>

      </table>
    </div>

  </div>

</div>

<?php include "../template_admin/footer.php"; ?>
