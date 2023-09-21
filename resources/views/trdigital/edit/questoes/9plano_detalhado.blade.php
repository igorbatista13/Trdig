      {{-- ITEM 7 --}}
      {!! Form::close() !!}

      <div class="tab-pane fade" id="list-detalhado" role="tabpanel" aria-labelledby="list-detalhado">
          {!! Form::open(['route' => ['trdigital.planodetalhado', $n_processo->id], 'method' => 'patch']) !!}


          <div class="card">
              <div class="card-body">
                  <h5 class="card-title"> <big> <b> 9. </b> </big>Plano de Aplicação Detalhado - Memória de Cálculo</b>
                  </h5>

                  <!-- Floating Labels Form -->
                  <div class="card">
                      <div class="card-body">

                          <h5 class="card-title text-center">MEMÓRIA DE CÁLCULO</h5>
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                              data-bs-target="#novoregistro-memoriacalculo">
                              + Novo Registro
                          </button>


                          {{-- <p>Add <code>.modal-dialog-centered</code> to <code>.modal-dialog</code> to vertically center
                              the modal.</p> --}}
                          <table class="table datatable">
                              <thead>
                                  <tr>
                                      <th>Natureza</th>
                                      <th> Produto/Serviço </th>
                                      <th>Unid. Medida</th>
                                      <th>Qtd.</th>
                                      <th>Valor Unit.</th>
                                      <th>Valor Total</th>
                                      <th>Editar</th>
                                      <th>Excluir</th>

                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($planodetalhado as $planodetalhados)
                                      <tr>

                                          <td><b>{{ $planodetalhados->Plano_consolidado->Natureza }}</b><br>
                                              @if ($planodetalhados->plano_detalhado_sit == '')
                                                  <span class="badge bg-primary">
                                                      <i class="bi bi-clock me-1"></i> Aguardando análise</span>
                                              @elseif ($planodetalhados->plano_detalhado_sit == 1)
                                                  <span class="badge bg-success">
                                                      <i class="bi bi-check-circle me-1"></i> Validado</span>
                                              @elseif ($planodetalhados->plano_detalhado_sit == 0)
                                                  <span class="badge bg-warning text-dark">
                                                      <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                                              @endif
                                          </td>
                                          <td>
                                              {{ $planodetalhados->Produto_Servico_detalhado }} </td>
                                          <td>
                                              <span class="badge bg-success">
                                                  {{ $planodetalhados->Unidade_medida_detalhado }}</span> </h5>
                                          </td>
                                          <td>

                                              <span
                                                  class="badge bg-success">{{ number_format($planodetalhados->Quantidade_detalhado, 0, ',', '.') }}
                                              </span>
                                              </h5>
                                          </td>

                                          <td>
                                              <span class="badge bg-primary">
                                                  R$ {{ $planodetalhados->Valor_unit_detalhado }}</span></h5>
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

                                          <td>

                                              @if ($planodetalhados->plano_detalhado_sit == 1)
                                                  <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                      disabled
                                                      data-bs-target="#editarplanodetalhado{{ $planodetalhados->id }}Editar"
                                                      data-bs-meta-id="{{ $planodetalhados->id }}">
                                                      <i class="bi bi-pencil-square"></i>
                                                  </button>
                                              @else
                                                  <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                      data-bs-target="#editarplanodetalhado{{ $planodetalhados->id }}Editar"
                                                      data-bs-meta-id="{{ $planodetalhados->id }}">
                                                      <i class="bi bi-pencil-square"></i>
                                                  </button>
                                              @endif

                                          </td>

                                          <td>
                                              <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                  data-bs-target="#excluirmemoria{{ $planodetalhados->id }}"
                                                  data-bs-meta-id="{{ $planodetalhados->id }}">
                                                  <i class="bi bi-x-square"></i>
                                              </button>
                                          </td>
                                      </tr>
                                  @endforeach
                              </tbody>

                          </table>

                          <!-- Vertically centered Modal -->

                          <div class="modal fade" id="novoregistro-memoriacalculo" tabindex="-1">
                              <div class="modal-dialog modal-dialog-centered modal-lg">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title"><i class="bi bi-check me-1 text-success"> <b> Novo
                                                      Registro - Memória de Cálculo </i> </b></h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                              aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          {!! Form::open(['route' => ['trdigital.planodetalhado', $n_processo->id], 'method' => 'patch']) !!}

                                          <div class="row g-3">
                                              <div class="col-md-12">
                                                  <div class="form-floating">
                                                      <select name="Natureza_id" id="Natureza_id"
                                                          class="form-control custom-select" required>
                                                          <option value="" disabled selected>Selecione a Natureza
                                                          </option>
                                                          @foreach ($planoconsolidado as $planoDetalhados)
                                                              <option value="{{ $planoDetalhados->id }}">
                                                                  {{ $planoDetalhados->Natureza }}
                                                              </option>
                                                          @endforeach
                                                      </select>

                                                      <label for="floatingName">Natureza</label>
                                                  </div>
                                                  <br>
                                              </div>

                                              <div class="row">
                                                  <div class="col-md-12">
                                                      <div class="form-floating">

                                                          {!! Form::text('Produto_Servico_detalhado', null, [
                                                              'placeholder' => 'Produto ou Serviço',
                                                              'class' => 'form-control',
                                                              'id' => 'floatingName',
                                                          ]) !!}

                                                          <label for="floatingName"></label>
                                                          <label for="floatingEmail">Produto ou Serviço</label>
                                                      </div>
                                                  </div>


                                              </div>
                                              <div class="row">
                                                  <div class="col-md-6">
                                                      <div class="form-floating">


                                                          {!! Form::select(
                                                              'Unidade_medida_detalhado',
                                                              [
                                                                  'Ano.' => 'Ano',
                                                                  'Atendidos' => 'Atendidos',
                                                                  'Atendimentos' => 'Atendimentos',
                                                                  'Dias' => 'Dias',
                                                                  'Meses' => 'Meses',
                                                                  'Pessoas' => 'Pessoas',
                                                                  'Porcentagem' => 'Porcentagem',
                                                                  'Unidade' => 'Unidade',
                                                                  'Quantidade' => 'Quantidade',
                                                              ],
                                                              null,
                                                              [
                                                                  'placeholder' => '',
                                                                  'class' => 'form-select', // Usamos 'form-select' para um estilo de dropdown do Bootstrap
                                                                  'id' => 'floatingName',
                                                              ],
                                                          ) !!}




                                                          <label for="floatingName"></label>
                                                          <label for="floatingEmail">Unidade de Medida</label>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <div class="form-floating">

                                                          {!! Form::number('Quantidade_detalhado', null, [
                                                              'placeholder' => '',
                                                              'class' => 'form-control',
                                                              'max' => '999999999999',
                                                          ]) !!}
                                                          <label for="floatingName"></label>
                                                          <label for="floatingEmail">Quantidade</label>
                                                      </div>
                                                  </div>

                                              </div>
                                              <br>

                                              <div class="col-12">
                                                  <div class="row">
                                                      <label for="floatingZip">Valor Unit.</label>
                                                      <div class="form-floating">
                                                          <div class="input-group mb-3">
                                                              <span class="input-group-text" id="basic-addon1">R$</span>

                                                              <div class="col-md-6">
                                                                  <div class="form-floating">
                                                                      {!! Form::text('Valor_unit_detalhado', null, [
                                                                          'placeholder' => 'a',
                                                                          'class' => 'form-control',
                                                                          'maxlength' => '15',
                                                                          'oninput' => 'aplicarMascara(this)',
                                                                          'onkeypress' => 'return validarValor(this, event)',
                                                                      ]) !!}
                                                                  </div>
                                                                  {{-- <label for="floatingCity">Valor Proponente - (Contrapartida Financeira)</label> --}}
                                                              </div>
                                                          </div>
                                                      </div>



                                                      <div class="modal-footer">
                                                          <button type="submit"
                                                              class="btn btn-primary btn-lg">Salvar</button>
                                                      </div>

                                                      {!! Form::close() !!}

                                                      <!-- End floating Labels Form -->

                                                  </div>
                                              </div>
                                          </div>

                                      </div>

                                  </div>
                              </div>
                          </div><!-- End Vertically centered Modal-->


                          {{-- Modais de Edição e Exclusão --}}
                          @foreach ($planodetalhado as $planodetalhados)
                              {{-- Editar memoria de calculo  --}}
                              @include('trdigital.edit.questoes.planodetalhado.editarplanodetalhado')
                              <!-- Modal excluir plano consolidado -->
                              <div class="modal fade" id="excluirmemoria{{ $planodetalhados->id }}" tabindex="-1">
                                  <div class="modal-dialog modal-dialog-centered">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title"> <i
                                                      class="bi bi-check-circle me-1 text-danger"><b> Confirmar Exclusão
                                                      </b> </i></h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                  aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                              Tem certeza de que deseja excluir este <b> Plano Detalhado? </b>
                                              {{-- {{ $planodetalhados->id }} --}}
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary"
                                                  data-bs-dismiss="modal">Cancelar</button>
                                              {!! Form::open(['route' => ['trdigital.planodetalhado_destroy', $planodetalhados->id], 'method' => 'delete']) !!}
                                              <button type="submit" class="btn btn-danger">Excluir</button>
                                              {!! Form::close() !!}
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              {{-- @include('trdigital.edit.questoes.planoconsolidado.excluirplano', ['planos' => $planos]) --}}
                          @endforeach
                      </div>
                  </div>

              </div>
          </div>
      </div>
