<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Warga;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['warga', 'category'])->latest()->get();

        // Gabungkan pembayaran berdasarkan warga_id + category_id
        $grouped = $payments->groupBy(function ($item) {
            return $item->warga_id . '-' . $item->category_id;
        });

        $finalPayments = collect();

        foreach ($grouped as $group) {
            $first = $group->first();
            $tagihan = $first->category->nominal ?? 0;
            $dibayar = $group->sum('jumlah_pembayaran');
            $sisa = max($tagihan - $dibayar, 0);

            // Tambahkan properti tambahan
            $first->total_tagihan = $tagihan;
            $first->total_dibayar = $dibayar;
            $first->sisa_tagihan = $sisa;

            $finalPayments->push($first);
        }

        return view('payment', ['payments' => $finalPayments]);
    }

    public function create()
    {
        $categories = Category::whereIn('periode', ['Bulanan', 'Mingguan'])->get();
        $wargas = Warga::all();
        return view('payment-create', compact('categories', 'wargas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'warga_id' => 'required|exists:warga,id',
            'category_id' => 'required|exists:categories,id',
            'jumlah_pembayaran' => 'required|numeric|min:1'
        ]);

        Payment::create([
            'warga_id' => $request->warga_id,
            'category_id' => $request->category_id,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'status' => 'sudah_bayar',
            'user_id' => Auth::id() ?? 1,
        ]);

        return redirect()->route('payment.index')->with('success', 'Pembayaran berhasil disimpan.');
    }

    public function ubahStatus($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = $payment->status === 'sudah_bayar' ? 'belum_bayar' : 'sudah_bayar';
        $payment->save();

        return redirect()->route('payment.index')->with('success', 'Status pembayaran berhasil diubah.');
    }

    public function pembayaranUser()
    {
        $userId = Auth::id();

        $payments = Payment::with(['warga', 'category'])
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        // Kelompokkan dan hitung total per user
        $grouped = $payments->groupBy(function ($item) {
            return $item->warga_id . '-' . $item->category_id;
        });

        $finalPayments = collect();

        foreach ($grouped as $group) {
            $first = $group->first();
            $tagihan = $first->category->nominal ?? 0;
            $dibayar = $group->sum('jumlah_pembayaran');
            $sisa = max($tagihan - $dibayar, 0);

            $first->total_tagihan = $tagihan;
            $first->total_dibayar = $dibayar;
            $first->sisa_tagihan = $sisa;

            $finalPayments->push($first);
        }

        return view('payment', ['payments' => $finalPayments]);
    }

    public function history($id)
    {
        $payments = Payment::where('warga_id', $id)
            ->with(['warga', 'category'])
            ->get();

        // Kelompokkan berdasarkan category_id untuk lihat histori per tagihan
        $grouped = $payments->groupBy('category_id');

        $finalPayments = collect();

        foreach ($grouped as $group) {
            $first = $group->first();
            $tagihan = $first->category->nominal ?? 0;
            $dibayar = $group->sum('jumlah_pembayaran');
            $sisa = max($tagihan - $dibayar, 0);

            $first->total_tagihan = $tagihan;
            $first->total_dibayar = $dibayar;
            $first->sisa_tagihan = $sisa;

            $finalPayments->push($first);
        }

        return view('payment-riwayat', ['payments' => $finalPayments]);
    }

     public function riwayat($warga_id)
    {
        // Dekripsi jika ID dienkripsi
        // $wargaId = Crypt::decrypt($warga_id); // jika menggunakan encrypt di route

        $warga = Warga::findOrFail($warga_id);
        $payments = Payment::where('warga_id', $warga_id)
                            ->with('category')
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('payment-riwayat', compact('warga', 'payments'));
    }
    // Form edit pembayaran
public function edit($id)
{
    $payment = Payment::findOrFail($id);
    $categories = Category::whereIn('periode', ['Bulanan', 'Mingguan'])->get();
    $wargas = Warga::all();

    return view('payment-edit', compact('payment', 'categories', 'wargas'));
}

// Update data pembayaran
public function update(Request $request, $id)
{
    $request->validate([
        'warga_id' => 'required|exists:warga,id',
        'category_id' => 'required|exists:categories,id',
        'jumlah_pembayaran' => 'required|numeric|min:1'
    ]);

    $payment = Payment::findOrFail($id);
    $payment->update([
        'warga_id' => $request->warga_id,
        'category_id' => $request->category_id,
        'jumlah_pembayaran' => $request->jumlah_pembayaran,
    ]);

    return redirect()->route('payment.index')->with('success', 'Data pembayaran berhasil diperbarui.');
}

public function delete($id)
{
    $payment = Payment::findOrFail($id);
    $payment->delete();

    return redirect()->route('payment.index')->with('success', 'Data pembayaran berhasil dihapus.');
}



}
