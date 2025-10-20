@extends('template')

@section('content')

<style>
    body {
        background-color: #f6fff8;
    }

    .form-container {
        background: #ffffff;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        max-width: 600px;
        margin: 40px auto;
    }

    h3 {
        color: #2d6a4f;
        font-weight: 700;
        text-align: center;
        margin-bottom: 30px;
    }

    label {
        font-weight: 600;
        color: #1b4332;
    }

    .form-control {
        border-radius: 10px;
        border: 1.5px solid #b6e2a1;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #74c69d;
        box-shadow: 0 0 5px #95d5b2;
    }

    .btn-primary {
        background-color: #74c69d;
        border: none;
        font-weight: 600;
        transition: all 0.3s ease;
        border-radius: 10px;
        padding: 8px 18px;
    }

    .btn-primary:hover {
        background-color: #52b788;
        transform: translateY(-2px);
    }

    .btn-secondary {
        background-color: #b7e4c7;
        border: none;
        font-weight: 600;
        color: #1b4332;
        border-radius: 10px;
        padding: 8px 18px;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #95d5b2;
        transform: translateY(-2px);
    }

    small.text-danger {
        font-weight: 500;
    }
</style>

<div class="form-container">
    <h3><i class="bi bi-tags-fill me-2"></i> Tambah Kategori Iuran</h3>

    <form action="{{ route('category.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="periode" class="form-label">Periode</label>
            <select name="periode" id="periode" class="form-control" required>
                <option value="" disabled selected>Pilih Periode</option>
                <option value="Bulanan">Bulanan</option>
                <option value="Mingguan">Mingguan</option>
            </select>
            @error('periode')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal</label>
            <input 
                type="number" 
                name="nominal" 
                id="nominal" 
                class="form-control" 
                placeholder="Masukkan nominal" 
                required>
            @error('nominal')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="d-flex justify-content-center gap-3 mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Simpan
            </button>
            <a href="{{ route('category.admin') }}" class="btn btn-secondary">
                <i class="bi bi-x-circle me-1"></i> Batal
            </a>
        </div>
    </form>
</div>

@endsection
