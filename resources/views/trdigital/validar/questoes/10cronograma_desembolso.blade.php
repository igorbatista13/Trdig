      {{-- ITEM 7 --}}
      {!! Form::close() !!}

      <div class="tab-pane fade" id="list-desembolso" role="tabpanel" aria-labelledby="list-desembolso">


          <div class="card">
              <div class="card-body">
                  <h5 class="card-title"> <big> <b> 10. </b> </big>Cronograma de Desembolso</b></h5>

                  <!-- Floating Labels Form -->
                  <div class="card">
                      <div class="card-body">

                          <h5 class="card-title text-center">CADASTRO DO CRONOGRAMA DE DESEMBOLSO</h5>
                 
                          
                          {{-- <p>Add <code>.modal-dialog-centered</code> to <code>.modal-dialog</code> to vertically center
                              the modal.</p> --}}
                          <table class="table datatable">
                              <thead>
                                  <tr>
                                    <th> </th>
                                      <th>Meta</th>
                                      <th>Ano / Mês</th>
                                      <th>Fonte</th>
                                      <th>Valor</th>
                       
                                  </tr>
                              </thead>
                              @foreach ($cronograma_desembolso as $cronograma_desembolsos)
                                  
                            
                                  <tr>
                                     
                                        <td>

                                            {!! Form::open([
                                                'url' => route('trdigital.validar.cronograma_desembolso', ['id' => $n_processo->Cronograma_desembolso->id]),
                                                'method' => 'post',
                                            ]) !!}

                                            <input type="radio"
                                                name="cronograma_desembolso_sit[{{ $cronograma_desembolsos->id }}]" value="1"
                                                class="form-check-input" id="gridRadios1_{{ $cronograma_desembolsos->id }}"
                                                {{ old('cronograma_desembolso_sit.' . $cronograma_desembolsos->id, $cronograma_desembolsos->cronograma_desembolso_sit) == 1 ? 'checked' : '' }}>

                                            <label class="form-check-label"
                                                for="gridRadios1_{{ $cronograma_desembolsos->id }}">
                                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                                                    Validado</span>
                                            </label>
<br>
                                            <input type="radio"
                                                name="cronograma_desembolso_sit[{{ $cronograma_desembolsos->id }}]" value="0"
                                                class="form-check-input" id="gridRadios1_{{ $cronograma_desembolsos->id }}"
                                                {{ old('cronograma_desembolso_sit.' . $cronograma_desembolsos->id, $cronograma_desembolsos->cronograma_desembolso_sit) == 0 ? 'checked' : '' }}>

                                            <label class="form-check-label"
                                                for="gridRadios2_{{ $cronograma_desembolsos->id }}">
                                                <span class="badge bg-warning text-dark"><i
                                                        class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                                            </label>

                                        </td>



                                      <td><span class="badge bg-success">
                                              <big>{{ $cronograma_desembolsos->Metas->Especificacao_metas }}
                                              </big></span> </td>


                                      <td> <span class="badge bg-primary">
                                              {{ $cronograma_desembolsos->ano }} | {{ $cronograma_desembolsos->mes }}
                                          </span></td>
                                      @if ($cronograma_desembolsos->fonte == 'Concedente')
                                          <td><span class="badge bg-warning"> {{ $cronograma_desembolsos->fonte }}
                                              </span></td>
                                      @else
                                          <td><span class="badge bg-success"> {{ $cronograma_desembolsos->fonte }}
                                              </span></td>
                                      @endif
                                      <td class="text-danger"> <b>
                                              <span class="badge bg-danger">

                                                  R$
                                                  {{ number_format($cronograma_desembolsos->valor_desembolso, 2, ',', '.') }}
                                          </b> </span>
                                      </td>

                        
                                  </tr>
                              @endforeach
                              </tbody>

                          </table>

                          <button type="submit" class="btn btn-primary">Enviar</button>


                      </div>
                  </div>

              </div>
          </div>
      </div>
