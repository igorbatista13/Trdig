 {{-- ITEM 7 --}}
 {!! Form::close() !!}

 <div class="tab-pane fade" id="list-relacao" role="tabpanel" aria-labelledby="list-relacao">


     <div class="card">
         <div class="card-body">
             <h5 class="card-title"> <big> <b> 11. </b> </big>Relação de Obras e Equipamentos / Material
                 Permanente</b></h5>

             <!-- Floating Labels Form -->
             <div class="card">
                 <div class="card-body">

                     <h5 class="card-title text-center">CADASTRO DE OBRAS E EQUIPAMENTOS / MATERIAL PERMANENTE</h5>
                     <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                         data-bs-target="#obras_euipamentos">
                         + Novo Registro
                     </button>


                     {{-- <p>Add <code>.modal-dialog-centered</code> to <code>.modal-dialog</code> to vertically center
                         the modal.</p> --}}
                     <table class="table datatable">
                         <thead>
                             <tr>
                                 <th>Natureza|Especificação</th>
                                 <th>Unidade</th>
                                 <th>Qtd.</th>
                                 <th>Valor</th>
                                 <th>Total</th>
                                 <th>Local de Destino</th>
                                 <th>Propriedade</th>
                                 <th>Ações</th>
                                 <th></th>


                             </tr>
                         </thead>

                         @foreach ($obras_equipamento as $obras_equipamentos)
                             <tr>

                                 <td>{{ $obras_equipamentos->planoConsolidado->Natureza }} -
                                     {{ $obras_equipamentos->Especificacao }} <br>
                                     @if ($obras_equipamentos->Correcao_obras_equipamentos_sit == '')
                                         <span class="badge bg-primary">
                                             <i class="bi bi-clock me-1"></i> Aguardando análise</span>
                                     @elseif ($obras_equipamentos->Correcao_obras_equipamentos_sit == 1)
                                         <span class="badge bg-success">
                                             <i class="bi bi-check-circle me-1"></i> Validado</span>
                                     @elseif ($obras_equipamentos->Correcao_obras_equipamentos_sit == 0)
                                         <span class="badge bg-warning text-dark">
                                             <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                                     @endif
                                 </td>
                                 <td>
                                     <h5> <span class="badge bg-success">{{ $obras_equipamentos->Unidade }} </span>
                                     </h5>
                                 </td>
                                 <td> <span class="badge bg-success">{{ $obras_equipamentos->Qtd }} </span> </td>
                                 <td> <span class="badge bg-primary"> R$
                                         {{ number_format($obras_equipamentos->Valor_unit, 2, ',', '.') }}
                                     </span></td>
                                 <td>
                                     <h5> <span class="badge bg-danger">
                                             R$
                                             {{ number_format($obras_equipamentos->Valor_unit * $obras_equipamentos->Qtd, 2, ',', '.') }}
                                 </td>
                                 <td> <span
                                         class="badge bg-warning text-success">{{ $obras_equipamentos->cidade->Nome }}
                                     </span> </td>

                                 @if ($obras_equipamentos->Propriedade == 'Concedente')
                                     <td>
                                         <h5> <span class="badge bg-warning">{{ $obras_equipamentos->Propriedade }}
                                             </span></h5>
                                     </td>
                                 @else
                                     <td>
                                         <h5> <span class="badge bg-success">{{ $obras_equipamentos->Propriedade }}
                                             </span></h5>
                                     </td>
                                 @endif
                                 <td>

                                    @if ($obras_equipamentos->Correcao_obras_equipamentos_sit == 1)

                                     <button type="button" class="btn btn-warning" data-bs-toggle="modal" disabled
                                         data-bs-target="#editar_relacoes{{ $obras_equipamentos->id }}Editar"
                                         data-bs-meta-id="{{ $obras_equipamentos->id }}">
                                         <i class="bi bi-pencil-square"></i>
                                     </button>

                                     @else    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                     data-bs-target="#editar_relacoes{{ $obras_equipamentos->id }}Editar"
                                     data-bs-meta-id="{{ $obras_equipamentos->id }}">
                                     <i class="bi bi-pencil-square"></i>
                                 </button>
                                 @endif
                                 <td>
                                     <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                         data-bs-target="#excluir_relacoes{{ $obras_equipamentos->id }}"
                                         data-bs-meta-id="{{ $obras_equipamentos->id }}">
                                         <i class="bi bi-x-square"></i>

                                     </button>
                                 </td>
                             </tr>
                         @endforeach
                     </table>
                 </div>
             </div>

             </table>

             <!-- Vertically centered Modal -->

             <div class="modal fade" id="obras_euipamentos" tabindex="-1">
                 <div class="modal-dialog modal-dialog-centered modal-lg">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title"><i class="bi bi-check-circle me-1 text-success"><b>
                                         CADASTRO DE OBRAS E EQUIPAMENTOS / MATERIAL PERMANENTE </b> </i>
                             </h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                 aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                             {!! Form::open(['route' => ['trdigital.obras_equipamento', $n_processo->id], 'method' => 'patch']) !!}

                             <div class="row g-3">

                                 <div class="col-md-12">
                                     <div class="form-floating">

                                         <select name="Natureza_id" id="Natureza_id" class="form-control custom-select"
                                             required>
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
                                     <div class="col-md-6">
                                         <div class="form-floating">
                                             {!! Form::text('Especificacao', null, [
                                                 'placeholder' => 'Especificação',
                                                 'class' => 'form-control',
                                                 'id' => 'floatingName',
                                             ]) !!}
                                             <label for="floatingName"></label>
                                             <label for="floatingEmail">Especificação</label>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-floating">


                                             {!! Form::select(
                                                 'Unidade',
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
                                             <label for="floatingEmail">Unidade</label>
                                         </div>
                                     </div>

                                 </div>
                                 <br>

                                 <div class="col-12">
                                     <div class="row">
                                         <div class="col-md-6">
                                             <div class="form-floating">
                                                 {!! Form::number('Qtd', null, [
                                                     'placeholder' => 'Quantidade',
                                                     'class' => 'form-control',
                                                     'max' => '999999999999',
                                                 ]) !!}
                                                 <label for="floatingCity">Quantidade</label>
                                             </div>
                                         </div>

                                         <div class="col-md-6">
                                             <div class="form-floating">
                                                 {!! Form::text('Valor_unit', null, [
                                                     'placeholder' => 'Valor',
                                                     'class' => 'form-control',
                                                     'maxlength' => '15',
                                                     'oninput' => 'aplicarMascara(this)',
                                                     'onkeypress' => 'return validarValor(this, event)',
                                                 ]) !!}
                                                 <label for="floatingZip">Valor</label>
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="form-floating">

                                                 <select name="Cidade_id" id="Cidade_id"
                                                     class="form-control custom-select" required>
                                                     <option value="" disabled selected>Selecione o
                                                         Local de destino
                                                     </option>
                                                     @foreach ($cidade as $cidades)
                                                         <option value="{{ $cidades->id }}">
                                                             {{ $cidades->Nome }}
                                                         </option>
                                                     @endforeach
                                                 </select>

                                                 <label for="floatingZip">Local de destino</label>
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="form-floating">
                                                 <div class="form-check">
                                                     {!! Form::radio('Propriedade', 'Concedente', false, ['class' => 'form-check-input', 'id' => 'radioOpcao1']) !!}
                                                     <label class="form-check-label"
                                                         for="radioOpcao1">Concedente</label>
                                                 </div>

                                                 <div class="form-check">
                                                     {!! Form::radio('Propriedade', 'Contrapartida', false, ['class' => 'form-check-input', 'id' => 'radioOpcao2']) !!}
                                                     <label class="form-check-label"
                                                         for="radioOpcao2">Contrapartida</label>

                                                 </div>




                                                 <!-- End floating Labels Form -->

                                             </div>
                                             <div class="modal-footer">
                                                 <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
                                             </div>
                                         </div>
                                     </div>

                                 </div>

                             </div>
                         </div>
                     </div>
                 </div>
             </div><!-- End Vertically centered Modal-->



             {{-- Modais de Edição e Exclusão --}}
             @foreach ($obras_equipamento as $obras_equipamentos)
                 {{-- Editar memoria de calculo  --}}
                 @include('trdigital.edit.questoes.11relacoes.editarrelacoes')
             @endforeach
             @include('trdigital.edit.questoes.11relacoes.excluirrelacoes')




         </div>
     </div>
 </div>
