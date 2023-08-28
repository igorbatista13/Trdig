  {{-- ITEM 2 --}}
  <div class="tab-pane fade" id="list-profile" role="tabpanel"
  aria-labelledby="list-profile-list">
  
  <div class="card">
  <div class="card-body">
      <h5 class="card-title"> <big><b> 2. </b> </big> Identificação do <b> Responsável
          pela Instituição. </b></h5>

      <!-- Floating Labels Form -->
      <div class="row g-3">
        <div class="col-md-12">
              <div class="form-floating">
                {!! Form::text('Nome', $n_processo->Resp_instituicao->Nome_Resp_Instituicao, ['placeholder'=> 'Nome_Resp_Instituicao','class' => 'form-control', 'id'=> 'floatingName']) !!}

                  <label for="floatingName">Nome Completo</label>
              </div>
          <br></div>

          <div class="row">
          <div class="col-md-4">
              <div class="form-floating">
                {!! Form::number('Telefone_Resp_Instituicao', $n_processo->Resp_instituicao->Telefone_Resp_Instituicao, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingName']) !!}
                  <label for="floatingEmail">Telefone</label>
              </div>
          </div>
          
          <div class="col-md-4">
              <div class="form-floating">
                {!! Form::email('Email_Resp_Instituicao', $n_processo->Resp_instituicao->Email_Resp_Instituicao, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingName']) !!}
                  <label for="floatingEmail">E-mail</label>
              </div>
          </div>
          <div class="col-md-4">
            <div class="form-floating">
              {!! Form::text('Cargo_Resp_Instituicao', $n_processo->Resp_instituicao->Cargo_Resp_Instituicao, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingName']) !!}
                <label for="floatingEmail">Cargo / Função</label>
            </div>
        </div>
          </div>
          <br>
    
          <div class="col-12">
              <div class="form-floating">
                {!! Form::textarea('End_Resp_Instituicao', $n_processo->Resp_instituicao->End_Resp_Instituicao, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingTextarea']) !!}

                  <label
                      for="floatingTextarea">Endereço</label>
              </div><br>
              <div class="row">

          <div class="col-md-4">
              <div class="col-md-12">
                  <div class="form-floating">
                    {!! Form::text('Cidade_Resp_Instituicao',  $n_processo->Resp_instituicao->Cidade_Resp_Instituicao, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingCity']) !!}                                                                                      
                    <label for="floatingCity">Cidade</label>
                  </div>
              </div>
          </div>

          <div class="col-md-4">
              <div class="form-floating mb-3">
                <select class="form-select" name="Estado_Resp_Instituicao" id="floatingSelect" aria-label="State">
                    <option value="" disabled selected>Selecione um estado</option>
                    <option value="Acre" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Acre' ? 'selected' : '' }}>Acre (AC)</option>
                    <option value="Alagoas" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Alagoas' ? 'selected' : '' }}>Alagoas (AL)</option>
                    <option value="Amapá" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Amapá' ? 'selected' : '' }}>Amapá (AP)</option>
                    
                    
                    <option value="Amazonas" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Amazonas' ? 'selected' : '' }}>Amazonas (AM)</option>
                    <option value="Bahia" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Bahia' ? 'selected' : '' }}>Bahia (BA)</option>
                    <option value="Ceará" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Ceará' ? 'selected' : '' }}>Ceará (CE)</option>
                    <option value="Distrito Federal" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Distrito Federal' ? 'selected' : '' }}>Distrito Federal (DF)</option>
                    <option value="Espírito Santo" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Espírito Santo' ? 'selected' : '' }}>Espírito Santo (ES)</option>
                    <option value="Goiás" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Goiás' ? 'selected' : '' }}>Goiás (GO)</option>
                    <option value="Maranhão" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Maranhão' ? 'selected' : '' }}>Maranhão (MA)</option>
                    <option value="Mato Grosso" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Mato Grosso' ? 'selected' : '' }}>Mato Grosso (MT)</option>
                    <option value="Mato Grosso do Sul" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Mato Grosso do Sul' ? 'selected' : '' }}>Mato Grosso do Sul (MS)</option>
                    <option value="Minas Gerais" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Minas Gerais' ? 'selected' : '' }}>Minas Gerais (MG)</option>
                    <option value="Pará" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Pará' ? 'selected' : '' }}>Pará (PA)</option>
                    <option value="Paraíba" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Paraíba' ? 'selected' : '' }}>Paraíba (PB)</option>
                    <option value="Paraná" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Paraná' ? 'selected' : '' }}>Paraná (PR)</option>
                    <option value="Pernambuco" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Pernambuco' ? 'selected' : '' }}>Pernambuco (PE)</option>
                    <option value="Piauí" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Piauí' ? 'selected' : '' }}>Piauí (PI)</option>
                    <option value="Rio de Janeiro" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Rio de Janeiro' ? 'selected' : '' }}>Rio de Janeiro (RJ)</option>
                    <option value="Rio Grande do Norte" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Rio Grande do Norte' ? 'selected' : '' }}>Rio Grande do Norte (RN)</option>
                    <option value="Rio Grande do Sul" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Rio Grande do Sul' ? 'selected' : '' }}>Rio Grande do Sul (RS)</option>
                    <option value="Rondônia" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Rondônia' ? 'selected' : '' }}>Rondônia (RO)</option>
                    <option value="Roraima" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Roraima' ? 'selected' : '' }}>Roraima (RR)</option>
                    <option value="Santa Catarina" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Santa Catarina' ? 'selected' : '' }}>Santa Catarina (SC)</option>
                    <option value="São Paulo" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'São Paulo' ? 'selected' : '' }}>São Paulo (SP)</option>
                    <option value="Sergipe" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Sergipe' ? 'selected' : '' }}>Sergipe (SE)</option>
                    <option value="Tocantins" {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao == 'Tocantins' ? 'selected' : '' }}>Tocantins (TO)</option>

                </select>
                
                  <label
                      for="floatingSelect">Estado</label>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-floating">
                {!! Form::text('Cep_Resp_Instituicao',  $n_processo->Resp_instituicao->Cep_Resp_Instituicao, ['placeholder'=> 'a','class' => 'form-control', 'id'=> 'floatingZip']) !!}                                                                                                                                                                                                                                                         
                  <label for="floatingZip">CEP</label>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-floating">

               
                {!! Form::file('Anexo1_Resp_Instituicao', ['class' => 'form-control']) !!}

                <label for="floatingZip">Anexar RG ou CPF</label>
              </div>
              <br>
              @if ($n_processo->Resp_instituicao && $n_processo->Resp_instituicao->Anexo1_Resp_Instituicao)
              <div class="icon">
                  <div class="col-md-12 iframe-container">
                      <iframe src="{{ asset('storage/' . $n_processo->Doc_anexo1->Comp_Oficio) }}"></iframe>
                  </div>
                  <a class="btn btn-primary" href="{{ asset('storage/' . $n_processo->Resp_instituicao->Anexo1_Resp_Instituicao) }}"
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
                
                {!! Form::file('Anexo2_Resp_Instituicao', ['class' => 'form-control']) !!}

                <label for="floatingZip">Anexar Comprovante de Endereço</label>
              </div><br>
              @if ($n_processo->Resp_instituicao && $n_processo->Resp_instituicao->Anexo2_Resp_Instituicao)
                    <div class="icon">
                        <div class="col-md-12 iframe-container">
                            <iframe src="{{ asset('storage/' . $n_processo->Resp_instituicao->Anexo2_Resp_Instituicao) }}"></iframe>
                        </div>
                        <a class="btn btn-primary" href="{{ asset('storage/' . $n_processo->Resp_instituicao->Anexo2_Resp_Instituicao) }}"
                            target="_blank">
                            <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                        </a>
                    </div>
                @else
                    <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                @endif
          </div> 

              </div>
                   
      <!-- End floating Labels Form -->

  </div>
  <div class="text-center">
    <button type="submit"
        class="btn btn-primary btn-lg">Salvar</button>

</div> 
  </div>
  </div>
  </div>
  </div>


