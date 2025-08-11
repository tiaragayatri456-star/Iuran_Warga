@extends('template')

@section('content')
    <h1>Edit Data Warga</h1>

    <form action="{{ route('warga.edit', $warga->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" value="{{ old('username', $warga->username) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" value="{{ old('name', $warga->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" value="{{ old('alamat', $warga->alamat) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.warga') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
