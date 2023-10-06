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
        
        <?php
                $pdfPath = 'storage/' . $n_processo->instituicao->Anexo1_Instituicao;
                
                if (file_exists($pdfPath)) {
                    $pdf = new Spatie\PdfToImage\Pdf($pdfPath);
                    $totalPages = $pdf->getNumberOfPages();
                
                    // Gere um identificador único (timestamp) para cada conjunto de imagens
                    $uniqueIdentifier = time();
                
                    // Loop para converter cada página em uma imagem e exibi-la
                    for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
                        // Adicione o identificador único ao nome da imagem
                        $imagePath = 'storage/imagem/instituicao/' . 'imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png';
                        $pdf->setPage($pageNumber)
                            ->setOutputFormat('png')
                            ->saveImage($imagePath);
                
                        // Exiba a imagem
                        echo '<img src="' . asset('storage/imagem/instituicao/imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png') . '" width="100%" height="800px" />';
                    }
                } else {
                    // Arquivo PDF não existe ou não é acessível
                    echo 'Arquivo PDF não encontrado.';
                }
                ?>

        @endif


        @if ($n_processo->instituicao && $n_processo->instituicao->Anexo2_Instituicao)
            <h5 class="info-box text-primary"> Cartão CNPJ </h5>
         
            <?php
            $pdfPath = 'storage/' . $n_processo->instituicao->Anexo2_Instituicao;
            
            if (file_exists($pdfPath)) {
                $pdf = new Spatie\PdfToImage\Pdf($pdfPath);
                $totalPages = $pdf->getNumberOfPages();
            
                // Gere um identificador único (timestamp) para cada conjunto de imagens
                $uniqueIdentifier = time();
            
                // Loop para converter cada página em uma imagem e exibi-la
                for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
                    // Adicione o identificador único ao nome da imagem
                    $imagePath = 'storage/imagem/instituicao/' . 'imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png';
                    $pdf->setPage($pageNumber)
                        ->setOutputFormat('png')
                        ->saveImage($imagePath);
            
                    // Exiba a imagem
                    echo '<img src="' . asset('storage/imagem/instituicao/imagem_' . $pageNumber . '_' . $uniqueIdentifier . '.png') . '" width="100%" height="800px" />';
                }
            } else {
                // Arquivo PDF não existe ou não é acessível
                echo 'Arquivo PDF não encontrado.';
            }
            ?>

        @endif

    </div>
</div>
