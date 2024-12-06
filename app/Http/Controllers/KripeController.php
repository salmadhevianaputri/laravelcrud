<?php

namespace App\Http\Controllers;

use App\Models\Kripe; // Pastikan menggunakan model Kripe
use Illuminate\Http\Request;

class KripeController extends Controller
{
    public function index()
    {
        $products = Kripe::all(); // Ambil semua data dari tabel kripes
        return view('kripe.index', compact('products')); // Kirim ke view
    }

    public function list()
{
    $kripes = Kripe::all();  // Ambil data produk Kripe
    return response()->json($kripes);
}

}

