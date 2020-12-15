<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @method visit(string $string)
 */
class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('Регистрация');
        $response->assertSee('Фамилия пригласившего');

    }
}
