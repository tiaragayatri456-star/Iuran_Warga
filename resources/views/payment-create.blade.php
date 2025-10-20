@extends('template')

@section('content')

<style>
    body {
        background-color: #f6fff8;
    }

    h2 {
        color: #2d6a4f;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .form-card {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.08);
        max-width: 600px;
        margin: 0 auto;
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
        box-shadow: 0 0 6px #95d5b2;
    }

    .btn-primary {
        background-color: #74c69d;
        border: none;
        font-weight: 600;
        border-radius: 10px;
        padding: 10px 20px;
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
        padding: 10px 20px;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #95d5b2;
        transform: translateY(-2px);
    }

    .alert-success {
        border-radius: 12px;
        background-color: #e6f4ea;
        border: 1px solid #b6e2a1;
        color: #2d6a4f;
    }

    small.text-muted {
        display: block;
        margin-top: 5px;
        color: #2d6a4f;
    }
</style>

<div class="container mt-4">
    <h2>Form Pembayaran</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="form-card">
        <form action="{{ route('payment.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="warga_id" class="form-label">Nama Warga</label>
                <select name="warga_id" id="warga_id" class="form-control" required>
                    <option value="">-- Pilih Warga --</option>
                    @foreach($wargas as $warga)
                        <option value="{{ $warga->id }}">{{ $warga->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Periode</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">-- Pilih Periode --</option>
                    @foreach($categories as $category)
                        <option 
                            value="{{ $category->id }}" 
                            data-nominal="{{ $category->nominal }}"
                        >
                            {{ $category->periode }} (Rp {{ number_format($category->nominal, 0, ',', '.') }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="jumlah_pembayaran" class="form-label">Jumlah Pembayaran</label>
                <input type="number" name="jumlah_pembayaran" id="jumlah_pembayaran" class="form-control" min="1" required>
                <small class="text-muted">Tagihan: <strong>Rp <span id="tagihan_display">0</span></strong></small>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-cash-stack me-1"></i> Bayar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
