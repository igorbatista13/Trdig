<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Models\Trdigital;
use App\Http\Controllers\{

  APIController,
  
  ObjetosController,

// Painel Gerencial do Sistema
  RoleController,   UserController,   CalendarController,   CidadeController,   EstadoController,
  OrgaosController,   PessoaController,   PainelGerencialController,

  // TR DGITIAL
  TrdigitalController, QuestoesController, MetasController, BibliotecaController, 

  // PEFIL USUARIO
  PerfilController, 
};

Route::patch('/trdigital/metasstore/{id}',  [TrdigitalController::class, 'metasstore'])->name('trdigital.metasstore');
Route::delete('/trdigital/metasstore/{id}', [TrdigitalController::class, 'metasstoredestroy'])->name('trdigital.metasstoredestroy');
Route::put('/trdigital/metasstore/{id}',    [TrdigitalController::class, 'metasupdate'])->name('trdigital.metasupdate');


Route::put('/trdigital/etapasstore/{id}',    [TrdigitalController::class, 'etapaupdate'])->name('trdigital.etapaupdate');
Route::patch('/trdigital/etapasstore/{id}', [TrdigitalController::class, 'etapasstore'])->name('trdigital.etapasstore');

Route::patch('/trdigital/planoconsolidado/{id}',  [TrdigitalController::class, 'planoconsolidado'])->name('trdigital.planoconsolidado');
Route::put('/trdigital/planoconsolidado/{id}',  [TrdigitalController::class, 'planoconsolidadoupdate'])->name('trdigital.planoconsolidadoupdate');
Route::delete('/trdigital/planoconsolidado/{id}',  [TrdigitalController::class, 'planoconsolidadodestroy'])->name('trdigital.planoconsolidadodestroy');

Route::patch('/trdigital/planodetalhado/{id}',   [TrdigitalController::class, 'planodetalhado'])->name('trdigital.planodetalhado');
Route::put('/trdigital/planodetalhado/{id}',     [TrdigitalController::class, 'planodetalhado_update'])->name('trdigital.planodetalhado_update');
Route::delete('/trdigital/planodetalhado/{id}',  [TrdigitalController::class, 'planodetalhado_destroy'])->name('trdigital.planodetalhado_destroy');

Route::patch('/trdigital/cronograma/{id}',  [TrdigitalController::class, 'cronograma_store'])->name('trdigital.cronograma_store');
Route::put('/trdigital/cronograma/{id}',  [TrdigitalController::class, 'cronograma_update'])->name('trdigital.cronograma_update');
Route::delete('/trdigital/cronograma/{id}',  [TrdigitalController::class, 'cronograma_destroy'])->name('trdigital.cronograma_destroy');


Route::patch('/trdigital/obras_equipamento/{id}',  [TrdigitalController::class, 'obras_equipamento'])->name('trdigital.obras_equipamento');
Route::put('/trdigital/obras_equipamento/{id}',  [TrdigitalController::class, 'obras_equipamento_update'])->name('trdigital.obras_equipamento_update');
Route::delete('/trdigital/obras_equipamento/{id}',  [TrdigitalController::class, 'obras_equipamento_destroy'])->name('trdigital.obras_equipamento_destroy');

Route::patch('/trdigital/pesquisa_mercadologica/{id}',  [TrdigitalController::class, 'pesquisa_mercadologica'])->name('trdigital.pesquisa_mercadologica');
Route::put('/trdigital/pesquisa_mercadologica/{id}',  [TrdigitalController::class, 'pesquisa_mercadologica_update'])->name('trdigital.pesquisa_mercadologica_update');
Route::put('/trdigital/pesquisa_mercadologica/{id}',  [TrdigitalController::class, 'pesquisa_mercadologica_update'])->name('trdigital.pesquisa_mercadologica_update');
Route::put('/trdigital/pesquisa_mercadologicaa/{id}',  [TrdigitalController::class, 'pesquisa_nome_mercadologica_update'])->name('trdigital.pesquisa_nome_mercadologica_update');

Route::delete('/trdigital/pesquisa_mercadologica/{id}',  [TrdigitalController::class, 'pesquisa_mercadologica_destroy'])->name('trdigital.pesquisa_mercadologica_destroy');
Route::delete('/trdigital/pesquisa_mercadologicaa{id}',  [TrdigitalController::class, 'pesquisa_nome_mercadologica_destroy'])->name('trdigital.pesquisa_nome_mercadologica_destroy');

