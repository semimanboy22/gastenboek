# PHP Samenvatting

## 1. Wat is PHP?

PHP is een programmeertaal voor websites. Je gebruikt PHP om pagina's dynamisch te maken, formulieren te verwerken en data uit een database te halen.

## 2. Ontwikkelomgeving

Voor PHP heb je meestal nodig:
- Apache als webserver
- PHP om de code uit te voeren
- MySQL om gegevens op te slaan

XAMPP is een makkelijke oplossing omdat het alles samen installeert. Je zet je project in de htdocs-map en opent het via localhost.

## 3. Basis van PHP

```php
<?php
echo "Hallo wereld";
?>
```

Belangrijk om te onthouden:
- PHP begint met `<?php`
- Elke opdracht eindigt meestal met `;`
- `echo` toont tekst op het scherm
- Commentaar wordt niet uitgevoerd

## 4. Variabelen

```php
<?php
$naam = "Lisa";
$leeftijd = 19;
$isStudent = true;
?>
```

Regels:
- Variabelen beginnen met `$`
- Tekst staat tussen aanhalingstekens
- Getallen hebben geen aanhalingstekens nodig
- `true` en `false` zijn booleans

## 5. Voorwaarden

```php
<?php
if ($ingelogd) {
    echo "Welkom";
} else {
    echo "Niet ingelogd";
}
?>
```

Gebruik `if` om keuzes te maken in je code.

## 6. Lussen

```php
<?php
for ($i = 1; $i <= 5; $i++) {
    echo $i;
}
?>
```

```php
<?php
foreach ($items as $item) {
    echo $item;
}
?>
```

- Gebruik `for` als je weet hoe vaak iets moet herhalen
- Gebruik `foreach` om door een array te lopen

## 7. Arrays

```php
<?php
$namen = ["Lisa", "Tom", "Sara"];
echo $namen[0];
?>
```

Een array is een lijst met meerdere waarden. De eerste waarde heeft index `0`.

## 8. Formulieren

```php
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $naam = $_POST["naam"] ?? "";
    echo $naam;
}
?>
```

Belangrijke superglobals:
- `$_POST` voor formulierdata
- `$_GET` voor data uit de URL
- `$_SERVER` voor serverinformatie
- `$_SESSION` voor sessiegegevens

## 9. PDO en databases

```php
<?php
$pdo = new PDO(
    "mysql:host=localhost;dbname=gastenboek_db;charset=utf8mb4",
    "root",
    ""
);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
```

```php
<?php
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
```

PDO gebruik je voor veilige databaseverbindingen. Prepared statements helpen tegen SQL-injection.

## 10. Try/catch

```php
<?php
try {
    $pdo->exec("CREATE TABLE IF NOT EXISTS messages (...)");
} catch (Throwable $e) {
    echo $e->getMessage();
}
?>
```

Met `try/catch` kun je fouten netjes opvangen.

## 11. Kort onthouden

- Gebruik `echo` om tekst te tonen
- Gebruik `if` voor keuzes
- Gebruik `for` en `foreach` voor herhaling
- Gebruik arrays voor lijsten
- Gebruik PDO voor databases
- Gebruik prepared statements voor veiligheid
- Gebruik `try/catch` voor foutafhandeling
