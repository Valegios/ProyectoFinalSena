<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductoTest extends TestCase
{
    //Test para crear un producto
    /* Se comenta para la segunda prueba
    public function test_crear_producto(): void
    {
        $response = $this->post('/api/v1/productos', [
            'nombre' => 'Calculadora',
            'precio' => 20000,
            'referencia' => 'Casio',
            'stock' => 10,
            'id_proveedor' => 2,
        ]);
    
        $response->assertStatus(201); //Asegura que el producto se creó exitosamente (HTTP 201 Created)
    }*/

    // Test para obtener todos los productos
    public function test_obtener_todos_los_productos(): void
    {
        $response = $this->get('/api/v1/productos');
        $response->assertStatus(200); // Asegura que la petición fue exitosa
    }

    // Test para obtener un producto
    public function test_obtener_un_producto(): void
    {
        $response = $this->get('/api/v1/productos/5');
        $response->assertStatus(200); // Asegura que la petición fue exitosa
    }

    // Test para actualizar un producto
    public function test_actualizar_producto(): void
    {
        $response = $this->put('/api/v1/productos/12', [
            'nombre' => 'Calculadora',
            'precio' => 30000,  // Se modifica el precio pasa de 20mil a 30mil
            'referencia' => 'Casio',
            'stock' => 10,
            'id_proveedor' => 2,
        ]);

        $response->assertStatus(200); // Asegura que la petición fue exitosa
    }
}
