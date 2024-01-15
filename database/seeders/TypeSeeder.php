<?php

namespace Database\Seeders;

use App\Models\Admin\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $projects = ['FrontEnd', 'BackEnd', 'FullStack', 'Design', 'DevOps'];

        for ($i = 0; $i < 100; $i++) {
            $new_type = new Type();
            $new_type->name = $faker->randomElement($projects);

            $new_type->save();
        }
    }
}
