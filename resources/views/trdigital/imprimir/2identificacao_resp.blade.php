<div class="col-lg-12">
    <div class="info-box card">
        <i class="bi bi-file-text"></i>
        <h3>2. Identificação do Responsável pela Instituição.</h3>


        <h5 class="info-box text-primary">
            Nome:<a class="text-dark">
                {{ $n_processo->Resp_instituicao->Nome_Resp_Instituicao }}<br> </a>
            Telefone:<a class="text-dark">
                {{ $n_processo->Resp_instituicao->Telefone_Resp_Instituicao }}<br></a>
            E-mail: <a
                class="text-dark">{{ $n_processo->Resp_instituicao->Email_Resp_Instituicao }}<br></a>
            Cargo: <a
                class="text-dark">{{ $n_processo->Resp_instituicao->Cargo_Resp_Instituicao }}<br></a>
            Endereço:<a class="text-dark">
                {{ $n_processo->Resp_instituicao->End_Resp_Instituicao }}<br></a>
            Cidade:<a class="text-dark">
                {{ $n_processo->Resp_instituicao->Cidade_Resp_Instituicao }}<br></a>
            Estado:<a class="text-dark">
                {{ $n_processo->Resp_instituicao->Estado_Resp_Instituicao }}<br></a>
            Cep: <a
                class="text-dark">{{ $n_processo->Resp_instituicao->Cep_Resp_Instituicao }}<br></a>

        </h5>
        <h3>Anexos</h3>

        @if ($n_processo->Resp_instituicao && $n_processo->Resp_instituicao->Anexo1_Resp_Instituicao)
            <h5 class="info-box text-primary"> Anexo CPF/RG </h5>
            <embed
                src="{{ asset('storage/' . $n_processo->Resp_instituicao->Anexo1_Resp_Instituicao) }}"
                width="100%" height="800px" />
            <embed {{ $n_processo->instituicao->Nome_Instituicao }} width="100%"
                height="800px" />
        @endif

        @if ($n_processo->Resp_instituicao && $n_processo->Resp_instituicao->Anexo2_Resp_Instituicao)
            <h5 class="info-box text-primary"> Anexo Comprovante de Endereço </h5>
            <embed
                src="{{ asset('storage/' . $n_processo->Resp_instituicao->Anexo2_Resp_Instituicao) }}"
                width="100%" height="800px" />
            <embed {{ $n_processo->instituicao->Nome_Instituicao }} width="100%"
                height="800px" />
        @endif

    </div>
</div>