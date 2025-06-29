
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 30px; }
        .header img { max-height: 80px; }
        .header h1 { margin: 0; font-size: 18px; }
        .info { margin-top: 10px; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #999; padding: 6px; text-align: left; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('images/conserta-smart-logo.png') }}" alt="Logo da Empresa">
        <h1>Conserta Smart Assistência Técnica</h1>
        <div class="info">
            Rua Fictícia, 123 - Centro - São Paulo/SP - CEP: 00000-000<br>
            CNPJ: 00.000.000/0001-00 - contato@consertasmart.com.br - (11) 99999-9999
        </div>
    </div>

    @yield('content')
</body>
</html>
