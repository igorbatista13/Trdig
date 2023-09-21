      {{-- ITEM 7 --}}
      <div class="tab-pane fade" id="list-Plano_consolidado" role="tabpanel" aria-labelledby="list-Plano_consolidado">
        {{-- {!! Form::open(['route' => 'metas.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} --}}

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"> <big> <b> 8. </b> </big>Plano de Aplicação Consolidado</b></h5>

                <!-- Floating Labels Form -->
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title text-center">PLANO DE APLICAÇÃO CONSOLIDADO </h5>
                    


                        {{-- <p>Add <code>.modal-dialog-centered</code> to <code>.modal-dialog</code> to vertically center
                            the modal.</p> --}}
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th> </th>
                                    <th><small>Natureza </small></th>
                                    <th><small>Discriminação </small></th>
                                    <th><small> Valor Conc.</small></th>
                                    <th><small>Valor Prop. <br><small class="text-primary">(Financeira) </small></th>
                                    <th><small>Valor Prop. <br><small class="text-primary"> (Não Financeira) </small>
                                    </th>
                          
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($planoconsolidado as $planoconsolidados)
                                    <tr>

                                        <td>

                                            {!! Form::open([
                                                'url' => route('trdigital.validar.planoconsolidado', ['id' => $n_processo->Plano_consolidado->id]),
                                                'method' => 'post',
                                            ]) !!}

                                            <input type="radio"
                                                name="plano_consolidado_sit[{{ $planoconsolidados->id }}]" value="1"
                                                class="form-check-input" id="gridRadios1_{{ $planoconsolidados->id }}"
                                                {{ old('plano_consolidado_sit.' . $planoconsolidados->id, $planoconsolidados->plano_consolidado_sit) == 1 ? 'checked' : '' }}>

                                            <label class="form-check-label"
                                                for="gridRadios1_{{ $planoconsolidados->id }}">
                                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                                                    Validado</span>
                                            </label>
<br>
                                            <input type="radio"
                                                name="plano_consolidado_sit[{{ $planoconsolidados->id }}]" value="0"
                                                class="form-check-input" id="gridRadios1_{{ $planoconsolidados->id }}"
                                                {{ old('plano_consolidado_sit.' . $planoconsolidados->id, $planoconsolidados->plano_consolidado_sit) == 0 ? 'checked' : '' }}>

                                            <label class="form-check-label"
                                                for="gridRadios2_{{ $planoconsolidados->id }}">
                                                <span class="badge bg-warning text-dark"><i
                                                        class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                                            </label>

                                        </td>

                                        
                                        <td>
                                            <h5> <span class="badge bg-success">
                                                    {{ $planoconsolidados->Metas->Especificacao_metas }} </span> </h5>
                                        </td>
                                        <td>
                                           <span class="text-success">R$
                                                    {{ number_format($planoconsolidados->Valor_concedente, 2, ',', '.') }}</span>
                                          
                                                  </td>
                                        <td>
                                            <span class="text-danger">
                                                    R$
                                                    {{ number_format($planoconsolidados->Valor_proponente_financeira, 2, ',', '.') }}
                                                   <span>
                                        </td>
                                        <td>
                                            <a><span class="text-danger">R$ {{ number_format($planoconsolidados->Valor_proponente_nao_financeira, 2, ',', '.') }}</span>
                        </a>
                                        </td>
                                        <td>
                              
                                        </td>

                                        <td>
                              
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>

                </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>





            
    
            </div>

        </div>
        </div>

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
        });
    </script>
