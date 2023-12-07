<?php

namespace App\Http\Controllers\Api;

use \Exception;
use App\Http\Controllers\Api\BaseController;
use App\Services\BookService;
use Illuminate\Http\Response;

class BookController extends BaseController
{
    private BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function paginate(int $length): Response
    {
        try {
            $books = $this->bookService->getAllBookPaginate($length);
            return $this->sendResponse($books);
        } catch (Exception $e) {
            return $this->sendErrorException($e);
        }
    }

    public function searchBook(mixed $query): Response
    {
        try {
            $books = $this->bookService->searchBook($query);
            return $this->sendResponse($books);
        } catch (Exception $e) {
            return $this->sendErrorException($e);
        }
    }
}
