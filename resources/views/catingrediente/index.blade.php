@extends('base.novabase')
@section('content')
    <main id="main" class="main">



        <div class="pagetitle">
            <h1>CATEGORIA DOS INGREDIENTES</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Início</a></li>
                    <li class="breadcrumb-item active">Painel Gerencial</li>
                    <li class="breadcrumb-item active">Cat. dos Ingredientes</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <a class="btn btn-primary" href="{{ route('catingrediente.create') }}"> Cadastrar</a>

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
                            <th>Nome</th>
                            <th>Obs.</th>
                            <th>Ações</th>

                        </tr>
                        @foreach ($catingrediente as $cat_ingredientes2)
                    </thead>



                    <td> {{ $cat_ingredientes2->Nome }} </td>
                    <td> {{ $cat_ingredientes2->Obs }} </td>
                    <td> <a class="btn btn-warning"
                            href="{{ route('catingrediente.edit', $cat_ingredientes2->id) }}">Editar</a>

                    </td>



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
