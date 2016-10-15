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
    public function run()
    {
        Usuario::firstOrCreate([
            'nome'  => 'Carlos W. Gama', 
            'email' => 'carloswgama@gmail.com',
            'senha' => bcrypt('123456')
        ]);
    }
}
