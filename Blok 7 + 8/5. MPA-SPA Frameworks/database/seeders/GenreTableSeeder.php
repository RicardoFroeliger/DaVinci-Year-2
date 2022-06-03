<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            ['name' => 'Pop'],
            ['name' => 'House'],
            ['name' => 'Hiphop / Rap'],
            ['name' => 'Electronic'],
            ['name' => 'Rock'],
        ];

        foreach($genres as $key => $value) {
            Genre::create($value);
        }

    }
}
