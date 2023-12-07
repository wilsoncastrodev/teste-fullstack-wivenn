<?php

namespace Tests\Controllers;

use Tests\TestCase;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Date;

class BookControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // $this->markTestSkipped('Teste desativado.');
    }

    public function testApiListaTodosOsLivroComPaginacao()
    {
        $user = User::factory()->create(['email_verified_at' => Date::now()]);
        Book::factory()->count(10)->create();

        $token = $this->post('api/v1/login', [
            'email' => $user->email,
            'password' => 'wilsoncastro123',
        ])->json('data')['token'];

        $response = $this->get('api/v1/books/paginate/5', [
            'Authorization' => "Bearer $token",
        ]);

        $response->assertStatus(200);
        $response->assertOk();
    }

    public function testServicoBuscaLivroPorTitulo()
    {
        $user = User::factory()->create(['email_verified_at' => Date::now()]);
        $storedBooks = Book::factory()->count(10)->create();
        $storedBookRequest = $storedBooks->first();

        $token = $this->post('api/v1/login', [
            'email' => $user->email,
            'password' => 'wilsoncastro123',
        ])->json('data')['token'];

        sleep(5); // Aguarda 5 segundos para armazenar os registros de teste no banco de dados

        $response = $this->get("api/v1/books/search/$storedBookRequest->title", [
            'Authorization' => "Bearer $token",
        ]);

        $response->assertStatus(200);
        $response->assertOk();
    }

    public function testServicoBuscaLivroPorIsbn()
    {
        $user = User::factory()->create(['email_verified_at' => Date::now()]);
        $storedBooks = Book::factory()->count(10)->create();
        $storedBookRequest = $storedBooks->first();

        $token = $this->post('api/v1/login', [
            'email' => $user->email,
            'password' => 'wilsoncastro123',
        ])->json('data')['token'];

        sleep(5); // Aguarda 5 segundos para armazenar os registros de teste no banco de dados

        $response = $this->get("api/v1/books/search/$storedBookRequest->isbn", [
            'Authorization' => "Bearer $token",
        ]);

        $response->assertStatus(200);
        $response->assertOk();
    }

    public function testServicoBuscaLivroPorAutor()
    {
        $user = User::factory()->create(['email_verified_at' => Date::now()]);
        $storedBooks = Book::factory()->count(10)->create();
        $storedBookRequest = $storedBooks->first();

        $token = $this->post('api/v1/login', [
            'email' => $user->email,
            'password' => 'wilsoncastro123',
        ])->json('data')['token'];

        sleep(5); // Aguarda 5 segundos para armazenar os registros de teste no banco de dados

        $response = $this->get("api/v1/books/search/$storedBookRequest->author", [
            'Authorization' => "Bearer $token",
        ]);

        $response->assertStatus(200);
        $response->assertOk();
    }
}
