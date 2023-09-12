      {{-- ITEM 7 --}}
      <div class="tab-pane fade" id="list-consolidado" role="tabpanel" aria-labelledby="list-consolidado">
          {{-- {!! Form::open(['route' => 'metas.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} --}}

          <div class="card">
              <div class="card-body">
                  <h5 class="card-title"> <big> <b> 8. </b> </big>Plano de Aplicação Consolidado</b></h5>

                  <!-- Floating Labels Form -->
                  <div class="card">
                      <div class="card-body">

                          <h5 class="card-title text-center">CADASTROS DE PLANO DE APLICAÇÃO CONSOLIDADO </h5>
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                              data-bs-target="#verticalycentered">
                              + Novo Registro
                          </button>


                          {{-- <p>Add <code>.modal-dialog-centered</code> to <code>.modal-dialog</code> to vertically center
                              the modal.</p> --}}
                          <table class="table datatable">
                              <thead>
                                  <tr>
                                      <th><small>Natureza </small></th>
                                      <th><small>Discriminação </small></th>
                                      <th><small> Valor Conc.</small></th>
                                      <th><small>Valor Prop. <br><small class="text-primary">(Financeira) </small></th>
                                      <th><small>Valor Prop. <br><small class="text-primary"> (Não Financeira) </small>
                                      </th>
                                      <th><small>Editar</small></th>
                                      <th><small>Excluir</small></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($planoconsolidado as $planos)
                                      <tr>

                                          <td><b>{{ $planos->Natureza }} - {{ $planos->OutrosNatureza }} </h5> </b><br>
                                              @if ($planos->plano_consolidado_sit == '')
                                                  <span class="badge bg-primary">
                                                      <i class="bi bi-clock me-1"></i> Aguardando análise</span>
                                              @elseif ($planos->plano_consolidado_sit == 1)
                                                  <span class="badge bg-success">
                                                      <i class="bi bi-check-circle me-1"></i> Validado</span>
                                              @elseif ($planos->plano_consolidado_sit == 0)
                                                  <span class="badge bg-warning text-dark">
                                                      <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                                              @endif
                                          </td>
                                          <td>
                                              <h5> <span class="badge bg-success">
                                                      {{ $planos->Metas->Especificacao_metas }} </span> </h5>
                                          </td>
                                          <td>
                                             <span class="text-success">R$
                                                      {{ number_format($planos->Valor_concedente, 2, ',', '.') }}</span>
                                            
                                                    </td>
                                          <td>
                                              <span class="text-danger">
                                                      R$
                                                      {{ number_format($planos->Valor_proponente_financeira, 2, ',', '.') }}
                                                     <span>
                                          </td>
                                          <td>
                                              <a><span class="text-danger">R$ {{ number_format($planos->Valor_proponente_nao_financeira, 2, ',', '.') }}</span>
                          </a>
                                          </td>
                                          <td>
                                              <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                  data-bs-target="#editarplano{{ $planos->id }}Editar"
                                                  data-bs-meta-id="{{ $planos->id }}">
                                                  <i class="bi bi-pencil-square"></i>

                                              </button>
                                          </td>

                                          <td>
                                              <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                  data-bs-target="#excluirplano{{ $planos->id }}"
                                                  data-bs-meta-id="{{ $planos->id }}">
                                                  <i class="bi bi-x-square"></i>
                                              </button>
                                          </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>



                          <!-- Vertically centered Modal -->





                      </div>
                  </div>

                  <div class="modal fade" id="verticalycentered" tabindex="-1">
                      <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title"> <i class="bi bi-check me-1 text-success"> <b> Novo Plano de
                                              Aplicação Consolidado </b> </i></h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  {!! Form::open(['route' => ['trdigital.planoconsolidado', $n_processo->id], 'method' => 'patch']) !!}

                                  <div class="row g-3">
                                      <div class="col-md-12">
                                          <div class="form-floating">
                                              {!! Form::select(
                                                  'Natureza',
                                                  [
                                                      '' => 'Selecione a Natureza',
                                                      '3191.11 - Pessoal' => '3191.11 - Pessoal',
                                                      '3390.14 - Diárias' => '3390.14 - Diárias',
                                                      '3390.15 - Diárias Militares' => '3390.15 - Diárias Militares',
                                                      '3390.30 - Material de Consumo' => '3390.30 - Material de Consumo',
                                                      '3390.33 - Passagens' => '3390.33 - Passagens',
                                                      '3390.35 - Consultorias' => '3390.35 - Consultorias',
                                                      '3390.36 - Serviços de Terceiros - Pessoa Física' => '3390.36 - Serviços de Terceiros - Pessoa Física',
                                                      '3390.39 - Serviços de Terceiros - Pessoa Jurídica' => '3390.39 - Serviços de Terceiros - Pessoa Jurídica',
                                                      '4490.51 - Obras Civis' => '4490.51 - Obras Civis',
                                                      '4490.52 - Equipamentos e Material Permanente' => '4490.52 - Equipamentos e Material Permanente',
                                                      '4590.61 - Aquisição de Imóveis' => '4590.61 - Aquisição de Imóveis',
                                                      'Outros' => 'Outros',
                                                  ],
                                                  null,
                                                  [
                                                      'class' => 'form-control custom-select',
                                                      'required' => true,
                                                      'id' => 'NaturezaSelect',
                                                  ],
                                              ) !!}

                                              </select>


                                              <label for="floatingName">Natureza</label>
                                          </div>
                                          <br>
                                          <div id="NaturezaInput" style="display:none;">
                                              <label for="outrosNaturezaInput" class="text-success"> <b> Digite a
                                                      natureza: </b></label>
                                              {!! Form::text('OutrosNatureza', null, ['class' => 'form-control', 'id' => 'outrosNaturezaInput']) !!}
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class="col-md-12">
                                              <div class="form-floating">

                                                  <select name="metas_id" id="metas_id"
                                                      class="form-control custom-select" required>
                                                      <option value="" disabled selected>
                                                          Selecione a Meta</option>
                                                      @foreach ($metas as $meta)
                                                          <option value="{{ $meta->id }}">
                                                              {{ $meta->Especificacao_metas }}
                                                          </option>
                                                      @endforeach

                                                  </select>


                                                  <label for="floatingName"></label>
                                                  <label for="floatingEmail">Discriminação</label>
                                              </div>
                                          </div>


                                      </div>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <label for="floatingEmail">Valor - Concedente</label>
                                              <small class="text-primary"> (Recurso Financeiro) </small>
                                              <div class="form-floating">
                                                  <div class="input-group mb-3">
                                                      <span class="input-group-text" id="basic-addon1">R$</span>
                                                      {!! Form::text('Valor_concedente', null, [
                                                          'placeholder' => '',
                                                          'class' => 'form-control',
                                                          'maxlength' => '15',
                                                          'oninput' => 'aplicarMascara(this)',
                                                          'onkeypress' => 'return validarValor(this, event)',
                                                      ]) !!}

                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                              <label for="floatingCity">Valor Proponente</label>
                                              <small class="text-primary"> (Contrapartida Financeira) </small>
                                              <div class="form-floating">
                                                  <div class="input-group mb-3">
                                                      <span class="input-group-text" id="basic-addon1">R$</span>
                                                      {!! Form::text('Valor_proponente_financeira', null, [
                                                          'placeholder' => '',
                                                          'class' => 'form-control',
                                                          'maxlength' => '15',
                                                          'oninput' => 'aplicarMascara(this)',
                                                          'onkeypress' => 'return validarValor(this, event)',
                                                      ]) !!}
                                                  </div>
                                              </div>

                                          </div>
                                      </div>
                                      <br>

                                          <div class="row">
                                              <div class="col-md-6">
                                                <label for="floatingCity">Valor Proponente</label>
                                                <small class="text-primary"> (Contrapartida Não Financeira) </small>
                                                <div class="form-floating">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">R$</span>
                                                                      {!! Form::text('Valor_proponente_nao_financeira', null, [
                                                          'placeholder' => '',
                                                          'class' => 'form-control',
                                                          'maxlength' => '15',
                                                          'oninput' => 'aplicarMascara(this)',
                                                          'onkeypress' => 'return validarValor(this, event)',
                                                      ]) !!}

                                                      {{-- <label for="floatingCity">Valor Proponente - (Contrapartida Financeira)</label> --}}
                                                  </div>
                                                  </div>
                                                  </div>
                                              </div>


                                              <div class="modal-footer">
                                                  <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
                                              </div>



                                              <!-- End floating Labels Form -->

                                          </div>
                                      </div>
                                  </div>



                              {!! Form::close() !!}
                          </div>
                      </div>
                  </div><!-- End Vertically centered Modal-->


                  {{-- Modais de Edição e Exclusão --}}
                  @foreach ($planoconsolidado as $planos)
                      {{-- Editar Plano --}}
                      @include('trdigital.edit.questoes.planoconsolidado.editarplano')

                      <!-- Modal excluir plano consolidado -->
                      <div class="modal fade" id="excluirplano{{ $planos->id }}" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title"> <i class="bi bi-check-circle me-1 text-danger"><b>
                                                  Confirmar Exclusão </b> </i> </h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal"
                                          aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      Tem certeza de que deseja excluir este <b> Plano Consolidado? </b>
                                      {{-- - {{ $planos->id }} --}}
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary"
                                          data-bs-dismiss="modal">Cancelar</button>
                                      {!! Form::open(['route' => ['trdigital.planoconsolidadodestroy', $planos->id], 'method' => 'delete']) !!}
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

      <script>
          document.addEventListener("DOMContentLoaded", function() {
              var naturezaSelect = document.getElementById('NaturezaSelect');
              var naturezaInput = document.getElementById('NaturezaInput');

              naturezaSelect.addEventListener('change', function() {
                  if (this.value === 'Outros') {
                      naturezaInput.style.display = 'block';
                  } else {
                      naturezaInput.style.display = 'none';
                  }
              });
          });
      </script>
