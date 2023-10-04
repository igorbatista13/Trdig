<!-- Editar Plano COnsolidado -->
<!-- Vertically centered Modal -->
{!! Form::close() !!}

<div class="modal fade" id="editar_relacoes{{ $obras_equipamentos->id }}Editar" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-exclamation-octagon me-1 text-warning"></i> <b> CADASTRO DE OBRAS
                        E EQUIPAMENTOS / MATERIAL PERMANENTE </b>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['method' => 'PUT', 'route' => ['trdigital.obras_equipamento_update', $obras_equipamentos->id]]) !!}

                <div class="row g-3">

                    <div class="col-md-12">
                        <div class="form-floating">



                            <select name="Natureza_id" id="Natureza_id" class="form-control custom-select" required>
                                <option value="" disabled>Selecione a Natureza</option>
                                @foreach ($planoconsolidado as $planoconsolidados)
                                    <option value="{{ $planoDetalhados->id }}"
                                        {{ $planoconsolidados->id == $planoconsolidados->Natureza_id ? 'selected' : '' }}>
                                        {{ $planoconsolidados->Natureza }}
                                    </option>
                                @endforeach
                            </select>


                            <label for="floatingName">Natureza</label>
                        </div>
                        <br>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                {!! Form::text('Especificacao', $obras_equipamentos->Especificacao, [
                                    'placeholder' => 'Especificação',
                                    'class' => 'form-control',
                                    'id' => 'floatingName',
                                ]) !!}
                                <label for="floatingName"></label>
                                <label for="floatingEmail">Especificação</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">


                                {!! Form::select(
                                    'Unidade',
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
                                    $obras_equipamentos->Unidade,
                                    [
                                        'placeholder' => '',
                                        'class' => 'form-select', // Usamos 'form-select' para um estilo de dropdown do Bootstrap
                                        'id' => 'floatingName',
                                    ],
                                ) !!}

                                <label for="floatingName"></label>
                                <label for="floatingEmail">Unidade</label>
                            </div>
                        </div>

                    </div>
                    <br>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    {!! Form::number('Qtd', $obras_equipamentos->Qtd, [
                                        'placeholder' => 'Quantidade',
                                        'class' => 'form-control',
                                        'max' => '999999999999',
                                        'required' => true,
                                    ]) !!}
                                    <label for="floatingCity">Quantidade</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    {!! Form::text('Valor_unit', $obras_equipamentos->Valor_unit, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'maxlength' => '15',
                                        'required' => true,
                                        'oninput' => 'aplicarMascara(this)',
                                    ]) !!}
                                    <label for="floatingZip">Valor</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">

                                    <select name="Cidade_id" id="Cidade_id" class="form-control custom-select" required>
                                        <option value="" disabled selected>Selecione o Local de destino</option>
                                        @foreach ($cidade as $cidades)
                                            <option value="{{ $cidades->id }}"
                                                {{ $obras_equipamentos->Cidade_id == $cidades->id ? 'selected' : '' }}>
                                                {{ $cidades->Nome }}
                                            </option>
                                        @endforeach
                                    </select>


                                    <label for="floatingZip">Local de destino</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <div class="form-check">
                                        {!! Form::radio('Propriedade', 'Concedente', $obras_equipamentos->Propriedade == 'Concedente', [
                                            'class' => 'form-check-input',
                                            'id' => 'radioOpcao1',
                                            'required' => true,
                                        ]) !!}
                                        <label class="form-check-label" for="radioOpcao1">Concedente</label>
                                    </div>

                                    <div class="form-check">
                                        {!! Form::radio('Propriedade', 'Contrapartida', $obras_equipamentos->Propriedade == 'Contrapartida', [
                                            'class' => 'form-check-input',
                                            'id' => 'radioOpcao2',
                                        ]) !!}
                                        <label class="form-check-label" for="radioOpcao2">Contrapartida</label>
                                    </div>





                                    <!-- End floating Labels Form -->

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
                            </div>

                            {!! Form::close() !!}

                            <!-- End floating Labels Form -->

                        </div>
                    </div>

                </div>
            </div>
        </div><!-- End Vertically centered Modal-->

    </div>
</div>
