<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price_with_breakfast',
        'price_without_breakfast',
        'original_price_with_breakfast',
        'original_price_without_breakfast',
    ];
}