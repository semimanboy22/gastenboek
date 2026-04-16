# Questions Asked

## Vraag 1: Welke superglobals worden gebruikt?

In dit gastenboek-project worden de volgende PHP superglobals gebruikt:

- `$_SESSION` - om inloggegevens en tijdelijke sessiedata op te slaan, zoals `username`, `user_id` en `account_created_this_session`.
- `$_POST` - om formuliergegevens te verwerken, bijvoorbeeld bij registreren, inloggen, berichten plaatsen en berichten wijzigen.
- `$_GET` - om gegevens uit de URL te lezen, zoals foutmeldingen, succesmeldingen, bericht-id's en terugkeerpagina's.
- `$_FILES` - om geuploade afbeeldingen te verwerken bij het plaatsen en wijzigen van berichten.
- `$_SERVER` - om de request-methode te controleren, bijvoorbeeld om te zien of een formulier met `POST` is verzonden.
- `$_REQUEST` - om een combinatie van `$_GET` en `$_POST` te lezen bij het doorgeven van terugkeerpagina's in het bewerkproces.

### Korte uitleg per superglobal

`$_SESSION` wordt gebruikt voor loginstatus en gebruikersinformatie die tijdens de sessie bewaard moet blijven.

`$_POST` wordt gebruikt voor gegevens die via formulieren worden verstuurd, zoals gebruikersnaam, wachtwoord en berichttekst.

`$_GET` wordt gebruikt voor waarden die via de URL meekomen, zoals `id`, `error` en `success`.

`$_FILES` wordt gebruikt voor bestand- en afbeeldingsuploads.

`$_SERVER` wordt gebruikt om serverinformatie op te vragen, vooral `$_SERVER['REQUEST_METHOD']`.

`$_REQUEST` wordt hier beperkt gebruikt voor het lezen van `return_to` in het edit-systeem.

### Waar ze worden gebruikt

- Login en sessiebeheer: [index.php](../index.php), [leaderbord.php](../leaderbord.php), [logedinhome.php](../logedinhome.php), [edit-delete/auth.php](../edit-delete/auth.php), [edit-delete/edit.php](../edit-delete/edit.php), [messages-maken/bericht-plaatsen.php](../messages-maken/bericht-plaatsen.php), [messages-maken/upload.php](../messages-maken/upload.php), [registreren/reg.php](../registreren/reg.php)
- Formulierverwerking: [registreren/reg.php](../registreren/reg.php), [messages-maken/upload.php](../messages-maken/upload.php), [edit-delete/edit.php](../edit-delete/edit.php)
- URL-gegevens en meldingen: [logedinhome.php](../logedinhome.php), [messages-maken/bericht-plaatsen.php](../messages-maken/bericht-plaatsen.php), [edit-delete/edit.php](../edit-delete/edit.php)

### Conclusie

De belangrijkste superglobals in dit project zijn `$_SESSION`, `$_POST`, `$_GET`, `$_FILES` en `$_SERVER`. `$_REQUEST` wordt ook gebruikt, maar alleen op een kleine plek voor het edit-proces.

## Vraag 2: Hoe werken `$_POST` en `$_GET`?

`$_POST` en `$_GET` zijn allebei manieren om data naar een PHP-pagina te sturen.

### `$_POST`

`$_POST` gebruik je als data via een formulier wordt verstuurd en niet in de URL moet staan. Dat is handig voor:

- wachtwoorden
- berichttekst
- bestandsuploads
- andere gegevens die niet zichtbaar moeten zijn in de adresbalk

In dit project wordt `$_POST` bijvoorbeeld gebruikt bij:

- registreren via [registreren/reg.php](../registreren/reg.php)
- een bericht plaatsen via [messages-maken/upload.php](../messages-maken/upload.php)
- een bericht wijzigen via [edit-delete/edit.php](../edit-delete/edit.php)

Voorbeeld:

```php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['uname'] ?? '');
}
```

### `$_GET`

`$_GET` gebruik je als data in de URL meegaat. Dat is handig voor:

- id's uit een link
- foutmeldingen
- succesmeldingen
- terugkeerpaden

In dit project wordt `$_GET` bijvoorbeeld gebruikt bij:

- `success` en `error` meldingen in [logedinhome.php](../logedinhome.php)
- `error` meldingen in [messages-maken/bericht-plaatsen.php](../messages-maken/bericht-plaatsen.php)
- bericht-id's in [edit-delete/edit.php](../edit-delete/edit.php)

Voorbeeld:

```php
$messageId = (int)($_GET['id'] ?? 0);
```

### Verschil tussen `$_POST` en `$_GET`

