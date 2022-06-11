<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
        User::create([
            'name' => 'Administrator',
            'email' => 'useradmin@gmail.com',
            'email_verified_at' => $dateNow,
            'password' => Hash::make('useradmin'),
            'user_type' => 1,
            'remember_token' => Str::random(10),
            'member_code' => Str::random(10),
        ]);
    }
}
