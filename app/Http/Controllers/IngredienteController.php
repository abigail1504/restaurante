<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use App\Models\Ingrediente;
use Illuminate\Http\Request;

class IngredienteController extends Controller
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
        $ingredientes = Ingrediente::select(
            "ingredientes.codigo",
            "ingredientes.nombre",
            "ingredientes.descripcion",
            "platos.nombre as plato"
        )
        ->join("platos", "platos.codigo", "=", "ingredientes.plato")
        ->get();

        // Mostrar vista show.blade.php junto al listado de clientes
        return view('ingredientes.show')->with(['ingredientes' => $ingredientes]);
    
    }

    /**
     * Show the form for creating a new resource.
     * * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Listar categorías para llenar select
        $platos = Plato::all();
        
        // Mostrar vista create.blade.php junto al listado de categorías
        return view('ingredientes.create')->with(['platos' => $platos]);
    
    }

    /**
     * Store a newly created resource in storage.
     * * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar campos
        $data = request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'plato' => 'required'
        ]);

        // Enviar insert
        Ingrediente::create($data);

        // Redireccionar
        return redirect('/ingredientes/show');
    }

    /**
     * Display the specified resource. 
     *  
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param Ingrediente $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingrediente $ingrediente)
    {
        // Listar categorías para llenar select
        $platos = Plato::all();

        // Mostrar vista update.blade.php junto al cliente y las categorías
        return view('ingredientes.update')->with(['ingrediente' => $ingrediente , 'platos' => $platos]);
   
    }

    /**
     * Update the specified resource in storage.
     *  
     * @param \Illuminate\Http\Request $request
     * @param Ingrediente $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingrediente $ingrediente)
    {
        // Validar campos
        $data = request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'plato' => 'required'
        ]);

        // Reemplazar datos anteriores por los nuevos
        $ingrediente->nombre = $data['nombre'];
        $ingrediente->descripcion = $data['descripcion'];
        $ingrediente->plato = $data['plato'];
        $ingrediente->updated_at = now();

        // Enviar a guardar la actualización
        $ingrediente->save();

        // Redireccionar
        return redirect('/ingredientes/show');
    
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
        Ingrediente::destroy($id);

        // Retornar una respuesta json
        return response()->json(['resss' => true]);
    }
}