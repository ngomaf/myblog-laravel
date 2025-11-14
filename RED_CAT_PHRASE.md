##
Quando você fala em **“cortar frases” no Laravel**, existem algumas abordagens dependendo do que você quer fazer: limitar o número de **caracteres**, **palavras** ou criar **resumos** de textos para exibição, por exemplo, em listas ou previews de posts. Vou mostrar as opções mais comuns:

---

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

Se você quiser, posso te mostrar **uma função que corta frases sem quebrar palavras no meio**, bem útil para textos longos e previews de posts.

Quer que eu faça isso?


