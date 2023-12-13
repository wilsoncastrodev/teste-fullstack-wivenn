<?php

namespace Tests\Repositories;

use Tests\TestCase;
use App\Models\Book;
use App\Repositories\BookRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BookRepositoryTest extends TestCase
{
    protected $bookRepository;

    public function setUp(): void
    {
        parent::setUp();
        // $this->markTestSkipped('Teste desativado.');
        $this->bookRepository = app()->make(BookRepository::class);
    }

    public function testRepositorioListaTodosOsLivroComPaginacao()
    {
        Book::factory()->count(10)->create();

        $listBook = $this->bookRepository->getAllBookPaginate(5);
        $listBookPagination = $listBook->toArray();

        $this->assertCount(5, $listBookPagination['data'], 'A listagem deve conter 5 Livros por página');
        $this->assertInstanceOf(
            LengthAwarePaginator::class, $listBook,
            'A lista de Livro retornado deve ser uma instância da classe LengthAwarePaginator'
        );
    }

    public function testRepositorioBuscaLivroPorTitulo()
    {
        $storedBooks = Book::factory()->count(5)->create();
        $bookTitleRequest = $storedBooks->first()->title;

        sleep(5);  // Aguarda 5 segundos para armazenar os registros de teste no banco de dados

        $foundBook = $this->bookRepository->searchBook($bookTitleRequest);

        $this->assertEquals(
            $bookTitleRequest,
            $foundBook->first()->title,
            'O Título do Livro da requisição deve ser o mesmo Título do Livro recuperado do Banco de Dados'
        );
        $this->assertInstanceOf(
            Collection::class, $foundBook,
            'O Livro encontrado deve ser uma instância da classe Collection'
        );
    }

    public function testRepositorioBuscaLivroPorIsbn()
    {
        $storedBooks = Book::factory()->count(5)->create();
        $bookIsbnRequest = $storedBooks->first()->isbn;

        sleep(5); // Aguarda 5 segundos para armazenar os registros de teste no banco de dados

        $foundBook = $this->bookRepository->searchBook($bookIsbnRequest);

        $this->assertEquals(
            $bookIsbnRequest,
            $foundBook->first()->isbn,
            'O ISBN do Livro da requisição deve ser o mesmo ISBN do Livro recuperado do Banco de Dados'
        );
        $this->assertInstanceOf(
            Collection::class, $foundBook,
            'O Livro encontrado deve ser uma instância da classe Collection'
        );
    }

    public function testRepositorioBuscaLivroPorAutor()
    {
        $storedBooks = Book::factory()->count(5)->create();
        $bookAuthorRequest = $storedBooks->first()->author;

        sleep(5); // Aguarda 5 segundos para armazenar os registros de teste no banco de dados

        $foundBook = $this->bookRepository->searchBook($bookAuthorRequest);

        $this->assertEquals(
            $bookAuthorRequest,
            $foundBook->first()->author,
            'O Autor do Livro da requisição deve ser o mesmo Autor do Livro recuperado do Banco de Dados'
        );
        $this->assertInstanceOf(
            Collection::class, $foundBook,
            'O Livro encontrado deve ser uma instância da classe Collection'
        );
    }
}
