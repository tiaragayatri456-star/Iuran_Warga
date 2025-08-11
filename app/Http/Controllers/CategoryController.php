<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::all(); 
        return view('category', compact('categories'));
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

        return redirect()->route('category')->with('success', 'Kategori berhasil ditambahkan');
    }
    public function create()
{
    return view('administrator.category.create');
}

}

