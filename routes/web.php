<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KripeController;
use App\Models\Product;
use App\Models\User;
use App\Models\Kripe;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Log;

Route::post('/buy', function (Illuminate\Http\Request $request) {
    // Validasi input
    $validated = $request->validate([
        'product_id' => 'required|exists:kripes,id', // Pastikan ID produk ada di database
        'quantity' => 'required|integer|min:1', // Pastikan quantity adalah angka positif
    ]);

    // Log data request untuk debugging
    Log::info('Buy request received', [
        'product_id' => $validated['product_id'],
        'quantity' => $validated['quantity']
    ]);

    $product = Kripe::find($validated['product_id']);
    $quantityToBuy = (int) $validated['quantity'];

    if ($product) {
        if ($product->quantity >= $quantityToBuy) {
            // Kurangi quantity di database
            $product->quantity -= $quantityToBuy;
            $product->save();

            Log::info('Product updated', [
                'product_id' => $product->id,
                'remaining_quantity' => $product->quantity
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil dibeli.',
                'remaining_quantity' => $product->quantity
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Stok tidak mencukupi.'
            ]);
        }
    }

    return response()->json([
        'success' => false,
        'message' => 'Produk tidak ditemukan.'
    ]);
});

Route::post('/signup', [AuthController::class, 'signup']);


Route::get('/products', [KripeController::class, 'list']);
Route::get('/kripe', [KripeController::class, 'index']);