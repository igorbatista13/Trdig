 {{-- ITEM 7 --}}
 {!! Form::close() !!}

 <div class="tab-pane fade" id="list-pesquisa" role="tabpanel" aria-labelledby="list-pesquisa">
     <div class="card">
         <div class="card-body">
             <h5 class="card-title"> <big> <b> 12. </b> </big>Pesquisa Mercadológica</b></h5>

             <!-- Floating Labels Form -->
             <div class="card">
                 <div class="card-body">

                     <h5 class="card-title text-center">CADASTRO DE PESQUISA MERCADOLÓGICA</h5>
                   

                     @foreach ($pesquisa_mercadologica as $pesquisa)
                         <div class="col-md-12">
                             <div class="card mb-4">
                                 <div class="card-body">


                                     <div class="accordion{{ $pesquisa->id }}" id="accordionExample">
                                         <div class="accordion-item">

                                             <h2 class="accordion-header" id="headingOne">

                                                 <button class="accordion-button" type="button"
                                                     data-bs-toggle="collapse"
                                                     data-bs-target="#collapseOne{{ $pesquisa->id }}"
                                                     aria-expanded="true" aria-controls="collapseOne">

                                                     <a class="card-title text-center"><b>
                                                             Descrição do bem:</b> {{ $pesquisa->Descricao_bem ?? '' }}
                                                         <br>
                                                         <b>Qtd.</b> {{ $pesquisa->Qtd ?? '' }}<br>

                                                    
                                                     </a>

                                             </h2>
                             

                                             <div id="collapseOne{{ $pesquisa->id }}"
                                                 class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                                 data-bs-parent="#accordionExample">
                                                 <div class="accordion-body">

                                                     <table class="table datatable">
                                                         <thead>
                                                             <tr>
                                                                 <th>  </th>
                                                                 <th> Empresa </th>
                                                                 <th> Valor Unid. </th>
                                                                 <th> Total </th>
                                                                 <th> Comprovante </th>
                                                                
                                                             </tr>
                                                         </thead>

                                                         @php
                                                             $valorTotal = 0; // Inicializa o valor total
                                                             $numRegistros = count($pesquisa->pesquisa_mercadologica_pivots); // Obtém o número total de registros
                                                         @endphp

                                                         @foreach ($pesquisa->pesquisa_mercadologica_pivots as $pivot)

                                                    
                                                         <td>
                                                            {!! Form::open([
                                                                'url' => route('trdigital.validar.pesquisa_mercadologica', ['id' => $pivot->id]),
                                                                'method' => 'post',
                                                            ]) !!}
                   
                                                            <input type="radio"
                                                                name="Correcao_pesquisa_sit[{{ $pivot->id }}]"
                                                                value="1" class="form-check-input"
                                                                id="gridRadios1_{{ $pivot->id }}"
                                                                {{ old('Correcao_pesquisa_sit.' . $pivot->id, $pivot->Correcao_pesquisa_sit) == 1 ? 'checked' : '' }}>
                   
                                                            <label class="form-check-label"
                                                                for="gridRadios1_{{ $pivot->id }}">
                                                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                                                                    Validado</span>
                                                            </label>
                   
                                                            <input type="radio"
                                                                name="Correcao_pesquisa_sit[{{ $pivot->id }}]"
                                                                value="0" class="form-check-input"
                                                                id="gridRadios1_{{ $pivot->id }}"
                                                                {{ old('Correcao_pesquisa_sit.' . $pivot->id, $pivot->Correcao_pesquisa_sit) == 0 ? 'checked' : '' }}>
                   
                                                            <label class="form-check-label"
                                                                for="gridRadios2_{{ $pivot->id }}">
                                                                <span class="badge bg-warning text-dark"><i
                                                                        class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                                                            </label>
                   
                                                        </td>
                                                        <td>
                                                            <a class="card-subtitle mb-2 text-dark"><i
                                                                    class="bi bi-building"> </i>
                                                                <i><b class="text-primary">
                                                                        {{ $pivot->Empresa ?? '' }} </b> </i>

                                                            </a></td>
                                                             <td> <a class="card-subtitle mb-2">
                                                                     <b class="text-success">R$
                                                                         {{ number_format($pivot->Valor, 2, ',', '.') }}
                                                                         </b></a> </td>
                                                             {{-- <h6 class="card-subtitle mb-2 text-primary">
                                                             <small>Quantidade:</small> <b class="text-dark">
                                                                 {{ number_format($pesquisa->Qtd, 2, ',', '.') }}
                                                             </b>
                                                         </h6> --}}
                                                             <td> <a class="card-subtitle mb-2 text-primary">
                                                                   <b class="text-danger">R$
                                                                         {{ number_format($pivot->Valor * $pesquisa->Qtd, 2, ',', '.') }}
                                                                     </b>
                                                                 </a> </td>
                                                             @php
                                                                 $valorTotal += $pivot->Valor * $pesquisa->Qtd; // Adiciona o valor total atual
                                                             @endphp
                                                             <td> <a class="card-subtitle mb-2 text-primary">
                                                                     @if ($pivot->Anexo == '')
                                                                         <i
                                                                             class="bi bi-file-earmark-pdf-fill text-danger"></i>
                                                                         <a class="text-danger"> Documento não enviado
                                                                         </a>
                                                                     @else
                                                                         <i
                                                                             class="bi bi-file-earmark-pdf-fill text-success"></i>
                                                                         <a class="text-success"> Documento enviado </a>
                                                                         <a class="btn btn-primary btn-sm"
                                                                             href="{{ asset('storage/' . $pivot->Anexo) }}"
                                                                             target="_blank">
                                                                             <i class="bi bi-file-earmark-pdf-fill"></i>
                                                                             Ver
                                                                             anexo
                                                                         </a>
                                                                     @endif
                                                                 </a> </td>


                                                          
                                                             </tr>
                                                         @endforeach
                                                     </table>
                                                 </div>


                                                 @php
                                                     if ($numRegistros > 0) {
                                                         $valorTotalMedio = $valorTotal / $numRegistros;
                                                     } else {
                                                         $valorTotalMedio = 0; // Defina um valor padrão ou outro valor apropriado
                                                     }
                                                 @endphp

                                                 <td> <a class="card-subtitle mb-2 text-primary">
                                                         Valor Total Médio: <b class="text-danger"> R$
                                                             {{ number_format($valorTotalMedio, 2) }} </b>
                                                     </a>
                                                 </td>

                                             </div>
                                         </div>


                                     </div>
                                 </div>
                                 
                                </div>
                                
                            </div>
                            @endforeach
         </div>
     </div>
     <button type="submit" class="btn btn-primary">Enviar</button>


 </div>
 </div>
 </div>

