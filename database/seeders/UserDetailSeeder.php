<?php

namespace Database\Seeders;

use App\Models\UserDetail;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Mark Hentry',
                'designation_id' => 1,
                'department_id' => 1,
                'phone_number' => '9876543210'
            ],
            [
                'name' => 'Bob Smith',
                'designation_id' => 2,
                'department_id' => 2,
                'phone_number' => '3456547653'
            ],
            [
                'name' => 'John Doe',
                'designation_id' => 3,
                'department_id' => 3,
                'phone_number' => '0956734123'
            ],
            [
                'name' => 'Tommy Mark',
                'designation_id' => 4,
                'department_id' => 4,
                'phone_number' => '9089097678'
            ],
            [
                'name' => 'David Lee',
                'designation_id' => 5,
                'department_id' => 5,
                'phone_number' => '9375657465'
            ],
            [
                'name' => 'Daniel Wilson',
                'designation_id' => 6,
                'department_id' => 6,
                'phone_number' => '1232314232'
            ],
          
        ];

        foreach ($data as $item) {
            UserDetail::create($item);
        }
    }
}
