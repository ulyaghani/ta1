<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Jika nama tabel tidak mengikuti konvensi Laravel (plural dari nama model), maka tambahkan nama tabel secara eksplisit
    protected $table = 'products';

    protected $primaryKey = 'product_id';

    // Tentukan kolom-kolom yang dapat diisi secara massal (mass assignable)
    protected $fillable = [
        'product_name',
        'picture',
        'spesification',
        'price',
    ];

    // Jika tidak ingin menggunakan timestamp (created_at, updated_at), Anda bisa menonaktifkannya dengan:
    // public $timestamps = false;
}
