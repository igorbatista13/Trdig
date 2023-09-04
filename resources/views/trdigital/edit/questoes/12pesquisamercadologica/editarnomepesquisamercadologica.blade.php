<!-- Vertically centered Modal -->
{!! Form::close() !!}

<div class="modal fade" id="editar_pesquisanomemercadologica{{ $pesquisa->id }}" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered modal-lg">


        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">EDITAR DESCRIÇÃO DO BEM: <b> {{$pesquisa->Descricao_bem}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                {!! Form::open([
                    'method' => 'PUT',
                    'route' => ['trdigital.pesquisa_nome_mercadologica_update', $pesquisa->id],
                    'enctype' => 'multipart/form-data', // Adicionando o enctype
                ]) !!}
                

                <br>

                <div class="card-body">
                    <table class="table" id="products_table">
                        <thead>
                            <tr>
                            </tr>

                        </thead>

                        <tbody>
                            <tr id="product0">

                                <div class="row g-3">

                                    <div class="col-md-8">
                                        <div class="form-floating">
                                            {!! Form::text('Descricao_bem', $pesquisa->Descricao_bem, [
                                                'placeholder' => 'Descrição do item',
                                                'class' => 'form-control',
                                                'id' => 'floatingName',
                                                // 'readonly' => 'true',
                                                
                                            ]) !!}
                                            <label for="floatingName">Descrição do item</label>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            {!! Form::number('Qtd', $pesquisa->Qtd, [
                                                'placeholder' => 'Quantidade',
                                                'class' => 'form-control',
                                                'id' => 'floatingCity',

                                            ]) !!}
                                            <label for="floatingName">Quantidade</label>
                                        </div>

                                    </div>
                                    <td>
                                    
                                    </td>
                                </div>
                            </tr>
                            <tr id="product1"></tr>

                        </tbody>
                    </table>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
                    </div>
             
                </div>
            </div>
        </div>
    </div>
</div>
