<div class="col-lg-12">
    <div class="info-box card">
        <i class="bi bi-file-text"></i>
        <h3>8. Plano de Aplicação Consolidado </h3>

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
                        <th><small>Natureza </small></th>
                                      <th><small>Discriminação </small></th>
                                      <th><small> Valor Conc.</small></th>
                                      <th><small>Valor Prop. <br><small class="text-primary">(Financeira) </small></th>
                                      <th><small>Valor Prop. <br><small class="text-primary"> (Não Financeira) </small></small></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($planoconsolidado as $planos)
                    <tr>
                            <td>{{ $planos->id }}</td>
                            <td>{{ $planos->Natureza }} - {{ $planos->OutrosNatureza }}</td>
                            <td>{{ $planos->Metas->Especificacao_metas }} </td>
                            <td>R$ {{ $planos->Valor_concedente }} </td>
                            <td>R$ {{ $planos->Valor_proponente_financeira }} </td>
                            <td>R${{ $planos->Valor_proponente_nao_financeira }} </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
