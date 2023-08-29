<div class="col-lg-12">
    <div class="info-box card">
        <i class="bi bi-file-text"></i>
        <h3>5. Atas, Certidões, Comprovantes e Declarações </h3>


        <h3>Anexos</h3>

        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo1)
            <h5 class="info-box text-primary"> A. Cópia da Ata da Assembleia de Fundação ou Constituição ou do
                Estatuto Social, ou Regimento Interno, conforme o caso</h5>
            <embed src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo1) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->Doc_Anexo2->Nome_Instituicao }} width="100%" height="800px" />
        @endif

        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo2)
            <h5 class="info-box text-primary"> B. Cópia da Ata da Assembleia de Fundação ou Constituição ou do
                Estatuto Social, ou Regimento Interno, conforme o caso</h5>
            <embed src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo2) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo2 }} width="100%" height="800px" />
        @endif

        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo3)
            <h5 class="info-box text-primary"> C.  Certidão de ausência de irregularidades / impedimentos
                        perante TCU / TCE e CGE</h5>
            <embed src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo3) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo3 }} width="100%" height="800px" />
        @endif
  
        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo5)
            <h5 class="info-box text-primary"> D. Cópia do Ato de Eleição de nomeação ou posse da Mesa Diretora
                e Dirigente, conforme o caso.</h5>
            <embed src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo5) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo5 }} width="100%" height="800px" />
        @endif

        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo6)
            <h5 class="info-box text-primary"> E. Comprovante de Abertura de Conta e Extrato de Conta Bancária
                zerada e específica para a formalização do Instrumento</h5>
            <embed src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo6) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo6 }} width="100%" height="800px" />
        @endif

        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo7)
            <h5 class="info-box text-primary"> F. Comprovação da qualificação técnica e da capacidade
                        operacional, mediante comprovação de funcionamento regular.</h5>
            <embed src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo7) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo7 }} width="100%" height="800px" />
        @endif
  
        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo8)
            <h5 class="info-box text-primary"> G. Comprovação de Experiência Prévia na Realização de Parcerias
                com objetos semelhantes – (Anexar Cópia de Publicações e Parcerias executadas ou em andamento).</h5>
            <embed src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo8) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo8 }} width="100%" height="800px" />
        @endif

        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo9)
            <h5 class="info-box text-primary"> H. Declaração que comprove a regularidade do mandato de sua
                diretoria, da realização de assembleias ordinárias e da atividade regular, com validade restrita
                ao exercício de sua emissão, quando for o caso.</h5>
            <embed src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo9) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo9 }} width="100%" height="800px" />
        @endif

        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo10)
            <h5 class="info-box text-primary">I. Declaração de Capacidade Administrativa, Técnica e Gerencial
                Para a Execução do Plano De Trabalho</h5>
            <embed src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo10) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo10 }} width="100%" height="800px" />
        @endif
      
        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo11)
            <h5 class="info-box text-primary">J. Declaração de Contrapartida</h5>
            <embed src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo11) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo11 }} width="100%" height="800px" />
        @endif
      
        @if ($n_processo->Doc_Anexo2 && $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo11)
            <h5 class="info-box text-primary">K. Declaração da Não Ocorrência de Impedimentos
            </h5>
            <embed src="{{ asset('storage/' . $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo11) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->Doc_Anexo2->Doc_Anexo2_Anexo11 }} width="100%" height="800px" />
        @endif

    </div>
</div>
