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
                         <div class="col-md-12">
                             <div class="card mb-4">
                                 <div class="card-body">
                                     <div class="accordion" id="accordionExample">
                                         <div class="accordion-item">

                                             <h2 class="accordion-header" id="headingOne">

                                                 <button class="accordion-button" type="button"
                                                     data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                     aria-expanded="true" aria-controls="collapseOne">

                                                     @if ($pesquisa->Correcao_metas_sit == '')
                                                         <span class="badge bg-primary position-absolute top-0 end-0">
                                                             <i class="bi bi-clock me-1"></i> Aguardando análise</span>
                                                     @endif
                                                     @if ($pesquisa->Correcao_metas_sit == 1)
                                                         <span class="badge bg-success position-absolute top-0 end-0">
                                                             <i class="bi bi-check-circle me-1"></i> Validado</span>
                                                         @if ($pesquisa->Correcao_metas_sit == 0)
                                                             <span
                                                                 class="badge bg-warning text-dark position-absolute top-0 end-0">
                                                                 <i class="bi bi-exclamation-triangle me-1"></i>
                                                                 Corrigir</span>
                                                         @endif
                                                     @endif
                                                     
                                                     <a class="card-title text-center"><b>
                                                             {{ $pesquisa->Descricao_bem ?? '' }} </b></a>

                                             </h2>
                                             <button type="button" class="btn btn-danger btn-sm"
                                             data-bs-toggle="modal"
                                             data-bs-target="#excluir_pesquisanomemercadologica{{ $pesquisa->id }}"
                                             data-bs-meta-id="{{ $pesquisa->id ?? '' }}">
                                             <i class="bi bi-x-square"><b>Excluir Pesquisa</b></i>
                                             </button>
                                             {{-- <button type="button" class="btn btn-warning btn-sm"
                                             data-bs-toggle="modal"
                                             data-bs-target="#editar_pesquisanomemercadologica{{ $pesquisa->id }}"
                                             data-bs-meta-id="{{ $pesquisa->id ?? '' }}">
                                             <i class="bi bi-x-square"><b> Editar Pesquisa </b></i>
                                         </button> --}}
                                         @include('trdigital.edit.questoes.12pesquisamercadologica.excluirnomepesquisamercadologica')
                                         {{-- @include('trdigital.edit.questoes.12pesquisamercadologica.editarnomepesquisamercadologica') --}}
                                        </button>
                                             </button>


                                             <div id="collapseOne" class="accordion-collapse collapse show"
                                                 aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                 <div class="accordion-body">


                                                     @php
                                                         $valorTotal = 0; // Inicializa o valor total
                                                         $numRegistros = count($pesquisa->pesquisa_mercadologica_pivots); // Obtém o número total de registros
                                                     @endphp
                                                     @foreach ($pesquisa->pesquisa_mercadologica_pivots as $pivot)
                                                         <h5 class="card-subtitle mb-2 text-dark"><i
                                                                 class="bi bi-building"> </i>
                                                             <i><b class="text-primary"><small>Empresa: </small>
                                                                     {{ $pivot->Empresa ?? '' }} </i> </b>
                                                             @if ($pivot->Correcao_pesquisa_sit == 1)
                                                                 <span class="badge bg-success ">
                                                                     <i class="bi bi-check-circle me-1"></i>
                                                                     Validado</span>
                                                                 @if ($pivot->Correcao_pesquisa_sit == 0)
                                                                     <span class="badge bg-warning text-dark ">
                                                                         <i class="bi bi-exclamation-triangle me-1"></i>
                                                                         Corrigir</span>
                                                                 @endif
                                                             @endif
                                                         </h5>


                                                         <h6 class="card-subtitle mb-2 text-primary"><small>Valor Unid.:
                                                             </small> <b class="text-danger">R$
                                                                {{ number_format($pivot->Valor, 2, ',', '.') }}  </small></b></h6>
                                                         <h6 class="card-subtitle mb-2 text-primary">
                                                             <small>Quantidade:</small> <b
                                                                 class="text-dark">
                                                                 {{ number_format($pesquisa->Qtd, 2, ',', '.') }}  
                                                                 </b>
                                                         </h6>
                                                         <h6 class="card-subtitle mb-2 text-primary">
                                                             <small>Total:</small> <b class="text-danger">R$
                                                                {{ number_format($pivot->Valor * $pesquisa->Qtd, 2, ',', '.') }}  
                                                             </b>
                                                         </h6>
                                                         @php
                                                             $valorTotal += $pivot->Valor * $pesquisa->Qtd; // Adiciona o valor total atual
                                                         @endphp
                                                         <h6 class="card-subtitle mb-2 text-primary"><small>Comprovante:
                                                             </small>
                                                             @if ($pivot->Anexo == '')
                                                                 <i class="bi bi-file-earmark-pdf-fill text-danger"></i>
                                                                 <a class="text-danger"> Documento não enviado </a>
                                                             @else
                                                                 <i
                                                                     class="bi bi-file-earmark-pdf-fill text-success"></i>
                                                                 <a class="text-success"> Documento enviado </a>
                                                                 <a class="btn btn-primary btn-sm"
                                                                     href="{{ asset('storage/' . $pivot->Anexo) }}"
                                                                     target="_blank">
                                                                     {{-- <a class="btn btn-primary" href="{{ asset('storage/' . $n_processo->Pesquisa_mercadologica) }}"
                                                    target="_blank"> --}}
                                                                     <i class="bi bi-file-earmark-pdf-fill"></i> Ver
                                                                     anexo
                                                                 </a>
                                                             @endif
                                                             <br>
                                                             <button type="button" class="btn btn-warning"
                                                                 data-bs-toggle="modal"
                                                                 data-bs-target="#editar_pesquisamercadologica{{ $pivot->id ?? '' }}Editar"
                                                                 data-bs-meta-id="{{ $pesquisa->id ?? '' }}">
                                                                 <i class="bi bi-pencil-square"></i>
                                                             </button>
                                                             <button type="button" class="btn btn-danger"
                                                                 data-bs-toggle="modal"
                                                                 data-bs-target="#excluir_pesquisamercadologica{{ $pivot->id ?? '' }}Excluir"
                                                                 data-bs-meta-id="{{ $pesquisa->id ?? '' }}">
                                                                 <i class="bi bi-x-square"></i>

                                                             </button>
                                                             @include('trdigital.edit.questoes.12pesquisamercadologica.editarpesquisamercadologica')

                                                             @include('trdigital.edit.questoes.12pesquisamercadologica.excluirpesquisamercadologica')

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
                                                             class="text-danger"> R$
                                                             {{ number_format($valorTotalMedio, 2) }} </b>
                                                     </h6>
                                                 </div>
                                             </div>
                                         </div>


                                         {!! Form::open([
                                             'route' => ['trdigital.pesquisa_mercadologica_destroy', $pesquisa->id],
                                             'method' => 'delete',
                                         ]) !!}


                                         {!! Form::close() !!}





                                         </h6>


                                     </div>
                                 </div>
                                 <!-- End Card with titles, buttons, and links -->
                             </div>
                     @endforeach
                 </div>

                 @include('trdigital.edit.questoes.12pesquisamercadologica.criarpesquisamercadologica')
                 @include('trdigital.edit.questoes.12pesquisamercadologica.editarpesquisamercadologica')

             </div>
         </div>
     </div>
 </div>
