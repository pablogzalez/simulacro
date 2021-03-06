<?php

namespace Tests\Feature\Admin;

use App\Profession;
use App\User;
use App\UserProfile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserProfileTest extends TestCase
{
    use RefreshDatabase;

    protected $defaultData = [
        'first_name' => 'Pepe',
        'last_name' => 'Pérez',
        'email' => 'pepe@mail.es',
        'bio' => 'Programador de Laravel y Vue.js',
        'twitter' => 'https://twitter.com/pepe',
    ];

    /** @test */
    function a_user_can_edit_its_profile()
    {
        $user = User::factory()->create();

        $newProfession = Profession::factory()->create();

        // $this->actingAs($user);

        $response = $this->get('/editar-perfil/');
        $response->assertStatus(200);

        $response = $this->put('editar-perfil/', [
            'first_name' => 'Pepe',
            'last_name' => 'Pérez',
            'email' => 'pepe@mail.es',
            'bio' => 'Programador de Laravel y Vue.js',
            'twitter' => 'https://twitter.com/pepe',
            'profession_id' => $newProfession->id,
        ]);

        $response->assertRedirect('/editar-perfil/');

        $this->assertDatabaseHas('users', [
            'first_name' => 'Pepe',
            'last_name' => 'Pérez',
            'email' => 'pepe@mail.es',
        ]);

        $this->assertDatabaseHas('user_profiles', [
            'bio' => 'Programador de Laravel y Vue.js',
            'twitter' => 'https://twitter.com/pepe',
            'profession_id' => $newProfession->id,
        ]);
    }

    /** @test */
    function the_user_cannot_change_its_role()
    {
        $user = User::factory()->create([
            'role' => 'user',
        ]);

        $response = $this->put('/editar-perfil/', $this->withData([
            'role' => 'admin',
        ]));

        $response->assertRedirect();

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'role' => 'user',
        ]);
    }

    /** @test */
    function the_user_cannot_change_its_password()
    {
        $user = User::factory()->create([
            'password' => bcrypt('old123'),
        ]);

        $response = $this->put('/editar-perfil/', $this->withData([
            'email' => 'pepe@mail.es',
            'password' => 'new456',
        ]));

        $response->assertRedirect();

        $this->assertCredentials([
            'email' => 'pepe@mail.es',
            'password' => 'old123',
        ]);
    }
}
