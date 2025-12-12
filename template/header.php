<?php include "../koneksi.php";
?>< !DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport"content="width=device-width, initial-scale=1"><title><?=$title ?? "Dashboard Mahasiswa"?></title><link href="../bootstrap/css/bootstrap.min.css"rel="stylesheet"><link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"><style>

/* =====================
    GLOBAL
===================== */
body {
  font-family: 'Poppins', sans-serif;
  background: #ffffff;
  margin: 0;
}

/* =====================
    IMAGE
===================== */
.profile-img {
  width: 45px;
  height: 45px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #0b3551;
}

/* =====================
    PROJECT CARD
===================== */
.project-description {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
  min-height: 60px;
}

.project-card img {
  width: 100%;
  height: auto;
  object-fit: cover;
  border-radius: 10px;
}

/* =====================
    FORM
===================== */
.form-container {
  background: rgba(255, 255, 255, 0.9);
  border-radius: 15px;
  padding: 30px;
  max-width: 900px;
}

/* =====================
    SIDEBAR DESKTOP
===================== */
.sidebar {
  width: 240px;
  height: 100vh;
  background: #0b3551;
  position: fixed;
  top: 0;
  left: 0;
  padding-top: 20px;
  color: white;
  z-index: 1500;
}

.sidebar .nav-link {
  padding: 12px 20px;
  color: white;
}

.sidebar .nav-link:hover {
  background: rgba(255, 255, 255, 0.15);
}

/* =====================
    TOPBAR
===================== */
.header {
  margin-left: 240px;
  padding: 15px 25px;
  background: white;
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

/* =====================
    MAIN CONTENT
===================== */
.main-content {
  margin-left: 260px;
  padding: 100px 20px;
}

/* =====================
    FOOTER
===================== */
.footer {
  position: fixed;
  bottom: 0;
  left: 260px;
  width: calc(100% - 260px);
  background: #ffffff;
  border-top: 1px solid #dcdcdc;
  font-size: 14px;
  color: #555;
  z-index: 100;
}

/* =====================
    RESPONSIVE
===================== */
@media (max-width: 991px) {

  .sidebar {
    display: none !important;
  }

  .header {
    margin-left: 0 !important;
    justify-content: space-between;
    padding: 10px 15px;
  }

  .main-content {
    margin-left: 0 !important;
    padding-top: 90px;
  }

  .footer {
    left: 0 !important;
    width: 100% !important;
  }

}

@media (max-width: 480px) {
  .profile-img {
    width: 38px;
    height: 38px;
  }

  .project-card img {
    height: 140px;
  }

  h3.fw-bold {
    font-size: 20px;
  }

}

  .btn-dark-custom {
    background-color: #343a40;
    border-color: #343a40;
    width: 200px;
    font-weight: bold;
    padding: 10px 0;
  }

  .btn-dark-custom:hover {
    background-color: #212529;
    transform: translateY(-2px);
  }

</style>
</head>
<body>