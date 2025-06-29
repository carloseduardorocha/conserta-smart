
@extends('report.pdf.layout')
@section('content')
<h3>Relatório de Técnicos</h3>
<table>
    <thead><tr><th>Nome</th><th>Email</th><th>Telefone</th></tr></thead>
    <tbody>
    @foreach($technicians as $tech)
        <tr><td>{{ $tech->name }}</td><td>{{ $tech->email }}</td><td>{{ $tech->phone }}</td></tr>
    @endforeach
    </tbody>
</table>
@endsection
