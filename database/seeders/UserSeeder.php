<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create akun TU
        DB::table('users')->insert([
            'name' => 'Tata Usaha',
            'email' => 'tu@polibatam.ac.id',
            'email_verified_at' => now(),
            'role' => 'tu',
            'password' => bcrypt('secret'), // password
            'remember_token' => Str::random(10),
        ]);

        // Akun Dosen
        DB::table('users')->insert([
            'name' => 'Ardy Armando',
            'email' => 'ardybelian@gmail.com',
            'email_verified_at' => now(),
            'role' => 'dosen',
            'password' => bcrypt('secret'), // password
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Deva Rahmat Ladio',
            'email' => 'dev.lad@gmail.com',
            'email_verified_at' => now(),
            'role' => 'dosen',
            'password' => bcrypt('secret'), // password
            'remember_token' => Str::random(10),
        ]);

        // Factory 8 akun dosen
        User::factory(8)
            ->create();
    }
}
