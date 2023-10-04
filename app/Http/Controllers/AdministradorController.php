<?php

namespace App\Http\Controllers;

use App\Models\Administrador; //Se importa el modelo administrador
use App\Models\Producto; //Se importa el modelo producto
use App\Models\Vendedor; //Se importa el modelo vendedor
use App\Models\Proveedor; //Se importa el modelo proveedor
use App\Models\User; //Se importa el modelo User
use Illuminate\Http\Request; //Se importa la clase Request

class AdministradorController extends Controller
{
    /**
     * Muestra una lista de este recurso
     */
    public function index()
    {
        // Obtener todos los administradores de la base de datos
        $administradores = Administrador::all();
        // Pasar los datos a la vista
        return view('categorias.administrador.index', ['administradores' => $administradores]);
    }

    /**
     * Muestra un formulario para crear un nuevo recurso
     */
    public function create()
    {
        //Carga la vista de creacion de un nuevo administrador
        return view('categorias.administrador.create');
    }

    /**
     * Guarda un nuevo recurso en la base de datos
     */
    public function storeAdministrador(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'name' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'celular' => 'required|string|max:15',
            'password' => 'required|string|min:8',
        ]);

        // Crear el nuevo administrador
        Administrador::create([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'celular' => $request->celular,
            'password' => bcrypt($request->password),  // Se utiliza bcrypt para encriptar la contraseña
            //'rol' => 'admin' //Asignacion del rol de administrador
        ]);

        // Crear el nuevo administrador en la tabla de users
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'rol' => 'admin'
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
            'name' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);


        // Crear el nuevo vendedor en la tabla de users
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'rol' => 'auth'
        ]);
    
        // Crear el vendedor
        Vendedor::create([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Se utiliza bcrypt para encriptar la contraseña
            'user_id' => $user->id //Asignacion de rol user=vendedor
        ]);        
    
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
     * Muestra un unico recurso especifico
     */
    public function show(Administrador $administrador)
    {
        //
    }

    /**
     * Muestra el formulario para editar un recurso
     */
    public function editAdministrador($id)
    {
        $administrador = Administrador::find($id);
        if (!$administrador) {
            return redirect()->route('categorias.administrador.index')->with('error', 'Administrador no encontrado');
        }
        return view('categorias.administrador.edit', ['administrador' => $administrador]);
    }

    public function editProducto($id)
    {
        $producto = Producto::find($id);
        $proveedores = Proveedor::all();
        return view('categorias.productos.edit', ['producto' => $producto, 'proveedores' => $proveedores]);
    }

    public function editVendedor($id)
    {
        // Buscar el vendedor en la base de datos usando el ID
        $vendedor = Vendedor::find($id);
        // Si el vendedor no se encuentra, redirigir con un mensaje de error
        if (!$vendedor) {
            return redirect()->route('vendedor.index')->with('error', 'Vendedor no encontrado');
        }

        // Pasar los datos del vendedor a la vista de edición
        return view('categorias.vendedor.edit', ['vendedor' => $vendedor]);
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
     * Actualiza un recurso especifico en la base de datos
     */

    public function updateAdministrador(Request $request, $id)
    {
        // Validar los datos
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'celular' => 'required|string|max:20',
            'contraseña' => 'required|string|max:20',
        ]);
     
        // Buscar el administrador por ID
        $administrador = Administrador::find($id);
     
        // Actualizar el administrador
        $administrador->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'celular' => $request->celular,
            'contraseña' => bcrypt($request->contraseña), // Se utiliza bcrypt para encriptar la contraseña
        ]);
     
        return redirect()->route('categorias.administrador.index')->with('info', 'Administrador actualizado con éxito');
    }
     

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

    public function updateVendedor(Request $request, $id)
    {
        // Buscar el vendedor por ID
        $vendedor = Vendedor::findOrFail($id);
    
        // Actualizar la información del vendedor
        $vendedor->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'contraseña' => bcrypt($request->contraseña),  // Asegúrate de encriptar la contraseña
        ]);
    
        // Redirigir a la página de lista de vendedores con un mensaje
        return redirect()->route('categorias.vendedor.index')->with('info', 'Vendedor actualizado con éxito');
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
     * Elimina un recurso especifico de la base de datos
     */

    public function destroyAdministrador(Administrador $administrador)
    {
        $administrador->delete();
        return redirect()->route('categorias.administrador.index')->with('info', 'Administrador eliminado con éxito');
    }


    public function destroyProducto($id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return redirect()->route('categorias.productos.index')->with('error', 'Producto no encontrado');
        }
        $producto->delete();
        return redirect()->route('categorias.productos.index')->with('info', 'Producto eliminado con éxito');
    }

    public function destroyVendedor($id)
    {
        $vendedor = Vendedor::find($id);
        if ($vendedor) {
            $vendedor->delete();
            return redirect()->route('categorias.vendedor.index')->with('info', 'Vendedor eliminado con éxito');
        } else {
            return redirect()->route('categorias.vendedor.index')->with('error', 'Vendedor no encontrado');
        }
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

    /**public function __construct()
    {
        // Todos los usuarios deben estar autenticados para acceder a cualquier método de este controlador
        $this->middleware('auth');

        // Sólo los usuarios con rol de admin pueden acceder a todos los métodos de este controlador
        $this->middleware('admin');
    }*/

}
