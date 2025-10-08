@extends('template')

@section('content')

<div class="row g-4">


  <div class="col-md-4">
    <a href="{{ route('admin.warga') }}" class="text-decoration-none">
      <div class="card text-white bg-primary shadow-lg p-4" style="min-height: 150px;">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="card-title fw-bold">Daftar Warga</h4>
            </div>
            <i class="fas fa-users fa-3x"></i>
          </div>
        </div>
      </div>
    </a>
  </div>

  
  <div class="col-md-4">
    <a href="{{ route('payment.index') }}" class="text-decoration-none">
      <div class="card text-white bg-danger shadow-lg p-4" style="min-height: 150px;">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="card-title fw-bold">Pembayaran</h4>
            </div>
            <i class="fas fa-money-bill-wave fa-3x"></i>
          </div>
        </div>
      </div>
    </a>
  </div>

  <div class="col-md-4">
    <a href="{{ route('category.admin') }}" class="text-decoration-none">
      <div class="card text-white bg-warning shadow-lg p-4" style="min-height: 150px;">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="card-title fw-bold">Category</h4>
            </div>
            <i class="fas fa-tags fa-3x"></i>
          </div>
        </div>
      </div>
    </a>
  </div>

</div>

@endsection
