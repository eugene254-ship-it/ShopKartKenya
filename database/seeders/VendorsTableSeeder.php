<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            ['id'=>2,'name'=>'Gregory','address'=>'QW-910','city'=>'Nairobi','county'=>'Nairobi','country'=>'Kenya','pincode'=>'910','mobile'=>'0741790292','email'=>'gregoryodour@gmail.com','status'=>0],
        ];
        Vendor::insert($vendorRecords);
    }
}
