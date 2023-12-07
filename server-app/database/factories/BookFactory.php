<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'author' => $this->faker->name(),
            'cover' => "https://books.google.com/books/content?id=ff6ZDwAAQBAJ&printsec=frontcover&img=2",
            'publisher' => $this->faker->company(),
            'isbn' => $this->faker->unique()->word(),
            'pages' => $this->faker->randomNumber(1),
            'isAvailable' => $this->faker->numberBetween(0, 1),
        ];
    }
}
