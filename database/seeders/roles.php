<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class roles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'id' => '1',
            'name' => 'superadmin',
        ]);
        
        DB::table('roles')->insert([
            'id' => '2',
            'name' => 'admin',
        ]);

        DB::table('roles')->insert([
            'id' => '3',
            'name' => 'user',
        ]);
    }
}
