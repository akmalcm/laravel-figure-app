<?php

namespace Database\Seeders;

use App\Models\Purchase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        if (Purchase::all()->first() == null) {
            Purchase::factory()->count(20)->create();
        }
    }
}
