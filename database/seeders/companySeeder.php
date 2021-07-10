<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class companySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name'=> Str::random(10) ,
            'email'=>Str::random(10).'@abc.com' ,
            'website'=>Str::random(10).'.com',
        ]);

    }
}
