<!-- Editar Plano COnsolidado -->
{!! Form::close() !!}

<!-- Vertically centered Modal -->

<div class="modal fade" id="editar_cronograma{{ $cronograma_desembolsos->id }}Editar" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cronograma de Desembolso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['method' => 'PUT', 'route' => ['trdigital.cronograma_update', $cronograma_desembolsos->id]]) !!}

                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="form-floating">

                  
                          <select name="metas_id" id="metas_id" class="form-control custom-select" required>
                            <option value="" disabled selected>Selecione a Meta</option>
                            @foreach ($metas as $meta)
                                <option value="{{ $meta->id }}" {{ $cronograma_desembolsos->Metas->id == $meta->id ? 'selected' : '' }}>
                                    {{ $meta->Especificacao_metas }}
                                </option>
                            @endforeach
                        
                        
                      </select>
                      
                            <label for="floatingName">Meta</label>
                        </div>
                        <br>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">

                              {!! Form::select('ano', [
                                  '' => 'Selecione o Ano',
                                  '2023' => '2023',
                                  '2024' => '2024',
                                  '2025' => '2025',
                                  '2026' => '2026',
                                  '2027' => '2027',
                                  '2028' => '2028',
                                  '2029' => '2029',
                                  '2030' => '2030',
                   
                              ], $cronograma_desembolsos->ano, [
                                  'class' => 'form-control custom-select',
                                  'required' => true,
                                  'id' => 'ano'
                              ]) !!}


              
                                <label for="floatingName"></label>
                                <label for="floatingEmail">Ano</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                              {!! Form::select('mes', [
                                  '' => 'Selecione o mês',
                                  'Janeiro' => 'Janeiro',
                                  'Fevereiro' => 'Fevereiro',
                                  'Março' => 'Março',
                                  'Abril' => 'Abril',
                                  'Maio' => 'Maio',
                                  'Junho' => 'Junho',
                                  'Julho' => 'Julho',
                                  'Agosto' => 'Agosto',
                                  'Setembro' => 'Setembro',
                                  'Outubro' => 'Outubro',
                                  'Novembro' => 'Novembro',
                                  'Dezembro' => 'Dezembro',
                              ], $cronograma_desembolsos->mes, [
                                  'class' => 'form-control custom-select',
                                  'required' => true,
                                  'id' => 'mes'
                              ]) !!}

                     
                                <label for="floatingName"></label>
                                <label for="floatingEmail">Mês</label>
                            </div>
                        </div>

                    </div>
                    <br>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <h5> Fonte:</h5>

                                    <div class="form-check">
                                        {!! Form::radio('fonte', 'Concedente', $cronograma_desembolsos->fonte === 'Concedente', ['class' => 'form-check-input', 'id' => 'radioOpcao1']) !!}
                                        <label class="form-check-label" for="radioOpcao1">Concedente</label>
                                    </div>
                                    
                                    <div class="form-check">
                                        {!! Form::radio('fonte', 'Contrapartida', $cronograma_desembolsos->fonte === 'Contrapartida', ['class' => 'form-check-input', 'id' => 'radioOpcao2']) !!}
                                        <label class="form-check-label" for="radioOpcao2">Contrapartida</label>
                                    </div>
                                    
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="floatingZip">Valor</label>
                                <div class="form-floating">                                    
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">R$</span>
                
                                    {!! Form::text('valor_desembolso', number_format($cronograma_desembolsos->valor_desembolso, 2, ',', '.'), [
                                        'placeholder' => 'a',
                                        'class' => 'form-control',
                                        'class' => 'form-control',
                                        'maxlength' => '15',
                                        
                                        'oninput' => 'aplicarMascara(this)',
                                        'onkeypress' => 'return validarValor(this, event)',
                                    ]) !!}
                                </div>
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
        </div>
    </div>
</div><!-- End Vertically centered Modal-->

                        