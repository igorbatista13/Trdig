   <div class="tab-pane fade" id="list-projeto" role="tabpanel" aria-labelledby="list-projeto-list">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title"> <b> <big> 6. </b> </big> Identificação do Projeto </h5>

          <!-- General Form Elements -->
              <label for="inputText" class="col-sm-2 col-form-label"> <b> Título: </b>  </label>
  
              <div class="col-sm-6">
                <div class="form-floating">
                  {!! Form::text('Titulo_Projeto_Conteudo', $n_processo->Projeto_conteudo->Titulo_Projeto_Conteudo, ['class' => 'form-control', 'id'=> 'floatingName']) !!}
                  {{-- {!! Form::text('Nome_Instituicao', $n_processo->instituicao->Nome_Instituicao, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingName']) !!} --}}

                </div>

                {{-- <p class="small"> <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dica1">
                  Ver Dica ?
                </button> </p> --}}
              </div>

            
  
              <label for="inputNumber" class="col-sm-2 col-form-label"> <b> Objeto:</b></label>
              <div class="col-sm-6">
                <div class="form-floating">
                  {!! Form::text('Objeto_Projeto_Conteudo', $n_processo->Projeto_conteudo->Objeto_Projeto_Conteudo, ['class' => 'form-control', 'id'=> 'floatingName']) !!}
                  {{-- {!! Form::text('Nome_Instituicao', $n_processo->instituicao->Nome_Instituicao, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingName']) !!} --}}

                </div>

                {{-- <p class="small"> <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dica1">
                  Ver Dica ?
                </button>  </p> --}}

            </div>
            
            <label for="inputNumber" class="col-sm-2 col-form-label"><b> Objetivo Geral: </b></label>
              <div class="col-sm-10">
                <div class="form-floating">
                  {!! Form::text('Obj_Geral_Projeto_Conteudo', $n_processo->Projeto_conteudo->Obj_Geral_Projeto_Conteudo, ['class' => 'form-control', 'id'=> 'floatingName']) !!}
                  {{-- {!! Form::text('Nome_Instituicao', $n_processo->instituicao->Nome_Instituicao, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingName']) !!} --}}

                </div>
                </div>

                {{-- <p class="small"> <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dica1">
                  Ver Dica ?
                </button> </p> --}}

              <label for="inputNumber" class="col-sm-2 col-form-label"><b> Objetivo específico: </b></label>
              <div class="col-sm-10">
                {!! Form::textarea('Obj_especifico_Projeto_Conteudo', $n_processo->Projeto_conteudo->Obj_especifico_Projeto_Conteudo, ['class' => 'form-control', 'id'=> 'floatingTextarea']) !!}
                {{-- <p class="small"> <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dica1">
                  Ver Dica ?
                </button> </p> --}}
              </div>

              <label for="inputNumber" class="col-sm-2 col-form-label"><b> Justificativa:</b> </label>
              <div class="col-sm-10">
                {!! Form::textarea('Justificativa_Projeto_Conteudo', $n_processo->Projeto_conteudo->Justificativa_Projeto_Conteudo, ['class' => 'form-control', 'id'=> 'floatingTextarea']) !!}
                {{-- <p class="small"> <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dica1">
                  Ver Dica ?
                </button> </p> --}}
              </div>

              <label for="inputNumber" class="col-sm-2 col-form-label"><b>Contextualização: </b> </label>
              <div class="col-sm-10">
                {!! Form::textarea('Contextualizacao_Projeto_Conteudo', $n_processo->Projeto_conteudo->Contextualizacao_Projeto_Conteudo, ['class' => 'form-control', 'id'=> 'floatingTextarea']) !!}
                {{-- <p class="small"> <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dica1">
                  Ver Dica ?
                </button> </p> --}}

              </div>

              <label for="inputNumber" class="col-sm-2 col-form-label"><b>Diagnóstico: </b> </label>
              <div class="col-sm-10">
                {!! Form::textarea('Diagnostico_Projeto_Conteudo', $n_processo->Projeto_conteudo->Diagnostico_Projeto_Conteudo, ['class' => 'form-control', 'id'=> 'floatingTextarea']) !!}
                {{-- <p class="small"> <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dica1">
                  Ver Dica ?
                </button> </p> --}}

              </div>


              <label for="inputNumber" class="col-sm-2 col-form-label"> <b>Importância do Projeto:</b></label>
              <div class="col-sm-10">
                {!! Form::textarea('Importancia_Projeto_Conteudo', $n_processo->Projeto_conteudo->Importancia_Projeto_Conteudo, ['class' => 'form-control', 'id'=> 'floatingTextarea']) !!}
                {{-- <p class="small"> <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dica1">
                  Ver Dica ?
                </button> </p> --}}
              </div>


              <label for="inputNumber" class="col-sm-4 col-form-label"><b>Caracterização dos Interesses Recíprocos entre o Proponente/Estado:</b></label>
              <div class="col-sm-10">
                {!! Form::textarea('Caracterizacao_Projeto_Conteudo', $n_processo->Projeto_conteudo->Caracterizacao_Projeto_Conteudo, ['class' => 'form-control', 'id'=> 'floatingTextarea']) !!}
                {{-- <p class="small"> <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dica1">
                  Ver Dica ?
                </button> </p> --}}
              </div>


              <label for="inputNumber" class="col-sm-2 col-form-label"><b>Público alvo Interno</b></label>
              <div class="col-sm-10">
                {!! Form::textarea('Publico_Alvo_Interno_Projeto_Conteudo', $n_processo->Projeto_conteudo->Publico_Alvo_Interno_Projeto_Conteudo, ['class' => 'form-control', 'id'=> 'floatingTextarea']) !!}
                {{-- <p class="small"> <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dica1">
                  Ver Dica ?
                </button> </p> --}}
              </div>


              <label for="inputNumber" class="col-sm-2 col-form-label"><b>Público alvo Externo</b></label>
              <div class="col-sm-10">
                {!! Form::textarea('Publico_Alvo_Externo_Projeto_Conteudo', $n_processo->Projeto_conteudo->Publico_Alvo_Externo_Projeto_Conteudo, ['class' => 'form-control', 'id'=> 'floatingTextarea']) !!}
                {{-- <p class="small"> <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dica1">
                  Ver Dica ?
                </button> </p> --}}
              </div>

              <label for="inputNumber" class="col-sm-2 col-form-label"><b>Problemas a serem resolvidos</b></label>
              <div class="col-sm-10">
                {!! Form::textarea('Problemas_Projeto_Conteudo', $n_processo->Projeto_conteudo->Problemas_Projeto_Conteudo, ['class' => 'form-control', 'id'=> 'floatingTextarea']) !!}
                {{-- <p class="small"> <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dica1">
                  Ver Dica ?
                </button> </p> --}}
              </div>
              <label for="inputNumber" class="col-sm-2 col-form-label"><b>Resultados esperados</b></label>
              <div class="col-sm-10">
                {!! Form::textarea('Resultados_Projeto_Conteudo', $n_processo->Projeto_conteudo->Resultados_Projeto_Conteudo, ['class' => 'form-control', 'id'=> 'floatingTextarea']) !!}
                {{-- <p class="small"> <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dica1">
                  Ver Dica ?
                </button> </p> --}}
              </div>
              <br>
            <div class="row">

              <label for="inputNumber" class="col-sm-1 col-form-label"><b>Início:</b></label>
              <div class="col-sm-2">
                {!! Form::date('Inicio_Projeto_Conteudo', $n_processo->Projeto_conteudo->Inicio_Projeto_Conteudo, ['class' => 'form-control', 'id'=> 'floatingTextarea']) !!}

              </div>

              <label for="inputNumber" class="col-sm-1 col-form-label"><b>Término:</b></label>
              <div class="col-sm-2">
                {!! Form::date('Fim_Projeto_Conteudo', $n_processo->Projeto_conteudo->Fim_Projeto_Conteudo, ['class' => 'form-control', 'id'=> 'floatingTextarea']) !!}

              </div>
              </div>

            

              <label for="inputNumber" class="col-sm-2 col-form-label"><b>Informa Emenda n° Parlamentar:</b></label>
              <div class="col-sm-10">
                {!! Form::textarea('N_Emenda_Projeto_Conteudo', $n_processo->Projeto_conteudo->N_Emenda_Projeto_Conteudo, ['class' => 'form-control', 'id'=> 'floatingTextarea']) !!}
                {{-- <p class="small"> <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dica1">
                  Ver Dica ?
                </button> </p> --}}
              </div>

              <label for="inputNumber" class="col-sm-2 col-form-label"><b>Informa Emenda nome do  Autor:</b></label>
              <div class="col-sm-10">
                {!! Form::textarea('Nome_Autor_Emenda_Projeto_Conteudo', $n_processo->Projeto_conteudo->Nome_Autor_Emenda_Projeto_Conteudo, ['class' => 'form-control', 'id'=> 'floatingTextarea']) !!}
                {{-- <p class="small"> <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dica1">
                  Ver Dica ?
                </button> </p> --}}
              </div>
              <br>
<div class="row">
              <label for="inputNumber" class="col-sm-2 col-form-label"><b>Valor de Repasse:</b> </label>
              <div class="col-sm-2">
                {!! Form::number('Valor_Repasse_Projeto_Conteudo', $n_processo->Projeto_conteudo->Valor_Repasse_Projeto_Conteudo, ['class' => 'form-control', 'id'=> 'floatingTextarea']) !!}
                {{-- <p class="small"> <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dica1">
                  Ver Dica ?
                </button> </p> --}}
              </div>

              <label for="inputNumber" class="col-sm-2 col-form-label"><b>Valor de Contrapartida: </b> </label>
              <div class="col-sm-2">
                {!! Form::number('Valor_Contrapartida_Projeto_Conteudo', $n_processo->Projeto_conteudo->Valor_Contrapartida_Projeto_Conteudo, ['class' => 'form-control', 'id'=> 'floatingTextarea']) !!}
                {{-- <p class="small"> <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dica1">
                  Ver Dica ?
                </button> </p> --}}
              </div>
              </div>
           
            <button type="submit"
            class="btn btn-primary">Enviar</button>
            
            
            <!-- End General Form Elements -->
            
          </div>
        </div>
        
      </div>
