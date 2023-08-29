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
            <h1>Biblioteca</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Início</a></li>
                    <li class="breadcrumb-item active">Painel Gerencial</li>
                    <li class="breadcrumb-item active">Biblioteca</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <a class="btn btn-primary" href="{{ route('biblioteca.create') }}"> Cadastrar Novo Conteúdo em sua Biblioteca</a>


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
                            <th>Descrição</th>
                            <th>Status</th>
                            <th>Link</th>
                            <th>Anexo</th>
                            <th>Ações</th>

                        </tr>
                    </thead>
                    @foreach ($biblioteca as $bibliotecas)
                        <td>
                              @if ($bibliotecas->Tipo == 'PDF')
                            <img src="{{ asset('images/pdf.png') }}"  width="40px" class="img-fluid rounded-start">
                            @elseif ($bibliotecas->Tipo == 'Excel')
                            <img src="{{ asset('images/excel.png') }}"  width="40px" class="img-fluid rounded-start">
                            @elseif ($bibliotecas->Tipo == 'Imagem')
                            <img src="{{ asset('images/imagem_logo.png') }}"  width="40px" class="img-fluid rounded-start">
                            @elseif ($bibliotecas->Tipo == 'Video')
                            <img src="{{ asset('images/video_logo.png') }}"  width="40px" class="img-fluid rounded-start">
                            @elseif ($bibliotecas->Tipo == 'Word')
                            <img src="{{ asset('images/word.png') }}"  width="40px" class="img-fluid rounded-start">
                            @elseif ($bibliotecas->Tipo == 'Outros')
                            <img src="{{ asset('images/biblioteca-ico.png') }}"  width="40px" class="img-fluid rounded-start">
                            @elseif ($bibliotecas->Tipo == 'Link')
                            <img src="{{ asset('images/link.png') }}"  width="40px" class="img-fluid rounded-start">
                                 @else
                             @endif
                        </td>
                        <td><b>{{ $bibliotecas->Nome ?? 'Não Informado' }} </td>
                        <td> {{ $bibliotecas->Descricao ?? 'Não Informado' }} </td>
                        <td> {{ $bibliotecas->Status ?? 'Não Informado' }}</td>
                        <td> <a href="{{ $bibliotecas->Link }}" target="_blank">{{ $bibliotecas->Link }}</a></a>
                        </td>
                        <td>
                            @if ($bibliotecas->Anexo)
                                <a class="btn btn-primary" href="{{ asset('storage/' . $bibliotecas->Anexo) }}"
                                    target="_blank"> <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo </a>
                                    @else
                                    <h6 class="text-danger"> <b> Documento não enviado </b></h6>
                                @endif
                                </td>

                        <td> <a class="btn btn-warning" href="{{ route('biblioteca.edit', $bibliotecas->id) }}">Editar</a>

                            {!! Form::open(['method' => 'DELETE','route' => ['biblioteca.destroy', $bibliotecas->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
 
                            {!! Form::close() !!}
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
