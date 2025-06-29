
@extends('report.pdf.layout')
@section('content')
<h3>Relatório de Produtos</h3>
<table>
    <thead><tr><th>Nome</th><th>Descrição</th><th>Quantidade</th></tr></thead>
    <tbody>
    @foreach($products as $product)
        <tr><td>{{ $product->name }}</td><td>{{ $product->description }}</td><td>{{ $product->quantity }}</td></tr>
    @endforeach
    </tbody>
</table>
@endsection
