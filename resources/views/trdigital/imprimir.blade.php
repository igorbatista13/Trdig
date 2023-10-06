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

        @media print {
            #printButton {
                display: none;
            }

            @media print {
                #pdfButton {
                    display: none;
                }
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
                <div class="row gy-12">
                    <div class="col-xl-12">
                        <div class="card p-4">

                            <form action="forms/contact.php" method="post" class="php-email-form">
                                <button id="printButton">Imprimir</button>
                                <button id="pdfButton">Salvar em PDF</button>
                                <div class="row gy-4">
                                    <div class="d-flex justify-content-center">
                                        {{-- comecei aqui --}}
                                        <div class="text-center mb-12">

                                            <img src="{{ asset('/images/createform.png') }}" height="88" class='mb-4'>
                                            <h3> <b> TR DIGITAL </b> </h3>
                                            <h1 class="card-title justify-content-md-center">
                                                N° da TR:
                                                <b class="text-danger">
                                                    {{ $n_processo->id ?? 'ID' }} </b>
                                            </h1>

                                            </h4>
                                            <div class="col-md-12 text-center">
                                                <h5 class="card-title justify-content-md-center">
                                                    <b> Concedente: </b> <a class="text-primary">
                                                        {{ $n_processo->Orgaos->Nome }}
                                                    </a><br>
                                                    <b> Autor da TR: </b> <a>
                                                        {{ Auth::user()->name }} - {{ Auth::user()->perfil->Tipo }} </a><br>
                                                    <b> Proponente: </b> <a>
                                                        {{ $n_processo->instituicao->Nome_Instituicao }} </a> <br>
                                                    <b> CNPJ: </b> <a class="text-dark">
                                                        {{ $n_processo->instituicao->CNPJ_Instituicao }} </a>
                                                    <br>
                                                    <a class="text-dark"> <b> Telefone: </b> </a>
                                                    <a class="text-dark">
                                                        {{ $n_processo->instituicao->Telefone_Instituicao }}<br>
                                                        <a class="text-dark"> <b> Endereço: </b> </a>
                                                        {{ $n_processo->instituicao->Endereco_Instituicao }} <br>
                                                        {{ $n_processo->instituicao->Cidade_Instituicao }} -
                                                        {{ $n_processo->instituicao->Estado_Instituicao }} <br>
                                                    </a>
                                                    Data: {{ \Carbon\Carbon::now()->format('d/m/Y') }}


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

                            @if (Auth::user()->perfil->Tipo == 'Prefeitura')
                                @include('trdigital.imprimir.5anexos2_prefeitura')
                            @else
                                @include('trdigital.imprimir.5anexos2')
                            @endif

                            @include('trdigital.imprimir.6identificacao_projeto')
                            @include('trdigital.imprimir.7cronograma')
                            @include('trdigital.imprimir.8plano_consolidado')
                            @include('trdigital.imprimir.9plano_detalhado')
                            @include('trdigital.imprimir.10cronograma_desembolso')
                            @include('trdigital.imprimir.11relacao')
                            @include('trdigital.imprimir.12pesquisa_mercadologica')
                            @include('trdigital.imprimir.arq_sigcon')
                            {{-- @include('trdigital.imprimir.assinaturas') --}}

                        </div>

            </section>

    </main>

    <script>
        // Selecione o botão de impressão pelo ID
        const printButton = document.getElementById("printButton");

        // Adicione um evento de clique ao botão
        printButton.addEventListener("click", () => {
            // Acione a função de impressão
            window.print();
        });
    </script>


    <script>
        import html2pdf from 'html2pdf.js';
        const pdfButton = document.getElementById("pdfButton");

        pdfButton.addEventListener("click", () => {
            const element = document.body;

            const options = {
                margin: 10,
                filename: 'pagina.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait'
                },
            };

            html2pdf().from(element).set(options).outputPdf().then((pdf) => {
                pdf.save('pagina.pdf');
            });
        });
    </script>

    <script src="{{ asset('/js/pages/form-editor.js') }}"></script>
@endsection
