{!! Form::close() !!}

  <div class="tab-pane fade" id="list-projeto" role="tabpanel" aria-labelledby="list-projeto-list">
       <div class="card">
           <div class="card-body">
               <h5 class="card-title"> <b> <big> 6. </b> </big> Identificação do Projeto </h5>
               {!! Form::model($n_processo, [
                'method' => 'PUT',
                'route' => ['trdigital.update_id_projeto', $n_processo->id],
                'enctype' => 'multipart/form-data',
            ]) !!}

            @if (auth()->check())
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            @endif

            <input type="hidden" name="Orgao_Concedente" id="Orgao_Concedente"
                value="{{ $n_processo->Orgao_Concedente }}">
               <!-- General Form Elements -->
               <label for="inputText" class="col-sm-2 col-form-label"> <b> Título: </b> </label>

               <div class="col-sm-6">
                   <div class="form-floating">

                       @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Titulo_Projeto_Conteudo_sit == 1)
                           {!! Form::text('Titulo_Projeto_Conteudo', $n_processo->Projeto_conteudo->Titulo_Projeto_Conteudo, [
                               'class' => 'form-control',
                               'id' => 'floatingName',
                               'readonly' => 'readonly', // Adiciona o atributo 'readonly'
                           ]) !!}
                       @else
                           {!! Form::text('Titulo_Projeto_Conteudo', $n_processo->Projeto_conteudo->Titulo_Projeto_Conteudo, [
                               'class' => 'form-control',
                               'id' => 'floatingName',
                           ]) !!}
                       @endif

                       @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Titulo_Projeto_Conteudo_sit == '')
                       @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Titulo_Projeto_Conteudo_sit == 1)
                           <span class="badge bg-success">
                               <i class="bi bi-check-circle me-1"></i> Validado</span>
                       @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Titulo_Projeto_Conteudo_sit == 0)
                           <span class="badge bg-warning text-dark">
                               <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                       @endif
                   </div>


               </div>



               <label for="inputNumber" class="col-sm-2 col-form-label"> <b> Objeto:</b></label>
               <div class="col-sm-10">
                       @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Objeto_Projeto_Conteudo_sit == 1)
                           {!! Form::textarea('Objeto_Projeto_Conteudo', $n_processo->Projeto_conteudo->Objeto_Projeto_Conteudo, [
                               'class' => 'form-control',
                               'id' => 'floatingName',
                               'readonly' => 'readonly', // Adiciona o atributo 'readonly'
                           ]) !!}
                              {!! Form::textarea(
                                'Obj_especifico_Projeto_Conteudo',
                                $n_processo->Projeto_conteudo->Obj_especifico_Projeto_Conteudo,
                                [
                                    'class' => 'form-control',
                                    'id' => 'floatingTextarea',
                                    'readonly' => 'readonly', // Adiciona o atributo 'readonly'
                                ],
                            ) !!}
                           
                       @else
                           {!! Form::textarea('Objeto_Projeto_Conteudo', $n_processo->Projeto_conteudo->Objeto_Projeto_Conteudo, [
                               'class' => 'form-control',
                               'id' => 'floatingName',
                           ]) !!}
                       @endif

                       @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Objeto_Projeto_Conteudo_sit == '')
                       @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Objeto_Projeto_Conteudo_sit == 1)
                           <span class="badge bg-success">
                               <i class="bi bi-check-circle me-1"></i> Validado</span>
                       @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Objeto_Projeto_Conteudo_sit == 0)
                           <span class="badge bg-warning text-dark">
                               <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                       @endif
                   </div>



               <label for="inputNumber" class="col-sm-2 col-form-label"><b> Objetivo Geral: </b></label>
               <div class="col-sm-10">
                       @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Obj_Geral_Projeto_Conteudo_sit == 1)
                           {!! Form::textarea('Obj_Geral_Projeto_Conteudo', $n_processo->Projeto_conteudo->Obj_Geral_Projeto_Conteudo, [
                               'class' => 'form-control',
                               'id' => 'floatingTextarea',
                               'readonly' => 'readonly', // Adiciona o atributo 'readonly'
                           ]) !!}
                       @else
                           {!! Form::textarea('Obj_Geral_Projeto_Conteudo', $n_processo->Projeto_conteudo->Obj_Geral_Projeto_Conteudo, [
                               'class' => 'form-control',
                               'id' => 'floatingTextarea',
                           ]) !!}
                       @endif

                       @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Obj_Geral_Projeto_Conteudo_sit == '')
                       @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Obj_Geral_Projeto_Conteudo_sit == 1)
                           <span class="badge bg-success">
                               <i class="bi bi-check-circle me-1"></i> Validado</span>
                       @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Obj_Geral_Projeto_Conteudo_sit == 0)
                           <span class="badge bg-warning text-dark">
                               <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                       @endif
               </div>

               {{-- <p class="small"> <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dica1">
                  Ver Dica ?
                </button> </p> --}}

               <label for="inputNumber" class="col-sm-2 col-form-label"><b> Objetivo específico: </b></label>
               <div class="col-sm-10">

                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Obj_especifico_Projeto_Conteudo_sit == 1)
                       {!! Form::textarea(
                           'Obj_especifico_Projeto_Conteudo',
                           $n_processo->Projeto_conteudo->Obj_especifico_Projeto_Conteudo,
                           [
                               'class' => 'form-control',
                               'id' => 'floatingTextarea',
                               'readonly' => 'readonly', // Adiciona o atributo 'readonly'
                           ],
                       ) !!}
                   @else
                       {!! Form::textarea(
                           'Obj_especifico_Projeto_Conteudo',
                           $n_processo->Projeto_conteudo->Obj_especifico_Projeto_Conteudo,
                           ['class' => 'form-control', 'id' => 'floatingTextarea'],
                       ) !!}
                   @endif
                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Obj_especifico_Projeto_Conteudo_sit == '')
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Obj_especifico_Projeto_Conteudo_sit == 1)
                       <span class="badge bg-success">
                           <i class="bi bi-check-circle me-1"></i> Validado</span>
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Obj_especifico_Projeto_Conteudo_sit == 0)
                       <span class="badge bg-warning text-dark">
                           <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                   @endif
               </div>

               <label for="inputNumber" class="col-sm-2 col-form-label"><b> Justificativa:</b> </label>
               <div class="col-sm-10">
                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Justificativa_Projeto_Conteudo_sit == 1)
                       {!! Form::textarea(
                           'Justificativa_Projeto_Conteudo',
                           $n_processo->Projeto_conteudo->Justificativa_Projeto_Conteudo,
                           [
                               'class' => 'form-control',
                               'id' => 'floatingTextarea',
                               'readonly' => 'readonly', // Adiciona o atributo 'readonly'
                           ],
                       ) !!}
                   @else
                       {!! Form::textarea(
                           'Justificativa_Projeto_Conteudo',
                           $n_processo->Projeto_conteudo->Justificativa_Projeto_Conteudo,
                           ['class' => 'form-control', 'id' => 'floatingTextarea'],
                       ) !!}
                   @endif
                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Justificativa_Projeto_Conteudo_sit == '')
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Justificativa_Projeto_Conteudo_sit == 1)
                       <span class="badge bg-success">
                           <i class="bi bi-check-circle me-1"></i> Validado</span>
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Justificativa_Projeto_Conteudo_sit == 0)
                       <span class="badge bg-warning text-dark">
                           <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                   @endif
               </div>

               <label for="inputNumber" class="col-sm-2 col-form-label"><b>Contextualização: </b> </label>
               <div class="col-sm-10">
                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Contextualizacao_Projeto_Conteudo_sit == 1)
                       {!! Form::textarea(
                           'Contextualizacao_Projeto_Conteudo',
                           $n_processo->Projeto_conteudo->Contextualizacao_Projeto_Conteudo,
                           [
                               'class' => 'form-control',
                               'id' => 'floatingTextarea',
                               'readonly' => 'readonly', // Adiciona o atributo 'readonly'
                           ],
                       ) !!}
                   @else
                       {!! Form::textarea(
                           'Contextualizacao_Projeto_Conteudo',
                           $n_processo->Projeto_conteudo->Contextualizacao_Projeto_Conteudo,
                           ['class' => 'form-control', 'id' => 'floatingTextarea'],
                       ) !!}
                   @endif
                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Contextualizacao_Projeto_Conteudo_sit == '')
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Contextualizacao_Projeto_Conteudo_sit == 1)
                       <span class="badge bg-success">
                           <i class="bi bi-check-circle me-1"></i> Validado</span>
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Contextualizacao_Projeto_Conteudo_sit == 0)
                       <span class="badge bg-warning text-dark">
                           <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                   @endif

               </div>

               <label for="inputNumber" class="col-sm-2 col-form-label"><b>Diagnóstico: </b> </label>
               <div class="col-sm-10">

                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Diagnostico_Projeto_Conteudo_sit == 1)
                       {!! Form::textarea('Diagnostico_Projeto_Conteudo', $n_processo->Projeto_conteudo->Diagnostico_Projeto_Conteudo, [
                           'class' => 'form-control',
                           'id' => 'floatingTextarea',
                           'readonly' => 'readonly', // Adiciona o atributo 'readonly'
                       ]) !!}
                   @else
                       {!! Form::textarea('Diagnostico_Projeto_Conteudo', $n_processo->Projeto_conteudo->Diagnostico_Projeto_Conteudo, [
                           'class' => 'form-control',
                           'id' => 'floatingTextarea',
                       ]) !!}
                   @endif


                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Diagnostico_Projeto_Conteudo_sit == '')
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Diagnostico_Projeto_Conteudo_sit == 1)
                       <span class="badge bg-success">
                           <i class="bi bi-check-circle me-1"></i> Validado</span>
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Diagnostico_Projeto_Conteudo_sit == 0)
                       <span class="badge bg-warning text-dark">
                           <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                   @endif

               </div>


               <label for="inputNumber" class="col-sm-2 col-form-label"> <b>Importância do Projeto:</b></label>
               <div class="col-sm-10">
                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Importancia_Projeto_Conteudo_sit == 1)
                       {!! Form::textarea('Importancia_Projeto_Conteudo', $n_processo->Projeto_conteudo->Importancia_Projeto_Conteudo, [
                           'class' => 'form-control',
                           'id' => 'floatingTextarea',
                           'readonly' => 'readonly', // Adiciona o atributo 'readonly'
                       ]) !!}
                   @else
                       {!! Form::textarea('Importancia_Projeto_Conteudo', $n_processo->Projeto_conteudo->Importancia_Projeto_Conteudo, [
                           'class' => 'form-control',
                           'id' => 'floatingTextarea',
                       ]) !!}
                   @endif

                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Importancia_Projeto_Conteudo_sit == '')
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Importancia_Projeto_Conteudo_sit == 1)
                       <span class="badge bg-success">
                           <i class="bi bi-check-circle me-1"></i> Validado</span>
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Importancia_Projeto_Conteudo_sit == 0)
                       <span class="badge bg-warning text-dark">
                           <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                   @endif
               </div>


               <label for="inputNumber" class="col-sm-4 col-form-label"><b>Caracterização dos Interesses Recíprocos
                       entre o Proponente/Estado:</b></label>
               <div class="col-sm-10">
                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Caracterizacao_Projeto_Conteudo_sit == 1)
                       {!! Form::textarea(
                           'Caracterizacao_Projeto_Conteudo',
                           $n_processo->Projeto_conteudo->Caracterizacao_Projeto_Conteudo,
                           [
                               'class' => 'form-control',
                               'id' => 'floatingTextarea',
                               'readonly' => 'readonly', // Adiciona o atributo 'readonly'
                           ],
                       ) !!}
                   @else
                       {!! Form::textarea(
                           'Caracterizacao_Projeto_Conteudo',
                           $n_processo->Projeto_conteudo->Caracterizacao_Projeto_Conteudo,
                           ['class' => 'form-control', 'id' => 'floatingTextarea'],
                       ) !!}
                   @endif
                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Caracterizacao_Projeto_Conteudo_sit == '')
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Caracterizacao_Projeto_Conteudo_sit == 1)
                       <span class="badge bg-success">
                           <i class="bi bi-check-circle me-1"></i> Validado</span>
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Caracterizacao_Projeto_Conteudo_sit == 0)
                       <span class="badge bg-warning text-dark">
                           <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                   @endif
               </div>


               <label for="inputNumber" class="col-sm-2 col-form-label"><b>Público alvo Interno</b></label>
               <div class="col-sm-10">
                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Publico_Alvo_Interno_Projeto_Conteudo_sit == 1)
                       {!! Form::textarea(
                           'Publico_Alvo_Interno_Projeto_Conteudo',
                           $n_processo->Projeto_conteudo->Publico_Alvo_Interno_Projeto_Conteudo,
                           [
                               'class' => 'form-control',
                               'id' => 'floatingTextarea',
                               'readonly' => 'readonly', // Adiciona o atributo 'readonly'
                           ],
                       ) !!}
                   @else
                       {!! Form::textarea(
                           'Publico_Alvo_Interno_Projeto_Conteudo',
                           $n_processo->Projeto_conteudo->Publico_Alvo_Interno_Projeto_Conteudo,
                           ['class' => 'form-control', 'id' => 'floatingTextarea'],
                       ) !!}
                   @endif
                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Publico_Alvo_Interno_Projeto_Conteudo_sit == '')
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Publico_Alvo_Interno_Projeto_Conteudo_sit == 1)
                       <span class="badge bg-success">
                           <i class="bi bi-check-circle me-1"></i> Validado</span>
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Publico_Alvo_Interno_Projeto_Conteudo_sit == 0)
                       <span class="badge bg-warning text-dark">
                           <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                   @endif
               </div>


               <label for="inputNumber" class="col-sm-2 col-form-label"><b>Público alvo Externo</b></label>
               <div class="col-sm-10">

                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Publico_Alvo_Externo_Projeto_Conteudo_sit == 1)
                       {!! Form::textarea(
                           'Publico_Alvo_Externo_Projeto_Conteudo',
                           $n_processo->Projeto_conteudo->Publico_Alvo_Externo_Projeto_Conteudo,
                           [
                               'class' => 'form-control',
                               'id' => 'floatingTextarea',
                               'readonly' => 'readonly', // Adiciona o atributo 'readonly'
                           ],
                       ) !!}
                   @else
                       {!! Form::textarea(
                           'Publico_Alvo_Externo_Projeto_Conteudo',
                           $n_processo->Projeto_conteudo->Publico_Alvo_Externo_Projeto_Conteudo,
                           [
                               'class' => 'form-control',
                               'id' => 'floatingTextarea',
                           ],
                       ) !!}
                   @endif
                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Publico_Alvo_Externo_Projeto_Conteudo_sit == '')
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Publico_Alvo_Externo_Projeto_Conteudo_sit == 1)
                       <span class="badge bg-success">
                           <i class="bi bi-check-circle me-1"></i> Validado</span>
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Publico_Alvo_Externo_Projeto_Conteudo_sit == 0)
                       <span class="badge bg-warning text-dark">
                           <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                   @endif
               </div>

               <label for="inputNumber" class="col-sm-2 col-form-label"><b>Problemas a serem resolvidos</b></label>
               <div class="col-sm-10">
                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Problemas_Projeto_Conteudo_sit == 1)
                       {!! Form::textarea('Problemas_Projeto_Conteudo', $n_processo->Projeto_conteudo->Problemas_Projeto_Conteudo, [
                           'class' => 'form-control',
                           'id' => 'floatingTextarea',
                           'readonly' => 'readonly', // Adiciona o atributo 'readonly'
                       ]) !!}
                   @else
                       {!! Form::textarea('Problemas_Projeto_Conteudo', $n_processo->Projeto_conteudo->Problemas_Projeto_Conteudo, [
                           'class' => 'form-control',
                           'id' => 'floatingTextarea',
                       ]) !!}
                   @endif

                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Problemas_Projeto_Conteudo_sit == '')
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Problemas_Projeto_Conteudo_sit == 1)
                       <span class="badge bg-success">
                           <i class="bi bi-check-circle me-1"></i> Validado</span>
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Problemas_Projeto_Conteudo_sit == 0)
                       <span class="badge bg-warning text-dark">
                           <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                   @endif
               </div>
               <label for="inputNumber" class="col-sm-2 col-form-label"><b>Resultados esperados</b></label>
               <div class="col-sm-10">

                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Resultados_Projeto_Conteudo_sit == 1)
                       {!! Form::textarea('Resultados_Projeto_Conteudo', $n_processo->Projeto_conteudo->Resultados_Projeto_Conteudo, [
                           'class' => 'form-control',
                           'id' => 'floatingTextarea',
                           'readonly' => 'readonly', // Adiciona o atributo 'readonly'
                       ]) !!}
                   @else
                       {!! Form::textarea('Resultados_Projeto_Conteudo', $n_processo->Projeto_conteudo->Resultados_Projeto_Conteudo, [
                           'class' => 'form-control',
                           'id' => 'floatingTextarea',
                       ]) !!}
                   @endif
                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Resultados_Projeto_Conteudo_sit == '')
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Resultados_Projeto_Conteudo_sit == 1)
                       <span class="badge bg-success">
                           <i class="bi bi-check-circle me-1"></i> Validado</span>
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Resultados_Projeto_Conteudo_sit == 0)
                       <span class="badge bg-warning text-dark">
                           <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                   @endif
               </div>
               <br>
               <div class="row">

                   <div class="col-sm-4">
                       <label for="inputNumber" class=""><b>Início:</b></label>
                       @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Inicio_Projeto_Conteudo_sit == 1)
                           {!! Form::date('Inicio_Projeto_Conteudo', $n_processo->Projeto_conteudo->Inicio_Projeto_Conteudo, [
                               'class' => 'form-control',
                               'id' => 'floatingTextarea',
                               'readonly' => 'readonly', // Adiciona o atributo 'readonly'
                           ]) !!}
                       @else
                           {!! Form::date('Inicio_Projeto_Conteudo', $n_processo->Projeto_conteudo->Inicio_Projeto_Conteudo, [
                               'class' => 'form-control',
                               'id' => 'floatingTextarea',
                           ]) !!}
                       @endif

                       @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Inicio_Projeto_Conteudo_sit == '')
                       @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Inicio_Projeto_Conteudo_sit == 1)
                           <span class="badge bg-success">
                               <i class="bi bi-check-circle me-1"></i> Validado</span>
                       @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Inicio_Projeto_Conteudo_sit == 0)
                           <span class="badge bg-warning text-dark">
                               <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                       @endif
                   </div>

                   <div class="col-sm-4">
                       <label for="inputNumber" class=""><b>Término:</b></label>
                       @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Fim_Projeto_Conteudo_sit == 1)
                           {!! Form::date('Fim_Projeto_Conteudo', $n_processo->Projeto_conteudo->Fim_Projeto_Conteudo, [
                               'class' => 'form-control',
                               'id' => 'floatingTextarea',
                               'readonly' => 'readonly', // Adiciona o atributo 'readonly'
                           ]) !!}
                       @else
                           {!! Form::date('Fim_Projeto_Conteudo', $n_processo->Projeto_conteudo->Fim_Projeto_Conteudo, [
                               'class' => 'form-control',
                               'id' => 'floatingTextarea',
                           ]) !!}
                       @endif

                       @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Fim_Projeto_Conteudo_sit == '')
                       @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Fim_Projeto_Conteudo_sit == 1)
                           <span class="badge bg-success">
                               <i class="bi bi-check-circle me-1"></i> Validado</span>
                       @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Fim_Projeto_Conteudo_sit == 0)
                           <span class="badge bg-warning text-dark">
                               <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                       @endif
                   </div>
               </div>



               <label for="inputNumber" class="col-sm-2 col-form-label"><b>Informa n° da Emenda
                       Parlamentar:</b></label>
               <div class="col-sm-10">

                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->N_Emenda_Projeto_Conteudo_sit == 1)
                       {!! Form::text('N_Emenda_Projeto_Conteudo', $n_processo->Projeto_conteudo->N_Emenda_Projeto_Conteudo, [
                           'class' => 'form-control',
                           'id' => 'floatingTextarea',
                           'readonly' => 'readonly', // Adiciona o atributo 'readonly'
                       ]) !!}
                   @else
                       {!! Form::text('N_Emenda_Projeto_Conteudo', $n_processo->Projeto_conteudo->N_Emenda_Projeto_Conteudo, [
                           'class' => 'form-control',
                           'id' => 'floatingTextarea',
                       ]) !!}
                   @endif


                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->N_Emenda_Projeto_Conteudo_sit == '')
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->N_Emenda_Projeto_Conteudo_sit == 1)
                       <span class="badge bg-success">
                           <i class="bi bi-check-circle me-1"></i> Validado</span>
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->N_Emenda_Projeto_Conteudo_sit == 0)
                       <span class="badge bg-warning text-dark">
                           <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                   @endif
               </div>

               <label for="inputNumber" class="col-sm-4 col-form-label"><b>Informa nome do Autor da Emenda
                       Parlamentar:</b></label>
               <div class="col-sm-10">
                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Nome_Autor_Emenda_Projeto_Conteudo_sit == 1)
                       {!! Form::text(
                           'Nome_Autor_Emenda_Projeto_Conteudo',
                           $n_processo->Projeto_conteudo->Nome_Autor_Emenda_Projeto_Conteudo,
                           [
                               'class' => 'form-control',
                               'id' => 'floatingTextarea',
                               'readonly' => 'readonly', // Adiciona o atributo 'readonly'
                           ],
                       ) !!}
                   @else
                       {!! Form::text(
                           'Nome_Autor_Emenda_Projeto_Conteudo',
                           $n_processo->Projeto_conteudo->Nome_Autor_Emenda_Projeto_Conteudo,
                           ['class' => 'form-control', 'id' => 'floatingTextarea'],
                       ) !!}
                   @endif
                   @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Nome_Autor_Emenda_Projeto_Conteudo_sit == '')
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Nome_Autor_Emenda_Projeto_Conteudo_sit == 1)
                       <span class="badge bg-success">
                           <i class="bi bi-check-circle me-1"></i> Validado</span>
                   @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Nome_Autor_Emenda_Projeto_Conteudo_sit == 0)
                       <span class="badge bg-warning text-dark">
                           <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                   @endif
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
                           ]) !!}
                       </div>
                       @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Valor_Repasse_Projeto_Conteudo_sit == '')
                       @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Valor_Repasse_Projeto_Conteudo_sit == 1)
                           <span class="badge bg-success">
                               <i class="bi bi-check-circle me-1"></i> Validado</span>
                       @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Valor_Repasse_Projeto_Conteudo_sit == 0)
                           <span class="badge bg-warning text-dark">
                               <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                       @endif
                   </div>

                   <label for="inputNumber" class="col-sm-2 col-form-label"><b>Valor de Contrapartida: </b> </label>
                   <div class="col-sm-4">
                       <div class="input-group mb-3">
                           <span class="input-group-text" id="basic-addon1">R$</span>

                           @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Valor_Contrapartida_Projeto_Conteudo_sit == 1)
                               {!! Form::text(
                                   'Valor_Contrapartida_Projeto_Conteudo',
                                   $n_processo->Projeto_conteudo->Valor_Contrapartida_Projeto_Conteudo,
                                   [
                                       'class' => 'form-control',
                                       'maxlength' => '15',
                                       'oninput' => 'aplicarMascara(this)',
                                       'readonly' => 'readonly', // Adiciona o atributo 'readonly'
                                   ],
                               ) !!}
                           @else
                               {!! Form::text(
                                   'Valor_Contrapartida_Projeto_Conteudo',
                                   $n_processo->Projeto_conteudo->Valor_Contrapartida_Projeto_Conteudo,
                                   [
                                       'class' => 'form-control',
                                       'maxlength' => '15',
                                       'oninput' => 'aplicarMascara(this)',
                                   ],
                               ) !!}
                           @endif
                       </div>
                       @if ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Valor_Contrapartida_Projeto_Conteudo_sit == '')
                       @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Valor_Contrapartida_Projeto_Conteudo_sit == 1)
                           <span class="badge bg-success">
                               <i class="bi bi-check-circle me-1"></i> Validado</span>
                       @elseif ($n_processo->Projeto_conteudo && $n_processo->Projeto_conteudo->Valor_Contrapartida_Projeto_Conteudo_sit == 0)
                           <span class="badge bg-warning text-dark">
                               <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                       @endif
                   </div>
               </div>

               <button type="submit" class="btn btn-primary">Enviar</button>


               <!-- End General Form Elements -->

           </div>
       </div>
       {!! Form::close() !!}

   </div>
