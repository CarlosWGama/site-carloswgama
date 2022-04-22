<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //
        if (Usuario::where(['email' => 'carloswgama@gmail.com'])->count() == 0)
            Usuario::create([
                'nome'  => 'Carlos W. Gama', 
                'email' => 'carloswgama@gmail.com',
                'senha' => bcrypt('123456')
            ]);
    }
}
