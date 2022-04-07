<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $password = bcrypt('rahasia');
        User::create([
            'name' => 'Muhammad Iqbal',
            'email' => 'iqbal@mail.com',
            'email_verified_at' => now(),
            'password' => $password,
            'remember_token' => Str::random(10),
        ]);
    }
}
