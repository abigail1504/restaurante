<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
        $clientes = Cliente::select(
            "clientes.codigo",
            "clientes.nombre",
            "clientes.email",
            "clientes.telefono"
        )->get();

        // Mostrar vista show.blade.php junto al listado de clientes
        return view('clientes.show')->with(['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mostrar vista create.blade.php
        return view('clientes.create');
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
        $request->validate([
            'nombre' => 'required|string|max:255', // Obligatorio, debe ser una cadena, máximo 255 caracteres
            'email' => 'required|email|max:255',   // Obligatorio, debe ser un email válido, máximo 255 caracteres
            'telefono' => 'required|digits_between:7,15', // Obligatorio, entre 7 y 15 dígitos
        ]);

        // Enviar insert
        Cliente::create($data);

        // Redireccionar
        return redirect('/clientes/show');
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
     * @param Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        // Mostrar vista update.blade.php junto al cliente
        return view('clientes.update')->with(['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        // Validar campos
        $data = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'telefono' => 'required'
        ]);

        // Reemplazar datos anteriores por los nuevos
        $cliente->update($data);

        // Redireccionar
        return redirect('/clientes/show');
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
        Cliente::destroy($id);

        // Retornar una respuesta json
        return response()->json(['success' => true]);
    }
}


