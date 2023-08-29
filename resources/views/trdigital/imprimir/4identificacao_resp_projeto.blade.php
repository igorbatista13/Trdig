
<div class="col-lg-12">
    <div class="info-box card">
        <i class="bi bi-file-text"></i>
        <h3>4. Identificação do Responsável pelo Projeto </h3>


        <h5 class="info-box text-primary">
            Nome da Instituição:<a class="text-dark">
                {{ $n_processo->Resp_projeto->Nome_Resp_projeto }}<br> </a>                                   
            Telefone: <a
                class="text-dark">{{ $n_processo->Resp_projeto->Telefone_Resp_projeto }}<br></a>
            CPF: <a
                class="text-dark">{{ $n_processo->Resp_projeto->CPF_Resp_projeto }}<br></a>
            RG: <a
                class="text-dark">{{ $n_processo->Resp_projeto->RG_Resp_projeto }}<br></a>
            Endereço:<a class="text-dark">
                {{ $n_processo->Resp_projeto->Endereco_Resp_projeto }}<br></a>
            Cidade:<a class="text-dark">
                {{ $n_processo->Resp_projeto->Cidade_Resp_projeto }}<br></a>
            Estado:<a class="text-dark">
                {{ $n_processo->Resp_projeto->Estado_Resp_projeto }}<br></a>
            Cep: <a
                class="text-dark">{{ $n_processo->Resp_projeto->Cep_Resp_projeto }}<br></a>

        </h5>


    </div>
</div>