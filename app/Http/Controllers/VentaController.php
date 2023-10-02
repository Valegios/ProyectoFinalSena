<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto; //Se importa el modelo producto
use App\Models\Vendedor; //Se importa el modelo vendedor
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mostrar todas las ventas (con paginación)
        $ventas = Venta::orderBy('fecha', 'desc')->paginate(10);
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
        // Encontrar el producto en la base de datos
        $producto = Producto::find($request->id_producto);

        // Encuentra el vendedor relacionado con el usuario logueado
        $vendedor = Vendedor::where('user_id', auth()->user()->id)->first();

        if (!$vendedor) {
            return redirect()->route('categorias.ventas.index')->with('error', 'Vendedor no encontrado');
        }

        // Guarda la venta en la tabla ventas
        $venta = Venta::create([
            'fecha' => now(),
            'precio' => $producto->precio * $request->cantidad, //  calcula el precio total de la venta multiplicando el precio unitario del producto
            'id_vendedor' => $vendedor->id, // Asumiendo que el vendedor está logueado

        ]);

        // Guarda los productos en la tabla pivote (venta_producto)
        $venta->productos()->attach($producto->id, [
            'cantidad' => $request->cantidad,
            'precio' => $producto->precio,

        ]);

        // Resta la cantidad de productos vendidos al stock
        $producto->stock -= $request->cantidad;
        $producto->save();

        return redirect()->route('categorias.ventas.index')->with('info', 'Venta realizada con éxito');

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
        return view('categorias.ventas.edit', ['venta' => $venta]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        // Actualiza los campos de la tabla ventas
        $venta->fecha = $request->fecha;
        $venta->precio = $request->precio;
        $venta->id_vendedor = $request->id_vendedor;

        // Guarda los cambios en la base de datos
        $venta->save();

        // Redirige al usuario a la lista de ventas con un mensaje informativo
        return redirect()->route('categorias.ventas.index')->with('info', 'La venta ha sido actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        // Eliminar la venta de la tabla pivote (venta_producto)
        $venta->productos()->detach();    
        // Eliminar la venta de la tabla ventas
        $venta->delete();
    
        return redirect()->route('categorias.ventas.index')->with('info', 'Venta eliminada con éxito');
    }

    /**public function __construct()
    {
        // Todos los usuarios deben estar autenticados para acceder a cualquier método de este controlador
        $this->middleware('auth');
        // Sólo los usuarios con rol de admin pueden acceder a todos los métodos de este controlador
        $this->middleware('admin')->only(['edit', 'update', 'destroy']);
    }*/
}
