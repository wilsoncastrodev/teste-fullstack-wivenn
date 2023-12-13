<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Helpers\Helper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class BookSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $current_page = 0;
        $total_pages = 5;

        while ($current_page < $total_pages) {
            $response = Http::get("https://www.googleapis.com/books/v1/volumes?key=" .
                    env('GOOGLE_BOOKS_API_KEY') .
                    "&maxResults=40&startIndex=" .
                    $current_page .
                    "&q=programação+AND+intitle:php+OR+intitle:javascript+OR+intitle:Laravel+OR+intitle:React+OR+intitle:next.js+OR+intitle:CSS+OR+intitle:HTML");

            $data = $response->json();
            $items = $data['items'];

            foreach ($items as $item) {
                $book = $item['volumeInfo'];

                if ($book['language'] === "pt-BR") {
                    if (!empty($book['imageLinks'])) {
                        $new_image_url = str_replace('http://', 'https://', $book['imageLinks']['thumbnail']);
                            $cover_url = str_replace('1&zoom=1&edge=curl&source=gbs_api', '3', $new_image_url);

                            $content_image = file_get_contents($cover_url);

                            $filename = Helper::generateFileName($book['title']);

                            Storage::disk('public')->put('books/covers/' . $filename, $content_image);
                    }



                    Book::updateOrCreate(['title' => $book['title']],
                    [
                        'title' => $book['title'],
                        'description' => !empty($book['description']) ? $book['description'] : "",
                        'author' => !empty($book['authors']) ? $book['authors'][0] : "",
                        'cover' => Helper::getUrlImage($filename),
                        'publisher' => !empty($book['publisher']) ? $book['publisher'] : "",
                        'isbn' => !empty($book['industryIdentifiers']) ? $book['industryIdentifiers'][0]['identifier'] : "",
                        'pages' => $book['pageCount'] ?? 0,
                        'is_available' => 1,
                    ]);
                }
            }

            $current_page++;
        }
    }
}
