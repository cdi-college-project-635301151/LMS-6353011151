<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateNow = Carbon::now();
        User::insert([
            'name' => 'Administrator',
            'email' => 'useradmin@gmail.com',
            'password' => Hash::make('123456789'),
            'user_type' => 1,
            'created_at' => $dateNow,
            'updated_at' => $dateNow
        ]);
    }
}
