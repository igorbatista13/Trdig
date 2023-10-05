<div class="col-lg-12">
    <div class="info-box card">
        <i class="bi bi-file-text"></i>
        <h3>13. Arquivos do Sigcon </h3>



        @if ($n_processo->Anexo_sigcon && $n_processo->Anexo_sigcon->anexo1)
            <h5 class="info-box text-primary"> Anexo I: cadastro de Órgãos
                ou
                Entidades Dirigentes </h5>
            <embed src="{{ asset('storage/' . $n_processo->Anexo_sigcon->anexo1) }}" width="100%" height="800px" />
            <embed {{ $n_processo->Anexo_sigcon->anexo1 }} width="100%" height="800px" />
        @endif

        @if ($n_processo->Anexo_sigcon && $n_processo->Anexo_sigcon->anexo2)
            <h5 class="info-box text-primary">  Anexo II: Dados do
                Projeto</h5>
            <embed src="{{ asset('storage/' . $n_processo->Anexo_sigcon->anexo2) }}" width="100%" height="800px" />
            <embed {{ $n_processo->Anexo_sigcon->anexo2 }} width="100%" height="800px" />
        @endif
    
        @if ($n_processo->Anexo_sigcon && $n_processo->Anexo_sigcon->anexo3)
            <h5 class="info-box text-primary">   Anexo III: Cronograma de
                Execução Física de Plano de
                Aplicação de Recursos </h5>
            <embed src="{{ asset('storage/' . $n_processo->Anexo_sigcon->anexo3) }}" width="100%" height="800px" />
            <embed {{ $n_processo->Anexo_sigcon->anexo3 }} width="100%" height="800px" />
        @endif

        @if ($n_processo->Anexo_sigcon && $n_processo->Anexo_sigcon->anexo4)
            <h5 class="info-box text-primary">   Anexo IV: Cronograma de
                Desembolso. </h5>
            <embed src="{{ asset('storage/' . $n_processo->Anexo_sigcon->anexo4) }}" width="100%" height="800px" />
            <embed {{ $n_processo->Anexo_sigcon->anexo4 }} width="100%" height="800px" />
        @endif

        @if ($n_processo->Anexo_sigcon && $n_processo->Anexo_sigcon->anexo5)
            <h5 class="info-box text-primary">    Anexo V: Relação de
                            Equipamentos
                            e Material Permanente. </h5>
            <embed src="{{ asset('storage/' . $n_processo->Anexo_sigcon->anexo5) }}" width="100%" height="800px" />
            <embed {{ $n_processo->Anexo_sigcon->anexo5 }} width="100%" height="800px" />
        @endif


    </div>
</div>
