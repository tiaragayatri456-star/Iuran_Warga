@extends('template')

@section('title', 'History Pembayaran')

@section('content')

<style>
    .table {
        background-color: #ffffff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    thead.table-primary {
        background-color: #b7e4c7 !important;
        color: #1b4332;
        font-weight: 600;
    }

    tbody tr:hover {
        background-color: #d8f3dc !important;
        transition: all 0.2s ease;
    }

    .btn-back {
        background-color: #90e0ef;
        border: none;
        color: #1b4332;
        font-weight: 600;
        border-radius: 8px;
        padding: 7px 15px;
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        background-color: #48cae4;
        transform: translateY(-2px);
    }
</style>

<div class="container mt-4">
    <h2 class="text-center mb-4">History Pembayaran {{ $warga->nama ?? $warga->name ?? '' }}</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Warga</th>
                    <th>Nominal Bayar</th>
                    <th>Tanggal Bayar</th>
                    <th>Pembayaran Ke</th>
                </tr>
            </thead>
            <tbody>
                @forelse($payments as $index => $payment)
                @php
                    $allPayments = $payment->warga->payments->sortBy('created_at');
                    $paymentNumber = $allPayments->search(fn($p) => $p->id == $payment->id) + 1;
                    $totalPayments = $allPayments->count();
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $payment->warga->nama ?? $payment->warga->name ?? '-' }}</td>
                    <td>Rp {{ number_format($payment->jumlah_pembayaran ?? $payment->total_dibayar ?? 0, 0, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($payment->created_at)->format('d-m-Y') }}</td>
                    <td>
                        {{ $paymentNumber == $totalPayments ? : 'Pembayaran ke ' . $paymentNumber }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">Belum ada history pembayaran.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="text-center mt-3">
        <a href="{{ route('payment.index') }}" class="btn btn-back">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

@endsection
