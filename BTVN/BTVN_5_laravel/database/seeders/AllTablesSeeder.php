<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AllTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Seeder cho bảng libraries
        foreach(range(1,25) as $index){
            DB::table('libraries')->insert([
                'name'=>$faker->company,
                'address'=>$faker->address,
                'contact_number'=>$faker->phoneNumber,
            ]);
        }

        // Seeder cho bảng books
        foreach(range(1,25) as $index){
            DB::table('books')->insert([
                'title'=>$faker->sentence,
                'author'=>$faker->name,
                'publication_year'=>$faker->year,
                'genre'=>$faker->word,
                'library_id'=>$faker->numberBetween(1,25),
            ]);
        }

        // Seeder cho bảng renters
        foreach(range(1,25) as $index){
            DB::table('renters')->insert([
                'name' => $faker->name,
                'phone_number' => $faker->phoneNumber,
                'email' => $faker->email,
            ]);
        }

        // Seeder cho bảng laptops
        foreach (range(1, 25) as $index) {
            DB::table('laptops')->insert([
                'brand' => $faker->company,
                'model' => $faker->word,
                'specifications' => $faker->text,
                'rental_status' => $faker->boolean,
                'renter_id' => $faker->numberBetween(1, 25),  // Liên kết với bảng renters
            ]);
        }

        // Seeder cho bảng it_centers
        foreach (range(1, 25) as $index) {
            DB::table('it_centers')->insert([
                'name' => $faker->company,
                'location' => $faker->city,
                'contact_email' => $faker->email,
            ]);
        }

        // Seeder cho bảng hardware_devices
        foreach (range(1, 25) as $index) {
            DB::table('hardware_devices')->insert([
                'device_name' => $faker->word,
                'type' => $faker->word,
                'status' => $faker->boolean,
                'center_id' => $faker->numberBetween(1, 25),  // Liên kết với bảng it_centers
            ]);
        }

        // Seeder cho bảng cinemas
        foreach (range(1, 25) as $index) {
            DB::table('cinemas')->insert([
                'name' => $faker->company,
                'location' => $faker->city,
                'total_seats' => $faker->numberBetween(100, 500),
            ]);
        }

        // Seeder cho bảng movies
        foreach (range(1, 25) as $index) {
            DB::table('movies')->insert([
                'title' => $faker->sentence,
                'director' => $faker->name,
                'release_date' => $faker->date,
                'duration' => $faker->time,
                'cinema_id' => $faker->numberBetween(1, 25),  // Liên kết với bảng cinemas
            ]);
        }

    }
}
