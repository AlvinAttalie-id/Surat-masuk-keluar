<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name'      => 'Admin',
                'email'     => 'admin@gmail.com',
                'password'  => bcrypt('admin1234'),
                'position'  => 'administrasi',
                'phone'     => '0856651234273',
                'role_id'   => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'      => 'Pimpinan',
                'email'     => 'pimpinan@gmail.com',
                'password'  => bcrypt('pimpinan123'),
                'position'  => 'pimpinan',
                'phone'     => '087766591513',
                'role_id'   => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'      => 'Staff IT',
                'email'     => 'staff1@gmail.com',
                'password'  => bcrypt('staff1234'),
                'position'  => 'Staff IT',
                'phone'     => '089655591513',
                'role_id'   => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'      => 'Marketing',
                'email'     => 'Marketing@gmail.com',
                'password'  => bcrypt('marketing123'),
                'position'  => 'Marketing',
                'phone'     => '085655591713',
                'role_id'   => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        // 50 additional users with role_id 3
        for ($i = 1; $i <= 50; $i++) {
            $users[] = [
                'name'      => 'User ' . $i,
                'email'     => 'user' . $i . '@gmail.com',
                'password'  => bcrypt('user' . $i . '123'),
                'position'  => 'Staff',
                'phone'     => '0856000000' . $i,
                'role_id'   => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // Insert all users into the database
        User::insert($users);
    }
}
