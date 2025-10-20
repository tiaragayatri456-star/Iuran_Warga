@extends('template')

@section('content')

<style>
    body {
        background-color: #f6fff8;
    }

    .card {
        border-radius: 20px;
        border: none;
        box-shadow: 0 6px 15px rgba(0,0,0,0.08);
    }

    h4 {
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

    .alert-danger {
        border-radius: 12px;
        background-color: #ffebee;
        border: 1px solid #ffb3b3;
        color: #b91c1c;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">
                        <i class="bi bi-pencil-square me-2"></i> Edit Data Warga
                    </h4>
                    <a href="{{ route('admin.warga') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>

                <hr>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Ups!</strong> Ada kesalahan input:
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('warga.update', $warga->id) }}" method="POST">
                    @csrf 
                    
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" 
                               value="{{ old('username', $warga->username) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" 
                               value="{{ old('name', $warga->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" 
                               value="{{ old('alamat', $warga->alamat) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="warga" {{ old('status', $warga->status) == 'warga' ? 'selected' : '' }}>Warga</option>
                            <option value="petugas" {{ old('status', $warga->status) == 'petugas' ? 'selected' : '' }}>Petugas</option>
                        </select>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
