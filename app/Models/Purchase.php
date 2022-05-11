<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model {
    use HasFactory;

    protected $fillable = ['firstName', 'lastName', 'phone', 'address', 'postcode', 'city', 'state', 'status', 'buyer_id', 'figure_id', 'id'];

    // returns the instance of the user who transacts the purchase
    public function buyer() {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function figure() {
        return $this->belongsTo(Figure::class, 'figure_id');
    }
}
