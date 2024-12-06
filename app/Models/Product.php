<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Nama tabel yang sesuai dengan model ini
    protected $table = 'products';

    // Kolom yang dapat diisi
    protected $fillable = ['name', 'price', 'description', 'image'];

    // Jika menggunakan timestamp, pastikan kolom 'created_at' dan 'updated_at' ada di tabel
    public $timestamps = true;
}
