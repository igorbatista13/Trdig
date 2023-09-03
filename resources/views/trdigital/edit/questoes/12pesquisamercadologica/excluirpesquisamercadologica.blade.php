{!! Form::close() !!}
@foreach ($pesquisa_mercadologica as $pesquisa)
    @foreach ($pesquisa->pesquisa_mercadologica_pivots as $pivot)
        <div class="modal fade" id="excluir_pesquisamercadologica{{ $pivot->id ?? '' }}Excluir" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered ">
                <div class=" alert alert-danger modal-content ">
               
                    <div class="modal-body">
                        <div class="alert alert-danger fade show" role="alert">
                            <h4 class="alert-heading text-danger">  Tem certeza de que deseja excluir este registro? </h4>
                            <hr>

                            <h6><i class="bi bi-building"> </i>  <b> Empresa: </b>{{ $pivot->Empresa ?? '' }}</h6>
                            <hr>
                            <h6 class="mb-0 "> <small>Valor Unid.:
                            </small> <b class="text-danger">R$
                                {{ $pivot->Valor ?? '' }}</small></b></h6>


                             
            

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
        </div>
    @endforeach
@endforeach
