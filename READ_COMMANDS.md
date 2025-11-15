## Arisan commands

Criar o projeto com Laravel
```
composer create-project laravel/laravel .
```

Gerar a chave para o arquivo .env.
```
php artisan key:generate
```

1. List all commands artisan
php artisan list

1a. List routes
php artisan route:list

2. Down app
php artisan down

3. Up app
php artisan up

4. Get help about command
php artisan help migrate

5. Create controller
php artisan make:controller ClientController

6. Create controller with resource
php artisan make:controller ClientController --resource

7. Up migrate
php artisan migrate

8. 
php artisan migrate:rollback

9. show migration status
php artisan migrate:status

10. create migration
php artisan make:migration create_photos_table
or
php artisan make:migration --create=photos

11. alterate table
*create new migration*
php artisan make:migration alter_table_name_photos
*in function up write*
Schema::rename('partner', 'partners');

12. drop table
php artisan make:migration drop_table_myphotos
*in function up write*
Schema::dropIfExists('photos');

13. create model controller end migration with one commad
php artisan make:model Category --migration --controller --resource
or
php artisan make:model Category -m -cr
or
php artisan make:model Category -mcr

14. create seeder
php artisan make:seeder UsersSeeder

15. run seeder
php artisan db:seed

16. create factory
php artisan make:factory CategoryFactory

17. create model migrate factory seeder ctrl resource with one command
php artisan make:model Test -mfscr



## Routes
```php
Route::get("/", function() {
    return View("path/viewname.blade.php");
});

// or
Route::view("/", "path/viewname.blade.php");

Route::any("/any", function() {
    return "Permite todo tipo de acesso http (get, post, put, patch, delete).";
});

Route::match(['get'], ['post'], "/match", function() {
    return "Permite apenas acessos definidos.";
});

// send param
Route::get("/product/{id}/{name?}", function(int $id, ?string $name = null) {
    return "The product is: {$id} - {$name}";
});

// redirect route
Route::get("/product", function() {
    return redirect("/any");
});

// or
Route::redirect("product", "/any");

// named route
Route::get("/product", function() {
    return view("productrecent");
})->name("product.recents");

// call named route
Route::get("/recents", function() {
    return redirect()->route("product.recent");
});

// group route by prefix use to call domain/admin/dash
Route::prefix("admin")->group(function() {
    Route::get("/dash", function() {
        return "Dash";
    });
    Route::get("/user", function() {
        return "user";
    });
    Route::get("/client", function() {
        return "client";
    });
});

// or use group by name
Route::name("admin.")->group(function() {
    Route::get("/admin/dash", function() {
        return "Dash";
    })->name("dash");
    Route::get("/admin/user", function() {
        return "user";
    })->name("user");
    Route::get("/admin/client", function() {
        return "client";
    })->name("client");
});

// or use group by prefix end name
Route::group(["prefix"=>"admin", "as"=>"admin."], function() {
    Route::get("/admin/dash", function() {
        return "Dash";
    })->name("dash");
    Route::get("/admin/user", function() {
        return "user";
    })->name("user");
    Route::get("/admin/client", function() {
        return "client";
    })->name("client");
});

// route with controller
Route::get('/product', [ProductController::class, 'index']);

// route controller with param
Route::get('/product/{id}', [ProductController::class, 'show']);

Route::resource('/client', ClientController::class);
```

# views

## layout
@yield('content')

## single view
@extends('site.layout')
@section('title', 'Home page')
@section('content')
    html tags
@endsection

## estruture
@if ($name)
@endif 

@unless ($name) {{-- inverso do if --}}
@endunless

@switch($type)
    @case(1)
        
        @break

    @default
        
@endswitch

@isset($name) {{-- se existe --}}
@endisset

@empty()
@endempty

@auth {{-- se existe utilizador autenticado --}}
@endauth

@guest {{-- se nao existe utilizador autenticado --}}
@endguest



@for ($i = 0; $i < $count; $i++)
    {{ $i }}
@endfor

@php $num = 0; @endphp

@while ($num > 20)
    {{ $num }}
    @php $num++ @endphp
@endwhile

@foreach ($array as $arr)
    {{ $arr }}
@endforeach

@include('path.file', ['message'=>'Message here.'])