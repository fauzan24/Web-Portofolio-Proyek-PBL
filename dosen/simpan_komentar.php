<?php
include "../koneksi.php";

$id_projek = $_POST['id_projek'];
$id_user   = $_POST['id_user'];
$komentar  = $_POST['komentar'];

mysqli_query($koneksi, 
    "INSERT INTO komentar (id_projek, id_user, komentar)
     VALUES ('$id_projek', '$id_user', '$komentar')"
);

echo "<script>
alert('Komentar berhasil ditambahkan');
window.location='detail_projek.php?id_projek=$id_projek';
</script>";
?>
