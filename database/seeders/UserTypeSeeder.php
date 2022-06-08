<?php

namespace Database\Seeders;

use App\Models\UserTypeModel;
use Carbon\Carbon;
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
        $dateNow = Carbon::now();
        $data = [
            ['description' => 'Administrator', 'is_active' => '1', 'created_at' => $dateNow, 'updated_at' => $dateNow],
            ['description' => 'Employee', 'is_active' => '1', 'created_at' => $dateNow, 'updated_at' => $dateNow],
            ['description' => 'Student', 'is_active' => '1', 'created_at' => $dateNow, 'updated_at' => $dateNow],
        ];

        UserTypeModel::insert($data);
    }
}
