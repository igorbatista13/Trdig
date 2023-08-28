    {{-- ITEM 4 --}}
    <div class="tab-pane fade" id="list-settings" role="tabpanel"
    aria-labelledby="list-settings-list">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> <big> <b> 4. </b> </big>Identificação do <b> Responsável pelo Projeto </b></h5>
            {!! Form::model($n_processo, ['method' => 'PATCH', 'route' => ['trdigital.update', $n_processo->id], 'enctype' => 'multipart/form-data']) !!}

            <!-- Floating Labels Form -->
            <form class="row g-3">
              <div class="col-md-12">
                  <div class="form-floating">
                    {!! Form::text('Nome_Resp_projeto', $n_processo->Resp_projeto->Nome_Resp_projeto, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingName']) !!}
                      <label for="floatingName">Nome Completo</label>
                  </div>
              <br></div>
              
              <div class="row">
              <div class="col-md-4">
                  <div class="form-floating">
                    {!! Form::number('Telefone_Resp_projeto', $n_processo->Resp_projeto->Telefone_Resp_projeto, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingName']) !!}
                    <label for="floatingName"></label>
                      <label for="floatingEmail">Telefone</label>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="form-floating">
                    {!! Form::number('CPF_Resp_projeto', $n_processo->Resp_projeto->CPF_Resp_projeto, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingName']) !!}
                    <label for="floatingName"></label>
                      <label for="floatingEmail">CPF</label>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="form-floating">
                    {!! Form::number('RG_Resp_projeto', $n_processo->Resp_projeto->RG_Resp_projeto, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingName']) !!}
                    <label for="floatingName"></label>
                      <label for="floatingEmail">RG</label>
                  </div>
              </div>
        
              </div>
              <br>
        
              <div class="col-12">
                  <div class="form-floating">
                    {!! Form::textarea('Endereco_Resp_projeto', $n_processo->Resp_projeto->Endereco_Resp_projeto, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingTextarea']) !!}

                      <label
                          for="floatingTextarea">Endereço</label>
                  </div><br>
                  <div class="row">

              <div class="col-md-4">
                  <div class="col-md-12">
                      <div class="form-floating">
                        {!! Form::text('Cidade_Resp_projeto', $n_processo->Resp_projeto->Cidade_Resp_projeto, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingCity']) !!}                                                                                      
                        <label for="floatingCity">Cidade</label>
                      </div>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="form-floating mb-3">
                    <select class="form-select" name="Estado_Resp_projeto" id="floatingSelect" aria-label="State">
                        <option value="" disabled selected>Selecione um estado</option>
                        <option value="Acre" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Acre' ? 'selected' : '' }}>Acre (AC)</option>
                        <option value="Alagoas" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Alagoas' ? 'selected' : '' }}>Alagoas (AL)</option>
                        <option value="Amapá" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Amapá' ? 'selected' : '' }}>Amapá (AP)</option>
                        <option value="Amazonas" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Amazonas' ? 'selected' : '' }}>Amazonas (AM)</option>
                        <option value="Bahia" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Bahia' ? 'selected' : '' }}>Bahia (BA)</option>
                        <option value="Ceará" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Ceará' ? 'selected' : '' }}>Ceará (CE)</option>
                        <option value="Distrito Federal" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Distrito Federal' ? 'selected' : '' }}>Distrito Federal (DF)</option>
                        <option value="Espírito Santo" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Espírito Santo' ? 'selected' : '' }}>Espírito Santo (ES)</option>
                        <option value="Goiás" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Goiás' ? 'selected' : '' }}>Goiás (GO)</option>
                        <option value="Maranhão" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Maranhão' ? 'selected' : '' }}>Maranhão (MA)</option>
                        <option value="Mato Grosso" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Mato Grosso' ? 'selected' : '' }}>Mato Grosso (MT)</option>
                        <option value="Mato Grosso do Sul" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Mato Grosso do Sul' ? 'selected' : '' }}>Mato Grosso do Sul (MS)</option>
                        <option value="Minas Gerais" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Minas Gerais' ? 'selected' : '' }}>Minas Gerais (MG)</option>
                        <option value="Pará" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Pará' ? 'selected' : '' }}>Pará (PA)</option>
                        <option value="Paraíba" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Paraíba' ? 'selected' : '' }}>Paraíba (PB)</option>
                        <option value="Paraná" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Paraná' ? 'selected' : '' }}>Paraná (PR)</option>
                        <option value="Pernambuco" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Pernambuco' ? 'selected' : '' }}>Pernambuco (PE)</option>
                        <option value="Piauí" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Piauí' ? 'selected' : '' }}>Piauí (PI)</option>
                        <option value="Rio de Janeiro" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Rio de Janeiro' ? 'selected' : '' }}>Rio de Janeiro (RJ)</option>
                        <option value="Rio Grande do Norte" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Rio Grande do Norte' ? 'selected' : '' }}>Rio Grande do Norte (RN)</option>
                        <option value="Rio Grande do Sul" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Rio Grande do Sul' ? 'selected' : '' }}>Rio Grande do Sul (RS)</option>
                        <option value="Rondônia" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Rondônia' ? 'selected' : '' }}>Rondônia (RO)</option>
                        <option value="Roraima" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Roraima' ? 'selected' : '' }}>Roraima (RR)</option>
                        <option value="Santa Catarina" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Santa Catarina' ? 'selected' : '' }}>Santa Catarina (SC)</option>
                        <option value="São Paulo" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'São Paulo' ? 'selected' : '' }}>São Paulo (SP)</option>
                        <option value="Sergipe" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Sergipe' ? 'selected' : '' }}>Sergipe (SE)</option>
                        <option value="Tocantins" {{ $n_processo->Resp_projeto->Estado_Resp_projeto == 'Tocantins' ? 'selected' : '' }}>Tocantins (TO)</option>
                    </select>

                      <label
                          for="floatingSelect">Estado</label>
                  </div>
              </div>

              <div class="col-md-4">
                <div class="form-floating">
                  {!! Form::text('Cep_Resp_projeto', $n_processo->Resp_projeto->Cep_Resp_projeto, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingZip']) !!}                                                                                                                                                                                                                                                         
                    <label for="floatingZip">CEP</label>
                </div>
                
            </div>


              <div class="text-center">
                  <button type="submit"
                      class="btn btn-primary btn-lg">Salvar</button>
            
              </div>

          <!-- End floating Labels Form -->

      </div>
  </div>
</div>
</div> 
</div> 
