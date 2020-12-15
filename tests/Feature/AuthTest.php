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
    public function testRegister()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('Регистрация');
        $response->assertSee('Имя');
        $response->assertSee('Фамилия');
        $response->assertSee('Телефон');
        $response->assertSee('Фамилия пригласившего');
        $response->assertSee('Организация');
        $response->assertSee('Пароль');
        $response->assertSee('Подтверждение пароля');

    }
    public function testlogin()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('Вход');
        $response->assertSee('Телефон');
        $response->assertSee('Пароль');
    }
}
