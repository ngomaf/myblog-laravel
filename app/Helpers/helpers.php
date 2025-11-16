<?php

if (!function_exists('getCat')) {
    function getCat()
    {
        return \App\Models\Category::all();
    }
}

if(!function_exists('dateFormatter')) {
    function dateFormatter(string $date, string $standard = 'd M Y') 
    {
        return \Carbon\Carbon::parse($date)->format($standard);
    }
}

if(!function_exists('catPhrase')) {
    function catPhrase(string $phrase, int $limit=100, bool $strip=false)
    {
        if($strip) {
            $phrase = strip_tags($phrase);
            return \Illuminate\Support\Str::limit($phrase, $limit, ' ...');
        }
        return \Illuminate\Support\Str::limit($phrase, $limit, ' ...');
    }
}