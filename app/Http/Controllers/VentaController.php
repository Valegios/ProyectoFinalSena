<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto; //Se importa el modelo producto
use App\Models\Vendedor; //Se importa el modelo vendedor
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function edit($id)
    {
        $venta = Venta::with('productos')->find($id); // Cargamos la relación con productos
        $productos = Producto::all();
        return view('categorias.ventas.edit', compact('venta', 'productos'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        // Validaciones
        $request->validate([
            'fecha' => 'required|date',
            'id_producto' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1'
        ]);

        // Buscar el producto
        $producto = Producto::find($request->id_producto);

        // Verificar si el producto existe
        if (!$producto) {
        return redirect()->back()->with('error', 'Producto no encontrado');
        }

        // Buscar el vendedor relacionado con el usuario autenticado
        $vendedor = Vendedor::where('user_id', auth()->user()->id)->first();

        // Verificar si el vendedor existe
        if (!$vendedor) {
        return redirect()->back()->with('error', 'Vendedor no encontrado');
        }

        DB::beginTransaction();

    try {
        // Actualizar la venta
        $venta->fecha = $request->fecha;
        $venta->precio = $producto->precio * $request->cantidad;
        $venta->id_vendedor = $vendedor->id;
        $venta->save();

        // Actualizar la tabla intermedia (suponiendo que una venta puede tener solo un producto)
        $venta->productos()->sync([$producto->id => ['cantidad' => $request->cantidad, 'precio' => $producto->precio]]);

        // Actualizar el stock del producto
        $producto->stock -= $request->cantidad;
        $producto->save();

        // Confirmar la transacción
        DB::commit();

        return redirect()->route('categorias.ventas.index')->with('info', 'La venta ha sido actualizada con éxito');

        } catch (\Exception $e) {
            // Deshacer los cambios en caso de error
            DB::rollback();
            return redirect()->back()->with('error', 'Ocurrió un error al actualizar la venta');
        }
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
