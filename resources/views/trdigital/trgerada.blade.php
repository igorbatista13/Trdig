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


    <main id="main" class="main">



        <div class="card-header">

            <section class="section contact">

                <div class="row gy-4">
                    <div class="col-xl-6">
                        <div class="card p-4">
                            <form action="forms/contact.php" method="post" class="php-email-form">
                                <div class="row gy-4">
                                    <div class="d-flex justify-content-center">
                                        {{-- comecei aqui --}}
                                        <div class="text-center mb-5">
                                            <img src="{{ asset('/images/createform.png') }}" height="88" class='mb-4'>
                                            <h3> <b> TR DIGITAL </b> </h3>
                                            <h5 class="card-title justify-content-md-center">
                                                A sua TR foi gerada com sucesso! </h5>
                                            <h1 class="card-title justify-content-md-center">
                                                N° da TR: </h1>
                                            <h1> <code> <b>
                                                        {{ $n_processo->id ?? 'ID' }}
                                                        </h3>

                                                </code> </b> </big>
                                                <hr>
                                                <div class="col-md-12 text-center">
                                                    <h5 class="card-title justify-content-md-center">
                                                        Comece a preencher a sua TR aqui:

                                                        <h5 class="card-title justify-content-md-center">
                                                            <a class="btn bg-primary text-light btn-lg"
                                                                href="{{ route('trdigital.edit', $n_processo->id) }}">
                                                                <i class="bi bi-pen me-1"></i>
                                                                Clique aqui </a>
                                                        </h5>



                                                </div>
                                        </div>



                                    </div>


                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="col-xl-6">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="info-box card">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Endereço</h3>
                                    <p>{{$n_processo->Orgaos->Endereco}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box card">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Telefone</h3>
                                    <p>{{$n_processo->Orgaos->Telefone}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box card">
                                    <i class="bi bi-envelope"></i>
                                    <h3>E-mail</h3>
                                    <p>{{$n_processo->Orgaos->Email}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box card">
                                    <i class="bi bi-clock"></i>
                                    <h3>Horário de Funcionamento</h3>
                                    <p>{{$n_processo->Orgaos->Horario_funcionamento}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box card">
                                    <i class="bi bi-clock"></i>
                                    <h3>Site</h3>
                                    <p>{{$n_processo->Orgaos->Site}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-box card">
                                    <i class="bi bi-clock"></i>
                                    <h3>Outros</h3>
                                    <p>{{$n_processo->Orgaos->Outras_info}}</p>
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
                                            <img src="{{ asset('images/pdf.png') }}"  width="40px" class="img-fluid rounded-start">
                                            @elseif ($bibliotecas->Tipo == 'Excel')
                                            <img src="{{ asset('images/excel.png') }}"  width="40px" class="img-fluid rounded-start">
                                            @elseif ($bibliotecas->Tipo == 'Word')
                                            <img src="{{ asset('images/word.png') }}"  width="40px" class="img-fluid rounded-start">
                                            @elseif ($bibliotecas->Tipo == 'Outros')
                                            <img src="{{ asset('images/biblioteca-ico.png') }}"  width="40px" class="img-fluid rounded-start">
                                            @elseif ($bibliotecas->Tipo == 'Link')
                                            <img src="{{ asset('images/link.png') }}"  width="40px" class="img-fluid rounded-start">
                                                 @else
                                             @endif
                                                   {{ $bibliotecas->Nome }}
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            @if ($bibliotecas->Descricao)                                         Sobre:   <strong> {{ $bibliotecas->Descricao }} </strong><br>
                                         @else
                                         @endif
                                         @if ($bibliotecas->Link)
                                         Link: <strong> <a href="{{ $bibliotecas->Link }}" target="_blank">{{ $bibliotecas->Link }}</a> </strong> <br>
                                         @else
                                         @endif
                                         @if ($bibliotecas->Anexo)
                                        Anexo: <a class="btn btn-primary" href="{{ asset('storage/' . $bibliotecas->Anexo) }}"
                                             target="_blank"> <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo </a>
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
