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

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Início</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        @if (Auth::check() && Auth::user()->hasRole('Admin'))
                            <!-- Sales Card -->
                            <div class="col-xxl-3 col-md-3">
                                <div class="card info-card sales-card">

                                    <div class="card-body">
                                        <h5 class="card-title">Total <span></span></h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-file-text"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6> {{ $count_tr_total }}</h6>
                                                <span class="text-success small pt-1 fw-bold">Total Recebidas </span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Sales Card -->


                            <div class="col-xxl-3 col-md-3">
                                <div class="card info-card revenue-card">



                                    <div class="card-body">
                                        <h5 class="card-title">Caixa de Entrada <span></span></h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-file-text"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6> {{ $count_caixa_entrada }} </h6>
                                                <span class="text-success small pt-1 fw-bold">Recebidas p/ a sua secretaria
                                                </span>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Sales Card -->

                            <!-- Revenue Card -->
                            <div class="col-xxl-3 col-md-3">
                                <div class="card info-card customers-card">



                                    <div class="card-body">
                                        <h5 class="card-title">Corrigir<span></span></h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-file-text"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $count_tr_corrigir }}</h6>
                                                <span class="text-danger small pt-1 fw-bold">A corrigir</span>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Revenue Card -->

                            <!-- Customers Card -->
                            <div class="col-xxl-3 col-xl-3">

                                <div class="card info-card revenue-card">


                                    <div class="card-body">
                                        <h5 class="card-title">Finalizadas <span></span></h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-file-text"></i>
                                            </div>
                                            <div class="ps-3 ">
                                                <h6 class="text-success"> {{ $count_tr_finalizado }}</h6>
                                                <span class="text-success small pt-1 fw-bold">Finalizadas</span>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div><!-- End Customers Card -->
                            <div class="col-xxl-3 col-xl-3">

                                <div class="card info-card customers-card">


                                    <div class="card-body">
                                        <h5 class="card-title">USUÁRIOS <span></span></h5>

                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-people"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $count_usuarios }}</h6>
                                                <span class="text-dark small pt-1 fw-bold">Qtd. Cadastrados</span>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div><!-- End Customers Card -->



                            <div class="col-xxl-4 col-xl-4">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title">ÓRGÃOS / SECRETARIAS <span></span></h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bx bxs-school"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $count_orgaos }}</h6>
                                                <span class="text-success small pt-1 fw-bold">Cadastradas</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Customers Card -->

                            <div class="col-xxl-4 col-xl-4">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title">BIBLIOTECA <span></span></h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bx bxs-book"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $count_biblioteca }}</h6>
                                                <span class="text-success small pt-1 fw-bold">Cadastradas</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Customers Card -->

                            <div class="col-xxl-4 col-xl-4">
                                <div class="card info-card revenue-card">
                                    <div class="card-body">
                                        <h5 class="card-title">CIDADES<span></span></h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-pin-map "></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{ $cidade }}</h6>
                                                <span class="text-success small pt-1 fw-bold">Cadastradas</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Customers Card -->
                        @endif
                        @if (Auth::check() && Auth::user()->hasRole('Admin'))
                            <div class="col-xxl-4 col-xl-4">



                            </div><!-- End Customers Card -->
                        @endif

                        <!-- Reports -->
                        <!-- End Reports -->

                        <!-- Recent Sales -->
                        @if (Auth::check() && Auth::user()->hasRole('Admin'))
                            <div class="col-12">
                                <div class="card recent-sales overflow-auto">


                                    <div class="card-body ">
                                        <h5 class="card-title">Últimas 5 TR Recebidas<span></span></h5>

                                        <table class="table table-borderless datatable">
                                            <thead>
                                                <tr>

                                                    <th scope="col">N° TR</th>
                                                    <th scope="col">Instituição</th>
                                                    <th scope="col">Título</th>
                                                    <th scope="col">Usuário</th>

                                                </tr>
                                            </thead>
                                            @foreach ($nProcessos as $processos)
                                                <tbody>
                                                    <tr>

                                                        <th scope="row"> {{ $processos->id }} <a>
                                                            </a>
                                                        </th>
                                                        <td>{{ $processos->instituicao->Nome_Instituicao ?? 'Não informado' }}
                                                        </td>
                                                        <td class="text-primary">
                                                            {{ $processos->Projeto_conteudo->Titulo_Projeto_Conteudo ?? 'Não informado' }}
                                                        </td>
                                                        <td> <i class="bi bi-person text-primary"></i>
                                                            {{ $processos->user->name }}
                                                            <br> <i class="bi bi-envelope text-primary"></i>
                                                            {{ $processos->user->email }}

                                                        </td>

                                                        <td> <a class="btn btn-primary"
                                                            href="{{ asset('trdigital/tramitados') }}">Acessar</a>




                                                    </tr>
                                            @endforeach


                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div><!-- End Recent Sales -->
                        @endif

                           

                    </div>
                </div>
                <div class="col-xxl-3 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Total <span></span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-file-text"></i>
                                </div>
                                <div class="ps-3">
                                    <h6> {{ $processoCount }}</h6>
                                    <span class="text-success small pt-1 fw-bold">Minhas TR </span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-3">
                    <div class="card info-card customers-card">

                        <div class="card-body">
                            <h5 class="card-title">Corrigir <span></span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-file-text"></i>
                                </div>
                                <div class="ps-3">
                                    <h6> {{ $processoCount_corrigir }}</h6>
                                    <span class="text-danger small pt-1 fw-bold">Corrigir</span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Aguardando<span></span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-file-text"></i>
                                </div>
                                <div class="ps-3">
                                    <h6> {{ $processoCount_aguardando }}</h6>
                                    <span class="text-primary small pt-1 fw-bold">Aguardando</span>

                                </div>
                            </div>
                        </div>
                    </div></div>

        
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">


                        <div class="card-body ">
                            <h5 class="card-title">Últimos 5 Arquivos cadastados na Biblioteca<span></span>
                            </h5>

                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>

                                        <th scope="col"></th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Anexo</th>

                                    </tr>
                                </thead>
                                @foreach ($biblioteca as $bibliotecas)
                                    <tbody>
                                        <tr>

                                            <th scope="row">
                                                @if ($bibliotecas->Tipo == 'PDF')
                                                    <img src="{{ asset('images/pdf.png') }}" width="40px"
                                                        class="img-fluid rounded-start">
                                                @elseif ($bibliotecas->Tipo == 'Excel')
                                                    <img src="{{ asset('images/excel.png') }}" width="40px"
                                                        class="img-fluid rounded-start">
                                                @elseif ($bibliotecas->Tipo == 'Imagem')
                                                    <img src="{{ asset('images/imagem_logo.png') }}"
                                                        width="40px" class="img-fluid rounded-start">
                                                @elseif ($bibliotecas->Tipo == 'Video')
                                                    <img src="{{ asset('images/video_logo.png') }}"
                                                        width="40px" class="img-fluid rounded-start">
                                                @elseif ($bibliotecas->Tipo == 'Word')
                                                    <img src="{{ asset('images/word.png') }}" width="40px"
                                                        class="img-fluid rounded-start">
                                                @elseif ($bibliotecas->Tipo == 'Outros')
                                                    <img src="{{ asset('images/biblioteca-ico.png') }}"
                                                        width="40px" class="img-fluid rounded-start">
                                                @elseif ($bibliotecas->Tipo == 'Link')
                                                    <img src="{{ asset('images/link.png') }}" width="40px"
                                                        class="img-fluid rounded-start">
                                                @else
                                                @endif
                                            </th>

                                            <td>{{ $bibliotecas->Nome ?? 'Não informado' }}<br>
                                                {{ $bibliotecas->Descricao ?? 'Não informado' }}
                                            </td>
                                            <td class="text-primary">
                                                {{ $bibliotecas->Tipo ?? 'Não informado' }}
                                            </td>

                                            <td> <a class="btn btn-primary"
                                                    href="{{ asset('biblioteca/biblioteca') }}">Acessar</a>

                                            </td>


                                        </tr>
                                @endforeach


                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Recent Sales -->
            </div><!-- End Right side columns -->

            </div>
        </section>
    </main>
@endsection
