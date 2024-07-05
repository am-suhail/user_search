<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('designations')->insert([
            
           
            ['name' => 'Web Developer'],
            ['name' => 'Marketing Manager'],
            ['name' => 'Sales Manager'],
            ['name' => 'HR Manager'],
            ['name' => 'Systems Administrator'],
            ['name' => 'Project Manager'],
            
        ]);
    }
}
