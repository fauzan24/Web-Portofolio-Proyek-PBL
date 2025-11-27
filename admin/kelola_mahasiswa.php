<?php
include "../koneksi.php";
include "../template_admin/header.php";
include "../template_admin/sidebar.php";
include "../template_admin/topbar.php";

// Query ambil data user
$result = mysqli_query($koneksi, "SELECT * FROM users WHERE `role` = 'mahasiswa' ORDER BY id_user DESC");
?>

<style>
  .content-wrapper {
    margin-left: 240px;
    padding: 100px 30px 40px;
  }
  .card-custom {
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
  }
  .table thead {
    background-color: #0b3551;
    color: white;
  }
</style>

<div class="content-wrapper">

  <h3 class="fw-bold">Kelola Mahasiswa</h3>
  <p class="text-muted">Daftar seluruh user yang terdaftar pada sistem</p>

  <div class="card card-custom mt-3">

    <a href="tambah_mahasiswa.php" class="btn btn-primary mb-3">
      + Tambah User
    </a>

    <table class="table table-bordered table-striped table-hover align-middle">
      <thead>
        <tr class="text-center">
          <th>No</th>
          <th>Nama</th>
          <th>Username</th>
          <th>NIM</th>
          <th>Jurusan</th>
          <th>Password</th>
          <th>Role</th>
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
            <td><?= $row['jurusan'] ?></td>
            <td><?= $row['password'] ?></td>
            <td class="text-center">
              <span class="badge 
                <?= ($row['role'] == 'admin' ? 'bg-danger' :
                    ($row['role'] == 'dosen' ? 'bg-primary' : 'bg-success')) ?>">
                <?= ucfirst($row['role']) ?>
              </span>
            </td>
            <td class="text-center">
              <a href="edit_mahasiswa.php?id=<?= $row['id_user'] ?>" class="btn btn-warning btn-sm">
                Edit
              </a>
              <a href="hapus_user.php?id=<?= $row['id_user'] ?>" class="btn btn-danger btn-sm"
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

<?php include "../template/footer.php"; ?>
