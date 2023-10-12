<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * - Consultar todos los productos: En el método index retornamos todos los productos de nuestra base de datos
     */
    public function index()
    {
        return response()->json(Producto::all(), 200); //200: OK
    }

    /**
     * Crear un nuevo producto
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'precio' => ['required', 'integer', 'min:0'],
            'referencia' => ['required', 'string', 'max:100'],
            'stock' => ['required', 'integer', 'min:0'],
            'id_proveedor' => ['required', 'integer', 'exists:proveedors,id']
        ]);

        // Crear el producto
        $producto = Producto::create($datos);

        return response()->json(['success' => true, 'message' => 'Producto creado'], 201); // 201: Created
    }

    /**
     * Consultar un producto
     */
    public function show(Producto $producto)
    {
        return response()->json($producto, 200); //200: OK
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        // Validar los datos de entrada
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'precio' => ['required', 'integer', 'min:0'],
            'referencia' => ['required', 'string', 'max:100'],
            'stock' => ['required', 'integer', 'min:0'],
            'id_proveedor' => ['required', 'integer', 'exists:proveedors,id']
        ]);

        // Actualizar el producto
        $producto->update($datos);

        return response()->json(['success' => true, 'message' => 'Producto actualizado'], 200); // 200: OK
    }

    /**
     * Eliminar un producto
     */
    public function destroy(Producto $producto)
    {
        $producto->delete(); 
        return response()->json(['success' => true, 'message' => 'Producto eliminado'], 204); //204: No content
    }
}
