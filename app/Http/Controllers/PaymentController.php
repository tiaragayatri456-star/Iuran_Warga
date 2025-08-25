<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Warga;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        // Tambahkan relasi warga dan category agar nama & nominal bisa ditampilkan
        $payments = Payment::with(['warga', 'category'])->latest()->get();
        return view('payment', compact('payments'));
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
        ]);

        $category = Category::findOrFail($request->category_id);

        Payment::create([
            'warga_id' => $request->warga_id,
            'category_id' => $category->id,
            'jumlah_pembayaran' => $category->nominal,
            'tanggal_pembayaran' => Carbon::now(),
            'status' => 1, // gunakan string agar konsisten dengan tampilan
            'user_id' => Auth::id() ?? 1,
        ]);

        return redirect()->route('payment.index')->with('success', 'Pembayaran berhasil disimpan.');
    }

    public function ubahStatus($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = $payment->status === 'sudah_bayar' ? 'belum_bayar' : 'sudah_bayar';
        $payment->save();

        return redirect()->route('payment.index');
    }

    public function pembayaranUser()
{
    $userId = Auth::id(); // atau bisa juga lewat parameter
    $pembayarans = Payment::with('user')
        ->where('user_id', $userId)
        ->orderBy('tanggal', 'desc')
        ->get();

    return view('pembayaran', compact('pembayarans'));
}
}
