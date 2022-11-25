<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /** @test */
    public function routeHomeTest()
    {
        $response = $this->get('/home');
        $response->assertStatus(200);
    }
    /** @test */
    public function routeMatriculas()
    {
        $responseStart = $this->get('/matriculas');
        $responseDocument = $this->get('/matriculas/dpds');
        $responseStart->assertStatus(200);
        $responseDocument->assertStatus(200);
    }
    /** @test */
    public function routeRegistros()
    {
        $responseStart = $this->get('/registros');
        $responseStart->assertStatus(200);
    }
    /** @test */
    public function routeAlumno()
    {
        $responseAlumno = $this->get('/registros/alumnos');
        $responseAlumnoData = $this->get('/registros/alumnos-data');
        $responseAlumno->assertStatus(200);
        $responseAlumnoData->assertStatus(200);
    }
    /** @test */
    public function routeApoderado()
    {
        $responseApoderado = $this->get('/registros/apoderados');
        $responseApoderado->assertStatus(200);
    }
    /** @test */
    public function routeSuplente()
    {
        $responseSuplente = $this->get('/registros/suplentes');
        $responseSuplente->assertStatus(200);
    }
    /** @test */
    public function routeUsuario()
    {
        $responseUsuario = $this->get('/usuarios');
        $responseUsuarioData = $this->get('/usuariosdata');
        $responseUsuario->assertStatus(200);
        $responseUsuarioData->assertStatus(200);
    }
    /** @test */
    public function routeSuccess()
    {
        $responseAlumno = $this->get('/registros/alumno_success');
        $responseApoderado = $this->get('/registros/apoderado_success');
        $responseSuplente = $this->get('/registros/suplente_success');
        $responseUsuario = $this->get('/usuarios/registro');
        $responseAlumno->assertStatus(200);
        $responseApoderado->assertStatus(200);
        $responseSuplente->assertStatus(200);
        $responseUsuario->assertStatus(200);
    }
    /** @test */
    public function routeUpdated()
    {
        $responseAlumno = $this->get('/registros/alumno_updated');
        $responseApoderado = $this->get('/registros/apoderado_updated');
        $responseSuplente = $this->get('/registros/suplente_updated');
        $responseUsuario = $this->get('/usuarios/update_success');
        $responseAlumno->assertStatus(200);
        $responseApoderado->assertStatus(200);
        $responseSuplente->assertStatus(200);
        $responseUsuario->assertStatus(200);
    }
}
