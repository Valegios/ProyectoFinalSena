<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::all(); // Se consultan todas las ventas
        return view('categorias.ventas.index', ['ventas' => $ventas]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.ventas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //Crear un nuevo registro de ventas con los datos del formulario
         Venta::create($request->all());
         //Redireccionar a la vista de ventas y mostrar un mensaje de éxito
         return redirect()->route('categorias.ventas.index')->with('info', 'Venta creado con exito');
         //Cambio entre el metodo redirect() y to_route(), esta linea de codigo  no es una función estándar de Laravel. Puede ser específica de un paquete o una implementación personalizada en tu proyecto.        
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
