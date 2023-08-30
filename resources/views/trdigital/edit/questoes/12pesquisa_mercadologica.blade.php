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
                     <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                         data-bs-target="#novo_pesquisa_mercadologica">
                         + Novo Registro
                     </button>

                     @foreach ($pesquisa_mercadologica as $pesquisa)
                         <div class="col-md-6">
                             <div class="card mb-4">
                                 <div class="card-body">

                                     {!! Form::open([
                                         'route' => ['trdigital.pesquisa_mercadologica_destroy', $pesquisa->id],
                                         'method' => 'delete',
                                     ]) !!}
                                     @if ($pesquisa->Correcao_metas_sit == 1)
                                         <span class="badge bg-success position-absolute top-0 end-0">
                                             <i class="bi bi-check-circle me-1"></i> Validado</span>
                                     @if ($pesquisa->Correcao_metas_sit == 0)
                                         <span class="badge bg-warning text-dark position-absolute top-0 end-0">
                                             <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                                     @endif
                                     @endif
                                     {{-- <button type="submit" class="btn btn-danger position-absolute top-0 end-0"> <i
                                             class="bi bi-trash me-1">
                                         </i></span></button> --}}
                                     {!! Form::close() !!}
                                     {{-- <a
                                href="{{ route('trdigital.edit', $pesquisa->id) }}">
                                <span
                                    class="badge bg-danger custom-badge position-absolute top-0 end-0">
                                    <i class="bi bi-trash me-1">Excluir
                                    </i></span> </a> --}}
                                     <h5 class="card-title text-center">Descrição do Item: <b> <u>
                                                 {{ $pesquisa->Descricao_bem ?? '' }} </u></b></h5>
                                     @php
                                         $valorTotal = 0; // Inicializa o valor total
                                         $numRegistros = count($pesquisa->pesquisa_mercadologica_pivots); // Obtém o número total de registros
                                     @endphp
                                     @foreach ($pesquisa->pesquisa_mercadologica_pivots as $pivot)
                                         <h5 class="card-subtitle mb-2 text-dark"><i class="bi bi-building"> </i> 
                                            <i><b class="text-primary"><small>Empresa: </small>
                                                     {{ $pivot->Empresa ?? '' }} </i> </b>
                                                     @if ($pivot->Correcao_pesquisa_sit == 1)
                                                     <span class="badge bg-success ">
                                                         <i class="bi bi-check-circle me-1"></i> Validado</span>
                                                 @if ($pivot->Correcao_pesquisa_sit == 0)
                                                     <span class="badge bg-warning text-dark ">
                                                         <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                                                         @endif
                                                         @endif
                                                        </h5>
                                                         

                                         <h6 class="card-subtitle mb-2 text-primary"><small>Valor Unid.: </small> <b
                                                 class="text-danger">R$ {{ $pivot->Valor ?? '' }}</small></b></h6>
                                         <h6 class="card-subtitle mb-2 text-primary"><small>Quantidade:</small> <b
                                                 class="text-dark">{{ $pesquisa->Qtd ?? '' }}</b></h6>
                                         <h6 class="card-subtitle mb-2 text-primary"><small>Total:</small> <b
                                                 class="text-danger">R$
                                                 {{ $pivot->Valor * $pesquisa->Qtd }} </b></h6>
                                         @php
                                             $valorTotal += $pivot->Valor * $pesquisa->Qtd; // Adiciona o valor total atual
                                         @endphp
                                         <h6 class="card-subtitle mb-2 text-primary"><small>Comprovante: </small>
                                             @if ($pivot->Anexo == '')
                                                 <i class="bi bi-file-earmark-pdf-fill text-danger"></i>
                                                 <a class="text-danger"> Documento não enviado </a>
                                             @else
                                                 <i class="bi bi-file-earmark-pdf-fill text-success"></i>
                                                 <a class="text-success"> Documento enviado </a>
                                                 <a class="btn btn-primary btn-sm"
                                                     href="{{ asset('storage/' . $pivot->Anexo) }}" target="_blank">
                                                     {{-- <a class="btn btn-primary" href="{{ asset('storage/' . $n_processo->Pesquisa_mercadologica) }}"
                                             target="_blank"> --}}
                                                     <i class="bi bi-file-earmark-pdf-fill"></i> Ver anexo
                                                 </a>
                                             @endif
                                             <br>
                                             <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                 data-bs-target="#editar_pesquisamercadologica{{ $pivot->id ?? '' }}Editar"
                                                 data-bs-meta-id="{{ $pesquisa->id ?? '' }}">
                                                 <i class="bi bi-pencil-square"></i>
                                                </button>
                                             <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                 data-bs-target="#excluir_pesquisamercadologica{{ $pesquisa->id }}"
                                                 data-bs-meta-id="{{ $pesquisa->id ?? '' }}">
                                                 <i class="bi bi-x-square"></i>

                                             </button>
                                             <hr>
                                     @endforeach

                                     @php
                                         if ($numRegistros > 0) {
                                             $valorTotalMedio = $valorTotal / $numRegistros;
                                         } else {
                                             $valorTotalMedio = 0; // Defina um valor padrão ou outro valor apropriado
                                         }
                                     @endphp

                                     <h6 class="card-subtitle mb-2 text-primary">Valor Total Médio: <b
                                             class="text-danger"> R$ {{ number_format($valorTotalMedio, 2) }} </b>
                                     </h6>

                                     </h6>


                                 </div>
                             </div>
                             <!-- End Card with titles, buttons, and links -->
                         </div>
                     @endforeach
                 </div>

                 @include('trdigital.edit.questoes.12pesquisamercadologica.criarpesquisamercadologica')
                 @include('trdigital.edit.questoes.12pesquisamercadologica.editarpesquisamercadologica')
                 @include('trdigital.edit.questoes.12pesquisamercadologica.excluirpesquisamercadologica')

             </div>
         </div>
     </div>
 </div>
