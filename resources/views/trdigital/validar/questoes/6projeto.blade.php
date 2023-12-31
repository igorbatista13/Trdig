<div class="tab-pane fade" id="list-projeto" role="tabpanel" aria-labelledby="list-projeto-list">
    <div class="card">
        <div class="card-body">

            <h5 class="card-title"> <b> <big> 6. </b> </big> Identificação do Projeto </h5>
            {!! Form::open([
                'url' => route('trdigital.validar.projeto', ['id' => $n_processo->Projeto_conteudo->id]),
                'method' => 'post',
            ]) !!}


            <!-- General Form Elements -->
            <label for="inputText" class="col-sm-2 col-form-label"> <b> Título: </b> </label>

            <div class="col-sm-10">
                <div class="form-floating">
                    {!! Form::text('Titulo_Projeto_Conteudo', $n_processo->Projeto_conteudo->Titulo_Projeto_Conteudo, [
                        'class' => 'form-control',
                        'id' => 'floatingName',
                        'disabled' => 'disabled',
                    ]) !!}

                </div>
                {!! Form::radio(
                    'Titulo_Projeto_Conteudo_sit',
                    '1',
                    $n_processo->Projeto_conteudo->Titulo_Projeto_Conteudo_sit == 1,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios1',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios1">
                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                        Validado</span>
                </label>

                {!! Form::radio(
                    'Titulo_Projeto_Conteudo_sit',
                    '0',
                    $n_processo->Projeto_conteudo->Titulo_Projeto_Conteudo_sit == 0,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios2',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios2">
                    <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                        Corrigir</span>
                </label>

            </div>


            <label for="inputNumber" class="col-sm-2 col-form-label"> <b> Objeto:</b></label>
            <div class="col-sm-10">
                <div class="form-floating">
                    {!! Form::text('Objeto_Projeto_Conteudo', $n_processo->Projeto_conteudo->Objeto_Projeto_Conteudo, [
                        'class' => 'form-control',
                        'id' => 'floatingName',
                        'disabled' => 'disabled',
                    ]) !!}

                </div>
                {!! Form::radio(
                    'Objeto_Projeto_Conteudo_sit',
                    '1',
                    $n_processo->Projeto_conteudo->Objeto_Projeto_Conteudo_sit == 1,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios1',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios1">
                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                        Validado</span>
                </label>

                {!! Form::radio(
                    'Objeto_Projeto_Conteudo_sit',
                    '0',
                    $n_processo->Projeto_conteudo->Objeto_Projeto_Conteudo_sit == 0,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios2',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios2">
                    <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                        Corrigir</span>
                </label>

            </div>

            <label for="inputNumber" class="col-sm-2 col-form-label"><b> Objetivo Geral: </b></label>
            <div class="col-sm-10">
                <div class="form-floating">
                    {!! Form::text('Obj_Geral_Projeto_Conteudo', $n_processo->Projeto_conteudo->Obj_Geral_Projeto_Conteudo, [
                        'class' => 'form-control',
                        'id' => 'floatingName',
                        'disabled' => 'disabled',
                    ]) !!}

                </div>
                {!! Form::radio(
                    'Obj_Geral_Projeto_Conteudo_sit',
                    '1',
                    $n_processo->Projeto_conteudo->Obj_Geral_Projeto_Conteudo_sit == 1,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios1',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios1">
                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                        Validado</span>
                </label>

                {!! Form::radio(
                    'Obj_Geral_Projeto_Conteudo_sit',
                    '0',
                    $n_processo->Projeto_conteudo->Obj_Geral_Projeto_Conteudo_sit == 0,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios2',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios2">
                    <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                        Corrigir</span>
                </label>
            </div>

            <label for="inputNumber" class="col-sm-2 col-form-label"><b> Objetivo específico: </b></label>
            <div class="col-sm-10">
                <div class="form-floating">

                {!! Form::textarea(
                    'Obj_especifico_Projeto_Conteudo',
                    $n_processo->Projeto_conteudo->Obj_especifico_Projeto_Conteudo,
                    ['class' => 'form-control', 'id' => 'floatingTextarea', 'disabled' => 'disabled'],
                ) !!}
                </div>
            
            {!! Form::radio(
                'Obj_especifico_Projeto_Conteudo_sit',
                '1',
                $n_processo->Projeto_conteudo->Obj_especifico_Projeto_Conteudo_sit == 1,
                [
                    'class' => 'form-check-input',
                    'id' => 'gridRadios1',
                ],
            ) !!}
            <label class="form-check-label" for="gridRadios1">
                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                    Validado</span>
            </label>

            {!! Form::radio(
                'Obj_especifico_Projeto_Conteudo_sit',
                '0',
                $n_processo->Projeto_conteudo->Obj_especifico_Projeto_Conteudo_sit == 0,
                [
                    'class' => 'form-check-input',
                    'id' => 'gridRadios2',
                ],
            ) !!}
            <label class="form-check-label" for="gridRadios2">
                <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                    Corrigir</span>
            </label>
        </div>
            <label for="inputNumber" class="col-sm-2 col-form-label"><b> Justificativa:</b> </label>
            <div class="col-sm-10">
                <div class="form-floating">

                {!! Form::textarea(
                    'Justificativa_Projeto_Conteudo',
                    $n_processo->Projeto_conteudo->Justificativa_Projeto_Conteudo,
                    ['class' => 'form-control', 'id' => 'floatingTextarea', 'disabled' => 'disabled'],
                ) !!}

            </div>

            {!! Form::radio(
                'Justificativa_Projeto_Conteudo_sit',
                '1',
                $n_processo->Projeto_conteudo->Justificativa_Projeto_Conteudo_sit == 1,
                [
                    'class' => 'form-check-input',
                    'id' => 'gridRadios1',
                ],
            ) !!}
            <label class="form-check-label" for="gridRadios1">
                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                    Validado</span>
            </label>

            {!! Form::radio(
                'Justificativa_Projeto_Conteudo_sit',
                '0',
                $n_processo->Projeto_conteudo->Justificativa_Projeto_Conteudo_sit == 0,
                [
                    'class' => 'form-check-input',
                    'id' => 'gridRadios2',
                ],
            ) !!}
            <label class="form-check-label" for="gridRadios2">
                <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                    Corrigir</span>
            </label>
            </div>

            <label for="inputNumber" class="col-sm-2 col-form-label"><b>Contextualização: </b> </label>
            <div class="col-sm-10">
                <div class="form-floating">

                {!! Form::textarea(
                    'Contextualizacao_Projeto_Conteudo',
                    $n_processo->Projeto_conteudo->Contextualizacao_Projeto_Conteudo,
                    ['class' => 'form-control', 'id' => 'floatingTextarea', 'disabled' => 'disabled'],
                ) !!}
                </div>
                {!! Form::radio(
                    'Contextualizacao_Projeto_Conteudo_sit',
                    '1',
                    $n_processo->Projeto_conteudo->Contextualizacao_Projeto_Conteudo_sit == 1,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios1',
                    ],
                ) !!}


                <label class="form-check-label" for="gridRadios1">
                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                        Validado</span>
                </label>

                {!! Form::radio(
                    'Contextualizacao_Projeto_Conteudo_sit',
                    '0',
                    $n_processo->Projeto_conteudo->Contextualizacao_Projeto_Conteudo_sit == 0,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios2',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios2">
                    <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                        Corrigir</span>
                </label>

            </div>

            <label for="inputNumber" class="col-sm-2 col-form-label"><b>Diagnóstico: </b> </label>
            <div class="col-sm-10">
                <div class="form-floating">

                {!! Form::textarea('Diagnostico_Projeto_Conteudo', $n_processo->Projeto_conteudo->Diagnostico_Projeto_Conteudo, [
                    'class' => 'form-control',
                    'id' => 'floatingTextarea',
                    'disabled' => 'disabled',
                ]) !!}
                </div>
                {!! Form::radio(
                    'Diagnostico_Projeto_Conteudo_sit',
                    '1',
                    $n_processo->Projeto_conteudo->Diagnostico_Projeto_Conteudo_sit == 1,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios1',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios1">
                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                        Validado</span>
                </label>

                {!! Form::radio(
                    'Diagnostico_Projeto_Conteudo_sit',
                    '0',
                    $n_processo->Projeto_conteudo->Diagnostico_Projeto_Conteudo_sit == 0,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios2',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios2">
                    <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                        Corrigir</span>
                </label>

            </div>


            <label for="inputNumber" class="col-sm-2 col-form-label"> <b>Importância do Projeto:</b></label>
            <div class="col-sm-10">
                <div class="form-floating">

                {!! Form::textarea('Importancia_Projeto_Conteudo', $n_processo->Projeto_conteudo->Importancia_Projeto_Conteudo, [
                    'class' => 'form-control',
                    'id' => 'floatingTextarea',
                    'disabled' => 'disabled',
                ]) !!}
                </div>

                {!! Form::radio(
                    'Importancia_Projeto_Conteudo_sit',
                    '1',
                    $n_processo->Projeto_conteudo->Importancia_Projeto_Conteudo_sit == 1,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios1',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios1">
                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                        Validado</span>
                </label>

                {!! Form::radio(
                    'Importancia_Projeto_Conteudo_sit',
                    '0',
                    $n_processo->Projeto_conteudo->Importancia_Projeto_Conteudo_sit == 0,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios2',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios2">
                    <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                        Corrigir</span>
                </label>

            </div>


            <label for="inputNumber" class="col-sm-4 col-form-label"><b>Caracterização dos Interesses Recíprocos
                    entre o Proponente/Estado:</b></label>
            <div class="col-sm-10">
                <div class="form-floating">

                {!! Form::textarea(
                    'Caracterizacao_Projeto_Conteudo',
                    $n_processo->Projeto_conteudo->Caracterizacao_Projeto_Conteudo,
                    ['class' => 'form-control', 'id' => 'floatingTextarea', 'disabled' => 'disabled'],
                ) !!}
                </div>

                {!! Form::radio(
                    'Caracterizacao_Projeto_Conteudo_sit',
                    '1',
                    $n_processo->Projeto_conteudo->Caracterizacao_Projeto_Conteudo_sit == 1,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios1',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios1">
                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                        Validado</span>
                </label>

                {!! Form::radio(
                    'Caracterizacao_Projeto_Conteudo_sit',
                    '0',
                    $n_processo->Projeto_conteudo->Caracterizacao_Projeto_Conteudo_sit == 0,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios2',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios2">
                    <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                        Corrigir</span>
                </label>

            </div>


            <label for="inputNumber" class="col-sm-2 col-form-label"><b>Público alvo Interno</b></label>
            <div class="col-sm-10">
                <div class="form-floating">

                {!! Form::textarea(
                    'Publico_Alvo_Interno_Projeto_Conteudo',
                    $n_processo->Projeto_conteudo->Publico_Alvo_Interno_Projeto_Conteudo,
                    ['class' => 'form-control', 'id' => 'floatingTextarea', 'disabled' => 'disabled'],
                ) !!}
                
                </div>

                {!! Form::radio(
                    'Publico_Alvo_Interno_Projeto_Conteudo_sit',
                    '1',
                    $n_processo->Projeto_conteudo->Publico_Alvo_Interno_Projeto_Conteudo_sit == 1,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios1',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios1">
                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                        Validado</span>
                </label>

                {!! Form::radio(
                    'Publico_Alvo_Interno_Projeto_Conteudo_sit',
                    '0',
                    $n_processo->Projeto_conteudo->Publico_Alvo_Interno_Projeto_Conteudo_sit == 0,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios2',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios2">
                    <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                        Corrigir</span>
                </label>
            </div>


            <label for="inputNumber" class="col-sm-2 col-form-label"><b>Público alvo Externo</b></label>
            <div class="col-sm-10">
                <div class="form-floating">

                {!! Form::textarea(
                    'Publico_Alvo_Externo_Projeto_Conteudo',
                    $n_processo->Projeto_conteudo->Publico_Alvo_Externo_Projeto_Conteudo,
                    ['class' => 'form-control', 'id' => 'floatingTextarea', 'disabled' => 'disabled'],
                ) !!}
                </div>

                {!! Form::radio(
                    'Publico_Alvo_Externo_Projeto_Conteudo_sit',
                    '1',
                    $n_processo->Projeto_conteudo->Publico_Alvo_Externo_Projeto_Conteudo_sit == 1,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios1',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios1">
                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                        Validado</span>
                </label>

                {!! Form::radio(
                    'Publico_Alvo_Externo_Projeto_Conteudo_sit',
                    '0',
                    $n_processo->Projeto_conteudo->Publico_Alvo_Externo_Projeto_Conteudo_sit == 0,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios2',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios2">
                    <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                        Corrigir</span>
                </label>

            </div>

            <label for="inputNumber" class="col-sm-2 col-form-label"><b>Problemas a serem resolvidos</b></label>
            <div class="col-sm-10">
                <div class="form-floating">

                {!! Form::textarea('Problemas_Projeto_Conteudo', $n_processo->Projeto_conteudo->Problemas_Projeto_Conteudo, [
                    'class' => 'form-control',
                    'id' => 'floatingTextarea',
                    'disabled' => 'disabled',
                ]) !!}
                </div>

                {!! Form::radio(
                    'Problemas_Projeto_Conteudo_sit',
                    '1',
                    $n_processo->Projeto_conteudo->Problemas_Projeto_Conteudo_sit == 1,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios1',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios1">
                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                        Validado</span>
                </label>

                {!! Form::radio(
                    'Problemas_Projeto_Conteudo_sit',
                    '0',
                    $n_processo->Projeto_conteudo->Problemas_Projeto_Conteudo_sit == 0,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios2',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios2">
                    <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                        Corrigir</span>
                </label>

            </div>
            <label for="inputNumber" class="col-sm-2 col-form-label"><b>Resultados esperados</b></label>
            <div class="col-sm-10">
                <div class="form-floating">

                {!! Form::textarea('Resultados_Projeto_Conteudo', $n_processo->Projeto_conteudo->Resultados_Projeto_Conteudo, [
                    'class' => 'form-control',
                    'id' => 'floatingTextarea',
                ]) !!}
                </div>

                {!! Form::radio(
                    'Resultados_Projeto_Conteudo_sit',
                    '1',
                    $n_processo->Projeto_conteudo->Resultados_Projeto_Conteudo_sit == 1,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios1',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios1">
                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                        Validado</span>
                </label>

                {!! Form::radio(
                    'Resultados_Projeto_Conteudo_sit',
                    '0',
                    $n_processo->Projeto_conteudo->Resultados_Projeto_Conteudo_sit == 0,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios2',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios2">
                    <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                        Corrigir</span>
                </label>

            </div>
            <div class="row">

                <div class="col-sm-4">
                    <label for="inputNumber" class=""><b>Início:</b></label>
                    {!! Form::date('Inicio_Projeto_Conteudo', $n_processo->Projeto_conteudo->Inicio_Projeto_Conteudo, [
                        'class' => 'form-control',
                        'id' => 'floatingTextarea',
                        'disabled' => 'disabled',
                    ]) !!}

                    {!! Form::radio(
                        'Inicio_Projeto_Conteudo_sit',
                        '1',
                        $n_processo->Projeto_conteudo->Inicio_Projeto_Conteudo_sit == 1,
                        [
                            'class' => 'form-check-input',
                            'id' => 'gridRadios1',
                        ],
                    ) !!}
                    <label class="form-check-label" for="gridRadios1">
                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                            Validado</span>
                    </label>

                    {!! Form::radio(
                        'Inicio_Projeto_Conteudo_sit',
                        '0',
                        $n_processo->Projeto_conteudo->Inicio_Projeto_Conteudo_sit == 0,
                        [
                            'class' => 'form-check-input',
                            'id' => 'gridRadios2',
                        ],
                    ) !!}
                    <label class="form-check-label" for="gridRadios2">
                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                            Corrigir</span>
                    </label>

                </div>

                <div class="col-sm-4">
                    <label for="inputNumber" class=""><b>Término:</b></label>
                    {!! Form::date('Fim_Projeto_Conteudo', $n_processo->Projeto_conteudo->Fim_Projeto_Conteudo, [
                        'class' => 'form-control',
                        'id' => 'floatingTextarea',
                        'disabled' => 'disabled',
                    ]) !!}


                    {!! Form::radio('Fim_Projeto_Conteudo_sit', '1', $n_processo->Projeto_conteudo->Fim_Projeto_Conteudo_sit == 1, [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios1',
                    ]) !!}
                    <label class="form-check-label" for="gridRadios1">
                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                            Validado</span>
                    </label>

                    {!! Form::radio('Fim_Projeto_Conteudo_sit', '0', $n_processo->Projeto_conteudo->Fim_Projeto_Conteudo_sit == 0, [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios2',
                    ]) !!}
                    <label class="form-check-label" for="gridRadios2">
                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                            Corrigir</span>
                    </label>

                </div>
            </div>



            <label for="inputNumber" class="col-sm-2 col-form-label"><b>Informa n° da Emenda
                    Parlamentar:</b></label>
            <div class="col-sm-10">
                <div class="form-floating">

                {!! Form::text('N_Emenda_Projeto_Conteudo', $n_processo->Projeto_conteudo->N_Emenda_Projeto_Conteudo, [
                    'class' => 'form-control',
                    'id' => 'floatingTextarea',
                    'disabled' => 'disabled',
                ]) !!}
                </div>

                {!! Form::radio(
                    'N_Emenda_Projeto_Conteudo_sit',
                    '1',
                    $n_processo->Projeto_conteudo->N_Emenda_Projeto_Conteudo_sit == 1,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios1',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios1">
                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                        Validado</span>
                </label>

                {!! Form::radio(
                    'N_Emenda_Projeto_Conteudo_sit',
                    '0',
                    $n_processo->Projeto_conteudo->N_Emenda_Projeto_Conteudo_sit == 0,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios2',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios2">
                    <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                        Corrigir</span>
                </label>

            </div>

            <label for="inputNumber" class="col-sm-4 col-form-label"><b>Informa nome do Autor da Emenda
                    Parlamentar:</b></label>
            <div class="col-sm-10">
                {!! Form::text(
                    'Nome_Autor_Emenda_Projeto_Conteudo',
                    $n_processo->Projeto_conteudo->Nome_Autor_Emenda_Projeto_Conteudo,
                    ['class' => 'form-control', 'id' => 'floatingTextarea', 'disabled' => 'disabled'],
                ) !!}


                {!! Form::radio(
                    'Nome_Autor_Emenda_Projeto_Conteudo_sit',
                    '1',
                    $n_processo->Projeto_conteudo->Nome_Autor_Emenda_Projeto_Conteudo_sit == 1,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios1',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios1">
                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                        Validado</span>
                </label>

                {!! Form::radio(
                    'Nome_Autor_Emenda_Projeto_Conteudo_sit',
                    '0',
                    $n_processo->Projeto_conteudo->Nome_Autor_Emenda_Projeto_Conteudo_sit == 0,
                    [
                        'class' => 'form-check-input',
                        'id' => 'gridRadios2',
                    ],
                ) !!}
                <label class="form-check-label" for="gridRadios2">
                    <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                        Corrigir</span>
                </label>

            </div>
            <br>
            <div class="row">
                <label for="inputNumber" class="col-sm-2 col-form-label"><b>Valor de Repasse:</b> </label>
                <div class="col-sm-4">
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">R$</span>
                        {!! Form::text('Valor_Repasse_Projeto_Conteudo', $n_processo->Projeto_conteudo->Valor_Repasse_Projeto_Conteudo, [
                            'class' => 'form-control',
                            'maxlength' => '15',
                            'oninput' => 'aplicarMascara(this)',
                            'disabled' => 'disabled',
                        ]) !!}
                    </div>



                    {!! Form::radio(
                        'Valor_Repasse_Projeto_Conteudo_sit',
                        '1',
                        $n_processo->Projeto_conteudo->Valor_Repasse_Projeto_Conteudo_sit == 1,
                        [
                            'class' => 'form-check-input',
                            'id' => 'gridRadios1',
                        ],
                    ) !!}
                    <label class="form-check-label" for="gridRadios1">
                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                            Validado</span>
                    </label>

                    {!! Form::radio(
                        'Valor_Repasse_Projeto_Conteudo_sit',
                        '0',
                        $n_processo->Projeto_conteudo->Valor_Repasse_Projeto_Conteudo_sit == 0,
                        [
                            'class' => 'form-check-input',
                            'id' => 'gridRadios2',
                        ],
                    ) !!}
                    <label class="form-check-label" for="gridRadios2">
                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                            Corrigir</span>
                    </label>

                </div>

                <label for="inputNumber" class="col-sm-2 col-form-label"><b>Valor de Contrapartida: </b> </label>
                <div class="col-sm-4">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">R$</span>

                        {!! Form::text(
                            'Valor_Contrapartida_Projeto_Conteudo',
                            $n_processo->Projeto_conteudo->Valor_Contrapartida_Projeto_Conteudo,
                            [
                                'class' => 'form-control',
                                'maxlength' => '15',
                                'oninput' => 'aplicarMascara(this)',
                                'disabled' => 'disabled',
                            ],
                        ) !!}
                    </div>

                    {!! Form::radio(
                        'Valor_Contrapartida_Projeto_Conteudo_sit',
                        '1',
                        $n_processo->Projeto_conteudo->Valor_Contrapartida_Projeto_Conteudo_sit == 1,
                        [
                            'class' => 'form-check-input',
                            'id' => 'gridRadios1',
                        ],
                    ) !!}
                    <label class="form-check-label" for="gridRadios1">
                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                            Validado</span>
                    </label>

                    {!! Form::radio(
                        'Valor_Contrapartida_Projeto_Conteudo_sit',
                        '0',
                        $n_processo->Projeto_conteudo->Valor_Contrapartida_Projeto_Conteudo_sit == 0,
                        [
                            'class' => 'form-check-input',
                            'id' => 'gridRadios2',
                        ],
                    ) !!}
                    <label class="form-check-label" for="gridRadios2">
                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                            Corrigir</span>
                    </label>

                </div>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>


            <!-- End General Form Elements -->

        </div>
    </div>

</div>
{!! Form::close() !!}
