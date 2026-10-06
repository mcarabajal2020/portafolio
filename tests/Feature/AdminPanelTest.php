<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_login_page_is_accessible(): void
    {
        $this->get('/admin/login')->assertOk();
    }

    public function test_admin_dashboard_requires_authentication(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
    }

    public function test_authenticated_user_can_view_dashboard(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/admin')
            ->assertOk()
            ->assertSee('CarabajalDev');
    }

    public function test_posts_resource_is_accessible(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/admin/posts')
            ->assertOk()
            ->assertSee('Posts');
    }

    public function test_categories_resource_is_accessible(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/admin/categories')
            ->assertOk()
            ->assertSee('Categor');
    }
}
