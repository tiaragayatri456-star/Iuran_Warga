@extends('template')

@section('content')

<table class="table table-hover table-bordered align-middle">
    <thead class="table-success text-center">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Periode</th>
            <th>Nominal</th>
            <th>Pembayaran ke-</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @forelse($payments as $index => $bayar)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $bayar->warga->name ?? '-' }}</td>
                <td>{{ ucfirst($bayar->category->periode ?? '-') }}</td>
                <td>Rp {{ number_format($bayar->jumlah_pembayaran ?? 0, 0, ',', '.') }}</td>
                <td>{{ $index + 1 }}</td> 
                <td>
                    @if($bayar->status === 'sudah_bayar')
                        <span class="badge bg-success">Sudah Bayar</span>
                    @else
                        <span class="badge bg-warning text-dark">Belum Bayar</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Belum ada data pembayaran.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
