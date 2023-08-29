@extends('base.imprimir')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>

    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
        }
    </style>
    <?php
    $processoCount = session()->get('processoCount');
    $processoCount_corrigir = session()->get('processoCount_corrigir');
    $processoCount_finalizado = session()->get('processoCount_finalizado');
    $processoCount_aguardando = session()->get('processoCount_aguardando');
    $processoCount_tramitada = session()->get('processoCount_tramitada');
    $processoCount_nao_finalizada = session()->get('processoCount_nao_finalizada');
    ?>


    <main id="main" class="main">
        <div class="card-header">
            <section class="section contact">
                <div class="row gy-4">
                    <div class="col-xl-12">
                        <div class="card p-4">
                            <form action="forms/contact.php" method="post" class="php-email-form">
                                <div class="row gy-4">
                                    <div class="d-flex justify-content-center">
                                        {{-- comecei aqui --}}
                                        <div class="text-center mb-5">
                                            <img src="{{ asset('/images/createform.png') }}" height="88" class='mb-4'>
                                            <h3> <b> TR DIGITAL </b> </h3>
                                            <h1 class="card-title justify-content-md-center">
                                                N° da TR:
                                                <code> <b>
                                                        {{ $n_processo->id ?? 'ID' }}
                                            </h1>
                                            </h3>

                                            </code> </b> </big>
                                            <hr>
                                            <div class="col-md-12 text-center">
                                                <h5 class="card-title justify-content-md-center">
                                                    Concedente: <a class="text-primary"> {{ $n_processo->Orgaos->Nome }}
                                                    </a><br>
                                                    Proponente: <a class="text-primary">
                                                        {{ $n_processo->instituicao->Nome_Instituicao }} <br>
                                                        <small> CNPJ: <a class="text-dark">
                                                                {{ $n_processo->instituicao->CNPJ_Instituicao }} </a>
                                                            <a class="text-primary"> Telefone: </a>
                                                            <a class="text-dark">
                                                                {{ $n_processo->instituicao->Telefone_Instituicao }}<br>
                                                                {{ $n_processo->instituicao->Endereco_Instituicao }} <br>
                                                                {{ $n_processo->instituicao->Cidade_Instituicao }} |
                                                                {{ $n_processo->instituicao->Estado_Instituicao }} <br>
                                                            </a></small>
                                            </div>
                                        </div>



                                    </div>


                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="col-xl-12">
                        <div class="row">

                            @include('trdigital.imprimir.1oficios')
                            @include('trdigital.imprimir.2identificacao_resp')
                            @include('trdigital.imprimir.3identificacao_instituicao')
                            @include('trdigital.imprimir.4identificacao_resp_projeto')
                            @include('trdigital.imprimir.5anexos2')
                            @include('trdigital.imprimir.6identificacao_projeto')
                            @include('trdigital.imprimir.7cronograma')
                            @include('trdigital.imprimir.8plano_consolidado')
                            @include('trdigital.imprimir.9plano_detalhado')
                            @include('trdigital.imprimir.10cronograma_desembolso')
                            @include('trdigital.imprimir.11relacao')
                            @include('trdigital.imprimir.12pesquisa_mercadologica')
                            @include('trdigital.imprimir.assinaturas')
                        
                </div>

            </section>
            

                </section>
    </main>

    <script src="{{ asset('/js/pages/form-editor.js') }}"></script>
    
    @endsection