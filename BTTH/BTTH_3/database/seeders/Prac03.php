<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class Prac03 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Seed computers table
        foreach (range(1, 20) as $index) {
            DB::table('computers')->insert([
                'computer_name' => 'Computer-' . $index,
                'model' => $faker->word,
                'operatin_system' => $faker->word,
                'processor' => $faker->word,
                'memory' => $faker->randomNumber(4),
                'available' => $faker->randomElement([0, 1]),
            ]);
        }

        // Seed issues table
        foreach (range(1, 50) as $index) {
            DB::table('issues')->insert([
                'computer_id' => $faker->numberBetween(1,20),
                'report_by' => $faker->name,
                'report_date' => $faker->dateTimeBetween('-1 month', 'now'),
                'description' => $faker->sentence,
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'Inprogress', 'Resolved']),
            ]);
        }
    }
}
