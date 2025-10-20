@extends('template')

@section('content')

<style>
    body {
        background-color: #f6fff8;
    }

    .category-container {
        background: #ffffff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    h4 {
        color: #2d6a4f;
        font-weight: 700;
    }

    .btn-primary {
        background-color: #74c69d;
        border: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #52b788;
        transform: translateY(-2px);
    }

    .table thead {
        background-color: #ffe599;
        color: #1b4332;
        font-weight: 600;
    }

    .table tbody tr:hover {
        background-color: #e9f5ec;
        transition: all 0.2s ease;
    }

    .btn-warning {
        background-color: #f6c453;
        border: none;
        font-weight: 600;
        color: #1b4332;
    }

    .btn-warning:hover {
        background-color: #f4b740;
        color: white;
    }

    .btn-danger {
        background-color: #ff6b6b;
        border: none;
        font-weight: 600;
    }

    .btn-danger:hover {
        background-color: #e63946;
    }

    .alert-success {
        background-color: #d8f3dc;
        color: #1b4332;
        border: none;
        font-weight: 500;
    }
</style>

<div class="container mt-5 category-container">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
        <h4 class="mb-0"><i class="bi bi-tags-fill me-2"></i> List Kategori Iuran</h4>
        <a href="{{ route('category.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Kategori
        </a>
    </div>

    <hr class="border-success">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive mt-4">
        <table class="table table-bordered table-hover text-center align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Periode</th>
                    <th>Nominal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->periode }}</td>
                        <td><strong>Rp {{ number_format($item->nominal, 0, ',', '.') }}</strong></td>
                        <td>
                            <a href="{{ route('category.edit', Crypt::encrypt($item->id)) }}" 
                               class="btn btn-sm btn-warning me-1">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('category.delete', Crypt::encrypt($item->id)) }}" 
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="bi bi-trash3"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-muted">Belum ada kategori iuran.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
