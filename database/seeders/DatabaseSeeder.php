<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Car;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Luka Franić',
            'email' => 'luka@example.com',
            'password' => bcrypt('1234'),
        ]);

        //Car::factory()->create([

        //]);

        DB::table('cars')->insert([
            [
                'make' => 'Toyota',
                'model' => 'Corolla',
                'year' => 2020,
                'color' => 'Blue',
                'user_id' => 1,
            ],
            [
                'make' => 'Honda',
                'model' => 'Civic',
                'year' => 2019,
                'color' => 'Red',
                'user_id' => 1,
            ],
            [
                'make' => 'Ford',
                'model' => 'Focus',
                'year' => 2018,
                'color' => 'Black',
                'user_id' => 1,
            ],
            [
                'make' => 'Renault',
                'model' => 'Megane',
                'year' => 2021,
                'color' => 'White',
                'user_id' => 1,
            ],
            [
                'make' => 'Volkswagen',
                'model' => 'Golf',
                'year' => 2017,
                'color' => 'Gray',
                'user_id' => 1,
            ]
        ]);
    }
}
