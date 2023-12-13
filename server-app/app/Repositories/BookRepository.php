<?php

namespace App\Repositories;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Interfaces\Repositories\BookRepositoryInterface;

class BookRepository implements BookRepositoryInterface
{
    public function getAllBookPaginate(int $length): LengthAwarePaginator
    {
        return Book::orderByDesc('created_at')->paginate($length);
    }

    public function searchBook(mixed $query): Collection
    {
        return Book::where('title', 'ILIKE', '%' . $query . '%')
            ->orWhere('author', 'ILIKE', '%' . $query . '%')
            ->orWhere('isbn', 'ILIKE', '%' . $query . '%')
            ->get();
    }

    public function getReservedBooksByUser(): Collection
    {
        return Auth::user()->reservedBooks;
    }
}
