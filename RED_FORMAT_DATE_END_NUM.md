
## formatar datas no Laravel, você normalmente utiliza o __Carbon__, que já vem integrado ao framework

**1. Formatando datas no Model (getters / accessors)**

Se você tem um campo `created_at`, por exemplo:

```php
public function getCreatedAtFormattedAttribute()
{
    return $this->created_at->format('d/m/Y');
}
```

Depois é só usar no controller ou na view:

```php
$registro->created_at_formatted
```

---

**2. Formatando diretamente na Blade**

```php
{{ $registro->created_at->format('d/m/Y') }}
```

Com hora:

```php
{{ $registro->created_at->format('d/m/Y H:i') }}
```

---

**3. Formatando com Carbon diretamente**

```php
use Carbon\Carbon;

$data = Carbon::parse('2025-11-14');
echo $data->format('d-m-Y'); // 14-11-2025
```

---

**4. Exemplo de formatos úteis**

| Formato       | Resultado           |
| ------------- | ------------------- |
| `d/m/Y`       | 14/11/2025          |
| `d-m-Y`       | 14-11-2025          |
| `Y-m-d`       | 2025-11-14          |
| `d M Y`       | 14 Nov 2025         |
| `H:i`         | 12:45               |
| `d/m/Y H:i:s` | 14/11/2025 12:45:10 |

---

**5. Formatando *automático* para JSON (opcional)**

Você pode definir no Model:

```php
protected $casts = [
    'created_at' => 'datetime:d/m/Y H:i',
];
```

Assim quando o model virar JSON, já virá formatado.


## formatar numeros

```php
$numero = 1234567.8910;

// Formatar com 2 casas decimais, separador decimal vírgula e separador de milhar ponto
$formatado = number_format($numero, 2, ',', '.');

echo $formatado; // "1.234.567,89"
```
