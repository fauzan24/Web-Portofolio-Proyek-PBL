<?php
include "koneksi.php";

// Query ambil data proyek
$id_projek = $_GET['id_projek']; // <-- NULL
$result = mysqli_query($koneksi, "SELECT * FROM projek WHERE `id_projek`= '$id_projek'");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penilaian Proyek</title>

    <!-- Bootstrap Local -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <style>
        body {
            background:linear-gradient(rgba(5, 16, 75, 0.6), rgba(5, 16, 75, 0.6)), url('asset/tecno.jpg') center/cover fixed no-repeat;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 15px;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.85);
            border-radius: 15px;
            padding: 30px;
            width: 1000px;
            
        }

        textarea {
            resize: none;
        }

        .form-label {
            font-weight: bold;
            text-align: center;
            display: block;
        }

        

        .btn-dark-custom {
            background-color: #343a40;
            border-color: #343a40;
            width: 48%;
            padding: 10px 0;
            font-weight: bold;
        }

        .btn-dark-custom:hover {
            background-color: #212529;
            transform: translateY(-2px);
        }

        .btn-danger {
            width: 48%;
            padding: 10px 0;
        }

        /* Responsif untuk layar HP */
        @media(max-width: 480px) {
            .form-container {
                padding: 20px;
            }

            .preview-box {
                height: 150px;
            }

            h3 {
                font-size: 18px;
            }

            .btn-custom {
                width: 48%;
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>

<div class="form-container shadow">

    <h3 class="text-center fw-bold"><?= $row['judul'] ?></h3>

    <!-- Kotak Poster / Gambar -->
    <div class="preview-box border mx-auto my-5"><img src="gambar/<?= $row['foto'] ?>" class="project-img img-fluid" alt="gambar proyek"></div>

    <!-- Deskripsi -->
    <label class="form-label mt-3"><?= $row['deskripsi'] ?></label>

    <!-- Link File -->
    <a href="<?= $row['link_file'] ?>" class="btn btn-outline-primary form-label mt-3 text-decoration-none">URL File klik disini</label>

    <!-- URL Youtube -->
    <a href="<?= $row['link_yt'] ?>" class="btn btn-outline-primary form-label mt-3 text-decoration-none">URL Youtube klik disini</a>

    <!-- Anggota ketua -->
    <p class="form-label mt-3"><strong> Nama Ketua Kelompok : </strong><?= $row['ketua'] ?></p>

    <!-- Anggota Kelompok -->
    <p class="form-label mt-3"><strong> Nama Anggota Kelompok : </strong><?= $row['anggota'] ?></p>

    <!-- Tombol -->
    <div class="d-flex gap-2 mt-4">
    
    <a href="dashboard_mahasiswa.php" class="btn btn-dark-custom text-white flex-fill">Kembali</a>

    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')" href="hapus.php?id_projek=<?= $row['id_projek'] ?>" class="btn btn-danger text-white flex-fill">Hapus</a>

    <a href="edit.php?id_projek=<?= $row['id_projek'] ?>" class="btn btn-dark-custom text-white flex-fill">Edit</a>

</div>


</div>

<!-- Bootstrap Script Local -->
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
