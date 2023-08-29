<div class="col-lg-12">
    <div class="info-box card">
        <i class="bi bi-file-text"></i>
        <h3>10. Cronograma de Desembolso </h3>

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

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Meta</th>
                        <th>Ano</th>
                        <th>Mês</th>
                        <th>Fonte</th>
                        <th>Valor</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($cronograma_desembolso as $cronograma_desembolsos)
                    <tr>
                        <td>{{ $cronograma_desembolsos->id }} </td>                        
                        <td>{{ $cronograma_desembolsos->metas_id }} <big>{{$cronograma_desembolsos->Metas->Especificacao_metas ?? 'ERROOORRRR 404'}} </td>
                            <td>{{ $cronograma_desembolsos->ano }} </td>
                            <td>{{ $cronograma_desembolsos->mes }} </td>
                            <td>{{ $cronograma_desembolsos->fonte }} </td>
                            <td class="text-danger"> <b> R${{ $cronograma_desembolsos->valor_desembolso }} </b></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
