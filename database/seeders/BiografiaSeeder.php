<?php

namespace Database\Seeders;

use App\Models\Biografia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiografiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //
        if (Biografia::count() == 0) {
            Biografia::create(['descricao' => 'lorem impsum', 'titulo' => 'Carlos W. Gama']);
        }
    }
}
