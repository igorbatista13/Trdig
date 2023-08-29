<div class="col-lg-12">
    <div class="info-box card">
        <i class="bi bi-file-text"></i>
        <h3>6. Identificacao do Projeto</h3>


        <h5 class="info-box text-primary">
            Título:<a class="text-dark">
                {{ $n_processo->Projeto_conteudo->Titulo_Projeto_Conteudo }}<br> </a>
            Objeto:<a class="text-dark">
                {{ $n_processo->Projeto_conteudo->Objeto_Projeto_Conteudo }}<br></a>
            Objetivo Geral: <a class="text-dark">{{ $n_processo->Projeto_conteudo->Obj_Geral_Projeto_Conteudo }}<br></a>
            Objetivo específico: <a
                class="text-dark">{{ $n_processo->Projeto_conteudo->Obj_especifico_Projeto_Conteudo }}<br></a>
            Justificativa:<a class="text-dark">
                {{ $n_processo->Projeto_conteudo->Justificativa_Projeto_Conteudo }}<br></a>
            Contextualização:<a class="text-dark">
                {{ $n_processo->Projeto_conteudo->Contextualizacao_Projeto_Conteudo }}<br></a>
            Diagnóstico:<a class="text-dark">
                {{ $n_processo->Projeto_conteudo->Diagnostico_Projeto_Conteudo }}<br></a>
            Caracterização dos Interesses Recíprocos entre o Proponente/Estado: <a
                class="text-dark">{{ $n_processo->Projeto_conteudo->Caracterizacao_Projeto_Conteudo }}<br></a>
            Público alvo Interno: <a
                class="text-dark">{{ $n_processo->Projeto_conteudo->Publico_Alvo_Interno_Projeto_Conteudo }}<br></a>
            Público alvo Externo: <a
                class="text-dark">{{ $n_processo->Projeto_conteudo->Publico_Alvo_Externo_Projeto_Conteudo }}<br></a>
            Problemas a serem resolvidos: <a
                class="text-dark">{{ $n_processo->Projeto_conteudo->Problemas_Projeto_Conteudo }}<br></a>
            Resultados esperados: <a
                class="text-dark">{{ $n_processo->Projeto_conteudo->Resultados_Projeto_Conteudo }}<br></a>
            Início: <a class="text-dark">{{ $n_processo->Projeto_conteudo->Inicio_Projeto_Conteudo }}<br></a>
            Término: <a class="text-dark">{{ $n_processo->Projeto_conteudo->Fim_Projeto_Conteudo }}<br></a>
            Informa Emenda n° Parlamentar: <a
                class="text-dark">{{ $n_processo->Projeto_conteudo->N_Emenda_Projeto_Conteudo }}<br></a>
            Informa Emenda nome do Autor: <a
                class="text-dark">{{ $n_processo->Projeto_conteudo->Nome_Autor_Emenda_Projeto_Conteudo }}<br></a>
            Valor de Repasse: <a
                class="text-dark">{{ $n_processo->Projeto_conteudo->Valor_Repasse_Projeto_Conteudo }}<br></a>
            Valor de Contrapartida: <a
                class="text-dark">{{ $n_processo->Projeto_conteudo->Valor_Contrapartida_Projeto_Conteudo }}<br></a>

        </h5>
    </div>
</div>
