      {{-- ITEM 3 --}}
      <div class="tab-pane fade" id="list-messages" role="tabpanel"
      aria-labelledby="list-messages-list">

             <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> <big> <b> 3. </b> </big>Identificação da <b> Instituição
                        Proponente </b></h5>

                    <!-- Floating Labels Form -->
                    <div class="row g-3">
                      <div class="col-md-12">
                          <div class="form-floating">
                            {!! Form::text('Nome_Instituicao', $n_processo->instituicao->Nome_Instituicao, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingName']) !!}
                            @if ($n_processo->instituicao && $n_processo->instituicao->Nome_Instituicao_sit == '')
                            @elseif ($n_processo->instituicao && $n_processo->instituicao->Nome_Instituicao_sit == 1)
                                <span class="badge bg-success">
                                    <i class="bi bi-check-circle me-1"></i> Validado</span>
                            @elseif ($n_processo->instituicao && $n_processo->instituicao->Nome_Instituicao_sit == 0)
                                <span class="badge bg-warning text-dark">
                                    <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                            @endif
                            <label for="floatingName">Nome da Instituição</label>
                          </div>
                      <br></div>
                      
                      <div class="row">
                      <div class="col-md-6">
                          <div class="form-floating">
                            {!! Form::number('CNPJ_Instituicao', $n_processo->instituicao->CNPJ_Instituicao, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingName']) !!}
                            @if ($n_processo->instituicao && $n_processo->instituicao->CNPJ_Instituicao_sit == '')
                            @elseif ($n_processo->instituicao && $n_processo->instituicao->CNPJ_Instituicao_sit == 1)
                                <span class="badge bg-success">
                                    <i class="bi bi-check-circle me-1"></i> Validado</span>
                            @elseif ($n_processo->instituicao && $n_processo->instituicao->CNPJ_Instituicao_sit == 0)
                                <span class="badge bg-warning text-dark">
                                    <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                            @endif
                            <label for="floatingName"></label>
                              <label for="floatingEmail">CNPJ</label>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-floating">
                            {!! Form::number('Telefone_Instituicao', $n_processo->instituicao->Telefone_Instituicao, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingName']) !!}
                            @if ($n_processo->instituicao && $n_processo->instituicao->Telefone_Instituicao_sit == '')
                            @elseif ($n_processo->instituicao && $n_processo->instituicao->Telefone_Instituicao_sit == 1)
                                <span class="badge bg-success">
                                    <i class="bi bi-check-circle me-1"></i> Validado</span>
                            @elseif ($n_processo->instituicao && $n_processo->instituicao->Telefone_Instituicao_sit == 0)
                                <span class="badge bg-warning text-dark">
                                    <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                            @endif
                            <label for="floatingName"></label>
                              <label for="floatingEmail">Telefone</label>
                          </div>
                      </div>
                
                      </div>
                      <br>

                      <div class="col-12">
                          <div class="form-floating">
                            {!! Form::text('Endereco_Instituicao', $n_processo->instituicao->Endereco_Instituicao, ['placeholder'=> 'a', 'class' => 'form-control', 'id'=> 'floatingTextarea']) !!}
                            @if ($n_processo->instituicao && $n_processo->instituicao->Endereco_Instituicao_sit == '')
                            @elseif ($n_processo->instituicao && $n_processo->instituicao->Endereco_Instituicao_sit == 1)
                                <span class="badge bg-success">
                                    <i class="bi bi-check-circle me-1"></i> Validado</span>
                            @elseif ($n_processo->instituicao && $n_processo->instituicao->Endereco_Instituicao_sit == 0)
                                <span class="badge bg-warning text-dark">
                                    <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                            @endif
                              <label
                                  for="floatingTextarea">Endereço</label>
                          </div><br>
                          <div class="row">

                      <div class="col-md-4">
                          <div class="col-md-12">
                              <div class="form-floating">
                                {!! Form::text('Cidade_Instituicao', $n_processo->instituicao->Cidade_Instituicao, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingCity']) !!}                                                                                      
                                @if ($n_processo->instituicao && $n_processo->instituicao->Cidade_Instituicao_sit == '')
                                @elseif ($n_processo->instituicao && $n_processo->instituicao->Cidade_Instituicao_sit == 1)
                                    <span class="badge bg-success">
                                        <i class="bi bi-check-circle me-1"></i> Validado</span>
                                @elseif ($n_processo->instituicao && $n_processo->instituicao->Cidade_Instituicao_sit == 0)
                                    <span class="badge bg-warning text-dark">
                                        <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                                @endif
                                <label for="floatingCity">Cidade</label>
                              </div>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-floating mb-3">
                            <select class="form-select" name="Estado_Instituicao" id="floatingSelect" aria-label="State">
                                <option value="" disabled selected>Selecione um estado</option>
                                <option value="Acre" {{ $n_processo->instituicao->Estado_Instituicao == 'Acre' ? 'selected' : '' }}>Acre (AC)</option>
                                <option value="Alagoas" {{ $n_processo->instituicao->Estado_Instituicao == 'Alagoas' ? 'selected' : '' }}>Alagoas (AL)</option>
                                <option value="Amapá" {{ $n_processo->instituicao->Estado_Instituicao == 'Amapá' ? 'selected' : '' }}>Amapá (AP)</option>
                                <option value="Amazonas" {{ $n_processo->instituicao->Estado_Instituicao == 'Amazonas' ? 'selected' : '' }}>Amazonas (AM)</option>
                                <option value="Bahia" {{ $n_processo->instituicao->Estado_Instituicao == 'Bahia' ? 'selected' : '' }}>Bahia (BA)</option>
                                <option value="Ceará" {{ $n_processo->instituicao->Estado_Instituicao == 'Ceará' ? 'selected' : '' }}>Ceará (CE)</option>
                                <option value="Distrito Federal" {{ $n_processo->instituicao->Estado_Instituicao == 'Distrito Federal' ? 'selected' : '' }}>Distrito Federal (DF)</option>
                                <option value="Espírito Santo" {{ $n_processo->instituicao->Estado_Instituicao == 'Espírito Santo' ? 'selected' : '' }}>Espírito Santo (ES)</option>
                                <option value="Goiás" {{ $n_processo->instituicao->Estado_Instituicao == 'Goiás' ? 'selected' : '' }}>Goiás (GO)</option>
                                <option value="Maranhão" {{ $n_processo->instituicao->Estado_Instituicao == 'Maranhão' ? 'selected' : '' }}>Maranhão (MA)</option>
                                <option value="Mato Grosso" {{ $n_processo->instituicao->Estado_Instituicao == 'Mato Grosso' ? 'selected' : '' }}>Mato Grosso (MT)</option>
                                <option value="Mato Grosso do Sul" {{ $n_processo->instituicao->Estado_Instituicao == 'Mato Grosso do Sul' ? 'selected' : '' }}>Mato Grosso do Sul (MS)</option>
                                <option value="Minas Gerais" {{ $n_processo->instituicao->Estado_Instituicao == 'Minas Gerais' ? 'selected' : '' }}>Minas Gerais (MG)</option>
                                <option value="Pará" {{ $n_processo->instituicao->Estado_Instituicao == 'Pará' ? 'selected' : '' }}>Pará (PA)</option>
                                <option value="Paraíba" {{ $n_processo->instituicao->Estado_Instituicao == 'Paraíba' ? 'selected' : '' }}>Paraíba (PB)</option>
                                <option value="Paraná" {{ $n_processo->instituicao->Estado_Instituicao == 'Paraná' ? 'selected' : '' }}>Paraná (PR)</option>
                                <option value="Pernambuco" {{ $n_processo->instituicao->Estado_Instituicao == 'Pernambuco' ? 'selected' : '' }}>Pernambuco (PE)</option>
                                <option value="Piauí" {{ $n_processo->instituicao->Estado_Instituicao == 'Piauí' ? 'selected' : '' }}>Piauí (PI)</option>
                                <option value="Rio de Janeiro" {{ $n_processo->instituicao->Estado_Instituicao == 'Rio de Janeiro' ? 'selected' : '' }}>Rio de Janeiro (RJ)</option>
                                <option value="Rio Grande do Norte" {{ $n_processo->instituicao->Estado_Instituicao == 'Rio Grande do Norte' ? 'selected' : '' }}>Rio Grande do Norte (RN)</option>
                                <option value="Rio Grande do Sul" {{ $n_processo->instituicao->Estado_Instituicao == 'Rio Grande do Sul' ? 'selected' : '' }}>Rio Grande do Sul (RS)</option>
                                <option value="Rondônia" {{ $n_processo->instituicao->Estado_Instituicao == 'Rondônia' ? 'selected' : '' }}>Rondônia (RO)</option>
                                <option value="Roraima" {{ $n_processo->instituicao->Estado_Instituicao == 'Roraima' ? 'selected' : '' }}>Roraima (RR)</option>
                                <option value="Santa Catarina" {{ $n_processo->instituicao->Estado_Instituicao == 'Santa Catarina' ? 'selected' : '' }}>Santa Catarina (SC)</option>
                                <option value="São Paulo" {{ $n_processo->instituicao->Estado_Instituicao == 'São Paulo' ? 'selected' : '' }}>São Paulo (SP)</option>
                                <option value="Sergipe" {{ $n_processo->instituicao->Estado_Instituicao == 'Sergipe' ? 'selected' : '' }}>Sergipe (SE)</option>
                                <option value="Tocantins" {{ $n_processo->instituicao->Estado_Instituicao == 'Tocantins' ? 'selected' : '' }}>Tocantins (TO)</option>
            
                            </select>
                            @if ($n_processo->instituicao && $n_processo->instituicao->Estado_Instituicao_sit == '')
                            @elseif ($n_processo->instituicao && $n_processo->instituicao->Estado_Instituicao_sit == 1)
                                <span class="badge bg-success">
                                    <i class="bi bi-check-circle me-1"></i> Validado</span>
                            @elseif ($n_processo->instituicao && $n_processo->instituicao->Estado_Instituicao_sit == 0)
                                <span class="badge bg-warning text-dark">
                                    <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                            @endif
                              <label
                                  for="floatingSelect">Estado</label>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-floating">
                            {!! Form::text('Cep_Instituicao', $n_processo->instituicao->Cep_Instituicao, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingZip']) !!}                                                                                                                                                                                                                                                         
                            @if ($n_processo->instituicao && $n_processo->instituicao->Cep_Instituicao_sit == '')
                            @elseif ($n_processo->instituicao && $n_processo->instituicao->Cep_Instituicao_sit == 1)
                                <span class="badge bg-success">
                                    <i class="bi bi-check-circle me-1"></i> Validado</span>
                            @elseif ($n_processo->instituicao && $n_processo->instituicao->Cep_Instituicao_sit == 0)
                                <span class="badge bg-warning text-dark">
                                    <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                            @endif
                            <label for="floatingZip">CEP</label>
                          </div>
                          
                      </div>
                      

                      <div class="col-md-6">
                          <div class="form-floating">
                            {!! Form::file('Anexo1_Instituicao', ['placeholder'=> 'a','class' => 'form-control', 'id' => 'formFile']) !!}
                            @if ($n_processo->instituicao && $n_processo->instituicao->Anexo1_Instituicao_sit == '')
                            @elseif ($n_processo->instituicao && $n_processo->instituicao->Anexo1_Instituicao_sit == 1)
                                <span class="badge bg-success">
                                    <i class="bi bi-check-circle me-1"></i> Validado</span>
                            @elseif ($n_processo->instituicao && $n_processo->instituicao->Anexo1_Instituicao_sit == 0)
                                <span class="badge bg-warning text-dark">
                                    <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                            @endif
                            <label for="floatingZip">Anexar Comprovante de Endereço</label>
                          </div>
                          @if ($n_processo->instituicao && $n_processo->instituicao->Anexo1_Instituicao)
                          <div class="icon">
                              <div class="col-md-12 iframe-container">
                                  <iframe src="{{ asset('storage/' . $n_processo->instituicao->Anexo1_Instituicao) }}"></iframe>
                              </div>
                              <a class="btn btn-primary" href="{{ asset('storage/' . $n_processo->instituicao->Anexo1_Instituicao) }}"
                                  target="_blank">
                                  <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                              </a>
                          </div>
                      @else
                          <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                      @endif
                      </div>

                      
                      <div class="col-md-6">
                          <div class="form-floating">
                            {!! Form::file('Anexo2_Instituicao', ['placeholder'=> 'a','class' => 'form-control', 'id' => 'formFile']) !!}
                            @if ($n_processo->instituicao && $n_processo->instituicao->Anexo2_Instituicao_sit == '')
                            @elseif ($n_processo->instituicao && $n_processo->instituicao->Anexo2_Instituicao_sit == 1)
                                <span class="badge bg-success">
                                    <i class="bi bi-check-circle me-1"></i> Validado</span>
                            @elseif ($n_processo->instituicao && $n_processo->instituicao->Anexo2_Instituicao_sit == 0)
                                <span class="badge bg-warning text-dark">
                                    <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                            @endif
                            <label for="floatingZip">Anexar Cartão CNPJ </label>
                          </div>
                          @if ($n_processo->instituicao && $n_processo->instituicao->Anexo2_Instituicao)
                          <div class="icon">
                              <div class="col-md-12 iframe-container">
                                  <iframe src="{{ asset('storage/' . $n_processo->instituicao->Anexo2_Instituicao) }}"></iframe>
                              </div>
                              <a class="btn btn-primary" href="{{ asset('storage/' . $n_processo->instituicao->Anexo2_Instituicao) }}"
                                  target="_blank">
                                  <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                              </a>
                          </div>
                      @else
                          <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                      @endif
                      </div>
          

                  <!-- End floating Labels Form -->

              </div>
              
            </div>
              <div class="text-center">
                <button type="submit"
                    class="btn btn-primary btn-lg">Salvar</button>

            </div>
      </div>
  </div>
 </div>
 </div>
