@extends('template')

@section('content')
    <h1 class="text-center mt-4">Riwayat Pembayaran</h1>

    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-success text-center">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Pengguna</th>
                            <th>Jenis Pembayaran</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse($pembayarans as $index => $bayar)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $bayar->tanggal->format('d M Y') }}</td>
                                <td>{{ $bayar->user->name }}</td>
                                <td>{{ $bayar->jenis }}</td>
                                <td>Rp {{ number_format($bayar->jumlah, 0, ',', '.') }}</td>
                                <td>
                                    @if($bayar->status === 'lunas')
                                        <span class="badge bg-success">Lunas</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Belum Lunas</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('pembayaran.show', $bayar->id) }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Belum ada data pembayaran.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
