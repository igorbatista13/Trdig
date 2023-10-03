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
                                                <img src="{{ asset('/images/validate.png') }}" height="100px"
                                                    class='mb-4'>
                                                <h3>TR DIGITAL - Validação</h3>
                                                <h4 class="text-warning"> <b> {{ $n_processo->Orgaos->Sigla }} -
                                                        {{ $n_processo->Orgaos->Nome }} </b></h4>


                                                <div class="row">

                                                    <div class="col-lg-6">
                                                        {{-- 
                                                      {!! Form::model($n_processo, [
                                                            'method' => 'PATCH',
                                                            'route' => ['trdigital.validar', $n_processo->id],
                                                            'enctype' => 'multipart/form-data',
                                                        ]) !!} --}}



                                                        @if (auth()->check())
                                                            <input type="hidden" name="user_id"
                                                                value="{{ auth()->user()->id }}">
                                                        @endif



                                                    </div>
                                                </div>
                                            </div>
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
