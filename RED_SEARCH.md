## Fazer **buscas no Laravel**

---

**1. Usando Eloquent (modelos)**

Quando você tem um **Model**, pode fazer buscas simples assim:

**Buscar por ID**

```php
$user = User::find(1);
```

**Buscar por uma coluna específica**

```php
$user = User::where('email', 'teste@gmail.com')->first();
```

**Buscar vários registros**

```php
$users = User::where('status', 'activo')->get();
```

**Busca com múltiplas condições**

```php
$users = User::where('status', 'activo')
             ->where('tipo', 'admin')
             ->get();
```

---

**2. Usando LIKE para pesquisas de texto**

Para pesquisas que pareçam "Google", usa-se **LIKE**:

```php
$results = User::where('nome', 'LIKE', '%joão%')->get();
```

* `%joão%` → contém "joão"
* `joão%` → começa com "joão"
* `%joão` → termina com "joão"

---

**3. Usando Query Builder**

Quando não precisa de Model ou quer consultas mais avançadas:

**Exemplo básico**

```php
$users = DB::table('users')->where('status', 'activo')->get();
```

**LIKE no Query Builder**

```php
$results = DB::table('produtos')
    ->where('nome', 'LIKE', '%arroz%')
    ->get();
```

---

**4. Busca dinâmica (Search Bar)**

Se você estiver criando um campo de busca:

**Controller**

```php
public function search(Request $request)
{
    $q = $request->input('q');

    $results = User::where('nome', 'LIKE', "%$q%")
                   ->orWhere('email', 'LIKE', "%$q%")
                   ->get();

    return view('resultados', compact('results', 'q'));
}
```

**Rota**

```php
Route::get('/search', [UserController::class, 'search']);
```

**View**

```html
<form action="/search" method="GET">
    <input type="text" name="q" placeholder="Pesquisar...">
    <button>Buscar</button>
</form>
```

---

**5. Busca avançada com múltiplos filtros**

```php
$users = User::query()
    ->when($request->nome, fn($q) => $q->where('nome', 'LIKE', "%{$request->nome}%"))
    ->when($request->status, fn($q) => $q->where('status', $request->status))
    ->when($request->tipo, fn($q) => $q->where('tipo', $request->tipo))
    ->get();
```



##  Obter **apenas 5 registros** no Laravel

---

**1. Usando `take(5)`**

```php
$users = User::take(5)->get();
```

---

**2. Usando `limit(5)`**

```php
$users = User::limit(5)->get();
```

---

**3. Usando paginação com 5 itens**

Se você quiser 5 registros **por página**:

```php
$users = User::paginate(5);
```

Na view:

```php
{{ $users->links() }}
```

---

# Exemplos com where + limite

### Apenas 5 resultados filtrados:

```php
$results = User::where('status', 'activo')
               ->take(5)
               ->get();
```

### Com LIKE + 5 registros:

```php
$results = User::where('nome', 'LIKE', '%joão%')
               ->limit(5)
               ->get();
```



## Pegar dados de duas tabelas relacionadas, normalmente usamos Eloquent Relationships

---

## Definindo a relação entre tabelas

Suponha que temos:

* `users` (usuários)
* `posts` (postagens)
  Um usuário **tem muitos posts**.

### No model `User.php`:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // Relação: um usuário tem muitos posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
```

### No model `Post.php`:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Relação: um post pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
```

---

## Buscando dados com Eloquent

### a) Trazer um usuário com seus posts

```php
$user = User::with('posts')->find(1); // busca usuário com id 1
foreach ($user->posts as $post) {
    echo $post->title;
}
```

> `with('posts')` faz **eager loading**, evitando N+1 queries.

---

### b) Trazer posts com informações do usuário

```php
$posts = Post::with('user')->get();
foreach ($posts as $post) {
    echo $post->title . ' - ' . $post->user->name;
}
```

---

### c) Filtrar por relacionamento

Por exemplo, posts de usuários ativos:

```php
$posts = Post::whereHas('user', function($query) {
    $query->where('active', 1);
})->get();
```

---

## Usando `join` (query builder)

Se você quiser fazer **uma consulta mais direta** sem Eloquent:

```php
use Illuminate\Support\Facades\DB;

$dados = DB::table('posts')
    ->join('users', 'posts.user_id', '=', 'users.id')
    ->select('posts.*', 'users.name as user_name')
    ->get();

foreach ($dados as $d) {
    echo $d->title . ' - ' . $d->user_name;
}
```

---

**Resumo:**

* Use **Eloquent Relationships** (`hasMany`, `belongsTo`) para trabalhar de forma mais limpa e orientada a objetos.
* Use **join** para consultas diretas, mais próximas do SQL.









