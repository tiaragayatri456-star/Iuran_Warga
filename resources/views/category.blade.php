@extends('admin.template')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">List Kategori Iuran</h4>

        <!-- Form Tambah Kategori -->
        <form action="{{ route('category') }}" method="POST">
            @csrf
            <!-- Periode -->
            <select name="periode" class="form-control" required>
                <option value="">Pilih Periode</option>
                <option value="Bulanan">Bulanan</option>
                <option value="Mingguan">Mingguan</option>
            </select>

            <!-- Nominal -->
            <input type="number" name="nominal" class="form-control" placeholder="Nominal" required>

            <!-- Status -->
            <select name="status" class="form-control" required>
                <option value="">Pilih Status</option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>

            <!-- Tombol -->
            <button type="submit" class="btn btn-warning">Tambah</button>
        </form>
    </div>

    <hr>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Tabel Kategori -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center align-middle mt-3">
            <thead class="table-warning">
                <tr>
                    <th>No</th>
                    <th>Periode</th>
                    <th>Nominal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->periode }}</td>
                        <td>Rp {{ number_format($item->nominal, 0, ',', '.') }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('category.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="{{ route('category.delete', $item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus kategori ini?')">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
