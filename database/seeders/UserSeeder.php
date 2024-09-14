<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Md. Asaduzzaman',
            'email' => '123mdasaduzzaman@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
        ]);
    }
}
