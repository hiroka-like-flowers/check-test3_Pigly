<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'suzukihanako@a.com'],
            [
                'name' => '鈴木はなこ',
                'password' => Hash::make('121234'),
            ]
        );
    }
}
