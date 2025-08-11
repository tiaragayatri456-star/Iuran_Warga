<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;     
use App\Models\Category; 

class DashboardController extends Controller
{
    public function index()
    {
        $warga = Warga::all();
        $category = Category::all();

        return view('dashboard', compact('warga', 'category'));
    }
}
