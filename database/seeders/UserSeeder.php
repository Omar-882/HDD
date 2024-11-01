<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([ 'F_name' => 'Super Admin', 'L_name' => 'S',
         'phone' => "999999",'birthdate'=>"1988-1-1",
         'gender'=>"male",'email'=>'admin@admin.com',
         'password'=>Hash::make('Admin123'),'role'=>'Admin'
         ]);

    }
}
