<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     */
    public function telaInicialTest() {
        $this->visit('login')->see('Login');
    }

    /**
    * Tenta acessar sem estar logado 
    * @test 
    **/
    public function dashboardNaoLogado() {
        $this->visitRoute('admin.dashboard')->seeRouteIs('login');
    }

    /**
    * Realiza o Login
    * @test
    */
    public function logar() {
        $this->visitRoute('login')
            ->type('carloswgama@gmail.com', 'email')
            ->type('123456', 'senha')
            ->press('Logar')->seeRouteIs('admin.dashboard');
    }

    /**
    * Falha no Login
    * @test
    */
    public function falhaLogin() {
        $this->visitRoute('login')
            ->type('carloswgama@gmail.com','email')
            ->type('11111111111', 'senha')
            ->press('Logar')->see('Usuário ou senha incorreta');
    }

}
