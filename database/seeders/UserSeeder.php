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
            'profile' => 'https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg',
        ]);

        /* Administrador */
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@demo.com',
            'password' => Hash::make('12345'),
            'profile' => 'https://pbs.twimg.com/media/EYVxlOSXsAExOpX.jpg'
        ]);
    }
}
