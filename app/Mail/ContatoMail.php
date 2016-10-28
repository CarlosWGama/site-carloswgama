<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContatoMail extends Mailable
{
    use Queueable, SerializesModels;

    
    /**
    * Dados que vão na mensagem
    * @var array
    */
    private $dados;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nome, $assunto, $email, $mensagem) {
        $this->dados['nome']        = $nome;
        $this->dados['assunto']     = $assunto;
        $this->dados['email']       = $email;
        $this->dados['mensagem']    = $mensagem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->from([
            'address'   => $this->dados['email'],
            'name'      => $this->dados['nome'],
        ])->subject('Contato - CWG')
        ->view('emails.contato', $this->dados);
    }
}
