<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
               'name'=>'admin',
               'email'=>'admin@admin.com',
                'is_admin'=>'1',
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'user',
               'email'=>'user@user.com',
                'is_admin'=>'0',
               'password'=> bcrypt('12345678'),
            ],
        ];
  
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
    
}