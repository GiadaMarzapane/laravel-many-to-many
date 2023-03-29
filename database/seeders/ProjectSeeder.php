<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// importo Model
use App\Models\Project;

// importo Str per Slug
use Illuminate\Support\Str;

// importo Faker
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $title1 = 'Il mio viaggio a Sharm El Sheikh';
        $title2 = 'Il mio viaggio a Fuerteventura';
        $title3 = 'Il mio viaggio a Zanzibar';
        $title4 = 'Il mio viaggio a Ibiza';
        Project::create(
            [
            'title' => $title1,
            'slug' => Str::slug($title1),
            'content' => $faker->sentence(20),
            'date' => '2019',
            'photo_link' => 'https://upload.wikimedia.org/wikipedia/commons/d/d1/8_A_resort_in_Sharm_El_Sheikh.jpg']);
        Project::create(
            [
                'title' => $title2,
                'slug' => Str::slug($title2),
                'content' => $faker->sentence(20),
                'date' => '2017',
                'photo_link' => 'https://www.sivola.it/media/cache/header/5b/81/211730e5c2d4c2092f983d1ce8be.jpeg',
            ]);
        Project::create(
            [
                'title' => $title3,
                'slug' => Str::slug($title3),
                'content' => $faker->sentence(20),
                'date' => '2020',
                'photo_link' => 'https://www.iviaggidideborah.it/wp-content/uploads/2022/09/barca-spiaggia-zanzibar.jpg',
            ]
            );
        Project::create(
            [
                'title' => $title4,
                'slug' => Str::slug($title4),
                'content' => $faker->sentence(20),
                'date' => '2018',
                'photo_link' => 'https://www.hotelspagna.net/wp-content/uploads/2017/02/vacanza-ibiza-famiglie.jpg'
            ]
            );
    }
}
