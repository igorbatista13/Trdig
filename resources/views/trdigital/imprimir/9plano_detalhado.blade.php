<div class="col-lg-12">
    <div class="info-box card">
        <i class="bi bi-file-text"></i>
        <h3>9. Plano de Aplicação Detalhado - Memória de Cálculo </h3>

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
                        <th>Natureza</th>
                        <th> Produto ou Serviço</th>
                        <th>Unid. Medida</th>
                        <th>Qtd.</th>
                        <th>Valor Unit.</th>
                        <th>Valor Total</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($planodetalhado as $planodetalhados)
                    <tr>
                        <td>{{ $planodetalhados->Plano_consolidado->id }} </td>
                        <td>{{ $planodetalhados->Plano_consolidado->Natureza }} </td>
                        <td>{{ $planodetalhados->Produto_Servico_detalhado }} </td>
                        <td>{{ $planodetalhados->Unidade_medida_detalhado }} </td>
                        <td>{{ $planodetalhados->Quantidade_detalhado }} </td>
                        <td class="text-success">R$ {{ $planodetalhados->Valor_unit_detalhado }} </td>
                        <td> <b class="text-danger"> R$
                                {{ $planodetalhados->Quantidade_detalhado * $planodetalhados->Valor_unit_detalhado }}
                            </b> </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>



    </div>
</div>
