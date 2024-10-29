<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
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
        // Listar todos los menús
        $menus = Menu::select(
            "menus.codigo",
            "menus.nombre",
            "menus.descripcion",
            "menus.precio"
        )->get();

        return view('menus.show')->with(['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mostrar vista para crear un nuevo menú
        return view('menus.create');
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
            'descripcion' => 'required',
            'precio' => 'required|numeric'
        ]);

        // Crear nuevo menú
        Menu::create($data);

        // Redireccionar a la lista de menús
        return redirect('/menus/show');
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Implementar la lógica si es necesario
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        // Obtener el menú a editar
        return view('menus.update')->with(['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        // Validar campos
        $data = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric'
        ]);

        // Actualizar los datos
        $menu->update($data);

        // Redireccionar a la lista de menús
        return redirect('/menus/show');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar el menú con el id recibido
        Menu::destroy($id);

        // Retornar una respuesta json
        return response()->json(['success' => true]);
    }
}

