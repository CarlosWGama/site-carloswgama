<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminTest extends TestCase  {
    /**
     * Realiza o login no Sistema
     */
    protected function login() {
       return  $this->visitRoute('login')
            ->type('carloswgama@gmail.com', 'email')
            ->type('123456', 'senha')
            ->press('Logar');
    }
}
