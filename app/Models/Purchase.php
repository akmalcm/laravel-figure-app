<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model {
    use HasFactory;

    // return review based on the purchase
    public function review() {
        return $this->hasOne(Review::class, 'on_purchase');
    }

    // returns the instance of the user who transacts the purchase
    public function buyer() {
        return $this->belongsTo(User::class, 'buyer_id');
    }
}
