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
            <td>{{ $payment->warga->name ?? '-' }}</td>
            <td>{{ ucfirst($payment->category->periode ?? '-') }}</td>
            <td>
                Rp {{ number_format($payment->total_tagihan ?? 0, 0, ',', '.') }}
            </td>
            <td>
                Rp {{ number_format($payment->total_dibayar ?? 0, 0, ',', '.') }}
            </td>
            <td>
                Rp {{ number_format($payment->sisa_tagihan ?? 0, 0, ',', '.') }}
            </td>
            <td>
               <a href="{{ route('payment.history', $payment->warga->id ?? 0) }}" class="btn btn-info btn-sm">History</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
