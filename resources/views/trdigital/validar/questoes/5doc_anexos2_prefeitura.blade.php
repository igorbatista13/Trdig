<div class="tab-pane fade" id="list-atas" role="tabpanel" aria-labelledby="list-atas-list">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><b> <big> 5. </b> </big>
                Atas,
                Certidões, Comprovantes e Declarações (Anexar): <b> PREFEITURA </b>
            </h5>
            {!! Form::open([
                'url' => route('trdigital.validar.doc_prefeitura', ['id' => $n_processo->Doc_prefeitura->id]),
                'method' => 'post',
            ]) !!}
            <!-- Default Accordion -->
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <strong> <big> A) </strong> </big> Ofício de encaminhamento da proposta com todos os documentos
                            abaixo discriminados.
                        </button>

                    </h2>

                    <style>
                        .iframe-container {
                            display: flex !important;
                            justify-content: center !important;
                        }

                        .iframe-container iframe {
                            width: 1200px !important;
                            height: 400px !important;
                        }
                    </style>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">


                            @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Oficios_proposta)
                                <div class="icon">
                                    <div class="col-md-12 iframe-container">
                                        <iframe
                                            src="{{ asset('storage/' . $n_processo->doc_prefeitura->Oficios_proposta) }}"></iframe>
                                    </div>
                                    <a class="btn btn-primary"
                                        href="{{ asset('storage/' . $n_processo->doc_prefeitura->Oficios_proposta) }}"
                                        target="_blank">
                                        <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                                    </a>
                                </div>
                                @else
                                    <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                            @endif


                            {!! Form::radio('Oficios_proposta_sit', '1', $n_processo->Doc_prefeitura->Oficios_proposta_sit == 1, [
                                'class' => 'form-check-input',
                                'id' => 'gridRadios1',
                            ]) !!}
                            <label class="form-check-label" for="gridRadios1">
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                                    Validado</span>
                            </label>

                            {!! Form::radio('Oficios_proposta_sit', '0', $n_processo->Doc_prefeitura->Oficios_proposta_sit == 0, [
                                'class' => 'form-check-input',
                                'id' => 'gridRadios2',
                            ]) !!}
                            <label class="form-check-label" for="gridRadios2">
                                <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                                    Corrigir</span>
                            </label>
                        </div>
                    </div>

                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <strong> <big> B) </strong> </big>
                            Certidão
                            de Habilitação Plena
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">



                            @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Oficio_emenda)
                                <div class="icon">
                                    <div class="col-md-12 iframe-container">
                                        <iframe
                                            src="{{ asset('storage/' . $n_processo->doc_prefeitura->Oficio_emenda) }}"></iframe>
                                    </div>
                                    <a class="btn btn-primary"
                                        href="{{ asset('storage/' . $n_processo->doc_prefeitura->Oficio_emenda) }}"
                                        target="_blank">
                                        <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                                    </a>
                                </div>
                                @else
                                    <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                            @endif
                        </div>
                        {!! Form::radio('Oficio_emenda_sit', '1', $n_processo->Doc_prefeitura->Oficio_emenda_sit == 1, [
                            'class' => 'form-check-input',
                            'id' => 'gridRadios1',
                        ]) !!}
                        <label class="form-check-label" for="gridRadios1">
                            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                                Validado</span>
                        </label>

                        {!! Form::radio('Oficio_emenda_sit', '0', $n_processo->Doc_prefeitura->Oficio_emenda_sit == 0, [
                            'class' => 'form-check-input',
                            'id' => 'gridRadios2',
                        ]) !!}
                        <label class="form-check-label" for="gridRadios2">
                            <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                                Corrigir</span>
                        </label>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <strong> <big> C) </strong> </big> Declaração de Contrapartida, deverão informar a previsão
                            orçamentária publicada e atualizada, inclusive os dados da publicação.
                        </button>

                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Declaracao_contrapartida)
                                <div class="icon">
                                    <div class="col-md-12 iframe-container">
                                        <iframe
                                            src="{{ asset('storage/' . $n_processo->doc_prefeitura->Declaracao_contrapartida) }}"></iframe>
                                    </div>
                                    <a class="btn btn-primary"
                                        href="{{ asset('storage/' . $n_processo->doc_prefeitura->Declaracao_contrapartida) }}"
                                        target="_blank">
                                        <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                                    </a>
                                </div>
                                @else
                                    <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                            @endif
                        </div>
                        {!! Form::radio('Declaracao_contrapartida_sit', '1', $n_processo->Doc_prefeitura->Declaracao_contrapartida_sit == 1, [
                            'class' => 'form-check-input',
                            'id' => 'gridRadios1',
                        ]) !!}
                        <label class="form-check-label" for="gridRadios1">
                            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                                Validado</span>
                        </label>

                        {!! Form::radio('Declaracao_contrapartida_sit', '0', $n_processo->Doc_prefeitura->Declaracao_contrapartida_sit == 0, [
                            'class' => 'form-check-input',
                            'id' => 'gridRadios2',
                        ]) !!}
                        <label class="form-check-label" for="gridRadios2">
                            <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                                Corrigir</span>
                        </label>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#d" aria-expanded="false" aria-controls="d">
                            <strong> <big> D) </strong> </big> • Comprovante de Abertura de Conta e Extrato de Conta
                            Bancária zerada e específica para a formalização do Convênio (Conta não poderá ser no CNPJ dos
                            FUNDOS).

                        </button>
                    </h2>
                    <div id="d" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Comprovante_abertura_conta)
                                <div class="icon">
                                    <div class="col-md-12 iframe-container">
                                        <iframe
                                            src="{{ asset('storage/' . $n_processo->doc_prefeitura->Comprovante_abertura_conta) }}"></iframe>
                                    </div>
                                    <a class="btn btn-primary"
                                        href="{{ asset('storage/' . $n_processo->doc_prefeitura->Comprovante_abertura_conta) }}"
                                        target="_blank">
                                        <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                                    </a>
                                </div>
                                @else
                                    <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                            @endif
                        </div>
                        {!! Form::radio('Comprovante_abertura_conta_sit', '1', $n_processo->Doc_prefeitura->Comprovante_abertura_conta_sit == 1, [
                            'class' => 'form-check-input',
                            'id' => 'gridRadios1',
                        ]) !!}
                        <label class="form-check-label" for="gridRadios1">
                            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                                Validado</span>
                        </label>

                        {!! Form::radio('Comprovante_abertura_conta_sit', '0', $n_processo->Doc_prefeitura->Comprovante_abertura_conta_sit == 0, [
                            'class' => 'form-check-input',
                            'id' => 'gridRadios2',
                        ]) !!}
                        <label class="form-check-label" for="gridRadios2">
                            <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                                Corrigir</span>
                        </label>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#e" aria-expanded="false" aria-controls="e">
                            <strong> <big> E) </strong> </big>Comprovação da qualificação técnica e da capacidade
                            operacional, mediante comprovação de funcionamento regular.
                        </button>
                    </h2>
                    <div id="e" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Comprovante_qualif_tecnica)
                                <div class="icon">
                                    <div class="col-md-12 iframe-container">
                                        <iframe
                                            src="{{ asset('storage/' . $n_processo->doc_prefeitura->Comprovante_qualif_tecnica) }}"></iframe>
                                    </div>
                                    <a class="btn btn-primary"
                                        href="{{ asset('storage/' . $n_processo->doc_prefeitura->Comprovante_qualif_tecnica) }}"
                                        target="_blank">
                                        <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                                    </a>
                                </div>
                                @else
                                    <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                            @endif
                        </div>
                        {!! Form::radio('Comprovante_qualif_tecnica_sit', '1', $n_processo->Doc_prefeitura->Comprovante_qualif_tecnica_sit == 1, [
                            'class' => 'form-check-input',
                            'id' => 'gridRadios1',
                        ]) !!}
                        <label class="form-check-label" for="gridRadios1">
                            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                                Validado</span>
                        </label>

                        {!! Form::radio('Comprovante_qualif_tecnica_sit', '0', $n_processo->Doc_prefeitura->Comprovante_qualif_tecnica_sit == 0, [
                            'class' => 'form-check-input',
                            'id' => 'gridRadios2',
                        ]) !!}
                        <label class="form-check-label" for="gridRadios2">
                            <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                                Corrigir</span>
                        </label>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#f" aria-expanded="false" aria-controls="f">
                            <strong> <big> F) </strong> </big> Cópia do Diploma do Ato de nomeação ou posse, emitido pelo
                            Cartório Eleitoral.

                        </button>
                    </h2>
                    <div id="f" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                            @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Diploma_nomeacao)
                                <div class="icon">
                                    <div class="col-md-12 iframe-container">
                                        <iframe
                                            src="{{ asset('storage/' . $n_processo->doc_prefeitura->Diploma_nomeacao) }}"></iframe>
                                    </div>
                                    <a class="btn btn-primary"
                                        href="{{ asset('storage/' . $n_processo->doc_prefeitura->Diploma_nomeacao) }}"
                                        target="_blank">
                                        <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                                    </a>
                                </div>
                                @else
                                    <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                            @endif

                        </div>
                        {!! Form::radio('Diploma_nomeacao_sit', '1', $n_processo->Doc_prefeitura->Diploma_nomeacao_sit == 1, [
                            'class' => 'form-check-input',
                            'id' => 'gridRadios1',
                        ]) !!}
                        <label class="form-check-label" for="gridRadios1">
                            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                                Validado</span>
                        </label>

                        {!! Form::radio('Diploma_nomeacao_sit', '0', $n_processo->Doc_prefeitura->Diploma_nomeacao_sit == 0, [
                            'class' => 'form-check-input',
                            'id' => 'gridRadios2',
                        ]) !!}
                        <label class="form-check-label" for="gridRadios2">
                            <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                                Corrigir</span>
                        </label>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#g" aria-expanded="false" aria-controls="g">
                            <strong> <big> G) </strong> </big> Cópia da Ata de sessão solene de Eleição.
                        </button>
                    </h2>
                    <div id="g" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Ata_eleicao)
                                <div class="icon">
                                    <div class="col-md-12 iframe-container">
                                        <iframe
                                            src="{{ asset('storage/' . $n_processo->doc_prefeitura->Ata_eleicao) }}"></iframe>
                                    </div>
                                    <a class="btn btn-primary"
                                        href="{{ asset('storage/' . $n_processo->doc_prefeitura->Ata_eleicao) }}"
                                        target="_blank">
                                        <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                                    </a>
                                </div>
                                @else
                                    <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                            @endif
                        </div>
                        {!! Form::radio('Ata_eleicao_sit', '1', $n_processo->Doc_prefeitura->Ata_eleicao_sit == 1, [
                            'class' => 'form-check-input',
                            'id' => 'gridRadios1',
                        ]) !!}
                        <label class="form-check-label" for="gridRadios1">
                            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                                Validado</span>
                        </label>

                        {!! Form::radio('Ata_eleicao_sit', '0', $n_processo->Doc_prefeitura->Ata_eleicao_sit == 0, [
                            'class' => 'form-check-input',
                            'id' => 'gridRadios2',
                        ]) !!}
                        <label class="form-check-label" for="gridRadios2">
                            <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                                Corrigir</span>
                        </label>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#h" aria-expanded="false" aria-controls="h">
                            <strong> <big> H) </strong> </big> Cópia Posse emitida pela Câmara Municipal.
                        </button>
                    </h2>
                    <div id="h" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Doc_posse)
                                <div class="icon">
                                    <div class="col-md-12 iframe-container">
                                        <iframe
                                            src="{{ asset('storage/' . $n_processo->doc_prefeitura->Doc_posse) }}"></iframe>
                                    </div>
                                    <a class="btn btn-primary"
                                        href="{{ asset('storage/' . $n_processo->doc_prefeitura->Doc_posse) }}"
                                        target="_blank">
                                        <i class="bi bi-file-earmark-pdf-fill"></i> Ver arquivo
                                    </a>
                                </div>
                                @else
                                    <h4 class="text-danger"> <b> Documento não enviado </b></h4>
                            @endif

                        </div>
                        {!! Form::radio('Doc_posse_sit', '1', $n_processo->Doc_prefeitura->Doc_posse_sit == 1, [
                            'class' => 'form-check-input',
                            'id' => 'gridRadios1',
                        ]) !!}
                        <label class="form-check-label" for="gridRadios1">
                            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                                Validado</span>
                        </label>

                        {!! Form::radio('Doc_posse_sit', '0', $n_processo->Doc_prefeitura->Doc_posse_sit == 0, [
                            'class' => 'form-check-input',
                            'id' => 'gridRadios2',
                        ]) !!}
                        <label class="form-check-label" for="gridRadios2">
                            <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                                Corrigir</span>
                        </label>
                    </div>
                </div>
             
              
            </div><!-- End Default Accordion Example -->


            <button type="submit" class="btn btn-primary">Enviar</button>

        </div>
    </div>
    </div>




{!! Form::close() !!}
