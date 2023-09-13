<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Producto;
use App\Models\Vendedor;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all(); // Se consultan todos los productos
        return view('categorias.productos.index', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Carga la vista de creacion de un nuevo administrador
        return view('categorias.administrador.create');
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
        // Valida los datos antes de guardarlos
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'referencia' => 'required',
            'id_proveedor' => 'required'
    ]);

        // Guarda el nuevo producto en la base de datos
        Producto::create($request->all());
        return redirect()->route('categorias.productos.index')->with('info', 'Producto creado con éxito');
    }


    public function storeVendedor(Request $request)
    {
        Vendedor::create($request->all());
        return redirect()->route('vendedors.index')->with('info', 'Vendedor creado con éxito');
    }

    public function storeProveedor(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
    ]);

        // Crear un nuevo proveedor en la base de datos
        Proveedor::create($request->all());

        // Redireccionar a la página de lista de proveedores con un mensaje
        return redirect()->route('categorias.proveedor.index')->with('info', 'Proveedor creado con éxito');
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
    public function editProducto(Producto $producto)
    {
        //Modifica los datos de un producto ya ingresado
        return view('categorias.productos.edit', ['producto' => $producto]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function updateProducto(Request $request, $id)
    {
        // Encuentra el producto por su ID
        $producto = Producto::find($id);

        // Actualiza el producto con los nuevos datos
        $producto->update($request->all());

        // Redirige al índice de productos con un mensaje
        return redirect()->route('categorias.productos.index')->with('info', 'Producto actualizado con éxito');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Administrador $administrador)
    {
        //
    }
}
