<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\OrderService;
use App\Models\StockItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.index');
    }

    public function download(Request $request)
    {
        $report = $request->get('report');

        switch ($report) {
            case 'technicians':
                $data = ['technicians' => User::where('type', 'technician')->get()];
                $view = 'report.pdf.technicians';
                break;
            case 'clients':
                $data = ['clients' => Client::all()];
                $view = 'report.pdf.clients';
                break;
            case 'orders':
                $data = ['orders' => OrderService::with(['client', 'user'])->get()];
                $view = 'report.pdf.orders';
                break;
            case 'products':
                $data = ['products' => StockItem::all()];
                $view = 'report.pdf.products';
                break;
            default:
                return redirect()->route('report.index')->with('error', 'Tipo de relatório inválido.');
        }

        $pdf = Pdf::loadView($view, $data);
        return $pdf->download("relatorio_{$report}.pdf");
    }
}
