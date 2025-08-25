@extends('template')

@section('content')
<h2>Pembayaran</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($payments as $payment)
        <tr>
            <td>{{ $payment->id }}</td>
            <td>{{ $payment->warga->name ?? '-' }}</td>
           <td>Rp {{ number_format($payment->category->nominal ?? 0, 0, ',', '.') }}</td>
            <td>{{ \Carbon\Carbon::parse($payment->tanggal_pembayaran)->format('d M Y') }}</td>
            <td>
                @if($payment->status === 'sudah_bayar')
                    <span class="badge bg-success">sudah_bayar</span>
                @else
                    <span class="badge bg-danger">belum_bayar</span>
                @endif
            </td>
            <td>
                <a href="{{ route('payment.ubahStatus', $payment->id) }}" class="btn btn-outline-primary btn-sm">
                    Tandai {{ $payment->status === 'sudah_bayar' ? 'Belum Bayar' : 'Sudah Bayar' }}
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
