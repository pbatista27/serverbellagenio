<?php

use Illuminate\Database\Seeder;
use App\bank;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        bank::create([
          'nombre'=>'banco de venezuela',
          'numero_cuenta'=>'12345678909876543210',
          'tipo_cuenta'=>'corriente',
          'usuario_cuenta'=>'admin',
          'usuario_cedula'=>'19871554',
          'estado'=>1
        ]);
    }
}
