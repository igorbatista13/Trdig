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

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                        </div>

                        <div class="text-center mb-5">
                            <img src="{{ asset('/images/biblioteca.png') }}" width="300px" class='mb-4'>
                            <h3>Cadastro de Novo Conteúdo em sua Biblioteca</h3>
                            <p></p>
                        </div>

                        {!! Form::model($biblioteca, ['method' => 'PATCH', 'route' => ['biblioteca.update', $biblioteca->id], 'enctype' => 'multipart/form-data']) !!}


                        <div class="card-content">
                            <div class="card-body">
                                <form class="form">
                                    <div class="row">
                                        <div class="col-md-4 col-6">
                                            <b> <label for="first-name-column">Nome do Arquivo ou Link</label> </b>
                                            {!! Form::text('Nome', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                                        </div>

                                        <div class="col-md-4 col-6">
                                            <b> <label for="first-name-column">Nome do Arquivo ou Link</label> </b>
                                            {!! Form::select(
                                                'Tipo',
                                                [
                                                    '' => 'Selecione',
                                                    'Link' => 'Link',
                                                    'Word' => 'Word',
                                                    'Excel' => 'Excel',
                                                    'PDF' => 'PDF',
                                                    'Imagem' => 'Imagem',
                                                    'Video' => 'Video',
                                                    'Outros' => 'Outros',
                                                ],
                                                null,
                                                ['class' => 'form-control'],
                                            ) !!}
                                        </div>



                                        <div class="col-md-4 col-6">
                                            <b> <label for="first-name-column">Descrição: </label> </b>
                                            {!! Form::text('Descricao', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <b> <label for="first-name-column">Link: </label> </b>
                                            {!! Form::text('Link', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                                        </div>
                                   
                                        <div class="col-md-4 col-6">
                                            <b> <label for="first-name-column">Status: </label> </b>
                                            {!! Form::select('Status', ['' => 'Selecione', 'Ativo' => 'Ativo', 'Inativo' => 'Inativo'], null, [
                                                'class' => 'form-control',
                                            ]) !!}
                                        </div>
                                    </div>
                                
                                        <div class="col-md-4 col-6">
                                            <b> <label for="first-name-column">Anexo:</label> </b>
                                            {!! Form::file('Anexo', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Salvar</button>
                                        </div>


                                    </div>
                                    {!! Form::close() !!}

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>

        </section>
    </main>
    <script src="{{ asset('/js/pages/form-editor.js') }}"></script>

@endsection
