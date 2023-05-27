<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            0 =>
            array(
                'email' => 'admin@saccos.com',
                'password'=> bcrypt('12345678'),
                'first_name' => 'admin',
                'middle_name' => 'admin',
                'username' => 'admin',
                'last_name' => 'admin',
                'role_id' => 1,
                'created_at' => '2023-05-27 14:45:00',
                'updated_at' => '2023-03-27 14:45:00',
            ),
            1 =>
            array(
                'email' => 'staff@saccos.com',
                'password'=> bcrypt('12345678'),
                'first_name' => 'staff',
                'middle_name' => 'staff',
                'username' => 'staff',
                'last_name' => 'staff',
                'role_id' => 2,
                'created_at' => '2023-05-27 14:45:00',
                'updated_at' => '2023-03-27 14:45:00',
            ),
             
        ));
    }
}
