<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Super usuario */
        User::create([
            'name' => 'Super user',
            'email' => 'superuser@demo.com',
            'password' => Hash::make('12345'),
        ]);

        /* Administrador */
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@demo.com',
            'password' => Hash::make('12345'),
        ]);
    }
}
