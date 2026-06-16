<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name'=>'Admin ',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('Admin@123'),
        ]);
            User::create([
                'name'=>'Author ',
                'email'=>'author@gmail.com',
                'password'=>Hash::make('Author@123'),
            ]); 
            User::create([
                'name'=>'Reader',
                'email'=>'reader@gmail.com',
                'password'=>Hash::make('Reader@123'),
            ]);  
    }
}
