<!-- Editar Plano Detalhado -->
{!! Form::close() !!}
<div class="modal fade" id="editarplanodetalhado{{ $planodetalhados->id }}Editar" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-exclamation-octagon me-1 text-warning"></i> Editar Registro Plano Detalhado - <b> Memória de Cálculo </b> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- {!! Form::open(['route' => ['trdigital.planoconsolidado', $n_processo->id], 'method' => 'patch']) !!} --}}
                {!! Form::open(['method' => 'PUT', 'route' => ['trdigital.planodetalhado_update', $planodetalhados->id]]) !!}

                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="form-floating">


                            <select name="Natureza_id" id="Natureza_id"
                            class="form-control custom-select" required>
                            <option value="" disabled selected>Selecione a Natureza
                            </option>
                            @foreach ($planoconsolidado as $planoDetalhados)
                                <option value="{{ $planoDetalhados->id }}">
                                    {{ $planoDetalhados->Natureza }}
                                </option>
                            @endforeach
                        </select>



                            <label for="floatingName">Natureza</label>
                        </div>
                        <br>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-floating">

                                {!! Form::text('Produto_Servico_detalhado', $planodetalhados->Produto_Servico_detalhado, [
                                    'placeholder' => 'Produto ou Serviço',
                                    'class' => 'form-control',
                                    'id' => 'floatingName',
                                ]) !!}

                                <label for="floatingName"></label>
                                <label for="floatingEmail">Produto ou Serviço</label>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">

                        
                                {!! Form::select(
                                    'ass',
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
                                    $planodetalhados->Unidade_medida_detalhado,
                                    [
                                        'placeholder' => '',
                                        'class' => 'form-select', // Usamos 'form-select' para um estilo de dropdown do Bootstrap
                                        'id' => 'floatingName',
                                    ],
                                ) !!}

                                <label for="floatingEmail">Unidade de Medida</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                {!! Form::number('Quantidade_detalhado', $planodetalhados->Quantidade_detalhado, [
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
                                    {!! Form::number('Valor_unit_detalhado', $planodetalhados->Valor_unit_detalhado, [
                                        'placeholder' => 'a',
                                        'class' => 'form-control',
                                        'id' => 'floatingCity',
                                    ]) !!}
                                    <label for="floatingCity">Valor Unit.</label>
                                    {{-- <label for="floatingCity">Valor Proponente - (Contrapartida Financeira)</label> --}}
                                </div>
                            </div>



                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
                            </div>


                            <!-- End floating Labels Form -->
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div><!-- End Vertically centered Modal-->
