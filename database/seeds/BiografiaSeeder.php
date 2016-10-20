<?php

use Illuminate\Database\Seeder;
use App\Models\Biografia;

/**
* Classe para criar a biografia inicial
*/
class BiografiaSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Biografia::count() == 0) {
            Biografia::create(['descricao' => 'lorem impsum', 'titulo' => 'Carlos W. Gama']);
        }
    }
}
