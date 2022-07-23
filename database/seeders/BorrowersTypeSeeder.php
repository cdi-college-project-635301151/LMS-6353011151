<?php

namespace Database\Seeders;

use App\Models\BorrowersTypeModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BorrowersTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['description' => 'Reservation', 'is_active' => '1'],
            ['description' => 'Loan', 'is_active' => '1'],
        ];

        for ($i = 0; $i < count($data); $i++) {
            BorrowersTypeModel::create($data[$i]);
        }
    }
}
