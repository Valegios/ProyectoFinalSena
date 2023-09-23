<?php

namespace App\Http\Controllers;

use App\Models\Administrador; //Se importa el modelo administrador
use App\Models\Producto; //Se importa el modelo producto
use App\Models\Vendedor; //Se importa el modelo vendedor
use App\Models\Proveedor; //Se importa el modelo proveedor
use Illuminate\Http\Request; //Se importa la clase Request

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los administradores de la base de datos
        $administradores = Administrador::all();
        // Pasar los datos a la vista
        return view('categorias.administrador.index', ['administradores' => $administradores]);
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
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'celular' => 'required|string|max:15',
            'contraseña' => 'required|string|min:8',
        ]);

        // Crear el nuevo administrador
        Administrador::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'celular' => $request->celular,
            'contraseña' => bcrypt($request->contraseña),  // Encriptar la contraseña
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('categorias.administrador.index')->with('info', 'Administrador creado con éxito');
    }

    public function storeProducto(Request $request)
    {
        // Valida los datos antes de guardarlos
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'referencia' => 'required',
            'stock' => 'required',
            'id_proveedor' => 'required',
    ]);

        // Guarda el nuevo producto en la base de datos
        Producto::create($request->all());
        return redirect()->route('categorias.productos.index')->with('info', 'Producto creado con éxito');
    }


    public function storeVendedor(Request $request)
    {
        // Valida los datos antes de guardarlos
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'contraseña' => 'required|min:8',
        ]);
    
        // Guarda el nuevo vendedor en la base de datos
        Vendedor::create($request->all());
    
        // Redireccionar a la página de lista de vendedores con un mensaje
        return redirect()->route('categorias.vendedor.index')->with('info', 'Vendedor creado con éxito');
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

    public function editProveedor($id)
    {
        $proveedor = Proveedor::find($id);
        if (!$proveedor) {
            return redirect()->route('categorias.proveedor.index')->with('error', 'Proveedor no encontrado');
        }
        return view('categorias.proveedor.edit', ['proveedor' => $proveedor]);
    }




    /**
     * Update the specified resource in storage.
     */
    public function updateProducto(Request $request, $id)
    {
        // Valida los datos antes de actualizarlos
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'referencia' => 'required',
            'stock' => 'required',
            'id_proveedor' => 'required',
        ]);

        // Busca el producto por ID y actualiza sus datos
        $producto = Producto::find($id);
        $producto->update($request->all());

        return redirect()->route('categorias.productos.index')->with('info', 'Producto actualizado con éxito');
    }

    public function updateProveedor(Request $request, $id)
    {
        // Validar los datos
        $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'required|string|max:200',
            'telefono' => 'required|string|max:15',
            'email' => 'required|email|max:100',
    ]);

        // Actualizar el proveedor
        $proveedor = Proveedor::find($id);
        $proveedor->update([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'email' => $request->email,
    ]);

        return redirect()->route('categorias.proveedor.index')->with('info', 'Proveedor actualizado con éxito');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroyProducto($id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return redirect()->route('categorias.productos.index')->with('error', 'Producto no encontrado');
        }
        $producto->delete();
        return redirect()->route('categorias.productos.index')->with('info', 'Producto eliminado con éxito');
    }

    public function destroyProveedor($id)
    {
        $proveedor = Proveedor::find($id);

        if ($proveedor) {
            // Verificar si el proveedor tiene productos asociados
            if ($proveedor->productos->count() > 0) {
            return redirect()->route('categorias.proveedor.index')->with('info', 'No se puede eliminar este proveedor porque tiene productos asociados.');
            }

            $proveedor->delete();
            return redirect()->route('categorias.proveedor.index')->with('info', 'Proveedor eliminado con éxito');
        } else {
            return redirect()->route('categorias.proveedor.index')->with('error', 'Proveedor no encontrado');
        }
    }




}
