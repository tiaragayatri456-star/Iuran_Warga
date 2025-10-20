@extends('template')

@section('content')

<style>
    body {
        background-color: #f6fff8;
    }

    h1 {
        color: #2d6a4f;
        font-weight: 700;
        margin-bottom: 1.5rem;
    }

    .btn-success {
        background-color: #74c69d;
        border: none;
        font-weight: 600;
        border-radius: 10px;
        padding: 8px 18px;
        transition: all 0.3s ease;
    }

    .btn-success:hover {
        background-color: #52b788;
        transform: translateY(-2px);
    }

    .table {
        background-color: #ffffff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
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

    .btn-warning {
        background-color: #ffd166;
        border: none;
        color: #343a40;
        font-weight: 600;
        border-radius: 8px;
        padding: 5px 10px;
        transition: all 0.3s ease;
    }

    .btn-warning:hover {
        background-color: #ffca3a;
        transform: translateY(-2px);
    }

    .btn-danger {
        background-color: #ef476f;
        border: none;
        font-weight: 600;
        border-radius: 8px;
        padding: 5px 10px;
        transition: all 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #d62839;
        transform: translateY(-2px);
    }
</style>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0"><i class="bi bi-people-fill me-2"></i> Data Warga</h1>
        <a href="{{ url('users/export') }}" class="btn btn-success">
            <i class="bi bi-file-earmark-arrow-down me-1"></i> Export Data
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center align-middle">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th width="160px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($warga as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            @if($item->status === 'petugas')
                                <span class="badge bg-success px-3 py-2">{{ ucfirst($item->status) }}</span>
                            @else
                                <span class="badge bg-secondary px-3 py-2">{{ ucfirst($item->status) }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('warga.edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                            <form action="{{ route('warga.destroy', Crypt::encrypt($item->id)) }}" 
                                  method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="bi bi-trash3"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-muted py-4">Belum ada data warga.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
