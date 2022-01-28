<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Administrator',
                'username' => 'ipds1800',
                'role' => '1',
                'email' => 'bps1800.lampung@gmail.com',
                'password' => Hash::make('4dm1n_ipds'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Pelayanan Statistik Terpadu',
                'username' => 'pst1800',
                'role' => '2',
                'email' => 'pst1800@bps.go.id',
                'password' => Hash::make('4dm1n_pst'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Imas',
                'username' => 'imas',
                'role' => '2',
                'email' => 'imas@example.com',
                'password' => Hash::make('imas'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Supervisor',
                'username' => 'supervisor',
                'role' => '3',
                'email' => 'supervisor@example.com',
                'password' => Hash::make('4dm1n_supervisor'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Zaza Yuda Perwira',
                'username' => 'zaza',
                'role' => '1',
                'email' => 'zazara3@gmail.com',
                'password' => Hash::make('4dm1n_zaza'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];
        DB::table('users')->insert($users);
    }
}
