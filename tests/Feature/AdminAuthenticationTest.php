<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_pages_redirect_guests_to_login(): void
    {
        $this->get(route('admin.dashboard'))
            ->assertRedirect(route('login'));

        $this->get(route('project.index'))
            ->assertRedirect(route('login'));

        $this->get(route('project.create'))
            ->assertRedirect(route('login'));
    }

    public function test_login_page_renders(): void
    {
        $this->get(route('login'))
            ->assertSee('Admin Login')
            ->assertSee('Email address')
            ->assertSee('Password');
    }

    public function test_valid_credentials_authenticate_and_open_admin_dashboard(): void
    {
        $user = User::factory()->create([
            'password' => 'correct-password',
        ]);

        $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'correct-password',
        ])->assertRedirect(route('admin.dashboard'));

        $this->assertAuthenticatedAs($user);

        $this->get(route('admin.dashboard'))
            ->assertSee('Admin Dashboard')
            ->assertSee('Welcome to the admin dashboard!');
    }

    public function test_invalid_credentials_return_to_login_with_an_error(): void
    {
        $user = User::factory()->create([
            'password' => 'correct-password',
        ]);

        $this->from(route('login'))
            ->post(route('login.store'), [
                'email' => $user->email,
                'password' => 'incorrect-password',
            ])
            ->assertRedirect(route('login'))
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_logout_ends_the_authenticated_session(): void
    {
        $this->actingAs(User::factory()->create())
            ->post(route('logout'))
            ->assertRedirect(route('login'));

        $this->assertGuest();

        $this->get(route('admin.dashboard'))
            ->assertRedirect(route('login'));
    }
}
