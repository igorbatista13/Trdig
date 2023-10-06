<div class="col-lg-12">
    <div class="info-box card">
        <i class="bi bi-file-text"></i>
        <h3>13. Arquivos do Sigcon </h3>



        @if ($n_processo->Anexo_sigcon && $n_processo->Anexo_sigcon->anexo1)
            <h5 class="info-box text-primary"> Anexo I: cadastro de Órgãos
                ou
                Entidades Dirigentes </h5>

            <?php
            $pdfPath = 'storage/' . $n_processo->Anexo_sigcon->anexo1;
            
            if (file_exists($pdfPath)) {
                $pdf = new Spatie\PdfToImage\Pdf($pdfPath);
                $totalPages = $pdf->getNumberOfPages();
            
                // Gere um identificador único (timestamp) para cada conjunto de imagens
                $uniqueIdentifier = time();
            
                // Loop para converter cada página em uma imagem e exibi-la
                for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
                    // Adicione o identificador único ao nome da imagem
                    $imagePath = 'storage/imagem/Anexo_sigcon/' . 'imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png';
                    $pdf->setPage($pageNumber)
                        ->setOutputFormat('png')
                        ->saveImage($imagePath);
            
                    // Exiba a imagem
                    echo '<img src="' . asset('storage/imagem/Anexo_sigcon/imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png') . '" width="100%" height="800px" />';
                }
            } else {
                // Arquivo PDF não existe ou não é acessível
                echo 'Arquivo PDF não encontrado.';
            }
            ?>
        @endif

        @if ($n_processo->Anexo_sigcon && $n_processo->Anexo_sigcon->anexo2)
            <h5 class="info-box text-primary"> Anexo II: Dados do
                Projeto</h5>
            <?php
            $pdfPath = 'storage/' . $n_processo->Anexo_sigcon->anexo2;
            
            if (file_exists($pdfPath)) {
                $pdf = new Spatie\PdfToImage\Pdf($pdfPath);
                $totalPages = $pdf->getNumberOfPages();
            
                // Gere um identificador único (timestamp) para cada conjunto de imagens
                $uniqueIdentifier = time();
            
                // Loop para converter cada página em uma imagem e exibi-la
                for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
                    // Adicione o identificador único ao nome da imagem
                    $imagePath = 'storage/imagem/Anexo_sigcon/' . 'imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png';
                    $pdf->setPage($pageNumber)
                        ->setOutputFormat('png')
                        ->saveImage($imagePath);
            
                    // Exiba a imagem
                    echo '<img src="' . asset('storage/imagem/Anexo_sigcon/imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png') . '" width="100%" height="800px" />';
                }
            } else {
                // Arquivo PDF não existe ou não é acessível
                echo 'Arquivo PDF não encontrado.';
            }
            ?>
        @endif

        @if ($n_processo->Anexo_sigcon && $n_processo->Anexo_sigcon->anexo3)
            <h5 class="info-box text-primary"> Anexo III: Cronograma de
                Execução Física de Plano de
                Aplicação de Recursos </h5>

                <?php
                $pdfPath = 'storage/' . $n_processo->Anexo_sigcon->anexo3;
                
                if (file_exists($pdfPath)) {
                    $pdf = new Spatie\PdfToImage\Pdf($pdfPath);
                    $totalPages = $pdf->getNumberOfPages();
                
                    // Gere um identificador único (timestamp) para cada conjunto de imagens
                    $uniqueIdentifier = time();
                
                    // Loop para converter cada página em uma imagem e exibi-la
                    for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
                        // Adicione o identificador único ao nome da imagem
                        $imagePath = 'storage/imagem/Anexo_sigcon/' . 'imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png';
                        $pdf->setPage($pageNumber)
                            ->setOutputFormat('png')
                            ->saveImage($imagePath);
                
                        // Exiba a imagem
                        echo '<img src="' . asset('storage/imagem/Anexo_sigcon/imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png') . '" width="100%" height="800px" />';
                    }
                } else {
                    // Arquivo PDF não existe ou não é acessível
                    echo 'Arquivo PDF não encontrado.';
                }
                ?>


        @endif

        @if ($n_processo->Anexo_sigcon && $n_processo->Anexo_sigcon->anexo4)
            <h5 class="info-box text-primary"> Anexo IV: Cronograma de
                Desembolso. </h5>
                <?php
                $pdfPath = 'storage/' . $n_processo->Anexo_sigcon->anexo4;
                
                if (file_exists($pdfPath)) {
                    $pdf = new Spatie\PdfToImage\Pdf($pdfPath);
                    $totalPages = $pdf->getNumberOfPages();
                
                    // Gere um identificador único (timestamp) para cada conjunto de imagens
                    $uniqueIdentifier = time();
                
                    // Loop para converter cada página em uma imagem e exibi-la
                    for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
                        // Adicione o identificador único ao nome da imagem
                        $imagePath = 'storage/imagem/Anexo_sigcon/' . 'imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png';
                        $pdf->setPage($pageNumber)
                            ->setOutputFormat('png')
                            ->saveImage($imagePath);
                
                        // Exiba a imagem
                        echo '<img src="' . asset('storage/imagem/Anexo_sigcon/imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png') . '" width="100%" height="800px" />';
                    }
                } else {
                    // Arquivo PDF não existe ou não é acessível
                    echo 'Arquivo PDF não encontrado.';
                }
                ?>
        @endif

        @if ($n_processo->Anexo_sigcon && $n_processo->Anexo_sigcon->anexo5)
            <h5 class="info-box text-primary"> Anexo V: Relação de
                Equipamentos
                e Material Permanente. </h5>
        
                <?php
                $pdfPath = 'storage/' . $n_processo->Anexo_sigcon->anexo5;
                
                if (file_exists($pdfPath)) {
                    $pdf = new Spatie\PdfToImage\Pdf($pdfPath);
                    $totalPages = $pdf->getNumberOfPages();
                
                    // Gere um identificador único (timestamp) para cada conjunto de imagens
                    $uniqueIdentifier = time();
                
                    // Loop para converter cada página em uma imagem e exibi-la
                    for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
                        // Adicione o identificador único ao nome da imagem
                        $imagePath = 'storage/imagem/Anexo_sigcon/' . 'imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png';
                        $pdf->setPage($pageNumber)
                            ->setOutputFormat('png')
                            ->saveImage($imagePath);
                
                        // Exiba a imagem
                        echo '<img src="' . asset('storage/imagem/Anexo_sigcon/imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png') . '" width="100%" height="800px" />';
                    }
                } else {
                    // Arquivo PDF não existe ou não é acessível
                    echo 'Arquivo PDF não encontrado.';
                }
                ?>
        @endif


    </div>
</div>
