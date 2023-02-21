<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $newProject = new Project();
            $newProject->title = $faker->unique()->sentence(3);
            $newProject->slug = Str::slug($newProject->title);
            $newProject->author = $faker->name();
            $newProject->content = $faker->realTextBetween(500, 800);
            $newProject->project_date = $faker->dateTimeBetween('-1 year', 'now');
            $newProject->save();
        }
    }
}