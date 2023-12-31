<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Estado;
use App\Models\N_processo;
use App\Models\Instituicao;
use App\Models\User;
use App\Models\Orgaos;
use App\Models\Biblioteca;
use App\Models\Like;


use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class PainelGerencialController extends Controller
{



    public function dashboard()
    {

        $processoCount  =  N_processo::where('user_id', '=', auth()->id())->count();
        $processoCount_corrigir  =  N_processo::where('user_id', '=', auth()->id())->where('Status', '=', 'CORRIGIR')->count();
        $processoCount_finalizado  =  N_processo::where('user_id', '=', auth()->id())->where('Status', '=', 'FINALIZADO')->count();
        $processoCount_aguardando  =  N_processo::where('user_id', '=', auth()->id())->where('Status', '=', 'AGUARDANDO')->count();
        $processoCount_tramitada  =  N_processo::where('user_id', '=', auth()->id())->where('Status', '=', 'TRAMITADA')->count();
        $processoCount_nao_finalizada  =  N_processo::where('user_id', '=', auth()->id())->where('Status', '=', '')->count();
        
        $nProcessos  =  N_processo::with([
            'Doc_anexo1',
            'Doc_anexo2',
            'instituicao',
            'Doc_anexo2',
            'Projeto_conteudo',
            'Resp_projeto',
            'Orgaos'
            ])->where('user_id', '=', auth()->id())->orderby('id', 'DESC')->get();
        
        $nProcessos  =  N_processo::with([
            'Doc_anexo1',
            'Doc_anexo2',
            'instituicao',
            'Doc_anexo2',
            'Projeto_conteudo',
            'Resp_projeto',
            'Orgaos'
            ])->orderBy('id', 'DESC')->limit(5)->get();

        $count_tr_tramitada  =  N_processo::where('Status', '=', 'TRAMITADA')->count();
        $count_tr_aguardando  =  N_processo::where('Status', '=', 'AGUARDANDO')->count();
        $count_tr_corrigir  =  N_processo::where('Status', '=', 'CORRIGIR')->count();
        $count_tr_finalizado  =  N_processo::where('Status', '=', 'FINALIZADO')->count();
        
        $count_tr_total  =  N_processo::count();
        $count_caixa_entrada  =  N_processo::where('Orgao_Concedente', '=', '1')->count();
        
        // Count User
        $count_usuarios  =  User::count();
        // Count Orgaos
        $count_orgaos  =  Orgaos::count();
        
        //Biblioteca
        $count_biblioteca  =  Biblioteca::count();
        $biblioteca  =  Biblioteca::limit(5)->get();

        
        $cidade = Cidade::count();
        $estado = Estado::count();

        

        session()->put('processoCount', $processoCount);
        session()->put('processoCount_corrigir', $processoCount_corrigir);
        session()->put('processoCount_finalizado', $processoCount_finalizado);
        session()->put('processoCount_aguardando', $processoCount_aguardando);
        session()->put('processoCount_tramitada', $processoCount_tramitada);
        session()->put('processoCount_nao_finalizada', $processoCount_nao_finalizada);
 

        return view('painel.painel-dashboard', compact(
            'cidade', 'estado', 'processoCount', 'nProcessos', 'processoCount_corrigir',
            'processoCount_finalizado', 'processoCount_aguardando', 'processoCount_tramitada',
            'processoCount_nao_finalizada', 'count_tr_tramitada', 'count_tr_aguardando',
            'count_tr_corrigir', 'count_caixa_entrada', 'count_tr_total','count_tr_finalizado',
            'count_usuarios','count_orgaos','count_biblioteca','biblioteca'

        ));
    }

    public function index()
    {

        return view('painel.index');
    }


    public function consulta_aluno()
    {

        return view('painel.consulta_aluno');
    }

    public function consulta_ficha()
    {
        // $userCount  =          $userCount  =  ALUNO::where('AlunoNome', '=', auth()->id())
        // ::where('status_id', '=', auth()->id())
        // ->count();
        return view('painel.consulta_ficha', compact('userCount'));
    }

    //// Cadastro
    public function cadastro_menu()
    {
        // $userCount  =  ALUNO::where('AlunoNome', '=', auth()->id())
        // ->count();
        return view('painel.cadastro.index');
    }

    public function cadastro_aluno()
    {
        // $userCount  =  ALUNO::where('AlunoNome', '=', auth()->id())
        // ->count();
        return view('painel.cadastro.cadastro_aluno', compact('userCount'));
    }
    public function cadastro_categoria()
    {
        // $userCount  =  ALUNO::where('AlunoNome', '=', auth()->id())
        // ->count();
        return view('painel.cadastro.cadastro_categoria', compact('userCount'));
    }
    public function cadastro_conselho()
    {
        // $userCount  =  ALUNO::where('AlunoNome', '=', auth()->id())
        // ->count();
        return view('painel.cadastro.cadastro_conselho', compact('userCount'));
    }

    public function cadastro_escola()
    {
        // $userCount  =  ALUNO::where('AlunoNome', '=', auth()->id())
        // ->count();
        return view('painel.cadastro.cadastro_escola', compact('userCount'));
    }

    public function cadastro_ministerio()
    {
        // $userCount  =  ALUNO::where('AlunoNome', '=', auth()->id())
        // ->count();
        return view('painel.cadastro.cadastro_ministerio', compact('userCount'));
    }

    public function cadastro_polo()
    {
        // $userCount  =  ALUNO::where('AlunoNome', '=', auth()->id())
        // ->count();
        return view('painel.cadastro.cadastro_polo', compact('userCount'));
    }

    public function cadastro_prazo()
    {
        // $userCount  =  ALUNO::where('AlunoNome', '=', auth()->id())
        // ->count();
        return view('painel.cadastro.cadastro_prazo', compact('userCount'));
    }

    public function cadastro_serie()
    {
        // $userCount  =  ALUNO::where('AlunoNome', '=', auth()->id())
        // ->count();
        return view('painel.cadastro.cadastro_serie', compact('userCount'));
    }
}
