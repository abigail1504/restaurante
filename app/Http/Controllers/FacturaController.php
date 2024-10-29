<?php

namespace App\Http\Controllers;

use App\Models\factura;
use App\Models\Cliente;
use Illuminate\Http\Request;

class FacturaController extends Controller
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
        // Listar todos los facturas con su menú asociado
        $facturas = Factura::select(
            "facturas.codigo",
            "facturas.numero_factura",
            "facturas.fecha",
            "facturas.subtotal",
            "facturas.impuesto",
            "facturas.total",
            "facturas.metodo_pago",
            "facturas.estado",
            "clientes.nombre as cliente"
        )
        ->join("clientes", "clientes.codigo", "=", "facturas.cliente")
        ->get();

        // Mostrar vista platos.show junto al listado de platos
        return view('facturas.show')->with(['facturas' => $facturas]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Listar menús para llenar el select
        $clientes = Cliente::all();
        
        // Mostrar vista platos.create junto al listado de menús
        return view('facturas.create')->with(['clientes' => $clientes]);
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
            'numero_factura' => 'required',
            'fecha' => 'required',
            'subtotal' => 'required',
            'impuesto' => 'required',
            'total' => 'required',
            'metodo_pago' => 'required',
            'estado' => 'required',
            'cliente' => 'required'
        ]);

        // Crear un nuevo plato
        Factura::create($data);

        // Redireccionar al listado de platos
        return redirect('/facturas/show');
    }

    /**
     * Display the specified resource. 
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Obtener el plato con el id proporcionado
        $factura = Factura::findOrFail($id);

        // Mostrar la vista de detalles del plato
        return view('facturas.show')->with(['factura' => $factura]);
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param Factura $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        // Listar menús para llenar el select
        $clientes = Cliente::all();

        // Mostrar vista platos.update junto al plato y los menús
        return view('facturas.update')->with(['factura' => $factura , 'clientes' => $clientes]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param Factura $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        // Validar campos
        $data = $request->validate([
            'numero_factura' => 'required',
            'fecha' => 'required',
            'subtotal' => 'required',
            'impuesto' => 'required',
            'total' => 'required',
            'metodo_pago' => 'required',
            'estado' => 'required',
            'cliente' => 'required'
        ]);

        // Actualizar el plato con los nuevos datos
        $factura->update($data);

        // Redireccionar al listado de platos
        return redirect('/facturas/show');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar el plato con el id recibido
        Factura::destroy($id);

        // Retornar una respuesta JSON
        return response()->json(['success' => true]);
    }
}