<?php

namespace Tests\Services;

use App\Services\AuthService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Date;
use Tests\TestCase;

class AuthServiceTest extends TestCase
{
    protected $authService;

    public function setUp() : void
    {
        parent::setUp();
        // $this->markTestSkipped('Teste desativado.');
        $this->authService = app()->make(AuthService::class);
    }

    public function testServicoRegistroDeUsuarioComum()
    {
        $user = User::factory()->make()->toArray();
        $user['password'] = "wilsoncastro123";
        $user['role'] = "user";

        $createdUser = $this->authService->register(new Request($user));

        $this->assertNotNull($createdUser, 'O Usuario Comum criado deve ser diferente de nulo');
        $this->assertInstanceOf(
            JsonResource::class,
            $createdUser,
            'O objeto Usuario Comum retornado deve ser uma instância da classe JsonResource'
        );
    }

    public function testServicoRegistroDeBibliotecario()
    {
        $user = User::factory()->make()->toArray();
        $user['password'] = "wilsoncastro123";
        $user['role'] = "librarian";

        $createdUser = $this->authService->register(new Request($user));

        $this->assertNotNull($createdUser, 'O Usuario Bibliotecário criado deve ser diferente de nulo');
        $this->assertInstanceOf(
            JsonResource::class,
            $createdUser,
            'O objeto Usuario Bibliotecário deve ser uma instância da classe JsonResource'
        );
    }

    public function testServicoLoginDeUsuario()
    {
        $storedUser = User::factory()->count(5)->create(['email_verified_at' => Date::now()]);
        $storedUserRequest = $storedUser->first()->toArray();
        $storedUserRequest['password'] = "wilsoncastro123";

        $loggedUser = $this->authService->login(new Request($storedUserRequest));

        $this->assertNotNull($loggedUser, 'O Usuario retornado deve ser diferente de nulo');
        $this->assertInstanceOf(
            JsonResource::class,
            $loggedUser,
            'O objeto Usuario retornado deve ser uma instância da classe JsonResource'
        );
    }

    public function testServicoEmailDeUsuarioVerificado()
    {
        $user = User::factory()->create();

        $requestVerificationUrl = [
            'id' => $user->id,
            'hash' => sha1($user->email)
        ];

        $emailVerify = $this->authService->verify(new Request($requestVerificationUrl));

        $this->assertTrue($emailVerify);
    }
}
