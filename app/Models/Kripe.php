<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kripe extends Model
{
    use HasFactory;

    protected $table = 'kripes'; // Nama tabel di database

    protected $fillable = ['name', 'price', 'image', 'quantity'];
}
