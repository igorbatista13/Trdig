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
                            <img src="{{ asset('/images/brasao_mt.png') }}" height="48" class='mb-4'>
                            <h3>Cadastro de Órgãos/Secretarias</h3>
                            <p></p>
                        </div>

                        {!! Form::open(['route' => 'orgaos.store', 'method' => 'POST']) !!}


                        <div class="card-content">
                            <div class="card-body">
                                <form class="form">
                                    <div class="row">
                                        <div class="col-md-6 col-12">

                                            <b> <label for="first-name-column">Nome do Órgão/Secretaria</label> </b>
                                            {!! Form::text('Nome', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                                        </div>


                                        <div class="col-md-6 col-12">
                                            <label for="first-name-column">Cidade</label>
                                            <select name="cidade_id" id="cidade_id" class="form-control">
                                                <option value="" disabled> Selecione a Cidade
                                                </option>
                                                @foreach ($cidade as $cidades)
                                                    <option value="{{ $cidades->id }}">{{ $cidades->Nome }}
                                                        </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <b> <label for="first-name-column">Sigla</label> </b>
                                            {!! Form::text('Sigla', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <b> <label for="first-name-column">Endereco</label> </b>
                                            {!! Form::text('Endereco', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <b> <label for="first-name-column">Cep</label> </b>
                                            {!! Form::text('Cep', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <b> <label for="first-name-column">Mapa do Google</label> </b>
                                            {!! Form::text('Mapa_Google', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <b> <label for="first-name-column">Email</label> </b>
                                            {!! Form::text('Email', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <b> <label for="first-name-column">Horario de funcionamento</label> </b>
                                            {!! Form::text('Horario_funcionamento', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <b> <label for="first-name-column">Site</label> </b>
                                            {!! Form::text('Site', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <b> <label for="first-name-column">Outras informações</label> </b>
                                            {!! Form::text('Outras_info', null, ['placeholder' => '', 'class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <b> <label for="first-name-column">Imagem</label> </b>
                                            {!! Form::text('image', null, ['placeholder' => '', 'class' => 'form-control']) !!}
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
