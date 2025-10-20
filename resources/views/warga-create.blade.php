@extends('template')

@section('title', 'Tambah Warga')

@section('content')

<style>
    body {
        background-color: #f6fff8;
    }

    .full-height {
        min-height: 100vh; /* penuhi tinggi layar */
        display: flex;
        justify-content: center; /* horizontal center */
        align-items: center;     /* vertical center */
    }

    .card {
        border-radius: 20px;
        border: none;
        box-shadow: 0 6px 15px rgba(0,0,0,0.08);
    }

    h3 {
        color: #2d6a4f;
        font-weight: 700;
    }

    label {
        color: #1b4332;
        font-weight: 600;
    }

    .form-control {
        border-radius: 10px;
        border: 1.5px solid #b6e2a1;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #74c69d;
        box-shadow: 0 0 6px #95d5b2;
    }

    .btn-primary {
        background-color: #74c69d;
        border: none;
        font-weight: 600;
        border-radius: 10px;
        padding: 8px 20px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #52b788;
        transform: translateY(-2px);
    }

    .btn-secondary {
        background-color: #b7e4c7;
        border: none;
        color: #1b4332;
        font-weight: 600;
        border-radius: 10px;
        padding: 8px 20px;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #95d5b2;
        transform: translateY(-2px);
    }
</style>

<div class="container full-height">
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <div class="card p-4">
                <div class="card-body">
                    <h3 class="text-center mb-4">
                        <i class="bi bi-person-plus-fill me-2"></i> Tambah Warga
                    </h3>

                    {{-- Tampilkan error validasi --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.warga.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" value="{{ old('username') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap" value="{{ old('alamat') }}" required>
                        </div>

                        <div class="d-flex justify-content-center gap-3 mt-4">
                            <a href="{{ route('admin.warga') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-person-check-fill me-1"></i> Simpan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
