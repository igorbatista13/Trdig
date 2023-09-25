@extends('base.novabase')
@section('content')

    <?php
    $processoCount = session()->get('processoCount');
    $processoCount_corrigir = session()->get('processoCount_corrigir');
    $processoCount_finalizado = session()->get('processoCount_finalizado');
    $processoCount_aguardando = session()->get('processoCount_aguardando');
    $processoCount_tramitada = session()->get('processoCount_tramitada');
    $processoCount_nao_finalizada = session()->get('processoCount_nao_finalizada');
    ?>

    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Adicione esses links no cabeçalho do seu HTML -->
    <!-- Adicione esses links no cabeçalho do seu HTML -->
    @include('alertas.index')

    

    <main id="main" class="main">

        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 ml-auto mr-auto">
                        <div class="card card-upgrade">
                            <div class="card-header">


                                <!--//row-->

                                <section id="multiple-column-form">
                                    <div class="row match-height">
                                        <div class="col-12">

                                            <br>

                                            <div class="text-center mb-5">
                                                <img src="{{ asset('/images/createform.png') }}" height="88"
                                                    class='mb-4'>
                                                <h3><b> TR DIGITAL </b> - Editar TR</h3>
                                                <p> Preencha as informações da sua TR DIGITAL </p>

                                                <div class="row">

                                                    <div class="col-lg-12">
                                                        {{-- {!! Form::model($n_processo, [
                                                            'method' => 'PATCH',
                                                            'route' => ['trdigital.update', $n_processo->id],
                                                            'enctype' => 'multipart/form-data',
                                                        ]) !!} --}}

                                                        @if (auth()->check())
                                                            <input type="hidden" name="user_id"
                                                                value="{{ auth()->user()->id }}">
                                                        @endif

                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="list-group" id="list-tab" role="tablist">
                                                                    <a class="list-group-item list-group-item-action active"
                                                                        id="list-home-list" data-bs-toggle="list"
                                                                        href="#list-home" role="tab"
                                                                        aria-controls="list-home"><big><b> Órgão Concedente
                                                                            </b></big>
                                                                    </a>

                                                                </div>
                                                            </div>



                                                        </div>


                                                        <!-- Seu código HTML do select -->
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <select name="Orgao_Concedente" id="Orgao_Concedente"
                                                                    class="form-control custom-select" required>
                                                                    Selecione o Orgão Concedente
                                                                    </option>
                                                                    <option value="{{ $n_processo->Orgao_Concedente }}">
                                                                        <img src="" width="20px">
                                                                        {{ $n_processo->Orgaos->Sigla }} -
                                                                        {{ $n_processo->Orgaos->Nome }}
                                                                    </option>
                                                                </select>

                                                            </div>
                                                            <div class="col-lg-6">

                                                            </div>
                                                            <div class="col-lg-2">

                                                                <!-- Basic Modal -->
                                                                <button type="button" class="btn btn-primary"
                                                                    data-bs-toggle="modal" data-bs-target="#basicModal">
                                                                    Ajuda <i class="bx bx-help-circle"></i>
                                                                </button>
                                                                <div class="modal fade" id="basicModal" tabindex="-1">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title text-primary">Ajuda,
                                                                                    Links, Documentos</h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="col-xl-12">

                                                                                    @foreach ($biblioteca as $bibliotecas)
                                                                                        <!-- Default Accordion -->
                                                                                        <div class="accordion"
                                                                                            id="accordionExample">
                                                                                            <div class="accordion-item">
                                                                                                <h2 class="accordion-header"
                                                                                                    id="headingOne">

                                                                                                    <button
                                                                                                        class="accordion-button"
                                                                                                        type="button"
                                                                                                        data-bs-toggle="collapse"
                                                                                                        data-bs-target="#collapseOne"
                                                                                                        aria-expanded="true"
                                                                                                        aria-controls="collapseOne">
                                                                                                        @if ($bibliotecas->Tipo == 'PDF')
                                                                                                            <img src="{{ asset('images/pdf.png') }}"
                                                                                                                width="40px"
                                                                                                                class="img-fluid rounded-start">
                                                                                                                
                                                                                                            @elseif ($bibliotecas->Tipo == 'Excel')
                                                                                                            <img src="{{ asset('images/excel.png') }}"
                                                                                                                width="40px"
                                                                                                                class="img-fluid rounded-start">
                                                                                                            @elseif ($bibliotecas->Tipo == 'Imagem')
                                                                                                            <img src="{{ asset('images/imagem_logo.png') }}"
                                                                                                                width="40px"
                                                                                                                class="img-fluid rounded-start">
                                                                                                            @elseif ($bibliotecas->Tipo == 'Video')
                                                                                                            <img src="{{ asset('images/video_logo.png') }}"
                                                                                                                width="40px"
                                                                                                                class="img-fluid rounded-start">
                                                                                                            @elseif ($bibliotecas->Tipo == 'Word')
                                                                                                            <img src="{{ asset('images/word.png') }}"
                                                                                                                width="40px"
                                                                                                                class="img-fluid rounded-start">
                                                                                                            @elseif ($bibliotecas->Tipo == 'Outros')
                                                                                                            <img src="{{ asset('images/biblioteca-ico.png') }}"
                                                                                                                width="40px"
                                                                                                                class="img-fluid rounded-start">
                                                                                                            @elseif ($bibliotecas->Tipo == 'Link')
                                                                                                            <img src="{{ asset('images/link.png') }}"
                                                                                                                width="40px"
                                                                                                                class="img-fluid rounded-start">
                                                                                                        @else
                                                                                                        @endif
                                                                                                        {{ $bibliotecas->Nome }}
                                                                                                    </button>
                                                                                                </h2>
                                                                                                <div id="collapseOne"
                                                                                                    class="accordion-collapse collapse show"
                                                                                                    aria-labelledby="headingOne"
                                                                                                    data-bs-parent="#accordionExample">
                                                                                                    <div
                                                                                                        class="accordion-body">
                                                                                                        @if ($bibliotecas->Descricao)
                                                                                                            Sobre: <strong>
                                                                                                                {{ $bibliotecas->Descricao }}
                                                                                                            </strong><br>
                                                                                                        @else
                                                                                                        @endif
                                                                                                        @if ($bibliotecas->Link)
                                                                                                            Link: <strong>
                                                                                                                <a href="{{ $bibliotecas->Link }}"
                                                                                                                    target="_blank">{{ $bibliotecas->Link }}</a>
                                                                                                            </strong> <br>
                                                                                                        @else
                                                                                                        @endif
                                                                                                        @if ($bibliotecas->Anexo)
                                                                                                            <a class="btn btn-primary"
                                                                                                                href="{{ asset('storage/' . $bibliotecas->Anexo) }}"
                                                                                                                target="_blank">
                                                                                                                <i
                                                                                                                    class="bi bi-file-earmark-pdf-fill"></i>
                                                                                                                Ver arquivo
                                                                                                            </a>
                                                                                                        @else
                                                                                                        @endif

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>



                                                                                        </div>
                                                                                        <!-- End Default Accordion Example -->
                                                                                    @endforeach

                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">

                                                                                <button type="button"
                                                                                    class="btn btn-primary"
                                                                                    data-bs-dismiss="modal">Fechar</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- End Basic Modal-->

                                                            </div>


                                                        </div>
                                                    </div>



                                                </div>





                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <div class="list-group" id="list-tab" role="tablist">
                                                <a class="list-group-item list-group-item-action active"
                                                    id="list-home-list" data-bs-toggle="list" href="#list-home"
                                                    role="tab" aria-controls="list-home"><big><b> 1. </b></big>
                                                    Ofícios
                                                    @if ($n_processo->Doc_anexo1 && $n_processo->Doc_anexo1->Comp_Oficio && $n_processo->Doc_anexo1->Comp_Assinado)
                                                        <span
                                                            class="badge bg-success custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-light"> </i>
                                                        </span>
                                                    @else
                                                        <span
                                                            class="badge bg-warning custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-dark"></i>
                                                        </span>
                                                    @endif
                                                </a>

                                                <a class="list-group-item list-group-item-action" id="list-profile-list"
                                                    data-bs-toggle="list" href="#list-profile" role="tab"
                                                    aria-controls="list-profile"><big><b> 2. </b> </big>
                                                    Identificação do Responsável
                                                    pela Instituição </b>
                                                    @if (
                                                        $n_processo->Resp_instituicao &&
                                                            $n_processo->Resp_instituicao->Nome_Resp_Instituicao &&
                                                            $n_processo->Resp_instituicao->Telefone_Resp_Instituicao &&
                                                            $n_processo->Resp_instituicao->Email_Resp_Instituicao &&
                                                            $n_processo->Resp_instituicao->Cargo_Resp_Instituicao &&
                                                            $n_processo->Resp_instituicao->Cidade_Resp_Instituicao &&
                                                            $n_processo->Resp_instituicao->Estado_Resp_Instituicao &&
                                                            $n_processo->Resp_instituicao->Cep_Resp_Instituicao &&
                                                            $n_processo->Resp_instituicao->End_Resp_Instituicao &&
                                                            $n_processo->Resp_instituicao->Anexo1_Resp_Instituicao &&
                                                            $n_processo->Resp_instituicao->Anexo2_Resp_Instituicao)
                                                        <span
                                                            class="badge bg-success custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-light"> </i>
                                                        </span>
                                                    @else
                                                        <span
                                                            class="badge bg-warning custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-dark"></i>
                                                        </span>
                                                    @endif
                                                </a>
                                                <a class="list-group-item list-group-item-action" id="list-messages-list"
                                                    data-bs-toggle="list" href="#list-messages" role="tab"
                                                    aria-controls="list-messages"><big><b> 3.</b> </big>
                                                    Identificação da
                                                    Instituição
                                                    Proponente </b>
                                                    @if (
                                                        $n_processo->instituicao &&
                                                            $n_processo->instituicao->Nome_Instituicao &&
                                                            $n_processo->instituicao->CNPJ_Instituicao &&
                                                            $n_processo->instituicao->Telefone_Instituicao &&
                                                            $n_processo->instituicao->Endereco_Instituicao &&
                                                            $n_processo->instituicao->Cidade_Instituicao &&
                                                            $n_processo->instituicao->Estado_Instituicao &&
                                                            $n_processo->instituicao->Cep_Instituicao &&
                                                            $n_processo->instituicao->Anexo1_Instituicao &&
                                                            $n_processo->instituicao->Anexo2_Instituicao)
                                                        <span
                                                            class="badge bg-success custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-light"> </i>
                                                        </span>
                                                    @else
                                                        <span
                                                            class="badge bg-warning custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-dark"></i>
                                                        </span>
                                                    @endif
                                                </a>
                                                <a class="list-group-item list-group-item-action" id="list-settings-list"
                                                    data-bs-toggle="list" href="#list-settings" role="tab"
                                                    aria-controls="list-settings"><big><b> 4. </b> </big>
                                                    Identificação do
                                                    Responsável pelo Projeto </b>
                                                    @if (
                                                        $n_processo->Resp_projeto &&
                                                            $n_processo->Resp_projeto->Nome_Resp_projeto &&
                                                            $n_processo->Resp_projeto->Telefone_Resp_projeto &&
                                                            $n_processo->Resp_projeto->CPF_Resp_projeto &&
                                                            $n_processo->Resp_projeto->RG_Resp_projeto &&
                                                            $n_processo->Resp_projeto->Endereco_Resp_projeto &&
                                                            $n_processo->Resp_projeto->Cidade_Resp_projeto &&
                                                            $n_processo->Resp_projeto->Estado_Resp_projeto &&
                                                            $n_processo->Resp_projeto->Cep_Resp_projeto)
                                                        <span
                                                            class="badge bg-success custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-light"> </i>
                                                        </span>
                                                    @else
                                                        <span
                                                            class="badge bg-warning custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-dark"></i>
                                                        </span>
                                                    @endif
                                                </a>
                                                <a class="list-group-item list-group-item-action" id="list-atas-list"
                                                    data-bs-toggle="list" href="#list-atas" role="tab"
                                                    aria-controls="list-atas"><big> <b> 5. </b> </big></b> Atas,
                                                    Certidões,
                                                    Comprovantes e Declarações
                                                    @if (
                                                        $n_processo->Doc_Anexo2 &&
                                                            $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo1 &&
                                                            $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo2 &&
                                                            $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo3 &&
                                                            // $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo4 &&
                                                            $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo5 &&
                                                            $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo6 &&
                                                            $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo7 &&
                                                            $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo8 &&
                                                            $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo9 &&
                                                            $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo10 &&
                                                            $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo12)
                                                        <span
                                                            class="badge bg-success custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-light"> </i>
                                                        </span>
                                                    @else
                                                        <span
                                                            class="badge bg-warning custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-dark"></i>
                                                        </span>
                                                    @endif
                                                </a>
                                                <a class="list-group-item list-group-item-action" id="list-projeto-list"
                                                    data-bs-toggle="list" href="#list-projeto" role="tab"
                                                    aria-controls="list-projeto"> <b> <big> 6. </big> </b>
                                                    Identificação
                                                    do
                                                    Projeto
                                                    @if (
                                                        $n_processo->Projeto_conteudo &&
                                                            $n_processo->Projeto_conteudo->Titulo_Projeto_Conteudo &&
                                                            $n_processo->Projeto_conteudo->Objeto_Projeto_Conteudo &&
                                                            $n_processo->Projeto_conteudo->Obj_Geral_Projeto_Conteudo &&
                                                            $n_processo->Projeto_conteudo->Obj_especifico_Projeto_Conteudo &&
                                                            $n_processo->Projeto_conteudo->Justificativa_Projeto_Conteudo &&
                                                            $n_processo->Projeto_conteudo->Contextualizacao_Projeto_Conteudo &&
                                                            $n_processo->Projeto_conteudo->Diagnostico_Projeto_Conteudo &&
                                                            $n_processo->Projeto_conteudo->Importancia_Projeto_Conteudo &&
                                                            $n_processo->Projeto_conteudo->Caracterizacao_Projeto_Conteudo &&
                                                            $n_processo->Projeto_conteudo->Publico_Alvo_Interno_Projeto_Conteudo &&
                                                            $n_processo->Projeto_conteudo->Publico_Alvo_Externo_Projeto_Conteudo &&
                                                            $n_processo->Projeto_conteudo->Problemas_Projeto_Conteudo &&
                                                            $n_processo->Projeto_conteudo->Resultados_Projeto_Conteudo &&
                                                            $n_processo->Projeto_conteudo->Inicio_Projeto_Conteudo &&
                                                            $n_processo->Projeto_conteudo->Fim_Projeto_Conteudo &&
                                                            $n_processo->Projeto_conteudo->N_Emenda_Projeto_Conteudo &&
                                                            $n_processo->Projeto_conteudo->Nome_Autor_Emenda_Projeto_Conteudo &&
                                                            $n_processo->Projeto_conteudo->Valor_Repasse_Projeto_Conteudo &&
                                                            $n_processo->Projeto_conteudo->Valor_Contrapartida_Projeto_Conteudo)
                                                        <span
                                                            class="badge bg-success custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-light"> </i>
                                                        </span>
                                                    @else
                                                        <span
                                                            class="badge bg-warning custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-dark"></i>
                                                        </span>
                                                    @endif
                                                </a>

                                                <a class="list-group-item list-group-item-action"
                                                    id="list-projeto-Cronograma" data-bs-toggle="list"
                                                    href="#list-Cronograma" role="tab"
                                                    aria-controls="list-Cronograma">
                                                    <b> <big> 7. </big> </b> Cronograma de Execução - <b> (Metas e
                                                        Etapas) </b>
                                                    @if ($n_processo->Metas)
                                                        <span
                                                            class="badge bg-success custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-light"> </i>
                                                        </span>
                                                    @else
                                                        <span
                                                            class="badge bg-warning custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-dark"></i>
                                                        </span>
                                                    @endif
                                                </a>
                                                <a class="list-group-item list-group-item-action"
                                                    id="list-projeto-consolidado" data-bs-toggle="list"
                                                    href="#list-consolidado" role="tab"
                                                    aria-controls="list-consolidado">
                                                    <b> <big> 8. </big> </b> Plano de Aplicação Consolidado
                                                    @if ($n_processo->Plano_consolidado && $n_processo->Plano_consolidado->Natureza)
                                                        <span
                                                            class="badge bg-success custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-light"> </i>
                                                        </span>
                                                    @else
                                                        <span
                                                            class="badge bg-warning custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-dark"></i>
                                                        </span>
                                                    @endif
                                                </a>

                                                <a class="list-group-item list-group-item-action"
                                                    id="list-projeto-detalhado" data-bs-toggle="list"
                                                    href="#list-detalhado" role="tab" aria-controls="list-detalhado">
                                                    <b> <big> 9. </big> </b> Plano de Aplicação Detalhado - <b> (Memória
                                                        de Cálculo) </b>
                                                    @if ($n_processo->Plano_detalhado && $n_processo->Plano_detalhado->Natureza_id)
                                                        <span
                                                            class="badge bg-success custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-light"> </i>
                                                        </span>
                                                    @else
                                                        <span
                                                            class="badge bg-warning custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-dark"></i>
                                                        </span>
                                                    @endif
                                                </a>

                                                <a class="list-group-item list-group-item-action"
                                                    id="list-projeto-detalhado" data-bs-toggle="list"
                                                    href="#list-desembolso" role="tab"
                                                    aria-controls="list-desembolso">
                                                    <b> <big> 10. </big> </b>Cronograma de Desembolso
                                                    @if ($n_processo->Cronograma_desembolso && $n_processo->Cronograma_desembolso->metas_id)
                                                        <span
                                                            class="badge bg-success custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-light"> </i>
                                                        </span>
                                                    @else
                                                        <span
                                                            class="badge bg-warning custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-dark"></i>
                                                        </span>
                                                    @endif
                                                </a>

                                                <a class="list-group-item list-group-item-action"
                                                    id="list-projeto-relacao" data-bs-toggle="list" href="#list-relacao"
                                                    role="tab" aria-controls="list-relacao">
                                                    <b> <big> 11. </big> </b>Relação de Obras e Equipamentos / Material
                                                    Permanente
                                                    @if ($n_processo->Obras_equipamento()->exists())
                                                        <span
                                                            class="badge bg-success custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-light"> </i>
                                                        </span>
                                                    @else
                                                        <span
                                                            class="badge bg-warning custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-dark"></i>
                                                        </span>
                                                    @endif
                                                </a>

                                                <a class="list-group-item list-group-item-action"
                                                    id="list-projeto-pesquisa" data-bs-toggle="list"
                                                    href="#list-pesquisa" role="tab" aria-controls="list-pesquisa">
                                                    <b> <big> 12. </big> </b> Pesquisa Mercadológica
                                                    @if ($n_processo->Pesquisa_mercadologica && $n_processo->Pesquisa_mercadologica->Descricao_bem)
                                                        <span
                                                            class="badge bg-success custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-light"> </i>
                                                        </span>
                                                    @else
                                                        <span
                                                            class="badge bg-warning custom-badge position-absolute top-0 end-0">
                                                            <i class="bi bi-pencil me-1 text-dark"></i>
                                                        </span>
                                                    @endif
                                                </a>

                                                <a class="list-group-item list-group-item-action"
                                                    id="list-projeto-tramitar" data-bs-toggle="list"
                                                    href="#list-tramitar" role="tab" aria-controls="list-tramitar">
                                                    <h5> <b> <big> 13. </big> Finalizar <i
                                                                class="bi bi-arrow-right-circle-fill me-2 text-primary">
                                                            </i></b></h5>
                                                </a>

                                            </div>
                                        </div>

                                        <div class="col-9">
                                            <div class="tab-content" id="nav-tabContent">
                                                {{-- {!! Form::open(['route' => 'trdigital.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} --}}

                                                @include('trdigital.edit.questoes.1oficios')
                                                @include('trdigital.edit.questoes.2resp_instituicao')
                                                @include('trdigital.edit.questoes.3instituicao')
                                                @include('trdigital.edit.questoes.4resp_projeto')
                                                @include('trdigital.edit.questoes.5doc_anexos2')
                                                @include('trdigital.edit.questoes.6projeto')
                                                @include('trdigital.edit.questoes.7cronograma')
                                                @include('trdigital.edit.questoes.8plano_consolidado')
                                                @include('trdigital.edit.questoes.9plano_detalhado')
                                                @include('trdigital.edit.questoes.10cronograma_desembolso')
                                                @include('trdigital.edit.questoes.11relacao')
                                                @include('trdigital.edit.questoes.12pesquisa_mercadologica')
                                                @include('trdigital.edit.questoes.13tramitar')

                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                        </section>
    </main>
    <script>
        $(document).ready(function() {
            // Função para adicionar a imagem ao lado de cada opção do select
            function addImageToSelectOption() {
                var select = $('#Orgao_Concedente'); // Seletor do seu select
                select.find('option').each(function() {
                    var option = $(this);
                    var imageSrc =
                        '{{ asset('images/brasao_mt.png') }}'; // Substitua pelo caminho correto da imagem
                    var imgElement = $('<img>').attr('src', imageSrc).css({
                        width: '20px', // Defina o tamanho da imagem aqui
                        marginRight: '5px' // Defina a margem direita para ajustar o espaçamento
                    });
                    option.prepend(imgElement);
                });
            }

            // Chame a função para adicionar a imagem ao carregar a página
            addImageToSelectOption();
        });
    </script>

    <!-- Adicione esses links no cabeçalho do seu HTML -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>


    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.4/vue.js'></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    {{-- <script src="{{ asset('js/step-by-step/script.js') }}"></script> --}}
@endsection

<script>
    function mascaraCpfCnpj(input) {
        var value = input.value;
        // Remove tudo que não é dígito
        value = value.replace(/\D/g, '');
        if (value.length <= 11) { // CPF
            // Coloca a máscara do CPF (XXX.XXX.XXX-XX)
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        } else { // CNPJ
            // Coloca a máscara do CNPJ (XX.XXX.XXX/XXXX-XX)
            value = value.replace(/^(\d{2})(\d)/, '$1.$2');
            value = value.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
            value = value.replace(/\.(\d{3})(\d)/, '.$1/$2');
            value = value.replace(/(\d{4})(\d)/, '$1-$2');
        }
        input.value = value;
    }

    function mascaraTelefone(input) {
        var value = input.value;
        // Remove tudo que não é dígito
        value = value.replace(/\D/g, '');
        if (value.length === 11) { // Celular
            // Coloca a máscara do telefone celular (DDD 9XXXX-XXXX)
            value = value.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
                    value = value.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');

        } else if (value.length === 10) { // Telefone fixo
            // Coloca a máscara do telefone fixo (DDD XXXX-XXXX)
            value = value.replace(/^(\d{2})(\d{4})(\d{4})$/, '($1) $2-$3');
        }
        input.value = value;
    }

    function mascaraCep(i) {

        var valor = i.value;

        if (isNaN(valor[valor.length - 1])) { //Não deixa a pessoa incluir letras
            i.value = valor.substring(0, valor.length - 1);
            return;
        }

        i.setAttribute("maxlength", "9");
        if (valor.length == 5) i.value += "-";
    }
</script>
<script>
    function validarValor(input, event) {
        const keyCode = event.which || event.keyCode;
        const currentValue = input.value.replace(/[^\d,]/g, '');
        const newValue = currentValue + String.fromCharCode(keyCode);

        if (parseFloat(newValue.replace(',', '.')) > 1000000000) {
            event.preventDefault();
            return false;
        }

        return true;
    }

    function aplicarMascara(input) {
        const valor = input.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
        const valorFormatado = valor.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');

        input.value = 'R$ ' + valorFormatado;
    }
</script>

<script>
    function aplicarMascara(input) {
        const valor = input.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
        const valorFormatado = valor.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
        input.value = valorFormatado;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const valorInputs = document.querySelectorAll('.valor-monetario');
        valorInputs.forEach(input => {
            input.addEventListener('blur', function() {
                const valorSemPontos = this.value.replace(/\D/g,
                    ''); // Remove todos os caracteres não numéricos
                const valorSemDecimais = valorSemPontos.split('.')[0]; // Remove a parte decimal
                const valorDecimal = parseFloat(valorSemDecimais.replace(',',
                    '.')); // Substitui a vírgula por ponto (caso haja)
                this.value = valorDecimal.toFixed(2); // Formata o valor com duas casas decimais
            });
        });
    });
</script>
<script>
    setTimeout(function() {
        var alert = document.getElementById('myAlert');
        alert.style.display = 'none';
    }, 7000); // 5000ms (5 segundos)
  </script>
  <script>
    setTimeout(function() {
        var alert = document.getElementById('myAlert2');
        alert.style.display = 'none';
    }, 7000); // 5000ms (5 segundos)
  </script>
  <script>
    setTimeout(function() {
        var alert = document.getElementById('myAlert3');
        alert.style.display = 'none';
    }, 7000); // 5000ms (5 segundos)
  </script>