- `$_POST` is beter voor gevoelige of grotere data.
- `$_GET` is beter voor kleine gegevens die zichtbaar mogen zijn in de URL.
- `$_POST` wordt meestal gebruikt bij formulieren die iets opslaan of veranderen.
- `$_GET` wordt meestal gebruikt bij links en meldingen.

### Conclusie

Gebruik `$_POST` voor formulierdata en `$_GET` voor gegevens in de URL. In dit gastenboek worden ze allebei veel gebruikt, maar voor een ander doel.

## Overzicht: Hoe al deze onderdelen samenwerken

Hieronder staat stap voor stap hoe de belangrijkste onderdelen in dit project werken.

### 1. Sessie (`$_SESSION`)

Bij het openen van een pagina start PHP vaak eerst de sessie met `session_start()`.
Daarna wordt in `$_SESSION` gekeken of iemand is ingelogd.

- Als `username` en/of `user_id` bestaan: gebruiker is ingelogd.
- Als deze niet bestaan: gebruiker wordt op sommige pagina's doorgestuurd naar login.

Sessie-data wordt ook gebruikt voor tijdelijke status, zoals:

- `account_created_this_session` om te beperken dat je in dezelfde browsersessie opnieuw registreert.

### 2. Formulierverwerking (`$_POST`)

Als een formulier wordt verzonden met methode `POST`, dan leest PHP de invoer uit `$_POST`.
Voorbeelden:

- registreren: username, wachtwoord, bevestiging wachtwoord
- login: username en wachtwoord
- bericht plaatsen: berichttekst
- bericht bewerken: nieuwe tekst

Daarna volgt validatie:

- verplichte velden
- lengtecontroles
- extra regels, bijvoorbeeld wachtwoorden moeten overeenkomen

### 3. URL-parameters (`$_GET`)

`$_GET` wordt gebruikt voor waarden in de URL, zoals:

- `id` van een bericht
- `error` of `success` meldingen
- `return_to` om na een actie terug te keren naar de juiste pagina

Dit is handig voor navigatie en gebruikersfeedback.

### 4. Uploads (`$_FILES`)

Bij een afbeelding controleert het systeem onder andere:

- of er echt een bestand is geupload
- of het uploaden zonder fout ging
- bestandstype (bijv. jpg/png/gif)
- bestandsgrootte
- of het bestand echt een afbeelding is

Daarna krijgt het bestand een veilige, unieke bestandsnaam en wordt het opgeslagen.
Het pad van de afbeelding wordt vervolgens in de database bewaard.

### 5. Request-controle (`$_SERVER`)

Met `$_SERVER['REQUEST_METHOD']` controleert de code of het om een `POST` of `GET` request gaat.

- `POST`: verwerk data (opslaan/wijzigen)
- geen `POST` waar dat wel moet: dan volgt vaak een redirect met foutmelding

### 6. Gemengd ophalen (`$_REQUEST`)

`$_REQUEST` wordt beperkt gebruikt om een waarde op te halen die uit `GET` of `POST` kan komen.
In dit project gebeurt dat bij het edit-proces voor `return_to`.

### 7. Database (PDO + prepared statements)

Bij database-acties gebruikt het project PDO met prepared statements.
Dat werkt zo:

1. SQL-query voorbereiden met placeholders (`?`)
2. Waarden apart meegeven via `execute([...])`
3. Resultaat ophalen of data wegschrijven

Voordelen:

- veiliger tegen SQL-injection
- duidelijke scheiding tussen query en data

### 8. Foutafhandeling (`try/catch`)

Database-acties staan vaak in `try/catch`.

- In `try` gebeurt de echte actie.
- Bij fout gaat de code naar `catch` en wordt een nette foutmelding gezet of redirect gedaan.

Zo crasht de pagina minder snel voor de gebruiker.

### 9. Redirects en flow

Na belangrijke acties stuurt de code gebruikers door:

- niet ingelogd -> naar login
- login gelukt -> naar home
- bericht geplaatst -> terug naar overzicht
- fout bij upload/validatie -> terug naar formulier met melding

Met `header('Location: ...')` + `exit;` wordt de flow direct en veilig afgesloten.

### 10. Veilig output tonen

Gebruikersinvoer die op de pagina terugkomt, wordt met `htmlspecialchars(...)` ge-escaped.
Hiermee voorkom je dat HTML of scripts van gebruikers direct worden uitgevoerd in de browser.

### Korte samenvatting

De kern van het project is:

1. invoer ontvangen (`$_POST`, `$_GET`, `$_FILES`)
2. controleren en beveiligen (validatie, typecheck, escaping)
3. opslaan of ophalen via PDO
4. status bewaren in sessie (`$_SESSION`)
5. gebruiker doorsturen met duidelijke feedback