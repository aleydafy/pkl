<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


use Illuminate\Database\Seeder;

class t_profile extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($x = 1; $x <= 10; $x++){

            DB::table('t_profile')->insert([
                'image' => $faker-> imageUrl($width = 640, $height = 480),
                'misi' => $faker-> address,
                'visi' => $faker-> address,
                'judul' => $faker-> address,
                'deskripsi' => $faker-> address,
            ]);
        };
    }
}
