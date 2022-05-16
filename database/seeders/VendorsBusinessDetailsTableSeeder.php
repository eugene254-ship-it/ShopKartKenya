<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBusinessDetail;

class VendorsBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords= [
            ['id' =>1,'vendor_id'=>1,'shop_name'=>'Enegue Store','shop_address'=>'QW-1105','shop_city'=>'Nairobi','shop_country'=>'Kenya'
            ,'shop_county'=>'Nairobi','shop_mobile'=>'0759895739','shop_website'=>'','shop_email'=>'eugeneochako48@gmail.com','address_proof'=>'',
            'address_proof_image'=>'test.jpg','business_license_number'=>'1234567890','gst_number'=>'45678908975','pan_number'=>'2356764322'],
        ];
        VendorsBusinessDetail::insert($vendorRecords);
    }
}
