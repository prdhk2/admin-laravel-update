<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'role' => 'admin',
                'username' => 'Admin',
                'password' => bcrypt('admin123'),
                'ori_password' => 'admin123',
                'email' => 'admin@admin123.com'
            ],
            [
                'role' => 'employee',
                'username' => 'Employee',
                'password' => bcrypt('employee123'),
                'ori_password' => 'employee123',
                'email' => 'employee@admin123.com'
            ]
        ];
        foreach($user as $key => $val){
            User::create($val);
        }
    }
}
