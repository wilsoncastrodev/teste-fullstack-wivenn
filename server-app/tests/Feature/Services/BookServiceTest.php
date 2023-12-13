<?php

namespace Tests\Services;

use App\Models\Book;
use App\Services\BookService;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Tests\TestCase;

class BookServiceTest extends TestCase
{
    protected $bookService;

    public function setUp() : void
    {
        parent::setUp();
        // $this->markTestSkipped('Teste desativado.');
        $this->bookService = app()->make(BookService::class);
    }

    public function testServicoListaTodosOsLivroComPaginacao()
    {
        Book::factory()->count(10)->create();

        $listBook = $this->bookService->getAllBookPaginate(5);

        $this->assertNotEmpty($listBook, 'A lista de Livros retornado deve ser diferente de vazio');
        $this->assertInstanceOf(
            ResourceCollection::class,
            $listBook,
            'A lista de objetos de Paciente retornado deve ser uma instância da classe ResourceCollection'
        );
    }

    public function testServicoBuscaLivroPorTitulo()
    {
        $storedBooks = Book::factory()->count(5)->create();
        $storedBookRequest = $storedBooks->first();

        sleep(5); // Aguarda 5 segundos para armazenar os registros de teste no banco de dados

        $foundBook = $this->bookService->searchBook($storedBookRequest->title);

        $this->assertNotEmpty($foundBook, 'A lista de Livros retornado deve ser diferente de vazio');
        $this->assertInstanceOf(
            ResourceCollection::class,
            $foundBook,
            'A lista de objetos de Paciente retornado deve ser uma instância da classe ResourceCollection'
        );
    }

    public function testServicoBuscaLivroPorIsnb()
    {
        $storedBooks = Book::factory()->count(5)->create();
        $storedBookRequest = $storedBooks->first();

        sleep(5); // Aguarda 5 segundos para armazenar os registros de teste no banco de dados

        $foundBook = $this->bookService->searchBook($storedBookRequest->isbn);

        $this->assertNotEmpty($foundBook, 'A lista de Livros retornado deve ser diferente de vazio');
        $this->assertInstanceOf(
            ResourceCollection::class,
            $foundBook,
            'A lista de objetos de Paciente retornado deve ser uma instância da classe ResourceCollection'
        );
    }

    public function testServicoBuscaLivroPorAutor()
    {
        $storedBooks = Book::factory()->count(5)->create();
        $storedBookRequest = $storedBooks->first();

        sleep(5); // Aguarda 5 segundos para armazenar os registros de teste no banco de dados

        $foundBook = $this->bookService->searchBook($storedBookRequest->author);

        $this->assertNotEmpty($foundBook, 'A lista de Livros retornado deve ser diferente de vazio');
        $this->assertInstanceOf(
            ResourceCollection::class,
            $foundBook,
            'A lista de objetos de Paciente retornado deve ser uma instância da classe ResourceCollection'
        );
    }
}
