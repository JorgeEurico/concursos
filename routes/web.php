<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConcursoController;
use App\Http\Controllers\MembroJuriController;
use App\Http\Controllers\ConcursoJuriController;
use App\Http\Controllers\CompetenciasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConfiguracoesController;
use App\Http\Controllers\Mail\NotificacaoJuri;
use App\Http\Controllers\NotificacaoMembroController;
use App\Http\Controllers\ProjectoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'AdminHome'])->name('admin.home')->middleware('is_admin');

Route::middleware(['is_admin'])->group(function () {
    Route::get('competencias', [ConcursoController::class, 'carregarCompetencias']);
    Route::get('/concursos/{id}', [ConcursoController::class, 'show'])->name('concursos.show');
    Route::post('concursos/criar', [ConcursoController::class, 'criarConcurso'])->name('concursos.criarConcurso');
    Route::get('/concursos/create', [ConcursoController::class, 'create'])->name('concursos.create');
    Route::get('projectos', [ConcursoController::class, 'carregarprojectos']);

Route::get('/projectos/carregar', [ProjectoController::class, 'carregar'])->name('projectos.carregar');


    Route::get('/concursos/{id}/selecionar-juri', [ConcursoController::class, 'selecionarJuri']);
    Route::get('/concursos/{id}/membros-juri', [ConcursoController::class, 'obterMembrosJuri']);
    Route::get('/admin/home', [ConcursoController::class, 'adminHome'])->name('admin.home');
    Route::get('/concursos/ultimo-id', [ConcursoController::class, 'obterUltimoConcursoId']);
    Route::put('/concursos/{id}/update-jurados', [ConcursoController::class, 'updateJurados'])->name('concursos.updateJurados');
    Route::get('/concursos/{id}', [ConcursoController::class, 'show'])->name('concursos.show');
    Route::put('/concursos/{id}/add-membro-ugea', [ConcursoController::class, 'addMembroUgea'])->name('concursos.addMembroUgea');
    Route::delete('/concursos/{id}', [ConcursoController::class, 'deletarConcurso'])->name('concursos.deletar');
    Route::get('/concursos/pesquisa', [ConcursoController::class, 'listarConcursosComPesquisa']);
    Route::put('/membros-juris/{id}/update', [MembroJuriController::class, 'update'])->name('membros-juris.update');
    Route::post('/concursos/notificar', [MembroJuriController::class, 'notificar'])->name('concursos.notificar');
    Route::post('/notificar', [NotificacaoMembroController::class, 'enviarNotificacao'])->name('notificar');
    Route::post('/concursos/{id}/alterar-status', [ConcursoController::class, 'alterarStatus'])->name('concursos.alterarStatus');
    Route::get('/admin/home', [ConcursoController::class, 'estatisticas'])->name('admin.home');
    Route::post('/concursos/{concurso_id}/finalizar', [ConcursoController::class, 'finalizarConcurso'])->name('concursos.finalizar');
    Route::get('/projectos', [ProjectoController::class, 'index'])->name('projectos.index');
    Route::post('/projectos', [ProjectoController::class, 'store'])->name('projectos.store');
    Route::get('/projectos/create', [ProjectoController::class, 'create'])->name('projectos.create');


    
    Route::prefix('configuracoes')->group(function () {
        Route::get('/', [ConfiguracoesController::class, 'index'])->name('configuracoes');
        Route::post('/atualizar-role', [ConfiguracoesController::class, 'updateRole'])->name('configuracoes.atualizarRole');
        Route::post('/usuarios', [ConfiguracoesController::class, 'store'])->name('usuarios.store');
        Route::get('/membro', [MembroJuriController::class, 'index'])->name('configuracoes.membro');
        Route::get('/membro/pesquisar', [MembroJuriController::class, 'pesquisar'])->name('membro.pesquisar');
        
        // Route for displaying the role update form
        Route::get('/editar-role/{id}', [ConfiguracoesController::class, 'editRole'])->name('configuracoes.editarRole');
        Route::get('/membro/editarMembro/{id}', [MembroJuriController::class, 'edit'])->name('membros-juris.editar');
        Route::put('/membro/editarMembro/{id}', [MembroJuriController::class, 'update'])->name('membros-juris.update');
        Route::post('/membrojuri/cadastrar', [ConfiguracoesController::class, 'cadastrar'])->name('membrojuri.cadastrar');
        // No seu arquivo de rotas (web.php)
        Route::get('/cadastrar-membro', [ConfiguracoesController::class, 'cadastrarMembro'])->name('cadastrarMembro');
        Route::get('/membros-juris/{id}/relatorio', [MembroJuriController::class, 'relatorio'])->name('membros-juris.relatorio');




    });
});

