<?php

namespace App\Http\Controllers;
use App\Mail\NotificacaoMembro;
use Illuminate\Http\Request;

class NotificacaoMembroController extends Controller
{
    public function enviarNotificacao(Request $request)
    {
        $concursoId = $request->input('concurso_id');
        $concurso = Concurso::findOrFail($concursoId);

        // Notificar membros do júri
        $membrosJuri = MembroJuri::whereHas('concursosJuri', function ($query) use ($concursoId) {
            $query->where('concurso_id', $concursoId);
        })->get();

        foreach ($membrosJuri as $membro) {
            Mail::to($membro->email)->send(new NotificacaoMembro($membro, $concurso, 'juri'));
        }

        // Notificar membros da comissão de recepção
        $membrosComissao = MembroJuri::whereHas('concursosComissao', function ($query) use ($concursoId) {
            $query->where('concurso_id', $concursoId);
        })->get();

        foreach ($membrosComissao as $membro) {
            Mail::to($membro->email)->send(new NotificacaoMembro($membro, $concurso, 'comissao'));
        }

        return redirect()->back()->with('success', 'Notificações enviadas com sucesso.');
    }
}
