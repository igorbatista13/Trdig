<div class="col-lg-12">
    <div class="info-box card">
        <i class="bi bi-file-text"></i>
        <h3>5. Atas, Certidões, Comprovantes e Declarações </h3>


        <h3>Anexos</h3>

        @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Oficios_proposta)
            <h5 class="info-box text-primary"> A. Ofício de encaminhamento da proposta com todos os documentos
                abaixo discriminados.</h5>

                <?php
                $pdfPath = 'storage/' . $n_processo->Doc_prefeitura->Oficios_proposta;
                
                if (file_exists($pdfPath)) {
                    $pdf = new Spatie\PdfToImage\Pdf($pdfPath);
                    $totalPages = $pdf->getNumberOfPages();
                
                    // Gere um identificador único (timestamp) para cada conjunto de imagens
                    $uniqueIdentifier = time();
                
                    // Loop para converter cada página em uma imagem e exibi-la
                    for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
                        // Adicione o identificador único ao nome da imagem
                        $imagePath = 'storage/imagem/Doc_prefeitura/' . 'imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png';
                        $pdf->setPage($pageNumber)
                            ->setOutputFormat('png')
                            ->saveImage($imagePath);
                
                        // Exiba a imagem
                        echo '<img src="' . asset('storage/imagem/Doc_prefeitura/imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png') . '" width="100%" height="800px" />';
                    }
                } else {
                    // Arquivo PDF não existe ou não é acessível
                    echo 'Arquivo PDF não encontrado.';
                }
                ?>

                @endif

        @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Oficio_emenda)
            <h5 class="info-box text-primary"> B.  Ofício de encaminhamento da destinação de Emenda Parlamentar
                pelo Deputado; quando se tratar de emenda.</h5>
           
                <?php
                $pdfPath = 'storage/' . $n_processo->Doc_prefeitura->Oficio_emenda;
                
                if (file_exists($pdfPath)) {
                    $pdf = new Spatie\PdfToImage\Pdf($pdfPath);
                    $totalPages = $pdf->getNumberOfPages();
                
                    // Gere um identificador único (timestamp) para cada conjunto de imagens
                    $uniqueIdentifier = time();
                
                    // Loop para converter cada página em uma imagem e exibi-la
                    for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
                        // Adicione o identificador único ao nome da imagem
                        $imagePath = 'storage/imagem/Doc_prefeitura/' . 'imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png';
                        $pdf->setPage($pageNumber)
                            ->setOutputFormat('png')
                            ->saveImage($imagePath);
                
                        // Exiba a imagem
                        echo '<img src="' . asset('storage/imagem/Doc_prefeitura/imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png') . '" width="100%" height="800px" />';
                    }
                } else {
                    // Arquivo PDF não existe ou não é acessível
                    echo 'Arquivo PDF não encontrado.';
                }
                ?>

        @endif

        @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Delcaracao_contrapartida)
            <h5 class="info-box text-primary"> C. Declaração de Contrapartida, deverão informar a previsão
                orçamentária publicada e atualizada, inclusive os dados da publicação.</h5>
          
                <?php
                $pdfPath = 'storage/' . $n_processo->Doc_prefeitura->Delcaracao_contrapartida;
                
                if (file_exists($pdfPath)) {
                    $pdf = new Spatie\PdfToImage\Pdf($pdfPath);
                    $totalPages = $pdf->getNumberOfPages();
                
                    // Gere um identificador único (timestamp) para cada conjunto de imagens
                    $uniqueIdentifier = time();
                
                    // Loop para converter cada página em uma imagem e exibi-la
                    for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
                        // Adicione o identificador único ao nome da imagem
                        $imagePath = 'storage/imagem/Doc_prefeitura/' . 'imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png';
                        $pdf->setPage($pageNumber)
                            ->setOutputFormat('png')
                            ->saveImage($imagePath);
                
                        // Exiba a imagem
                        echo '<img src="' . asset('storage/imagem/Doc_prefeitura/imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png') . '" width="100%" height="800px" />';
                    }
                } else {
                    // Arquivo PDF não existe ou não é acessível
                    echo 'Arquivo PDF não encontrado.';
                }
                ?>

        @endif
  
        @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Comprovante_abertura_conta)
            <h5 class="info-box text-primary"> D. Comprovante de Abertura de Conta e Extrato de Conta
                Bancária zerada e específica para a formalização do Convênio (Conta não poderá ser no CNPJ dos
                FUNDOS).</h5>
           
                <?php
                $pdfPath = 'storage/' . $n_processo->Doc_prefeitura->Comprovante_abertura_conta;
                
                if (file_exists($pdfPath)) {
                    $pdf = new Spatie\PdfToImage\Pdf($pdfPath);
                    $totalPages = $pdf->getNumberOfPages();
                
                    // Gere um identificador único (timestamp) para cada conjunto de imagens
                    $uniqueIdentifier = time();
                
                    // Loop para converter cada página em uma imagem e exibi-la
                    for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
                        // Adicione o identificador único ao nome da imagem
                        $imagePath = 'storage/imagem/Doc_prefeitura/' . 'imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png';
                        $pdf->setPage($pageNumber)
                            ->setOutputFormat('png')
                            ->saveImage($imagePath);
                
                        // Exiba a imagem
                        echo '<img src="' . asset('storage/imagem/Doc_prefeitura/imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png') . '" width="100%" height="800px" />';
                    }
                } else {
                    // Arquivo PDF não existe ou não é acessível
                    echo 'Arquivo PDF não encontrado.';
                }
                ?>

        @endif

        @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Comprovante_qualif_tecnica)
            <h5 class="info-box text-primary"> E. Comprovação da qualificação técnica e da capacidade
                operacional, mediante comprovação de funcionamento regular. </h5>
          
                <?php
                $pdfPath = 'storage/' . $n_processo->Doc_prefeitura->Comprovante_qualif_tecnica;
                
                if (file_exists($pdfPath)) {
                    $pdf = new Spatie\PdfToImage\Pdf($pdfPath);
                    $totalPages = $pdf->getNumberOfPages();
                
                    // Gere um identificador único (timestamp) para cada conjunto de imagens
                    $uniqueIdentifier = time();
                
                    // Loop para converter cada página em uma imagem e exibi-la
                    for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
                        // Adicione o identificador único ao nome da imagem
                        $imagePath = 'storage/imagem/Doc_prefeitura/' . 'imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png';
                        $pdf->setPage($pageNumber)
                            ->setOutputFormat('png')
                            ->saveImage($imagePath);
                
                        // Exiba a imagem
                        echo '<img src="' . asset('storage/imagem/Doc_prefeitura/imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png') . '" width="100%" height="800px" />';
                    }
                } else {
                    // Arquivo PDF não existe ou não é acessível
                    echo 'Arquivo PDF não encontrado.';
                }
                ?>


        @endif

        @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Diploma_nomeacao)
            <h5 class="info-box text-primary"> F. Cópia do Diploma do Ato de nomeação ou posse, emitido pelo
                Cartório Eleitoral.</h5>
                <?php
                $pdfPath = 'storage/' . $n_processo->Doc_prefeitura->Diploma_nomeacao;
                
                if (file_exists($pdfPath)) {
                    $pdf = new Spatie\PdfToImage\Pdf($pdfPath);
                    $totalPages = $pdf->getNumberOfPages();
                
                    // Gere um identificador único (timestamp) para cada conjunto de imagens
                    $uniqueIdentifier = time();
                
                    // Loop para converter cada página em uma imagem e exibi-la
                    for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
                        // Adicione o identificador único ao nome da imagem
                        $imagePath = 'storage/imagem/Doc_prefeitura/' . 'imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png';
                        $pdf->setPage($pageNumber)
                            ->setOutputFormat('png')
                            ->saveImage($imagePath);
                
                        // Exiba a imagem
                        echo '<img src="' . asset('storage/imagem/Doc_prefeitura/imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png') . '" width="100%" height="800px" />';
                    }
                } else {
                    // Arquivo PDF não existe ou não é acessível
                    echo 'Arquivo PDF não encontrado.';
                }
                ?>

        @endif
  
        @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Ata_eleicao)
            <h5 class="info-box text-primary"> G. Cópia da Ata de sessão solene de Eleição. </h5>
         
            <?php
            $pdfPath = 'storage/' . $n_processo->Doc_prefeitura->Ata_eleicao;
            
            if (file_exists($pdfPath)) {
                $pdf = new Spatie\PdfToImage\Pdf($pdfPath);
                $totalPages = $pdf->getNumberOfPages();
            
                // Gere um identificador único (timestamp) para cada conjunto de imagens
                $uniqueIdentifier = time();
            
                // Loop para converter cada página em uma imagem e exibi-la
                for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
                    // Adicione o identificador único ao nome da imagem
                    $imagePath = 'storage/imagem/Doc_prefeitura/' . 'imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png';
                    $pdf->setPage($pageNumber)
                        ->setOutputFormat('png')
                        ->saveImage($imagePath);
            
                    // Exiba a imagem
                    echo '<img src="' . asset('storage/imagem/Doc_prefeitura/imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png') . '" width="100%" height="800px" />';
                }
            } else {
                // Arquivo PDF não existe ou não é acessível
                echo 'Arquivo PDF não encontrado.';
            }
            ?>

        @endif

        @if ($n_processo->Doc_prefeitura && $n_processo->Doc_prefeitura->Doc_posse)
            <h5 class="info-box text-primary"> H.Cópia Posse emitida pela Câmara Municipal. </h5>
           

            <?php
            $pdfPath = 'storage/' . $n_processo->Doc_prefeitura->Doc_posse;
            
            if (file_exists($pdfPath)) {
                $pdf = new Spatie\PdfToImage\Pdf($pdfPath);
                $totalPages = $pdf->getNumberOfPages();
            
                // Gere um identificador único (timestamp) para cada conjunto de imagens
                $uniqueIdentifier = time();
            
                // Loop para converter cada página em uma imagem e exibi-la
                for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
                    // Adicione o identificador único ao nome da imagem
                    $imagePath = 'storage/imagem/Doc_prefeitura/' . 'imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png';
                    $pdf->setPage($pageNumber)
                        ->setOutputFormat('png')
                        ->saveImage($imagePath);
            
                    // Exiba a imagem
                    echo '<img src="' . asset('storage/imagem/Doc_prefeitura/imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png') . '" width="100%" height="800px" />';
                }
            } else {
                // Arquivo PDF não existe ou não é acessível
                echo 'Arquivo PDF não encontrado.';
            }
            ?>

        @endif

       

    </div>
</div>
