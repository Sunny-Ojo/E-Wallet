<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $result = substr(str_shuffle(str_repeat($pool, 6)), 0, 8);
        User::create([
            'name' => 'sunny ojo',
            'email' => 'njokus@me.com',
            'phone' => '0813342',
            'password' => Hash::make('admin123'),
            'wallet_id' => 'smart-Wal_' . $result
        ]);
    }
}
