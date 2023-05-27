<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(array(
            0 =>
                array(
                    'name' => 'Admin',
                    'created_at' => '2022-07-21 14:45:00',
                    'updated_at' => '2022-07-21 14:45:00',
                ),        
            1 =>
                array(
                    'name' => 'Staff',
                    'created_at' => '2022-07-21 14:45:00',
                    'updated_at' => '2022-07-21 14:45:00',
                ),  
            2 =>
                array(
                    'name' => 'Member',
                    'created_at' => '2022-07-21 14:45:00',
                    'updated_at' => '2022-07-21 14:45:00',
                ),
        ));
    }
}
