<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Woman;
use Faker\Factory as Faker;

class womenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('women')->delete(); //xoa du lieu dang co de id khong bi trung,
        $faker = Faker::create();
        for( $i = 0; $i < 10; $i++){
            woman::create([
                'name' => $faker->name,
                'biography' => $faker->paragraph(1, true),
                'field_of_work' => $faker->sentence((2)),
                'cover_image' => $faker->imageUrl(640, 480, 'animals', true ),
                'birth_date' => $faker->dateTimeBetween('2000-01-01', '2005-12-31')->format('Y-m-d'),
                
            ]);
        }
    }
}