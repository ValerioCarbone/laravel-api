<?php

namespace Database\Seeders;

use App\Models\Admin\Project;
use App\Models\Admin\Technology;
use App\Models\Admin\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = Type::all();
        $type_id = $types->pluck('id');

        $technologies = Technology::all();
        $technology_id = $technologies->pluck('id');

        for ($i = 0; $i < 50; $i++) {
            $new_project = new Project();

            $new_project->title = $faker->sentence(5);
            $new_project->slug = Str::slug($new_project->title, '-');
            $new_project->content = $faker->text(200);
            $new_project->type_id = $faker->randomElement($type_id);

            $new_project->save();
            $new_project->technologies()->attach($faker->randomElements($technology_id, null));
        }
    }
}
