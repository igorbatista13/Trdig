{!! Form::close() !!}
@foreach ($pesquisa_mercadologica as $pesquisa)
    <div class="modal fade " id="excluir_pesquisanomemercadologica{{ $pesquisa->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered ">
            <div class=" alert alert-danger modal-content ">
           
                <div class="modal-body">

                    <div class="alert alert-danger fade show" role="alert">
                        <h4 class="alert-heading text-danger">  Tem certeza de que deseja excluir este registro? </h4>
                        <hr>
                        <h6> <b> Descrição do bem: </b>{{ $pesquisa->Descricao_bem ?? '' }}</h6>
                        <hr>
                        <h6 class="mb-0 "> <b> Qnt.</b>{{ $pesquisa->Qtd ?? '' }}</h6>

                    </div>

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
