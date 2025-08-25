@extends('template')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Edit Kategori Iuran</h4>
        <a href="{{ route('category.admin') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <hr>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Ada kesalahan input:<br><br>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('category.update', $category->id) }}" method="POST">
    @csrf   
    <div class="mb-3">
        <label for="periode" class="form-label">Periode</label>
        <input type="text" name="periode" class="form-control" id="periode" value="{{ old('periode', $category->periode) }}" required>
    </div>

    <div class="mb-3">
        <label for="nominal" class="form-label">Nominal</label>
        <input type="number" name="nominal" class="form-control" id="nominal" value="{{ old('nominal', $category->nominal) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
</div>
@endsection
