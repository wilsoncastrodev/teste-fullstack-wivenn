<?php

namespace App\Repositories;

use App\Interfaces\Repositories\BookRepositoryInterface;
use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BookRepository implements BookRepositoryInterface
{
    public function getAllBookPaginate(int $length): LengthAwarePaginator
    {
        return Book::orderByDesc('created_at')->paginate($length);
    }

    public function searchBook(mixed $query): Collection
    {
        return Book::where('title', 'like', '%' . $query . '%')
            ->orWhere('author', 'like', '%' . $query . '%')
            ->orWhere('isbn', 'like', '%' . $query . '%')
            ->get();
    }
}
