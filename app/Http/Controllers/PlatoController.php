<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use App\Models\Menu;
use Illuminate\Http\Request;

class PlatoController extends Controller
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
        // Listar todos los platos con su menú asociado
        $platos = Plato::select(
            "platos.codigo",
            "platos.nombre",
            "platos.precio",
            "platos.descripcion",
            "menus.nombre as menu"
        )
        ->join("menus", "menus.codigo", "=", "platos.menu")
        ->get();

        // Mostrar vista platos.show junto al listado de platos
        return view('platos.show')->with(['platos' => $platos]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Listar menús para llenar el select
        $menus = Menu::all();
        
        // Mostrar vista platos.create junto al listado de menús
        return view('platos.create')->with(['menus' => $menus]);
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
            'nombre' => 'required',
            'precio' => 'required',
            'descripcion' => 'required',
            'menu' => 'required'
        ]);

        // Crear un nuevo plato
        Plato::create($data);

        // Redireccionar al listado de platos
        return redirect('/platos/show');
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
        $plato = Plato::findOrFail($id);

        // Mostrar la vista de detalles del plato
        return view('platos.show')->with(['plato' => $plato]);
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param Plato $plato
     * @return \Illuminate\Http\Response
     */
    public function edit(Plato $plato)
    {
        // Listar menús para llenar el select
        $menus = Menu::all();

        // Mostrar vista platos.update junto al plato y los menús
        return view('platos.update')->with(['plato' => $plato , 'menus' => $menus]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param Plato $plato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plato $plato)
    {
        // Validar campos
        $data = $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'descripcion' => 'required',
            'menu' => 'required'
        ]);

        // Actualizar el plato con los nuevos datos
        $plato->update($data);

        // Redireccionar al listado de platos
        return redirect('/platos/show');
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
        Plato::destroy($id);

        // Retornar una respuesta JSON
        return response()->json(['success' => true]);
    }
}
