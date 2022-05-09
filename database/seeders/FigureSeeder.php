<?php

namespace Database\Seeders;

use App\Models\Figure;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FigureSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        if (Figure::all()->first() == null) {
            $csvData = fopen(base_path('database/figures.csv'), 'r');
            $transRow = true;
            while (($data = fgetcsv($csvData, 555, ',')) !== false) {
                if (!$transRow) {
                    Figure::create([
                        'name' => $data['0'],
                        'price' => $data['1'],
                        'description' => $data['2'],
                        'image' => $data['3'],
                    ]);
                }
                $transRow = false;
            }
            fclose($csvData);
        }
    }
}
