@extends('template')

@section('content')
    <h1 class="text-center mt-4">Data Warga</h1>

    <div class="container mt-4">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-primary text-center">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($warga as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->alamat }}</td>
                          <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('warga.edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('warga.destroy', Crypt::encrypt($item->id)) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
