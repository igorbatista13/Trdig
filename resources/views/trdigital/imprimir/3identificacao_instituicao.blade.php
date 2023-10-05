<div class="col-lg-12">
    <div class="info-box card">
        <i class="bi bi-file-text"></i>
        <h3>3. Identificação da Instituição Proponente </h3>


        <h5 class="info-box text-primary">
            Nome da Instituição:<a class="text-dark">
                {{ $n_processo->instituicao->Nome_Instituicao }}<br> </a>
            CNPJ:<a class="text-dark">
                {{ $n_processo->instituicao->CNPJ_Instituicao }}<br></a>
            Telefone: <a class="text-dark">{{ $n_processo->instituicao->Telefone_Instituicao }}<br></a>
            Endereço:<a class="text-dark">
                {{ $n_processo->instituicao->Endereco_Instituicao }}<br></a>
            Cidade:<a class="text-dark">
                {{ $n_processo->instituicao->Cidade_Instituicao }}<br></a>
            Estado:<a class="text-dark">
                {{ $n_processo->instituicao->Estado_Instituicao }}<br></a>
            Cep: <a class="text-dark">{{ $n_processo->instituicao->Cep_Instituicao }}<br></a>

        </h5>
        <h3>Anexos</h3>

        @if ($n_processo->instituicao && $n_processo->instituicao->Anexo1_Instituicao)
            <h5 class="info-box text-primary"> Comprovante de Endereço</h5>
            <embed src="{{ asset('storage/' . $n_processo->instituicao->Anexo1_Instituicao) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->instituicao->Nome_Instituicao }} width="100%" height="800px" />
        @endif

        <?php
    
        // Caminho para o arquivo PDF que deseja converter
        $pdfFilePath = public_path('storage/' . $n_processo->instituicao->Anexo1_Instituicao);
    
        // Caminho para onde você deseja salvar a imagem
        $imageFilePath = public_path('storage/imagem_convertida/' . $n_processo->instituicao->Anexo1_Instituicao);
    
        $pdf = new Pdf($pdfFilePath);
        $pdf->setOutputFormat('jpg')->saveImage($imageFilePath);
    
        // Verificar se a conversão foi bem-sucedida
        if (file_exists($imageFilePath)) {
            // Exibir a imagem na view
            echo "<img src='" . asset('storage/imagem_convertida/converted_image.jpg') . "' alt='PDF to Image'>";
        } else {
            echo 'Falha na conversão do PDF para imagem.';
        }
        ?>
    </p>

    <?php
    // Caminho para o arquivo PDF que deseja converter
    $pdfFilePath = public_path('storage/' . $n_processo->instituicao->Anexo1_Instituicao);
    
    // Caminho para onde você deseja salvar a imagem
    $imageFilePath = public_path('storage/imagem_convertida/' . $n_processo->instituicao->Anexo1_Instituicao);

    
    // Comando Ghostscript para converter o PDF em imagem (JPEG)
    $command = "gs -dNOPAUSE -sDEVICE=jpeg -dJPEGQ=100 -r300 -sOutputFile={$imageFilePath} {$pdfFilePath} -c quit";
    
    // Executar o comando
    exec($command);
    
    // Verificar se a conversão foi bem-sucedida
    if (file_exists($imageFilePath)) {
        // Exibir a imagem na view
        echo "<img src='" . asset('storage/converted_image.jpg') . "' alt='PDF to Image'>";
    } else {
        echo "Falha na conversão do PDF para imagem.";
    }
    ?>
    

        @if ($n_processo->instituicao && $n_processo->instituicao->Anexo2_Instituicao)
            <h5 class="info-box text-primary"> Cartão CNPJ </h5>
            <embed src="{{ asset('storage/' . $n_processo->instituicao->Anexo2_Instituicao) }}" width="100%"
                height="800px" />
            <embed {{ $n_processo->instituicao->Nome_Instituicao }} width="100%" height="800px" />
        @endif

    </div>
</div>
