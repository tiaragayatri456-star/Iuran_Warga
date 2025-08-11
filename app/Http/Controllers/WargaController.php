<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga; // ← tambahkan ini
use Illuminate\Support\Facades\Hash; // ← tambahkan ini

class WargaController extends Controller
{
    public function showLoginForm()
    {
        return view('login-warga'); 
    }

    public function store(Request $request)
    {
        // Validasi form
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:warga',
            'password' => 'required|string|min:5',
            'alamat' => 'required|string|max:255',
        ]);

        // Simpan ke database
        Warga::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password), // Enkripsi password
            'alamat' => $request->alamat,
        ]);

        // Redirect ke halaman daftar warga
        return redirect('/warga')->with('success', 'Warga berhasil ditambahkan!');
    }
    public function index()
{
    $warga = \App\Models\Warga::all(); // Ambil semua data warga
    return view('warga', compact('warga'));
}
// Dalam WargaController
public function edit($id)
{
    $warga = Warga::findOrFail($id);
    return view('warga.edit', compact('warga'));
}

public function destroy($id)
{
    $warga = Warga::findOrFail($id);
    $warga->delete();

    return redirect()->route('admin.warga')->with('success', 'Data warga berhasil dihapus.');
}

}
