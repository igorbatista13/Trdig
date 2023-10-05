<div class="col-lg-12">
    <div class="info-box card">
        <i class="bi bi-file-text"></i>
        <h3>5. Atas, Certidões, Comprovantes e Declarações </h3>


        <h3>Anexos</h3>

        @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Oficios_proposta)
            <h5 class="info-box text-primary"> A. Ofício de encaminhamento da proposta com todos os documentos
                abaixo discriminados.</h5>
            <embed src="{{ asset('storage/' . $n_processo->doc_prefeitura->Oficios_proposta) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->Doc_prefeitura->Oficios_proposta }} width="100%" height="800px" />
        @endif

        @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Oficio_emenda)
            <h5 class="info-box text-primary"> B.  Ofício de encaminhamento da destinação de Emenda Parlamentar
                pelo Deputado; quando se tratar de emenda.</h5>
            <embed src="{{ asset('storage/' . $n_processo->doc_prefeitura->Oficio_emenda) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->Doc_prefeitura->Oficio_emenda }} width="100%" height="800px" />
        @endif

        @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Delcaracao_contrapartida)
            <h5 class="info-box text-primary"> C. Declaração de Contrapartida, deverão informar a previsão
                orçamentária publicada e atualizada, inclusive os dados da publicação.</h5>
            <embed src="{{ asset('storage/' . $n_processo->doc_prefeitura->Delcaracao_contrapartida) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->Doc_prefeitura->Delcaracao_contrapartida }} width="100%" height="800px" />
        @endif
  
        @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Comprovante_abertura_conta)
            <h5 class="info-box text-primary"> D. Comprovante de Abertura de Conta e Extrato de Conta
                Bancária zerada e específica para a formalização do Convênio (Conta não poderá ser no CNPJ dos
                FUNDOS).</h5>
            <embed src="{{ asset('storage/' . $n_processo->doc_prefeitura->Comprovante_abertura_conta) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->Doc_prefeitura->Comprovante_abertura_conta }} width="100%" height="800px" />
        @endif

        @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Comprovante_qualif_tecnica)
            <h5 class="info-box text-primary"> E. Comprovação da qualificação técnica e da capacidade
                operacional, mediante comprovação de funcionamento regular. </h5>
            <embed src="{{ asset('storage/' . $n_processo->doc_prefeitura->Comprovante_qualif_tecnica) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->Doc_prefeitura->Comprovante_qualif_tecnica }} width="100%" height="800px" />
        @endif

        @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Diploma_nomeacao)
            <h5 class="info-box text-primary"> F. Cópia do Diploma do Ato de nomeação ou posse, emitido pelo
                Cartório Eleitoral.</h5>
            <embed src="{{ asset('storage/' . $n_processo->doc_prefeitura->Diploma_nomeacao) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->Doc_prefeitura->Diploma_nomeacao }} width="100%" height="800px" />
        @endif
  
        @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Ata_eleicao)
            <h5 class="info-box text-primary"> G. Cópia da Ata de sessão solene de Eleição. </h5>
            <embed src="{{ asset('storage/' . $n_processo->doc_prefeitura->Ata_eleicao) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->Doc_prefeitura->Ata_eleicao }} width="100%" height="800px" />
        @endif

        @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Doc_posse)
            <h5 class="info-box text-primary"> H.Cópia Posse emitida pela Câmara Municipal. </h5>
            <embed src="{{ asset('storage/' . $n_processo->doc_prefeitura->Doc_posse) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->Doc_prefeitura->Doc_posse }} width="100%" height="800px" />
        @endif

       

    </div>
</div>
