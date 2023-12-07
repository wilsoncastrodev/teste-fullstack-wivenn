<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function generateFileName($title): string
    {
        if($title) {
            return 'livro-'. Str::slug($title) . '-' . time() . "." . 'jpg';
        }
    }

    public static function getUrlImage(string $filename): string
    {
        return Storage::url('books/covers/') . $filename;
    }
}
