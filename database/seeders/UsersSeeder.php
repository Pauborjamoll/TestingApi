<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();

        User::create([
            'name' => 'Pau',
            'email' => 'admin@gmail.com',
            'password' => 'miContraseña',
            'role_id' =>3
            //para contraseña encriptada bcrypt('')
         ]);
    }
}

