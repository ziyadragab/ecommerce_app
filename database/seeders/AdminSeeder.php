<?php

namespace Database\Seeders;

use App\Models\Admin;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin=Admin::create( [
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('12345678'),
        ]);

    }
}