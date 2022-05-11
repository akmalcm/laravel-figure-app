<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // check whether there is row with id 1, if none, then data will be created
        if (User::all()->first() == null) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123'),
                'role' => 'admin',
            ]);

            User::create([
                'name' => 'Buyer 1',
                'email' => 'buyer1@gmail.com',
                'password' => bcrypt('123'),
                'role' => 'buyer',
            ]);

            User::create([
                'name' => 'Buyer 2',
                'email' => 'buyer2@gmail.com',
                'password' => bcrypt('123'),
                'role' => 'buyer',
            ]);
        }
    }
}
