<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorsRecords = [
            'id'=>1,
            'fullname' => 'Kwayakie Afi Blebo',
            'email' => 'afi@styledbyas.com',
            'password' => bcrypt('Pa$$w0rd!'),
            'phone' => '0501367305',
            'social_media' => 'instagram',
            'social_media_profile_url' => 'https://instagram.com/afi_dede_?igshid=NzAzN2Q1NTE=',
            'avatar' => '',
            'country_of_residence' => 'Ghana',
            'status' => 0,
        ];
        Vendor::insert($vendorsRecords);
    }
}
