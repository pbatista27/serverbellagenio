<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'nombre'=>'pedro',
          'apellido'=>'batista',
          'fecha_nacimiento'=>'1988-11-27',
          'email'=>'batistapedro271188@gmail.com',
          'telefono'=>'04120858735',
          'password'=>bcrypt('271188pmbs'),
          'tipo'=>0
        ]);
    }
}
