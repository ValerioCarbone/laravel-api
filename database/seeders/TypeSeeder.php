<?php

namespace Database\Seeders;

use App\Models\Admin\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = ['FrontEnd', 'BackEnd', 'FullStack', 'Design', 'DevOps'];

        foreach ($types as $type) {
            $new_type = new Type();
            $new_type->name = $type;
            $new_type->slug = str::slug($new_type->name);
            $new_type->save();
        }
    }
}
