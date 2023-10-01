<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all(); // Se consultan todos los proveedores
        return view('categorias.proveedor.index', ['proveedores' => $proveedores]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        //
    }

    /**public function __construct()
    {
        // Todos los usuarios deben estar autenticados para acceder a cualquier método de este controlador
        $this->middleware('auth');

        // Sólo los usuarios con rol de admin pueden acceder a todos los métodos de este controlador
        $this->middleware('admin');
    }*/
}
