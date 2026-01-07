<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PortoLearn</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">


  <style>
    /* ===== FONT GLOBAL ===== */
    body {
      font-family: 'Poppins', sans-serif;
      font-weight: 400;
      line-height: 1.6;
    }

    h1, h2, h3, h4, h5 {
      font-weight: 600;
    }

    .navbar-brand {
      font-weight: 700;
      letter-spacing: 0.5px;
    }

    /* ===== Navbar ===== */
    .navbar {
      background-color: #0b3551;
      padding: 0.8rem 1rem;
      transition: box-shadow 0.3s ease-in-out;
    }

    /* ===== Hero Section ===== */
    .hero {
      background: linear-gradient(rgba(5, 16, 75, 0.6), rgba(5, 16, 75, 0.6)),
                  url('asset/GU.jpg') center/cover no-repeat;
      color: white;
      min-height: 90vh;
      display: flex;
      align-items: center;
    }

    .hero h1 {
      font-weight: 700;
    }

    .hero img {
      max-width: 420px;
    }

    /* ===== About Section ===== */
    .about {
      padding: 60px 0;
    }

    .about .info-box {
      background: white;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      padding: 20px;
      transition: 0.3s;
    }

    .about .info-box:hover {
      transform: scale(1.03);
    }

    /* ===== Team Section ===== */
    .team {
      background: #f8f9fa;
      padding: 60px 0;
    }

    .team img {
      width: 180px;
      height: 260px;
      object-fit: cover;
      border-radius: 8px;
      border: 3px solid #0b5ed7;
    }

    .team h5 {
      margin-top: 15px;
      font-weight: 600;
    }

    footer {
      background: #0b1b47;
      color: #fff;
      text-align: center;
      padding: 15px 0;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
      .hero {
        text-align: center;
      }

      .hero img {
        max-width: 320px;
        margin-top: 30px;
      }
    }

    @media (max-width: 768px) {
      .hero {
        min-height: auto;
        padding: 80px 0;
      }

      .hero h1 {
        font-size: 2rem;
      }

      .hero p {
        font-size: 0.95rem;
      }

      .about .info-box {
        margin-bottom: 20px;
      }

      .team img {
        width: 150px;
        height: 220px;
      }
    }

    @media (max-width: 576px) {
      .navbar-brand {
        font-size: 1rem;
      }

      .hero h5 {
        font-size: 0.9rem;
      }

      .hero h1 {
        font-size: 1.7rem;
      }

      .hero img {
        max-width: 260px;
      }

      .about {
        padding: 40px 0;
      }

      .team {
        padding: 40px 0;
      }

      footer {
        font-size: 0.85rem;
      }
    }
  </style>
</head>

<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #0b3551;">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">
      <img src="asset/logo.png" width="30" class="me-2">
      PortoLearn
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php">Masuk</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- ===== HERO SECTION ===== -->
<section class="hero">
  <div class="container">
    <div class="row align-items-center text-white">
      <div class="col-md-6">
        <h5 class="text-light">Halo! Selamat Datang Di</h5>
        <h1 class="display-5">PortoLearn</h1>
        <p>Temukan Proyek yang Menarik</p>
      </div>
      <div class="col-md-6 text-center">
        <img src="asset/ilustrasi.svg" alt="Ilustrasi">
      </div>
    </div>
  </div>
</section>

<!-- ===== ABOUT SECTION ===== -->
<section id="tentang" class="about">
  <div class="container">
    <h3 class="fw-bold mb-4 text-center">Tentang</h3>
    <p class="text-center mb-5">
      Platform PortoLearn dibuat sebagai sarana bagi mahasiswa Politeknik Negeri Batam
      untuk menampilkan hasil proyek dan meningkatkan personal branding melalui portofolio digital.
    </p>

    <div class="row justify-content-center text-center">
      <div class="col-md-3 mx-3 info-box">
        <h5>Politeknik Negeri Batam</h5>
        <p>Institusi pendidikan vokasi dengan project based learning system terintegrasi.</p>
      </div>
      <div class="col-md-3 mx-3 info-box">
        <h5>Jurusan</h5>
        <p>Menjadi profil mahasiswa berdasarkan jurusan yang dikelompokkan dalam sistem.</p>
      </div>
    </div>
  </div>
</section>

<!-- ===== TEAM SECTION ===== -->
<section class="team text-center">
  <div class="container">
    <h3 class="fw-bold mb-5">Cek Tim Kami</h3>
    <div class="row justify-content-center g-4">
      <div class="col-md-3">
        <img src="asset/fauzan.jpg" alt="Anggota 1">
        <h5>Fauzan Najib Ali</h5>
        <p>Ketua</p>
      </div>
      <div class="col-md-3">
        <img src="asset/luthfi.jpg" alt="Anggota 2">
        <h5>Luthfi Dwi Apriyadi</h5>
        <p>Anggota</p>
      </div>
      <div class="col-md-3">
        <img src="asset/ruben.jpg" alt="Anggota 3">
        <h5>Ruben Andika Nababan</h5>
        <p>Anggota</p>
      </div>
    </div>
  </div>
</section>

<!-- ===== FOOTER ===== -->
<footer>
  <p class="mb-0">&copy; 2025 PortoLearn | Politeknik Negeri Batam</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
