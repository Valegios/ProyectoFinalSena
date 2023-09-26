<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto; //Se importa el modelo producto
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
        $productos = Producto::all();  // Obtener todos los productos
        return view('categorias.ventas.create', ['productos' => $productos]);  // Pasar la lista de productos a la vista
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los campos requeridos
        $request->validate([
            'fecha' => 'required',
            'precio' => 'required',
            'id_vendedor' => 'required',
            'id_producto' => 'required|array', // Asegúrate de que se selecciona al menos un producto
        ]);

        // Inicializar el precio total
        $precioTotal = 0;

        // Recorrer todos los productos seleccionados y actualizar el stock y sumar el precio
        foreach ($request->input('id_producto') as $producto_id) {
            $producto = Producto::find($producto_id);
        
            // Sumar el precio del producto al precio total
            $precioTotal += $producto->precio;

            // Restar 1 del stock del producto (o la cantidad que se venda)
            $producto->stock -= 1;
            $producto->save();
        }

        // Crear una nueva venta
        $venta = new Venta();
        $venta->fecha = $request->input('fecha');
        $venta->precio = $precioTotal; // Usar el precio total calculado
        $venta->id_vendedor = $request->input('id_vendedor');
        $venta->cantidad = 1;
        $venta->save();

        // Redirigir con un mensaje
        return redirect()->route('categorias.ventas.index')->with('info', 'Venta creada con éxito');
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
