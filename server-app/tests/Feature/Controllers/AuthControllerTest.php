<?php

namespace Tests\Controllers;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Date;

class AuthControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // $this->markTestSkipped('Teste desativado.');
    }

    public function testApiRegistroDeUsuarioComum()
    {
        $user = User::factory()->create();

        $response = $this->post('/api/v1/register', [
            'name' => $user->name,
            'email' => "teste" . $user->email,
            'password' => $user->password,
            'role' => 'user'
        ]);

        $response->assertJson(['data' => $response->json('data')]);
        $response->assertJsonStructure([
            'data' => [
                'user',
            ]
        ]);
        $response->assertStatus(200);
    }

    public function testApiRegistroDeBibliotecario()
    {
        $user = User::factory()->create();

        $response = $this->post('/api/v1/register', [
            'name' => $user->name,
            'email' => "teste" . $user->email,
            'password' => $user->password,
            'role' => 'librarian'
        ]);

        $response->assertJson(['data' => $response->json('data')]);
        $response->assertJsonStructure([
            'data' => [
                'user',
            ]
        ]);
        $response->assertStatus(200);
    }

    public function testApiLoginDeUsuarioValidoEVerificado()
    {
        $user = User::factory()->create(['email_verified_at' => Date::now()]);

        $response = $this->post('/api/v1/login', [
            'email' => $user->email,
            'password' => 'wilsoncastro123',
        ]);

        $this->assertAuthenticated();

        $response->assertJson(['data' => $response->json('data')]);
        $response->assertJsonStructure([
            'data' => [
                'user',
                'token',
            ]
        ]);
        $response->assertStatus(200);
    }

    public function testApiLoginDeUsuarioInvalido()
    {
        $user = User::factory()->create(['email_verified_at' => Date::now()]);

        $response = $this->post('api/v1/login', [
            'email' => $user->email,
            'password' => 'wivenn123',
        ]);

        $this->assertGuest();

        $response->assertJson(['message' => 'Usuário não autenticado']);
        $response->assertStatus(401);
    }

    public function testApiLoginDeUsuarioNaoVerificado()
    {
        $user = User::factory()->create();

        $response = $this->post('/api/v1/login', [
            'email' => $user->email,
            'password' => 'wilsoncastro123',
        ]);

        $this->assertAuthenticated();

        $response->assertJson(['message' => 'Usuário não verificado']);
        $response->assertStatus(403);
    }

    public function testApiLogoutDeUsuarioAutenticado(): void
    {
        $user = User::factory()->create(['email_verified_at' => Date::now()]);

        $token = $this->post('api/v1/login', [
            'email' => $user->email,
            'password' => 'wilsoncastro123',
        ])->json('data')['token'];

        $response = $this->post('api/v1/logout', [], [
            'Authorization' => "Bearer $token",
        ]);

        $response->assertJson(['message' => 'Usuário deslogado com sucesso']);
        $response->assertStatus(200);
    }

    public function testEmailPodeSerVerificado(): void
    {
        $user = User::factory()->create();

        $verificationUrl = URL::to(null . "/email/verify", ['id' => $user->id, 'hash' => sha1($user->email)]);

        $response = $this->get($verificationUrl);

        $this->assertTrue($user->fresh()->hasVerifiedEmail());
        $response->assertRedirect(env('CLIENT_URL') . '/login' . '?verificado=1');
    }

    public function testEmaiNãoVerificadoComHashInvalida(): void
    {
        $user = User::factory()->create();

        $verificationUrl = URL::to(null . "/email/verify", ['id' => $user->id, 'hash' => sha1("email_invalido@wivenn.com.br")]);

        $response = $this->get($verificationUrl);

        $this->assertFalse($user->fresh()->hasVerifiedEmail());
        $response->assertRedirect(env('CLIENT_URL') . '/login' . '?verificado=0');
    }
}
