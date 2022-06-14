<?php

namespace Database\Seeders;

use App\Models\UserTypeModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['description' => 'Administrator', 'is_active' => '1'],
            ['description' => 'Employee', 'is_active' => '1'],
            ['description' => 'Student', 'is_active' => '1'],
        ];

        for ($i = 0; $i < count($data); $i++) {
            UserTypeModel::create($data[$i]);
        }
    }
}
