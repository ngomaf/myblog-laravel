<?php

if (!function_exists('getCat')) {
    function getCat()
    {
        return \App\Models\Category::all();
    }
}