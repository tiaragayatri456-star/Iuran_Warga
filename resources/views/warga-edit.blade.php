@extends('template')

@section('content')
<div class="container">
    <h2>Edit Data Warga</h2>
    <form action="{{ route('warga.update', $warga->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" value="{{ $warga->username }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" value="{{ $warga->nama }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" name="alamat" value="{{ $warga->alamat }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection
