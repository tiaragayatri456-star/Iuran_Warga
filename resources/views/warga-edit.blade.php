@extends('template')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Edit Data Warga</h4>
        <a href="{{ route('admin.warga') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <hr>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Ada kesalahan input:<br><br>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>w
        </div>
    @endif

    <form action="{{ route('warga.update', $warga->id) }}" method="POST">
        @csrf 
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ old('username', $warga->username) }}" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $warga->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $warga->alamat) }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="warga" {{ old('status', $warga->status) == 'warga' ? 'selected' : '' }}>Warga</option>
                <option value="petugas" {{ old('status', $warga->status) == 'petugas' ? 'selected' : '' }}>Petugas</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
