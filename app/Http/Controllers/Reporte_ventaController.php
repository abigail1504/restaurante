<?php

namespace App\Http\Controllers;

use App\Models\Reporte_venta;
use Illuminate\Http\Request;

class Reporte_ventaController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth'); 
    }

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        // Listar todos los clientes
        $reporte_ventas = Reporte_venta::select(
            "reporte_ventas.codigo",
            "reporte_ventas.fecha",
            "reporte_ventas.numero_ventas",
            "reporte_ventas.subtotal",
            "reporte_ventas.impuesto_total",
            "reporte_ventas.total_ventas",
            "reporte_ventas.ventas_efectivo",
            "reporte_ventas.ventas_tarjeta",
            "reporte_ventas.total_efectivo",
            "reporte_ventas.total_tarjeta"
        )->get();

        // Mostrar vista show.blade.php junto al listado de clientes
        return view('reporte_ventas.show')->with(['reporte_ventas' => $reporte_ventas]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mostrar vista create.blade.php
        return view('reporte_ventas.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar campos
        $data = $request->validate([
            'fecha' => 'required',
            'numero_ventas' => 'required',
            'subtotal' => 'required',
            'impuesto_total' => 'required',
            'total_ventas' => 'required',
            'ventas_efectivo' => 'required',
            'ventas_tarjeta' => 'required',
            'total_efectivo' => 'required',
            'total_tarjeta' => 'required'
        ]);

        // Enviar insert
        Reporte_venta::create($data);

        // Redireccionar
        return redirect('/reporte_ventas/show');
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        // Implementar la lógica si es necesario
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param Reporte_venta $reporte_venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Reporte_venta $reporte_venta)
    {
        // Mostrar vista update.blade.php junto al cliente
        return view('reporte_ventas.update')->with(['reporte_venta' => $reporte_venta]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param Reporte_venta $reporte_venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reporte_venta $reporte_venta)
    {
        // Validar campos
        $data = $request->validate([
            'fecha' => 'required',
            'numero_ventas' => 'required',
            'subtotal' => 'required',
            'impuesto_total' => 'required',
            'total_ventas' => 'required',
            'ventas_efectivo' => 'required',
            'ventas_tarjeta' => 'required',
            'total_efectivo' => 'required',
            'total_tarjeta' => 'required'
        ]);

        // Reemplazar datos anteriores por los nuevos
        $reporte_venta->update($data);

        // Redireccionar
        return redirect('/reporte_ventas/show');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar el cliente con el id recibido
        Reporte_venta::destroy($id);

        // Retornar una respuesta json
        return response()->json(['success' => true]);
    }
}