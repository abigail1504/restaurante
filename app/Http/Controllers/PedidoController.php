<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PedidoController extends Controller
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
        // Listar todos los pedidos
        $pedidos = Pedido::select(
            "pedidos.codigo",
            "pedidos.numero_orden",
            "pedidos.cantidad_pedido",
            "pedidos.precio_total",
            "pedidos.fecha_orden",
            "clientes.nombre as cliente"
        )
        ->join("clientes", "clientes.codigo", "=", "pedidos.cliente")
        ->get();

        // Mostrar vista pedidos.show junto al listado de pedidos
        return view('pedidos/show')->with(['pedidos' => $pedidos]);
        
        //return view('pedidos.show')->with(['ingredientes' => $ingredientes]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Listar clientes para llenar el select
        $clientes = Cliente::all();
        
        // Mostrar vista pedidos.create junto al listado de clientes
        return view('pedidos.create')->with(['clientes' => $clientes]);
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
            'numero_orden' => 'required',
            'cantidad_pedido' => 'required',
            'precio_total' => 'required',
            'fecha_orden' => 'required',
            'cliente' => 'required'
        ]);

        // Crear un nuevo pedido
        Pedido::create($data);

        // Redireccionar al listado de pedidos
        return redirect('/pedidos/show');
    }

    /**
     * Display the specified resource. 
     *  
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        // Listar clientes para llenar el select
        $clientes = Cliente::all();

        // Mostrar vista pedidos.update junto al pedido y los clientes
        return view('pedidos.update')->with(['pedido' => $pedido, 'clientes' => $clientes]);
    }

    /**
     * Update the specified resource in storage.
     *  
     * @param \Illuminate\Http\Request $request
     * @param Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        // Validar campos
        $data = $request->validate([
            'numero_orden' => 'required',
            'cantidad_pedido' => 'required',
            'precio_total' => 'required',
            'fecha_orden' => 'required',
            'cliente' => 'required'
        ]);

        // Actualizar el pedido con los nuevos datos
        $pedido->update($data);

        // Redireccionar al listado de pedidos
        return redirect('/pedidos/show');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        // Eliminar el pedido con el id recibido
        Pedido::destroy($id);

        // Retornar una respuesta JSON
        return response()->json(['success' => true]);
    }
}

