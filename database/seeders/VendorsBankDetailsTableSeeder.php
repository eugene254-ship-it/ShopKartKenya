<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBankDetail;

class VendorsBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords= [
            ['id' =>1,'vendor_id'=>1,'account_holder_name'=>'Eugene','bank_name'=>'Standered Chartered','account_number'=>'1234566789012233','bank_ifsc_code'=>'1232251'],
        ];
        VendorsBankDetail::insert($vendorRecords);
    }
}
