      {{-- ITEM 7 --}}
      {!! Form::close() !!}

      <div class="tab-pane fade" id="list-Plano_detalhado" role="tabpanel" aria-labelledby="list-detalhado">
          {{-- {!! Form::open(['route' => ['trdigital.planodetalhado', $n_processo->id], 'method' => 'patch']) !!} --}}
          @if ($n_processo->Plano_detalhado)
          {!! Form::open([
              'url' => route('trdigital.validar.planodetalhado', ['id' => $n_processo->Plano_detalhado->id]),
              'method' => 'post',
          ]) !!}
        @endif


          <div class="card">
              <div class="card-body">
                  <h5 class="card-title"> <big> <b> 9. </b> </big>Plano de Aplicação Detalhado - Memória de Cálculo</b>
                  </h5>

                  <!-- Floating Labels Form -->
                  <div class="card">
                      <div class="card-body">

                          <h5 class="card-title text-center">MEMÓRIA DE CÁLCULO</h5>


                          {{-- <p>Add <code>.modal-dialog-centered</code> to <code>.modal-dialog</code> to vertically center
                              the modal.</p> --}}
                          <table class="table datatable">
                              <thead>
                                  <tr>
                                      <th> </th>
                                      <th>Natureza</th>
                                      <th>Produto/Serviço </th>
                                      <th>Unid. Medida</th>
                                      <th>Qtd.</th>
                                      <th>Valor Unit.</th>
                                      <th>Valor Total</th>


                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($planodetalhado as $planodetalhados)
                                      <tr>

                                          <td>



                                              {!! Form::open([
                                                  'url' => route('trdigital.validar.planodetalhado', ['id' => $n_processo->Plano_detalhado->id]),
                                                  'method' => 'post',
                                              ]) !!}


                                              <input type="radio"
                                                  name="plano_detalhado_sit[{{ $planodetalhados->id }}]" value="1"
                                                  class="form-check-input" id="gridRadios1_{{ $planodetalhados->id }}"
                                                  {{ old('plano_detalhado_sit.' . $planodetalhados->id, $planodetalhados->plano_detalhado_sit) == 1 ? 'checked' : '' }}>

                                              <label class="form-check-label"
                                                  for="gridRadios1_{{ $planodetalhados->id }}">
                                                  <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                                                      Validado</span>
                                              </label>

                                              <input type="radio"
                                                  name="plano_detalhado_sit[{{ $planodetalhados->id }}]" value="0"
                                                  class="form-check-input" id="gridRadios1_{{ $planodetalhados->id }}"
                                                  {{ old('plano_detalhado_sit.' . $planodetalhados->id, $planodetalhados->plano_detalhado_sit) == 0 ? 'checked' : '' }}>

                                              <label class="form-check-label"
                                                  for="gridRadios2_{{ $planodetalhados->id }}">
                                                  <span class="badge bg-warning text-dark"><i
                                                          class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                                              </label>

                                          </td>

                                          <td> <b>{{ $planodetalhados->Plano_consolidado->Natureza }}</b> </td>
                                          <td> {{ $planodetalhados->Produto_Servico_detalhado }} </td>
                                          <td> <span class="badge bg-success">
                                                  {{ $planodetalhados->Unidade_medida_detalhado }}</span> </h5>
                                          </td>
                                          <td> <span
                                                  class="badge bg-success">{{ number_format($planodetalhados->Quantidade_detalhado, 0, ',', '.') }}
                                              </span> </h5>
                                          </td>
                                          <td> <span class="badge bg-primary"> R$
                                                  {{ $planodetalhados->Valor_unit_detalhado }}</span></h5>
                                          </td>
                                          <td>

                                              @php
                                                  $quantidade = floatval($planodetalhados->Quantidade_detalhado);
                                                  $valorUnitario = floatval($planodetalhados->Valor_unit_detalhado);
                                                  $valorTotal = $quantidade * $valorUnitario;
                                              @endphp
                                              <span class="badge bg-danger">
                                                  <h5>
                                                      R$ {{ number_format($valorTotal, 2, ',', '.') }}
                                                  </h5>
                                              </span>
                                          </td>


                                      </tr>
                                  @endforeach
                              </tbody>

                          </table>

                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Enviar</button>

              </div>
          </div>
      </div>
