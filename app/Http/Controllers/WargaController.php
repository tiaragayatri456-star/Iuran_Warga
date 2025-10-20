<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga; 
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class WargaController extends Controller
{
    /**
     * Tampilkan daftar warga.
     */
    public function index()
    {
        $warga = Warga::orderBy('id', 'asc')->get(); 
        return view('warga', compact('warga'));
    }

    public function create()
{
    return view('warga-create'); 
}
    /**
     * Simpan data warga baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'username'  => 'required|string|max:50|unique:warga,username',
            'password'  => 'required|string|min:5',
            'alamat'    => 'required|string|max:255',
        ]);

        Warga::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'password'  => Hash::make($request->password),
            'alamat'    => $request->alamat,
            'status'    => 'warga', // default status
        ]);

        return redirect()->route('admin.warga')->with('success', 'Warga berhasil ditambahkan!');
    }

    /**
     * Form edit data warga.
     */
    public function edit($id)
    {
        $decryptId = Crypt::decrypt($id); 
        $warga = Warga::findOrFail($decryptId);
        return view('warga-edit', compact('warga'));
    }

    /**
     * Update data warga.
     */
    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $request->validate([
            'username'  => 'required|string|max:50|unique:warga,username,' . $id,
            'name'      => 'required|string|max:255',
            'alamat'    => 'required|string|max:255',
            'status'    => 'required|in:warga,petugas',
        ]);

        $warga->update([
            'username' => $request->username,
            'name'     => $request->name,
            'alamat'   => $request->alamat,
            'status'   => $request->status,
        ]);

        return redirect()->route('admin.warga')->with('success', 'Data warga berhasil diperbarui!');
    }

    /**
     * Hapus data warga.
     */
    public function destroy($id)
    {
        $decryptId = Crypt::decrypt($id); 
        $warga = Warga::findOrFail($decryptId);
        $warga->delete();

        return redirect()->route('admin.warga')->with('success', 'Data warga berhasil dihapus.');
    }

    /**
     * Tampilkan form login warga (opsional).
     */
    public function showLoginForm()
    {
        return view('login-warga'); 
    }
}
