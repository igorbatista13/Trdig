{!! Form::close() !!}
@foreach ($pesquisa_mercadologica as $pesquisa)
        <div class="modal fade" id="excluir_pesquisanomemercadologica{{ $pesquisa->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> <i class="bi bi-check-circle me-1 text-danger"><b>
                                    Confirmar
                                    Exclusão? hein?? </b> </i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Tem certeza de que deseja excluir este registro <b> {{ $pesquisa->Descricao_bem ?? '' }} </b>
                            <br> <a class="text-primary">    </a>
                        {{-- {{ $planodetalhados->id }} --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        {!! Form::open([
                            'route' => ['trdigital.pesquisa_nome_mercadologica_destroy', $pesquisa->id],
                            'method' => 'delete',
                        ]) !!}
                        <button type="submit" class="btn btn-danger">Excluir</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
