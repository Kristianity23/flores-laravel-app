<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlowerSeed extends Model
{
    use HasFactory;
    
    protected $table = 'flower_seeds';
    
    protected $fillable = [
        'seed_name',
        'category',
        'price',
        'quantity',
        'germination_time',
        'bloom_time',
        'image',
        'description',
        'color',
        'height',
        'status'
    ];
}
