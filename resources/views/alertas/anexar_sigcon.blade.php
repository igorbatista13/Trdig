
@if ($n_processo->Status == 'FINALIZADO')
    <div class="col-md-12">
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
                        <label>Anexo I: cadastro de Órgãos
                            ou
                            Entidades Dirigentes </label>
                        @if ($n_processo->Anexo_sigcon && $n_processo->Anexo_sigcon->anexo1 == '')
                            <span class="badge bg-danger custom-badge position-absolute">
                                <i class="bi bi-x-circle me-1 text-light">
                                    Não enviado </i>
                            </span>
                        @else
                            <span class="badge bg-success custom-badge position-absolute">
                                <i class="bi bi-check-circle me-1 text-light">
                                    Enviado </i>
                            </span>
                        @endif
                        {!! Form::file('anexo1', ['class' => 'form-control']) !!}

                        <label> Anexo II: Dados do
                            Projeto</label>
                        @if ($n_processo->anexo_sigcon && $n_processo->anexo_sigcon->anexo2 == '')
                            <span class="badge bg-danger custom-badge position-absolute">
                                <i class="bi bi-x-circle me-1 text-light">
                                    Não enviado </i>
                            </span>
                        @else
                            <span class="badge bg-success custom-badge position-absolute">
                                <i class="bi bi-check-circle me-1 text-light">
                                    Enviado </i>
                            </span>
                        @endif
                        {!! Form::file('anexo2', ['class' => 'form-control']) !!}


                        <label> Anexo III: Cronograma de
                            Execução Física de Plano de
                            Aplicação de Recursos</label>
                        @if ($n_processo->anexo_sigcon && $n_processo->anexo_sigcon->anexo3 == '')
                            <span class="badge bg-danger custom-badge position-absolute">
                                <i class="bi bi-x-circle me-1 text-light">
                                    Não enviado </i>
                            </span>
                        @else
                            <span class="badge bg-success custom-badge position-absolute">
                                <i class="bi bi-check-circle me-1 text-light">
                                    Enviado </i>
                            </span>
                        @endif
                        {!! Form::file('anexo3', ['class' => 'form-control']) !!}


                        <label> Anexo IV: Cronograma de
                            Desembolso</label>
                        @if ($n_processo->anexo_sigcon && $n_processo->anexo_sigcon->anexo4 == '')
                            <span class="badge bg-danger custom-badge position-absolute">
                                <i class="bi bi-x-circle me-1 text-light">
                                    Não enviado </i>
                            </span>
                        @else
                            <span class="badge bg-success custom-badge position-absolute">
                                <i class="bi bi-check-circle me-1 text-light">
                                    Enviado </i>
                            </span>
                        @endif
                        {!! Form::file('anexo4', ['class' => 'form-control']) !!}


                        <label> Anexo V: Relação de
                            Equipamentos
                            e Material Permanente</label>
                        @if ($n_processo->anexo_sigcon && $n_processo->anexo_sigcon->anexo5 == '')
                            <span class="badge bg-danger custom-badge position-absolute">
                                <i class="bi bi-x-circle me-1 text-light">
                                    Não enviado </i>
                            </span>
                        @else
                            <span class="badge bg-success custom-badge position-absolute">
                                <i class="bi bi-check-circle me-1 text-light">
                                    Enviado </i>
                            </span>
                        @endif
                        {!! Form::file('anexo5', ['class' => 'form-control']) !!}

                        <br>
                        <button type="submit" class="btn btn-primary">
                            Enviar
                            Anexos</button>
                        {!! Form::close() !!}

            </div>
        </div>
    </div>
@endif
