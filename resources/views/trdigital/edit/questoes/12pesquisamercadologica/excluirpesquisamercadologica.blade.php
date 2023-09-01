{!! Form::close() !!}
@foreach ($pesquisa_mercadologica as $pesquisa)
    @foreach ($pesquisa->pesquisa_mercadologica_pivots as $pivot)
        <div class="modal fade" id="excluir_pesquisamercadologica{{ $pivot->id ?? '' }}Excluir" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> <i class="bi bi-check-circle me-1 text-danger"><b>
                                    Confirmar
                                    Exclusão </b> </i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Tem certeza de que deseja excluir este registro <b> {{ $pivot->Empresa ?? '' }} </b>
                        <div class="card">
                            <div class="card-body">

                                <br> <a class="text-primary"> <i class="bi bi-building"> </i>
                                </a>{{ $pivot->Empresa ?? '' }}
                                <h6 class="card-subtitle mb-2 text-primary"><small>Valor Unid.:
                                    </small> <b class="text-danger">R$
                                        {{ $pivot->Valor ?? '' }}</small></b></h6>

                                <h6 class="card-subtitle mb-2 text-primary">
                                    <small>Quantidade:</small> <b class="text-dark">{{ $pesquisa->Qtd ?? '' }}</b>
                                </h6>

                                <h6 class="card-subtitle mb-2 text-primary">
                                    <small>Total:</small> <b class="text-danger">R$
                                        {{ $pivot->Valor * $pesquisa->Qtd }} </b>
                                </h6>
                            </div>
                        </div>

                        {{-- {{ $planodetalhados->id }} --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        {!! Form::open([
                            'route' => ['trdigital.pesquisa_mercadologica_destroy', $pivot->id],
                            'method' => 'delete',
                        ]) !!}                        
                        <button type="submit" class="btn btn-danger">Excluir</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endforeach