Route::put('/trdigital/anexo_sigcon/{id}',  [TrdigitalController::class, 'anexo_sigcon'])->name('trdigital.anexo_sigcon');



Route::delete('/trdigital/etapasstore/{id}', [TrdigitalController::class, 'etapasstoredestroy'])->name('trdigital.etapasstoredestroy');
// Route::post('trdigital/metasstore/{id}', [MetasController::class, 'metasstore'])->name('metasstore');

Route::get('/trdigital/proponente',   [TrdigitalController::class, 'proponente']);

// VALIDAR
Route::get('/trdigital/validar/{id}',     [TrdigitalController::class, 'validar']);
Route::post('/trdigital/validar/oficio/{id}',    [TrdigitalController::class, 'oficio'])->name('trdigital.validar.oficio');
Route::post('/trdigital/validar/resp_instituicao/{id}',    [TrdigitalController::class, 'resp_instituicao'])->name('trdigital.validar.resp_instituicao');
Route::post('/trdigital/validar/instituicao/{id}',    [TrdigitalController::class, 'instituicao'])->name('trdigital.validar.instituicao');
Route::post('/trdigital/validar/resp_projeto/{id}',    [TrdigitalController::class, 'resp_projeto'])->name('trdigital.validar.resp_projeto');
Route::post('/trdigital/validar/documentos/{id}',    [TrdigitalController::class, 'documentos'])->name('trdigital.validar.documentos');
Route::post('/trdigital/validar/projeto/{id}',    [TrdigitalController::class, 'projeto'])->name('trdigital.validar.projeto');

Route::post('/trdigital/validar/validar_cronogramaexecucao_metas/{id}',    [TrdigitalController::class, 'validar_cronogramaexecucao_metas'])->name('trdigital.validar.validar_cronogramaexecucao_metas');
Route::post('/trdigital/validar/validar_cronogramaexecucao_etapas/{id}',    [TrdigitalController::class, 'validar_cronogramaexecucao_etapas'])->name('trdigital.validar.validar_cronogramaexecucao_etapas');
Route::post('/trdigital/validar/planoconsolidado/{id}',    [TrdigitalController::class, 'validar_planoconsolidado'])->name('trdigital.validar.planoconsolidado');
Route::post('/trdigital/validar/planodetalhado/{id}',    [TrdigitalController::class, 'validar_planodetalhado'])->name('trdigital.validar.planodetalhado');
Route::post('/trdigital/validar/cronograma_desembolso/{id}',    [TrdigitalController::class, 'validar_cronograma_desembolso'])->name('trdigital.validar.cronograma_desembolso');
Route::post('/trdigital/validar/obras_equipamento/{id}',    [TrdigitalController::class, 'validar_obras_equipamento'])->name('trdigital.validar.obras_equipamento');
Route::post('/trdigital/validar/pesquisa_mercadologica/{id}',    [TrdigitalController::class, 'validar_pesquisa_mercadologica'])->name('trdigital.validar.pesquisa_mercadologica');

Route::get('/trdigital/corrigir/{id}',      [TrdigitalController::class, 'corrigir']);
Route::get('/trdigital/aguardando_andamento/{id}',      [TrdigitalController::class, 'aguardando_andamento']);
Route::get('/trdigital/finalizado/{id}',      [TrdigitalController::class, 'finalizado']);
Route::put('trdigital/tramitado/{id}', [TrdigitalController::class, 'tramitado'])->name('trdigital.tramitado');
Route::get('trdigital/tramitados', [TrdigitalController::class, 'minha_caixa_entrada'])->name('trdigital.minha_caixa_entrada');
Route::get('trdigital/aguardando', [TrdigitalController::class, 'tr_aguardando'])->name('trdigital.tr_aguardando');
Route::get('trdigital/corrigir', [TrdigitalController::class, 'tr_corrigir'])->name('trdigital.tr_corrigir');
Route::get('trdigital/finalizadas', [TrdigitalController::class, 'tr_finalizada'])->name('trdigital.tr_finalizada');
// Route::get('/trdigital/trgerada/{id}',      [TrdigitalController::class, 'trgerada']);

