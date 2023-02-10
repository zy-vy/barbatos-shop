<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'name' => 'user',
                'email' => 'user@user.com',
                'gender' => 'male',
                'dob' => Carbon::create(2000, 1, 1),
                'country' => 'Indonesia',
                'role' => 'Customer',
                'password' => bcrypt('user')
            ],
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'gender' => 'female',
                'dob' => Carbon::create(1999, 1, 1),
                'country' => 'Indonesia',
                'role' => 'Admin',
                'password' => bcrypt('admin')
            ],
        ];
        User::insert($users);
    }
}
