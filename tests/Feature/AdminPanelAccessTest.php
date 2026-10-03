<?php

namespace Tests\Feature;

use App\Models\User;
use App\Support\Roles;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class AdminPanelAccessTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(RoleSeeder::class);
    }

    #[Test]
    public function guests_are_redirected_to_the_admin_login(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
    }

    #[Test]
    public function the_admin_login_screen_is_public(): void
    {
        $this->get('/admin/login')->assertOk();
    }

    #[Test]
    public function users_without_a_role_cannot_access_the_panel(): void
    {
        $user = User::create([
            'name' => 'Public Visitor',
            'email' => 'visitor@example.test',
            'password' => 'password',
            'status' => 'active',
        ]);

        $this->actingAs($user)->get('/admin')->assertForbidden();
    }

    #[Test]
    public function suspended_staff_cannot_access_the_panel(): void
    {
        $user = User::create([
            'name' => 'Suspended Editor',
            'email' => 'suspended@example.test',
            'password' => 'password',
            'status' => 'suspended',
        ]);
        $user->assignRole(Roles::EDITOR);

        $this->actingAs($user)->get('/admin')->assertForbidden();
    }

    #[Test]
    public function super_admins_can_access_the_panel(): void
    {
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'super@example.test',
            'password' => 'password',
            'status' => 'active',
        ]);
        $user->assignRole(Roles::SUPER_ADMIN);

        $this->actingAs($user)->get('/admin')->assertOk();
    }

    #[Test]
    public function editors_can_access_the_panel(): void
    {
        $user = User::create([
            'name' => 'Editor',
            'email' => 'editor@example.test',
            'password' => 'password',
            'status' => 'active',
        ]);
        $user->assignRole(Roles::EDITOR);

        $this->actingAs($user)->get('/admin')->assertOk();
    }
}
