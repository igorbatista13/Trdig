<div class="col-lg-12">
    <div class="info-box card">
        <i class="bi bi-file-text"></i>
        <h3>1. Ofícios</h3>


        @if ($n_processo->Doc_anexo1 && $n_processo->Doc_anexo1->Comp_Oficio)
            <h5 class="info-box text-primary"> A. Ofício de encaminhamento com o número da nova
                proposta</h5>
            <embed src="{{ asset('storage/' . $n_processo->Doc_anexo1->Comp_Oficio) }}"
                width="100%" height="800px" />
            <embed {{ $n_processo->instituicao->Nome_Instituicao }} width="100%"
                height="800px" />
        @endif

        @if ($n_processo->Doc_anexo1 && $n_processo->Doc_anexo1->Comp_Assinado)
            <h5 class="info-box text-primary"> B. Ofício com a destinação da emenda emitido e
                assinado pelo Parlamentar </h5>
            <embed src="{{ asset('storage/' . $n_processo->Doc_anexo1->Comp_Assinado) }}"
                width="100%" height="800px" />
            <embed {{ $n_processo->instituicao->Nome_Instituicao }} width="100%"
                height="800px" />
        @endif


    </div>
</div>