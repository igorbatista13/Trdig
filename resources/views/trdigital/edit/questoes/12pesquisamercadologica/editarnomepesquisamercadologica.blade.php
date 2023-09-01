<!-- Vertically centered Modal -->
{!! Form::close() !!}
@foreach ($pesquisa_mercadologica as $pesquisa)

<div class="modal fade" id="editar_pesquisanomemercadologica{{ $pesquisa->id }}" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered modal-lg">


        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">EDITAR NOME DE PESQUISA MERCADOLÓGICA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                {!! Form::open([
                    'method' => 'PUT',
                    'route' => ['trdigital.pesquisa_mercadologica_update', $pesquisa->id],
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
<script>
    $(document).ready(function() {
        let row_number = 1;
        $("#add_row").click(function(e) {
            e.preventDefault();
            let new_row_number = row_number - 1;
            $('#product' + row_number).html($('#product' + new_row_number).html());
            $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');

            // Atualize os IDs e nomes dos campos duplicados
            $('#product' + row_number).find('[id]').each(function() {
                let new_id = $(this).attr('id').replace(new RegExp(new_row_number, 'g'),
                    row_number);
                $(this).attr('id', new_id);
            });

            $('#product' + row_number).find('[name]').each(function() {
                let new_name = $(this).attr('name').replace(new RegExp(new_row_number, 'g'),
                    row_number);
                $(this).attr('name', new_name);
            });

            row_number++;
        });

        $("#delete_row").click(function(e) {
            e.preventDefault();
            if (row_number > 1) {
                $("#product" + (row_number - 1)).html('');
                row_number--;
            }
        });
    });
</script>
@endforeach