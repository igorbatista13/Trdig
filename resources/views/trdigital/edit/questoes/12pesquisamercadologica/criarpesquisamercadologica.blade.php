<!-- Vertically centered Modal -->

<div class="modal fade" id="novo_pesquisa_mercadologica" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">


        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CADASTRO DE PESQUISA MERCADOLÓGICA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                {!! Form::open([
                    'route' => ['trdigital.pesquisa_mercadologica', $n_processo->id],
                    'method' => 'patch',
                    'enctype' => 'multipart/form-data',
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
                                            {!! Form::text('Descricao_bem', null, [
                                                'placeholder' => 'Descrição do item',
                                                'class' => 'form-control',
                                                'id' => 'floatingName',
                                            ]) !!}
                                            <label for="floatingName">Descrição do item</label>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            {!! Form::number('Qtd', null, [
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
                                                            {!! Form::text('Empresa[]', null, [
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
                                                            {!! Form::number('Valor[]', null, [
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
                    <div class="row">
                        <div class="col-md-12">

                            {{-- <button type="button" class="add-item btn btn-warning">Adicionar Nova Empresa</button> --}}
                            <button id="add_row" class="btn btn-success pull-left"> +
                                Adicionar Empresa</button>
                            <button id='delete_row' class="pull-right btn btn-danger"> -
                                Remover Empresa</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
