<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginModuleTest extends TestCase
{
    /** @test */
    function load_login()
    {
            $this->get('login')
            ->assertStatus(200);
    }
    /** @test */
    function load_logout()
    {
            $this->get('/')
            ->assertStatus(200);
    }
    /** @test */
    function load_register()
    {
            $this->get('register')
            ->assertStatus(200);
    }
}
