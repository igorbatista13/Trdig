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
                                    <p>A108 Adam Street,<br>New York, NY 535022</p>
                                </div>
                            </div>
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
                        <h5 class="card-title">Manuais e Dicas</h5>

                        <!-- Default Accordion -->
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Manual tipo 1
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the first item's accordion
                                            body.</strong> It is hidden by default,
                                        until the collapse plugin adds the
                                        appropriate classes that we use to style
                                        each element. These classes control the
                                        overall appearance, as well as the showing
                                        and hiding via CSS transitions. You can
                                        modify any of this with custom CSS or
                                        overriding our default variables. It's also
                                        worth noting that just about any HTML can go
                                        within the <code>.accordion-body</code>,
                                        though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Manual tipo 2
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the second item's accordion
                                            body.</strong> It is hidden by default,
                                        until the collapse plugin adds the
                                        appropriate classes that we use to style
                                        each element. These classes control the
                                        overall appearance, as well as the showing
                                        and hiding via CSS transitions. You can
                                        modify any of this with custom CSS or
                                        overriding our default variables. It's also
                                        worth noting that just about any HTML can go
                                        within the <code>.accordion-body</code>,
                                        though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Manual tipo 3
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the third item's accordion
                                            body.</strong> It is hidden by default,
                                        until the collapse plugin adds the
                                        appropriate classes that we use to style
                                        each element. These classes control the
                                        overall appearance, as well as the showing
                                        and hiding via CSS transitions. You can
                                        modify any of this with custom CSS or
                                        overriding our default variables. It's also
                                        worth noting that just about any HTML can go
                                        within the <code>.accordion-body</code>,
                                        though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Default Accordion Example -->

                    </div>
                </div>

                </section>
    </main>

    <script src="{{ asset('/js/pages/form-editor.js') }}"></script>
@endsection
