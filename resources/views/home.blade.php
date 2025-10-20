<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Iuran Warga</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet">
  <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
  </script>

  <!-- Ikon Bootstrap -->
  <link 
    rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Font modern -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      background-color: #f6fff8; /* warna hijau sangat muda */
      font-family: 'Poppins', sans-serif;
      color: #1b4332;
    }

    /* Sidebar */
    .sidebar {
      background-color: #b6e2a1; /* hijau lembut */
      min-height: 100vh;
      box-shadow: 3px 0 10px rgba(0,0,0,0.1);
    }

    .sidebar h4 {
      color: #2d6a4f;
      font-weight: 700;
    }

    .sidebar .nav-link {
      color: #1b4332;
      font-weight: 500;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .sidebar .nav-link:hover {
      background-color: #95d5b2;
      color: white;
      transform: translateX(4px);
    }

    .sidebar .nav-link.active {
      background-color: #74c69d;
      color: white !important;
      font-weight: 600;
    }

    /* Konten utama */
    main {
      background-color: #ffffff;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      margin: 30px;
      padding: 40px;
    }

    h1 {
      color: #2d6a4f;
      font-weight: 700;
    }

    p.lead {
      color: #1b4332;
      font-size: 1.1rem;
      line-height: 1.8;
    }
  </style>
</head>

<body>

<div class="container-fluid">
  <div class="row min-vh-100">

   
    <nav class="col-md-3 col-lg-2 d-md-block sidebar pt-3">
      <div class="position-sticky">
        <h4 class="text-center mb-4"><i class="bi bi-cash-stack me-2"></i>Kas Iuran Warga</h4>
        <ul class="nav flex-column px-3">
          <li class="nav-item mb-2">
            <a class="nav-link" href="dashboard"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="category"><i class="bi bi-tags me-2"></i>Category</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="register"><i class="bi bi-person-plus me-2"></i>Tambah Warga</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="/payment/create"><i class="bi bi-credit-card me-2"></i>Pembayaran</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="login"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Konten -->
    <main class="col-md-9 col-lg-10 text-center">
      <h1 class="mb-4">IURAN WARGA</h1>
      <p class="lead">
        Iuran warga adalah kontribusi rutin yang dikumpulkan dari setiap kepala keluarga 
        untuk mendukung kegiatan dan kebutuhan bersama di lingkungan tempat tinggal, 
        seperti keamanan, kebersihan, dan sosial. Iuran ini dikelola secara transparan 
        demi kenyamanan dan kesejahteraan seluruh warga.
      </p>
    </main>

  </div>
</div>

</body>
</html>
