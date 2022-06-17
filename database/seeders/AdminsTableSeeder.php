<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            ['id'=>1,'name'=>'Eugene Ochako','type'=>'SuperAdmin','vendor_id'=>2,'mobile'=>'0723350949','email'=>'eugeneochako48@gmail.com','password'=>'$2a$12$c62tJSuLgdquNXBlWQ93Qe6OiV7QCu7D3XA5u93K.saCoGXdejKla','image'=>'','status'=>1],
        ];
        Admin::insert($adminRecords);
    }
}
