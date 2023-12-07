<?php

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface BookRepositoryInterface
{
     /**
     * Consulta todos os Livros com Paginação
     *
     * @param int $length Quantidade de Livro por Página
     *
     * @return LengthAwarePaginator Livros que foram encontrados.
     */
    public function getAllBookPaginate(int $length): LengthAwarePaginator;

    /**
     * Busca de Livros por meio do Título, Autor ou ISBN
     *
     * @param mixed $query Título, Autor ou ISBN do livro
     *
     * @return Collection Os Livros que foram encontrados.
     */
    public function searchBook(mixed $query): Collection;
}
