<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $rol1 = new Role;
      $rol1->id=1;
      $rol1->nombre="Visitante";
      $rol1->save();

      $rol2 = new Role;
      $rol2->id=2;
      $rol2->nombre="Registrado";
      $rol2->save();

      $rol3 = new Role;
      $rol3->id=3;
      $rol3->nombre="Administrador";
      $rol3->save();
    }
}
