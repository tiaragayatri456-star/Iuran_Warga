@extends('template')

@section('content')

<style>
    .table {
        background-color: #ffffff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    thead.table-primary {
        background-color: #b6e2a1 !important; /* hijau muda */
        color: #1b4332;
        font-weight: 600;
    }

    tbody tr:hover {
        background-color: #d8f3dc !important;
        transition: all 0.2s ease;
    }

    .btn-history {
        background-color: #74c69d;
        border: none;
        color: #ffffff;
        font-weight: 600;
        border-radius: 8px;
        padding: 5px 10px;
        margin-bottom: 3px;
        transition: all 0.3s ease;
    }

    .btn-history:hover {
        background-color: #52b788;
        transform: translateY(-2px);
    }

    .btn-edit {
        background-color: #b7e4c7;
        border: none;
        color: #1b4332;
        font-weight: 600;
        border-radius: 8px;
        padding: 5px 10px;
        margin-bottom: 3px;
        transition: all 0.3s ease;
    }

    .btn-edit:hover {
        background-color: #95d5b2;
        transform: translateY(-2px);
    }

    .btn-delete {
        background-color: #ef476f;
        border: none;
        color: #ffffff;
        font-weight: 600;
        border-radius: 8px;
        padding: 5px 10px;
        margin-bottom: 3px;
        transition: all 0.3s ease;
    }

    .btn-delete:hover {
        background-color: #d62839;
        transform: translateY(-2px);
    }

    /* tombol tambah pembayaran */
    .btn-add {
        background-color: #52b788;
        border: none;
        color: #ffffff;
        font-weight: 600;
        border-radius: 10px;
        padding: 8px 20px;
        transition: all 0.3s ease;
    }

    .btn-add:hover {
        background-color: #2d6a4f;
        transform: translateY(-2px);
    }

    @media (max-width: 576px) {
        .action-buttons {
            display: flex;
            flex-direction: column;
        }
    }

    @media (min-width: 577px) {
        .action-buttons {
            display: flex;
            gap: 5px;
            justify-content: center;
        }
    }
</style>

<div class="container mt-4">
    <h2 class="text-center mb-4 fw-bold text-success">Pembayaran</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Tambah Pembayaran -->
    <div class="mb-3 text-end">
        <a href="{{ route('payment.create') }}" class="btn btn-add">
            <i class="bi bi-plus-circle me-1"></i> Tambah Pembayaran
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle">
            <thead class="table-primary">
                <tr>
                    <th>Nama</th>
                    <th>Periode</th>
                    <th>Tagihan</th>
                    <th>Dibayar</th>
                    <th>Sisa Tagihan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td class="text-success fw-bold">{{ $payment->warga->name ?? '-' }}</td>
                    <td>{{ ucfirst($payment->category->periode ?? '-') }}</td>
                    <td>Rp {{ number_format($payment->total_tagihan ?? 0, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($payment->total_dibayar ?? 0, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($payment->sisa_tagihan ?? 0, 0, ',', '.') }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('payment.history', $payment->warga->id ?? 0) }}" class="btn btn-history btn-sm">
                            <i class="bi bi-clock-history me-1"></i> History
                        </a>

                        <a href="{{ route('payment.edit', $payment->id ?? 0) }}" class="btn btn-edit btn-sm">
                            <i class="bi bi-pencil-square me-1"></i> Edit
                        </a>

                        <form action="{{ route('payment.delete', $payment->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Yakin ingin menghapus pembayaran ini?')">
                                <i class="bi bi-trash me-1"></i> Hapus
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
