<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Iuran Warga')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body {
      background-color: #f6fff8;
      font-family: 'Poppins', sans-serif;
    }

    /* Sidebar */
    .sidebar {
      background-color: #b6e2a1; /* hijau muda */
      min-height: 100vh;
      box-shadow: 3px 0 10px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .sidebar h4 {
      font-weight: 700;
      color: #2d6a4f;
    }

    .sidebar .nav-link {
      color: #1b4332;
      font-weight: 500;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .sidebar .nav-link:hover {
      background-color: #95d5b2;
      color: #fff;
      transform: translateX(4px);
    }

    .sidebar .nav-link.active {
      background-color: #74c69d;
      color: white !important;
      font-weight: 600;
    }

    /* Konten */
    .content-area {
      background-color: #ffffff;
      border-radius: 15px;
      padding: 30px;
      margin: 20px 0;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      min-height: 80vh;
    }
  </style>
</head>

<body>

<div class="container-fluid">
  <div class="row min-vh-100">
    
    <!-- Sidebar -->
    <nav class="col-md-3 col-lg-2 d-md-block sidebar text-dark pt-3">
      <div class="position-sticky">
        <h4 class="text-center mb-4">
          <i class="bi bi-cash-stack"></i> Kas Iuran Warga
        </h4>
        <ul class="nav flex-column px-3">
          <li class="nav-item mb-2">
            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
              <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link {{ request()->routeIs('category.admin') ? 'active' : '' }}" href="{{ route('category.admin') }}">
              <i class="bi bi-tags me-2"></i> Category
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link {{ request()->routeIs('admin.register') ? 'active' : '' }}" href="{{ route('admin.register') }}">
              <i class="bi bi-person-plus me-2"></i> Tambah Warga
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link {{ request()->routeIs('payment.index') ? 'active' : '' }}" href="{{ route('payment.index') }}">
              <i class="bi bi-credit-card me-2"></i> Pembayaran
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link" href="{{ url('login') }}">
              <i class="bi bi-box-arrow-right me-2"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Konten -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="content-area">
        @yield('content')
      </div>
    </main>

  </div>
</div>

</body>
</html>
