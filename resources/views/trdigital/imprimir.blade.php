@extends('base.novabase')
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
                     
        































                            <div class="col-lg-6">
                                <div class="info-box card">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Telefone</h3>
                                    <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box card">
                                    <i class="bi bi-envelope"></i>
                                    <h3>E-mail</h3>
                                    <p>info@example.com<br>contact@example.com</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box card">
                                    <i class="bi bi-clock"></i>
                                    <h3>Horário de Funcionamento</h3>
                                    <p>Monday - Friday<br>9:00AM - 05:00PM</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box card">
                                    <i class="bi bi-clock"></i>
                                    <h3>Site</h3>
                                    <p>http://www.setasc.mt.gov.br</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box card">
                                    <i class="bi bi-clock"></i>
                                    <h3>Outros</h3>
                                    <p>http://www.setasc.mt.gov.br</p>
                                </div>
                            </div>
                        </div>

                    </div>



                </div>

            </section>
            <div class="container">






                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manuais, Dicas e Links</h5>
                        @foreach ($biblioteca as $bibliotecas)
                            <!-- Default Accordion -->
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">

                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            @if ($bibliotecas->Tipo == 'PDF')
                                                <img src="{{ asset('images/pdf.png') }}" width="40px"
                                                    class="img-fluid rounded-start">
                                            @elseif ($bibliotecas->Tipo == 'Excel')
                                                <img src="{{ asset('images/excel.png') }}" width="40px"
                                                    class="img-fluid rounded-start">
                                            @elseif ($bibliotecas->Tipo == 'Word')
                                                <img src="{{ asset('images/word.png') }}" width="40px"
                                                    class="img-fluid rounded-start">
                                            @elseif ($bibliotecas->Tipo == 'Outros')
                                                <img src="{{ asset('images/biblioteca-ico.png') }}" width="40px"
                                                    class="img-fluid rounded-start">
                                            @elseif ($bibliotecas->Tipo == 'Link')
                                                <img src="{{ asset('images/link.png') }}" width="40px"
                                                    class="img-fluid rounded-start">
                                            @else
                                            @endif
                                            {{ $bibliotecas->Nome }}
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            @if ($bibliotecas->Descricao)
                                                Sobre: <strong> {{ $bibliotecas->Descricao }} </strong><br>
                                            @else
                                            @endif
                                            @if ($bibliotecas->Link)
                                                Link: <strong> <a href="{{ $bibliotecas->Link }}"
                                                        target="_blank">{{ $bibliotecas->Link }}</a> </strong> <br>
                                            @else
                                            @endif
                                            @if ($bibliotecas->Anexo)
                                                Anexo: <a class="btn btn-primary"
                                                    href="{{ asset('storage/' . $bibliotecas->Anexo) }}" target="_blank">
                                                    <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo </a>
                                            @else
                                            @endif

                                        </div>
                                    </div>
                                </div>



                            </div><!-- End Default Accordion Example -->
                        @endforeach
                    </div>
                </div>

                </section>
    </main>

    <script src="{{ asset('/js/pages/form-editor.js') }}"></script>
@endsection
