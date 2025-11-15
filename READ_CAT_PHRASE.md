## cortar frases” no Laravel


### 1️⃣ Usando **Str::limit()** para limitar caracteres

O Laravel fornece o helper `Str::limit`:

```php
use Illuminate\Support\Str;

$texto = "Este é um exemplo de frase longa que precisa ser cortada.";
$curto = Str::limit($texto, 20); // Limita a  20 caracteres
echo $curto; // Saída: "Este é um exemplo..."
```

Você também pode personalizar o sufixo (por padrão é `"..."`):

```php
$curto = Str::limit($texto, 20, ' [ler mais]');
echo $curto; // Saída: "Este é um exemplo [ler mais]"
```

---

### 2️⃣ Usando **Str::words()** para limitar palavras

Se quiser limitar por **palavras** em vez de caracteres:

```php
$texto = "Este é um exemplo de frase longa que precisa ser cortada.";
$curto = Str::words($texto, 5); // Limita a 5 palavras
echo $curto; // Saída: "Este é um exemplo de..."
```

Também é possível mudar o sufixo:

```php
$curto = Str::words($texto, 5, ' [continuar lendo]');
```

---

### 3️⃣ Cortar manualmente com PHP puro

Se não quiser usar o helper do Laravel:

```php
$texto = "Este é um exemplo de frase longa que precisa ser cortada.";
$curto = substr($texto, 0, 20); // corta nos primeiros 20 caracteres
if (strlen($texto) > 20) {
    $curto .= '...';
}
echo $curto;
```

---

### 4️⃣ No Blade direto

No template Blade também é possível usar:

```blade
{{ \Illuminate\Support\Str::limit($post->descricao, 50) }}
```

ou por palavras:

```blade
{{ \Illuminate\Support\Str::words($post->descricao, 10, '...') }}
```

---







# limpar tags HTML e depois limitar o texto no Laravel


# ✅ **1) Limpar tags HTML**

Use a função nativa do PHP: [`strip_tags()`](https://www.php.net/manual/en/function.strip-tags.php)

```php
$textoLimpo = strip_tags($post->content);
```

Isso vai remover **todas as tags HTML** (`<h2>`, `<p>`, `<li>`, etc.), deixando apenas o texto puro.

---

# ✅ **2) Limitar o texto**

O Laravel tem o helper **`Str::limit()`**:

```php
use Illuminate\Support\Str;

$textoResumido = Str::limit($textoLimpo, 100); 
// Limita para 100 caracteres e adiciona "..." por padrão
```

---

# ✅ **3) Combinar tudo em uma linha**

```php
use Illuminate\Support\Str;

$preview = Str::limit(strip_tags($post->content), 150);
```

* `strip_tags()` → remove HTML
* `Str::limit()` → limita a quantidade de caracteres e adiciona `...`

---

# ✅ **4) Exemplo em Blade**

```blade
<p>{{ Str::limit(strip_tags($post->content), 200) }}</p>
```

Isso gera um **resumo do post**, seguro para exibir no HTML sem quebrar tags.

---

# 🔹 **Extra: preservar algumas tags**

Se quiser remover tudo **menos algumas tags**, `strip_tags` aceita segundo parâmetro:

```php
$texto = strip_tags($post->content, '<p><a>');
```

* Preserva `<p>` e `<a>`
* Remove todas as outras tags

---

Se você quiser, posso te mostrar um **helper pronto** que **gera um resumo seguro de qualquer conteúdo HTML**, limitando por palavras ou caracteres. Isso é ótimo para resumos de posts ou notícias.

Quer que eu faça isso?



