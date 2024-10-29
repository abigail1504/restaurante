<?php

namespace App\Http\Controllers;

use App\Models\Detalle_pedido;
use App\Models\Pedido;
use App\Models\Plato;
use Illuminate\Http\Request;

class Detalle_pedidoController extends Controller
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
        // Listar todos los detalles de pedido
        $detalle_pedidos = Detalle_pedido::select(
            "detalle_pedidos.codigo",
            "detalle_pedidos.cantidad",
            "detalle_pedidos.precio_unitario",
            "detalle_pedidos.subtotal",
            "pedidos.numero_orden as pedido",
            "platos.nombre as plato"
        )
        ->join("pedidos", "pedidos.codigo", "=", "detalle_pedidos.pedido")
        ->join("platos", "platos.codigo", "=", "detalle_pedidos.plato")
        ->get();

        // Mostrar vista detalle_pedidos.show junto al listado de detalles
        return view('detalle_pedidos.show')->with(['detalle_pedidos' => $detalle_pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Listar pedidos y platos para llenar el select
        $pedidos = Pedido::all();
        $platos = Plato::all();
        
        // Mostrar vista detalle_pedidos.create junto al listado de pedidos y platos
        return view('detalle_pedidos.create')->with(['pedidos' => $pedidos, 'platos' => $platos]);
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
            'cantidad' => 'required',
            'precio_unitario' => 'required',
            'subtotal' => 'required',
            'pedido' => 'required',
            'plato' => 'required'
        ]);

        // Crear un nuevo detalle de pedido
        Detalle_pedido::create($data);

        // Redireccionar al listado de detalles de pedido
        return redirect('/detalle_pedidos/show');
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Obtener el detalle de pedido con el id proporcionado
        $detalle_pedido = Detalle_pedido::findOrFail($id);

        // Mostrar la vista de detalles del detalle de pedido
        return view('detalle_pedidos.show')->with(['detalle_pedido' => $detalle_pedido]);
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param Detalle_pedido $detalle_pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Detalle_pedido $detalle_pedido)
    {
        // Listar pedidos y platos para llenar el select
        $pedidos = Pedido::all();
        $platos = Plato::all();

        // Mostrar vista detalle_pedidos.update junto al detalle de pedido, pedidos y platos
        return view('detalle_pedidos.update')->with([
            'detalle_pedido' => $detalle_pedido, 
            'pedidos' => $pedidos, 
            'platos' => $platos
        ]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param Detalle_pedido $detalle_pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detalle_pedido $detalle_pedido)
    {
        // Validar campos
        $data = $request->validate([
            'cantidad' => 'required',
            'precio_unitario' => 'required',
            'subtotal' => 'required',
            'pedido' => 'required',
            'plato' => 'required'
        ]);

        // Actualizar el detalle de pedido con los nuevos datos
        $detalle_pedido->update($data);

        // Redireccionar al listado de detalles de pedido
        return redirect('/detalle_pedidos/show');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar el detalle de pedido con el id recibido
        Detalle_pedido::destroy($id);

        // Retornar una respuesta JSON
        return response()->json(['success' => true]);
    }
}
