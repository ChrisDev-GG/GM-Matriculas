<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function HomeViewTest()
    {
        $response = $this->get('/home');

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function MatriculasViewTest()
    {
        $response = $this->get('/matriculas');

        $response->assertStatus(200);
    }
        
    /**
     * A basic test example.
     *
     * @return void
     */

    /**
     * A basic test example.
     *
     * @return void
     */
    public function RegistrosViewTest()
    {
        $response = $this->get('/registros');

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function UsuariosViewTest()
    {
        $response = $this->get('/usuarios');

        $response->assertStatus(200);
    }
}