<div class="col-lg-12">
    <div class="info-box card">
        <i class="bi bi-file-text"></i>
        <h3>7. Cronograma de Execução </h3>

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
            Metas </h2>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Especificação</th>
                    <th>Quantidade</th>
                    <th>Unidade de Medida</th>
                    <th>Início</th>
                    <th>Término</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($metas as $meta)
                    <tr>
                        <td>{{ $meta->id }}</td>
                        <td class="table-success">{{ $meta->Especificacao_metas }}</td>
                        <td>{{ $meta->Quantidade_metas }}</td>
                        <td>{{ $meta->Unidade_medida_metas }}</td>
                        <td>{{ $meta->Inicio_metas }}</td>
                        <td>{{ $meta->Termino_metas }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2 class="info-box text-dark">
            Etapas </h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Meta ID</th>
                    <th>Especificação</th>
                    <th>Quantidade</th>
                    <th>Unidade de Medida</th>
                    <th>Início</th>
                    <th>Término</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($meta->etapas as $etapa)
                    <tr>
                        <td>{{ $etapa->id }}</td>
                        <td class="table-success">{{ $etapa->metas_id }} - {{ $meta->Especificacao_metas }}</td>
                        <td>{{ $etapa->Especificacao_etapa }}</td>
                        <td>{{ $etapa->Quantidade_etapa }}</td>
                        <td>{{ $etapa->Unidade_medida_etapa }}</td>
                        <td>{{ $etapa->Inicio_etapa }}</td>
                        <td>{{ $etapa->Termino_etapa }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</div>
