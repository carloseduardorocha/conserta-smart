@extends('report.pdf.layout')
@section('content')
<h3>Relatório de Clientes</h3>
<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>CPF</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        @php
            $phone = preg_replace('/^\+?55(\d{2})(\d{5})(\d{4})$/', '+55 ($1) $2-$3', $client->phone);
            $cpf   = preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $client->cpf);
        @endphp
        <tr>
            <td>{{ $client->name }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $phone }}</td>
            <td>{{ $cpf }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
