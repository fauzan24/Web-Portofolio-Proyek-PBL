<?php
include "../koneksi.php";
include "../template_dosen/sidebar.php";
include "../template_dosen/header.php";
include "../template_dosen/topbar.php";

$id_dosen = $_SESSION['id_user'];

$query = mysqli_query($koneksi, "
    SELECT 
        pn.id_penilaian,
        pn.nilai,
        pn.id_projek,
        p.judul,
        p.ketua,
        p.anggota
    FROM penilaian pn
    JOIN projek p ON pn.id_projek = p.id_projek
    WHERE pn.id_user = '$id_dosen'
    ORDER BY pn.id_penilaian DESC
");

if (!$query) {
    die("<div class='alert alert-danger'>Data penilaian tidak ditemukan</div>");
}
?>

<style>
    .content-wrapper {
        margin-left: 260px;
        padding: 120px 60px 60px;
        background: #f4f7fb;
        min-height: 100vh;
    }

    .report-card {
        background: #ffffff;
        padding: 35px;
        border-radius: 18px;
        box-shadow: 0 6px 25px rgba(0,0,0,0.08);
    }

    .report-title {
        font-size: 22px;
        font-weight: 700;
        color: #0d3d6a;
        margin-bottom: 25px;
    }

    .table thead th {
        vertical-align: middle;
        text-align: center;
        font-size: 14px;
    }

    .table tbody td {
        vertical-align: middle;
        font-size: 14px;
    }

    .table tbody td:nth-child(1),
    .table tbody td:nth-child(4) {
        text-align: center;
        font-weight: 600;
    }

    .empty-data {
        text-align: center;
        padding: 30px;
        color: #777;
        font-style: italic;
    }

    .btn-sm {
        border-radius: 8px;
        padding: 6px 12px;
    }
</style>

<div class="content-wrapper">

    <div class="report-card">

        <h4 class="report-title">
            <i class="fa-solid fa-clipboard-list me-2"></i>
            Riwayat Penilaian Dosen
        </h4>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th width="5%">No</th>
                        <th>Judul Proyek</th>
                        <th>Ketua Tim</th>
                        <th>Anggota Tim</th>
                        <th width="8%">Nilai</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                if (mysqli_num_rows($query) > 0) {
                    $no = 1; 
                    while ($row = mysqli_fetch_assoc($query)) { 
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['judul'] ?></td>
                        <td><?= $row['ketua'] ?></td>
                        <td><?= $row['anggota'] ?></td>
                        <td><?= $row['nilai'] ?></td>
                        <td class="text-center">
                            <a href="detail_projek.php?id_projek=<?= $row['id_projek'] ?>" 
                               class="btn btn-sm btn-primary">
                                <i class="fa-solid fa-eye me-1"></i>
                                Lihat Portofolio
                            </a>
                        </td>
                    </tr>
                <?php } 
                } else { ?>
                    <tr>
                        <td colspan="6" class="empty-data">
                            Belum ada riwayat penilaian
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>

<?php include "../template_dosen/footer.php"; ?>
