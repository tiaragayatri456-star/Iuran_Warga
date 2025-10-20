@extends('template')

@section('content')

<style>
  /* Kartu utama */
  .dashboard-card {
    border: none;
    border-radius: 15px;
    color: #1b4332;
    transition: all 0.3s ease;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    min-height: 160px;
  }

  .dashboard-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 18px rgba(0,0,0,0.15);
  }

  .dashboard-card .card-title {
    font-weight: 700;
    font-size: 1.3rem;
    color: #1b4332;
  }

  .dashboard-card i {
    color: #2d6a4f;
    opacity: 0.8;
  }

  /* Warna kartu */
  .card-green { background: linear-gradient(135deg, #b6e2a1, #74c69d); }
  .card-yellow { background: linear-gradient(135deg, #f9e79f, #f6c453); }
  .card-red { background: linear-gradient(135deg, #f8c8c8, #f28b82); }
  .card-blue { background: linear-gradient(135deg, #a8dadc, #457b9d); }

  /* Kartu hiasan bawah */
  .dashboard-decor {
    border-radius: 15px;
    padding: 20px;
    text-align: center;
    color: #1b4332;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
  }

  .dashboard-decor:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 15px rgba(0,0,0,0.1);
  }

  .decor-blue { background: linear-gradient(135deg, #a8dadc, #457b9d); color: #fff; }
  .decor-green { background: linear-gradient(135deg, #b6e2a1, #74c69d); color: #fff; }
  .decor-yellow { background: linear-gradient(135deg, #f9e79f, #f6c453); color: #000; }
</style>

<div class="container mt-4">
  <h2 class="fw-bold mb-4 text-success text-center">
    <i class="bi bi-speedometer2 me-2"></i> Dashboard Iuran Warga
  </h2>

  <!-- Kartu utama -->
  <div class="row g-4">
    <div class="col-md-4">
      <a href="{{ route('admin.warga') }}" class="text-decoration-none">
        <div class="card dashboard-card card-green p-4">
          <div class="card-body d-flex justify-content-between align-items-center">
            <div>
              <h4 class="card-title">Daftar Warga</h4>
              <p class="mb-0 small text-dark">Kelola data warga</p>
            </div>
            <i class="bi bi-people-fill fs-1"></i>
          </div>
        </div>
      </a>
    </div>

    <div class="col-md-4">
      <a href="{{ route('payment.index') }}" class="text-decoration-none">
        <div class="card dashboard-card card-red p-4">
          <div class="card-body d-flex justify-content-between align-items-center">
            <div>
              <h4 class="card-title">Pembayaran</h4>
              <p class="mb-0 small text-dark">Lihat & kelola iuran</p>
            </div>
            <i class="bi bi-cash-stack fs-1"></i>
          </div>
        </div>
      </a>
    </div>

    <div class="col-md-4">
      <a href="{{ route('category.admin') }}" class="text-decoration-none">
        <div class="card dashboard-card card-yellow p-4">
          <div class="card-body d-flex justify-content-between align-items-center">
            <div>
              <h4 class="card-title">Kategori</h4>
              <p class="mb-0 small text-dark">Jenis pembayaran & kebutuhan</p>
            </div>
            <i class="bi bi-tags-fill fs-1"></i>
          </div>
        </div>
      </a>
    </div>
  </div>

  <!-- Hiasan bawah -->
  <div class="row g-4 mt-4">
    <div class="col-md-4">
      <div class="dashboard-decor decor-green">
        <i class="bi bi-lightning fs-2 mb-2"></i>
        <h6>Efisiensi</h6>
        <p class="small mb-0">Kelola iuran lebih cepat</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="dashboard-decor decor-blue">
        <i class="bi bi-star fs-2 mb-2"></i>
        <h6>Dashboard</h6>
        <p class="small mb-0">Informasi ringkas & mudah dibaca</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="dashboard-decor decor-yellow">
        <i class="bi bi-heart fs-2 mb-2"></i>
        <h6>Komunitas</h6>
        <p class="small mb-0">Tetap terhubung & rukun</p>
      </div>
    </div>
  </div>
</div>

@endsection
