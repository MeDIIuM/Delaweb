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
        $response = $this->post('/register', ['name' => 'Егор', 'surname' => 'Лагутин', 'phone' => '89098909', 'invite' => 'Голобородов', 'organization' => 'Кораблик', 'password' => '00000000', 'password_confirmation' => '00000000']);
        var_dump($response->content());
        $response->assertRedirect('/');
        $response->assertStatus(302);
    }
    public function testNewUserRegistration()
    {
        $this->visit('/register')
            ->type('name', 'Антон')
            ->type('surname', 'Иванов')
            ->type('phone', '12345678')
            ->select('invite', 'Торочкин')
            ->type('organization', 'Кораблики')
            ->type('password', '09900990')
            ->type('password_confirmation', '09900990')
            ->press('Регистрация')
            ->seePageIs('/home');
    }
}
