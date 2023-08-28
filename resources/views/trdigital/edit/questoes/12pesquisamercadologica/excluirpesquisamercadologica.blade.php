{!! Form::close() !!}
@foreach ($pesquisa_mercadologica as $pesquisa)
    @foreach ($pesquisa->pesquisa_mercadologica_pivots as $pivot)
        <div class="modal fade" id="excluir_pesquisamercadologica{{ $pesquisa->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> <i class="bi bi-check-circle me-1 text-danger"><b>
                                    Confirmar
                                    Exclusão </b> </i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Tem certeza de que deseja excluir este registro <b> Pesquisa
                            Mercadológica? </b>
                            <br> <a class="text-primary"> {{ $pivot->Empresa ?? '' }} </a>
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
