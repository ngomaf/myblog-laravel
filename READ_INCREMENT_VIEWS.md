# incrementar +1 visita em uma coluna chamada views no Laravel



**1) Incrementar usando Eloquent (recomendado)**

```php
$post = Post::find($id);
$post->increment('views');
```

Isso gera automaticamente:

```sql
UPDATE posts SET views = views + 1 WHERE id = ?
```

Também pode incrementar mais de 1:

```php
$post->increment('views', 5);
```

---

**2) Incrementar direto sem carregar o model**

Mais rápido, ideal para endpoints de alta frequência:

```php
Post::where('id', $id)->increment('views');
```

---

**3) Se você estiver usando DB::table()**

```php
DB::table('posts')->where('id', $id)->increment('views');
```

---

# Importante

A coluna **views** deve ser **integer** ou **bigInteger** no banco.
Exemplo de migração:

```php
$table->unsignedBigInteger('views')->default(0);
```

---

# Exemplo completo (no Controller)

```php
public function show($id)
{
    $post = Post::findOrFail($id);

    // +1 visita
    $post->increment('views');

    return view('post.show', compact('post'));
}
```
