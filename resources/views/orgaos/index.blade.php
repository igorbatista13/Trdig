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
            <h1>Órgãos/Secretarias</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Início</a></li>
                    <li class="breadcrumb-item active">Painel Gerencial</li>
                    <li class="breadcrumb-item active">Órgãos/Secretarias</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <a class="btn btn-primary" href="{{ route('orgaos.create') }}"> Cadastrar Novo Órgão</a>


        <section class="section">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card">

                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @elseif ($message = Session::get('edit'))
                            <div class="alert alert-warning">
                                <p>{{ $message }}</p>
                            </div>
                        @elseif ($message = Session::get('delete'))
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                    </div>
                </div>
                @endif

                <table class='table datatable' id="table1">
                    <thead>

                        <tr>
                            <th></th>
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>E-mail</th>
                            <th>Horário de Funcionamento</th>
                            <th>Site</th>
                            <th>Outras Informações</th>
                            <th>Ações</th>

                        </tr>
                    </thead>
                    @foreach ($orgao as $orgaos)
                    <td> <img src="{{ asset('images/brasao_mt.png') }}" width="40px" class="img-fluid rounded-start" alt="...">
                    </td>
                        <td><b> {{ $orgaos->Sigla ?? 'Não Informado' }} </b> - {{ $orgaos->Nome ?? 'Não Informado' }} </td>
                        <td> {{ $orgaos->Endereco ?? 'Não Informado' }} - {{ $orgaos->Cep ?? 'Não Informado' }}</td>
                        <td> {{ $orgaos->Email ?? 'Não Informado' }}</td>
                        <td> {{ $orgaos->Horario_funcionamento ?? 'Não Informado' }}</td>
                        <td> {{ $orgaos->Site ?? 'Não Informado' }}</td>
                        <td> {{ $orgaos->Outras_info ?? 'Não Informado' }}</td>
                        <td> <a class="btn btn-warning" href="{{ route('orgaos.edit', $orgaos->id) }}">Editar</a> </td>



                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
            </div>

        </section>
        </div>
    </main>
    @endsection
