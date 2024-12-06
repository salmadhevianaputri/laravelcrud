<?php

namespace App\Http\Controllers;

use App\Models\Kripe;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Mengambil semua produk dari database
        $kripes = Kripe::all();

        // Mengirim data produk ke view
        return view('products.index', compact('kripes'));
    }
}
