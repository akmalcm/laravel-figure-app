<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Figure extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
    ];

    // return review based on the purchase
    public function purchases() {
        return $this->hasMany(Purchase::class, 'on_purchase');
    }
}
