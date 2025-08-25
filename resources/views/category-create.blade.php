@extends('template')

@section('content')
<div class="container mt-5">
    <h3>Tambah Kategori Iuran</h3>
    <form action="{{ route('category.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="periode" class="form-label">Periode</label>
            <select name="periode" id="periode" class="form-control" required>
                <option value="" disabled selected>Pilih Periode</option>
                <option value="Bulanan">Bulanan</option>
                <option value="Mingguan">Mingguan</option>
            </select>
            @error('periode')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal</label>
            <input type="number" name="nominal" id="nominal" class="form-control" placeholder="Masukkan nominal" required>
            @error('nominal')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('category.admin') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
