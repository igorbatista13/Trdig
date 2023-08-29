<div class="col-lg-12">
                                <div class="info-box card">
                                    <i class="bi bi-file-text"></i>
                                    <h3>3. Identificação da Instituição Proponente </h3>


                                    <h5 class="info-box text-primary">
                                        Nome da Instituição:<a class="text-dark">
                                            {{ $n_processo->instituicao->Nome_Instituicao }}<br> </a>
                                        CNPJ:<a class="text-dark">
                                            {{ $n_processo->instituicao->CNPJ_Instituicao }}<br></a>
                                        Telefone: <a
                                            class="text-dark">{{ $n_processo->instituicao->Telefone_Instituicao }}<br></a>
                                        Endereço:<a class="text-dark">
                                            {{ $n_processo->instituicao->Endereco_Instituicao }}<br></a>
                                        Cidade:<a class="text-dark">
                                            {{ $n_processo->instituicao->Cidade_Instituicao }}<br></a>
                                        Estado:<a class="text-dark">
                                            {{ $n_processo->instituicao->Estado_Instituicao }}<br></a>
                                        Cep: <a
                                            class="text-dark">{{ $n_processo->instituicao->Cep_Instituicao }}<br></a>

                                    </h5>
                                    <h3>Anexos</h3>

                                    @if ($n_processo->instituicao && $n_processo->instituicao->Anexo1_Instituicao)
                                        <h5 class="info-box text-primary"> Comprovante de Endereço</h5>
                                        <embed
                                            src="{{ asset('storage/' . $n_processo->instituicao->Anexo1_Instituicao) }}"
                                            width="100%" height="800px" />
                                        <embed {{ $n_processo->instituicao->Nome_Instituicao }} width="100%"
                                            height="800px" />
                                    @endif

                                    @if ($n_processo->instituicao && $n_processo->instituicao->Anexo2_Instituicao)
                                        <h5 class="info-box text-primary"> Cartão CNPJ </h5>
                                        <embed
                                            src="{{ asset('storage/' . $n_processo->instituicao->Anexo2_Instituicao) }}"
                                            width="100%" height="800px" />
                                        <embed {{ $n_processo->instituicao->Nome_Instituicao }} width="100%"
                                            height="800px" />
                                    @endif

                                </div>
                            </div>