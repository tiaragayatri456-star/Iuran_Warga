<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kas Iuran Warga</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container-fluid">
  <div class="row min-vh-100">
    <!-- Sidebar -->
    <nav class="col-md-3 col-lg-2 d-md-block bg-primary sidebar text-white pt-3">
      <div class="position-sticky">
        <h4 class="text-center mb-4">Kas Iuran Warga</h4>
        <ul class="nav flex-column px-3">
          <li class="nav-item mb-2">
            <a class="nav-link text-white active" href="home">Beranda</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link text-white" href="dashboard">Dashboard</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link text-white" href="category">Kategori</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link text-white" href="register">Tambah Warga</a>
          </li>
          <li class="nav-item mb-2">
            <a class="nav-link text-white" href="login">Logout</a>
          </li>
        </ul>
      </div>
    </nav>

        <!-- Konten Halaman -->
        <div style="flex: 1; padding: 20px;">
            @yield('content')
        </div>
    </div>
</body>
</html>