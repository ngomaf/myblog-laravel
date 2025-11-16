No Laravel, para **pegar o total de registros de uma tabela** (como artigos), você pode usar **Eloquent** ou **Query Builder**. Aqui estão as formas mais comuns:

---

# **1️⃣ Usando Eloquent**

Supondo que você tenha um model `Post` ou `Article`:

```php
use App\Models\Post;

$total = Post::count();

echo "Total de artigos: $total";
```

* `count()` retorna o número total de registros da tabela.
* Pode ser usado em qualquer parte do Laravel (controller, route, view).

---

# **2️⃣ Usando Query Builder**

Se não estiver usando Eloquent:

```php
use Illuminate\Support\Facades\DB;

$total = DB::table('posts')->count();

echo "Total de artigos: $total";
```

* Funciona de forma idêntica, mas retorna um número direto da tabela.

---

# **3️⃣ Com condição (opcional)**

Você também pode contar **apenas artigos ativos**, por exemplo:

```php
$totalAtivos = Post::where('status', 'active')->count();
```

Ou no Query Builder:

```php
$totalAtivos = DB::table('posts')->where('status', 'active')->count();
```

---

# **4️⃣ Exemplo completo no Controller**

```php
public function index()
{
    $total = Post::count(); // total de artigos
    return view('posts.index', compact('total'));
}
```

No Blade:

```blade
<p>Total de artigos: {{ $total }}</p>
```








Para pegar o **total de views de todos os posts** no Laravel, você pode usar o método **`sum`** do Eloquent ou do Query Builder.

Supondo que você tenha uma tabela `posts` com a coluna `views`:

---

# **1️⃣ Usando Eloquent**

```php
use App\Models\Post;

$totalViews = Post::sum('views');

echo "Total de views: $totalViews";
```

* `sum('views')` soma todos os valores da coluna `views`.
* Retorna um **número inteiro** com o total.

---

# **2️⃣ Usando Query Builder**

```php
use Illuminate\Support\Facades\DB;

$totalViews = DB::table('posts')->sum('views');

echo "Total de views: $totalViews";
```

* Funciona da mesma forma, mas sem carregar modelos Eloquent.

---

# **3️⃣ Com condição (opcional)**

Se você quiser somar **apenas posts ativos**, por exemplo:

```php
$totalViewsAtivos = Post::where('status', 'active')->sum('views');
```

Ou Query Builder:

```php
$totalViewsAtivos = DB::table('posts')->where('status', 'active')->sum('views');
```

---

# **4️⃣ Exemplo completo no Controller**

```php
public function dashboard()
{
    $totalViews = Post::sum('views');
    return view('dashboard', compact('totalViews'));
}
```

No Blade:

```blade
<p>Total de visualizações: {{ $totalViews }}</p>
```

