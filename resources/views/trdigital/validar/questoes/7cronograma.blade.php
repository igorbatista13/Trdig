      {{-- ITEM 7 --}}
      {!! Form::close() !!}
      <div class="tab-pane fade" id="list-cronograma" role="tabpanel" aria-labelledby="list-cronograma-list">

          <div class="card">
              <div class="card-body">
                  <h5 class="card-title"> <big> <b> 7. </b> </big>Cronograma de Execução</b></h5>

                  <!-- Floating Labels Form -->
                  <div class="card">
                      <div class="card-body">

                          <h5 class="card-title text-center">METAS E ETAPAS</h5>

                          <table class="table datatable">
                              <thead>
                                  <tr>


                                  </tr>
                              </thead>


                              @foreach ($metas as $meta)
                              {!! Form::open([
                                  'url' => route('trdigital.validar.validar_cronogramaexecucao_metas', ['id' => $meta->id]),
                                  'method' => 'post',
                              ]) !!}
                                  <td>
                                      <div class="card ">
                                          <div class="card-body text-primary">
                                              @if ($meta->Correcao_metas_sit == '')
                                              @elseif ($meta->Correcao_metas_sit == 1)
                                                  <span class="badge bg-success position-absolute top-0 end-0">
                                                      <i class="bi bi-check-circle me-1"></i> Validado</span>
                                              @elseif ($meta->Correcao_metas_sit == 0)
                                                  <span
                                                      class="badge bg-warning position-absolute top-0 end-0 text-dark">
                                                      <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                                              @endif
                                              <h6 class="card-title text-center text-primary"> <b> METAS </b></a></h6>

                                              <b>Especificação: </b>
                                              {{ $meta->Especificacao_metas ?? 'Não informado' }} <br>
                                              <b> Unidade de medida: </b>
                                              {{ $meta->Unidade_medida_metas ?? 'Não informado' }} <br>
                                              <b> Quantidade: </b> {{ $meta->Quantidade_metas ?? 'Não informado' }}
                                              <br>
                                              <i class="bi bi-calendar text-success"> Início:
                                                  {{ $meta->Inicio_metas ?? 'Não informado' }} </i><br>
                                              <i class="bi bi-calendar2-x text-danger"> Fim:
                                                  {{ $meta->Termino_metas ?? 'Não informado' }} </i> <br>
                                              <br>
                                              </small>
                                              <hr>
                                              <input type="hidden"
                                                  name="metas[{{ $meta->id }}][Correcao_metas_sit]"
                                                  value="{{ $meta->Correcao_metas_sit }}">

                                              <input type="radio" name="Correcao_metas_sit[{{ $meta->id }}]"
                                                  value="1" class="form-check-input"
                                                  id="gridRadios1_{{ $meta->id }}"
                                                  {{ old('Correcao_metas_sit.' . $meta->id, $meta->Correcao_metas_sit) == 1 ? 'checked' : '' }}>

                                              <label class="form-check-label" for="gridRadios1_{{ $meta->id }}">
                                                  <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                                                      Validado</span>
                                              </label>

                                              <input type="radio" name="Correcao_metas_sit[{{ $meta->id }}]"
                                                  value="0" class="form-check-input"
                                                  id="gridRadios1_{{ $meta->id }}"
                                                  {{ old('Correcao_metas_sit.' . $meta->id, $meta->Correcao_metas_sit) == 0 ? 'checked' : '' }}>

                                              <label class="form-check-label" for="gridRadios2_{{ $meta->id }}">
                                                  <span class="badge bg-warning text-dark"><i
                                                          class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                                              </label>
                                              <button type="submit" class="btn btn-primary">Salvar</button>

                                          </div>
                                      </div>
                                  </td>

                                  {!! Form::close() !!}

                                  <!-- Foreach das etapas -->
                                  @foreach ($meta->etapas as $etapa)
                                      <td>
                                          <i class="bi bi-arrow-return-right text-success"style="font-size: 24px;"> </i>

                                          {!! Form::close() !!}
                                          <div class="card text-dark">
                                              <div class="card-body">
                                                  @if ($etapa->Correcao_etapas_sit == '')
                                                  @elseif ($etapa->Correcao_etapas_sit == 1)
                                                      <span class="badge bg-success position-absolute top-0 end-0">
                                                          <i class="bi bi-check-circle me-1"></i> Validado</span>
                                                  @elseif ($etapa->Correcao_etapas_sit == 0)
                                                      <span
                                                          class="badge bg-warning position-absolute top-0 end-0 text-dark">
                                                          <i class="bi bi-exclamation-triangle me-1"></i>
                                                          Corrigir</span>
                                                  @endif



                                                  <h6 class="card-title text-center text-success"> <b> <u> ETAPAS </u>
                                                      </b></h6>
                                                  <h6> <b> Especificação: </b>
                                                      {{ $etapa->Especificacao_etapa ?? ' nao informada' }} </b><br>
                                                      <b> Quantidade: </b>
                                                      {{ $etapa->Quantidade_etapa ?? ' nao informada' }} </b><br>
                                                      <b> Unid. de Medida: </b>
                                                      {{ $etapa->Unidade_medida_etapa ?? ' nao informada' }} </b><br>
                                                      <i class="bi bi-calendar text-success"> Início:
                                                          {{ $etapa->Inicio_etapa ?? ' nao informada' }} </i><br>
                                                      <i class="bi bi-calendar2-x text-danger"> Fim:
                                                          {{ $etapa->Termino_etapa ?? ' nao informada' }} </i><br>
                                                      <br>
                                                      </small>
                                                      <hr>


                                                       {!! Form::open([
                                                        'url' => route('trdigital.validar.validar_cronogramaexecucao_etapas', ['id' => $meta->id]),
                                                        'method' => 'post',
                                                    ]) !!}  

                                                      <input type="hidden"
                                                          name="etapas[{{ $etapa->id }}][Correcao_etapas_sit]"
                                                          value="{{ $etapa->Correcao_etapas_sit }}">

                                                      <input type="radio"
                                                          name="Correcao_etapas_sit[{{ $etapa->id }}]"
                                                          value="1" class="form-check-input"
                                                          id="gridRadios1_{{ $etapa->id }}"
                                                          {{ old('Correcao_etapas_sit.' . $etapa->id, $etapa->Correcao_etapas_sit) == 1 ? 'checked' : '' }}>

                                                      <label class="form-check-label"
                                                          for="gridRadios1_{{ $meta->id }}">
                                                          <span class="badge bg-success"><i
                                                                  class="bi bi-check-circle me-1"></i>
                                                              Validado</span>
                                                      </label>

                                                      <input type="radio"
                                                          name="Correcao_etapas_sit[{{ $etapa->id }}]"
                                                          value="0" class="form-check-input"
                                                          id="gridRadios1_{{ $etapa->id }}"
                                                          {{ old('Correcao_etapas_sit.' . $etapa->id, $etapa->Correcao_etapas_sit) == 0 ? 'checked' : '' }}>

                                                      <label class="form-check-label"
                                                          for="gridRadios2_{{ $etapa->id }}">
                                                          <span class="badge bg-warning text-dark"><i
                                                                  class="bi bi-exclamation-triangle me-1"></i>
                                                              Corrigir</span>
                                                      </label>
                                                      <button type="submit" class="btn btn-primary btn">Salvar</button>



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


      </div>

      {!! Form::close() !!}
