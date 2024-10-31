<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\courses;


class coursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        courses::create([ 'c_name' => 'C++', 'descrption' => 'Advanced programming language', 'price' => 500 ]);
        courses::create([ 'c_name' => 'Python', 'descrption' => 'Versatile scripting language', 'price' => 300 ]);
        courses::create([ 'c_name' => 'JavaScript', 'descrption' => 'Essential web development language', 'price' => 400 ]); // Add more records as needed

    }
}
