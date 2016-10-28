<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MailTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function enviarEmail() {
    	$this->json('POST', '/email', [
    		'nome' 		=> 'Nome Teste',
    		'assunto' 	=> 'Assunto Teste',
    		'email'		=> 'teste@teste.com',
    		'mensagem'	=> 'mensagem Teste'
    	])->seeJson([
            'success' => true,
        ]);
    }
}
