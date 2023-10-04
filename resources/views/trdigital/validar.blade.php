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


                                            <div class="text-center mb-5">
                                                <img src="{{ asset('/images/createform.png') }}" height="88"
                                                    class='mb-4'>
                                                <h3><b> TR DIGITAL - </b> <span class="text-warning"> (Validação) </span></h3>
                                                    <br>
                                                <section class="section contact">

                                                    <div class="row gy-4">
                                              
                                                      <div class="col-xl-8">
                                              
                                                        <div class="row">
                                                          <div class="col-lg-6">
                                                            <div class="info-box card">
                                                              <i class="bi bi-file-earmark-text"></i>
                                                              <h3>N° da TR Digital</h3>
                                                              <p> <big> <b class="text-danger"> <u> {{$n_processo->id}} </u></b </b></big></p>
                                                              <p> - </p>
                                                            </div>
                                                          </div>
                                                          <div class="col-lg-6">
                                                            <div class="info-box card"><center>
                                                                <img src="{{ asset('/images/brasao_mt.png') }}" class="rounded" width="38">
                                                                <h3>Órgão Concedente:</h3>
                                                            <b>  {{ $n_processo->Orgaos->Sigla }} </b> - 
                                                             {{ $n_processo->Orgaos->Nome }} </p><br>

                                                                          </div>
                                                          </div>
                                                          <div class="col-lg-6">
                                                            <div class="info-box card">
                                                              <i class="bi bi-person-circle"></i>
                                                              <h3>Autor da TR</h3>
                                                              <p><b>{{Auth::user()->name}} </b></p>
                                                              <p> <span class="text-primary"> {{Auth::user()->perfil->Tipo }} </span></p>
                                                            </div>
                                                          </div>
                                                          <div class="col-lg-6">
                                                            <div class="info-box card">
                                                              <i class="bi bi-chat-left-text"></i>
                                                              <h3>Status</h3>
                                                              @if ($n_processo->Status == 'CORRIGIR')
                                                              <p><b class="text-warning">{{ $n_processo->Status }} </b> </p>
                                                              @endif
                                                              
                                                              @if ($n_processo->Status == 'FINALIZADO')
                                                              <p><b class="text-success">{{ $n_processo->Status }} </b> </p>
                                                              @endif
                                                              @if ($n_processo->Status == 'AGUARDANDO')
                                                              <p><b class="text-primary">{{ $n_processo->Status }} </b> </p>
                                                              @endif
                                                              @if ($n_processo->Status == '')
                                                              <p><b class="text-primary"> EM CONSTRUÇÃO </b> </p>
                                                              @endif

                                                              <p> - </p>
                                                            </div>
                                                          </div>
                                                        </div>
                                              
                                                      </div>
                                              
                                                      
                                                      <div class="col-lg-2">
                                                            <img src="{{asset('images/manual.jpg')}}">
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
                                              
                                                  </section>

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

                                        
                                                        

                                                    </div>



                                                </div>






                              
                   

                                    <div class="row">
                                        <div class="col-3">
                                            <div class="list-group" id="list-tab" role="tablist">
                                                <a class="list-group-item list-group-item-action active" id="list-home-list"
                                                    data-bs-toggle="list" href="#list-home" role="tab"
                                                    aria-controls="list-home"><big><b> 1. </b></big> Ofícios</a>
                                                <a class="list-group-item list-group-item-action" id="list-profile-list"
                                                    data-bs-toggle="list" href="#list-profile" role="tab"
                                                    aria-controls="list-profile"><big><b> 2. </b> </big>
                                                    Identificação do Responsável
                                                    pela Instituição. </b></a>
                                                <a class="list-group-item list-group-item-action" id="list-messages-list"
                                                    data-bs-toggle="list" href="#list-messages" role="tab"
                                                    aria-controls="list-messages"><b> 3.</b> </big>Identificação da
                                                    Instituição
                                                    Proponente </b> </a>
                                                <a class="list-group-item list-group-item-action" id="list-settings-list"
                                                    data-bs-toggle="list" href="#list-settings" role="tab"
                                                    aria-controls="list-settings"><big><b> 4. </b> </big> Identificação do
                                                    Responsável pelo Projeto </b> </a>
                                                <a class="list-group-item list-group-item-action" id="list-atas-list"
                                                    data-bs-toggle="list" href="#list-atas" role="tab"
                                                    aria-controls="list-atas"><big> <b> 5. </b> </big></b> Atas, Certidões,
                                                    Comprovantes e Declarações </a>

                                                <a class="list-group-item list-group-item-action" id="list-projeto-list"
                                                    data-bs-toggle="list" href="#list-projeto" role="tab"
                                                    aria-controls="list-projeto"> <b> <big> 6. </big> </b> Identificação do
                                                    Projeto </a>

                                                <a class="list-group-item list-group-item-action" id="list-cronograma-list"
                                                    data-bs-toggle="list" href="#list-cronograma" role="tab"
                                                    aria-controls="list-cronograma"> <b> <big> 7. </big> </b> Cronograma de
                                                    Execução </a>

                                                <a class="list-group-item list-group-item-action"
                                                    id="list-Plano_consolidado-list" data-bs-toggle="list"
                                                    href="#list-Plano_consolidado" role="tab"
                                                    aria-controls="list-Plano_consolidado"> <b> <big> 8. </big> </b> Plano
                                                    Consolidado </a>                                                

                                                <a class="list-group-item list-group-item-action"
                                                    id="list-Plano_detalhado-list" data-bs-toggle="list"
                                                    href="#list-Plano_detalhado" role="tab"
                                                    aria-controls="list-Plano_detalhado"> <b> <big> 9. </big> </b> Plano
                                                    Detalhado </a>

                                                    <a class="list-group-item list-group-item-action"
                                                    id="list-projeto-detalhado" data-bs-toggle="list"
                                                    href="#list-desembolso" role="tab"
                                                    aria-controls="list-desembolso">
                                                    <b> <big> 10. </big> </b>Cronograma de Desembolso
                                             
                                                </a>

                                                <a class="list-group-item list-group-item-action"
                                                id="list-projeto-relacao" data-bs-toggle="list" href="#list-relacao"
                                                role="tab" aria-controls="list-relacao">
                                                <b> <big> 11. </big> </b>Relação de Obras e Equipamentos / Material
                                                Permanente
                                              
                                            </a>

                                            <a class="list-group-item list-group-item-action"
                                                id="list-projeto-pesquisa" data-bs-toggle="list"
                                                href="#list-pesquisa" role="tab" aria-controls="list-pesquisa">
                                                <b> <big> 12. </big> </b> Pesquisa Mercadológica
                                              
                                            </a>
                                                <a class="list-group-item list-group-item-action" id="list-projeto-tramitar"
                                                    data-bs-toggle="list" href="#list-tramitar" role="tab"
                                                    aria-controls="list-tramitar"> <b> <big> 13. </big> </b> Finalizar</a>

                                            </div>
                                        </div>

                                        <div class="col-9">
                                            <div class="tab-content" id="nav-tabContent">

                                                @include('trdigital.validar.questoes.1oficios')
                                                @include('trdigital.validar.questoes.2resp_instituicao')
                                                @include('trdigital.validar.questoes.3instituicao')
                                                @include('trdigital.validar.questoes.4resp_projeto')
                                                @if (Auth::user()->perfil->Tipo == 'Prefeitura' )    
                                                @include('trdigital.validar.questoes.5doc_anexos2_prefeitura')
                                                @else
                                                @include('trdigital.validar.questoes.5doc_anexos2')
                                                @endif                                    
                                                @include('trdigital.validar.questoes.6projeto')
                                                @include('trdigital.validar.questoes.7cronograma')
                                                @include('trdigital.validar.questoes.8plano_consolidado')
                                                @include('trdigital.validar.questoes.9plano_detalhado')
                                                @include('trdigital.validar.questoes.10cronograma_desembolso')
                                                @include('trdigital.validar.questoes.11relacao')
                                                @include('trdigital.validar.questoes.12pesquisa_mercadologica')




                                                @include('trdigital.validar.questoes.tramitar')

                                            </div>
                                        </div>
















    </main>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.4/vue.js'></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="{{ asset('js/step-by-step/script.js') }}"></script>
@endsection
