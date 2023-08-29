<div class="col-lg-12">
    <div class="info-box card">
        <i class="bi bi-file-text"></i>
        <h3>11. Relação de Obras e Equipamentos / Material
            Permanente </h3>

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
                        <th>Natureza</th>
                        <th>Especificação</th>
                        <th>Unidade</th>
                        <th>Qtd.</th>
                        <th>Valor</th>
                        <th>Total</th>
                        <th>Local de Destino</th>
                        <th>Propriedade</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($obras_equipamento as $obras_equipamentos)
                    <tr>
                        <td>{{ $obras_equipamentos->Natureza_id }} </td>
                        <td>{{ $obras_equipamentos->Especificacao }} </td>
                        <td>{{ $obras_equipamentos->Unidade }} </td>
                        <td>{{ $obras_equipamentos->Qtd }} </td>
                        <td>R$ {{ $obras_equipamentos->Valor_unit }} </td>
                        <td class="text-danger"> R$
                            {{ $obras_equipamentos->Valor_unit * $obras_equipamentos->Qtd }} </td>
                        <td>{{ $obras_equipamentos->Local_destino }} </td>
                        <td>{{ $obras_equipamentos->Propriedade }} </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>
