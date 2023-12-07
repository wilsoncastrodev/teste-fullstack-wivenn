<?php

namespace App\Interfaces\Services;

use Illuminate\Http\Resources\Json\ResourceCollection;

interface BookServiceInterface
{
    /**
     * Serviço para consultar todos os Livros com Paginação
     *
     * @param int $length Quantidade de Livros por página
     *
     * @return LengthAwarePaginator Livros que foram encontrados.
     */
    public function getAllBookPaginate(int $length): ResourceCollection;

    /**
     * Serviço para buscar LIvros por meio do Título, Autor ou ISBN
     *
     * @param mixed $query Título, Autor ou ISBN do livro
     *
     * @return ResourceCollection Os Livros que foram encontrados.
     */
    public function searchBook(mixed $query): ResourceCollection;
}