Route::get('biblioteca/biblioteca', [BibliotecaController::class, 'biblioteca'])->name('biblioteca.biblioteca');
Route::get('trdigital/imprimir/{id}', [TrdigitalController::class, 'imprimir'])->name('trdigital.imprimir');


Route::post('/salvar_resp_instituicao/{id}', 'SuaController@salvarRespInstituicao')->name('salvar_resp_instituicao');


Route::resource('roles',                     RoleController::class);
Route::resource('users',                     UserController::class);
Route::resource('pessoa',                    PessoaController::class);
Route::resource('dre',                       DreController::class);
Route::resource('questoes',                  QuestoesController::class);
Route::resource('estado',                    EstadoController::class);
Route::resource('orgaos',                    OrgaosController::class);
Route::resource('cidade',                    CidadeController::class);
Route::resource('cat_ingrediente',           Categoria_ingredientesController::class);
Route::resource('catingrediente',            CatingredientesController::class);
Route::resource('insumo',                    InsumoController::class);
Route::resource('inscricao',                 ReciboController::class);
Route::resource('trdigital',                 TrdigitalController::class);
Route::resource('biblioteca',                BibliotecaController::class);



////// PAINEL GERENCIAL (DASHBOARD)
Route::get('/painel', [PainelGerencialController::class, 'dashboard']);

Route::get('/painel/index', [PainelGerencialController::class, 'index']);

Route::get('/perfil', [PerfilController::class, 'edit'])->name('profile.edit');
Route::get('/perfil', [PerfilController::class, 'index'])->name('profile.index');
//Route::put('/perfil/update', 'PerfilController@update')->name('perfil.update');
Route::put('perfil/update', [PerfilController::class, 'update'])->name('perfil.update');
Route::post('perfil/change-password', [PerfilController::class, 'changePassword'])->name('perfil.changePassword');


Route::middleware('auth')->group(function () {

  // Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
  // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



  Route::get('google', [Ficha_Conselho::class, 'google']);


  // CALENDARIO - AGENDA

  Route::get('calendar/index', [CalendarController::class, 'index'])->name('calendar.index');
  Route::post('calendar', [CalendarController::class, 'store'])->name('calendar.store');
  Route::patch('calendar/update/{id}', [CalendarController::class, 'update'])->name('calendar.update');
  Route::delete('calendar/destroy/{id}', [CalendarController::class, 'destroy'])->name('calendar.destroy');

  /// API
  Route::get('/API/CEP/',   [APIController::class, 'cep']);
  Route::get('/API/CNPJ/',  [APIController::class, 'cnpj']);
  Route::get('/API/FILMES/', [APIController::class, 'filmes']);


  // Objetos de 
  Route::get('/Objetos/piano',                 [ObjetosController::class, 'piano']);
  Route::get('/Objetos/teclado1',              [ObjetosController::class, 'teclado']);
  Route::get('/Objetos/teclado2',              [ObjetosController::class, 'teclado2']);
  Route::get('/Escolas/index',                 [ObjetosController::class, 'Escolas']);
  Route::get('/suporte',                       [ObjetosController::class, 'suporte']);


  // SAIR - LOGOUT
  Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
});

// ROTAS DE ACESSO PÚBLICO
//Route::post('/Site',           [SiteController::class, 'store_formulario']);
Route::post('/Site', 'SiteController@store')->name('Site.store');
Route::get('/Site',                       [SiteController::class, 'index']);
Route::get('/site/voto/{id}',             [SiteController::class, 'voto']);
Route::get('/site/retiravoto/{id}',       [SiteController::class, 'retiravoto']);
//Route::get('/Site/formulario',            [SiteController::class, 'formulario']);
Route::get('/Site/formulario', [SiteController::class, 'formulario'])->name('Site.formulario');
Route::get('/Site/formulario2', [SiteController::class, 'formulario2'])->name('Site.formulario2');
Route::post('/Site/formulario', [SiteController::class, 'store_formulario'])->name('Site.store_formulario');
Route::get('site',                        [SiteController::class, 'index'])->name('recibos.index');
Route::post('site/{recibo}/vote',         [SiteController::class, 'vote'])->name('site.vote');

require __DIR__ . '/auth.php';
