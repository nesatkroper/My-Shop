<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'pro_id',
        'add',
        'add_price',
        'sale',
        'sale_price',
    ];
}
