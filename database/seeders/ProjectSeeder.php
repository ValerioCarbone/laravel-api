<?php

namespace Database\Seeders;

use App\Models\Admin\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 30; $i++) {
            $new_project = new Project();
            $new_project->title = $faker->sentence(5);
            $new_project->content = $faker->text(200);
            $new_project->save();
        }
    }
}
