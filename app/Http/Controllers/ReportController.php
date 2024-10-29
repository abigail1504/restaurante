<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf; 
use Illuminate\Http\Request;
use App\Models\Cliente;

class ReportController extends Controller
{
    public function reporteUno()  
{  
    // Extraer todos los productos  
    $data = Cliente::select(  
        "clientes.codigo",          
        "clientes.nombre",  
        "clientes.email",  
        "clientes.telefono"
    )  

    ->get();  
  
    // Cargar vista del reporte con la data  
    $pdf = Pdf::loadView('/reports/report1', compact('data'));       
    return $pdf->stream('clientes.pdf');         
}  

}
