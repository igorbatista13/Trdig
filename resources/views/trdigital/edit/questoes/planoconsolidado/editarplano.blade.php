<!-- Editar Plano COnsolidado -->
{!! Form::close() !!}

<div class="modal fade" id="editarplano{{ $planos->id }}Editar" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-exclamation-octagon me-1 text-warning"></i> Editar Plano
                    Consolidado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['method' => 'PUT', 'route' => ['trdigital.planoconsolidadoupdate', $planos->id]]) !!}

                <div class="modal-body">

                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">

                                {!! Form::select(
                                    'Natureza',
                                    [
                                        '' => 'Selecione a Natureza',
                                        '3191.11 - Pessoal' => '3191.11 - Pessoal',
                                        '3390.14 - Diárias' => '3390.14 - Diárias',
                                        '3390.15 - Diárias Militares' => '3390.15 - Diárias Militares',
                                        '3390.30 - Material de Consumo' => '3390.30 - Material de Consumo',
                                        '3390.33 - Passagens' => '3390.33 - Passagens',
                                        '3390.35 - Consultorias' => '3390.35 - Consultorias',
                                        '3390.36 - Serviços de Terceiros - Pessoa Física' => '3390.36 - Serviços de Terceiros - Pessoa Física',
                                        '3390.39 - Serviços de Terceiros - Pessoa Jurídica' => '3390.39 - Serviços de Terceiros - Pessoa Jurídica',
                                        '4490.51 - Obras Civis' => '4490.51 - Obras Civis',
                                        '4490.52 - Equipamentos e Material Permanente' => '4490.52 - Equipamentos e Material Permanente',
                                        '4590.61 - Aquisição de Imóveis' => '4590.61 - Aquisição de Imóveis',
                                        'Outros' => 'Outros',
                                    ],
                                    $planos->Natureza ?? null,
                                    [
                                        // Substitua $seuModel pelo nome correto da variável que contém os dados do seu modelo
                                        'class' => 'form-control custom-select',
                                        'required' => true,
                                        'id' => 'NaturezaSelect',
                                    ],
                                ) !!}


                                <label for="floatingName"> Natureza </label>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div id="NaturezaInput"
                                    style="display: {{ $planos->Natureza === 'Outros' ? 'block' : 'none' }}">
                                    <label for="outrosNaturezaInput" class="text-danger"> Digite a natureza:</label>
                                    {!! Form::text('OutrosNatureza', $planos->OutrosNatureza, [
                                        'class' => 'form-control',
                                        'id' => 'outrosNaturezaInput',
                                    ]) !!}
                                </div>


                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-floating">

                                    <select name="metas_id" id="metas_id" class="form-control custom-select" required>
                                        <option value="{{ $planos->metas_id }}" disabled selected>
                                            {{ $planos->Metas->Especificacao_metas }}</option>
                                        @foreach ($metas as $meta)
                                            <option value="{{ $meta->id }}"
                                                {{ $planos->metas_id == $meta->id ? 'selected' : '' }}>
                                                {{ $meta->Especificacao_metas }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <label for="floatingName"></label>
                                    <label for="floatingEmail">Discriminação</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="floatingEmail">Valor - Concedente</label>
                                <small class="text-primary"> (Recurso Financeiro) </small>
                                <div class="form-floating">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">R$</span>

                                        {!! Form::text('Valor_concedente', number_format($planos->Valor_concedente, 2, ',', '.'), [
                                            'placeholder' => 'Complemento',
                                            'class' => 'form-control',
                                            'maxlength' => '15',
                                            'oninput' => 'aplicarMascara(this)',
                                            'onkeypress' => 'return validarValor(this, event)',
                                        ]) !!}
                                        <label for="floatingName"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="floatingCity">Valor Proponente</label>
                                <small class="text-primary"> (Contrapartida Financeira) </small>
                                <div class="form-floating">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">R$</span>

                                    {!! Form::text('Valor_proponente_financeira', number_format($planos->Valor_proponente_financeira, 2, ',', '.'), [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'maxlength' => '15',
                                        'oninput' => 'aplicarMascara(this)',
                                        'onkeypress' => 'return validarValor(this, event)',
                                    ]) !!}
                                </div>
                            </div>
                            </div>

                        </div>
                        <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="floatingCity">Valor Proponente</label>
                                    <small class="text-primary"> (Contrapartida Não Financeira) </small>
                                    <div class="form-floating">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">R$</span>
    
                                        {!! Form::text(
                                            'Valor_proponente_nao_financeira',
                                            number_format($planos->Valor_proponente_nao_financeira, 2, ',', '.'),
                                            [
                                                'placeholder' => '',
                                                'class' => 'form-control',
                                                'maxlength' => '15',
                                                'oninput' => 'aplicarMascara(this)',
                                                'onkeypress' => 'return validarValor(this, event)',
                                            ],
                                        ) !!}
                                        </div>
                                        {{-- <label for="floatingCity">Valor Proponente - (Contrapartida Financeira)</label> --}}
                                    </div>
                                    
                                </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
                                </div>



                                <!-- End floating Labels Form -->

                            </div>
                    </div>

                </div>


                {!! Form::close() !!}
            </div>
        </div>
    </div><!-- End Vertically centered Modal-->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var naturezaSelect = document.getElementById('NaturezaSelect');
        var naturezaInput = document.getElementById('NaturezaInput');

        naturezaSelect.addEventListener('change', function() {
            if (this.value === 'Outros') {
                naturezaInput.style.display = 'block';
            } else {
                naturezaInput.style.display = 'none';
            }
        });

        // Dispare o evento 'change' ao carregar a página para verificar o estado inicial
        naturezaSelect.dispatchEvent(new Event('change'));
    });
</script>
