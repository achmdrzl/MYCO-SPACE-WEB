<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = User::create([
            'name'          =>  'MYCO Super Admin',
            'email'         => 'admin@my-co.space',
            'phone_number'  => '08182312319',
            'password'      => bcrypt('password'),
            'role'          => 'superadmin',
        ]);

        $superadmin->assignRole('superadmin');

        $it = User::create([
            'name'          =>  'MYCO IT',
            'email'         => 'it@my-co.space',
            'phone_number'  => '08182312319',
            'password'      => bcrypt('password'),
            'role'          => 'superadmin',
        ]);

        $it->assignRole('superadmin');

        $finance = User::create([
            'name'          =>  'Finance',
            'email'         => 'finance@my-co.space',
            'phone_number'  => '08182312319',
            'password'      => bcrypt('password'),
            'role'          => 'finance',
        ]);

        $finance->assignRole('finance');

        $cw = User::create([
            'name'          => 'CW Tower',
            'email'         => 'cw.tower@my-co.space',
            'phone_number'  => '08182312319',
            'password'      => bcrypt('password'),
            'role'          => 'operasional',
        ]);

        $cw->assignRole('operasional');

        $indragiri = User::create([
            'name'          => 'Indragiri',
            'email'         => 'indragiri@my-co.space',
            'phone_number'  => '08182312319',
            'password'      => bcrypt('password'),
            'role'          => 'operasional',
        ]);

        $indragiri->assignRole('operasional');

        $trilium = User::create([
            'name'          => 'Trilium Tower',
            'email'         => 'trillium.tower@my-co.space',
            'phone_number'  => '08182312319',
            'password'      => bcrypt('password'),
            'role'          => 'operasional',
        ]);

        $trilium->assignRole('operasional');
    }
}
