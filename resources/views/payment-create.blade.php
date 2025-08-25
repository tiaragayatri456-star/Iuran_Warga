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

    {{-- Pilih Warga --}}
    <div class="mb-3">
        <label for="warga_id" class="form-label">Nama Warga</label>
        <select name="warga_id" id="warga_id" class="form-control" required>
            <option value="">-- Pilih Warga --</option>
            @foreach($wargas as $warga)
                <option value="{{ $warga->id }}">{{ $warga->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Pilih Periode --}}
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

    {{-- Nominal otomatis --}}
    <div class="mb-3">
        <label for="jumlah_pembayaran" class="form-label">Nominal</label>
        <input type="text" class="form-control" id="jumlah_pembayaran" readonly>
        <input type="hidden" name="jumlah_pembayaran" id="jumlah_pembayaran_hidden">
    </div>

    {{-- Tombol --}}
    <button type="submit" class="btn btn-primary">Bayar</button>
    <a href="payment" onclick="redirectToRiwayat()" class="btn btn-secondary">Riwayat Pembayaran</a>
</form>

{{-- Script --}}
<script>
    const categorySelect = document.getElementById('category_id');
    const nominalField = document.getElementById('jumlah_pembayaran');
    const nominalHidden = document.getElementById('jumlah_pembayaran_hidden');

    function updateNominal() {
        const selected = categorySelect.options[categorySelect.selectedIndex];
        const nominal = selected.getAttribute('data-nominal');

        if (nominal) {
            const formatted = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(nominal);

            nominalField.value = formatted;
            nominalHidden.value = nominal;
        } else {
            nominalField.value = '';
            nominalHidden.value = '';
        }
    }

    // Trigger saat user ganti pilihan
    categorySelect.addEventListener('change', updateNominal);

    // Trigger sekali saat halaman pertama kali load
    window.addEventListener('DOMContentLoaded', updateNominal);

    // Riwayat redirect
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
