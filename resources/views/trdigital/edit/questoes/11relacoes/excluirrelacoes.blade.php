    <!-- Modal excluir Relação de Obras e Equipamentos -->
    <div class="modal fade" id="excluir_relacoes{{ $obras_equipamentos->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> <i class="bi bi-check-circle me-1 text-danger"><b>
                                Confirmar
                                Exclusão </b> </i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja excluir este registro <b> Relação de Obras e
                        Equipamentos? </b>
                    {{-- {{ $planodetalhados->id }} --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    {!! Form::open([
                        'route' => ['trdigital.obras_equipamento_destroy', $obras_equipamentos->id],
                        'method' => 'delete',
                    ]) !!}
                    <button type="submit" class="btn btn-danger">Excluir</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
