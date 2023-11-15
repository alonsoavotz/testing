<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
   use RefreshDatabase;

    /** @test */
    function probando_la_creacion_de_una_categoria() : void
    {
       //$category = Category::factory()->raw();
       

        $data = [
            'name' => 'Categoria 1'
        ];
        
        // A
        $response = $this->post('/categories',  $data);

        $response->assertJsonPath('name', $data['name']);
        
        $this->assertDatabaseCount('categories', 1);

        $this->assertDatabaseHas('categories', [
            'name' => 'Categoria 1'
        ]);
       

    }

    /** @test */
    function probando_ver_una_categoria() : void {
        //Arrage
        $category = Category::factory()->create(['name' => 'Categoria 500']);

        //ACT
        $response = $this->get('/categories/1');

        //Assert
        $response->assertJsonPath('name', $category->name);
    }

    /** @test */
    function probando_la_actualizacion_de_una_categoria(): void {
        //ARRANGE
        $category = Category::factory()->create(['name' => 'Categoria 500']);
        $data = [
            'name' => 'Categoria nueva'
        ];


        //ACT
        $response = $this->put('/categories/'. $category->id, $data);

        //ASSERT
        $response->assertJsonPath('name', $data['name']);

        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'name' => $data['name']
        ]);
    }

    /** @test */
    function probando_eliminar_una_categoria() : void {
        $category = Category::factory()->create(['name' => 'Categoria 500']);
        $category2 = Category::factory()->create(['name' => 'Categoria 600']);

        $this->assertDatabaseCount('categories', 2);

        $response = $this->delete('/categories/'. $category->id);

       $this->assertDatabaseCount('categories', 1);

        $this->assertDatabaseMissing('categories', [
            'id' => $category->id,
        ]);
    }


    /** @test */
    function probando_mostrar_lista_de_categoria() : void {
        $category = Category::factory()->create(['name' => 'Categoria 500']);
        $category2 = Category::factory()->create();
        $category3 = Category::factory()->create();

        $response = $this->get('/categories');

        $response->assertViewHas('categories', function($categories) {
            return $categories->count() === 3;
        });
        $response->assertSee('Categoria 500');
    }
}
