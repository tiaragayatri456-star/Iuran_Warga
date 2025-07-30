<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda Kas Iuran Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2>Beranda Kas Iuran Warga</h2>
    <hr>


    <div class="row mb-3">
        <div class="col-md-4">
            <div class="border p-3">
                <strong>Total Kas:</strong><br>
                Rp {{ number_format($totalKas, 0, ',', '.') }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="border p-3">
                <strong>Jumlah Warga:</strong><br>
                {{ $jumlahWarga }} orang
            </div>
        </div>
        <div class="col-md-4">
            <div class="border p-3">
                <strong>Total Transaksi:</strong><br>
                {{ $jumlahTransaksi }}
            </div>
        </div>
    </div>

    {{-- Tombol Tambah --}}
    <a href="{{ route('iuran.create') }}" class="btn btn-primary mb-3">+ Tambah Iuran</a>

    {{-- Tabel Iuran --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Warga</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($iurans as $iuran)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $iuran->warga->nama }}</td>
                <td>{{ date('d-m-Y', strtotime($iuran->tanggal)) }}</td>
                <td>Rp {{ number_format($iuran->jumlah, 0, ',', '.') }}</td>
                <td>{{ $iuran->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
