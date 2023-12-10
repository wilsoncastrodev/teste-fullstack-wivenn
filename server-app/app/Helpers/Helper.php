<?php

namespace App\Helpers;

use Carbon\Carbon;
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

    public static function formatDate(string $date): string
    {
        Carbon::setLocale('pt_BR');
        return Carbon::parse($date)->translatedFormat('d \d\e F \d\e Y');
    }
}
