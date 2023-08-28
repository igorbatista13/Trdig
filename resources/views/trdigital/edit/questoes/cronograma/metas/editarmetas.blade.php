<!-- Editar METAS -->
{!! Form::close() !!}
<div class="modal fade" id="editarmeta{{ $meta->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-exclamation-octagon me-1 text-warning"></i><b> Editar Meta </b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['method' => 'PUT', 'route' => ['trdigital.metasupdate', $meta->id  ]]) !!}
                    <input type="hidden" class="form-control" id="metas_id" name="metas_id" value="{{ $meta->id }}">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">

                            {!! Form::text('Especificacao_metas', $meta->Especificacao_metas, [
                                'placeholder' => 'Especificacao_metas',
                                'class' => 'form-control',
                                'id' => 'floatingName',
                            ]) !!}
                            <label for="floatingName">Especificação</label>
                        </div>
                        <br>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                {!! Form::select(
                                    'Unidade_medida_metas',
                                    [
                                        'Ano.' => 'Ano',
                                          'Atendidos' => 'Atendidos',
                                          'Atendimentos' => 'Atendimentos',
                                          'Dias' => 'Dias',
                                          'Meses' => 'Meses',
                                          'Pessoas' => 'Pessoas',
                                          'Porcentagem' => 'Porcentagem',
                                          'Unidade' => 'Unidade',
                                          'Quantidade' => 'Quantidade',
                                    ],
                                    $meta->Unidade_medida_metas,
                                    [
                                        'placeholder' => '',
                                        'class' => 'form-select', // Usamos 'form-select' para um estilo de dropdown do Bootstrap
                                        'id' => 'floatingName',
                                    ],
                                ) !!}
                                <label for="floatingName"></label>
                                <label for="floatingEmail">Unidade de Medida</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                {!! Form::text('Quantidade_metas', $meta->Quantidade_metas, [
                                    'placeholder' => '',
                                    'class' => 'form-control',
                                    'id' => 'floatingName',
                                ]) !!}
                                <label for="floatingName"></label>
                                <label for="floatingEmail">Quantidade</label>
                            </div>
                        </div>

                    </div>
                    <br>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    {!! Form::date('Inicio_metas', $meta->Inicio_metas, [
                                        'placeholder' => 'a',
                                        'class' => 'form-control',
                                        'id' => 'floatingCity',
                                    ]) !!}
                                    <label for="floatingCity">Início</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    {!! Form::date('Termino_metas', $meta->Termino_metas, [
                                        'placeholder' => 'a',
                                        'class' => 'form-control',
                                        'id' => 'floatingZip',
                                    ]) !!}
                                    <label for="floatingZip">Término</label>
                                </div>
                            </div>




                            <!-- End floating Labels Form -->

                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit"
                    class="btn btn-primary btn-lg">Salvar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#editarmeta').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var metaId = button.data('bs-meta-id');
            var form = $('#editarmeta').find('form');
            var action = form.attr('action');
            action = action.replace('__META_ID__', metaId);
            form.attr('action', action);
            $('#metaId').val(metaId);
        });
    });
</script>





