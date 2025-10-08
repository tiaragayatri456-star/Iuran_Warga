@extends('template')

@section('content')
<h2>Form Pembayaran</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('payment.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="warga_id" class="form-label">Nama Warga</label>
        <select name="warga_id" id="warga_id" class="form-control" required>
            <option value="">-- Pilih Warga --</option>
            @foreach($wargas as $warga)
                <option value="{{ $warga->id }}">{{ $warga->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Periode</label>
        <select name="category_id" id="category_id" class="form-control" required>
            <option value="">-- Pilih Periode --</option>
            @foreach($categories as $category)
                <option 
                    value="{{ $category->id }}" 
                    data-nominal="{{ $category->nominal }}"
                >
                    {{ $category->periode }} (Rp {{ number_format($category->nominal, 0, ',', '.') }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="jumlah_pembayaran" class="form-label">Jumlah Pembayaran</label>
        <input type="number" name="jumlah_pembayaran" id="jumlah_pembayaran" class="form-control" min="1" required>
        <small class="text-muted">Tagihan: <strong>Rp <span id="tagihan_display">0</span></strong></small>
    </div>

    <button type="submit" class="btn btn-primary">Bayar</button>
    <button type="button" onclick="redirectToRiwayat()" class="btn btn-secondary">Riwayat Pembayaran</button>
</form>

<script>
    const categorySelect = document.getElementById('category_id');
    const tagihanDisplay = document.getElementById('tagihan_display');

    function updateNominal() {
        const selected = categorySelect.options[categorySelect.selectedIndex];
        const nominal = selected.getAttribute('data-nominal');

        if (nominal) {
            const formatted = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(nominal);

            tagihanDisplay.textContent = formatted;
        } else {
            tagihanDisplay.textContent = '0';
        }
    }

    categorySelect.addEventListener('change', updateNominal);
    window.addEventListener('DOMContentLoaded', updateNominal);

    function redirectToRiwayat() {
        const wargaId = document.getElementById('warga_id').value;
        if (!wargaId) {
            alert('Silakan pilih nama warga terlebih dahulu.');
            return;
        }
        window.location.href = '/payment/riwayat/' + wargaId;
    }
</script>
@endsection
