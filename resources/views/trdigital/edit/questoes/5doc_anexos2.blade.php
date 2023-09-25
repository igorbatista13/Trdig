{!! Form::close() !!}

<div class="tab-pane fade" id="list-atas" role="tabpanel" aria-labelledby="list-atas-list">
    <div class="card-body">
        <h5 class="card-title"><b> <big> 5. </b> </big> Atas, Certidões, Comprovantes e Declarações (Anexar):</h5>
        {!! Form::model($n_processo, [
            'method' => 'PUT',
            'route' => ['trdigital.update_doc_anexo2', $n_processo->id],
            'enctype' => 'multipart/form-data',
        ]) !!}

        @if (auth()->check())
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        @endif
        <input type="hidden" name="Orgao_Concedente" id="Orgao_Concedente"
        value="{{ $n_processo->Orgao_Concedente }}">


        <!-- Default Accordion -->
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <strong> <big> A) </strong> </big> Cópia da Ata da Assembleia de Fundação ou Constituição ou do
                        Estatuto Social, ou Regimento Interno, conforme o caso
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo1_sit == '')
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo1_sit == 1)
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle me-1"></i> Validado</span>
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo1_sit == 0)
                            <span class="badge bg-warning text-dark">
                                <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                        @endif
                    </button>

                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo1_sit == 1)
                        @else
                            {!! Form::file('Doc_Anexo2_Anexo1', ['placeholder' => 'a', 'class' => 'form-control', 'id' => 'formFile']) !!}
                        @endif
                    </div>
                    @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo1)
                        <div class="icon">
                            <div class="col-md-12 iframe-container">
                                <iframe
                                    src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo1) }}"></iframe>
                            </div>
                            <a class="btn btn-primary"
                                href="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo1) }}"
                                target="_blank">
                                <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                            </a>
                        </div>
                    @else
                        <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                    @endif
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <strong> <big> B) </strong> </big> Certidão de Habilitação Plena @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo2_sit == '')
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo2_sit == 1)
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle me-1"></i> Validado</span>
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo2_sit == 0)
                            <span class="badge bg-warning text-dark">
                                <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                        @endif
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo2_sit == 1)
                        @else
                            {!! Form::file('Doc_Anexo2_Anexo2', ['class' => 'form-control', 'id' => 'formFile']) !!}
                        @endif
                    </div>
                    @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo2)
                        <div class="icon">
                            <div class="col-md-12 iframe-container">
                                <iframe
                                    src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo2) }}"></iframe>
                            </div>
                            <a class="btn btn-primary"
                                href="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo2) }}"
                                target="_blank">
                                <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                            </a>
                        </div>
                    @else
                        <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                    @endif
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <strong> <big> C) </strong> </big> Certidão de ausência de irregularidades / impedimentos
                        perante TCU / TCE e CGE;
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo3_sit == '')
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo3_sit == 1)
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle me-1"></i> Validado</span>
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo3_sit == 0)
                            <span class="badge bg-warning text-dark">
                                <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                        @endif

                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo3_sit == 1)
                        @else
                            {!! Form::file('Doc_Anexo2_Anexo3', ['class' => 'form-control', 'id' => 'formFile']) !!}
                        @endif
                    </div>
                    @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo3)
                        <div class="icon">
                            <div class="col-md-12 iframe-container">
                                <iframe
                                    src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo3) }}"></iframe>
                            </div>
                            <a class="btn btn-primary"
                                href="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo3) }}"
                                target="_blank">
                                <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                            </a>
                        </div>
                    @else
                        <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                    @endif
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#e" aria-expanded="false" aria-controls="e">
                        <strong> <big> D) </strong> </big> Cópia do Ato de Eleição de nomeação ou posse da Mesa Diretora
                        e Dirigente, conforme o caso.
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo5_sit == '')
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo5_sit == 1)
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle me-1"></i> Validado</span>
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo5_sit == 0)
                            <span class="badge bg-warning text-dark">
                                <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                        @endif

                    </button>
                </h2>
                <div id="e" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo5_sit == 1)
                        @else
                            {!! Form::file('Doc_Anexo2_Anexo5', ['class' => 'form-control', 'id' => 'formFile']) !!}
                        @endif
                    </div>
                    @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo5)
                        <div class="icon">
                            <div class="col-md-12 iframe-container">
                                <iframe
                                    src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo5) }}"></iframe>
                            </div>
                            <a class="btn btn-primary"
                                href="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo5) }}"
                                target="_blank">
                                <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                            </a>
                        </div>
                    @else
                        <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                    @endif
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#f" aria-expanded="false" aria-controls="f">
                        <strong> <big> E) </strong> </big> Comprovante de Abertura de Conta e Extrato de Conta Bancária
                        zerada e específica para a formalização do Instrumento.
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo6_sit == '')
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo6_sit == 1)
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle me-1"></i> Validado</span>
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo6_sit == 0)
                            <span class="badge bg-warning text-dark">
                                <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                        @endif
                    </button>
                </h2>
                <div id="f" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo6_sit == 1)
                        @else
                            {!! Form::file('Doc_Anexo2_Anexo6', ['class' => 'form-control', 'id' => 'formFile']) !!}
                        @endif
                    </div>
                    @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo6)
                        <div class="icon">
                            <div class="col-md-12 iframe-container">
                                <iframe
                                    src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo6) }}"></iframe>
                            </div>
                            <a class="btn btn-primary"
                                href="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo6) }}"
                                target="_blank">
                                <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                            </a>
                        </div>
                    @else
                        <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                    @endif
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#g" aria-expanded="false" aria-controls="g">
                        <strong> <big> F) </strong> </big>Comprovação da qualificação técnica e da capacidade
                        operacional, mediante comprovação de funcionamento regular.
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo7_sit == '')
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo7_sit == 1)
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle me-1"></i> Validado</span>
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo7_sit == 0)
                            <span class="badge bg-warning text-dark">
                                <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                        @endif
                    </button>
                </h2>
                <div id="g" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo7_sit == 1)
                        @else
                            {!! Form::file('Doc_Anexo2_Anexo7', ['class' => 'form-control', 'id' => 'formFile']) !!}
                        @endif
                    </div>
                    @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo7)
                        <div class="icon">
                            <div class="col-md-12 iframe-container">
                                <iframe
                                    src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo7) }}"></iframe>
                            </div>
                            <a class="btn btn-primary"
                                href="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo7) }}"
                                target="_blank">
                                <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                            </a>
                        </div>
                    @else
                        <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                    @endif
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#h" aria-expanded="false" aria-controls="h">
                        <strong> <big> G) </strong> </big> Comprovação de Experiência Prévia na Realização de Parcerias
                        com objetos semelhantes – (Anexar Cópia de Publicações e Parcerias executadas ou em andamento).
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo8_sit == '')
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo8_sit == 1)
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle me-1"></i> Validado</span>
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo8_sit == 0)
                            <span class="badge bg-warning text-dark">
                                <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                        @endif
                    </button>
                </h2>
                <div id="h" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo8_sit == 1)
                        @else
                            {!! Form::file('Doc_Anexo2_Anexo8', ['class' => 'form-control', 'id' => 'formFile']) !!}
                        @endif
                    </div>
                    @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo8)
                        <div class="icon">
                            <div class="col-md-12 iframe-container">
                                <iframe
                                    src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo8) }}"></iframe>
                            </div>
                            <a class="btn btn-primary"
                                href="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo8) }}"
                                target="_blank">
                                <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                            </a>
                        </div>
                    @else
                        <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                    @endif
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#i" aria-expanded="false" aria-controls="i">
                        <strong> <big> H) </strong> </big> Declaração que comprove a regularidade do mandato de sua
                        diretoria, da realização de assembleias ordinárias e da atividade regular, com validade restrita
                        ao exercício de sua emissão, quando for o caso.
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo9_sit == '')
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo9_sit == 1)
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle me-1"></i> Validado</span>
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo9_sit == 0)
                            <span class="badge bg-warning text-dark">
                                <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                        @endif
                    </button>
                </h2>
                <div id="i" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo9_sit == 1)
                        @else
                            {!! Form::file('Doc_Anexo2_Anexo9', ['class' => 'form-control', 'id' => 'formFile']) !!}
                        @endif
                    </div>
                    @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo9)
                        <div class="icon">
                            <div class="col-md-12 iframe-container">
                                <iframe
                                    src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo9) }}"></iframe>
                            </div>
                            <a class="btn btn-primary"
                                href="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo9) }}"
                                target="_blank">
                                <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                            </a>
                        </div>
                    @else
                        <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                    @endif
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#j" aria-expanded="false" aria-controls="j">
                        <strong> <big> I) </strong> </big> Declaração de Capacidade Administrativa, Técnica e Gerencial
                        Para a Execução do Plano De Trabalho (modelo em anexo);
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo10_sit == '')
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo10_sit == 1)
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle me-1"></i> Validado</span>
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo10_sit == 0)
                            <span class="badge bg-warning text-dark">
                                <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                        @endif


                    </button>
                </h2>
                <div id="j" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo10_sit == 1)
                        @else
                            {!! Form::file('Doc_Anexo2_Anexo10', ['class' => 'form-control', 'id' => 'formFile']) !!}
                        @endif
                    </div>
                    @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo10)
                        <div class="icon">
                            <div class="col-md-12 iframe-container">
                                <iframe
                                    src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo10) }}"></iframe>
                            </div>
                            <a class="btn btn-primary"
                                href="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo10) }}"
                                target="_blank">
                                <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                            </a>
                        </div>
                    @else
                        <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                    @endif
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#k" aria-expanded="false" aria-controls="k">
                        <strong> <big> J) </strong> </big> Declaração de Contrapartida – quando for o caso (modelo em
                        anexo);
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo11_sit == '')
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo11_sit == 1)
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle me-1"></i> Validado</span>
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo11_sit == 0)
                            <span class="badge bg-warning text-dark">
                                <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                        @endif
                    </button>
                </h2>
                <div id="k" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo11_sit == 1)
                        @else
                            {!! Form::file('Doc_Anexo2_Anexo11', ['class' => 'form-control', 'id' => 'formFile']) !!}
                        @endif
                    </div>
                    @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo11)
                        <div class="icon">
                            <div class="col-md-12 iframe-container">
                                <iframe
                                    src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo11) }}"></iframe>
                            </div>
                            <a class="btn btn-primary"
                                href="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo11) }}"
                                target="_blank">
                                <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                            </a>
                        </div>
                    @else
                        <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                    @endif
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#l" aria-expanded="false" aria-controls="l">
                        <strong> <big> K) </strong> </big> Declaração da Não Ocorrência de Impedimentos (modelo em
                        anexo);
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo12_sit == '')
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo12_sit == 1)
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle me-1"></i> Validado</span>
                        @elseif ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo12_sit == 0)
                            <span class="badge bg-warning text-dark">
                                <i class="bi bi-exclamation-triangle me-1"></i> Corrigir</span>
                        @endif

                    </button>
                </h2>
                <div id="l" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo12_sit == 1)
                        @else
                            {!! Form::file('Doc_Anexo2_Anexo12', ['class' => 'form-control', 'id' => 'formFile']) !!}
                        @endif
                    </div>
                    @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo12)
                        <div class="icon">
                            <div class="col-md-12 iframe-container">
                                <iframe
                                    src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo12) }}"></iframe>
                            </div>
                            <a class="btn btn-primary"
                                href="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo12) }}"
                                target="_blank">
                                <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                            </a>
                        </div>
                    @else
                        <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                    @endif
                </div>
            </div>
        </div><!-- End Default Accordion Example -->


        <button type="submit" class="btn btn-primary">Enviar</button>

    </div>
    {!! Form::close() !!}

</div>
