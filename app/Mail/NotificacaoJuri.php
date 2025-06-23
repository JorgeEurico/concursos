<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Concurso;
use App\Models\MembroJuri;

class NotificacaoJuri extends Mailable
{
    use Queueable, SerializesModels;

    public $membro;
    public $concurso;
    public $tipo;

    public function __construct(MembroJuri $membro, Concurso $concurso, $tipo)
    {
        $this->membro = $membro;
        $this->concurso = $concurso;
        $this->tipo = $tipo;
    }

    public function build()
    {
        return $this->view('emails.notificacao_juri')
                    ->subject('Notificação de Seleção de Concurso')
                    ->with([
                        'membroNome' => $this->membro->nome,
                        'concursoNome' => $this->concurso->nome,
                        'dataConcurso' => $this->concurso->data,
                        'tipo' => $this->tipo
                    ]);
    }
}



   

