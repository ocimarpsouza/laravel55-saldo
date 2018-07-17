<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::create([
            'name' => 'Ocimar Pereira de Souza',
            'email' => 'ocimarpsouza@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        User::create([
            'name' => 'teste',
            'email' => 'teste@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
