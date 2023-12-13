<?php

namespace Tests\Repositories;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Date;

class UserRepositoryTest extends TestCase
{
    protected $userRepository;

    public function setUp(): void
    {
        parent::setUp();
        // $this->markTestSkipped('Teste desativado.');
        $this->userRepository = app()->make(UserRepository::class);
    }

    public function testRepositorioRegistroDeUsuarioComum()
    {
        $user = User::factory()->make()->toArray();
        $user['password'] = "wilsoncastro123";
        $user['role'] = "user";

        $registeredUser = $this->userRepository->createUser(new Request($user));

        $this->assertDatabaseHas('users', [
            'name' => $user['name'],
            'email' => $user['email'],
        ]);

        $this->assertEquals('user', $registeredUser->getRoleNames()[0]);
    }

    public function testRepositorioRegistroDeBibliotecario()
    {
        $user = User::factory()->make()->toArray();
        $user['password'] = "wilsoncastro123";
        $user['role'] = "librarian";

        $registeredUser = $this->userRepository->createUser(new Request($user));

        $this->assertDatabaseHas('users', [
            'name' => $user['name'],
            'email' => $user['email'],
        ]);

        $this->assertEquals('librarian', $registeredUser->getRoleNames()[0]);
    }

    public function testRepositorioLoginDeUsuario()
    {
        $storedUser = User::factory()->count(5)->create(['email_verified_at' => Date::now()]);
        $storedUserRequest = $storedUser->first()->toArray();
        $storedUserRequest['password'] = "wilsoncastro123";

        $foundUser = $this->userRepository->getUserAuthenticated(new Request($storedUserRequest));

        $this->assertEquals(
            $storedUserRequest['id'],
            $foundUser->id,
            'O ID do Usuario da requisição deve ser o mesmo ID do Usuario recuperado do Banco de Dados'
        );
        $this->assertInstanceOf(
            User::class, $foundUser,
            'O Usuario encontrado deve ser uma instância da classe User'
        );
    }

    public function testRepositorioObtemEmailDoUsuarioASerVerificado()
    {
        $user = User::factory()->create();

        $email = $this->userRepository->getEmailForVerification($user);

        $this->assertEquals($user->email, $email);
    }

    public function testRepositorioEmailDoUsuarioNaoVerficado()
    {
        $user = User::factory()->create();

        $emailVerify = $this->userRepository->hasVerifiedEmail($user);

        $this->assertFalse($emailVerify);
    }

    public function testRepositorioMarcaOEmailDoUsuarioComoVerificado()
    {
        $user = User::factory()->create();

        $this->userRepository->markEmailAsVerified($user);

        $this->assertDatabaseHas('users', [
            'email_verified_at' => $user->freshTimestamp(),
        ]);
    }
}
