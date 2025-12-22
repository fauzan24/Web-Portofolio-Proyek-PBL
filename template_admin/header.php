<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $title ?? "Dashboard Admin" ?></title>

<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
/* ================= GLOBAL ================= */
body {
  font-family: 'Poppins', sans-serif;
  background: white;
  margin: 0;
}

/* ================= PROFILE ================= */
.profile-img {
  width: 45px;
  height: 45px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #0b3551;
}

/* ================= HEADER ================= */
.header {
  margin-left: 240px;
  padding: 15px 25px;
  background: #ffffff;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  height: 70px;
  z-index: 2000;
  border-bottom: 1px solid #eee;
}

/* ================= CONTENT ================= */
.main-content {
  margin-left: 260px;
  padding: 100px 25px 100px;
  min-height: 100vh;
}

/* ================= BUTTON ================= */
.btn-dark-custom {
  background-color: #343a40;
  border-color: #343a40;
  font-weight: bold;
  padding: 10px 0;
}

.btn-dark-custom:hover {
  background-color: #212529;
  transform: translateY(-2px);
}
/* ===== FIX OFFCANVAS WIDTH ===== */
.offcanvas {
  width: 260px !important;
  max-width: 85%;
}

/* ===== HILANGKAN DESKTOP OFFSET DI MOBILE ===== */
@media (max-width: 991px) {
  .header {
    margin-left: 0 !important;
  }

  .content-wrapper {
    margin-left: 0 !important;
  }
}



/* ================= RESPONSIVE ================= */
@media (max-width: 991px) {
  .header {
    margin-left: 0;
    justify-content: space-between;
    padding: 12px 15px;
  }

  .main-content {
    margin-left: 0;
    padding-top: 90px;
  }
}

@media (max-width: 576px) {
  .profile-img {
    width: 38px;
    height: 38px;
  }
}

.dropdown-menu {
  z-index: 3000 !important;
}
</style>
</head>
<body>
