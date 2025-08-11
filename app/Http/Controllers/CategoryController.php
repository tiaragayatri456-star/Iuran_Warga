<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('administrator.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'periode' => 'required',
            'nominal' => 'required|numeric',
            'status' => 'required',
        ]);

        Category::create([
            'periode' => $request->periode,
            'nominal' => $request->nominal,
            'status' => $request->status,
        ]);

        return redirect()->route('category.index')->with('success', 'Kategori berhasil ditambahkan');
    }
}

