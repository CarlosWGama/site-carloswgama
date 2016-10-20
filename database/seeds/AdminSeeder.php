<?php

use Illuminate\Database\Seeder;
use App\Models\Usuario;

/**
* Seeder para criar a conta do administrador
*/ 
class AdminSeeder extends Seeder {
    
    
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        if (Usuario::where(['email' => 'carloswgama@gmail.com'])->count() == 0)
            Usuario::create([
                'nome'  => 'Carlos W. Gama', 
                'email' => 'carloswgama@gmail.com',
                'senha' => '123456'
            ]);
    }
}
