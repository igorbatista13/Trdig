<!-- Vertically centered Modal -->
{!! Form::close() !!}
@foreach ($pesquisa_mercadologica as $pesquisa)
@foreach ($pesquisa->pesquisa_mercadologica_pivots as $pivot)

<div class="modal fade" id="editar_pesquisamercadologica{{ $pivot->id ?? '' }}Editar" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered modal-lg">


        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CADASTRO DE PESQUISA MERCADOLÓGICA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                      {!! Form::open(['method' => 'PUT', 'route' => ['trdigital.pesquisa_mercadologica_update', $pesquisa->id]]) !!} 


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
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="form-floating">
                                                            {!! Form::text('Empresa[]', $pivot->Empresa, [
                                                                'placeholder' => 'Empresa',
                                                                'class' => 'form-control',
                                                                'id' => 'floatingName',
                                                            ]) !!}
                                                            <label for="floatingName"></label>
                                                            <label for="floatingEmail">Nome da
                                                                Empresa</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-floating">
                                                            {!! Form::number('Valor[]', $pivot->Valor, [
                                                                'placeholder' => 'Valor',
                                                                'class' => 'form-control',
                                                                'id' => 'floatingZip',
                                                            ]) !!}
                                                            <label for="floatingZip">Valor</label>
                                                        </div>
                                                    </div>

                                                </div>



                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-floating">

                                                            {!! Form::file('Anexo[]', ['placeholder' => 'Anexo', 'class' => 'form-control', 'id' => 'formFile']) !!}


                                                            <label for="floatingZip">Anexar o
                                                                Comprovante</label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <nav class="d-flex justify-content-center">
                                                        <ol class="breadcrumb">
                                                            <li class="breadcrumb-item active">
                                                                <a>Informações individuais da
                                                                    Empresa</a>
                                                            </li>
                                                        </ol>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
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
@endforeach
@endforeach