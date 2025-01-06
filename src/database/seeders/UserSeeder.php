<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
         // 10人分のユーザーを生成
         for ($i = 1; $i <= 10; $i++) {
            // ユーザーを作成
            User::create([
                'username' => 'User ' . $i,
                'mail_address' => 'user' . $i . '@example.com',
                'password' => bcrypt('password'),
            ]);
        }
    }
}


