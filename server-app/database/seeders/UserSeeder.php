<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Usuário 1',
                'email' => 'usuario1@wivenn.com.br',
                'password' => 'wilsoncastro123',
            ],
            [
                'name' => 'Usuário 2',
                'email' => 'usuario2@wivenn.com.br',
                'password' => 'wilsoncastro123',
            ],
        ];

        $librarians = [
            [
                'name' => 'Bibliotecário 1',
                'email' => 'bibliotecario1@wivenn.com.br',
                'password' => 'wilsoncastro123',
            ],
            [
                'name' => 'Bibliotecário 2',
                'email' => 'bibliotecario2@wivenn.com.br',
                'password' => 'wilsoncastro123',
            ],
        ];

        foreach ($users as $user) {
            $user = User::create($user);
            $user->assignRole('user');
        }

        foreach ($librarians as $librarian) {
            $librarian = User::create($librarian);
            $librarian->assignRole('librarian');
        }
    }
}
