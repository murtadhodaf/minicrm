<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class useSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name'=>'Admin yang punya',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('password')
        ]);
    }
}
