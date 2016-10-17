<?php
require_once(dirname(__FILE__).'/AdminTest.php');
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class UsuariosTest extends AdminTest {

    /**
     * Cria um usuário
     * @test
     */
    public function criar() {
        $this->login()->visitRoute('admin.usuarios.novo')
        ->type('Teste', 'nome')
        ->type('teste123@teste123.com', 'email')
        ->type('123456', 'senha')
        ->type('123456', 'senha_confirm')
        ->press('Cadastrar')->seeInDatabase('usuarios', [
            'email' => 'teste123@teste123.com'
        ]);
    }

    /**
    * Testa validação dos formulários
    * @test
    */
    public function validacao() {
        $this->login()->visitRoute('admin.usuarios.novo')
        ->type('', 'nome')
        ->type('carloswgama@gmail.com', 'email')
        ->type('123456', 'senha')
        ->type('1234566', 'senha_confirm')
        ->press('Cadastrar')
        ->see('O campo nome é obrigatório.')
        ->see('Email já está em uso.')
        ->see('Senha e senha confirm devem ser iguais.');
    }

    /**
     * Checa se um usuário existe
     * @test
     */
    public function listar() {
        $this->login()->visitRoute('admin.usuarios.listar')
        ->see('teste123@teste123.com');
    }

    /**
     * Deleta usuário
     * @test
     */
    public function excluir() {
        $usuario = Usuario::where(['email' => 'teste123@teste123.com'])->get(['id'])->first();
        $this->assertTrue($usuario->delete());
    }
}
