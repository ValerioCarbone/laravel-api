<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        User::create([
            'name' => 'Pippo Franco',
            'email' => 'pippo123@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        for ($i = 0; $i < 20; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => Hash::make($faker->word()),
            ]);
        }
    }
}
