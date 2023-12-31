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
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<style>
/_ Estilo personalizado para o badge _/
.custom-badge {
font-size: 1.2rem;
padding: 0.3rem 0.6rem;
border-radius: 0.8rem;
}
</style>
<main id="main" class="main">
<div class="pagetitle">
<h1>TR DIGITAL</h1>
<nav>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Início</a></li>
<li class="breadcrumb-item active">Minhas TR</li>
</ol>
</nav>
</div><!-- End Page Title -->

        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{ $message }}</strong>
                    </div>
                @elseif ($message = Session::get('edit'))
                    <div class="alert alert-warning alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{ $message }}</strong>
                    </div>
                @elseif ($message = Session::get('delete'))
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Minhas TR</h5>
                                    <!-- Table with stripped rows -->
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($nProcessos as $n_processo)
                                                <tr>
                                                    <td>

                                                        <div class="row">


                                                            {{-- <div class="row g-0">
                                                                <div class="col-md-4 position-relative"> --}}
                                                            {{-- <img src="{{ asset('images/samples/trproponente.jpg') }}"
                                                                        class="img-fluid rounded card-img-top"
                                                                        alt="..."> --}}



                                                            <div class="col-md-6">
                                                                <div class="card">
                                                                    @if ($n_processo->Status == 'CORRIGIR')
                                                                        <a
                                                                            href="{{ route('trdigital.edit', $n_processo->id) }}">
                                                                            <span
                                                                                class="badge bg-warning custom-badge position-absolute top-0 end-0">
                                                                                <i class="bi bi-exclamation-triangle me-1">CORRIGIR
                                                                                </i></span> </a>
                                                                    @endif
                                                                    @if ($n_processo->Status == 'FINALIZADO')
                                                                        <center>

                                                                            <span
                                                                                class="badge bg-success custom-badge position-absolute top-0 end-0">
                                                                                <i class="bi bi-check-circle me-1">Finalizado
                                                                                </i></span>
                                                                        </center>
                                                                    @endif
                                                                    @if ($n_processo->Status == 'AGUARDANDO')
                                                                        <center>

                                                                            <span
                                                                                class="badge bg-primary custom-badge position-absolute top-0 end-0">
                                                                                <i class="bi bi-alarm me-1">Aguardando
                                                                                </i></span>
                                                                        </center>
                                                                    @endif
                                                                    @if ($n_processo->Status == 'TRAMITADO')
                                                                        <center>

                                                                            <span
                                                                                class="badge bg-primary custom-badge position-absolute top-0 end-0">
                                                                                <i class="bi bi-arrow-right-circle me-1">Tramitado
                                                                                </i></span>

                                                                        </center>
                                                                    @endif
                                                                    @if ($n_processo->Status == '')
                                                                        <center>

                                                                            <span
                                                                                class="badge bg-danger custom-badge position-absolute top-0 end-0">
                                                                                <i class="bi bi-arrow-90deg-right me-1">Não
                                                                                    tramitado
                                                                                </i></span>

                                                                        </center>
                                                                    @endif
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">


                                                                            @if ($n_processo->Status == 'CORRIGIR')
                                                                                <div class="alert border-warning text-center alert-warning alert-dismissible fade show"
                                                                                    role="alert">
                                                                                    <i
                                                                                        class="bi bi-exclamation-triangle me-1"></i>
                                                                                    Você precisa realizar <b>
                                                                                        correções
                                                                                    </b> em seu documento.

                                                                                    <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="alert"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                            @endif

                                                                            @if ($n_processo->Status == '')
                                                                                <div class="alert text-center alert-danger alert-dismissible fade show"
                                                                                    role="alert">
                                                                                    <i
                                                                                        class="bi bi-exclamation-triangle me-1"></i>
                                                                                    Finalize as informações em
                                                                                    seu
                                                                                    documento.

                                                                                    <button type="button" class="btn-close"
                                                                                        data-bs-dismiss="alert"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                            @endif
                                                                            <h4 class="text-center"> N° da TR:
                                                                                <b> {{ $n_processo->id }}
                                                                                </b><br><br>
                                                                                <center>
                                                                                    <small> <a class="text-dark">
                                                                                            Tramitado para:
                                                                                        </a></small>
                                                                                    <br>
                                                                                    <p class="card-text text-primary">

                                                                                        <img src="{{ asset('images/brasao_mt.png') }}"
                                                                                            class="img-fluid rounded"
                                                                                            width="30px">

                                                                                        <b> {{ $n_processo->Orgaos->Sigla ?? 'Não informado' }}
                                                                                            - </b>
                                                                                        <i> <small>
                                                                                                {{ $n_processo->Orgaos->Nome ?? ('Não informado' ?? 'Não informado') }}
                                                                                            </small>
                                                                                            <br>
                                                                                            <i
                                                                                                class="bi bi-calendar-event me-1"></i>
                                                                                            <small>
                                                                                                {{ $n_processo->created_at->format('m/d/Y') ?? 'Não informado' }}
                                                                                            </small>


                                                                                        </i>
                                                                                    </p>
                                                                                </center>
                                                                                <hr>
                                                                                <p class="card-text">
                                                                                    <i class="bi bi-building me-1"></i>
                                                                                    {{ $n_processo->instituicao->Nome_Instituicao ?? 'Não informado' }}

                                                                                    <br>
                                                                                    <small>
                                                                                        <i
                                                                                            class="bi bi-person-fill me-1"></i>
                                                                                        {{ $n_processo->Resp_Instituicao->Nome_Resp_Instituicao ?? 'Não informado' }}<br>
                                                                                        <i
                                                                                            class="bi bi-telephone-fill me-1"></i>
                                                                                        {{ $n_processo->Resp_Instituicao->Telefone_Instituicao ?? 'Não informado' }}
                                                                                        <br>

                                                                                    </small>
                                                                                </p>
                                                                                @if ($n_processo->Status == 'CORRIGIR')
                                                                                    <center> <a
                                                                                            class="btn bg-warning text-white"
                                                                                            href="{{ route('trdigital.edit', $n_processo->id) }}">
                                                                                            <i
                                                                                                class="bi bi-exclamation-triangle me-1"></i>
                                                                                            CORRIGIR</a>
                                                                                    </center>
                                                                                @endif
                                                                                @if ($n_processo->Status == '')
                                                                                    <center> <a
                                                                                            class="btn bg-warning text-white"
                                                                                            href="{{ route('trdigital.edit', $n_processo->id) }}">
                                                                                            <i class="bi bi-pen me-1"></i>
                                                                                            EDITAR </a>
                                                                                    </center>
                                                                                    <br>
                                                                                @endif
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            @if ($n_processo->Status == 'FINALIZADO')
                                                                <div class="col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title"> Anexar os documentos
                                                                                do SIGCON aqui:
                                                                                <br>
                                                                                <br>

                                                                                {!! Form::open([
                                                                                    'method' => 'POST',
                                                                                    'route' => ['trdigital.anexo_sigcon', $n_processo->id],
                                                                                    'enctype' => 'multipart/form-data',
                                                                                ]) !!}
                                                                                @method('PUT')
                                                                                <!-- Resto do seu formulário -->

                                                                                <small>
                                                                                    <label>Anexo I: cadastro de Órgãos ou
                                                                                        Entidades Dirigentes </label>
                                                                                        @if ($n_processo->Anexo_sigcon && $n_processo->Anexo_sigcon->anexo1 == '')
                                                                                        <span
                                                                                            class="badge bg-danger custom-badge position-absolute">
                                                                                            <i class="bi bi-x-circle me-1 text-light"> Não enviado </i>
                                                                                        </span>
                                                                                    @else
                                                                                        <span
                                                                                            class="badge bg-success custom-badge position-absolute">
                                                                                            <i class="bi bi-check-circle me-1 text-light"> Enviado </i>
                                                                                        </span>
                                                                                    @endif
                                                                                    {!! Form::file('anexo1', ['class' => 'form-control']) !!}

                                                                                    <label> Anexo II: Dados do
                                                                                        Projeto</label>
                                                                                        @if ($n_processo->anexo_sigcon && $n_processo->anexo_sigcon->anexo2 == '')
                                                                                        <span class="badge bg-danger custom-badge position-absolute">
                                                                                            <i class="bi bi-x-circle me-1 text-light"> Não enviado </i>
                                                                                        </span>
                                                                                    @else
                                                                                        <span
                                                                                            class="badge bg-success custom-badge position-absolute">
                                                                                            <i class="bi bi-check-circle me-1 text-light"> Enviado </i>
                                                                                        </span>
                                                                                    @endif
                                                                                    {!! Form::file('anexo2', ['class' => 'form-control']) !!}


                                                                                    <label> Anexo III: Cronograma de
                                                                                        Execução Física de Plano de
                                                                                        Aplicação de Recursos</label>
                                                                                        @if ($n_processo->anexo_sigcon && $n_processo->anexo_sigcon->anexo3 == '')
                                                                                        <span class="badge bg-danger custom-badge position-absolute">
                                                                                            <i class="bi bi-x-circle me-1 text-light"> Não enviado </i>
                                                                                        </span>
                                                                                    @else
                                                                                        <span
                                                                                            class="badge bg-success custom-badge position-absolute">
                                                                                            <i class="bi bi-check-circle me-1 text-light"> Enviado </i>
                                                                                        </span>
                                                                                    @endif
                                                                                    {!! Form::file('anexo3', ['class' => 'form-control']) !!}


                                                                                    <label> Anexo IV: Cronograma de
                                                                                        Desembolso</label>
                                                                                        @if ($n_processo->anexo_sigcon && $n_processo->anexo_sigcon->anexo4 == '')
                                                                                        <span class="badge bg-danger custom-badge position-absolute">
                                                                                            <i class="bi bi-x-circle me-1 text-light"> Não enviado </i>
                                                                                        </span>
                                                                                    @else
                                                                                        <span
                                                                                            class="badge bg-success custom-badge position-absolute">
                                                                                            <i class="bi bi-check-circle me-1 text-light"> Enviado </i>
                                                                                        </span>
                                                                                    @endif
                                                                                    {!! Form::file('anexo4', ['class' => 'form-control']) !!}


                                                                                    <label> Anexo V: Relação de Equipamentos
                                                                                        e Material Permanente</label>
                                                                                        @if ($n_processo->anexo_sigcon && $n_processo->anexo_sigcon->anexo5 == '')
                                                                                        <span class="badge bg-danger custom-badge position-absolute">
                                                                                            <i class="bi bi-x-circle me-1 text-light"> Não enviado </i>
                                                                                        </span>
                                                                                    @else
                                                                                        <span
                                                                                            class="badge bg-success custom-badge position-absolute">
                                                                                            <i class="bi bi-check-circle me-1 text-light"> Enviado </i>
                                                                                        </span>
                                                                                    @endif
                                                                                    {!! Form::file('anexo5', ['class' => 'form-control']) !!}

                                                                                    <br>
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary"> Enviar
                                                                                        Anexos</button>
                                                                                    {!! Form::close() !!}

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif





                                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
        </div>
        </div>
        </div>
        </section>
        </div>
        </div>
    </main>

@endsection
