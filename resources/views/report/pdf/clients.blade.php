
@extends('report.pdf.layout')
@section('content')
<h3>Relatório de Clientes</h3>
<table>
    <thead><tr><th>Nome</th><th>Email</th><th>Telefone</th></tr></thead>
    <tbody>
    @foreach($clients as $client)
        <tr><td>{{ $client->name }}</td><td>{{ $client->email }}</td><td>{{ $client->phone }}</td></tr>
    @endforeach
    </tbody>
</table>
@endsection
