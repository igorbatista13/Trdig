<div class="col-lg-12">
    <div class="info-box card">
        <i class="bi bi-file-text"></i>
        <h3>1. Ofícios</h3>


        @if ($n_processo->Doc_anexo1 && $n_processo->Doc_anexo1->Comp_Oficio)
            <h5 class="info-box text-primary"> A. Ofício de encaminhamento com o número da nova
                proposta</h5>

            <?php
            
            $pdfPath = 'storage/' . $n_processo->Doc_anexo1->Comp_Oficio;
            
            if (file_exists($pdfPath)) {
                $pdf = new Spatie\PdfToImage\Pdf($pdfPath);
                $totalPages = $pdf->getNumberOfPages();
            
                // Loop para converter cada página em uma imagem e exibi-la
                for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
                    $imagePath = 'storage/imagem/' . 'imagem_' . $pageNumber . '.png';
                    $pdf->setPage($pageNumber)
                        ->setOutputFormat('png')
                        ->saveImage($imagePath);
            
                    // Exiba a imagem
                    echo '<img src="' . asset('storage/imagem/imagem_' . $pageNumber . '.png') . '" width="100%" height="800px" />';
                }
            } else {
                // Arquivo PDF não existe ou não é acessível
                echo 'Arquivo PDF não encontrado.';
            }
            
            ?>
        @endif

        @if ($n_processo->Doc_anexo1 && $n_processo->Doc_anexo1->Comp_Assinado)
          
        <?php
            
        $pdfPath = 'storage/' . $n_processo->Doc_anexo1->Comp_Assinado;
        
        if (file_exists($pdfPath)) {
            $pdf = new Spatie\PdfToImage\Pdf($pdfPath);
            $totalPages = $pdf->getNumberOfPages();
        
            // Loop para converter cada página em uma imagem e exibi-la
            for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) {
                $imagePath = 'storage/imagem/' . 'imagem_' . $pageNumber . '.png';
                $pdf->setPage($pageNumber)
                    ->setOutputFormat('png')
                    ->saveImage($imagePath);
        
                // Exiba a imagem
                echo '<img src="' . asset('storage/imagem/imagem_' . $pageNumber . '.png') . '" width="100%" height="800px" />';
            }
        } else {
            // Arquivo PDF não existe ou não é acessível
            echo 'Arquivo PDF não encontrado.';
        }
        
        ?>

        @endif


    </div>
</div>
