<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengirim;

class SenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $senders = [
            [
                'name'      => 'Daddy',
                'email'     => 'daddy@gmail.com',
                'address'   => 'Jl.XXX NO.01. Banjarbaru, Kalimantan Selatan',
                'phone'     => '089671881933',
            ],
            [
                'name'      => 'Mommy',
                'email'     => 'mommy@gmail.com',
                'address'   => 'Jl.XXX NO.01. Banjarmasin, Kalimantan Selatan',
                'phone'     => '080192881233',
            ],
            [
                'name'      => 'Arthur',
                'email'     => 'arthur@gmail.com',
                'address'   => 'Jl.XXX NO.03. Tanah Laut, Kalimantan Selatan',
                'phone'     => '089182231821',
            ],
        ];

        Pengirim::insert($senders);
    }
}
