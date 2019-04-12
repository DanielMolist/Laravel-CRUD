<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
    /** @test */
    function load_productos()
    {
            $this->get('productos')
            ->assertStatus(200);
    }
    /** @test */
    function load_productos_create()
    {
            $this->get('productos/create')
            ->assertStatus(200);
    }
    /** @test */
    function load_productos_update()
    {
            $this->get('productos/{producto}')
            ->assertStatus(200);
    }
    /** @test */
    function load_productos_destroy()
    {
            $this->get('productos/{producto}')
            ->assertStatus(200);
    }
    /** @test */
    function load_productos_edit()
    {
            $this->get('productos/1013/edit')
            ->assertStatus(200);
    }
    
}
