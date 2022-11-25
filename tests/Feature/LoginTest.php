<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /** @test */
    public function loginTest()
    {
        $responseStart = $this->get('/login');
        $responseStart->assertStatus(200);
        $responseLogin = $this->post('/login', [
            'username' => 'admin',
            'password' => 'admin-gm2022',
        ]);
        $responseLogin->assertRedirect('/home');
    }
}
