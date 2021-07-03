<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Admin::create([
            'email' => 'admin@app.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
    }
}
