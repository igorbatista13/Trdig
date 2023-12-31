<?php

namespace App\Http\Controllers;


use PDF;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Facades\Response;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;


use App\Models\N_processo;
use App\Models\Orgaos;
use App\Models\Cidade;

use App\Models\Resp_instituicao;
use App\Models\Instituicao;
use App\Models\Resp_projeto;
use App\Models\Projeto_conteudo;
use App\Exports\ReciboExport;
use App\Models\Biblioteca;
use App\Models\Cronograma_desembolso;
use App\Models\Doc_anexo1;
use App\Models\Doc_anexo2;
use App\Models\Etapas;
use App\Models\Metas;
use App\Models\Plano_consolidado;
use App\Models\Plano_detalhado;
use App\Models\Obras_equipamento;
use App\Models\Pesquisa_mercadologica;
use App\Models\Pesquisa_mercadologica_pivot;

use App\Models\Anexo_sigcon;
use App\Models\Doc_prefeitura;

class TrdigitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:trdigital-list|trdigital-create|trdigital-edit|trdigital-delete|trdigital-invoice', ['only' => ['index', 'show']]);
        $this->middleware('permission:trdigital-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:trdigital-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:trdigital-delete', ['only' => ['destroy']]);
        $this->middleware('permission:trdigital-invoice', ['only' => ['invoice']]);
    }

    public function index()
    {
        $nProcessos = N_processo::with([
            'Doc_anexo1',
            'Doc_anexo2',
            'instituicao',
            'Doc_anexo2',
            'Projeto_conteudo',
            'Resp_projeto',
            'Orgaos'
        ])->get();

        return view('trdigital.index', compact('nProcessos'));
    }

    public function minha_caixa_entrada()
    {
        $nProcessos = N_processo::with([
            'Doc_anexo1',
            'Doc_anexo2',
            'instituicao',
            'Doc_anexo2',
            'Projeto_conteudo',
            'Resp_projeto',
            'Orgaos'
        ])
            ->whereIn('Status', ['TRAMITADO', 'CORRIGIR', 'AGUARDANDO', 'FINALIZADO'])
            ->where('Orgao_Concedente', '=', 1)
            ->get();

        return view('trdigital.tr', compact('nProcessos'));
    }
    public function tr_aguardando()
    {
        $nProcessos = N_processo::with([
            'Doc_anexo1',
            'Doc_anexo2',
            'instituicao',
            'Doc_anexo2',
            'Projeto_conteudo',
            'Resp_projeto',
            'Orgaos'
        ])->whereIn('Status', ['TRAMITADO', 'AGUARDANDO'])
            ->where('Orgao_Concedente', '=', 1)
            ->get();

        return view('trdigital.tr', compact('nProcessos'));
    }
    public function tr_corrigir()
    {
        $nProcessos = N_processo::with([
            'Doc_anexo1',
            'Doc_anexo2',
            'instituicao',
            'Doc_anexo2',
            'Projeto_conteudo',
            'Resp_projeto',
            'Orgaos'
        ])->where('Status', 'CORRIGIR')
            ->where('Orgao_Concedente', '=', 1)
            ->get();

        return view('trdigital.tr', compact('nProcessos'));
    }

    public function tr_finalizada()
    {
        $nProcessos = N_processo::with([
            'Doc_anexo1',
            'Doc_anexo2',
            'instituicao',
            'Doc_anexo2',
            'Projeto_conteudo',
            'Resp_projeto',
            'Orgaos'
        ])->where('Status', 'FINALIZADO')
            ->where('Orgao_Concedente', '=', 1)
            ->get();

        return view('trdigital.tr', compact('nProcessos'));
    }


    public function proponente()
    {

        $processoCount  =  N_processo::where('user_id', '=', auth()->id())
            ->count();

        $nProcessos  =  N_processo::with([
            'Doc_anexo1',
            'Doc_anexo2',
            'instituicao',
            'Doc_anexo2',
            'Projeto_conteudo',
            'Resp_projeto',
            'Orgaos',
            'anexo_sigcon'


        ])->where('user_id', '=', auth()->id())->orderby('id', 'DESC')->get();

        return view('trdigital.proponente.index', compact('nProcessos'));
    }

    public function create()
    {

        // $nProcessos = N_processo::with([           
        //     'Metas'
        // ])->get();
        $orgaos = Orgaos::all();

        return view('trdigital.create', compact('orgaos'));
    }


    public function store(Request $request)
    {
        $nProcesso = N_Processo::create([
            'user_id' => $request->user_id,
            'Orgao_Concedente' => $request->Orgao_Concedente,
            // 'N_proposta' => $request->N_proposta,
        ]);

        // - 1
        $anexo1Data = [
            'n_processo_id' => $nProcesso->id,
            'N_proposta' => $request->N_proposta,
        ];

        Doc_anexo1::create($anexo1Data);


        // fim do 1

        // 2
        $resp_instituicao = [
            'n_processo_id' => $nProcesso->id,
            'Nome_Resp_Instituicao' => $request->Nome_Resp_Instituicao,
            'Cargo_Resp_Instituicao' => $request->Cargo_Resp_Instituicao,
            'End_Resp_Instituicao' => $request->End_Resp_Instituicao,
            'Telefone_Resp_Instituicao' => $request->Telefone_Resp_Instituicao,
            'Email_Resp_Instituicao' => $request->Email_Resp_Instituicao,

        ];


        Resp_instituicao::create($resp_instituicao);

        //         // fim do 2


        // // Inicio do 3        
        $instituicao = [
            'n_processo_id' => $nProcesso->id,
            'Nome_Instituicao' => $request->Nome_Instituicao,
            'CNPJ_Instituicao' => $request->CNPJ_Instituicao,
            'Telefone_Instituicao' => $request->Telefone_Instituicao,
            'Endereco_Instituicao' => $request->Endereco_Instituicao,
            'Cidade_Instituicao' => $request->Cidade_Instituicao,
            'Estado_Instituicao' => $request->Estado_Instituicao,
            'Cep_Instituicao' => $request->Cep_Instituicao,
            'Email_Instituicao' => $request->Email_Instituicao,
            'Telefone_Instituicao' => $request->Telefone_Instituicao,

        ];

        Instituicao::create($instituicao);
        //  // fim do 3

        //  // inicio do 4

        $resp_projeto = [
            'n_processo_id' => $nProcesso->id,
            'Nome_Resp_projeto' => $request->Nome_Resp_projeto,
            'Cargo_Resp_projeto' => $request->Cargo_Resp_projeto,
            'Endereco_Resp_projeto' => $request->Endereco_Resp_projeto,
            'Telefone_Resp_projeto' => $request->Telefone_Resp_projeto,
            'Email_Resp_projeto' => $request->Email_Resp_projeto,

        ];

        Resp_projeto::create($resp_projeto);
        // fim do 4

        // inicio do 5
        $doc_anexo2 = [
            'n_processo_id' => $nProcesso->id,

        ];



        // Doc_anexo2::create($doc_anexo2);

        $projeto_conteudo = [
            'n_processo_id' => $nProcesso->id,
            'Titulo_Projeto_Conteudo' => $request->Titulo_Projeto_Conteudo,
            'Objeto_Projeto_Conteudo' => $request->Objeto_Projeto_Conteudo,
            'Obj_Geral_Projeto_Conteudo' => $request->Obj_Geral_Projeto_Conteudo,
            'Obj_especifico_Projeto_Conteudo' => $request->Obj_especifico_Projeto_Conteudo,
            'Justificativa_Projeto_Conteudo' => $request->Justificativa_Projeto_Conteudo,
            'Contextualizacao_Projeto_Conteudo' => $request->Contextualizacao_Projeto_Conteudo,
            'Diagnostico_Projeto_Conteudo' => $request->Diagnostico_Projeto_Conteudo,
            'Importancia_Projeto_Conteudo' => $request->Importancia_Projeto_Conteudo,
            'Caracterizacao_Projeto_Conteudo' => $request->Caracterizacao_Projeto_Conteudo,
            'Publico_Alvo_Interno_Projeto_Conteudo' => $request->Publico_Alvo_Interno_Projeto_Conteudo,
            'Publico_Alvo_Externo_Projeto_Conteudo' => $request->Publico_Alvo_Externo_Projeto_Conteudo,
            'Problemas_Projeto_Conteudo' => $request->Problemas_Projeto_Conteudo,
            'Resultados_Projeto_Conteudo' => $request->Resultados_Projeto_Conteudo,
            'Inicio_Projeto_Conteudo' => $request->Inicio_Projeto_Conteudo,
            'Fim_Projeto_Conteudo' => $request->Fim_Projeto_Conteudo,
            'N_Emenda_Projeto_Conteudo' => $request->N_Emenda_Projeto_Conteudo,
            'Nome_Autor_Emenda_Projeto_Conteudo' => $request->Nome_Autor_Emenda_Projeto_Conteudo,
            'Valor_Repasse_Projeto_Conteudo' => $request->Valor_Repasse_Projeto_Conteudo,
            'Valor_Contrapartida_Projeto_Conteudo' => $request->Valor_Contrapartida_Projeto_Conteudo,

        ];
        //     dd($projeto_conteudo);

        Projeto_conteudo::create($projeto_conteudo);

        // $metas = [
        //     'n_processo_id' => $nProcesso->id,
        //     'Especificacao_metas' => $request->Especificacao_metas,
        //     'Quantidade_metas' => $request->Quantidade_metas,
        //     'Unidade_medida_metas' => $request->Unidade_medida_metas,
        //     'Inicio_metas' => $request->Inicio_metas,
        //     'Termino_metas' => $request->Termino_metas,
        //     // 'Correcao_metas_sit' => $request->Correcao_metas_sit,
        //     // 'Obs_metas' => $request->Obs_metas,
        // ];

        // //   dd($metas);

        // Metas::create($metas);

        return redirect()->route('trdigital.show', ['trdigital' => $nProcesso->id]);
    }

    public function metasstore(Request $request, $id)
    {

        $data = [
            'n_processo_id' => $id,
            'Especificacao_metas' => $request->input('Especificacao_metas'),
            'Quantidade_metas' => $request->input('Quantidade_metas'),
            'Unidade_medida_metas' => $request->input('Unidade_medida_metas'),
            'Inicio_metas' => $request->input('Inicio_metas'),
            'Termino_metas' => $request->input('Termino_metas'),
        ];

        Metas::create($data);

        // Adicione uma mensagem de alerta após a criação ou atualização bem-sucedida do Doc_anexo1
        if ($data) {
            return back()->with('create', '7. Meta Criada com sucesso!');
        } else {
            return back()->with('error', '7. Erro ao criar Meta.');
        }

        // return redirect()->back();
    }

    public function metasupdate(Request $request, Metas $meta)
    {

        $data = [
            'Especificacao_metas' => $request->input('Especificacao_metas'),
            'Quantidade_metas' => $request->input('Quantidade_metas'),
            'Unidade_medida_metas' => $request->input('Unidade_medida_metas'),
            'Inicio_metas' => $request->input('Inicio_metas'),
            'Termino_metas' => $request->input('Termino_metas'),
        ];

        //  $meta->update($data);
        Metas::findOrFail($request->id)->update($data);

        if ($data) {
            return back()->with('edit', '7. Meta: - Atualizada com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Atualizar Meta.');
        }

        //  dd($data); 
        //  return redirect()->back();
    }
    public function etapaupdate(Request $request)
    {

        $data = [
            // 'metas_id' => $id,
            //'metas_id' => $request->input('metas_id'),
            'Especificacao_etapa' => $request->input('Especificacao_etapa'),
            'Quantidade_etapa' => $request->input('Quantidade_etapa'),
            'Unidade_medida_etapa' => $request->input('Unidade_medida_etapa'),
            'Inicio_etapa' => $request->input('Inicio_etapa'),
            'Termino_etapa' => $request->input('Termino_etapa')
        ];
        //  $meta->update($data);
        Etapas::findOrFail($request->id)->update($data);

        if ($data) {
            return back()->with('edit', '7. Etapa: - Atualizada com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Atualizar Etapa.');
        }
        //   return redirect()->back();
    }

    public function metasstoredestroy($id)
    {
        $metas = Metas::find($id);

        if (!$metas) {
        }

        $metas->delete();

        if ($metas) {
            return back()->with('delete', '7. Meta: - Deletada com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Deletar Meta.');
        }

        //    return redirect()->back()->with('delete', 'Meta excluída com sucesso!');
    }


    public function etapasstoredestroy($id)
    {
        $etapas = Etapas::find($id);

        if (!$etapas) {
            // Lógica de tratamento se a meta não for encontrada
        }

        $etapas->delete();

        if ($etapas) {
            return back()->with('delete', '7. Etapa: - Deletada com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Deletar Etapa.');
        }
        //   return redirect()->back()->with('delete', 'Meta excluída com sucesso!');
    }

    public function planoconsolidado(Request $request, $id)
    {
        // Função para remover caracteres não numéricos e transformar vírgulas em pontos
        function limparValor($valor)
        {
            return str_replace(',', '.', preg_replace('/[^0-9,]/', '', $valor));
        }

        $valorConcedente = limparValor($request->input('Valor_concedente'));
        $valorProponenteFinanceira = limparValor($request->input('Valor_proponente_financeira'));
        $valorProponenteNaoFinanceira = limparValor($request->input('Valor_proponente_nao_financeira'));

        // Verificar se os valores são numéricos, senão definir como NULL
        $valorConcedente = is_numeric($valorConcedente) ? $valorConcedente : null;
        $valorProponenteFinanceira = is_numeric($valorProponenteFinanceira) ? $valorProponenteFinanceira : null;
        $valorProponenteNaoFinanceira = is_numeric($valorProponenteNaoFinanceira) ? $valorProponenteNaoFinanceira : null;

        $data = [
            'n_processo_id' => $id,
            'metas_id' => $request->input('metas_id'),
            'Natureza' => $request->input('Natureza'),
            'OutrosNatureza' => $request->input('OutrosNatureza'),
            'Discriminacao' => $request->input('Discriminacao'),
            'Complemento' => $request->input('Complemento'),
            'Discriminacao_outros' => $request->input('Discriminacao_outros'),
            'Complemento' => $request->input('Complemento'),
            'Valor_concedente' => $valorConcedente,
            'Valor_proponente_financeira' => $valorProponenteFinanceira,
            'Valor_proponente_nao_financeira' => $valorProponenteNaoFinanceira,
        ];

        Plano_consolidado::create($data);
        if ($data) {
            return back()->with('create', '8. Plano de Aplicação Consolidado: - Criado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Criar Plano de Aplicação Consolidado.');
        }
    }



    public function planodetalhado(Request $request, $id)
    {
        // Remove caracteres não numéricos
        $valorSemPontos = preg_replace('/[^0-9]/', '', $request->input('Valor_unit_detalhado'));

        // Converte para valor decimal
        $valorDecimal = (float) substr_replace($valorSemPontos, '.', -2, 0);

        $data = [
            'n_processo_id' => $id,
            'metas_id' => $request->input('metas_id'),
            'Natureza_id' => $request->input('Natureza_id'),
            'Natureza_detalhado' => $request->input('Natureza_detalhado'),
            'Produto_Servico_detalhado' => $request->input('Produto_Servico_detalhado'),
            'Unidade_medida_detalhado' => $request->input('Unidade_medida_detalhado'),
            'Quantidade_detalhado' => $request->input('Quantidade_detalhado'),
            //   'Valor_unit_detalhado' => $valorDecimal,
            'Valor_unit_detalhado' => $this->parseValorInput($request->input('Valor_unit_detalhado')),

        ];

        Plano_detalhado::create($data);

        if ($data) {
            return back()->with('create', '9. Plano de Aplicação Detalhado - Memória de Cálculo: - Criado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Criar Plano de Aplicação Detalhado.');
        }
    }


    public function planodetalhado_update(Request $request, $id)
    {
        $data = [
            'Natureza_id' => $request->input('Natureza_id'),
            'Natureza_detalhado' => $request->input('Natureza_detalhado'),
            'Produto_Servico_detalhado' => $request->input('Produto_Servico_detalhado'),
            'Unidade_medida_detalhado' => $request->input('Unidade_medida_detalhado'),
            'Quantidade_detalhado' => $request->input('Quantidade_detalhado'),
            'Valor_unit_detalhado' => $this->parseValorInput($request->input('Valor_unit_detalhado')),
        ];

        Plano_detalhado::findOrFail($request->id)->update($data);

        if ($data) {
            return back()->with('edit', '9. Plano de Aplicação Detalhado - Memória de Cálculo: - Atualizado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Atualizar Plano de Aplicação Detalhado.');
        }
    }

    private function parseValorInput($inputValue)
    {
        $cleanValue = preg_replace('/[^\d,]/', '', $inputValue);
        $parsedValue = str_replace(',', '.', $cleanValue);

        return $parsedValue;
    }

    public function planoconsolidadoupdate(Request $request, $id)
    {
        // Remove caracteres não numéricos e transforma vírgulas em pontos
        $valorConcedente = str_replace(',', '.', preg_replace('/[^0-9,]/', '', $request->input('Valor_concedente')));
        $valorProponenteFinanceira = str_replace(',', '.', preg_replace('/[^0-9,]/', '', $request->input('Valor_proponente_financeira')));
        $valorProponenteNaoFinanceira = str_replace(',', '.', preg_replace('/[^0-9,]/', '', $request->input('Valor_proponente_nao_financeira')));

        $data = [
            // 'n_processo_id' => $id,
            'metas_id' => $request->input('metas_id'),
            'Natureza' => $request->input('Natureza'),
            'OutrosNatureza' => $request->input('OutrosNatureza'),
            'Discriminacao' => $request->input('Discriminacao'),
            'Complemento' => $request->input('Complemento'),
            'Discriminacao_outros' => $request->input('Discriminacao_outros'),
            'Complemento' => $request->input('Complemento'),
            'Valor_concedente' => $valorConcedente,
            'Valor_proponente_financeira' => $valorProponenteFinanceira,
            'Valor_proponente_nao_financeira' => $valorProponenteNaoFinanceira,
        ];

        Plano_consolidado::findOrFail($request->id)->update($data);

        if ($data) {
            return back()->with('edit', '8. Plano de Aplicação Consolidado: - Atualizado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Atualizar Plano de Aplicação Consolidado.');
        }
    }

    public function planoconsolidadodestroy($id)
    {
        $planoconsolidado = Plano_consolidado::find($id);

        if (!$planoconsolidado) {
            // Lógica de tratamento se a meta não for encontrada
        }

        $planoconsolidado->delete();

        if ($planoconsolidado) {
            return back()->with('delete', '8. Plano de Aplicação Consolidado: - Deletado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Deletar Plano de Aplicação Consolidado.');
        }
    }


    public function planodetalhado_destroy($id)
    {
        $planodetalhado = Plano_detalhado::find($id);

        if (!$planodetalhado) {
            // Lógica de tratamento se a meta não for encontrada
        }

        $planodetalhado->delete();
        if ($planodetalhado) {
            return back()->with('delete', '9. Plano de Aplicação Detalhado - Memória de Cálculo: - Deletado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao deletar Plano de Aplicação Detalhado.');
        }
    }

    public function etapasstore(Request $request, $id)
    {

        $etapas = [
            'metas_id' => $id,
            //'metas_id' => $request->input('metas_id'),
            'Especificacao_etapa' => $request->input('Especificacao_etapa'),
            'Quantidade_etapa' => $request->input('Quantidade_etapa'),
            'Unidade_medida_etapa' => $request->input('Unidade_medida_etapa'),
            'Inicio_etapa' => $request->input('Inicio_etapa'),
            'Termino_etapa' => $request->input('Termino_etapa'),
        ];


        Etapas::create($etapas);

        if ($etapas) {
            return back()->with('create', '7. Etapa: - Criada com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Criar Etapa.');
        }
    }
    public function cronograma_store(Request $request, $id)
    {
        // Remove caracteres não numéricos
        $valorSemPontos = preg_replace('/[^0-9]/', '', $request->input('valor_desembolso'));

        // Converte para valor decimal
        $valorDecimal = (float) substr_replace($valorSemPontos, '.', -2, 0);

        $etapas = [
            'n_processo_id' => $id,
            'metas_id' => $request->input('metas_id'),
            'ano' => $request->input('ano'),
            'mes' => $request->input('mes'),
            'fonte' => $request->input('fonte'),
            //  'valor_desembolso' => $valorDecimal,
            'valor_desembolso' => $this->parseValorInput($request->input('valor_desembolso')),

        ];

        Cronograma_desembolso::create($etapas);

        if ($etapas) {
            return back()->with('create', '10. Cronograma de Desembolso: - Criado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Criar Cronograma de Desembolso.');
        }
    }



    public function cronograma_update(Request $request, $id)
    {
        // Remove caracteres não numéricos
        $valorSemPontos = preg_replace('/[^0-9]/', '', $request->input('valor_desembolso'));

        // Converte para valor decimal
        $valorDecimal = (float) substr_replace($valorSemPontos, '.', -2, 0);

        $data = [
            'metas_id' => $request->input('metas_id'),
            'ano' => $request->input('ano'),
            'mes' => $request->input('mes'),
            'fonte' => $request->input('fonte'),
            'valor_desembolso' => $this->parseValorInput($request->input('valor_desembolso')),

            //  'valor_desembolso' => $valorDecimal,
        ];

        Cronograma_desembolso::findOrFail($request->id)->update($data);

        if ($data) {
            return back()->with('edit', '10. Cronograma de Desembolso: - Atualizado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Atualizar Cronograma de Desembolso.');
        }
    }


    public function cronograma_destroy($id)
    {
        $cronograma_desembolso = Cronograma_desembolso::find($id);

        if (!$cronograma_desembolso) {
            // Lógica de tratamento se a meta não for encontrada
        }

        $cronograma_desembolso->delete();

        if ($cronograma_desembolso) {
            return back()->with('delete', '10. Cronograma de Desembolso: - Deletado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Deletar Cronograma de Desembolso.');
        }
    }


    public function obras_equipamento(Request $request, $id)
    {
        // Remove caracteres não numéricos
        $valorSemPontos = preg_replace('/[^0-9]/', '', $request->input('Valor_unit'));

        // Converte para valor decimal
        $valorDecimal = (float) substr_replace($valorSemPontos, '.', -2, 0);

        $data = [
            'n_processo_id' => $id,
            'Natureza_id' => $request->input('Natureza_id'),
            'Cidade_id' => $request->input('Cidade_id'),
            'Especificacao' => $request->input('Especificacao'),
            'Unidade' => $request->input('Unidade'),
            'Qtd' => $request->input('Qtd'),
            'Valor_unit' => $this->parseValorInput($request->input('Valor_unit')),
            //  'Valor_unit' => $valorDecimal,
            'Local_destino' => $request->input('Local_destino'),
            'Propriedade' => $request->input('Propriedade'),

        ];

        Obras_equipamento::create($data);

        if ($data) {
            return back()->with('create', '11. Relação de Obras e Equipamentos / Material Permanente: - Criado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Criar Relação de Obras e Equipamentos / Material Permanente.');
        }
    }

    public function obras_equipamento_update(Request $request, $id)
    {
        // Remove caracteres não numéricos
        $valorSemPontos = preg_replace('/[^0-9]/', '', $request->input('Valor_unit'));

        // Converte para valor decimal
        $valorDecimal = (float) substr_replace($valorSemPontos, '.', -2, 0);

        $data = [
            //     'n_processo_id' => $id,
            'Natureza_id' => $request->input('Natureza_id'),
            'Cidade_id' => $request->input('Cidade_id'),
            'Especificacao' => $request->input('Especificacao'),
            'Unidade' => $request->input('Unidade'),
            'Qtd' => $request->input('Qtd'),
            //  'Valor_unit' => $valorDecimal,
            'Valor_unit' => $this->parseValorInput($request->input('Valor_unit')),

            'Local_destino' => $request->input('Local_destino'),
            'Propriedade' => $request->input('Propriedade'),
        ];

        Obras_equipamento::findOrFail($request->id)->update($data);

        if ($data) {
            return back()->with('edit', '11. Relação de Obras e Equipamentos / Material Permanente: - Atualizado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Atualizar Relação de Obras e Equipamentos / Material Permanente.');
        }
    }


    public function obras_equipamento_destroy($id)
    {
        $obras_equipamento = Obras_equipamento::find($id);

        if (!$obras_equipamento) {
        }

        $obras_equipamento->delete();

        if ($obras_equipamento) {
            return back()->with('delete', '11. Relação de Obras e Equipamentos / Material Permanente: - Deletado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Deletar Relação de Obras e Equipamentos / Material Permanente.');
        }
    }

    public function pesquisa_mercadologica(Request $request, $id)
    {
        $pesquisa_mercadologica = Pesquisa_mercadologica::create([
            'n_processo_id' => $id,
            'Descricao_bem' => $request->Descricao_bem,
            'Qtd' => $request->Qtd,
        ]);

        foreach ($request->Empresa as $key => $empresa) {
            $pivotData = [
                'Empresa' => $empresa,
                'Valor' => $request->Valor[$key],
            ];

            if ($request->hasFile('Anexo') && isset($request->file('Anexo')[$key]) && $request->file('Anexo')[$key]->isValid()) {
                $file = $request->file('Anexo')[$key];
                $filePath = $file->store('pdfs/pesquisa_mercadologica', 'public');
                $pivotData['Anexo'] = $filePath;
            } else {
                $pivotData['Anexo'] = null; // Valor padrão se não houver anexo
            }

            $pesquisa_mercadologica->pesquisa_mercadologica_pivots()->create($pivotData);
        }


        if ($pesquisa_mercadologica) {
            return back()->with('create', '12. Pesquisa Mercadológica: - Criado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Criar Pesquisa Mercadológica');
        }
    }


    public function pesquisa_nome_mercadologica_update(Request $request, $id)
    {
        $pesquisa_mercadologica = Pesquisa_mercadologica::findOrFail($id);

        $pesquisa_mercadologica->update([
            'Descricao_bem' => $request->Descricao_bem,
            'Qtd' => $request->Qtd,
        ]);

        //    $pesquisa_mercadologica->update($pivotData);

        if ($pesquisa_mercadologica) {
            return back()->with('edit', '12. Pesquisa Mercadológica -  Descrição do Bem: - Atualizado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Atualizar Pesquisa Mercadológica');
        }
    }












    public function pesquisa_mercadologica_update(Request $request, $pivotid)
    {
        // Encontre o registro existente de Pesquisa_mercadologica a ser atualizado
        $pesquisa_mercadologica = Pesquisa_mercadologica_pivot::findOrFail($pivotid);

        // Atualize os campos principais de Pesquisa_mercadologica
        // $pesquisa_mercadologica->update([
        //     'Descricao_bem' => $request->Descricao_bem,
        //     'Qtd' => $request->Qtd,
        // ]);


        if (is_array($request->Empresa)) {
            foreach ($request->Empresa as $key => $empresa) {
                $pivotData = [
                    'Empresa' => $empresa,
                    'Valor' => $request->Valor[$key],
                ];

                // Resto do seu código de processamento aqui...
            }
        } else {
            // Se $request->Empresa não for um array, trate-o como um único valor
            $pivotData = [
                'Empresa' => $request->Empresa,
                'Valor' => $request->Valor, // Sem a necessidade de [$key] aqui
            ];
        }


        if ($request->hasFile('Anexo') && $request->file('Anexo')->isValid()) {
            $file = $request->file('Anexo');
            $filePath = $file->store('pdfs/pesquisa_mercadologica', 'public');
            $pivotData['Anexo'] = $filePath;
        }

        $pesquisa_mercadologica->update($pivotData);

        if ($pesquisa_mercadologica) {
            return back()->with('edit', '12. Pesquisa Mercadológica - Dados da Empresa: - Atualizado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Atualizar Pesquisa Mercadológica');
        }
    }





    public function pesquisa_mercadologica_destroy($pivotId)
    {
        $pivotItem = Pesquisa_mercadologica_pivot::find($pivotId);

        if (!$pivotItem) {
            // Lógica de tratamento se o item do pivot não for encontrado
        }

        $pivotItem->delete();

        if ($pivotItem) {
            return back()->with('delete', '12. Pesquisa Mercadológica - Dados da Empresa: - Deletado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Deletar Pesquisa Mercadológica');
        }
    }

    public function pesquisa_nome_mercadologica_destroy($pivotId)
    {
        $pesquisa_mercadologica = Pesquisa_mercadologica::find($pivotId);

        if (!$pesquisa_mercadologica) {
            // Lógica de tratamento se o item do pivot não for encontrado
        }

        $pesquisa_mercadologica->delete();

        if ($pesquisa_mercadologica) {
            return back()->with('delete', '12. Pesquisa Mercadológica: - Deletado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao Deletar Pesquisa Mercadológica');
        }
    }


    public function show($id)
    {
        $n_processo = N_processo::with([
            'Doc_anexo1',
            'Doc_anexo2',
            'instituicao',
            'Doc_anexo2',
            'Projeto_conteudo',
            'Resp_projeto',
            'Orgaos'
        ])->find($id);

        $biblioteca = Biblioteca::get();

        return view('trdigital.trgerada', compact('n_processo', 'biblioteca'));
    }

    // TUDO COMECA NESTE EDITAR AQUI

    public function edit(N_processo $n_processo, $id)
    {
        $orgaos = Orgaos::all();
        $n_processo = N_processo::with([
            'Doc_anexo1',
            'Doc_anexo2',
            'Doc_prefeitura',
            'instituicao',
            'Resp_instituicao',
            'Projeto_conteudo',
            'Resp_projeto',
            'Orgaos',
            'Metas',
            'Plano_consolidado',
            'Plano_detalhado',
            'Cronograma_desembolso',
            'Obras_equipamento',
            'Pesquisa_mercadologica',
        ])->find($id);

        $biblioteca = Biblioteca::all();

        $n_processo = N_processo::findOrFail($id);
        $metas = Metas::where('n_processo_id', $id)->get();
        $etapas = Metas::with('etapas')->get();
        $planoconsolidado = Plano_consolidado::with(['Metas'])->where('n_processo_id', $id,)->get();
        $planodetalhado = Plano_detalhado::with('Plano_consolidado')->where('n_processo_id', $id,)->get();
        $cronograma_desembolso = Cronograma_desembolso::where('n_processo_id', $id,)->get();
        $obras_equipamento = Obras_equipamento::where('n_processo_id', $id,)->get();
        $cidade = Cidade::get();

        // $pesquisa_mercadologica = Pesquisa_mercadologica::with('Pesquisa_mercadologica_pivot')->get();
        $pesquisa_mercadologica = Pesquisa_mercadologica::with('pesquisa_mercadologica_pivots')->where('n_processo_id', $id)->get();

        // $pesquisa_mercadologica_pivots = $pesquisa_mercadologica->Pesquisa_mercadologica_pivot;



        if (!$n_processo) {
            // Caso não encontre o registro com o ID especificado, você pode redirecionar para uma página de erro ou retornar uma mensagem de erro.
            return redirect()->route('trdigital.index')->with('error', 'O registro não foi encontrado.');
        }
        return view('trdigital.edit', compact(
            'cidade',
            'n_processo',
            'orgaos',
            'metas',
            'etapas',
            'planoconsolidado',
            'planodetalhado',
            'cronograma_desembolso',
            'obras_equipamento',
            'pesquisa_mercadologica',
            'biblioteca'

        ));
    }

    public function validar(N_processo $n_processo, $id)
    {

        $orgaos = Orgaos::all();
        $n_processo = N_processo::with([
            'Doc_anexo1',
            'Doc_anexo2',
            'Doc_prefeitura',
            'instituicao',
            'Resp_instituicao',
            'Projeto_conteudo',
            'Resp_projeto',
            'Orgaos',
            'Metas',
            'Plano_consolidado',
            'Plano_detalhado',
            'Cronograma_desembolso',
            'Obras_equipamento',
            'Pesquisa_mercadologica',
        ])->find($id);

        //   $n_processo = N_processo::find($id);
        $biblioteca = Biblioteca::all();

        $n_processo = N_processo::findOrFail($id);
        $metas = Metas::where('n_processo_id', $id)->get();

        $etapas = Metas::with('etapas')->get();
        $planoconsolidado = Plano_consolidado::with(['Metas'])->where('n_processo_id', $id,)->get();
        $planodetalhado = Plano_detalhado::with('Plano_consolidado')->where('n_processo_id', $id,)->get();
        $cronograma_desembolso = Cronograma_desembolso::where('n_processo_id', $id,)->get();
        $obras_equipamento = Obras_equipamento::where('n_processo_id', $id,)->get();
        $cidade = Cidade::get();

        // $pesquisa_mercadologica = Pesquisa_mercadologica::with('Pesquisa_mercadologica_pivot')->get();
        $pesquisa_mercadologica = Pesquisa_mercadologica::with('pesquisa_mercadologica_pivots')->where('n_processo_id', $id)->get();

        if (!$n_processo) {
            // Caso não encontre o registro com o ID especificado, você pode redirecionar para uma página de erro ou retornar uma mensagem de erro.
            return redirect()->route('trdigital.index')->with('error', 'O registro não foi encontrado.');
        }
        return view('trdigital.validar', compact(
            'cidade',
            'n_processo',
            'orgaos',
            'metas',
            'etapas',
            'planoconsolidado',
            'planodetalhado',
            'cronograma_desembolso',
            'obras_equipamento',
            'pesquisa_mercadologica',
            'biblioteca',


        ));
    }

    public function update_oficio(Request $request, $id)
    {

        // Encontra o registro que deseja atualizar pelo ID
        $nProcesso = N_processo::find($id);

        if (!$nProcesso) {
            // Caso não encontre o registro com o ID especificado, você pode redirecionar para uma página de erro ou retornar uma mensagem de erro.
            return redirect()->route('trdigital.index')->with('error', 'O registro não foi encontrado.');
        }

        // Atualiza os dados do N_processo com base nos dados do formulário
        $nProcesso->user_id = $request->user_id;
        $nProcesso->Orgao_Concedente = $request->Orgao_Concedente;
        // Salva o registro atualizado no banco de dados
        $nProcesso->save();

        // Atualiza ou cria o registro do Doc_anexo1 correspondente ao N_processo atual
        $anexo1Data = [
            'N_proposta' => $request->N_proposta,
        ];

        if ($request->hasFile('Comp_Oficio')) {
            $anexo1Data['Comp_Oficio'] = $request->file('Comp_Oficio')->store('pdfs/doc_anexo1', 'public');
        }
        if ($request->hasFile('Comp_Assinado')) {
            $anexo1Data['Comp_Assinado'] = $request->file('Comp_Assinado')->store('pdfs/doc_anexo1', 'public');
        }

        Doc_anexo1::updateOrCreate(
            ['N_processo_id' => $nProcesso->id],
            $anexo1Data
        );

        // Adicione uma mensagem de alerta após a criação ou atualização bem-sucedida do Doc_anexo1
        if ($anexo1Data) {
            return back()->with('create', ' 1. Ofício Atualizado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao criar o ofício.');
        }
    }
    public function update_resp_instituicao(Request $request, $id)
    {

        // Encontra o registro que deseja atualizar pelo ID
        $nProcesso = N_processo::find($id);

        if (!$nProcesso) {
            // Caso não encontre o registro com o ID especificado, você pode redirecionar para uma página de erro ou retornar uma mensagem de erro.
            return redirect()->route('trdigital.index')->with('error', 'O registro não foi encontrado.');
        }

        // Atualiza os dados do N_processo com base nos dados do formulário
        $nProcesso->user_id = $request->user_id;
        $nProcesso->Orgao_Concedente = $request->Orgao_Concedente;
        // Salva o registro atualizado no banco de dados
        $nProcesso->save();


        $resp_instituicao = [
            'N_processo_id' => $nProcesso->id,
            'Nome_Resp_Instituicao' => $request->Nome,
            'Cargo_Resp_Instituicao' => $request->Cargo_Resp_Instituicao,
            'Cidade_Resp_Instituicao' => $request->Cidade_Resp_Instituicao,
            'Estado_Resp_Instituicao' => $request->Estado_Resp_Instituicao,
            'Cep_Resp_Instituicao' => $request->Cep_Resp_Instituicao,
            'End_Resp_Instituicao' => $request->End_Resp_Instituicao,
            'Telefone_Resp_Instituicao' => $request->Telefone_Resp_Instituicao,
            'Email_Resp_Instituicao' => $request->Email_Resp_Instituicao,
        ];


        // dd($resp_instituicao);

        //dd($resp_instituicao);
        if ($request->hasFile('Anexo1_Resp_Instituicao')) {
            $resp_instituicao['Anexo1_Resp_Instituicao'] = $request->file('Anexo1_Resp_Instituicao')->store('pdfs/resp_instituicao', 'public');
        }
        if ($request->hasFile('Anexo2_Resp_Instituicao')) {
            $resp_instituicao['Anexo2_Resp_Instituicao'] = $request->file('Anexo2_Resp_Instituicao')->store('pdfs/resp_instituicao', 'public');
        }

        Resp_instituicao::updateOrCreate(
            ['N_processo_id' => $nProcesso->id],
            $resp_instituicao
        );

        // Adicione uma mensagem de alerta após a criação ou atualização bem-sucedida do Doc_anexo1
        if ($resp_instituicao) {
            return back()->with('create', ' 2. Identificação do Responsável pela Instituição.
-            Atualizado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao criar o ofício.');
        }
    }
    public function update_instituicao(Request $request, $id)
    {

        // Encontra o registro que deseja atualizar pelo ID
        $nProcesso = N_processo::find($id);

        if (!$nProcesso) {
            // Caso não encontre o registro com o ID especificado, você pode redirecionar para uma página de erro ou retornar uma mensagem de erro.
            return redirect()->route('trdigital.index')->with('error', 'O registro não foi encontrado.');
        }

        // Atualiza os dados do N_processo com base nos dados do formulário
        $nProcesso->user_id = $request->user_id;
        $nProcesso->Orgao_Concedente = $request->Orgao_Concedente;
        // Salva o registro atualizado no banco de dados
        $nProcesso->save();


        $instituicao = [
            'n_processo_id' => $nProcesso->id,
            'Nome_Instituicao' => $request->Nome_Instituicao,
            'CNPJ_Instituicao' => $request->CNPJ_Instituicao,
            'Telefone_Instituicao' => $request->Telefone_Instituicao,
            'Endereco_Instituicao' => $request->Endereco_Instituicao,
            'Cidade_Instituicao' => $request->Cidade_Instituicao,
            'Estado_Instituicao' => $request->Estado_Instituicao,
            'Cep_Instituicao' => $request->Cep_Instituicao,
            'Email_Instituicao' => $request->Email_Instituicao,
            'Telefone_Instituicao' => $request->Telefone_Instituicao,
        ];

        if ($request->hasFile('Anexo1_Instituicao')) {
            $instituicao['Anexo1_Instituicao'] = $request->file('Anexo1_Instituicao')->store('pdfs/instituicao', 'public');
        }

        if ($request->hasFile('Anexo2_Instituicao')) {
            $instituicao['Anexo2_Instituicao'] = $request->file('Anexo2_Instituicao')->store('pdfs/instituicao', 'public');
        }

        Instituicao::updateOrCreate(
            ['N_processo_id' => $nProcesso->id],
            $instituicao
        );

        // Adicione uma mensagem de alerta após a criação ou atualização bem-sucedida do Doc_anexo1
        if ($instituicao) {
            return back()->with('create', ' 3. Identificação da Instituição Proponente.
-            Atualizado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao criar o ofício.');
        }
    }
    public function update_resp_projeto(Request $request, $id)
    {

        // Encontra o registro que deseja atualizar pelo ID
        $nProcesso = N_processo::find($id);

        if (!$nProcesso) {
            // Caso não encontre o registro com o ID especificado, você pode redirecionar para uma página de erro ou retornar uma mensagem de erro.
            return redirect()->route('trdigital.index')->with('error', 'O registro não foi encontrado.');
        }

        // Atualiza os dados do N_processo com base nos dados do formulário
        $nProcesso->user_id = $request->user_id;
        $nProcesso->Orgao_Concedente = $request->Orgao_Concedente;
        // Salva o registro atualizado no banco de dados
        $nProcesso->save();


        $resp_projeto = [
            'n_processo_id' => $nProcesso->id,
            'Nome_Resp_projeto' => $request->Nome_Resp_projeto,
            'CPF_Resp_projeto' => $request->CPF_Resp_projeto,
            'RG_Resp_projeto' => $request->RG_Resp_projeto,
            'Cidade_Resp_projeto' => $request->Cidade_Resp_projeto,
            'Estado_Resp_projeto' => $request->Estado_Resp_projeto,
            'Cep_Resp_projeto' => $request->Cep_Resp_projeto,
            'Endereco_Resp_projeto' => $request->Endereco_Resp_projeto,
            'Telefone_Resp_projeto' => $request->Telefone_Resp_projeto,
            'Email_Resp_projeto' => $request->Email_Resp_projeto,

        ];
        if ($request->hasFile('Anexo1_Resp_projeto')) {
            $resp_projeto['Anexo1_Resp_projeto'] = $request->file('Anexo1_Resp_projeto')->store('pdfs/resp_projeto', 'public');
        }
        if ($request->hasFile('Anexo2_Resp_projeto')) {
            $resp_projeto['Anexo2_Resp_projeto'] = $request->file('Anexo2_Resp_projeto')->store('pdfs/resp_projeto', 'public');
        }
        Resp_projeto::updateOrCreate(
            ['N_processo_id' => $nProcesso->id],
            $resp_projeto
        );
        // Adicione uma mensagem de alerta após a criação ou atualização bem-sucedida do Doc_anexo1
        if ($resp_projeto) {
            return back()->with('create', '4. Identificação do Responsável pelo Projeto - Atualizado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao criar o ofício.');
        }
    }

    public function update_doc_anexo2(Request $request, $id)
    {

        // Encontra o registro que deseja atualizar pelo ID
        $nProcesso = N_processo::find($id);

        if (!$nProcesso) {
            // Caso não encontre o registro com o ID especificado, você pode redirecionar para uma página de erro ou retornar uma mensagem de erro.
            return redirect()->route('trdigital.index')->with('error', 'O registro não foi encontrado.');
        }

        // Atualiza os dados do N_processo com base nos dados do formulário
        $nProcesso->user_id = $request->user_id;
        $nProcesso->Orgao_Concedente = $request->Orgao_Concedente;
        // Salva o registro atualizado no banco de dados
        $nProcesso->save();


        $doc_anexo2 = [
            'n_processo_id' => $nProcesso->id,

        ];

        if ($request->hasFile('Doc_Anexo2_Anexo1')) {
            $doc_anexo2['Doc_Anexo2_Anexo1'] = $request->file('Doc_Anexo2_Anexo1')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo2')) {
            $doc_anexo2['Doc_Anexo2_Anexo2'] = $request->file('Doc_Anexo2_Anexo2')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo3')) {
            $doc_anexo2['Doc_Anexo2_Anexo3'] = $request->file('Doc_Anexo2_Anexo3')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo4')) {
            $doc_anexo2['Doc_Anexo2_Anexo4'] = $request->file('Doc_Anexo2_Anexo4')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo5')) {
            $doc_anexo2['Doc_Anexo2_Anexo5'] = $request->file('Doc_Anexo2_Anexo5')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo6')) {
            $doc_anexo2['Doc_Anexo2_Anexo6'] = $request->file('Doc_Anexo2_Anexo6')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo7')) {
            $doc_anexo2['Doc_Anexo2_Anexo7'] = $request->file('Doc_Anexo2_Anexo7')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo8')) {
            $doc_anexo2['Doc_Anexo2_Anexo8'] = $request->file('Doc_Anexo2_Anexo8')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo9')) {
            $doc_anexo2['Doc_Anexo2_Anexo9'] = $request->file('Doc_Anexo2_Anexo9')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo10')) {
            $doc_anexo2['Doc_Anexo2_Anexo10'] = $request->file('Doc_Anexo2_Anexo10')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo11')) {
            $doc_anexo2['Doc_Anexo2_Anexo11'] = $request->file('Doc_Anexo2_Anexo11')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo12')) {
            $doc_anexo2['Doc_Anexo2_Anexo12'] = $request->file('Doc_Anexo2_Anexo12')->store('pdfs/doc_anexo2', 'public');
        }
        Doc_anexo2::updateOrCreate(
            ['N_processo_id' => $nProcesso->id],
            $doc_anexo2
        );

        // Adicione uma mensagem de alerta após a criação ou atualização bem-sucedida do Doc_anexo1
        if ($doc_anexo2) {
            return back()->with('create', '5. Atas, Certidões, Comprovantes e Declarações: - Atualizado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao criar o ofício.');
        }
    }
    public function update_Doc_prefeitura(Request $request, $id)
    {

        // Encontra o registro que deseja atualizar pelo ID
        $nProcesso = N_processo::find($id);

        if (!$nProcesso) {
            // Caso não encontre o registro com o ID especificado, você pode redirecionar para uma página de erro ou retornar uma mensagem de erro.
            return redirect()->route('trdigital.index')->with('error', 'O registro não foi encontrado.');
        }

        // Atualiza os dados do N_processo com base nos dados do formulário
        $nProcesso->user_id = $request->user_id;
        $nProcesso->Orgao_Concedente = $request->Orgao_Concedente;
        // Salva o registro atualizado no banco de dados
        $nProcesso->save();


        $doc_prefeitura = [
            'n_processo_id' => $nProcesso->id,

        ];

        if ($request->hasFile('Oficios_proposta')) {
            $doc_prefeitura['Oficios_proposta'] = $request->file('Oficios_proposta')->store('pdfs/doc_prefeitura', 'public');
        }
        if ($request->hasFile('Oficio_emenda')) {
            $doc_prefeitura['Oficio_emenda'] = $request->file('Oficio_emenda')->store('pdfs/doc_prefeitura', 'public');
        }
        if ($request->hasFile('Delcaracao_contrapartida')) {
            $doc_prefeitura['Delcaracao_contrapartida'] = $request->file('Delcaracao_contrapartida')->store('pdfs/doc_prefeitura', 'public');
        }
        if ($request->hasFile('Comprovante_abertura_conta')) {
            $doc_prefeitura['Comprovante_abertura_conta'] = $request->file('Comprovante_abertura_conta')->store('pdfs/doc_prefeitura', 'public');
        }
        if ($request->hasFile('Comprovante_qualif_tecnica')) {
            $doc_prefeitura['Comprovante_qualif_tecnica'] = $request->file('Comprovante_qualif_tecnica')->store('pdfs/doc_prefeitura', 'public');
        }
        if ($request->hasFile('Diploma_nomeacao')) {
            $doc_prefeitura['Diploma_nomeacao'] = $request->file('Diploma_nomeacao')->store('pdfs/doc_prefeitura', 'public');
        }
        if ($request->hasFile('Ata_eleicao')) {
            $doc_prefeitura['Ata_eleicao'] = $request->file('Ata_eleicao')->store('pdfs/doc_prefeitura', 'public');
        }
        if ($request->hasFile('Doc_posse')) {
            $doc_prefeitura['Doc_posse'] = $request->file('Doc_posse')->store('pdfs/doc_prefeitura', 'public');
        }

        Doc_prefeitura::updateOrCreate(
            ['N_processo_id' => $nProcesso->id],
            $doc_prefeitura
        );

        // Adicione uma mensagem de alerta após a criação ou atualização bem-sucedida do Doc_anexo1
        if ($doc_prefeitura) {
            return back()->with('create', '5. Atas, Certidões, Comprovantes e Declarações: - Atualizado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao criar o ofício.');
        }
    }

    public function update_id_projeto(Request $request, $id)
    {

        // Encontra o registro que deseja atualizar pelo ID
        $nProcesso = N_processo::find($id);

        if (!$nProcesso) {
            // Caso não encontre o registro com o ID especificado, você pode redirecionar para uma página de erro ou retornar uma mensagem de erro.
            return redirect()->route('trdigital.index')->with('error', 'O registro não foi encontrado.');
        }

        // Atualiza os dados do N_processo com base nos dados do formulário
        $nProcesso->user_id = $request->user_id;
        $nProcesso->Orgao_Concedente = $request->Orgao_Concedente;
        // Salva o registro atualizado no banco de dados
        $nProcesso->save();

        $projeto_conteudo = [
            'n_processo_id' => $nProcesso->id,
            'Titulo_Projeto_Conteudo' => $request->Titulo_Projeto_Conteudo,
            'Objeto_Projeto_Conteudo' => $request->Objeto_Projeto_Conteudo,
            'Obj_Geral_Projeto_Conteudo' => $request->Obj_Geral_Projeto_Conteudo,
            'Obj_especifico_Projeto_Conteudo' => $request->Obj_especifico_Projeto_Conteudo,
            'Justificativa_Projeto_Conteudo' => $request->Justificativa_Projeto_Conteudo,
            'Contextualizacao_Projeto_Conteudo' => $request->Contextualizacao_Projeto_Conteudo,
            'Diagnostico_Projeto_Conteudo' => $request->Diagnostico_Projeto_Conteudo,
            'Importancia_Projeto_Conteudo' => $request->Importancia_Projeto_Conteudo,
            'Caracterizacao_Projeto_Conteudo' => $request->Caracterizacao_Projeto_Conteudo,
            'Publico_Alvo_Interno_Projeto_Conteudo' => $request->Publico_Alvo_Interno_Projeto_Conteudo,
            'Publico_Alvo_Externo_Projeto_Conteudo' => $request->Publico_Alvo_Externo_Projeto_Conteudo,
            'Problemas_Projeto_Conteudo' => $request->Problemas_Projeto_Conteudo,
            'Resultados_Projeto_Conteudo' => $request->Resultados_Projeto_Conteudo,
            'Inicio_Projeto_Conteudo' => $request->Inicio_Projeto_Conteudo,
            'Fim_Projeto_Conteudo' => $request->Fim_Projeto_Conteudo,
            'N_Emenda_Projeto_Conteudo' => $request->N_Emenda_Projeto_Conteudo,
            'Nome_Autor_Emenda_Projeto_Conteudo' => $request->Nome_Autor_Emenda_Projeto_Conteudo,
            'Valor_Repasse_Projeto_Conteudo' => $request->Valor_Repasse_Projeto_Conteudo,
            'Valor_Contrapartida_Projeto_Conteudo' => $request->Valor_Contrapartida_Projeto_Conteudo,

        ];
        Projeto_conteudo::updateOrCreate(
            ['N_processo_id' => $nProcesso->id],
            $projeto_conteudo
        );


        // Adicione uma mensagem de alerta após a criação ou atualização bem-sucedida do Doc_anexo1
        if ($projeto_conteudo) {
            return back()->with('create', '6. Identificação do Projeto: - Atualizado com sucesso!');
        } else {
            return back()->with('error', 'Erro ao criar o ofício.');
        }
    }


    public function update(Request $request, $id)
    {
        // Encontra o registro que deseja atualizar pelo ID
        $nProcesso = N_processo::find($id);

        if (!$nProcesso) {
            // Caso não encontre o registro com o ID especificado, você pode redirecionar para uma página de erro ou retornar uma mensagem de erro.
            return redirect()->route('trdigital.index')->with('error', 'O registro não foi encontrado.');
        }

        // Atualiza os dados do N_processo com base nos dados do formulário
        $nProcesso->user_id = $request->user_id;
        $nProcesso->Orgao_Concedente = $request->Orgao_Concedente;
        // Salva o registro atualizado no banco de dados
        $nProcesso->save();

        // Atualiza ou cria o registro do Doc_anexo1 correspondente ao N_processo atual
        $anexo1Data = [
            'N_proposta' => $request->N_proposta,
        ];

        if ($request->hasFile('Comp_Oficio')) {
            $anexo1Data['Comp_Oficio'] = $request->file('Comp_Oficio')->store('pdfs/doc_anexo1', 'public');
        }
        if ($request->hasFile('Comp_Assinado')) {
            $anexo1Data['Comp_Assinado'] = $request->file('Comp_Assinado')->store('pdfs/doc_anexo1', 'public');
        }

        Doc_anexo1::updateOrCreate(
            ['N_processo_id' => $nProcesso->id],
            $anexo1Data
        );



        $resp_instituicao = [
            'N_processo_id' => $nProcesso->id,
            'Nome_Resp_Instituicao' => $request->Nome,
            'Cargo_Resp_Instituicao' => $request->Cargo_Resp_Instituicao,
            'Cidade_Resp_Instituicao' => $request->Cidade_Resp_Instituicao,
            'Estado_Resp_Instituicao' => $request->Estado_Resp_Instituicao,
            'Cep_Resp_Instituicao' => $request->Cep_Resp_Instituicao,
            'End_Resp_Instituicao' => $request->End_Resp_Instituicao,
            'Telefone_Resp_Instituicao' => $request->Telefone_Resp_Instituicao,
            'Email_Resp_Instituicao' => $request->Email_Resp_Instituicao,
        ];
        //dd($resp_instituicao);
        if ($request->hasFile('Anexo1_Resp_Instituicao')) {
            $resp_instituicao['Anexo1_Resp_Instituicao'] = $request->file('Anexo1_Resp_Instituicao')->store('pdfs/resp_instituicao', 'public');
        }
        if ($request->hasFile('Anexo2_Resp_Instituicao')) {
            $resp_instituicao['Anexo2_Resp_Instituicao'] = $request->file('Anexo2_Resp_Instituicao')->store('pdfs/resp_instituicao', 'public');
        }

        Resp_instituicao::updateOrCreate(
            ['N_processo_id' => $nProcesso->id],
            $resp_instituicao
        );

        // Adicione uma mensagem de alerta após a criação ou atualização bem-sucedida do Doc_anexo1
        if ($resp_instituicao) {
            return back()->with('create', 'Item 2 Atualizado com sucesso!');
        } else {
            return back()->with('error', 'Erro! tente novamente.');
        }


        // Atualiza os dados do N_processo com base nos dados do formulário
        $nProcesso->user_id = $request->user_id;
        $nProcesso->Orgao_Concedente = $request->Orgao_Concedente;

        // Salva o registro atualizado no banco de dados
        $nProcesso->save();

        // Atualiza ou cria o registro da Instituicao correspondente ao N_processo atual
        $instituicao = [
            'n_processo_id' => $nProcesso->id,
            'Nome_Instituicao' => $request->Nome_Instituicao,
            'CNPJ_Instituicao' => $request->CNPJ_Instituicao,
            'Telefone_Instituicao' => $request->Telefone_Instituicao,
            'Endereco_Instituicao' => $request->Endereco_Instituicao,
            'Cidade_Instituicao' => $request->Cidade_Instituicao,
            'Estado_Instituicao' => $request->Estado_Instituicao,
            'Cep_Instituicao' => $request->Cep_Instituicao,
            'Email_Instituicao' => $request->Email_Instituicao,
            'Telefone_Instituicao' => $request->Telefone_Instituicao,
        ];

        if ($request->hasFile('Anexo1_Instituicao')) {
            $instituicao['Anexo1_Instituicao'] = $request->file('Anexo1_Instituicao')->store('pdfs/instituicao', 'public');
        }

        if ($request->hasFile('Anexo2_Instituicao')) {
            $instituicao['Anexo2_Instituicao'] = $request->file('Anexo2_Instituicao')->store('pdfs/instituicao', 'public');
        }

        // Verifica se houve alteração no telefone
        //    $telefoneAlterado = $request->Telefone_Instituicao != $nProcesso->instituicao->Telefone_Instituicao;

        // Atualiza o campo Telefone_Instituicao_sit de acordo com a alteração do telefone
        //  $instituicao['Telefone_Instituicao_sit'] = $telefoneAlterado ? 0 : 1;

        Instituicao::updateOrCreate(
            ['N_processo_id' => $nProcesso->id],
            $instituicao
        );



        $resp_projeto = [
            'n_processo_id' => $nProcesso->id,
            'Nome_Resp_projeto' => $request->Nome_Resp_projeto,
            'CPF_Resp_projeto' => $request->CPF_Resp_projeto,
            'RG_Resp_projeto' => $request->RG_Resp_projeto,
            'Cidade_Resp_projeto' => $request->Cidade_Resp_projeto,
            'Estado_Resp_projeto' => $request->Estado_Resp_projeto,
            'Cep_Resp_projeto' => $request->Cep_Resp_projeto,
            'Endereco_Resp_projeto' => $request->Endereco_Resp_projeto,
            'Telefone_Resp_projeto' => $request->Telefone_Resp_projeto,
            'Email_Resp_projeto' => $request->Email_Resp_projeto,

        ];
        if ($request->hasFile('Anexo1_Resp_projeto')) {
            $resp_projeto['Anexo1_Resp_projeto'] = $request->file('Anexo1_Resp_projeto')->store('pdfs/resp_projeto', 'public');
        }
        if ($request->hasFile('Anexo2_Resp_projeto')) {
            $resp_projeto['Anexo2_Resp_projeto'] = $request->file('Anexo2_Resp_projeto')->store('pdfs/resp_projeto', 'public');
        }
        Resp_projeto::updateOrCreate(
            ['N_processo_id' => $nProcesso->id],
            $resp_projeto
        );


        // // fim do 4

        // // inicio do 5
        $doc_anexo2 = [
            'n_processo_id' => $nProcesso->id,

        ];

        if ($request->hasFile('Doc_Anexo2_Anexo1')) {
            $doc_anexo2['Doc_Anexo2_Anexo1'] = $request->file('Doc_Anexo2_Anexo1')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo2')) {
            $doc_anexo2['Doc_Anexo2_Anexo2'] = $request->file('Doc_Anexo2_Anexo2')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo3')) {
            $doc_anexo2['Doc_Anexo2_Anexo3'] = $request->file('Doc_Anexo2_Anexo3')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo4')) {
            $doc_anexo2['Doc_Anexo2_Anexo4'] = $request->file('Doc_Anexo2_Anexo4')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo5')) {
            $doc_anexo2['Doc_Anexo2_Anexo5'] = $request->file('Doc_Anexo2_Anexo5')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo6')) {
            $doc_anexo2['Doc_Anexo2_Anexo6'] = $request->file('Doc_Anexo2_Anexo6')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo7')) {
            $doc_anexo2['Doc_Anexo2_Anexo7'] = $request->file('Doc_Anexo2_Anexo7')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo8')) {
            $doc_anexo2['Doc_Anexo2_Anexo8'] = $request->file('Doc_Anexo2_Anexo8')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo9')) {
            $doc_anexo2['Doc_Anexo2_Anexo9'] = $request->file('Doc_Anexo2_Anexo9')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo10')) {
            $doc_anexo2['Doc_Anexo2_Anexo10'] = $request->file('Doc_Anexo2_Anexo10')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo11')) {
            $doc_anexo2['Doc_Anexo2_Anexo11'] = $request->file('Doc_Anexo2_Anexo11')->store('pdfs/doc_anexo2', 'public');
        }
        if ($request->hasFile('Doc_Anexo2_Anexo12')) {
            $doc_anexo2['Doc_Anexo2_Anexo12'] = $request->file('Doc_Anexo2_Anexo12')->store('pdfs/doc_anexo2', 'public');
        }
        Doc_anexo2::updateOrCreate(
            ['N_processo_id' => $nProcesso->id],
            $doc_anexo2
        );

        $projeto_conteudo = [
            'n_processo_id' => $nProcesso->id,
            'Titulo_Projeto_Conteudo' => $request->Titulo_Projeto_Conteudo,
            'Objeto_Projeto_Conteudo' => $request->Objeto_Projeto_Conteudo,
            'Obj_Geral_Projeto_Conteudo' => $request->Obj_Geral_Projeto_Conteudo,
            'Obj_especifico_Projeto_Conteudo' => $request->Obj_especifico_Projeto_Conteudo,
            'Justificativa_Projeto_Conteudo' => $request->Justificativa_Projeto_Conteudo,
            'Contextualizacao_Projeto_Conteudo' => $request->Contextualizacao_Projeto_Conteudo,
            'Diagnostico_Projeto_Conteudo' => $request->Diagnostico_Projeto_Conteudo,
            'Importancia_Projeto_Conteudo' => $request->Importancia_Projeto_Conteudo,
            'Caracterizacao_Projeto_Conteudo' => $request->Caracterizacao_Projeto_Conteudo,
            'Publico_Alvo_Interno_Projeto_Conteudo' => $request->Publico_Alvo_Interno_Projeto_Conteudo,
            'Publico_Alvo_Externo_Projeto_Conteudo' => $request->Publico_Alvo_Externo_Projeto_Conteudo,
            'Problemas_Projeto_Conteudo' => $request->Problemas_Projeto_Conteudo,
            'Resultados_Projeto_Conteudo' => $request->Resultados_Projeto_Conteudo,
            'Inicio_Projeto_Conteudo' => $request->Inicio_Projeto_Conteudo,
            'Fim_Projeto_Conteudo' => $request->Fim_Projeto_Conteudo,
            'N_Emenda_Projeto_Conteudo' => $request->N_Emenda_Projeto_Conteudo,
            'Nome_Autor_Emenda_Projeto_Conteudo' => $request->Nome_Autor_Emenda_Projeto_Conteudo,
            'Valor_Repasse_Projeto_Conteudo' => $request->Valor_Repasse_Projeto_Conteudo,
            'Valor_Contrapartida_Projeto_Conteudo' => $request->Valor_Contrapartida_Projeto_Conteudo,

        ];
        Projeto_conteudo::updateOrCreate(
            ['N_processo_id' => $nProcesso->id],
            $projeto_conteudo
        );



        return back();
    }

    public function anexo_sigcon(Request $request, $id)
    {
        $anexo_sigcon = [
            'n_processo_id' => $id
        ];

        if ($request->hasFile('anexo1')) {
            $anexo_sigcon['anexo1'] = $request->file('anexo1')->store('pdfs/anexo_sigcon', 'public');
        }
        if ($request->hasFile('anexo2')) {
            $anexo_sigcon['anexo2'] = $request->file('anexo2')->store('pdfs/anexo_sigcon', 'public');
        }
        if ($request->hasFile('anexo3')) {
            $anexo_sigcon['anexo3'] = $request->file('anexo3')->store('pdfs/anexo_sigcon', 'public');
        }
        if ($request->hasFile('anexo4')) {
            $anexo_sigcon['anexo4'] = $request->file('anexo4')->store('pdfs/anexo_sigcon', 'public');
        }
        if ($request->hasFile('anexo5')) {
            $anexo_sigcon['anexo5'] = $request->file('anexo5')->store('pdfs/anexo_sigcon', 'public');
        }
        Anexo_sigcon::updateOrCreate(
            ['N_processo_id' => $id],
            $anexo_sigcon
        );

        return back();
    }
    public function oficio(Request $request, $id)
    {
        $oficio = Doc_anexo1::findOrFail($id);

        $Comp_Oficio = $request->input('Comp_Oficio_sit');
        $oficio->Comp_Oficio_sit = $Comp_Oficio;
        $oficio->save();

        $Comp_Assinado = $request->input('Comp_Assinado_sit');
        $oficio->Comp_Assinado_sit = $Comp_Assinado;
        $oficio->save();


        return back();
    }

    public function resp_instituicao(Request $request, $id)
    {
        $resp_instituicao = Resp_instituicao::findOrFail($id);

        // Obter o valor selecionado pelo usuário (0 ou 1)
        $valorSelecionado = $request->input('Nome_Resp_Instituicao_sit');
        // Atualizar o valor no banco de dados
        $resp_instituicao->Nome_Resp_Instituicao_sit = $valorSelecionado;
        $resp_instituicao->save();

        $valorSelecionado_Telefone = $request->input('Telefone_Resp_Instituicao_sit');
        // Atualizar o valor no banco de dados
        $resp_instituicao->Telefone_Resp_Instituicao_sit = $valorSelecionado_Telefone;
        $resp_instituicao->save();

        $valorSelecionado_Email = $request->input('Email_Resp_Instituicao_sit');
        // Atualizar o valor no banco de dados
        $resp_instituicao->Email_Resp_Instituicao_sit = $valorSelecionado_Email;
        $resp_instituicao->save();

        $valorSelecionado_Cargo = $request->input('Cargo_Resp_Instituicao_sit');
        // Atualizar o valor no banco de dados
        $resp_instituicao->Cargo_Resp_Instituicao_sit = $valorSelecionado_Cargo;
        $resp_instituicao->save();

        $valorSelecionado_Endereco = $request->input('End_Resp_Instituicao_sit');
        // Atualizar o valor no banco de dados
        $resp_instituicao->End_Resp_Instituicao_sit = $valorSelecionado_Endereco;
        $resp_instituicao->save();

        // Falta Cidade, Estado e CEP

        $valorSelecionado_Anexo1 = $request->input('Anexo1_Resp_Instituicao_sit');
        // Atualizar o valor no banco de dados
        $resp_instituicao->Anexo1_Resp_Instituicao_sit = $valorSelecionado_Anexo1;
        $resp_instituicao->save();

        $valorSelecionado_Anexo2 = $request->input('Anexo2_Resp_Instituicao_sit');
        // Atualizar o valor no banco de dados
        $resp_instituicao->Anexo2_Resp_Instituicao_sit = $valorSelecionado_Anexo2;
        $resp_instituicao->save();

        return back();
    }


    public function instituicao(Request $request, $id)
    {
        // // Tabela Instituição
        $instituicao = Instituicao::findOrFail($id);

        $valorSelecionado_Nome_Instituicao = $request->input('Nome_Instituicao_sit');
        $instituicao->Nome_Instituicao_sit = $valorSelecionado_Nome_Instituicao;
        $instituicao->save();

        $CNPJ_Instituicao = $request->input('CNPJ_Instituicao_sit');
        $instituicao->CNPJ_Instituicao_sit = $CNPJ_Instituicao;
        $instituicao->save();

        $Telefone_Instituicao = $request->input('Telefone_Instituicao_sit');
        $instituicao->Telefone_Instituicao_sit = $Telefone_Instituicao;
        $instituicao->save();

        $Endereco_Instituicao = $request->input('Endereco_Instituicao_sit');
        $instituicao->Endereco_Instituicao_sit = $Endereco_Instituicao;
        $instituicao->save();

        // Falta cidade, Estado e CEP

        $Anexo1_Instituicao = $request->input('Anexo1_Instituicao_sit');
        $instituicao->Anexo1_Instituicao_sit = $Anexo1_Instituicao;
        $instituicao->save();

        $Anexo2_Instituicao = $request->input('Anexo2_Instituicao_sit');
        $instituicao->Anexo2_Instituicao_sit = $Anexo2_Instituicao;
        $instituicao->save();

        return back();
    }

    public function resp_projeto(Request $request, $id)
    {
        $resp_projeto = Resp_projeto::findOrFail($id);

        $Nome_Resp_projeto = $request->input('Nome_Resp_projeto_sit');
        $resp_projeto->Nome_Resp_projeto_sit = $Nome_Resp_projeto;
        $resp_projeto->save();

        $Telefone_Resp_projeto = $request->input('Telefone_Resp_projeto_sit');
        $resp_projeto->Telefone_Resp_projeto_sit = $Telefone_Resp_projeto;
        $resp_projeto->save();

        $Endereco_Resp_projeto = $request->input('Endereco_Resp_projeto_sit');
        $resp_projeto->Endereco_Resp_projeto_sit = $Endereco_Resp_projeto;
        $resp_projeto->save();

        // Falta RG, CPF Cidade, Estado e CEP

        return back();
    }

    public function documentos(Request $request, $id)
    {
        $documentos = Doc_anexo2::findOrFail($id);

        $Doc_Anexo2_Anexo1 = $request->input('Doc_Anexo2_Anexo1_sit');
        $documentos->Doc_Anexo2_Anexo1_sit = $Doc_Anexo2_Anexo1;
        $documentos->save();

        $Doc_Anexo2_Anexo2 = $request->input('Doc_Anexo2_Anexo2_sit');
        $documentos->Doc_Anexo2_Anexo2_sit = $Doc_Anexo2_Anexo2;
        $documentos->save();

        $Doc_Anexo2_Anexo3 = $request->input('Doc_Anexo2_Anexo3_sit');
        $documentos->Doc_Anexo2_Anexo3_sit = $Doc_Anexo2_Anexo3;
        $documentos->save();

        $Doc_Anexo2_Anexo4 = $request->input('Doc_Anexo2_Anexo4_sit');
        $documentos->Doc_Anexo2_Anexo4_sit = $Doc_Anexo2_Anexo4;
        $documentos->save();

        $Doc_Anexo2_Anexo5 = $request->input('Doc_Anexo2_Anexo5_sit');
        $documentos->Doc_Anexo2_Anexo5_sit = $Doc_Anexo2_Anexo5;
        $documentos->save();

        $Doc_Anexo2_Anexo6 = $request->input('Doc_Anexo2_Anexo6_sit');
        $documentos->Doc_Anexo2_Anexo6_sit = $Doc_Anexo2_Anexo6;
        $documentos->save();

        $Doc_Anexo2_Anexo7 = $request->input('Doc_Anexo2_Anexo7_sit');
        $documentos->Doc_Anexo2_Anexo7_sit = $Doc_Anexo2_Anexo7;
        $documentos->save();

        $Doc_Anexo2_Anexo8 = $request->input('Doc_Anexo2_Anexo8_sit');
        $documentos->Doc_Anexo2_Anexo8_sit = $Doc_Anexo2_Anexo8;
        $documentos->save();

        $Doc_Anexo2_Anexo9 = $request->input('Doc_Anexo2_Anexo9_sit');
        $documentos->Doc_Anexo2_Anexo9_sit = $Doc_Anexo2_Anexo9;
        $documentos->save();

        $Doc_Anexo2_Anexo10 = $request->input('Doc_Anexo2_Anexo10_sit');
        $documentos->Doc_Anexo2_Anexo10_sit = $Doc_Anexo2_Anexo10;
        $documentos->save();

        $Doc_Anexo2_Anexo11 = $request->input('Doc_Anexo2_Anexo11_sit');
        $documentos->Doc_Anexo2_Anexo11_sit = $Doc_Anexo2_Anexo11;
        $documentos->save();

        $Doc_Anexo2_Anexo12 = $request->input('Doc_Anexo2_Anexo12_sit');
        $documentos->Doc_Anexo2_Anexo12_sit = $Doc_Anexo2_Anexo12;
        $documentos->save();

        return back();
    }
    public function doc_prefeitura(Request $request, $id)
    {
        $doc_prefeitura = Doc_prefeitura::findOrFail($id);

        $Oficios_proposta = $request->input('Oficios_proposta_sit');
        $doc_prefeitura->Oficios_proposta_sit = $Oficios_proposta;
        $doc_prefeitura->save();

        $Oficio_emenda = $request->input('Oficio_emenda_sit');
        $doc_prefeitura->Oficio_emenda_sit = $Oficio_emenda;
        $doc_prefeitura->save();

        $Delcaracao_contrapartida = $request->input('Delcaracao_contrapartida_sit');
        $doc_prefeitura->Delcaracao_contrapartida_sit = $Delcaracao_contrapartida;
        $doc_prefeitura->save();

        $Comprovante_abertura_conta = $request->input('Comprovante_abertura_conta_sit');
        $doc_prefeitura->Comprovante_abertura_conta_sit = $Comprovante_abertura_conta;
        $doc_prefeitura->save();

        $Comprovante_qualif_tecnica = $request->input('Comprovante_qualif_tecnica_sit');
        $doc_prefeitura->Comprovante_qualif_tecnica_sit = $Comprovante_qualif_tecnica;
        $doc_prefeitura->save();

        $Diploma_nomeacao = $request->input('Diploma_nomeacao_sit');
        $doc_prefeitura->Diploma_nomeacao_sit = $Diploma_nomeacao;
        $doc_prefeitura->save();

        $Ata_eleicao = $request->input('Ata_eleicao_sit');
        $doc_prefeitura->Ata_eleicao_sit = $Ata_eleicao;
        $doc_prefeitura->save();

        $Doc_posse = $request->input('Doc_posse_sit');
        $doc_prefeitura->Doc_posse_sit = $Doc_posse;
        $doc_prefeitura->save();


        return back();
    }

    public function projeto(Request $request, $id)
    {
        $projeto = Projeto_conteudo::findOrFail($id);

        // dd($request);
        $Titulo_Projeto_Conteudo = $request->input('Titulo_Projeto_Conteudo_sit');
        $projeto->Titulo_Projeto_Conteudo_sit = $Titulo_Projeto_Conteudo;
        $projeto->save();

        $Objeto_Projeto_Conteudo = $request->input('Objeto_Projeto_Conteudo_sit');
        $projeto->Objeto_Projeto_Conteudo_sit = $Objeto_Projeto_Conteudo;
        $projeto->save();

        $Obj_Geral_Projeto_Conteudo = $request->input('Obj_Geral_Projeto_Conteudo_sit');
        $projeto->Obj_Geral_Projeto_Conteudo_sit = $Obj_Geral_Projeto_Conteudo;
        $projeto->save();

        $Obj_especifico_Projeto_Conteudo = $request->input('Obj_especifico_Projeto_Conteudo_sit');
        $projeto->Obj_especifico_Projeto_Conteudo_sit = $Obj_especifico_Projeto_Conteudo;
        $projeto->save();

        $Justificativa_Projeto_Conteudo = $request->input('Justificativa_Projeto_Conteudo_sit');
        $projeto->Justificativa_Projeto_Conteudo_sit = $Justificativa_Projeto_Conteudo;
        $projeto->save();

        $Contextualizacao_Projeto_Conteudo = $request->input('Contextualizacao_Projeto_Conteudo_sit');
        $projeto->Contextualizacao_Projeto_Conteudo_sit = $Contextualizacao_Projeto_Conteudo;
        $projeto->save();

        $Diagnostico_Projeto_Conteudo = $request->input('Diagnostico_Projeto_Conteudo_sit');
        $projeto->Diagnostico_Projeto_Conteudo_sit = $Diagnostico_Projeto_Conteudo;
        $projeto->save();

        $Importancia_Projeto_Conteudo = $request->input('Importancia_Projeto_Conteudo_sit');
        $projeto->Importancia_Projeto_Conteudo_sit = $Importancia_Projeto_Conteudo;
        $projeto->save();

        $Caracterizacao_Projeto_Conteudo = $request->input('Caracterizacao_Projeto_Conteudo_sit');
        $projeto->Caracterizacao_Projeto_Conteudo_sit = $Caracterizacao_Projeto_Conteudo;
        $projeto->save();

        $Publico_Alvo_Interno_Projeto_Conteudo = $request->input('Publico_Alvo_Interno_Projeto_Conteudo_sit');
        $projeto->Publico_Alvo_Interno_Projeto_Conteudo_sit = $Publico_Alvo_Interno_Projeto_Conteudo;
        $projeto->save();

        $Publico_Alvo_Externo_Projeto_Conteudo = $request->input('Publico_Alvo_Externo_Projeto_Conteudo_sit');
        $projeto->Publico_Alvo_Externo_Projeto_Conteudo_sit = $Publico_Alvo_Externo_Projeto_Conteudo;
        $projeto->save();

        $Problemas_Projeto_Conteudo = $request->input('Problemas_Projeto_Conteudo_sit');
        $projeto->Problemas_Projeto_Conteudo_sit = $Problemas_Projeto_Conteudo;
        $projeto->save();

        $Resultados_Projeto_Conteudo = $request->input('Resultados_Projeto_Conteudo_sit');
        $projeto->Resultados_Projeto_Conteudo_sit = $Resultados_Projeto_Conteudo;
        $projeto->save();

        $Inicio_Projeto_Conteudo = $request->input('Inicio_Projeto_Conteudo_sit');
        $projeto->Inicio_Projeto_Conteudo_sit = $Inicio_Projeto_Conteudo;
        $projeto->save();

        $Fim_Projeto_Conteudo = $request->input('Fim_Projeto_Conteudo_sit');
        $projeto->Fim_Projeto_Conteudo_sit = $Fim_Projeto_Conteudo;
        $projeto->save();

        $N_Emenda_Projeto_Conteudo = $request->input('N_Emenda_Projeto_Conteudo_sit');
        $projeto->N_Emenda_Projeto_Conteudo_sit = $N_Emenda_Projeto_Conteudo;
        $projeto->save();

        $Nome_Autor_Emenda_Projeto_Conteudo = $request->input('Nome_Autor_Emenda_Projeto_Conteudo_sit');
        $projeto->Nome_Autor_Emenda_Projeto_Conteudo_sit = $Nome_Autor_Emenda_Projeto_Conteudo;
        $projeto->save();

        $Valor_Repasse_Projeto_Conteudo = $request->input('Valor_Repasse_Projeto_Conteudo_sit');
        $projeto->Valor_Repasse_Projeto_Conteudo_sit = $Valor_Repasse_Projeto_Conteudo;
        $projeto->save();

        $Valor_Contrapartida_Projeto_Conteudo = $request->input('Valor_Contrapartida_Projeto_Conteudo_sit');
        $projeto->Valor_Contrapartida_Projeto_Conteudo_sit = $Valor_Contrapartida_Projeto_Conteudo;
        $projeto->save();


        return back();
    }


    public function validar_cronogramaexecucao_metas(Request $request, $id)
    {

        $correcao_metas_sit = $request->input('Correcao_metas_sit');
        //   dd($correcao_metas_sit);
        foreach ($correcao_metas_sit as $correcao_metas_sitId => $valor) {
            // Suponha que $planodetalhadosId seja o ID da linha e $valor seja o valor do botão de rádio para essa linha

            // Encontre o plano detalhado pelo ID
            $correcao_metas = Metas::findOrFail($correcao_metas_sitId);

            // Salve o valor no banco de dados
            $correcao_metas->Correcao_metas_sit = $valor;
            $correcao_metas->save();
        }

        return back();
    }

    public function validar_cronogramaexecucao_etapas(Request $request, $id)
    {
        $correcao_etapas_sit = $request->input('Correcao_etapas_sit');
        //   dd($correcao_metas_sit);
        foreach ($correcao_etapas_sit as $correcao_etapas_sitId => $valor_etapa) {
            // Suponha que $planodetalhadosId seja o ID da linha e $valor seja o valor do botão de rádio para essa linha

            // Encontre o plano detalhado pelo ID
            $correcao_etapas = Etapas::findOrFail($correcao_etapas_sitId);

            // Salve o valor no banco de dados
            $correcao_etapas->Correcao_etapas_sit = $valor_etapa;
            $correcao_etapas->save();
        }

        return back();
    }




    public function validar_cronograma_desembolso(Request $request, $id)
    {

        $cronograma_desembolso_sit = $request->input('cronograma_desembolso_sit');

        foreach ($cronograma_desembolso_sit as $cronograma_desembolsoId => $valor) {
            // Suponha que $planodetalhadosId seja o ID da linha e $valor seja o valor do botão de rádio para essa linha

            // Encontre o plano detalhado pelo ID
            $cronograma_desembolso = Cronograma_desembolso::findOrFail($cronograma_desembolsoId);

            // Salve o valor no banco de dados
            $cronograma_desembolso->cronograma_desembolso_sit = $valor;
            $cronograma_desembolso->save();
        }

        return back();
    }

    public function validar_planoconsolidado(Request $request, $id)
    {

        $plano_consolidado_sit = $request->input('plano_consolidado_sit');

        foreach ($plano_consolidado_sit as $planoconsolidadoId => $valor) {
            // Suponha que $planodetalhadosId seja o ID da linha e $valor seja o valor do botão de rádio para essa linha

            // Encontre o plano detalhado pelo ID
            $planoconsolidado = Plano_consolidado::findOrFail($planoconsolidadoId);

            // Salve o valor no banco de dados
            $planoconsolidado->plano_consolidado_sit = $valor;
            $planoconsolidado->save();
        }

        return back();
    }

    public function validar_planodetalhado(Request $request, $id)
    {
        $plano_detalhado_sit = $request->input('plano_detalhado_sit');

        foreach ($plano_detalhado_sit as $planodetalhadosId => $valor) {
            // Suponha que $planodetalhadosId seja o ID da linha e $valor seja o valor do botão de rádio para essa linha

            // Encontre o plano detalhado pelo ID
            $planodetalhado = Plano_detalhado::findOrFail($planodetalhadosId);

            // Salve o valor no banco de dados
            $planodetalhado->plano_detalhado_sit = $valor;
            $planodetalhado->save();
        }

        return back();
    }

    public function validar_obras_equipamento(Request $request, $id)
    {
        $obras_equipamento_sit = $request->input('Correcao_obras_equipamentos_sit');

        foreach ($obras_equipamento_sit as $obras_equipamentoId => $valor) {
            // Suponha que $obras_equipamentoId seja o ID da linha e $valor seja o valor do botão de rádio para essa linha

            // Encontre o plano detalhado pelo ID
            $obras_equipamento = Obras_equipamento::findOrFail($obras_equipamentoId);

            // Salve o valor no banco de dados
            $obras_equipamento->Correcao_obras_equipamentos_sit = $valor;
            $obras_equipamento->save();
        }

        return back();
    }

    public function validar_pesquisa_mercadologica(Request $request, $id)
    {

        $pesquisa_mercadologica_sit = $request->input('Correcao_pesquisa_sit');

        foreach ($pesquisa_mercadologica_sit as $pesquisa_mercadologicaId => $valor) {
            // Suponha que $pesquisa_mercadologicaId seja o ID da linha e $valor seja o valor do botão de rádio para essa linha

            // Encontre o plano detalhado pelo ID
            $pesquisa_mercadologica = Pesquisa_mercadologica_pivot::findOrFail($pesquisa_mercadologicaId);

            // Salve o valor no banco de dados
            $pesquisa_mercadologica->Correcao_pesquisa_sit = $valor;
            $pesquisa_mercadologica->save();
        }

        return back();
    }



    public function corrigir($id)
    {
        $tramitar = N_processo::find($id);
        $acao = 'CORRIGIR';
        $tramitar->Status = $acao;
        $tramitar->save();
        //   dd($recibo);

        return back();
    }


    public function aguardando_andamento($id)
    {

        $aguardando_andamento = N_processo::find($id);
        $acao = 'AGUARDANDO';
        $aguardando_andamento->Status = $acao;
        $aguardando_andamento->save();
        //   dd($recibo);

        return back();
    }
    public function finalizado($id)
    {

        $finalizado = N_processo::find($id);
        $acao = 'FINALIZADO';
        $finalizado->Status = $acao;
        $finalizado->save();
        //   dd($recibo);

        return back();
    }
    public function tramitado($id)
    {

        $tramitado = N_processo::find($id);
        $acao = 'TRAMITADO';
        $tramitado->Status = $acao;
        $tramitado->save();
        //   dd($recibo);
        //   return view('trdigital.index');
        return redirect('/trdigital/proponente')->with('success', 'Tramitado com sucesso!');

        // return redirect()->view('trdigital/proponente');
    }


    public function imprimir($id)
    {
        $n_processo = N_processo::with([
            'Doc_anexo1',
            'Doc_anexo2',
            'instituicao',
            'Resp_instituicao',
            'Projeto_conteudo',
            'Resp_projeto',
            'Orgaos',
            'Metas',
            'Plano_consolidado',
            'Plano_detalhado',
            'Cronograma_desembolso',
            'Obras_equipamento',
            'Pesquisa_mercadologica',
        ])->find($id);

        $biblioteca = Biblioteca::get();
        $metas = Metas::where('n_processo_id', $id)->get();
        $etapas = Metas::with('etapas')->get();
        $planoconsolidado = Plano_consolidado::with(['Metas'])->where('n_processo_id', $id,)->get();
        $planodetalhado = Plano_detalhado::with('Plano_consolidado')->where('n_processo_id', $id,)->get();
        $cronograma_desembolso = Cronograma_desembolso::where('n_processo_id', $id,)->get();
        $obras_equipamento = Obras_equipamento::where('n_processo_id', $id,)->get();

        // $pesquisa_mercadologica = Pesquisa_mercadologica::with('Pesquisa_mercadologica_pivot')->get();
        $pesquisa_mercadologica = Pesquisa_mercadologica::with('pesquisa_mercadologica_pivots')->where('n_processo_id', $id)->get();

        $view = view('trdigital.imprimir')->with(compact(
            'n_processo',
            'biblioteca',
            'metas',
            'etapas',
            'planoconsolidado',
            'planodetalhado',
            'cronograma_desembolso',
            'obras_equipamento',
            'pesquisa_mercadologica'

        ));

        $pdf = PDF::loadView(
            'trdigital.imprimir',
            compact(
                'n_processo',
                'biblioteca',
                'metas',
                'etapas',
                'planoconsolidado',
                'planodetalhado',
                'cronograma_desembolso',
                'obras_equipamento',
                'pesquisa_mercadologica'

            )
        );

        return view(
            'trdigital.imprimir',
            compact(
                'n_processo',
                'biblioteca',
                'metas',
                'etapas',
                'planoconsolidado',
                'planodetalhado',
                'cronograma_desembolso',
                'obras_equipamento',
                'pesquisa_mercadologica'

            )
        );

    //  //   $pdf = PDF::loadView('trdigital.imprimir');
    //     $pdf->setPaper('A4', 'portrait');
    //   //  dd($pdf);
    //     return $pdf->stream();
    //    return $pdf->download();

     //   return $view;
    }


    public function destroy($id)
    {
        $n_processo = N_processo::findOrFail($id);
        $n_processo->delete();
        return redirect()->route('trdigital.index');
    }
}
