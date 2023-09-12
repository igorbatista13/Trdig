      {{-- ITEM 7 --}}
      {!! Form::close() !!}
      <div class="tab-pane fade" id="list-cronograma" role="tabpanel" aria-labelledby="list-cronograma-list">
          {!! Form::model($n_processo, ['method' => 'PATCH', 'route' => ['trdigital.store', $n_processo->id]]) !!}

          {{-- {!! Form::open(['route' => 'trdigital.metasstore', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}  --}}
          {{-- <form method="POST" action="{{ route('trdigital/metasstore', ['n_processo' => $id]) }}">
            @csrf --}}

          <div class="card">
              <div class="card-body">
                  <h5 class="card-title"> <big> <b> 7. </b> </big>Cronograma de Execução</b></h5>

                  <!-- Floating Labels Form -->
                  <div class="card">
                      <div class="card-body">

                          <h5 class="card-title text-center">METAS E ETAPAS</h5>
                
                      
                          

                          {{-- <p>Add <code>.modal-dialog-centered</code> to <code>.modal-dialog</code> to vertically center
                              the modal.</p> --}}
                          <table class="table datatable">
                              <thead>
                                  <tr>


                                  </tr>
                              </thead>
                              @foreach ($metas as $meta)
                                  <td>
                                    {{-- Criar Metas --}} @include('trdigital.edit.questoes.cronograma.metas.criarmetas')

                                      <div class="card ">
                                          <div class="card-body text-primary">
                                            @if ($meta->Correcao_metas_sit == '')
                                            @elseif ($meta->Correcao_metas_sit == 1)
                                                       <span class="badge bg-success position-absolute top-0 end-0">
                                                                                    <i class="bi bi-check-circle me-1"></i> Validado</span>
                                            @elseif ($meta->Correcao_metas_sit == 0)
                            
                                                                            <span class="badge bg-warning position-absolute top-0 end-0 text-dark">
                                                                                <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                                            @endif
                                              <h6 class="card-title text-center text-primary"> <b> METAS </b></a></h6>

                                              <b>Especificação: </b>
                                               {{ $meta->Especificacao_metas ?? 'Não informado' }} <br>
                                              <b> Unidade de medida: </b>
                                              {{ $meta->Unidade_medida_metas ?? 'Não informado' }} <br>
                                              <b> Quantidade: </b> {{ $meta->Quantidade_metas ?? 'Não informado' }}
                                              <br>
                                              <i class="bi bi-calendar text-success"> Início:  {{ $meta->Inicio_metas ?? 'Não informado' }} </i><br>
                                              <i class="bi bi-calendar2-x text-danger">  Fim:  {{ $meta->Termino_metas ?? 'Não informado' }} </i> <br>
                                              <br>

                                


                                    


                                              </small>
                                            </div>
                                        </div>
                                    </td>
                         
                                  <!-- Foreach das etapas -->
                                  <td>
                                    <i class="bi bi-arrow-return-right text-success"style="font-size: 24px;">  </i>

                                      @foreach ($meta->etapas as $etapa)
                                          <div class="card text-dark">
                                              <div class="card-body">
                                                @if ($etapa->Correcao_etapas_sit == '')
                                                @elseif ($etapa->Correcao_etapas_sit == 1)
                                                           <span class="badge bg-success position-absolute top-0 end-0">
                                                                                        <i class="bi bi-check-circle me-1"></i> Validado</span>
                                                @elseif ($etapa->Correcao_etapas_sit == 0)
                                
                                                                                <span class="badge bg-warning position-absolute top-0 end-0 text-dark">
                                                                                    <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                                                @endif
                                
                            

                                                  <h6 class="card-title text-center text-success"> <b> <u> ETAPAS </u> </b></h6>
                                                 <h6> <b> Especificação: </b>  {{ $etapa->Especificacao_etapa ?? ' nao informada' }} </b><br>
                                                 <b> Quantidade: </b> {{ $etapa->Quantidade_etapa ?? ' nao informada' }} </b><br>
                                                 <b> Unid. de Medida: </b> {{ $etapa->Unidade_medida_etapa ?? ' nao informada' }} </b><br>
                                                  <i class="bi bi-calendar text-success"> Início:   {{ $etapa->Inicio_etapa ?? ' nao informada' }} </i><br>
                                                  <i class="bi bi-calendar2-x text-danger">  Fim:       {{ $etapa->Termino_etapa ?? ' nao informada' }} </i><br>
                                                  <br>
                                                  </small>
                                                  <hr>

                                      


                                              </div>
                                          </div>
                                     
                                      @endforeach
                                  </td>


                                  </tr>
                              @endforeach

                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
          </form>


      </div>

      {!! Form::close() !!}

      <script>
          $(document).ready(function() {
              $('#editarmeta').on('show.bs.modal', function(event) {
                  var button = $(event.relatedTarget);
                  var metaId = button.data('bs-meta-id');
                  $('#metaId').val(metaId);
              });
          });
      </script>

      {{-- Excluir MEtas Captura o ID --}}
      <script>
          $(document).ready(function() {
              $('#excluirmeta').on('show.bs.modal', function(event) {
                  var button = $(event.relatedTarget);
                  var metaId = button.data('bs-meta-id');
                  $('#meta-id').text(metaId);
                  var deleteForm = document.getElementById('delete-form');
                  var actionUrl = deleteForm.getAttribute('action');
                  actionUrl = actionUrl.replace('__META_ID__', metaId);
                  deleteForm.setAttribute('action', actionUrl);
              });
          });
      </script>
      <script>
          $(document).ready(function() {
              $('#editarmeta').on('show.bs.modal', function(event) {
                  var button = $(event.relatedTarget);
                  var metaId = button.data('bs-meta-id');
                  $('#metaId').val(metaId);
              });
          });
      </script>