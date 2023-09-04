<!-- Modal de Edição da Pesquisa Mercadológica -->
<div class="modal fade" id="editar_pesquisa_mercadologica{{ $pivot->id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Editar Empresa: <b> {{$pivot->Empresa}} </b> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open([
                    'method' => 'PUT',
                    'route' => ['trdigital.pesquisa_mercadologica_update', $pivot->id],
                    'enctype' => 'multipart/form-data',
                ]) !!}

    
                <div class="mb-3">
                    <label for="empresa" class="form-label">Nome da Empresa</label>
                    {!! Form::text('Empresa', $pivot->Empresa, [
                        'class' => 'form-control',
                        'id' => 'empresa',
                    ]) !!}
                </div>
                <div class="mb-3">
                    <label for="valor" class="form-label">Valor</label>
                    {!! Form::number('Valor', $pivot->Valor, [
                        'class' => 'form-control',
                        'id' => 'valor',
                    ]) !!}
                </div>
                <div class="mb-3">
                    <label for="anexo" class="form-label">Anexar o Comprovante</label>
                    {!! Form::file('Anexo', ['class' => 'form-control', 'id' => 'anexo']) !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
