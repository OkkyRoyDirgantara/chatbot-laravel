<?php

namespace Tests\Feature\View;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginViewTest extends TestCase
{
    /**
     * A basic feature test example.
     */
//    public function test_example(): void
//    {
//        $response = $this->get('/');
//
//        $response->assertStatus(200);
//    }

    public function test_that_login_view_is_returned(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_login_is_valid(): void
    {
        $response = $this->post('/login', [
            'email' => 'okkyroydirgantara@gmail.com',
            'password' => 'admin',]);
        $response->assertStatus(302);
        $response->assertRedirect('/admin/dashboard');
    }

    public function test_login_is_not_valid(): void
    {
        $response = $this->post('/login', [
            'email' => 'okkyroydirgantara@gmail',
            'password' => '123'
        ]);
        $response->assertStatus(302);
    }

}
