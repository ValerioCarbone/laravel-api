<?php

namespace Database\Seeders;

use App\Models\Admin\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['css', 'scss', 'js', 'vue', 'react', 'astro', 'laravel', 'node', 'angular', 'c++'];

        foreach ($technologies as $technology_name) {

            $technology = new Technology();
            $technology->name = $technology_name;
            // $technology->slug = Str::slug($technology_name);
            $technology->save();
        }
    }
}
