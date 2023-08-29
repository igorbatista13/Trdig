<div class="col-lg-12">
    <div class="info-box card">
        <i class="bi bi-file-text"></i>
        <h3>12. Pesquisa Mercadológica </h3>

        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th,
            td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }
        </style>

        {{-- <h1>Metas e Etapas</h1> --}}
        <h2 class="info-box text-dark">
            Descrição do Item </h2>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição do Bem</th>
                    <th>Quantidade</th>
                    <th>Empresa</th>
                    <th>Valor Unid</th>
                    <th>Valor Médio</th>
                    <th>Valor Total</th>
                    <th>Comprovante</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesquisa_mercadologica as $pesquisa)
                    @foreach ($pesquisa->pesquisa_mercadologica_pivots as $pivot)
                        @php
                            $valorTotal = 0; // Inicializa o valor total
                            $numRegistros = count($pesquisa->pesquisa_mercadologica_pivots); // Obtém o número total de registros
                        @endphp
                        <tr>
                            <td>{{ $pesquisa->id }}</td>
                            <td>{{ $pesquisa->Descricao_bem }}</td>
                            <td>{{ $pesquisa->Qtd }}</td>
                            <td>{{ $pivot->Empresa }}</td>
                            <td>{{ $pivot->Valor }}</td>
                            @php
                                $valorTotal += $pivot->Valor * $pesquisa->Qtd; // Adiciona o valor total atual
                            @endphp
                            @php
                                if ($numRegistros > 0) {
                                    $valorTotalMedio = $valorTotal / $numRegistros;
                                } else {
                                    $valorTotalMedio = 0; // Defina um valor padrão ou outro valor apropriado
                                }
                            @endphp
                            <td>{{ number_format($valorTotalMedio, 2) }}</td>
                            <td> {{ $pivot->Valor * $pesquisa->Qtd }} </td>
                            <td>
                                @if ($pivot->Anexo == '')
                                    <a class="text-danger"> Documento não enviado </a>
                                @else
                                    Em Anexo
                                @endif

                            </td>



                        </tr>
                 
                    @endforeach
                @endforeach


            </tbody>
        </table>
        @foreach ($pesquisa_mercadologica as $pesquisa)
        @foreach ($pesquisa->pesquisa_mercadologica_pivots as $pivot)                         
        @if ($pivot->Anexo)
            <h5 class="info-box text-primary">Anexos {{ $pivot->Empresa }}</h5>
            <embed src="{{ asset('storage/' . $pivot->Anexo) }}" width="100%" height="800px" />
            <embed {{ $pivot->Anexo }} width="100%" height="800px" />
        @endif
        @endforeach
        @endforeach


    </div>
</div>
