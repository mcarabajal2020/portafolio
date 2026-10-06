<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_portfolio_page_returns_a_successful_response(): void
    {
        $response = $this->get('/portfolio');

        $response->assertStatus(200);
    }

    public function test_blog_page_returns_a_successful_response(): void
    {
        $response = $this->get('/blog');

        $response->assertStatus(200);
    }

    public function test_contact_page_returns_a_successful_response(): void
    {
        $response = $this->get('/contacto');

        $response->assertStatus(200);
    }

    public function test_admin_login_page_returns_a_successful_response(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
    }
}
