<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    public function create()
    {
        return view('category-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'periode' => 'required',
            'nominal' => 'required|numeric',
        ]);

        Category::create([
            'periode' => $request->periode,
            'nominal' => $request->nominal,
        ]);

        return redirect()->route('category.admin')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(String $id)
    {
        try {
            $id = Crypt::decrypt($id);
        }
        catch (DecryptException $e){
            return redirect()->back()->with('danger', $e->getMessage());
        }

        $category = Category::findOrFail($id);
        
        $category = Category::find($id);
        return view('category-edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'periode' => 'required',
            'nominal' => 'required|numeric',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'periode' => $request->periode,
            'nominal' => $request->nominal,
        ]);

        return redirect()->route('category.admin')->with('success', 'Kategori berhasil diupdate');
    }

    public function delete($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()->route('category.admin')->with('success', 'Kategori berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus kategori');
        }
    }
}
