@extends('report.pdf.layout')
@section('content')
<h3>Relatório de Ordens de Serviço</h3>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Cliente</th>
            <th>Técnico</th>
            <th>Status</th>
            <th>Descrição</th>
            <th>Data</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>#{{ $order->id }}</td>
            <td>{{ $order->client->name }}</td>
            <td>{{ $order->user->name ?? 'N/A' }}</td>
            <td>{{ ucfirst(str_replace('_', ' ', $order->status)) }}</td>
            <td>{{ $order->description ?? '-' }}</td>
            <td>{{ $order->created_at->format('d/m/Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection