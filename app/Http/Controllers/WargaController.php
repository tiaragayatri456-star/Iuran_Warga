<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga; 
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;


class WargaController extends Controller
{
    public function showLoginForm()
    {
        return view('login-warga'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:warga',
            'password' => 'required|string|min:5',
            'alamat' => 'required|string|max:255',
        ]);

        Warga::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password), 
            'alamat' => $request->alamat,
        ]);

        return redirect('/warga')->with('success', 'Warga berhasil ditambahkan!');
    }
   public function index()
{
    $warga = Warga::orderBy('id', 'asc')->get(); 
    return view('warga', compact('warga'));
}


public function edit($id)
{
    $decryptId = Crypt::decrypt($id); 
    $warga = Warga::findOrFail($decryptId);
    return view('warga-edit', compact('warga'));
}

public function destroy($id)
{
    $decryptId = Crypt::decrypt($id); 
    $warga = Warga::findOrFail($decryptId);
    $warga->delete();

    return redirect()->route('admin.warga')->with('success', 'Data warga berhasil dihapus.');
}
public function update(Request $request, $id)
{
      $warga = Warga::findOrFail($id);              

    $request->validate([
        'username' => 'required|string|max:50',
        'name' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'status' => 'required|in:warga,petugas',
    ]);


    $warga->update([
        'username' => $request->username,
        'name' => $request->name,
        'alamat' => $request->alamat,
        'status' => $request->status,
    ]);

    return redirect()->route('admin.warga')->with('success', 'Data berhasil diperbarui!');
}

}
