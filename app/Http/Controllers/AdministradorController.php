<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Producto;
use App\Models\Vendedor;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Carga la vista de la categoria que se maneja
        return view('administradors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeAdministrador(Request $request)
    {
        //Crear un nuevo administrador con los datos del formulario
        Administrador::create($request->all());
        //Redireccionar a la vista de administradores y mostrar un mensaje de éxito
        return redirect()->route('administradors.index')->with('info', 'Administrador creado con exito');
        //Cambio entre el metodo redirect() y to_route(), esta linea de codigo  no es una función estándar de Laravel. Puede ser específica de un paquete o una implementación personalizada en tu proyecto.        
    }

    public function storeProducto(Request $request)
    {
        //Crear un nuevo producto con los datos del formulario
        Producto::create($request->all());
        return redirect()->route('productos.index')->with('info', 'Producto creado con éxito');
    }

    public function storeVendedor(Request $request)
    {
        Vendedor::create($request->all());
        return redirect()->route('vendedors.index')->with('info', 'Vendedor creado con éxito');
    }



    /**
     * Display the specified resource.
     */
    public function show(Administrador $administrador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Administrador $administrador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Administrador $administrador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrador $administrador)
    {
        //
    }
}
