<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRecords = [
            [
                'id'=>1,
                'name'=>'George Agyemang',
                'type'=>'superadmin',
                // 'vendor_id'=>0,
                'phone'=>'0500006746',
                'email'=>'geoagye@gmail.com',
                'password'=>bcrypt('Pa$$w0rd!'),
                'avatar'=>'',
                'status'=>1,
            ],

        ];

        Admin::insert($adminRecords);

    }
}
