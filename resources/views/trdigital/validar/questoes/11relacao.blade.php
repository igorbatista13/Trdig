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



                     {{-- <p>Add <code>.modal-dialog-centered</code> to <code>.modal-dialog</code> to vertically center
                         the modal.</p> --}}
                     <table class="table datatable">
                         <thead>
                             <tr>
                                 <th> </th>
                                 <th><small>Natureza|Especificação </small></th>
                                 <th>Unidade</th>
                                 <th>Qtd.</th>
                                 <th>Valor</th>
                                 <th>Total</th>
                                 <th>Local de Destino</th>
                                 <th>Propriedade</th>

                             </tr>
                         </thead>
                         <tbody>

                             @foreach ($obras_equipamento as $obras_equipamentos)
                                 <tr>
                                     <td>
                                         {!! Form::open([
                                             'url' => route('trdigital.validar.obras_equipamento', ['id' => $n_processo->Obras_equipamento->id]),
                                             'method' => 'post',
                                         ]) !!}

                                         <input type="radio"
                                             name="Correcao_obras_equipamentos_sit[{{ $obras_equipamentos->id }}]"
                                             value="1" class="form-check-input"
                                             id="gridRadios1_{{ $obras_equipamentos->id }}"
                                             {{ old('Correcao_obras_equipamentos_sit.' . $obras_equipamentos->id, $obras_equipamentos->Correcao_obras_equipamentos_sit) == 1 ? 'checked' : '' }}>

                                         <label class="form-check-label"
                                             for="gridRadios1_{{ $obras_equipamentos->id }}">
                                             <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                                                 Validado</span>
                                         </label>

                                         <input type="radio"
                                             name="Correcao_obras_equipamentos_sit[{{ $obras_equipamentos->id }}]"
                                             value="0" class="form-check-input"
                                             id="gridRadios1_{{ $obras_equipamentos->id }}"
                                             {{ old('Correcao_obras_equipamentos_sit.' . $obras_equipamentos->id, $obras_equipamentos->Correcao_obras_equipamentos_sit) == 0 ? 'checked' : '' }}>

                                         <label class="form-check-label"
                                             for="gridRadios2_{{ $obras_equipamentos->id }}">
                                             <span class="badge bg-warning text-dark"><i
                                                     class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                                         </label>

                                     </td>
                                     <td>{{ $obras_equipamentos->planoConsolidado->Natureza }} -
                                         {{ $obras_equipamentos->Especificacao }} <br>

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
                                             <h5> <span
                                                     class="badge bg-warning">{{ $obras_equipamentos->Propriedade ?? 'Não informado' }}
                                                 </span></h5>
                                         </td>
                                     @else
                                         <td>
                                             <h5> <span
                                                     class="badge bg-success">{{ $obras_equipamentos->Propriedade ?? 'Não informado' }}
                                                 </span></h5>
                                         </td>
                                     @endif
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