Perfeito! No Laravel você também consegue fazer **relacionamento entre três tabelas**. Isso normalmente ocorre quando temos um **relacionamento em cadeia** ou **muitos-para-muitos com pivot**. Vou explicar com exemplos claros.

---

## 1️⃣ Exemplo clássico: Três tabelas em cadeia

Suponha que temos:

* `users` → usuários
* `posts` → postagens
* `comments` → comentários

Relacionamentos:

* Um **usuário** tem muitos **posts**
* Um **post** tem muitos **comentários**

### Models:

#### `User.php`

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Acesso indireto aos comentários do usuário
    public function comments()
    {
        return $this->hasManyThrough(Comment::class, Post::class);
    }
}
```

#### `Post.php`

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
```

#### `Comment.php`

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
```

---

### Consultas

#### a) Trazer todos os comentários de um usuário

```php
$user = User::with('comments')->find(1);

foreach ($user->comments as $comment) {
    echo $comment->content;
}
```

> Aqui usamos `hasManyThrough` para pegar comentários via posts do usuário.

#### b) Trazer posts com comentários e autor

```php
$posts = Post::with(['comments', 'user'])->get();

foreach ($posts as $post) {
    echo $post->title . ' - ' . $post->user->name;
    foreach ($post->comments as $comment) {
        echo $comment->content;
    }
}
```

---

## 2️⃣ Caso com **três tabelas em muitos-para-muitos**

Suponha:

* `students` → alunos
* `courses` → cursos
* `teachers` → professores

Relacionamentos:

* Um **aluno** pode ter muitos **cursos**
* Um **curso** pode ter muitos **alunos**
* Um **curso** pertence a um **professor**

### Models:

#### `Student.php`

```php
public function courses()
{
    return $this->belongsToMany(Course::class);
}
```

#### `Course.php`

```php
public function students()
{
    return $this->belongsToMany(Student::class);
}

public function teacher()
{
    return $this->belongsTo(Teacher::class);
}
```

#### `Teacher.php`

```php
public function courses()
{
    return $this->hasMany(Course::class);
}
```

---

### Consulta

Trazer alunos com cursos e professores:

```php
$students = Student::with('courses.teacher')->get();

foreach ($students as $student) {
    echo $student->name;
    foreach ($student->courses as $course) {
        echo $course->name . ' - ' . $course->teacher->name;
    }
}
```

---

✅ **Resumo:**

1. **Relacionamento em cadeia (1 → N → N)**: Use `hasManyThrough` para facilitar consultas indiretas.
2. **Relacionamento muitos-para-muitos com pivot**: Combine `belongsToMany` + `hasMany` ou `belongsTo` para acessar a terceira tabela.














Ah, você quer fazer **relacionamento de três tabelas usando o Query Builder (`DB::table`)** em Laravel, sem usar Eloquent. Vamos ver como fazer isso passo a passo.

---

## 1️⃣ Supondo três tabelas: `users`, `posts`, `comments`

* `users` → `id`
* `posts` → `id`, `user_id`
* `comments` → `id`, `post_id`, `content`

Queremos **pegar todos os comentários com o título do post e nome do usuário**.

---

### Consulta usando `join`:

```php
use Illuminate\Support\Facades\DB;

$dados = DB::table('comments')
    ->join('posts', 'comments.post_id', '=', 'posts.id')
    ->join('users', 'posts.user_id', '=', 'users.id')
    ->select(
        'comments.content as comment',
        'posts.title as post_title',
        'users.name as user_name'
    )
    ->get();

foreach ($dados as $d) {
    echo $d->user_name . ' -> ' . $d->post_title . ' -> ' . $d->comment . '<br>';
}
```

✅ Aqui estamos fazendo **dois `join`s**, conectando as três tabelas.

---

## 2️⃣ Consulta com `leftJoin` (para incluir registros mesmo sem relação)

```php
$dados = DB::table('comments')
    ->leftJoin('posts', 'comments.post_id', '=', 'posts.id')
    ->leftJoin('users', 'posts.user_id', '=', 'users.id')
    ->select('comments.content', 'posts.title', 'users.name')
    ->get();
```

> `leftJoin` garante que mesmo se um post ou usuário não existir, o comentário ainda aparece (com `null` nos campos do join).

---

## 3️⃣ Filtrando resultados

Por exemplo, só comentários de posts de um usuário específico:

```php
$dados = DB::table('comments')
    ->join('posts', 'comments.post_id', '=', 'posts.id')
    ->join('users', 'posts.user_id', '=', 'users.id')
    ->where('users.id', 1)
    ->select('comments.content', 'posts.title', 'users.name')
    ->get();
```

---

### Resumo

* `join` conecta tabelas pela chave estrangeira.
* Pode usar quantos `join`s precisar para relacionar várias tabelas.
* Use `select` para escolher apenas as colunas desejadas.
* `where` e `orderBy` funcionam normalmente.



