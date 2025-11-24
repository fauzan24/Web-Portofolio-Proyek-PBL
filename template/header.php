<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?? "Dashboard Mahasiswa" ?></title>

  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: white;
    }

    .profile-img {
      width: 45px;
      height: 45px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #0b3551;
    }

    .btn-dark-custom {
      background-color: #343a40;
      border-color: #343a40;
      width: 48%;
      font-weight: bold;
      padding: 10px 0;
    }

      .btn-dark-custom:hover {
    background-color: #212529;
    transform: translateY(-2px);
  }

    .form-container {
    background: rgba(255, 255, 255, 0.88);
    border-radius: 15px;
    padding: 30px;
    width: 900px;
    margin-top: 20px;
  }
    .dropdown-menu { z-index: 3000 !important; }
  </style>
</head>
<body>
