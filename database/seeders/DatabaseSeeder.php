<?php

namespace Database\Seeders;

use App\Models\Tiket;
use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(2)->create();
        // Tiket::factory(3)->create();

        Tiket::create([
            'kategori' => 'Pemandian Air Panas',
            'harga' => 10000
        ]);
        Tiket::create([
            'kategori' => 'Kolam Renang',
            'harga' => 15000
        ]);

        User::create([
            'name' => 'Ilham Maulana',
            'email' => 'dilhammaulanaa@gmail.com',
            'password' => bcrypt('ilham'),
            'is_admin' => true
        ]);
    }
}
