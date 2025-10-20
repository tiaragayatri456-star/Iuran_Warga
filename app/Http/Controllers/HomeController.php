<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iuran;
use App\Models\Warga;

class HomeController extends Controller
{
    public function index() {
        return view('dashboard');
    }
}
