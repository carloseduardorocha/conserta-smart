@extends('report.pdf.layout')
@section('content')
<h3>Relatório de Produtos</h3>
<table>
    <thead>
        <tr>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Quantidade</th>
            <th>Preço Compra (R$)</th>
            <th>Preço Venda (R$)</th>
            <th>Fornecedor</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->brand }}</td>
            <td>{{ $product->model }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->type }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ number_format($product->purchase_price, 2, ',', '.') }}</td>
            <td>{{ number_format($product->sale_price, 2, ',', '.') }}</td>
            <td>{{ $product->supplier }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection