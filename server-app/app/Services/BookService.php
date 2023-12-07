<?php

namespace App\Services;

use App\Http\Resources\BookCollection;
use App\Http\Resources\BookPaginateCollection;
use App\Interfaces\Services\BookServiceInterface;
use App\Repositories\BookRepository;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BookService implements BookServiceInterface
{
    private BookRepository $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function getAllBookPaginate(int $length): ResourceCollection
    {
        $books = $this->bookRepository->getAllBookPaginate($length);
        return new BookPaginateCollection($books);
    }

    public function searchBook(mixed $query): ResourceCollection
    {
        $books = $this->bookRepository->searchBook($query);
        return new BookCollection($books);
    }
}
