PHP Tutorial
ROC ICA Logo
H1-Starten met PHP

Hoofdstuk 1 : Starten met PHP
PHP is een van de meest gebruikte programmeertalen voor webontwikkeling. Sites zoals Facebook, Wikipedia en WordPress zijn allemaal gebouwd met PHP. In dit hoofdstuk leer je de eerste stappen om zelf aan de slag te gaan met PHP.

Wat ga je leren?

Een ontwikkelomgeving opzetten
Je eerste PHP-script schrijven
Basis PHP-syntaxis begrijpen
Werken met variabelen en output
Praktische oefeningen maken
1.1 Installatie van de Ontwikkelomgeving
Om PHP te gebruiken hebben we drie dingen nodig:

Een webserver (Apache) - om onze website te laten draaien
PHP - om onze code uit te voeren
Een database (MySQL) - om gegevens op te slaan
Gelukkig kunnen we dit allemaal in één keer installeren met XAMPP.

Wat is XAMPP?
XAMPP is een gratis softwarepakket dat alles bevat wat je nodig hebt om PHP te gebruiken:

X = Cross-platform (werkt op Windows, Mac en Linux)
A = Apache (webserver)
M = MySQL (database)
P = PHP (programmeertaal)
P = Perl (nog een programmeertaal)
Stappen voor installatie
Stap 1: Download XAMPP

Ga naar: https://www.apachefriends.org/
Download de versie voor jouw besturingssysteem
Kies altijd de nieuwste versie
Stap 2: Installeer XAMPP

Open het gedownloade bestand
Volg de installatie-instructies
Accepteer alle standaardinstellingen
Installeer bij voorkeur in C:\xampp (Windows) of /Applications/XAMPP (Mac)
Stap 3: Start XAMPP

Open het XAMPP Control Panel
Klik op “Start” naast Apache
Klik op “Start” naast MySQL
Beide moeten groen worden
Stap 4: Test de installatie

Open je browser
Typ: localhost in de adresbalk
Je zou nu de XAMPP-startpagina moeten zien
🔧 Praktische Oefening 1.1
Opdracht: Installeer XAMPP en test of het werkt.

Download en installeer XAMPP
Start Apache en MySQL
Ga naar localhost in je browser
Maak een screenshot van de XAMPP-startpagina
Hulp nodig?

Krijg je een foutmelding? Check of andere programma’s poort 80 gebruiken
Lukt het niet? Vraag hulp aan je docent
Alternatieven voor XAMPP
Hoewel XAMPP de makkelijkste optie is voor beginners, zijn er ook andere manieren om PHP te installeren. Dit is vooral handig als je meer controle wilt of als XAMPP niet werkt op jouw systeem.

Optie 1: Lokale PHP-installatie (zonder webserver)
PHP versie kiezen (Windows): Bij het downloaden van PHP voor Windows moet je kiezen tussen verschillende versies:

Thread Safe (TS): Voor Apache webserver (aanbevolen voor beginners)
Non-Thread Safe (NTS): Voor IIS webserver of command line gebruik
x64: Voor 64-bit Windows (meest voorkomend)
x86: Voor 32-bit Windows (oudere systemen)
💡 Tip: Als je twijfelt, kies Thread Safe x64 - dit werkt in de meeste gevallen!

Voor Windows:

Download PHP van https://windows.php.net/download/
Pak uit naar C:\php
Voeg C:\php toe aan je Windows PATH (zie uitleg hieronder)
Kopieer php.ini-development naar php.ini
Test met: php -v in Command Prompt
PATH instellen in Windows:

Klik rechts op “Deze computer” → Eigenschappen
Klik op “Geavanceerde systeeminstellingen”
Klik op “Omgevingsvariabelen”
Selecteer “Path” bij Systeemvariabelen → Bewerken
Klik “Nieuw” en voeg toe: C:\php
Klik OK en herstart Command Prompt
Voor macOS:

# Met Homebrew (aanbevolen)
brew install php
Voor Linux (Ubuntu/Debian):

sudo apt update
sudo apt install php php-cli
Testen zonder webserver:

# Maak een test.php bestand
echo "<?php echo 'Hallo wereld!'; ?>" > test.php

# Voer uit met:
php test.php
Optie 2: Lokale development server
PHP heeft een ingebouwde webserver voor development:

# Start de ingebouwde server
php -S localhost:8000

# Of in een specifieke map
cd /pad/naar/je/project
php -S localhost:8000
Nu kun je naar localhost:8000 in je browser.

Optie 3: Afzonderlijke installatie (Apache + PHP + MySQL)
Voor gevorderden - Windows:

Stap 1: Apache installeren

Download Apache van https://httpd.apache.org/
Installeer volgens instructies
Test op localhost
Stap 2: PHP installeren

Download Thread Safe versie van https://windows.php.net/
Pak uit naar C:\php
Kopieer php.ini-development naar php.ini
Pas Apache configuratie aan:
# In httpd.conf voeg toe:
LoadModule php_module "C:/php/php8apache2_4.dll"
AddType application/x-httpd-php .php
PHPIniDir "C:/php"
Stap 3: MySQL installeren

Download MySQL van https://dev.mysql.com/downloads/
Installeer volgens instructies
Let op: Stel een root wachtwoord in en onthoud deze goed!
Voor macOS (met Homebrew):

# Installeer alle onderdelen
brew install httpd php mysql

# Start services
brew services start httpd
brew services start mysql
brew services start php
Voor Linux:

# Ubuntu/Debian
sudo apt install apache2 php libapache2-mod-php mysql-server php-mysql

# Start services
sudo systemctl start apache2
sudo systemctl start mysql
Optie 4: Docker (voor gevorderden)
Maak een docker-compose.yml:

version: '3.8'
services:
  web:
    image: php:8.2-apache
    ports:
      - "80:80"
    volumes:
      - ./src:/var/www/html
  db:
    image: mysql:8.0
    environment:
      MYSQL_ROOT_PASSWORD: password
    ports:
      - "3306:3306"
Start met: docker-compose up

Optie 5: WSL (Windows Subsystem for Linux)
Wat is WSL? WSL (Windows Subsystem for Linux) is een functie van Windows 10/11 waarmee je een Linux-omgeving kunt draaien binnen Windows. Dit geeft je het beste van beide werelden: Windows als hoofdsysteem en Linux voor development.

Voordelen van WSL voor PHP:

Echte Linux development ervaring op Windows
Betere performance dan virtuele machines
Native Linux package managers
Meer gelijk aan productieservers (die vaak Linux zijn)
WSL installeren:

Stap 1: WSL activeren

Open PowerShell als Administrator
Voer uit: wsl --install
Herstart je computer
Bij eerste opstart kies je een gebruikersnaam en wachtwoord
Stap 2: PHP installeren in WSL

# Update package lijst
sudo apt update

# Installeer PHP en benodigde extensies
sudo apt install php php-cli php-mysql php-curl php-json php-mbstring

# Controleer installatie
php -v
Stap 3: Development met ingebouwde server

# Navigeer naar je project map
cd /mnt/c/Users/jouwgebruiker/Desktop/mijnproject

# Start PHP development server
php -S localhost:8000
Bestanden delen tussen Windows en WSL:

Windows naar WSL: /mnt/c/ (C-schijf is toegankelijk)
WSL naar Windows: \\wsl$\Ubuntu\home\gebruiker\
Optie 6: Online development omgevingen
Voor als je niets lokaal wilt installeren:

Replit (https://replit.com) - Gratis online IDE
CodePen (https://codepen.io) - Voor kleine experimenten
PHP Sandbox (https://sandbox.onlinephpfunctions.com) - Voor testen
PHPFiddle (http://phpfiddle.org) - Snel PHP testen
Welke optie kiezen?
Voor beginners: Gebruik XAMPP - het is het makkelijkst

Voor Linux ervaring op Windows: WSL - beste van beide werelden

Voor experimenten: PHP ingebouwde server (php -S localhost:8000)

Voor professionele development: Afzonderlijke installatie of Docker

Voor snelle tests: Online omgevingen

💡 Tip: Begin met XAMPP en experimenteer later met andere opties als je meer ervaring hebt!

1.2 Configuratie van de Ontwikkelomgeving
Belangrijke mappen en bestanden
htdocs-map

Locatie: C:\xampp\htdocs (Windows) of /Applications/XAMPP/htdocs (Mac)
Hier plaats je al je PHP-bestanden
Alles in deze map is bereikbaar via localhost
php.ini

Configuratiebestand voor PHP
Locatie: C:\xampp\php\php.ini
Hier kun je PHP-instellingen aanpassen
🔧 Praktische Oefening 1.2
Opdracht: Maak je eerste projectmap.

Ga naar de htdocs-map
Maak een nieuwe map: mijnwebsite
Maak in deze map een bestand: test.html
Voeg deze HTML-code toe:
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Mijn Test</title>
</head>
<body>
    <h1>Hallo, ik ben bezig met leren!</h1>
</body>
</html>
Ga naar localhost/mijnwebsite/test.html
Controleer of je de pagina ziet
1.3 Je Eerste PHP-script
Nu gaan we echte PHP-code schrijven!

PHP-bestanden maken
PHP-bestanden hebben de extensie .php en kunnen zowel HTML als PHP-code bevatten.

🔧 Praktische Oefening 1.3
Opdracht: Maak je eerste PHP-bestand.

Maak in je projectmap een bestand: index.php
Voeg deze code toe:
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Mijn Eerste PHP-pagina</title>
</head>
<body>
    <h1>Hallo, wereld!</h1>
    <?php
    echo "<p>Dit is mijn eerste PHP-script!</p>";
    ?>
</body>
</html>
Ga naar localhost/mijnwebsite/index.php
Wat zie je op de pagina?
Code uitleg
HTML-deel:

Normale HTML-structuur
Titel en kop
PHP-deel:

<?php ... ?> = PHP-code blok
echo = commando om tekst te tonen
De tekst wordt in de HTML geplaatst
🔧 Praktische Oefening 1.4
Opdracht: Experimenteer met echo.

Pas je index.php aan:

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Echo Experimenten</title>
</head>
<body>
    <h1>Experimenten met echo</h1>
    
    <?php
    echo "<p>Dit is de eerste regel.</p>";
    echo "<p>Dit is de tweede regel.</p>";
    echo "<h2>Ik kan ook koppen maken!</h2>";
    ?>
</body>
</html>
Test je pagina en kijk wat er gebeurt.

1.4 PHP-syntaxis Basis
Belangrijke regels
1. PHP-blokken

<?php
// Hier komt PHP-code
?>
2. Puntkomma’s Elke regel PHP-code eindigt met een ;

<?php
echo "Regel 1";
echo "Regel 2";
?>
3. Commentaar

<?php
// Dit is een enkele regel commentaar

/* Dit is een
   meerdere regels
   commentaar */
?>
🔧 Praktische Oefening 1.5
Opdracht: Maak een pagina met commentaar.

Maak een bestand commentaar.php:

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Commentaar Oefening</title>
</head>
<body>
    <?php
    // Dit is mijn naam
    echo "<h1>Jan de Vries</h1>";
    
    /* Deze regel toont mijn leeftijd
       Dit is een langere uitleg */
    echo "<p>Ik ben 18 jaar oud</p>";
    
    // echo "<p>Deze regel zie je niet!</p>";
    ?>
</body>
</html>
Vragen:

Welke tekst zie je op de pagina?
Waarom zie je de laatste regel niet?
1.5 Werken met Variabelen
Variabelen zijn zoals bakjes waarin je informatie kunt bewaren.

Variabelen maken
<?php
$naam = "Lisa";
$leeftijd = 19;
$isStudent = true;
?>
Regels:

Variabelen beginnen met $
Tekst staat tussen aanhalingstekens
Getallen zonder aanhalingstekens
true/false voor waar/onwaar
🔧 Praktische Oefening 1.6
Opdracht: Maak een persoonlijke pagina.

Maak een bestand profiel.php:

<?php
// Variabelen maken
$naam = "Jouw naam hier";
$leeftijd = 18;
$hobby = "Gamen";
$stad = "Amsterdam";
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Mijn Profiel</title>
</head>
<body>
    <h1>Mijn Profiel</h1>
    
    <?php
    echo "<p>Hallo, ik ben $naam</p>";
    echo "<p>Ik ben $leeftijd jaar oud</p>";
    echo "<p>Mijn hobby is $hobby</p>";
    echo "<p>Ik woon in $stad</p>";
    ?>
</body>
</html>
Pas aan:

Vul je eigen gegevens in
Voeg een extra variabele toe (bijvoorbeeld favoriete kleur)
Toon deze ook op de pagina
Shorthand echo
Je kunt ook korter schrijven:

<!-- Lang -->
<?php echo $naam; ?>

<!-- Kort -->
<?= $naam ?>
De shorthand <?= ... ?> werkt exact hetzelfde als <?php echo ...; ?> en is vooral handig in HTML-templates.

🔧 Praktische Oefening 1.7
Opdracht: Gebruik shorthand echo.

Maak een bestand shorthand.php:

<?php
$titel = "Mijn Favoriete Film";
$film = "Spider-Man";
$jaar = 2021;
$beoordeling = 8.5;
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title><?= $titel ?></title>
</head>
<body>
    <h1><?= $titel ?></h1>
    <p>Film: <?= $film ?></p>
    <p>Jaar: <?= $jaar ?></p>
    <p>Beoordeling: <?= $beoordeling ?>/10</p>
</body>
</html>
1.6 Kennismaking met Types in PHP
Wat zijn Types?
Elke waarde in PHP heeft een type. Dit vertelt wat voor soort data het is:

<?php
$naam = "Lisa";           // string (tekst)
$leeftijd = 19;           // integer (heel getal)
$prijs = 19.99;          // float (decimaal getal)
$isStudent = true;        // boolean (waar/onwaar)
$hobbies = ["gamen", "lezen"];  // array (lijst)
?>
⚠️ Belangrijk: PHP is Flexibel met Types
PHP is dynamically typed - een variabele kan van type veranderen:

<?php
$waarde = 18;        // integer
$waarde = "18";      // nu een string - geen foutmelding!
$waarde = 18.5;      // nu een float - dit mag gewoon!
?>
Dit is anders dan veel andere talen waar dit NIET mag.

Type Checking: Welk Type is het?
Je kunt checken welk type een variabele heeft:

<?php
$naam = "Lisa";
$leeftijd = 19;

echo gettype($naam);     // "string"
echo gettype($leeftijd); // "integer"

// Of met specifieke checks:
if (is_string($naam)) {
    echo "Dit is tekst!";
}

if (is_int($leeftijd)) {
    echo "Dit is een getal!";
}
?>
Veel Voorkomende Types
Type	Voorbeeld	Wat is het?
string	"Hallo"	Tekst
int	42	Heel getal
float	3.14	Decimaal getal
bool	true, false	Waar/onwaar
array	[1, 2, 3]	Lijst
null	null	Geen waarde
🔧 Praktische Oefening 1.6: Types Ontdekken
Opdracht: Maak een bestand om types te begrijpen.

Maak een bestand types.php:

<?php
// Verschillende types
$studentName = "Emma";              // string
$studentAge = 20;                   // integer
$averageGrade = 7.8;               // float
$hasPassedExam = true;             // boolean
$courses = ["PHP", "HTML", "CSS"]; // array

echo "<h1>Type Information</h1>";

// Toon de types
echo "<p>Name type: " . gettype($studentName) . "</p>";
echo "<p>Age type: " . gettype($studentAge) . "</p>";
echo "<p>Grade type: " . gettype($averageGrade) . "</p>";
echo "<p>Passed type: " . gettype($hasPassedExam) . "</p>";
echo "<p>Courses type: " . gettype($courses) . "</p>";

// Check specifieke types
if (is_string($studentName)) {
    echo "<p>✓ Name is inderdaad een string!</p>";
}

if (is_int($studentAge)) {
    echo "<p>✓ Age is inderdaad een integer!</p>";
}
?>
💡 Tips voor Beginners
Let op aanhalingstekens:
"18" is tekst (string)
18 is een getal (integer)
Gebruik gettype() als je niet zeker weet welk type iets is

Meer over types: In Hoofdstuk 2 leer je alles over datatypen en type safety!
📋 Kort Samengevat
PHP heeft verschillende types: string, int, float, bool, array, null
Je kunt het type checken met gettype() of is_string(), is_int(), etc.
PHP is dynamically typed - variabelen kunnen van type veranderen
In Hoofdstuk 2 leer je veel meer over types en hoe je ze veilig gebruikt!
1.7 PHP-functies
PHP heeft ingebouwde functies die je kunt gebruiken.

Handige functies
<?php
// Datum en tijd
echo date("Y-m-d"); // 2024-03-15
echo date("H:i:s"); // 14:30:25

// Tekst functies
echo strlen("Hallo"); // 5 (aantal karakters)
echo strtoupper("hallo"); // HALLO
echo strtolower("HALLO"); // hallo

// Wiskundige functies
echo rand(1, 10); // Willekeurig getal tussen 1 en 10
?>
🔧 Praktische Oefening 1.7a
Opdracht: Maak een dynamische pagina.

Maak een bestand dynamisch.php:

<?php
$naam = "Jouw naam";
$huidigetijd = date("H:i:s");
$vandaag = date("Y-m-d");
$geluksgetal = rand(1, 100);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Dynamische Pagina</title>
</head>
<body>
    <h1>Hallo <?= $naam ?>!</h1>
    <p>Vandaag is het: <?= $vandaag ?></p>
    <p>Het is nu: <?= $huidigetijd ?></p>
    <p>Jouw geluksgetal van vandaag: <?= $geluksgetal ?></p>
    <p>Je naam in hoofdletters: <?= strtoupper($naam) ?></p>
</body>
</html>
Vernieuw de pagina een paar keer - wat verandert er?

1.8 Lab-opdracht uit het originele hoofdstuk
📝 Lab-opdracht 1.1: Je Eerste Website met PHP
Opdracht: Maak een eenvoudige webpagina die de naam en leeftijd van een gebruiker toont.

Stappen:

Maak in de map mijnwebsite een bestand persoon.php
Voeg HTML-structuur toe aan dit bestand
Declareer de volgende variabelen in het PHP code block bovenin het document:
Een variabele $naam met je eigen naam als waarde
Een tweede variabele $leeftijd met je eigen leeftijd
Maak een derde variabele die je bijvoorbeeld $output noemt, zet in de variabele de zin: “Hallo, mijn naam is [je naam] en ik ben [je leeftijd] jaar oud.”
Gebruik de PHP shorthand echo manier in de body om deze zin weer te geven
Codevoorbeeld structuur:

<?php
// PHP code hier - declareer je variabelen
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Persoonlijke Pagina</title>
</head>
<body>
    <!-- Gebruik shorthand echo om $output weer te geven -->
</body>
</html>
Test: Open localhost/mijnwebsite/persoon.php in de browser en controleer of je naam en leeftijd correct worden weergegeven.

1.9 Uitgebreide Eindopdrachten
Nu ga je alles wat je geleerd hebt samenvoegen in uitdagende opdrachten.

📝 Opdracht 1 (Basis): Persoonlijke Visitkaart
Doel: Maak een digitale visitkaart van jezelf.

Eisen:

Gebruik minimaal 5 variabelen
Toon je naam, leeftijd, opleiding, hobby, en woonplaats
Gebruik shorthand echo
Voeg commentaar toe aan je code
Bestand: visitkaart.php

Voorbeeld uitvoer:

Visitkaart van Lisa de Jong
-------------------------
Leeftijd: 19 jaar
Opleiding: Software Development
Hobby: Programmeren
Woonplaats: Utrecht
📝 Opdracht 2 (Gemiddeld): Dagelijkse Informatie
Doel: Maak een pagina die elke dag andere informatie toont.

Eisen:

Toon de huidige datum en tijd
Gebruik minimaal 3 verschillende PHP-functies
Maak een “quote van de dag” die random wordt gekozen
Bereken hoeveel dagen er zijn tot jouw verjaardag
Bestand: daginfo.php

Hints:

Maak een array met quotes
Gebruik rand() om een willekeurige quote te kiezen
Gebruik date() voor datum berekeningen
📝 Opdracht 3 (Uitdagend): Mini Calculator
Doel: Maak een eenvoudige calculator die berekeningen toont.

Eisen:

Definieer 2 getallen in variabelen
Bereken en toon: optelling, aftrekking, vermenigvuldiging, deling
Toon welk getal het grootste is
Bereken het gemiddelde van beide getallen
Gebruik mooie HTML-opmaak
Bestand: calculator.php

Extra uitdaging:

Voeg meer wiskundige functies toe (machtsverheffen, wortel trekken)
Maak de uitvoer mooi met CSS-styling
📝 Opdracht 4 (Expert): Persoonlijke Dashboard
Doel: Maak een persoonlijk dashboard met alle informatie.

Eisen:

Combineer alle technieken van de vorige opdrachten
Maak secties voor: persoonlijke info, tijd/datum, rekenmachine, en fun facts
Gebruik minimaal 10 variabelen
Voeg een “refresh” knop toe (HTML)
Maak het visueel aantrekkelijk
Bestand: dashboard.php

Extra uitdagingen:

Voeg een bezoekersteller toe (gebruik een simpele variabele)
Maak een “mood van de dag” die random wordt gekozen
Voeg een mini-spelletje toe (bijvoorbeeld raad het getal)
1.10 Samenvatting
Wat heb je geleerd?

✅ Ontwikkelomgeving opzetten

XAMPP installeren en configureren
PHP los installeren
WSL voor Linux ervaring
Projectmappen maken
Bestanden in de juiste locatie plaatsen
✅ PHP-basis

PHP-blokken gebruiken (<?php ... ?>)
Echo voor output
Commentaar toevoegen
Puntkomma’s niet vergeten
✅ Variabelen

Variabelen maken met $
Verschillende datatypen (tekst, getallen, boolean)
Variabelen in output gebruiken
✅ Type Safety (Modern PHP)

Basis types begrijpen (string, int, float, bool, array)
Het belang van consistente types
Gebruik van gettype() om types te controleren
Vooruitblik op type declarations en strict types
Engels als standaard in professionele code
✅ Handige functies

Datum en tijd functies
Tekst manipulatie
Wiskundige functies
✅ Goede praktijken

PHP-code bovenin het bestand
Shorthand echo gebruiken
Code netjes commentariëren
Volgende stappen: In hoofdstuk 2 gaan we verder met:

Formulieren verwerken
Gebruikersinput ontvangen
Condities (if/else)
Loops (for/while)
Bronnen
Officiële documentatie
PHP Manual - Volledige PHP documentatie
XAMPP Official - Download en documentatie
Leermateriaal
W3Schools PHP Tutorial - Beginnersvriendelijke uitleg
PHP The Right Way - Best practices
Codecademy PHP Course - Interactieve lessen
Hulpmiddelen
Online PHP Tester - Test code zonder installatie
PHP Sandbox - Experimenteer met functies
Replit - Online development omgeving
PHPFiddle - Snel PHP code testen
Visual Studio Code - Aanbevolen code-editor
Installatie alternatieven
PHP Downloads - Officiële PHP downloads
Apache HTTP Server - Webserver apart installeren
MySQL Downloads - Database apart installeren
Homebrew - Package manager voor macOS
Docker - Containerisatie voor development
WSL Documentation - Windows Subsystem for Linux
Nederlandse bronnen
Sitepoint PHP - Artikelen en tutorials
PHP Basics - Nederlandse uitleg
Codingame PHP - Speelse oefeningen
Community
Stack Overflow - Vragen en antwoorden
Reddit r/PHP - Discussies en nieuws
PHP Discord - Chat met andere ontwikkelaars
© 2025 ROC-Midden Nederland – ICT-College – Amersfoort, Nederland

MBO Niveau 4 - Software Developer

PHP Tutorials – Starten met PHP

PHP Tutorial
ROC ICA Logo
H1-Starten met PHP

Hoofdstuk 2 : Welkom bij Variabelen!
In dit hoofdstuk gaan we dieper in op het gebruik van variabelen en datatypen in PHP. Variabelen zijn zoals digitale bakjes waarin je informatie kunt bewaren - denk aan je naam, leeftijd, of favoriete game. Datatypen bepalen wat voor soort informatie je in die bakjes kunt stoppen.

Wat ga je leren?

Wat variabelen zijn en hoe je ze gebruikt
Verschillende soorten data (tekst, getallen, waar/onwaar)
Tekst samenvoegen (concatenatie)
Handige trucjes met operatoren
Arrays - lijsten met informatie
Strong typing voor betere code (bonus onderwerp)
💡 Voor wie moeite heeft met lezen:

Gebruik een grotere font in je code editor
Kies een donker thema (minder vermoeiend)
Neem pauzes van 10 minuten elke 30 minuten
Lees de code hardop voor jezelf
Wat zijn Variabelen?
Een variabele in PHP is een “container” waarin je gegevens kunt opslaan. Deze gegevens kunnen tekst, getallen, booleans (waar/niet-waar waarden) en nog veel meer zijn. Elke variabele in PHP begint met het $-teken, gevolgd door de naam van de variabele.

Waarom het $-teken? PHP gebruikt het $-teken om variabelen te herkennen. Dit maakt het voor de computer duidelijk: “Dit is een variabele, niet gewoon tekst.”

🎨 Tip voor visuele lerenden: Stel je variabelen voor als labels op dozen. Het $-teken is de sticker die zegt “dit is een doos met inhoud”.

Regels voor het benoemen van variabelen
Bij het benoemen van variabelen in PHP gelden de volgende regels:

Begin met $: Een variabele moet beginnen met een $-teken, gevolgd door een letter of een underscore (_)
Gebruik letters, cijfers en underscores: Variabelen mogen letters, cijfers en underscores bevatten, maar niet beginnen met een cijfer
Hoofdlettergevoelig: Variabelen zijn hoofdlettergevoelig. $naam en $Naam zijn dus twee verschillende variabelen
Goede voorbeelden:

$naam = "Lisa";
$leeftijd = 19;
$is_student = true;
$favoriet_getal = 42;
$_geheim = "password";
Slechte voorbeelden:

$2naam = "Lisa";     // Begint met cijfer - FOUT!
$mijn naam = "Lisa"; // Spatie - FOUT!
$mijn-naam = "Lisa"; // Streepje - FOUT!
🔧 Praktische Oefening 2.1
Opdracht: Experimenteer met variabelenamen.

Maak een bestand variabelen_test.php:

<?php
// Geldige variabelen
$mijn_naam = "Jouw naam hier";
$leeftijd2023 = 19;
$_geheim_nummer = 007;

// Test deze - welke werken?
echo $mijn_naam . "<br>";
echo $leeftijd2023 . "<br>";
echo $_geheim_nummer . "<br>";

// Probeer deze (in commentaar):
// $2leeftijd = 19;     // Zou fout moeten geven
// $mijn naam = "Test"; // Zou fout moeten geven
?>
Vragen:

Welke variabelen werken?
Waarom werken sommige niet?
Bedenk 3 eigen geldige variabelenamen
Het Declareren van Variabelen en Waarden Toekennen
Variabelen declareren we door het $-teken te gebruiken en vervolgens een waarde toe te wijzen met het = teken. De waarde kan een tekst, getal, of ander datatype zijn.

<?php
$naam = "Lisa";        // String (tekst)
$leeftijd = 21;        // Integer (geheel getal)
$is_student = true;    // Boolean (waar of niet-waar)
$gemiddelde = 7.5;     // Float (getal met decimalen)
?>
Belangrijk: Je hoeft niet van tevoren te zeggen wat voor soort data je in een variabele stopt. PHP snapt dit automatisch!

🔧 Praktische Oefening
Opdracht: Maak je eigen social media profiel met variabelen.

Maak een bestand mijn_profiel.php:

<?php
// Declareer variabelen voor jezelf
$gebruikersnaam = "@jouw_username";
$volledige_naam = "Jouw Volledige Naam";
$leeftijd = 18;
$bio = "Student | Gamer | Muziekliefhebber";
$volgers = 145;
$volgend = 89;
$posts = 23;
$is_verified = false;
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Mijn Profiel</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 400px; margin: 50px auto; }
        .profiel { border: 1px solid #ddd; padding: 20px; border-radius: 10px; }
        .stats { display: flex; justify-content: space-between; margin: 15px 0; }
    </style>
</head>
<body>
    <div class="profiel">
        <h1><?= $volledige_naam ?> <?= $is_verified ? '✓' : '' ?></h1>
        <p><strong><?= $gebruikersnaam ?></strong></p>
        <p><?= $bio ?></p>
        <div class="stats">
            <span><strong><?= $posts ?></strong> posts</span>
            <span><strong><?= $volgers ?></strong> volgers</span>
            <span><strong><?= $volgend ?></strong> volgend</span>
        </div>
        <p>Leeftijd: <?= $leeftijd ?> jaar</p>
    </div>
</body>
</html>
Let op

Waar staat de meeste PHP code?
Hoe wordt de PHP code “geprint” in de body van je HTML?
Pas aan:

Vul je eigen gegevens in
Voeg 2 extra variabelen toe (bijvoorbeeld favoriete_emoji, locatie)
Experimenteer met de styling (css)
Datatypen in PHP
PHP herkent automatisch het datatype van de waarde die je toekent aan een variabele. Dit maakt PHP flexibel en gemakkelijk in gebruik. Hier zijn de meest voorkomende datatypen in PHP:

String – Tekstuele gegevens, zoals namen of zinnen
Integer – Gehele getallen, zoals 3, -10, of 42
Float – Getallen met decimalen, zoals 3.14 of -0.99
Boolean – Waarden die alleen true (waar) of false (niet waar) kunnen zijn
Array – Verzameling van waarden, bijvoorbeeld een lijst met namen
NULL – Een speciale waarde die aangeeft dat een variabele geen waarde heeft
Handige functie: var_dump() Met var_dump() kun je zien wat voor datatype een variabele heeft:

<?php
$naam = "Lisa";
$leeftijd = 19;

var_dump($naam);     // string(4) "Lisa"
var_dump($leeftijd); // int(19)
?>
🔧 Praktische Oefening 2.3
Opdracht: Ontdek datatypen met een Instagram-achtig scenario.

Maak een bestand datatypen_test.php:

<?php
$post_tekst = "Net wakker! ☀️ #goedmorgen";
$aantal_likes = 42;
$rating_sterren = 4.8;
$is_openbaar = true;
$laatste_comment = null; // Nog geen comments

echo "<h2>Instagram Post Analyse</h2>";
echo "<p>Post tekst: "; var_dump($post_tekst); echo "</p>";
echo "<p>Aantal likes: "; var_dump($aantal_likes); echo "</p>";
echo "<p>Rating: "; var_dump($rating_sterren); echo "</p>";
echo "<p>Openbaar: "; var_dump($is_openbaar); echo "</p>";
echo "<p>Laatste comment: "; var_dump($laatste_comment); echo "</p>";

// Bonus: toon het op een leuke manier
echo "<hr>";
echo "<div style='border: 1px solid #ccc; padding: 15px; margin: 10px;'>";
echo "<p><strong>$post_tekst</strong></p>";
echo "<p>❤️ $aantal_likes likes | ⭐ $rating_sterren sterren</p>";
echo "<p>Status: " . ($is_openbaar ? "Openbaar" : "Privé") . "</p>";
echo "</div>";
?>
Probeer ook:

Verander true naar false
Voeg een negatief getal toe
Maak een variabele met jouw favoriete hashtag
🎯 Checkpoint 1: Basis Variabelen

Voordat je verder gaat, test jezelf:

Kun je een variabele maken voor je naam?
Kun je je leeftijd in een variabele stoppen?
Kun je var_dump() gebruiken om het type te zien?
Mini-opdracht: Maak variabelen voor je top 3 favoriete TikTok creators en toon ze op een webpagina.

String
Een string is een reeks tekens die tekst weergeeft, zoals een naam, een zin of een willekeurige tekst. In PHP schrijf je een string tussen enkele (') of dubbele (") aanhalingstekens.

<?php
$voornaam = "Lisa";
$achternaam = 'Jansen';
echo "Hallo, mijn naam is $voornaam $achternaam.";
?>
Belangrijk verschil:

Dubbele aanhalingstekens ("): PHP interpreteert variabelen binnen de string
Enkele aanhalingstekens ('): PHP toont alles letterlijk
<?php
$naam = "Lisa";
echo "Hallo $naam";    // Toont: Hallo Lisa
echo 'Hallo $naam';    // Toont: Hallo $naam
?>
String Concatenatie in PHP
String concatenatie is het samenvoegen van twee of meer strings tot één enkele string. In PHP kun je strings samenvoegen met de punt-operator (.). Dit is een handige techniek om variabelen en tekst te combineren.

Hoe Werkt String Concatenatie?
Om strings samen te voegen, gebruik je de punt-operator (.) tussen elke string of variabele die je wilt combineren.

<?php
$voornaam = "Lisa";
$achternaam = "Jansen";
$volledige_naam = $voornaam . " " . $achternaam;
echo $volledige_naam; // Toont: "Lisa Jansen"
?>
De .= Operator
PHP biedt ook een handige shorthand-operator voor string concatenatie: .=. Met .= voeg je nieuwe tekst toe aan de bestaande waarde van een variabele.

<?php
$bericht = "Hallo";
$bericht .= " daar!";
echo $bericht; // Toont: "Hallo daar!"
?>
🔧 Praktische Oefening
Opdracht: Bouw een WhatsApp-achtig bericht systeem.

Maak een bestand chat_systeem.php:

<?php
$jouw_naam = "Alex";
$vriend_naam = "Sam";
$tijd = "14:23";
$emoji = "😄";

// Verschillende manieren om berichten te maken
echo "<h2>Chat Simulator</h2>";
echo "<div style='font-family: monospace; background: #f0f0f0; padding: 20px;'>";

// Methode 1: Variabelen in dubbele aanhalingstekens
echo "<p><strong>$tijd - $jouw_naam:</strong> Hey $vriend_naam! Hoe gaat het? $emoji</p>";

// Methode 2: Concatenatie met punt-operator
echo "<p><strong>" . $tijd . " - " . $vriend_naam . ":</strong> " . "Goed hoor! Jij?" . "</p>";

// Methode 3: Opbouwen van een bericht
$bericht = $tijd . " - " . $jouw_naam . ": ";
$bericht .= "Zullen we vanavond gamen? ";
$bericht .= "Ik heb een nieuwe game gedownload! ";
$bericht .= "🎮";
echo "<p><strong>$bericht</strong></p>";

// Jouw beurt: maak een eigen chat conversatie
$jouw_bericht = "Je eigen bericht hier";
$reactie = "Een reactie van je vriend";
echo "<p><strong>" . $tijd . " - " . $jouw_naam . ":</strong> " . $jouw_bericht . "</p>";
echo "<p><strong>" . $tijd . " - " . $vriend_naam . ":</strong> " . $reactie . "</p>";

echo "</div>";
?>
Uitbreidingen:

Voeg timestamps toe
Maak verschillende chat kleuren voor verschillende personen
Experimenteer met emoji’s en verschillende bericht types
Integer
Een integer is een geheel getal, zonder decimalen. Integers kunnen positief of negatief zijn.

<?php
$leeftijd = 21;
$jaar = 2023;
$negatief_getal = -15;
$nul = 0;
?>
💡 Bonus: Andere Notaties (Optioneel)
Voor wie meer wil weten: je kunt getallen ook in andere vormen schrijven. Dit gebruik je zelden in de praktijk, maar het is goed om te weten dat het kan.

<?php
$decimaal = 255;
$hexadecimaal = 0xFF;  // Ook 255 (gebruikt in kleuren: #FF0000)
$octaal = 0377;        // Ook 255 (gebruikt in file permissions)

echo "Allemaal hetzelfde: $decimaal, $hexadecimaal, $octaal";
?>
⚠️ Voor beginners: Je hoeft dit niet te onthouden, focus eerst op gewone getallen!

🔧 Praktische Oefening
Opdracht: Bouw een levensduur calculator zoals TikTok challenges.

Maak een bestand levensduur_calculator.php:

<?php
$geboortejaar = 2005;
$huidig_jaar = 2024;
$leeftijd = $huidig_jaar - $geboortejaar;

echo "<h2>📱 TikTok Levensduur Challenge</h2>";
echo "<div style='background: linear-gradient(45deg, #ff0050, #00f5ff); color: white; padding: 20px; border-radius: 15px;'>";

echo "<p>🎂 Geboren in: $geboortejaar</p>";
echo "<p>📅 Huidig jaar: $huidig_jaar</p>";
echo "<p>🎈 Leeftijd: $leeftijd jaar</p>";

// Bereken hoeveel dagen je hebt geleefd (ongeveer)
$dagen_geleefd = $leeftijd * 365;
echo "<p>⏰ Je hebt ongeveer $dagen_geleefd dagen geleefd!</p>";

// Hoeveel uren je hebt geleefd
$uren_geleefd = $dagen_geleefd * 24;
echo "<p>🕐 Dat zijn $uren_geleefd uren!</p>";

// Bereken wanneer je belangrijke leeftijden bereikt
$jaar_18 = $geboortejaar + 18;
$jaar_21 = $geboortejaar + 21;
$jaar_30 = $geboortejaar + 30;

echo "<h3>🎯 Mijlpalen:</h3>";
echo "<p>🔞 Volwassen (18): $jaar_18</p>";
echo "<p>🍾 Alcohol (21): $jaar_21</p>";
echo "<p>💼 Dertig (30): $jaar_30</p>";

// Bonus: bereken je Spotify wrapped statistieken
$spotify_uren_per_dag = 3;
$spotify_uren_totaal = $leeftijd * 365 * $spotify_uren_per_dag;
echo "<p>🎵 Geschatte Spotify uren: $spotify_uren_totaal uur</p>";

echo "</div>";
?>
Uitdaging: Voeg berekeningen toe voor:

Hoeveel pizza’s je waarschijnlijk hebt gegeten
Hoeveel uur je hebt geslapen
In welk jaar je gaat afstuderen
Float
Een float (ook wel double genoemd) is een getal met een decimaal. Floats worden vaak gebruikt voor bedragen, percentages, of andere waarden met decimalen.

<?php
$prijs = 19.99;
$temperatuur = -3.5;
$percentage = 75.0;
$pi = 3.14159;
?>
Let op: Voor geld is het beter om centen als integers te gebruiken:

<?php
// Beter voor geldberekeningen
$prijs_in_centen = 1999; // €19.99
$prijs_in_euros = $prijs_in_centen / 100;
echo "Prijs: €" . number_format($prijs_in_euros, 2);
?>
🔧 Praktische Oefening
Opdracht: Bereken je beoordeling zoals Netflix ratings.

Maak een bestand rating_calculator.php:

<?php
// Je vakken en cijfers
$nederlands = 7.5;
$wiskunde = 8.2;
$engels = 6.8;
$programmeren = 9.1;
$sport = 7.0;

// Bereken gemiddelde
$totaal = $nederlands + $wiskunde + $engels + $programmeren + $sport;
$aantal_vakken = 5;
$gemiddelde = $totaal / $aantal_vakken;

// Bereken je maandelijkse spaargeld
$zakgeld_per_week = 15.50;
$zakgeld_per_maand = $zakgeld_per_week * 4;

echo "<h2>🎓 Mijn School Dashboard</h2>";
echo "<div style='background: #1a1a1a; color: white; padding: 20px; border-radius: 10px;'>";

echo "<h3>📊 Cijfer Overzicht</h3>";
echo "<p>📚 Nederlands: $nederlands</p>";
echo "<p>🔢 Wiskunde: $wiskunde</p>";
echo "<p>🌍 Engels: $engels</p>";
echo "<p>💻 Programmeren: $programmeren</p>";
echo "<p>⚽ Sport: $sport</p>";
echo "<hr>";

$gemiddelde_afgerond = round($gemiddelde, 1);
echo "<p><strong>⭐ Gemiddelde: $gemiddelde_afgerond</strong></p>";

// Netflix-style rating
if ($gemiddelde >= 8.5) {
    $netflix_rating = "🔥 Excellent!";
    $emoji = "🏆";
} elseif ($gemiddelde >= 7.0) {
    $netflix_rating = "👍 Good!"; 
    $emoji = "😊";
} elseif ($gemiddelde >= 5.5) {
    $netflix_rating = "👌 OK";
    $emoji = "😐";
} else {
    $netflix_rating = "👎 Needs Work";
    $emoji = "😬";
}

echo "<p>$emoji Netflix Rating: $netflix_rating</p>";

// Financiën
echo "<h3>💰 Financiën</h3>";
echo "<p>💵 Zakgeld per week: €$zakgeld_per_week</p>";
echo "<p>📅 Per maand: €" . round($zakgeld_per_maand, 2) . "</p>";

$sparen_percentage = 0.3; // 30% sparen
$spaargeld = $zakgeld_per_maand * $sparen_percentage;
echo "<p>🏦 Spaargeld (30%): €" . round($spaargeld, 2) . "</p>";

echo "</div>";
?>
Uitbreiding:

Voeg je eigen cijfers toe
Bereken hoeveel je nodig hebt voor een nieuwe iPhone
Maak een uitgaven tracker
Boolean
Een boolean heeft slechts twee mogelijke waarden: true of false. Booleans zijn handig bij het maken van beslissingen in je code.

<?php
$is_ingelogd = true;
$heeft_toegang = false;
$is_volwassen = true;
$heeft_rijbewijs = false;
?>
Handige weetjes:

true toont als “1” in output
false toont als lege string
Andere waarden kunnen ook als boolean worden gebruikt:
0, "" (lege string), null = false
Alle andere waarden = true
🔧 Praktische Oefening
Opdracht: Maak een social media toegangschecker.

Maak een bestand toegang_checker.php:

<?php
$gebruiker = "Alex";
$leeftijd = 17;
$heeft_account = true;
$email_geverifieerd = true;
$heeft_premium = false;
$is_geblokkeerd = false;

// Social media logica
$mag_account_aanmaken = ($leeftijd >= 13);
$mag_live_streamen = ($leeftijd >= 16) && $heeft_account;
$mag_geld_verdienen = ($leeftijd >= 18) && $email_geverifieerd;
$kan_premium_functies = $heeft_premium && !$is_geblokkeerd;
$mag_dm_sturen = $heeft_account && $email_geverifieerd && !$is_geblokkeerd;

echo "<h2>📱 Social Media Access Control</h2>";
echo "<div style='background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 15px;'>";

echo "<h3>👤 Profiel: $gebruiker ($leeftijd jaar)</h3>";
echo "<p>✅ Account: " . ($heeft_account ? 'Actief' : 'Geen account') . "</p>";
echo "<p>📧 Email: " . ($email_geverifieerd ? 'Geverifieerd' : 'Niet geverifieerd') . "</p>";
echo "<p>⭐ Premium: " . ($heeft_premium ? 'Ja' : 'Nee') . "</p>";
echo "<p>🚫 Status: " . ($is_geblokkeerd ? 'Geblokkeerd' : 'Actief') . "</p>";

echo "<h3>🎯 Wat mag je?</h3>";
echo "<p>📝 Account aanmaken: " . ($mag_account_aanmaken ? '✅ Ja' : '❌ Nee (te jong)') . "</p>";
echo "<p>📺 Live streamen: " . ($mag_live_streamen ? '✅ Ja' : '❌ Nee') . "</p>";
echo "<p>💰 Geld verdienen: " . ($mag_geld_verdienen ? '✅ Ja' : '❌ Nee') . "</p>";
echo "<p>⭐ Premium functies: " . ($kan_premium_functies ? '✅ Ja' : '❌ Nee') . "</p>";
echo "<p>💬 DM's sturen: " . ($mag_dm_sturen ? '✅ Ja' : '❌ Nee') . "</p>";

// Suggesties
echo "<h3>💡 Suggesties:</h3>";
if (!$email_geverifieerd) {
    echo "<p>📧 Verifieer je email voor meer functies</p>";
}
if (!$heeft_premium && $leeftijd >= 16) {
    echo "<p>⭐ Overweeg premium voor extra features</p>";
}
if ($leeftijd < 18) {
    echo "<p>⏰ Over " . (18 - $leeftijd) . " jaar kun je geld verdienen</p>";
}

echo "</div>";
?>
Experimenteer:

Verander de leeftijd naar 18 en kijk wat er verandert
Pas de boolean waarden aan
Voeg eigen regels toe (bijvoorbeeld mag_verhaal_posten)
NULL
De waarde NULL geeft aan dat een variabele geen waarde heeft. Je kunt een variabele instellen op NULL om aan te geven dat deze leeg of onbekend is.

<?php
$gegevens = NULL;        // Geen waarde
$onbekend = null;        // Zelfde als NULL (case-insensitive)
$nog_niet_ingevuld = NULL;
?>
Wanneer gebruik je NULL?

Als je nog niet weet wat de waarde moet zijn
Om aan te geven dat iets optioneel is
Om een variabele “leeg” te maken
🔧 Praktische Oefening
Opdracht: Bouw een dating app profiel systeem.

Maak een bestand dating_profiel.php:

<?php
$naam = "Sarah";
$leeftijd = 20;
$bio = "Student | Hondenliefhebber | Koffie addict ☕";
$partner = null;        // Single
$favoriete_film = null; // Nog niet gekozen
$laatste_date = null;   // Nog geen dates gehad
$profielfoto = "sarah.jpg";
$verified = true;

echo "<h2>💕 Dating App Profiel</h2>";
echo "<div style='background: linear-gradient(45deg, #ff6b6b, #ff8e8e); color: white; padding: 25px; border-radius: 20px; max-width: 400px;'>";

echo "<h3>👤 $naam, $leeftijd jaar " . ($verified ? "✓" : "") . "</h3>";
echo "<p>📝 $bio</p>";

// Check relatiestatus
if ($partner === null) {
    echo "<p>💚 Status: Single en beschikbaar!</p>";
} else {
    echo "<p>❤️ In relatie met: $partner</p>";
}

// Check favoriete film
if ($favoriete_film === null) {
    echo "<p>🎬 Favoriete film: Verras me met een suggestie!</p>";
} else {
    echo "<p>🎬 Favoriete film: $favoriete_film</p>";
}

// Check date geschiedenis
if ($laatste_date === null) {
    echo "<p>📅 Laatste date: Nog geen dates gehad - jij zou de eerste kunnen zijn! 😉</p>";
} else {
    echo "<p>📅 Laatste date: $laatste_date</p>";
}

// Update tijdens gebruik van de app
echo "<hr>";
echo "<h4>🔄 Live Updates:</h4>";

// Iemand matcht!
$favoriete_film = "Spider-Man: Into the Spider-Verse";
echo "<p>✨ Update: Favoriete film is nu '$favoriete_film'</p>";

// Eerste date gepland
$laatste_date = "Afgelopen vrijdag - koffie bij Starbucks";
echo "<p>💫 Update: Eerste date gehad! '$laatste_date'</p>";

// Check of profiel compleet is
$profiel_compleet = ($favoriete_film !== null) && ($bio !== null);
if ($profiel_compleet) {
    echo "<p>🎉 Profiel is compleet! Meer matches verwacht 📈</p>";
}

echo "</div>";
?>
Arrays
Een array is een verzameling van waarden die je in één variabele kunt opslaan. Arrays zijn nuttig voor het opslaan van lijsten, zoals een lijst met namen of prijzen. Er zijn twee soorten arrays in PHP: Indexed Arrays en Associative Arrays.

Indexed Arrays
Bij indexed arrays heeft elk element een indexnummer, beginnend bij 0.

<?php
$kleuren = ["rood", "blauw", "groen"];
echo $kleuren[0]; // Toont "rood"
echo $kleuren[1]; // Toont "blauw"
echo $kleuren[2]; // Toont "groen"

// Je kunt ook zo arrays maken:
$getallen = array(1, 2, 3, 4, 5);
?>
Associative Arrays
In associative arrays ken je een specifieke sleutel toe aan elk element in plaats van een indexnummer.

<?php
$persoon = [
    "naam" => "Lisa",
    "leeftijd" => 21,
    "beroep" => "student"
];

echo $persoon["naam"];     // Toont "Lisa"
echo $persoon["leeftijd"]; // Toont 21
?>
🔧 Praktische Oefening
Opdracht: Bouw je eigen Spotify-achtige playlist systeem.

Maak een bestand playlist_systeem.php:

<?php
// Indexed array met favoriete artiesten
$top_artiesten = ["Billie Eilish", "The Weeknd", "Dua Lipa", "Post Malone"];

// Associative array met playlist info
$mijn_playlist = [
    "naam" => "Study Vibes 📚",
    "eigenaar" => "Alex",
    "aangemaakt" => "2024-01-15", 
    "duur_minuten" => 127,
    "aantal_liedjes" => 23,
    "publiek" => true,
    "genre" => "Chill/Study"
];

// Multidimensionale array (liedjes in playlist)
$liedjes = [
    [
        "titel" => "Lovely",
        "artiest" => "Billie Eilish",
        "duur" => "3:20",
        "jaar" => 2018
    ],
    [
        "titel" => "Blinding Lights", 
        "artiest" => "The Weeknd",
        "duur" => "3:22",
        "jaar" => 2019
    ],
    [
        "titel" => "Levitating",
        "artiest" => "Dua Lipa", 
        "duur" => "3:23",
        "jaar" => 2020
    ]
];

echo "<h2>🎵 Mijn Spotify Dashboard</h2>";
echo "<div style='background: #1DB954; color: white; padding: 25px; border-radius: 15px;'>";

echo "<h3>🎧 Top Artiesten:</h3>";
echo "<ul>";
foreach ($top_artiesten as $index => $artiest) {
    $positie = $index + 1;
    echo "<li>#$positie - $artiest</li>";
}
echo "</ul>";

echo "<h3>📝 Playlist Details:</h3>";
echo "<p>🎼 Naam: " . $mijn_playlist["naam"] . "</p>";
echo "<p>👤 Eigenaar: " . $mijn_playlist["eigenaar"] . "</p>";
echo "<p>📅 Aangemaakt: " . $mijn_playlist["aangemaakt"] . "</p>";
echo "<p>⏱️ Duur: " . $mijn_playlist["duur_minuten"] . " minuten</p>";
echo "<p>🎵 Liedjes: " . $mijn_playlist["aantal_liedjes"] . "</p>";
echo "<p>🌍 Status: " . ($mijn_playlist["publiek"] ? "Publiek" : "Privé") . "</p>";

echo "<h3>🎤 Liedjes in Playlist:</h3>";
$totaal_seconden = 0;
foreach ($liedjes as $liedje) {
    echo "<div style='background: rgba(0,0,0,0.2); padding: 10px; margin: 5px 0; border-radius: 5px;'>";
    echo "<strong>" . $liedje["titel"] . "</strong> - " . $liedje["artiest"];
    echo "<br>⏰ " . $liedje["duur"] . " | 📅 " . $liedje["jaar"];
    echo "</div>";
    
    // Bereken totale duur (bonus)
    list($minuten, $seconden) = explode(':', $liedje["duur"]);
    $totaal_seconden += ($minuten * 60) + $seconden;
}

// Toon totale duur
$totaal_minuten = floor($totaal_seconden / 60);
$resterende_seconden = $totaal_seconden % 60;
echo "<p><strong>📊 Totale duur getoonde liedjes: {$totaal_minuten}:{$resterende_seconden} minuten</strong></p>";

// Array functies demonstreren
echo "<h3>🔧 Playlist Beheer:</h3>";
echo "<p>📈 Aantal artiesten: " . count($top_artiesten) . "</p>";
echo "<p>🎵 Aantal liedjes getoond: " . count($liedjes) . "</p>";

// Voeg nieuw liedje toe
array_push($liedjes, [
    "titel" => "Good 4 U",
    "artiest" => "Olivia Rodrigo",
    "duur" => "2:58", 
    "jaar" => 2021
]);
echo "<p>✅ Nieuw liedje toegevoegd! Totaal nu: " . count($liedjes) . " liedjes</p>";

echo "</div>";
?>
Uitbreiding:

Voeg je eigen favoriete liedjes toe
Bereken de totale waarde van je Spotify abonnement per jaar
Maak verschillende playlists voor verschillende stemmingen
Voeg een rating systeem toe (sterren van 1-5)
🎯 Checkpoint 2: Arrays Beheersen

Test jezelf:

Kun je een lijst maken van je vrienden?
Kun je een array maken met jouw gegevens (naam, leeftijd, hobby)?
Kun je door een array lopen met foreach?
Mini-opdracht: Maak een “Mijn Top 5” pagina (Netflix series/games/YouTubers) met arrays.

Operatoren in PHP
Met operatoren kun je berekeningen uitvoeren of waarden vergelijken. Ze maken je code krachtiger en interactiever.

Rekenkundige Operatoren
<?php
$a = 10;
$b = 5;

$som = $a + $b;           // 15 (optellen)
$verschil = $a - $b;      // 5 (aftrekken)
$product = $a * $b;       // 50 (vermenigvuldigen)
$quotient = $a / $b;      // 2 (delen)
$rest = $a % $b;          // 0 (modulo - rest bij deling)
$macht = $a ** $b;        // 100000 (macht - 10^5)
?>
Vergelijkingsoperatoren
<?php
$x = 10;
$y = 5;

var_dump($x == $y);   // false (gelijk aan)
var_dump($x != $y);   // true (niet gelijk aan)
var_dump($x > $y);    // true (groter dan)
var_dump($x < $y);    // false (kleiner dan)
var_dump($x >= $y);   // true (groter dan of gelijk aan)
var_dump($x <= $y);   // false (kleiner dan of gelijk aan)
var_dump($x === $y);  // false (identiek - zelfde waarde EN type)
?>
Logische Operatoren
<?php
$leeftijd = 18;
$heeft_id = true;

// AND (&&) - beide moeten waar zijn
$mag_club_in = ($leeftijd >= 18) && $heeft_id;

// OR (||) - één van beide moet waar zijn  
$mag_film_zien = ($leeftijd >= 16) || $heeft_id;

// NOT (!) - keert waar/onwaar om
$is_minderjarig = !($leeftijd >= 18);
?>
🔧 Praktische Oefening
Opdracht: Bouw een TikTok algoritme simulator.

Maak een bestand tiktok_algoritme.php:

<?php
// Video statistieken
$views = 15420;
$likes = 2341;
$comments = 89;
$shares = 156;
$video_duur = 23; // seconden

// Gebruiker gegevens
$volgers = 890;
$following = 234;
$account_leeftijd_dagen = 45;

echo "<h2>🎬 TikTok Algoritme Simulator</h2>";
echo "<div style='background: linear-gradient(45deg, #ff0050, #00f5ff); color: white; padding: 25px; border-radius: 20px;'>";

echo "<h3>📊 Video Statistieken</h3>";
echo "<p>👀 Views: " . number_format($views) . "</p>";
echo "<p>❤️ Likes: " . number_format($likes) . "</p>";
echo "<p>💬 Comments: $comments</p>";
echo "<p>🔄 Shares: $shares</p>";
echo "<p>⏱️ Duur: $video_duur seconden</p>";

// Bereken engagement rates
$like_rate = ($likes / $views) * 100;
$comment_rate = ($comments / $views) * 100;
$share_rate = ($shares / $views) * 100;

echo "<h3>📈 Engagement Analyse</h3>";
echo "<p>Like rate: " . round($like_rate, 2) . "%</p>";
echo "<p>Comment rate: " . round($comment_rate, 2) . "%</p>";
echo "<p>Share rate: " . round($share_rate, 2) . "%</p>";

// Algoritme score berekenen
$algoritme_score = 0;

// Views score (max 30 punten)
if ($views >= 10000) {
    $algoritme_score += 30;
} elseif ($views >= 5000) {
    $algoritme_score += 20;
} elseif ($views >= 1000) {
    $algoritme_score += 10;
}

// Engagement score (max 40 punten)
if ($like_rate >= 15) $algoritme_score += 15;
if ($comment_rate >= 0.5) $algoritme_score += 10;
if ($share_rate >= 1) $algoritme_score += 15;

// Video duur score (max 15 punten)
if ($video_duur >= 15 && $video_duur <= 30) {
    $algoritme_score += 15; // Sweet spot
} elseif ($video_duur >= 10 && $video_duur <= 60) {
    $algoritme_score += 10;
}

// Account kwaliteit (max 15 punten)
$volgers_ratio = $volgers / $following;
if ($volgers_ratio >= 2) $algoritme_score += 10;
if ($account_leeftijd_dagen >= 30) $algoritme_score += 5;

echo "<h3>🏆 Algoritme Score: $algoritme_score/100</h3>";

// Voorspelling
if ($algoritme_score >= 80) {
    $voorspelling = "🔥 VIRAL! Voor jou pagina gegarandeerd!";
    $kleur = "#00ff00";
} elseif ($algoritme_score >= 60) {
    $voorspelling = "📈 Goede kans op trending!";
    $kleur = "#ffff00";
} elseif ($algoritme_score >= 40) {
    $voorspelling = "👍 Stabiele performance";
    $kleur = "#ff8800";
} else {
    $voorspelling = "📉 Needs improvement";
    $kleur = "#ff0000";
}

echo "<div style='background: $kleur; color: black; padding: 15px; border-radius: 10px; margin: 10px 0;'>";
echo "<h4>$voorspelling</h4>";
echo "</div>";

// Tips voor verbetering
echo "<h3>💡 Tips voor Verbetering:</h3>";
if ($like_rate < 10) {
    echo "<p>❤️ Maak content die meer likes krijgt (trending sounds, challenges)</p>";
}
if ($comment_rate < 0.3) {
    echo "<p>💬 Stel vragen om meer comments te krijgen</p>";
}
if ($share_rate < 0.5) {
    echo "<p>🔄 Maak relateerbare content die mensen willen delen</p>";
}
if ($video_duur > 60) {
    echo "<p>⏱️ Kortere video's (15-30 sec) doen het vaak beter</p>";
}

echo "</div>";
?>
Uitdaging: Voeg toe:

Verschillende video categorieën (dans, comedy, educatief)
Tijd van de dag factor
Hashtag effectiviteit
Duet/collaboration bonus
Operatoren voor Variabelen in PHP
Er zijn speciale operatoren die het werken met variabelen efficiënter maken. Deze shorthand-operatoren maken je code korter en overzichtelijker.

De Incrementeer (++) en Decrementeer (--) Operatoren
<?php
$score = 5;
$score++; // Verhoogt $score met 1, dus $score is nu 6
echo $score; // Toont: 6

$lives = 3;
$lives--; // Verlaagt $lives met 1, dus $lives is nu 2
echo $lives; // Toont: 2
?>
Voor-incrementeer en Na-incrementeer
⚠️ Gevorderd concept: Dit kan verwarrend zijn voor beginners. Focus eerst op de basis!

Voorincrementeer (++$variabele): Verhoogt eerst, gebruikt dan
Na-incrementeer ($variabele++): Gebruikt eerst, verhoogt dan
<?php
$a = 5;
echo ++$a; // Toont: 6 (eerst verhogen, dan tonen)
echo $a++; // Toont: 6 (eerst tonen, dan verhogen naar 7)
echo $a;   // Toont: 7
?>
De += en -= Operatoren
<?php
$score = 100;
$score += 50; // Verhoogt $score met 50, dus $score is nu 150
$score -= 25; // Verlaagt $score met 25, dus $score is nu 125

// Andere shorthand operatoren
$getal = 10;
$getal *= 2;  // Vermenigvuldigt met 2: $getal = 20
$getal /= 4;  // Deelt door 4: $getal = 5
?>
🔧 Praktische Oefening
Opdracht: Bouw een mobile game score systeem.

Maak een bestand game_tracker.php:

<?php
$player_name = "GamerAlex";
$score = 0;
$level = 1;
$lives = 3;
$coins = 50;
$xp = 0;

echo "<h2>🎮 Mobile Game Tracker</h2>";
echo "<div style='background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 25px; border-radius: 15px;'>";

echo "<h3>👤 Speler: $player_name</h3>";
echo "<p>📊 Start Stats - Score: $score | Level: $level | Lives: $lives | Coins: $coins</p>";

echo "<h3>🎯 Game Sessie:</h3>";

// Eerste level activiteiten
echo "<p>🏃 Level 1 gestart...</p>";

// Muntjes verzamelen
$coins += 10;
echo "<p>💰 10 coins gevonden! Totaal: $coins coins</p>";

// Vijand verslagen
$score += 100;
$xp += 25;
echo "<p>⚔️ Vijand verslagen! Score: $score | XP: $xp</p>";

// Bonus gevonden
$score += 250;
$coins += 5;
echo "<p>🎁 Bonus gevonden! Score: $score | Coins: $coins</p>";

// Level omhoog (XP check)
if ($xp >= 100) {
    $level++;
    $xp -= 100; // Reset XP voor volgende level
    $lives++; // Bonus life
    echo "<p>🆙 LEVEL UP! Level: $level | Bonus life! Lives: $lives</p>";
}

// Boss fight
echo "<p>👹 Boss fight!</p>";
$lives--; // Schade opgelopen
$score += 500; // Boss verslagen
echo "<p>⚡ Boss verslagen maar schade opgelopen! Score: $score | Lives: $lives</p>";

// Multiplier bonus
$score *= 2;
echo "<p>✨ 2x Score Multiplier! Score: $score</p>";

// Items kopen in shop
$coins -= 15; // Koop health potion
$lives++;
echo "<p>🧪 Health potion gekocht! Lives: $lives | Coins: $coins</p>";

// Power-up gekocht
$coins -= 20;
echo "<p>⚡ Power-up gekocht! Coins: $coins</p>";

// Game status check
echo "<h3>📈 Eind Status:</h3>";
echo "<div style='background: rgba(0,0,0,0.3); padding: 15px; border-radius: 10px;'>";
echo "<p><strong>👤 Speler:</strong> $player_name</p>";
echo "<p><strong>🏆 Score:</strong> " . number_format($score) . "</p>";
echo "<p><strong>📊 Level:</strong> $level</p>";
echo "<p><strong>❤️ Lives:</strong> $lives</p>";
echo "<p><strong>💰 Coins:</strong> $coins</p>";
echo "<p><strong>⭐ XP:</strong> $xp/100</p>";

// Performance beoordeling
if ($score >= 1500 && $lives > 2) {
    echo "<p style='color: #00ff00;'>🌟 EXCELLENT PERFORMANCE! 🌟</p>";
} elseif ($score >= 1000) {
    echo "<p style='color: #ffff00;'>👍 Good job!</p>";
} elseif ($lives > 0) {
    echo "<p style='color: #ff8800;'>😊 Keep practicing!</p>";
} else {
    echo "<p style='color: #ff0000;'>💀 Game Over! Try again!</p>";
}

echo "</div>";
echo "</div>";
?>
Ideeën om toe te voegen:

Een achievement systeem
Combo multipliers
Verschillende soorten power-ups
Daily challenges
Type Safety en Strong Typing in PHP
⚠️ PHP is Dynamically Typed - Wat betekent dit?
Belangrijk om te weten: PHP dwingt NIET automatisch af dat een variabele één type blijft. Dit is fundamenteel anders dan talen zoals Java of TypeScript.

<?php
// PHP staat dit TOE - geen foutmelding!
$prijs = 99;           // integer
$prijs = "99";         // nu een string
$prijs = 99.99;        // nu een float
$prijs = true;         // nu een boolean

// Dit werkt allemaal zonder errors!
echo gettype($prijs);  // boolean
?>
Vergelijk dit met TypeScript (JavaScript met types):

// TypeScript - DIT WERKT NIET
let price: number = 99;
price = "99";  // ❌ ERROR: Type 'string' is not assignable to type 'number'
Waarom is dit belangrijk?
<?php
// Voorbeeld: Formulierdata die vaak als string binnenkomt
$leeftijd_input = "18";  // String van formulier
$geboortejaar = 2006;    // Integer

// Automatische type conversie (type coercion)
$huidig_jaar = $leeftijd_input + $geboortejaar;  // PHP converteert automatisch
echo $huidig_jaar;  // 2024 - werkt, maar verwarrend!

// Beter: Expliciete type casting
$leeftijd = (int)$leeftijd_input;  // Expliciet naar integer
$huidig_jaar = $leeftijd + $geboortejaar;
echo $huidig_jaar;  // 2024 - duidelijker!
?>
Type Safety is JOUW Verantwoordelijkheid
In PHP moet JIJ ervoor zorgen dat types consistent blijven. De taal helpt je daar niet automatisch mee (behalve bij functies, zie hieronder).

✅ GOEDE PRAKTIJK - Consistent types gebruiken:

<?php
// Duidelijk en consistent
$product_name = "iPhone 15";        // string
$product_price = 999.99;            // float
$in_stock = true;                   // boolean
$stock_quantity = 42;               // integer

// Als je data converteert, doe het expliciet
$user_age = (int)$_POST["age"];    // Expliciet naar integer casten
$rating = (float)$_POST["rating"]; // Expliciet naar float casten
?>
❌ SLECHTE PRAKTIJK - Types door elkaar:

<?php
// Onduidelijk en foutgevoelig
$price = "999.99";      // string (bijv. van formulier)
$discount = 0.1;        // float
$final = $price * (1 - $discount);  // PHP converteert automatisch, maar onduidelijk

// Type verandert onverwacht
$value = 100;           // integer
$value = "100 euro";    // oeps! nu string met tekst
$calculation = $value * 2;  // 200 (PHP negeert " euro" deel - GEVAARLIJK!)
?>
Type Checking Functies
PHP biedt functies om types te controleren:

<?php
$data = "Hello";

// Check specifiek type
if (is_string($data)) {
    echo "Dit is een string";
}

if (is_int($data)) {
    echo "Dit is een integer";
}

if (is_float($data)) {
    echo "Dit is een float";
}

if (is_bool($data)) {
    echo "Dit is een boolean";
}

if (is_array($data)) {
    echo "Dit is een array";
}

if (is_null($data)) {
    echo "Dit is null";
}

// Of gebruik gettype() voor het exacte type
echo gettype($data);  // "string"
?>
Type Casting (Type Conversie)
Je kunt types expliciet converteren met type casting:

<?php
// String naar integer
$text = "42";
$number = (int)$text;       // integer: 42
echo gettype($number);      // integer

// String naar float
$price_text = "19.99";
$price = (float)$price_text;  // float: 19.99

// Integer naar string
$age = 25;
$age_text = (string)$age;   // string: "25"

// Naar boolean (0, "", null worden false, rest wordt true)
$value = "hello";
$bool = (bool)$value;       // true

// Voorbeelden van conversie
echo (int)"123";      // 123
echo (int)"123abc";   // 123 (stopt bij eerste niet-cijfer)
echo (int)"abc";      // 0 (geen cijfers = 0)
echo (float)"12.34";  // 12.34
?>
🔧 Praktische Oefening: Type Safety Bewustzijn
Opdracht: Leer type problems herkennen en oplossen.

Maak een bestand type_safety_demo.php:

<?php
echo "<h2>🔍 Type Safety Demonstratie</h2>";

// Scenario 1: Formulier data processing
echo "<h3>Scenario 1: Formulier Data</h3>";
echo "<div style='background: #f0f0f0; padding: 15px; margin: 10px 0;'>";

// Simuleer formulier data (altijd strings!)
$user_age = "25";
$user_height = "1.75";
$user_is_student = "true";  // Let op: string "true", niet boolean!

echo "<p>Type van leeftijd: " . gettype($user_age) . " (waarde: $user_age)</p>";
echo "<p>Type van lengte: " . gettype($user_height) . " (waarde: $user_height)</p>";
echo "<p>Type van student: " . gettype($user_is_student) . " (waarde: $user_is_student)</p>";

// Probleem: "true" als string is altijd truthy, maar niet boolean
if ($user_is_student) {
    echo "<p>⚠️ Dit wordt uitgevoerd! Maar $user_is_student is een STRING, geen boolean!</p>";
}

// Oplossing: Expliciete conversie
$age = (int)$user_age;
$height = (float)$user_height;
$is_student = ($user_is_student === "true");  // String vergelijking

echo "<hr>";
echo "<p>✅ Na conversie:</p>";
echo "<p>Leeftijd: $age (" . gettype($age) . ")</p>";
echo "<p>Lengte: $height (" . gettype($height) . ")</p>";
echo "<p>Student: " . ($is_student ? "true" : "false") . " (" . gettype($is_student) . ")</p>";

echo "</div>";

// Scenario 2: Gevaarlijke automatische conversie
echo "<h3>Scenario 2: Automatische Conversie (Gevaarlijk!)</h3>";
echo "<div style='background: #fff3cd; padding: 15px; margin: 10px 0;'>";

$price_string = "100";
$discount = 10;

// PHP converteert automatisch
$result1 = $price_string - $discount;  // 90 - werkt, maar onduidelijk
echo "<p>\"100\" - 10 = $result1 (type: " . gettype($result1) . ")</p>";

// Dit kan misgaan
$bad_price = "100 euro";
$result2 = $bad_price - $discount;  // 90 (!!) - PHP negeert " euro"
echo "<p>⚠️ \"100 euro\" - 10 = $result2 (type: " . gettype($result2) . ")</p>";
echo "<p>🚨 Dit is GEVAARLIJK! PHP negeert gewoon de tekst!</p>";

// Betere aanpak
$clean_price = (int)filter_var($bad_price, FILTER_SANITIZE_NUMBER_INT);
$result3 = $clean_price - $discount;
echo "<p>✅ Correct: Na cleaning: $result3</p>";

echo "</div>";

// Scenario 3: Type checking voor veilige code
echo "<h3>Scenario 3: Type Checking voor Veiligheid</h3>";
echo "<div style='background: #d1ecf1; padding: 15px; margin: 10px 0;'>";

function safe_calculate($value1, $value2) {
    // Check types voordat je berekeningen doet
    if (!is_numeric($value1) || !is_numeric($value2)) {
        return "❌ ERROR: Alleen getallen toegestaan!";
    }

    $num1 = (float)$value1;
    $num2 = (float)$value2;

    return "✅ Resultaat: " . ($num1 + $num2);
}

echo "<p>" . safe_calculate(10, 20) . "</p>";
echo "<p>" . safe_calculate("15", "25") . "</p>";
echo "<p>" . safe_calculate("abc", 10) . "</p>";

echo "</div>";

// Scenario 4: var_dump voor debugging
echo "<h3>Scenario 4: Debugging met var_dump()</h3>";
echo "<div style='background: #f8d7da; padding: 15px; margin: 10px 0;'>";

$mystery_var1 = "0";
$mystery_var2 = 0;
$mystery_var3 = false;
$mystery_var4 = null;

echo "<p>Wat is het type van deze variabelen?</p>";
echo "<pre>";
echo "mystery_var1: "; var_dump($mystery_var1);
echo "mystery_var2: "; var_dump($mystery_var2);
echo "mystery_var3: "; var_dump($mystery_var3);
echo "mystery_var4: "; var_dump($mystery_var4);
echo "</pre>";

echo "<p>Let op de verschillen! Ze lijken soms hetzelfde maar zijn het niet!</p>";

echo "</div>";
?>
Waar Type Safety WEL werkt: Type Hints bij Functies
⚠️ Let op: Dit is een gevorderd onderwerp. Als je net begint met PHP, kun je dit deel overslaan en later terugkomen.

Het enige waar PHP type safety kan afdwingen is bij functies met type hints en strict types mode.

Standaard is PHP een los getypeerde taal, wat betekent dat het automatisch het datatype bepaalt. Met type hints bij functies kun je expliciet aangeven welke datatypes je verwacht.

Type Declaraties voor Parameters en Returnwaarden
<?php
function optellen(int $a, int $b): int {
    return $a + $b;
}

$resultaat = optellen(10, 5); // Werkt prima
echo $resultaat; // Output: 15
?>
Strict Typing Inschakelen
<?php
declare(strict_types=1);

function vermenigvuldigen(int $a, int $b): int {
    return $a * $b;
}

echo vermenigvuldigen(4, 5);   // Output: 20
// echo vermenigvuldigen(4, 5.5); // Foutmelding vanwege float
?>
Verschillende Type Declaraties
<?php
declare(strict_types=1);

function begroeting(string $naam): string {
    return "Hallo, " . $naam;
}

function is_volwassen(int $leeftijd): bool {
    return $leeftijd >= 18;
}

function bereken_gemiddelde(array $cijfers): float {
    return array_sum($cijfers) / count($cijfers);
}
?>
🔧 Praktische Oefening (Gevorderd)
Opdracht: Maak type-safe functies voor een webshop.

Maak een bestand webshop_functions.php:

<?php
declare(strict_types=1);

// Type-safe functies voor webshop
function bereken_btw(float $bedrag, float $btw_percentage): float {
    return $bedrag * ($btw_percentage / 100);
}

function maak_product_naam(string $merk, string $model): string {
    return $merk . " " . $model;
}

function heeft_korting(int $leeftijd, bool $is_student): bool {
    return ($leeftijd < 18) || ($leeftijd >= 65) || $is_student;
}

function bereken_totaal_prijs(array $prijzen): float {
    if (empty($prijzen)) {
        return 0.0;
    }
    return array_sum($prijzen);
}

function geef_rating_sterren(int $rating): string {
    if ($rating < 1 || $rating > 5) {
        return "Ongeldige rating";
    }
    return str_repeat("⭐", $rating);
}

// Test de functies
echo "<h2>🛒 Webshop Calculator</h2>";
echo "<div style='background: #f8f9fa; padding: 20px; border-radius: 10px; border: 1px solid #dee2e6;'>";

$product_prijs = 99.99;
$btw = bereken_btw($product_prijs, 21.0);
echo "<p>💰 Prijs: €$product_prijs</p>";
echo "<p>💰 BTW (21%): €" . round($btw, 2) . "</p>";
echo "<p>💰 Totaal: €" . round($product_prijs + $btw, 2) . "</p>";

$product = maak_product_naam("Apple", "iPhone 15");
echo "<p>📱 Product: $product</p>";

$klant_leeftijd = 17;
$is_student = true;
$korting = heeft_korting($klant_leeftijd, $is_student);
echo "<p>🎓 Klant ($klant_leeftijd jaar, student: " . ($is_student ? 'ja' : 'nee') . ")</p>";
echo "<p>💸 Heeft korting: " . ($korting ? 'Ja (10%)' : 'Nee') . "</p>";

$winkelwagen = [29.99, 15.50, 89.95, 12.99];
$totaal = bereken_totaal_prijs($winkelwagen);
echo "<p>🛒 Winkelwagen items: " . count($winkelwagen) . "</p>";
echo "<p>💳 Subtotaal: €" . round($totaal, 2) . "</p>";

$product_rating = 4;
$sterren = geef_rating_sterren($product_rating);
echo "<p>⭐ Rating: $sterren ($product_rating/5)</p>";

echo "</div>";
?>
💡 Voordelen van Type Hints bij Functies:

Betere foutdetectie tijdens ontwikkeling
Duidelijkere code voor andere ontwikkelaars
Betere IDE ondersteuning met autocomplete
Minder bugs in productie
📋 Samenvatting: Type Safety in PHP
🎯 Kern Begrip:

PHP is dynamically typed. Type safety voor variabelen is jouw verantwoordelijkheid als developer!

✅ Wat PHP WEL doet:

Type hints bij functies (met declare(strict_types=1))
Runtime type checking met is_*() functies (is_int(), is_string(), etc.)
Expliciete type casting met (int), (float), (string), (bool)
gettype() voor type informatie
❌ Wat PHP NIET doet:

Automatische type checking voor variabelen
Voorkomen dat variabelen van type veranderen
Compile-time type errors (PHP is interpreted)
Type enforcement zonder expliciete type hints
🛠️ Wat je zelf moet doen:

Bewust consistente types gebruiken
Expliciete type conversies met casting: (int)$var, (float)$var
Type checking voordat je berekeningen doet: is_numeric(), is_string()
Formulierdata altijd valideren en converteren
Bij functies: type hints gebruiken met strict types
🚨 Veelvoorkomende Valkuilen:

<?php
// ⚠️ GEVAAR: Automatische conversie
$result = "100 euro" - 10;  // 90 - PHP negeert tekst!

// ✅ VEILIG: Expliciete conversie
$price = (int)filter_var("100 euro", FILTER_SANITIZE_NUMBER_INT);
$result = $price - 10;  // 90 - duidelijk en veilig

// ⚠️ GEVAAR: String "true" is niet boolean true
$is_active = "true";  // string!
if ($is_active) { }   // wordt uitgevoerd (string is truthy)

// ✅ VEILIG: Expliciete boolean conversie
$is_active = ($user_input === "true");  // echte boolean
?>
💡 Best Practices:

Cast formulierdata altijd naar het juiste type
Gebruik is_*() functies voor validatie
Vermijd automatische conversie - wees expliciet
Gebruik var_dump() en gettype() bij debugging
Leer later type hints bij functies voor extra veiligheid
Veelgemaakte Fouten en Hoe Je Ze Voorkomt
❌ Veelgemaakte Fouten
<?php
// FOUT 1: Vergeten $ teken
naam = "Lisa";  // Parse error

// ✅ GOED: 
$naam = "Lisa";

// FOUT 2: Verkeerde quotes mixen
$bericht = "Hij zei: 'Hallo"'; // Syntax error

// ✅ GOED:
$bericht = "Hij zei: 'Hallo'";

// FOUT 3: Case mismatch
$MijnNaam = "Lisa";
echo $mijnnaam; // Undefined variable - case sensitive!

// ✅ GOED: Consistent naming
$mijn_naam = "Lisa";
echo $mijn_naam;

// FOUT 4: Array index vergeten
$kleuren = ["rood", "blauw"];
echo $kleuren; // Array to string conversion

// ✅ GOED:
echo $kleuren[0]; // "rood"

// FOUT 5: String en number verwarring
$getal = "10";
$resultaat = $getal + 5; // Works maar kan verwarrend zijn

// ✅ BETER: Expliciete conversie
$getal = (int)"10";
$resultaat = $getal + 5;
?>
🛠️ Debug Tips
<?php
// Handige debug functies
$data = ["naam" => "Lisa", "leeftijd" => 20];

// 1. var_dump() - Toont type en waarde
var_dump($data);

// 2. print_r() - Mooiere output voor arrays
print_r($data);

// 3. gettype() - Alleen het type
echo gettype($data); // "array"

// 4. is_* functies voor type checking
if (is_array($data)) {
    echo "Het is een array!";
}
?>
Eindopdrachten
📝 Opdracht 1 ⭐: Instagram-achtig Profiel
Doel: Maak een social media profiel pagina met alle datatypen.

Eisen:

Gebruik alle datatypen (string, int, float, bool, array, null)
Minimaal 15 verschillende variabelen
Gebruik concatenatie en shorthand operatoren
Maak het visueel aantrekkelijk met CSS
Simuleer Instagram/TikTok functies
Bestand: social_profiel.php

Features om te implementeren:

Gebruikersnaam, bio, volgers, following
Posts array met likes en comments
Story highlights
Verified status (boolean)
Latest activity (kan null zijn)
Engagement rate berekeningen
📝 Opdracht 2 ⭐⭐: Spotify Playlist Manager
Doel: Bouw een systeem om playlists te beheren zoals Spotify.

Eisen:

Multidimensionale arrays voor liedjes en playlists
Bereken totale speeltijd, gemiddelde song duur
Shuffle en repeat functionaliteit simuleren
Mood-based playlist categorisering
User statistics (meest gespeelde, recent toegevoegd)
Features:

Top 5 artiesten van de week
Recently played tracks
Playlist recommendations
Music taste analysis
📝 Opdracht 3 ⭐⭐⭐ Gaming Achievement System
Doel: Maak een complex achievement tracking systeem voor een mobiele game.

Eisen:

Type-safe functies voor alle berekeningen (als je strong typing hebt geleerd)
Verschillende achievement categorieën
Progress tracking en unlock systemen
Leaderboard functionaliteit
Reward calculations
Functionaliteiten:

XP system met level progression
Daily/weekly challenges
Rare achievement unlock probability
Social features (friend comparisons)
In-game currency management
📝 Opdracht 4 ⭐⭐⭐⭐: E-commerce Dashboard
Doel: Bouw een complete webshop admin dashboard.

Eisen:

Complexe data structuren voor producten, orders, klanten
Alle operatoren en datatypen gebruiken
Strong typing voor alle functies (gevorderd)
Financial calculations (BTW, kortingen, shipping)
Inventory management
Analytics en rapportage
Features:

Sales analytics met grafieken simulatie
Customer segmentation
Product recommendation engine
Discount en promo code systeem
Multi-currency support
Hieronder een aantal voorbeelden om je op weg te helpen:

📝Voorbeeld: Social Media Gegevens
Opdracht: Bouw een TikTok-achtig profiel systeem.

<?php
$username = "@jouw_username";
$display_name = "Jouw Naam";
$leeftijd = 18;
$locatie = "Amsterdam, NL";
$is_verified = false;
$volgers = 1205;
$volgend = 892;
$likes = 15420;

echo "<div style='background: linear-gradient(45deg, #ff0050, #00f5ff); color: white; padding: 20px; border-radius: 15px;'>";
echo "<h2>$display_name</h2>";
echo "<p>$username" . ($is_verified ? " ✓" : "") . "</p>";
echo "<p>📍 $locatie | 🎂 $leeftijd jaar</p>";
echo "<p>👥 $volgers volgers | $volgend volgend | ❤️ " . number_format($likes) . " likes</p>";
echo "</div>";
?>
📝 Voorbeeld: YouTube-achtig Comment Systeem
Opdracht: Simuleer een comment sectie met string concatenatie.

<?php
$video_titel = "PHP Tutorial voor Beginners";
$uploader = "CodeWithAlex";
$jouw_naam = "GamerLisa";

$comment = "Geweldige tutorial! ";
$comment .= "Dankjewel " . $uploader . " voor het delen! ";
$comment .= "Dit heeft me echt geholpen. 👍";

echo "<h2>📺 YouTube Comment Sectie</h2>";
echo "<div style='background: #f9f9f9; padding: 15px; border-radius: 10px; border-left: 3px solid #ff0000;'>";
echo "<h3>$video_titel</h3>";
echo "<p>Door: $uploader</p>";
echo "<hr>";
echo "<p><strong>$jouw_naam:</strong> $comment</p>";
echo "</div>";
?>
2.16 Samenvatting
🎉 Gefeliciteerd! Je hebt alle belangrijke concepten van PHP variabelen en datatypen geleerd!

Wat heb je geleerd?
✅ Variabelen en Naamgeving:

Variabelen beginnen met $
Naamgevingsregels en best practices
Hoofdlettergevoeligheid
✅ Datatypen:

String - Tekst tussen quotes
Integer - Hele getallen
Float - Decimale getallen
Boolean - true of false
Array - Lijsten met waarden
NULL - Geen waarde
✅ Type Safety (Belangrijk!):

PHP is dynamically typed - types worden niet automatisch afgedwongen
Jij bent verantwoordelijk voor consistente types
Gebruik type casting: (int), (float), (string), (bool)
Type checking met: is_int(), is_string(), gettype()
Formulierdata komt altijd binnen als string!
Automatische type conversie kan gevaarlijk zijn
Type hints bij functies (gevorderd onderwerp)
✅ String Manipulatie:

Concatenatie met . operator
Variabelen in dubbele quotes
String functies
✅ Operatoren:

Rekenkundige: +, -, *, /, %, **
Vergelijking: ==, !=, >, <, >=, <=, ===
Logische: &&, ||, !
Shorthand: ++, --, +=, -=, *=, /=
✅ Arrays:

Indexed arrays (numerieke index)
Associative arrays (key-value pairs)
Multidimensionale arrays
✅ Debug Technieken:

var_dump() - Type en waarde tonen
print_r() - Array structuur tonen
gettype() - Type opvragen
is_*() functies - Type controleren
🎯 Belangrijkste Lessen:

Type Safety is jouw verantwoordelijkheid - PHP dwingt het niet af
Wees expliciet - Cast types expliciet met (int), (float), etc.
Valideer formulierdata - Komt altijd binnen als string
Test je code - Gebruik var_dump() en gettype() bij twijfel
Blijf consistent - Gebruik consequent dezelfde types
Nu ben je klaar om complexe applicaties te bouwen en je vaardigheden verder te ontwikkelen. Vergeet niet dat programmeren een continu leerproces is. Blijf oefenen, experimenteren en nieuwe dingen ontdekken!

Bronnen en Verdere Studie
🇳🇱 Nederlandse Bronnen
PHP.nl - Nederlandse PHP community
Programmeren.org - Nederlandse tutorials
YouTube: “PHP voor Beginners Nederlands”
Discord: PHP Nederland
📱 Mobile-First Learning
Mimo - 5 minuten per dag programmeren
SoloLearn PHP
Programming Hero
Grasshopper - Google’s coding app
🌐 Internationale Bronnen
PHP Manual - Variables
W3Schools PHP
Codecademy PHP
FreeCodeCamp PHP
🛠️ Tools en Hulpmiddelen
PHP Sandbox - Online PHP tester
3v4l.org - Test op verschillende PHP versies
PHP Fiddle - Snel code testen
XAMPP - Lokale development omgeving
🎮 Gamified Learning
Codewars PHP
HackerRank PHP
LeetCode PHP
PHP Exercises
📚 Aanbevolen Boeken
“PHP: The Good Parts” - Voor gevorderde technieken
“Modern PHP” - Moderne PHP praktijken
“Learning PHP, MySQL & JavaScript” - Complete webdevelopment
🆘 Hulp Krijgen
Stack Overflow PHP
Reddit r/PHP
PHP Discord Communities
Je docent en medestudenten!
© 2025 ROC-Midden Nederland – ICT-College – Amersfoort, Nederland

MBO Niveau 4 - Software Developer

PHP Tutorials – Variabelen en Datatypen in PHP

PHP Tutorial
ROC ICA Logo
H3-Controle Structuren en Loops

Hoofdstuk 3: Controle Structuren en Loops in PHP
In dit hoofdstuk gaan we dieper in op controle structuren en loops in PHP. Controle structuren en loops maken het mogelijk om beslissingen te maken in je code en taken te herhalen. Dit zijn essentiële concepten voor elk type programmering en vormen de basis voor het schrijven van efficiënte en flexibele scripts.

Wat ga je leren?

If/else statements voor beslissingen maken
Switch statements voor meerdere keuzes
For, while, do-while en foreach loops
Break en continue statements
Geneste structuren en loops
Code-blokken en best practices
Praktische toepassingen in real-world scenario’s
💡 Let op: Dit hoofdstuk bouwt voort op hoofdstuk 1 en 2. Zorg dat je variabelen en datatypen begrijpt voordat je verder gaat!

3.1 Controle Structuren: If/Else
Met de if-structuur kun je logica toevoegen aan je code door voorwaarden te stellen. Hiermee kun je specifieke code laten uitvoeren op basis van bepaalde omstandigheden.

Basis if/else-structuur
De if-structuur controleert een voorwaarde. Als de voorwaarde waar is (true), voert de code binnen het if-blok uit. Als de voorwaarde niet waar is (false), kan een optioneel else-blok worden uitgevoerd.

Voorbeeld:

<?php
$leeftijd = 18;

if ($leeftijd >= 18) {
    echo "Je hebt toegang.";
} else {
    echo "Sorry, je hebt geen toegang.";
}
?>
In dit voorbeeld krijgt iemand met een leeftijd van 18 jaar of ouder toegang; anders wordt toegang geweigerd.

🔧 Praktische Oefening 3.1
Opdracht: Test toegangscontrole voor een concert.

Maak een bestand concert_check.php:

<?php
$naam = "Lisa";
$leeftijd = 16;
$heeft_ticket = true;
$is_vip = false;

echo "<h2>🎤 Concert Toegangscontrole</h2>";
echo "<div style='background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 15px;'>";

echo "<p>👤 Naam: $naam</p>";
echo "<p>🎂 Leeftijd: $leeftijd jaar</p>";

if ($leeftijd >= 18) {
    echo "<p>✅ Leeftijd: OK voor toegang</p>";
} else {
    echo "<p>❌ Leeftijd: Te jong (minimaal 18 jaar vereist)</p>";
}

if ($heeft_ticket) {
    echo "<p>🎟️ Ticket: Geverifieerd</p>";
} else {
    echo "<p>❌ Geen geldig ticket</p>";
}

echo "</div>";
?>
Experimenteer:

Verander de leeftijd naar verschillende waarden
Pas de ticket status aan
Wat gebeurt er bij leeftijd 18? Bij 17?
If/Elseif/Else-structuur
De elseif-structuur maakt het mogelijk om meerdere voorwaarden achter elkaar te controleren. Hiermee kun je specifieke acties uitvoeren op basis van meerdere scenario’s.

Voorbeeld:

<?php
$cijfer = 7;

if ($cijfer >= 9) {
    echo "Uitstekend";
} elseif ($cijfer >= 7) {
    echo "Goed";
} elseif ($cijfer >= 5.5) {
    echo "Voldoende";
} else {
    echo "Onvoldoende";
}
?>
Hier wordt het cijfer gecontroleerd. Afhankelijk van de waarde wordt een andere boodschap weergegeven.

🔧 Praktische Oefening 3.2
Opdracht: Bouw een social media content moderatie systeem.

Maak een bestand content_moderatie.php:

<?php
$post_type = "video";
$leeftijd_gebruiker = 15;
$aantal_reports = 2;
$content_rating = "PG-13";
$is_verified = false;

echo "<h2>📱 Content Moderatie Systeem</h2>";
echo "<div style='background: #1a1a1a; color: white; padding: 25px; border-radius: 15px;'>";

// Check content rating
echo "<h3>🎬 Content Type: $post_type</h3>";

if ($content_rating === "G") {
    $leeftijd_vereist = 0;
    $status = "✅ Geschikt voor alle leeftijden";
    $kleur = "green";
} elseif ($content_rating === "PG") {
    $leeftijd_vereist = 8;
    $status = "⚠️ Ouderlijk toezicht aanbevolen";
    $kleur = "yellow";
} elseif ($content_rating === "PG-13") {
    $leeftijd_vereist = 13;
    $status = "⚠️ Mogelijk niet geschikt voor kinderen onder 13";
    $kleur = "orange";
} elseif ($content_rating === "R") {
    $leeftijd_vereist = 17;
    $status = "🔞 Beperkte content - 17+ vereist";
    $kleur = "red";
} else {
    $leeftijd_vereist = 18;
    $status = "🔞 Volwassen content - 18+ vereist";
    $kleur = "darkred";
}

echo "<p style='color: $kleur;'>$status</p>";

// Check gebruiker leeftijd
if ($leeftijd_gebruiker >= $leeftijd_vereist) {
    echo "<p>✅ Gebruiker ($leeftijd_gebruiker jaar) mag deze content zien</p>";
} else {
    $jaren_te_wachten = $leeftijd_vereist - $leeftijd_gebruiker;
    echo "<p>❌ Gebruiker te jong. Nog $jaren_te_wachten jaar te gaan.</p>";
}

// Check reports
if ($aantal_reports >= 10) {
    echo "<p>🚫 CONTENT VERWIJDERD - Te veel reports</p>";
} elseif ($aantal_reports >= 5) {
    echo "<p>⚠️ WAARSCHUWING - Content onder review</p>";
} elseif ($aantal_reports >= 1) {
    echo "<p>👁️ Gerapporteerd - In moderatie queue</p>";
} else {
    echo "<p>✅ Geen reports - Content OK</p>";
}

// Verified badge logica
if ($is_verified) {
    echo "<p>✓ Geverifieerd account - Verhoogde zichtbaarheid</p>";
} else {
    echo "<p>⭕ Niet geverifieerd - Standaard zichtbaarheid</p>";
}

echo "</div>";
?>
Uitbreiding:

Voeg extra content ratings toe
Implementeer een warning systeem
Maak verschillende regels voor verified accounts
3.2 Switch Statement
De switch-statement is een alternatief voor een lange if/elseif/else-structuur, vooral handig wanneer je één variabele hebt die je wilt vergelijken met meerdere specifieke waarden.

Voorbeeld:

<?php
$dag = "maandag";

switch ($dag) {
    case "maandag":
        echo "Start van de week!";
        break;
    case "vrijdag":
        echo "Bijna weekend!";
        break;
    case "zaterdag":
    case "zondag":
        echo "Weekend!";
        break;
    default:
        echo "Een normale dag.";
        break;
}
?>
In dit voorbeeld wordt de variabele $dag vergeleken met verschillende dagen van de week. break zorgt ervoor dat de switch-structuur stopt met zoeken zodra een match is gevonden.

⚠️ Belangrijk: Vergeet de break niet! Anders “valt” de code door naar de volgende case (dit heet “fall-through”).

🔧 Praktische Oefening 3.3
Opdracht: Bouw een gaming platform achievement systeem.

Maak een bestand achievement_systeem.php:

<?php
$achievement_type = "legendary";
$speler_naam = "ProGamer123";

echo "<h2>🏆 Achievement Unlocked!</h2>";
echo "<div style='background: linear-gradient(45deg, #f093fb 0%, #f5576c 100%); color: white; padding: 25px; border-radius: 15px;'>";

echo "<p>👤 Speler: $speler_naam</p>";

switch ($achievement_type) {
    case "common":
        $punten = 10;
        $badge = "🥉";
        $titel = "Beginner";
        $beloning = "50 coins";
        $rariteit = "Veel voorkomend";
        break;

    case "uncommon":
        $punten = 25;
        $badge = "🥈";
        $titel = "Gevorderd";
        $beloning = "100 coins";
        $rariteit = "Ongebruikelijk";
        break;

    case "rare":
        $punten = 50;
        $badge = "🥇";
        $titel = "Zeldzaam Talent";
        $beloning = "250 coins + Skin";
        $rariteit = "Zeldzaam";
        break;

    case "epic":
        $punten = 100;
        $badge = "💎";
        $titel = "Epic Gamer";
        $beloning = "500 coins + Exclusive Emote";
        $rariteit = "Episch";
        break;

    case "legendary":
        $punten = 250;
        $badge = "👑";
        $titel = "Legende";
        $beloning = "1000 coins + Legendary Skin + Title";
        $rariteit = "Legendarisch";
        break;

    case "mythic":
        $punten = 500;
        $badge = "⚡";
        $titel = "Mythic Champion";
        $beloning = "5000 coins + Full Battle Pass + Exclusive Avatar";
        $rariteit = "Mythisch";
        break;

    default:
        $punten = 5;
        $badge = "📝";
        $titel = "Onbekend";
        $beloning = "10 coins";
        $rariteit = "Onbekend";
        break;
}

echo "<div style='background: rgba(0,0,0,0.3); padding: 20px; border-radius: 10px; margin: 10px 0;'>";
echo "<h3>$badge $titel $badge</h3>";
echo "<p>🎯 Type: $rariteit</p>";
echo "<p>⭐ Punten verdiend: $punten XP</p>";
echo "<p>🎁 Beloning: $beloning</p>";
echo "</div>";

// Bonus: Totaal progress
$totaal_achievements = 50;
$verdiend_achievements = 23;
$progress_percentage = ($verdiend_achievements / $totaal_achievements) * 100;

echo "<h3>📊 Achievement Progress</h3>";
echo "<p>Totaal ontgrendeld: $verdiend_achievements / $totaal_achievements</p>";
echo "<p>Voortgang: " . round($progress_percentage, 1) . "%</p>";

echo "</div>";
?>
Experimenteer:

Verander $achievement_type naar verschillende waarden
Voeg je eigen achievement types toe
Wat gebeurt er als je een onbekend type invoert?
🔧 Praktische Oefening 3.4: Smart Home Controller
Opdracht: Maak een smart home apparaat controller met switch.

Maak een bestand smart_home.php:

<?php
$apparaat = "verwarming";
$commando = "aan";
$huidige_temp = 18;
$gewenste_temp = 21;

echo "<h2>🏠 Smart Home Controller</h2>";
echo "<div style='background: #2c3e50; color: white; padding: 25px; border-radius: 15px;'>";

switch ($apparaat) {
    case "verwarming":
        echo "<h3>🔥 Verwarming Control</h3>";
        echo "<p>Huidige temperatuur: {$huidige_temp}°C</p>";

        if ($commando === "aan") {
            if ($huidige_temp < $gewenste_temp) {
                echo "<p>✅ Verwarming ingeschakeld</p>";
                echo "<p>📈 Opwarmen naar {$gewenste_temp}°C...</p>";
            } else {
                echo "<p>ℹ️ Gewenste temperatuur al bereikt</p>";
            }
        } else {
            echo "<p>❌ Verwarming uitgeschakeld</p>";
        }
        break;

    case "lichten":
        echo "<h3>💡 Verlichting Control</h3>";
        if ($commando === "aan") {
            echo "<p>✅ Lichten ingeschakeld</p>";
            echo "<p>🌟 Helderheid: 100%</p>";
        } else {
            echo "<p>🌙 Lichten uitgeschakeld</p>";
        }
        break;

    case "beveiliging":
        echo "<h3>🔒 Beveiligingssysteem</h3>";
        if ($commando === "aan") {
            echo "<p>✅ Alarm geactiveerd</p>";
            echo "<p>📹 Camera's aan</p>";
            echo "<p>🚨 Bewegingsdetectie actief</p>";
        } else {
            echo "<p>🔓 Systeem gedeactiveerd</p>";
        }
        break;

    case "muziek":
        echo "<h3>🎵 Audio Systeem</h3>";
        if ($commando === "aan") {
            echo "<p>✅ Speakers ingeschakeld</p>";
            echo "<p>🔊 Volume: 60%</p>";
            echo "<p>🎼 Playlist: Chill Vibes</p>";
        } else {
            echo "<p>🔇 Audio uitgeschakeld</p>";
        }
        break;

    default:
        echo "<p>❌ Onbekend apparaat: $apparaat</p>";
        echo "<p>ℹ️ Beschikbare apparaten: verwarming, lichten, beveiliging, muziek</p>";
        break;
}

echo "</div>";
?>
3.3 Loops in PHP
Loops worden gebruikt om een blok code meerdere keren uit te voeren. PHP heeft vier belangrijke soorten loops: for, while, do...while, en foreach.

For-loop
De for-loop is handig wanneer je het aantal herhalingen vooraf weet. De syntax bestaat uit een initialisatie, een voorwaarde en een increment (stap).

Syntax:

for (initialisatie; voorwaarde; increment) {
    // Code die herhaald wordt
}
Voorbeeld:

<?php
for ($i = 1; $i <= 10; $i++) {
    echo "Nummer: $i<br>";
}
?>
Hier wordt $i bij elke herhaling met 1 verhoogd tot het 10 bereikt.

🔧 Praktische Oefening 3.5
Opdracht: Bouw een countdown timer voor een game launch.

Maak een bestand game_countdown.php:

<?php
echo "<h2>🎮 Game Launch Countdown</h2>";
echo "<div style='background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 25px; border-radius: 15px;'>";

echo "<h3>⏰ Countdown naar release:</h3>";

// Countdown van 10 naar 1
for ($i = 10; $i >= 1; $i--) {
    if ($i <= 3) {
        $kleur = "red";
        $grootte = "24px";
    } elseif ($i <= 5) {
        $kleur = "orange";
        $grootte = "20px";
    } else {
        $kleur = "white";
        $grootte = "16px";
    }

    echo "<p style='color: $kleur; font-size: $grootte; font-weight: bold;'>⏳ $i seconden...</p>";
}

echo "<h3 style='color: #00ff00; font-size: 28px;'>🚀 LAUNCHED! 🚀</h3>";

// Bonus: Vermenigvuldigingstabel
echo "<h3>📊 Damage Calculator (Combo multiplier)</h3>";
$base_damage = 50;

for ($combo = 1; $combo <= 5; $combo++) {
    $totaal_damage = $base_damage * $combo;
    $sterren = str_repeat("⭐", $combo);
    echo "<p>$sterren Combo x{$combo}: {$totaal_damage} damage</p>";
}

echo "</div>";
?>
While-loop
De while-loop blijft uitvoeren zolang de opgegeven voorwaarde waar is.

Syntax:

while (voorwaarde) {
    // Code die herhaald wordt
}
Voorbeeld:

<?php
$teller = 1;

while ($teller <= 5) {
    echo "Dit is nummer $teller<br>";
    $teller++;
}
?>
In dit voorbeeld wordt $teller bij elke herhaling met 1 verhoogd totdat het groter is dan 5.

🔧 Praktische Oefening 3.6
Opdracht: Simuleer een social media feed loader.

Maak een bestand feed_loader.php:

<?php
$posts_geladen = 0;
$totaal_posts = 15;
$posts_per_scroll = 3;

echo "<h2>📱 Social Media Feed Loader</h2>";
echo "<div style='background: #1a1a1a; color: white; padding: 25px; border-radius: 15px;'>";

echo "<h3>🔄 Loading posts...</h3>";

while ($posts_geladen < $totaal_posts) {
    $posts_geladen += $posts_per_scroll;

    if ($posts_geladen > $totaal_posts) {
        $posts_geladen = $totaal_posts;
    }

    $progress = ($posts_geladen / $totaal_posts) * 100;

    echo "<div style='background: rgba(100,100,100,0.3); padding: 15px; margin: 10px 0; border-radius: 10px;'>";
    echo "<p>📦 Batch geladen: $posts_geladen / $totaal_posts posts</p>";
    echo "<p>📊 Progress: " . round($progress, 1) . "%</p>";

    // Progress bar
    $progress_width = $progress;
    echo "<div style='background: #333; border-radius: 10px; overflow: hidden;'>";
    echo "<div style='background: linear-gradient(90deg, #00f5ff, #ff0050); width: {$progress_width}%; padding: 5px;'></div>";
    echo "</div>";
    echo "</div>";
}

echo "<p style='color: #00ff00; font-size: 20px;'>✅ Alle posts geladen!</p>";

// Bonus: Notifications check
echo "<h3>🔔 Notifications Scanner</h3>";
$notifications_te_checken = 8;
$notification_teller = 0;

while ($notification_teller < $notifications_te_checken) {
    $notification_teller++;

    // Simuleer verschillende soorten notifications
    $types = ["❤️ Like", "💬 Comment", "🔄 Share", "👤 Follow"];
    $type = $types[rand(0, count($types) - 1)];

    echo "<p>$type - Notification $notification_teller/$notifications_te_checken</p>";
}

echo "</div>";
?>
Do…While-loop
De do...while-loop werkt vergelijkbaar met de while-loop, maar voert het codeblok altijd minimaal één keer uit, zelfs als de voorwaarde aanvankelijk niet waar is.

Syntax:

do {
    // Code die herhaald wordt
} while (voorwaarde);
Voorbeeld:

<?php
$teller = 1;

do {
    echo "Dit is nummer $teller<br>";
    $teller++;
} while ($teller <= 3);
?>
Hier wordt de loop altijd minimaal één keer uitgevoerd.

🔧 Praktische Oefening 3.7
Opdracht: Maak een wachtwoord validator die blijft vragen.

Maak een bestand password_validator.php:

<?php
// Simulatie van meerdere wachtwoord pogingen
$pogingen = [
    "123456",      // Te kort
    "password",    // Te simpel
    "Welkom2024",  // Te voorspelbaar
    "S3cur3P@ss!"  // Goed!
];

$huidige_poging = 0;
$max_pogingen = count($pogingen);

echo "<h2>🔒 Wachtwoord Validatie Systeem</h2>";
echo "<div style='background: #2c3e50; color: white; padding: 25px; border-radius: 15px;'>";

echo "<p>ℹ️ Wachtwoord eisen:</p>";
echo "<ul>";
echo "<li>Minimaal 8 karakters</li>";
echo "<li>Minimaal 1 hoofdletter</li>";
echo "<li>Minimaal 1 cijfer</li>";
echo "<li>Minimaal 1 speciaal teken (!@#$%^&*)</li>";
echo "</ul>";

do {
    $wachtwoord = $pogingen[$huidige_poging];
    $huidige_poging++;

    echo "<div style='background: rgba(100,100,100,0.3); padding: 15px; margin: 15px 0; border-radius: 10px;'>";
    echo "<h3>🔍 Poging $huidige_poging/$max_pogingen</h3>";
    echo "<p>Ingevoerd: " . str_repeat("*", strlen($wachtwoord)) . " (" . strlen($wachtwoord) . " chars)</p>";

    $is_geldig = true;
    $fouten = [];

    // Check lengte
    if (strlen($wachtwoord) < 8) {
        $is_geldig = false;
        $fouten[] = "❌ Te kort (minimaal 8 karakters)";
    } else {
        echo "<p>✅ Lengte: OK</p>";
    }

    // Check hoofdletter
    if (!preg_match('/[A-Z]/', $wachtwoord)) {
        $is_geldig = false;
        $fouten[] = "❌ Geen hoofdletter gevonden";
    } else {
        echo "<p>✅ Hoofdletter: OK</p>";
    }

    // Check cijfer
    if (!preg_match('/[0-9]/', $wachtwoord)) {
        $is_geldig = false;
        $fouten[] = "❌ Geen cijfer gevonden";
    } else {
        echo "<p>✅ Cijfer: OK</p>";
    }

    // Check speciaal teken
    if (!preg_match('/[!@#$%^&*]/', $wachtwoord)) {
        $is_geldig = false;
        $fouten[] = "❌ Geen speciaal teken gevonden";
    } else {
        echo "<p>✅ Speciaal teken: OK</p>";
    }

    if (!$is_geldig) {
        echo "<div style='background: rgba(255,0,0,0.3); padding: 10px; border-radius: 5px; margin-top: 10px;'>";
        foreach ($fouten as $fout) {
            echo "<p>$fout</p>";
        }
        echo "</div>";
    }

    echo "</div>";

} while (!$is_geldig && $huidige_poging < $max_pogingen);

if ($is_geldig) {
    echo "<div style='background: rgba(0,255,0,0.3); padding: 20px; border-radius: 10px;'>";
    echo "<h3>✅ Wachtwoord geaccepteerd!</h3>";
    echo "<p>🔐 Je account is nu beveiligd</p>";
    echo "</div>";
} else {
    echo "<div style='background: rgba(255,0,0,0.3); padding: 20px; border-radius: 10px;'>";
    echo "<h3>❌ Maximaal aantal pogingen bereikt</h3>";
    echo "<p>🚫 Account tijdelijk vergrendeld</p>";
    echo "</div>";
}

echo "</div>";
?>
Foreach-loop
De foreach-loop is speciaal ontworpen voor het doorlopen van arrays. Hiermee kun je elk element in een array eenvoudig benaderen.

Syntax:

foreach ($array as $value) {
    // Code voor elk element
}

// Of met key en value:
foreach ($array as $key => $value) {
    // Code voor elk element met toegang tot key
}
Voorbeeld:

<?php
$namen = ["Lisa", "Jan", "Sophie"];

foreach ($namen as $naam) {
    echo "Hallo, $naam!<br>";
}
?>
De foreach-loop gaat door elk element van de array $namen en geeft elk element een waarde aan de variabele $naam.

🔧 Praktische Oefening 3.8
Opdracht: Bouw een Spotify-achtige playlist player.

Maak een bestand playlist_player.php:

<?php
$playlist = [
    [
        "titel" => "Blinding Lights",
        "artiest" => "The Weeknd",
        "duur" => "3:20",
        "genre" => "Pop",
        "jaar" => 2019,
        "streams" => 3500000000
    ],
    [
        "titel" => "Levitating",
        "artiest" => "Dua Lipa",
        "duur" => "3:23",
        "genre" => "Pop",
        "jaar" => 2020,
        "streams" => 2800000000
    ],
    [
        "titel" => "Starboy",
        "artiest" => "The Weeknd",
        "duur" => "3:50",
        "genre" => "R&B",
        "jaar" => 2016,
        "streams" => 2400000000
    ],
    [
        "titel" => "Don't Start Now",
        "artiest" => "Dua Lipa",
        "duur" => "3:03",
        "genre" => "Pop",
        "jaar" => 2019,
        "streams" => 2100000000
    ]
];

echo "<h2>🎵 Playlist Player</h2>";
echo "<div style='background: #1DB954; color: white; padding: 25px; border-radius: 15px;'>";

echo "<h3>📻 Now Playing: Study Vibes 📚</h3>";
echo "<p>Totaal aantal nummers: " . count($playlist) . "</p>";

$track_nummer = 1;
$totaal_streams = 0;

foreach ($playlist as $liedje) {
    // Format streams (miljarden)
    $streams_formatted = number_format($liedje["streams"] / 1000000000, 1) . "B";

    // Bepaal populariteit
    if ($liedje["streams"] > 3000000000) {
        $populariteit = "🔥 Viral Hit";
        $kleur = "#ff0000";
    } elseif ($liedje["streams"] > 2500000000) {
        $populariteit = "⭐ Super Popular";
        $kleur = "#ffff00";
    } else {
        $populariteit = "👍 Popular";
        $kleur = "#00ff00";
    }

    echo "<div style='background: rgba(0,0,0,0.3); padding: 15px; margin: 10px 0; border-radius: 10px;'>";
    echo "<p><strong>🎵 Track $track_nummer</strong></p>";
    echo "<p style='font-size: 18px;'><strong>" . $liedje["titel"] . "</strong></p>";
    echo "<p>👤 " . $liedje["artiest"] . "</p>";
    echo "<p>⏱️ " . $liedje["duur"] . " | 🎸 " . $liedje["genre"] . " | 📅 " . $liedje["jaar"] . "</p>";
    echo "<p>🎧 Streams: $streams_formatted</p>";
    echo "<p style='color: $kleur;'>$populariteit</p>";
    echo "</div>";

    $totaal_streams += $liedje["streams"];
    $track_nummer++;
}

// Playlist statistieken
$gemiddelde_streams = $totaal_streams / count($playlist);
echo "<div style='background: rgba(255,255,255,0.2); padding: 20px; border-radius: 10px; margin-top: 20px;'>";
echo "<h3>📊 Playlist Statistieken</h3>";
echo "<p>💿 Totaal tracks: " . count($playlist) . "</p>";
echo "<p>🎧 Totale streams: " . number_format($totaal_streams / 1000000000, 1) . "B</p>";
echo "<p>📈 Gemiddeld per track: " . number_format($gemiddelde_streams / 1000000000, 1) . "B</p>";
echo "</div>";

// Top artiest
echo "<h3>🏆 Top Artiest Analyse</h3>";
$artiest_count = [];

foreach ($playlist as $liedje) {
    $artiest = $liedje["artiest"];
    if (isset($artiest_count[$artiest])) {
        $artiest_count[$artiest]++;
    } else {
        $artiest_count[$artiest] = 1;
    }
}

foreach ($artiest_count as $artiest => $aantal) {
    $percentage = ($aantal / count($playlist)) * 100;
    echo "<p>👤 $artiest: $aantal tracks (" . round($percentage, 1) . "%)</p>";
}

echo "</div>";
?>
3.4 Break en Continue
Break Statement
break wordt gebruikt om uit een loop te breken, ongeacht of de conditie nog waar is.

<?php
for ($i = 1; $i <= 10; $i++) {
    if ($i === 5) {
        break; // Stop de loop bij 5
    }
    echo "Nummer: $i<br>";
}
// Output: 1, 2, 3, 4
?>
Continue Statement
continue slaat de huidige iteratie over en gaat direct naar de volgende.

<?php
for ($i = 1; $i <= 5; $i++) {
    if ($i === 3) {
        continue; // Sla 3 over
    }
    echo "Nummer: $i<br>";
}
// Output: 1, 2, 4, 5
?>
🔧 Praktische Oefening 3.9
Opdracht: Maak een content filter systeem.

Maak een bestand content_filter.php:

<?php
$berichten = [
    "Leuke dag gehad!",
    "Check mijn nieuwe post! spam spam spam",
    "Hallo allemaal 👋",
    "KOOP NU!!! GRATIS GELD!!!",
    "Weekend plannen? 🎉",
    "badword censuur test",
    "Lekker weer vandaag ☀️",
    "Click here voor gratis stuff",
    "Fijne avond!",
    "CAPS LOCK SPAM MESSAGE"
];

$spam_woorden = ["spam", "gratis", "koop nu", "click here"];
$verboden_woorden = ["badword", "censuur"];
$max_caps_percentage = 50; // Maximum 50% hoofdletters

echo "<h2>🛡️ Content Moderatie Filter</h2>";
echo "<div style='background: #2c3e50; color: white; padding: 25px; border-radius: 15px;'>";

$toegestaan = 0;
$geblokkeerd = 0;
$gewaarschuwd = 0;

foreach ($berichten as $index => $bericht) {
    $bericht_nummer = $index + 1;
    $is_spam = false;
    $is_verboden = false;
    $heeft_waarschuwing = false;
    $redenen = [];

    // Check voor verboden woorden (skip bericht)
    foreach ($verboden_woorden as $woord) {
        if (stripos($bericht, $woord) !== false) {
            $is_verboden = true;
            $redenen[] = "Verboden woord gedetecteerd";
            continue 2; // Skip naar volgend bericht
        }
    }

    // Check voor spam woorden
    foreach ($spam_woorden as $woord) {
        if (stripos(strtolower($bericht), $woord) !== false) {
            $is_spam = true;
            $redenen[] = "Spam woord: '$woord'";
        }
    }

    // Check voor excessive caps
    $uppercase_count = 0;
    $total_letters = 0;
    for ($i = 0; $i < strlen($bericht); $i++) {
        if (ctype_alpha($bericht[$i])) {
            $total_letters++;
            if (ctype_upper($bericht[$i])) {
                $uppercase_count++;
            }
        }
    }

    if ($total_letters > 0) {
        $caps_percentage = ($uppercase_count / $total_letters) * 100;
        if ($caps_percentage > $max_caps_percentage) {
            $heeft_waarschuwing = true;
            $redenen[] = "Te veel hoofdletters (" . round($caps_percentage) . "%)";
        }
    }

    // Display resultaat
    echo "<div style='padding: 15px; margin: 10px 0; border-radius: 10px;";

    if ($is_verboden) {
        echo "background: rgba(200,0,0,0.3); border: 2px solid red;'>";
        echo "<p><strong>❌ Bericht $bericht_nummer - GEBLOKKEERD</strong></p>";
        echo "<p style='text-decoration: line-through;'>$bericht</p>";
        $geblokkeerd++;
    } elseif ($is_spam) {
        echo "background: rgba(255,165,0,0.3); border: 2px solid orange;'>";
        echo "<p><strong>⚠️ Bericht $bericht_nummer - SPAM DETECTIE</strong></p>";
        echo "<p>$bericht</p>";
        $gewaarschuwd++;
    } elseif ($heeft_waarschuwing) {
        echo "background: rgba(255,255,0,0.2); border: 2px solid yellow;'>";
        echo "<p><strong>⚠️ Bericht $bericht_nummer - WAARSCHUWING</strong></p>";
        echo "<p>$bericht</p>";
        $gewaarschuwd++;
    } else {
        echo "background: rgba(0,255,0,0.2); border: 2px solid green;'>";
        echo "<p><strong>✅ Bericht $bericht_nummer - TOEGESTAAN</strong></p>";
        echo "<p>$bericht</p>";
        $toegestaan++;
    }

    if (!empty($redenen)) {
        echo "<p style='font-size: 12px; color: #ffcccc;'>Redenen: " . implode(", ", $redenen) . "</p>";
    }

    echo "</div>";
}

// Statistieken
$totaal = count($berichten);
echo "<div style='background: rgba(255,255,255,0.1); padding: 20px; border-radius: 10px; margin-top: 20px;'>";
echo "<h3>📊 Moderatie Statistieken</h3>";
echo "<p>✅ Toegestaan: $toegestaan/$totaal (" . round(($toegestaan/$totaal)*100) . "%)</p>";
echo "<p>⚠️ Gewaarschuwd: $gewaarschuwd/$totaal (" . round(($gewaarschuwd/$totaal)*100) . "%)</p>";
echo "<p>❌ Geblokkeerd: $geblokkeerd/$totaal (" . round(($geblokkeerd/$totaal)*100) . "%)</p>";
echo "</div>";

echo "</div>";
?>
3.5 Code-blokken met { }
In PHP (en veel andere programmeertalen) wordt gewerkt met code-blokken aangegeven met accolades { }. Accolades (ook wel curly-brackets / braces) geven aan welk stuk code hoort bij een bepaalde structuur, zoals een if-statement, for-loop, of functie en class. Alles wat binnen een set van accolades { ... } staat, vormt een zogenaamd code-blok. Dit blok wordt alleen uitgevoerd wanneer de conditie of structuur waaraan het verbonden is, wordt geactiveerd.

Waarom zijn Code-blokken met { } Belangrijk?
Organisatie en Leesbaarheid: Accolades helpen om de code georganiseerd en overzichtelijk te houden. Je kunt duidelijk zien welk deel van de code bij een if-statement, for-loop, of een functie hoort.

Scope (Bereik): Een code-blok bepaalt de scope van variabelen die erin worden gedeclareerd. Variabelen die binnen een code-blok zijn gedeclareerd, zijn meestal alleen binnen dat blok beschikbaar.

Meerdere Instructies Groeperen: Met { } kun je meerdere instructies samenvoegen in één blok. Zonder accolades voert PHP alleen de eerste regel code na een if, for, enz. uit, wat vaak ongewenst is.

Voorbeeld: If/Else met { }
Zonder Accolades (gevaarlijk!):

<?php
$leeftijd = 18;

if ($leeftijd >= 18)
    echo "Toegang verleend.";
    echo "Geniet van je bezoek!"; // Deze regel wordt ALTIJD uitgevoerd!
?>
In dit voorbeeld wordt de tweede regel altijd uitgevoerd, ongeacht de waarde van $leeftijd, omdat deze niet binnen het if-code-blok staat.

Met Accolades (correct):

<?php
$leeftijd = 18;

if ($leeftijd >= 18) {
    echo "Toegang verleend.";
    echo "Geniet van je bezoek!";
}
?>
Hier staan beide echo-statements binnen de accolades { }, wat betekent dat ze alleen worden uitgevoerd als de voorwaarde ($leeftijd >= 18) waar is.

Best Practices
✅ Gebruik ALTIJD accolades, zelfs bij één regel code:

if ($leeftijd >= 18) {
    echo "Toegang verleend.";
}
❌ Vermijd dit (ondanks dat het technisch kan):

if ($leeftijd >= 18)
    echo "Toegang verleend.";
3.6 Geneste Loops en Conditionals
Je kunt loops en conditionals in elkaar plaatsen (nesten) voor complexere logica.

🔧 Praktische Oefening 3.10
Opdracht: Maak een TikTok For You Page algoritme simulator.

Maak een bestand tiktok_algoritme.php:

<?php
$gebruikers = [
    [
        "naam" => "DanceQueen",
        "volgers" => 50000,
        "categorie" => "dans"
    ],
    [
        "naam" => "TechGuru",
        "volgers" => 75000,
        "categorie" => "educatie"
    ],
    [
        "naam" => "ComedyKing",
        "volgers" => 120000,
        "categorie" => "comedy"
    ]
];

$video_data = [
    [
        "creator" => "DanceQueen",
        "views" => 45000,
        "likes" => 8500,
        "comments" => 320,
        "shares" => 150,
        "watch_time" => 85 // percentage
    ],
    [
        "creator" => "TechGuru",
        "views" => 30000,
        "likes" => 12000,
        "comments" => 890,
        "shares" => 450,
        "watch_time" => 95
    ],
    [
        "creator" => "ComedyKing",
        "views" => 95000,
        "likes" => 15000,
        "comments" => 1200,
        "shares" => 890,
        "watch_time" => 78
    ]
];

echo "<h2>🎬 TikTok For You Page Algoritme</h2>";
echo "<div style='background: linear-gradient(45deg, #ff0050, #00f5ff); color: white; padding: 25px; border-radius: 15px;'>";

foreach ($video_data as $index => $video) {
    $video_nummer = $index + 1;

    echo "<div style='background: rgba(0,0,0,0.3); padding: 20px; margin: 15px 0; border-radius: 15px;'>";
    echo "<h3>📹 Video $video_nummer - @{$video['creator']}</h3>";

    // Vind creator info
    $creator_info = null;
    foreach ($gebruikers as $gebruiker) {
        if ($gebruiker["naam"] === $video["creator"]) {
            $creator_info = $gebruiker;
            break;
        }
    }

    if ($creator_info !== null) {
        echo "<p>👥 Volgers: " . number_format($creator_info["volgers"]) . "</p>";
        echo "<p>🎯 Categorie: {$creator_info['categorie']}</p>";
    }

    // Bereken engagement rate
    $engagement_rate = (($video["likes"] + $video["comments"] + $video["shares"]) / $video["views"]) * 100;

    echo "<h4>📊 Video Statistieken:</h4>";
    echo "<p>👁️ Views: " . number_format($video["views"]) . "</p>";
    echo "<p>❤️ Likes: " . number_format($video["likes"]) . "</p>";
    echo "<p>💬 Comments: " . number_format($video["comments"]) . "</p>";
    echo "<p>🔄 Shares: " . number_format($video["shares"]) . "</p>";
    echo "<p>⏱️ Avg Watch Time: {$video['watch_time']}%</p>";
    echo "<p>📈 Engagement Rate: " . round($engagement_rate, 2) . "%</p>";

    // Algoritme score berekening (geneste conditionals)
    $algoritme_score = 0;
    $boost_factoren = [];

    // Watch time score (belangrijkste factor)
    if ($video["watch_time"] >= 90) {
        $algoritme_score += 40;
        $boost_factoren[] = "⭐ Excellent watch time";
    } elseif ($video["watch_time"] >= 70) {
        $algoritme_score += 25;
        $boost_factoren[] = "👍 Good watch time";
    } else {
        $algoritme_score += 10;
    }

    // Engagement score
    if ($engagement_rate >= 20) {
        $algoritme_score += 30;
        $boost_factoren[] = "🔥 Viral engagement";
    } elseif ($engagement_rate >= 15) {
        $algoritme_score += 20;
        $boost_factoren[] = "📈 High engagement";
    } elseif ($engagement_rate >= 10) {
        $algoritme_score += 10;
    }

    // Shares boost (belangrijke virality indicator)
    $share_rate = ($video["shares"] / $video["views"]) * 100;
    if ($share_rate >= 1) {
        $algoritme_score += 20;
        $boost_factoren[] = "🚀 High share rate";
    } elseif ($share_rate >= 0.5) {
        $algoritme_score += 10;
    }

    // Creator boost
    if ($creator_info !== null) {
        if ($creator_info["volgers"] >= 100000) {
            $algoritme_score += 10;
            $boost_factoren[] = "👑 Large creator boost";
        } elseif ($creator_info["volgers"] >= 50000) {
            $algoritme_score += 5;
        }
    }

    // Voorspelling
    echo "<h4>🤖 Algoritme Analyse:</h4>";
    echo "<p><strong>Score: $algoritme_score/100</strong></p>";

    if (!empty($boost_factoren)) {
        echo "<p>Boost factoren:</p><ul>";
        foreach ($boost_factoren as $factor) {
            echo "<li>$factor</li>";
        }
        echo "</ul>";
    }

    // For You Page voorspelling
    if ($algoritme_score >= 80) {
        $voorspelling = "🔥 VIRAL - Top van For You Page";
        $kleur = "#00ff00";
    } elseif ($algoritme_score >= 60) {
        $voorspelling = "📈 Trending - Voor veel users";
        $kleur = "#ffff00";
    } elseif ($algoritme_score >= 40) {
        $voorspelling = "👍 Goed - Normale distributie";
        $kleur = "#ff8800";
    } else {
        $voorspelling = "📉 Low reach - Beperkte distributie";
        $kleur = "#ff0000";
    }

    echo "<div style='background: $kleur; color: black; padding: 15px; border-radius: 10px; margin-top: 10px;'>";
    echo "<strong>$voorspelling</strong>";
    echo "</div>";

    echo "</div>";
}

echo "</div>";
?>
3.7 Lab-opdrachten
📝 Lab-opdracht 3.1: Toegangscontrole
Opdracht: Schrijf een script dat de leeftijd van een gebruiker controleert en een boodschap toont op basis van hun leeftijd.

Maak een bestand toegang.php
Declareer een variabele $leeftijd met een willekeurige waarde
Gebruik een if/elseif/else-structuur om de volgende berichten te tonen:
18 jaar of ouder: “Toegang verleend.”
16-17 jaar: “Bijna volwassen.”
Onder 16 jaar: “Sorry, geen toegang.”
Codevoorbeeld:

<?php
$leeftijd = 17;
$message = null;

// je code hier

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toegangscontrole</title>
</head>
<body>
    <p><?php echo $message ?></p>
</body>
</html>
📝 Lab-opdracht 3.2: Dagen van de Week
Opdracht: Gebruik een switch-structuur om een boodschap weer te geven op basis van de huidige dag.

Maak een bestand dag_van_de_week.php
Declareer een variabele $dag en geef deze een waarde van een dag (bijvoorbeeld “woensdag”)
Gebruik een switch-statement om de volgende berichten te tonen:
Maandag: “De week begint.”
Woensdag: “Midden van de week!”
Vrijdag: “Bijna weekend.”
Zaterdag of Zondag: “Geniet van het weekend.”
Andere dagen: “Een normale dag.”
Codevoorbeeld:

<?php
$dag = "vrijdag";
$message = null;

// je code hier

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dag van de Week</title>
</head>
<body>
    <p><?php echo $message ?></p>
</body>
</html>
📝 Lab-opdracht 3.3: Tafel van 5 met een For-loop
Opdracht: Schrijf een PHP-script dat de tafel van 5 toont met behulp van een for-loop.

Maak een bestand tafel_van_5.php
Gebruik een for-loop om de tafel van 5 tot 10 keer 5 weer te geven
Codevoorbeeld:

<?php
// maak de for-loop werkend
for ($i = 1; $i <= 10; $i++) {
    echo "<p>5 x $i = " . (5 * $i) . "</p>";
}
?>
📝 Lab-opdracht 3.4: Countdown met een While-loop
Opdracht: Maak een countdown van 10 naar 1 met behulp van een while-loop.

Maak een bestand countdown.php
Gebruik een while-loop om af te tellen van 10 naar 1 en toon elk nummer
Codevoorbeeld:

<?php
$teller = 10;

// pas de voorwaarde voor de while loop aan
while ($teller >= 1) {
    echo "<p>Countdown: $teller</p>";
    $teller--;
}
?>
📝 Lab-opdracht 3.5: Lijst met Namen met een Foreach-loop
Opdracht: Maak een script dat een array met namen doorloopt en voor elke naam een welkomstboodschap toont.

Maak een bestand welkom.php
Declareer een array $namen met ten minste drie namen
Gebruik een foreach-loop om voor elke naam een welkomstbericht te tonen
Codevoorbeeld:

<?php
$namen = ["Lisa", "Jan", "Sophie"];

// maak de code hier af
foreach ($namen as $naam) {
    echo "<p>Welkom, $naam!</p>";
}
?>
3.8 Eindopdrachten
📝 Opdracht 1 ⭐: Netflix Serie Binge Tracker
Doel: Maak een tracker die bijhoudt hoeveel afleveringen je hebt gekeken.

Eisen:

Gebruik een for-loop om afleveringen te simuleren
Gebruik if/else voor pauze momenten
Toon progress bar
Bereken totale kijktijd
Bestand: netflix_tracker.php

Startcode:

<?php
// Serie informatie
$serie_naam = "Stranger Things";
$seizoen = 4;
$totaal_afleveringen = 9;
$aflevering_duur = 50; // in minuten

echo "<h2>📺 Netflix Binge Tracker</h2>";
echo "<div style='background: #E50914; color: white; padding: 25px; border-radius: 15px;'>";
echo "<h3>▶️ Nu kijkend: $serie_naam - Seizoen $seizoen</h3>";

// TODO: Gebruik een for-loop om door alle afleveringen te loopen
// Loop van 1 tot $totaal_afleveringen
for ($aflevering = 1; $aflevering <= $totaal_afleveringen; $aflevering++) {

    // TODO: Toon de afleveringsinformatie
    // echo "<p>Aflevering $aflevering...</p>";

    // TODO: Bereken progress percentage
    // $progress = ($aflevering / $totaal_afleveringen) * 100;

    // TODO: Gebruik if/else voor pauze waarschuwingen
    // Als je 3 afleveringen hebt gekeken, toon waarschuwing "Misschien tijd voor een pauze?"
    // Als je 5 afleveringen hebt gekeken, toon waarschuwing "Nog steeds kijken? Beweeg je benen!"

    // TODO: Bereken totale kijktijd tot nu toe
    // $totale_tijd = $aflevering * $aflevering_duur;
    // echo "<p>⏱️ Totale kijktijd: $totale_tijd minuten</p>";
}

// TODO: Toon eindstatistieken
// - Totaal aantal gekeken afleveringen
// - Totale kijktijd in uren en minuten
// - Compliment bericht als je alle afleveringen hebt gekeken

echo "</div>";
?>
Stappen:

Maak de for-loop werkend die door alle afleveringen loopt
Bereken voor elke aflevering het progress percentage
Voeg if/else statements toe voor pauze waarschuwingen na 3 en 5 afleveringen
Bereken de totale kijktijd en toon deze in uren en minuten
Voeg styling toe met verschillende kleuren voor waarschuwingen
📝 Opdracht 2 ⭐⭐: Instagram Story Viewer
Doel: Simuleer een Instagram story viewer met meerdere gebruikers en stories.

Eisen:

Geneste foreach loops (gebruikers en hun stories)
switch voor verschillende story types (foto/video/poll)
Progress tracking
View statistieken
Bestand: instagram_stories.php

Startcode:

<?php
// Gebruikers met hun stories
$gebruikers = [
    [
        "username" => "travel_girl",
        "profiel_foto" => "👧",
        "stories" => [
            ["type" => "foto", "inhoud" => "🏖️ Beach vibes"],
            ["type" => "video", "inhoud" => "🌊 Sunset timelapse"],
            ["type" => "poll", "inhoud" => "☀️ Beach or Mountains?"]
        ]
    ],
    [
        "username" => "foodie_nl",
        "profiel_foto" => "👨‍🍳",
        "stories" => [
            ["type" => "foto", "inhoud" => "🍕 Pizza time"],
            ["type" => "foto", "inhoud" => "🍰 Dessert heaven"]
        ]
    ],
    [
        "username" => "fitness_pro",
        "profiel_foto" => "💪",
        "stories" => [
            ["type" => "video", "inhoud" => "🏋️ Workout routine"],
            ["type" => "poll", "inhoud" => "💪 Gym or Home workout?"],
            ["type" => "foto", "inhoud" => "🥗 Meal prep"]
        ]
    ]
];

echo "<h2>📱 Instagram Stories</h2>";
echo "<div style='background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); color: white; padding: 25px; border-radius: 15px;'>";

// TODO: Gebruik een foreach loop om door alle gebruikers te loopen
// foreach ($gebruikers as $gebruiker) { ... }

    // TODO: Toon gebruikersinformatie
    // echo "<h3>{$gebruiker['profiel_foto']} @{$gebruiker['username']}</h3>";

    // TODO: Tel het aantal stories
    // $aantal_stories = count($gebruiker['stories']);

    // TODO: Gebruik een geneste foreach loop om door de stories te loopen
    // foreach ($gebruiker['stories'] as $index => $story) { ... }

        // TODO: Gebruik een switch statement voor verschillende story types
        // switch ($story['type']) {
        //     case "foto":
        //         // Toon foto icoon en timer (5 seconden)
        //         break;
        //     case "video":
        //         // Toon video icoon en timer (15 seconden)
        //         break;
        //     case "poll":
        //         // Toon poll icoon en interactie opties
        //         break;
        // }

        // TODO: Bereken en toon progress (story X van Y)
        // $story_nummer = $index + 1;
        // echo "Story $story_nummer/$aantal_stories";

// TODO: Toon totaal aantal bekeken stories
// TODO: Bereken totale view tijd

echo "</div>";
?>
Stappen:

Maak de buitenste foreach loop die door alle gebruikers loopt
Maak de binnenste foreach loop die door de stories van elke gebruiker loopt
Implementeer het switch statement voor verschillende story types (foto/video/poll)
Voeg voor elk type een andere timer toe (foto: 5sec, video: 15sec, poll: 10sec)
Bereken en toon het progress nummer (story 1/3, 2/3, etc.)
Voeg view count tracking toe
📝 Opdracht 3 ⭐⭐⭐: Game Achievement Unlocker
Doel: Bouw een complex achievement systeem voor een game.

Eisen:

Verschillende achievement types (common, rare, legendary)
Progress tracking met loops
Geneste conditionals voor unlock voorwaarden
break en continue voor special cases
XP en level system
Bestand: achievement_system.php

Startcode:

<?php
// Speler statistieken
$speler = [
    "naam" => "ProGamer123",
    "level" => 15,
    "xp" => 3450,
    "gespeelde_uren" => 87,
    "kills" => 523,
    "deaths" => 145,
    "wins" => 34,
    "losses" => 21,
    "headshots" => 156
];

// Achievement lijst
$achievements = [
    [
        "naam" => "First Blood",
        "beschrijving" => "Behaal je eerste kill",
        "type" => "common",
        "vereiste" => ["kills" => 1],
        "xp_reward" => 100,
        "unlocked" => false
    ],
    [
        "naam" => "Kill Streak",
        "beschrijving" => "Behaal 100 kills",
        "type" => "uncommon",
        "vereiste" => ["kills" => 100],
        "xp_reward" => 250,
        "unlocked" => false
    ],
    [
        "naam" => "Headshot Master",
        "beschrijving" => "50 headshots",
        "type" => "rare",
        "vereiste" => ["headshots" => 50],
        "xp_reward" => 500,
        "unlocked" => false
    ],
    [
        "naam" => "Legendary Warrior",
        "beschrijving" => "Level 15 + 500 kills + 30 wins",
        "type" => "legendary",
        "vereiste" => ["level" => 15, "kills" => 500, "wins" => 30],
        "xp_reward" => 1000,
        "unlocked" => false
    ],
    [
        "naam" => "Weekend Warrior",
        "beschrijving" => "Speel 24 uur in één weekend",
        "type" => "epic",
        "vereiste" => ["gespeelde_uren" => 24],
        "xp_reward" => 750,
        "unlocked" => false
    ],
    [
        "naam" => "Comeback King",
        "beschrijving" => "Win ratio boven 60%",
        "type" => "rare",
        "vereiste" => ["custom" => "win_rate"],
        "xp_reward" => 600,
        "unlocked" => false
    ]
];

echo "<h2>🏆 Achievement System</h2>";
echo "<div style='background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 25px; border-radius: 15px;'>";

echo "<h3>👤 Speler: {$speler['naam']}</h3>";
echo "<p>⭐ Level {$speler['level']} | 💎 {$speler['xp']} XP</p>";

$totaal_unlocked = 0;
$totaal_xp_verdiend = 0;

// TODO: Loop door alle achievements met foreach
// foreach ($achievements as $achievement) { ... }

    // TODO: Check of de achievement unlocked moet worden
    // Gebruik een flag variabele: $kan_unlocken = true;

    // TODO: Loop door alle vereisten van deze achievement
    // foreach ($achievement['vereiste'] as $stat => $waarde) { ... }

        // TODO: Special case: custom vereisten met switch
        // if ($stat === "custom") {
        //     switch ($waarde) {
        //         case "win_rate":
        //             // Bereken win rate en check of > 60%
        //             break;
        //     }
        // }

        // TODO: Check normale vereisten
        // if ($speler[$stat] < $waarde) {
        //     $kan_unlocken = false;
        //     break; // Stop met checken als één eis niet voldaan is
        // }

    // TODO: Als unlocked is, gebruik continue om naar volgende achievement te gaan
    // if ($achievement['unlocked']) { continue; }

    // TODO: Als kan_unlocken true is, unlock de achievement
    // if ($kan_unlocken) {
    //     $achievement['unlocked'] = true;
    //     $totaal_unlocked++;
    //     $totaal_xp_verdiend += $achievement['xp_reward'];
    // }

    // TODO: Toon achievement status met verschillende styling per type
    // Gebruik switch voor kleuren:
    // common = grijs, uncommon = groen, rare = blauw, epic = paars, legendary = goud

// TODO: Bereken totaal percentage unlocked achievements
// TODO: Toon statistieken (X van Y unlocked, totaal XP verdiend)

echo "</div>";
?>
Stappen:

Loop door alle achievements met foreach
Voor elke achievement, check alle vereisten met een geneste loop
Gebruik een boolean $kan_unlocken die op false gaat als een eis niet voldaan is
Gebruik break om te stoppen met checken zodra één eis niet voldaan is
Gebruik continue om unlocked achievements over te slaan
Implementeer custom vereisten met een switch statement (bijv. win rate berekening)
Gebruik geneste if/else voor verschillende achievement types en styling
Bereken eindstatistieken (percentage unlocked, totaal XP)
📝 Opdracht 4 ⭐⭐⭐⭐: E-commerce Product Filter Systeem
Doel: Maak een geavanceerd product filter en sorting systeem zoals op webshops.

Eisen:

Complexe filtering met geneste loops en conditionals
Meerdere filter criteria (prijs, categorie, rating, merk)
Sorting algoritmen (prijs, populariteit, naam)
switch voor sorting opties
Pagination simulatie
Search functionaliteit
Bestand: product_filter.php

Startcode:

<?php
$producten = [
    [
        "naam" => "iPhone 15 Pro",
        "prijs" => 1199,
        "categorie" => "Smartphones",
        "merk" => "Apple",
        "rating" => 4.8,
        "voorraad" => 15,
        "korting" => 10,
        "verkocht" => 523
    ],
    [
        "naam" => "Samsung Galaxy S24",
        "prijs" => 999,
        "categorie" => "Smartphones",
        "merk" => "Samsung",
        "rating" => 4.6,
        "voorraad" => 23,
        "korting" => 5,
        "verkocht" => 412
    ],
    [
        "naam" => "MacBook Pro 14",
        "prijs" => 2299,
        "categorie" => "Laptops",
        "merk" => "Apple",
        "rating" => 4.9,
        "voorraad" => 8,
        "korting" => 0,
        "verkocht" => 267
    ],
    [
        "naam" => "Dell XPS 15",
        "prijs" => 1599,
        "categorie" => "Laptops",
        "merk" => "Dell",
        "rating" => 4.5,
        "voorraad" => 12,
        "korting" => 15,
        "verkocht" => 198
    ],
    [
        "naam" => "iPad Air",
        "prijs" => 699,
        "categorie" => "Tablets",
        "merk" => "Apple",
        "rating" => 4.7,
        "voorraad" => 0,
        "korting" => 0,
        "verkocht" => 789
    ],
    [
        "naam" => "Sony WH-1000XM5",
        "prijs" => 399,
        "categorie" => "Audio",
        "merk" => "Sony",
        "rating" => 4.8,
        "voorraad" => 34,
        "korting" => 20,
        "verkocht" => 1245
    ],
    [
        "naam" => "AirPods Pro",
        "prijs" => 279,
        "categorie" => "Audio",
        "merk" => "Apple",
        "rating" => 4.6,
        "voorraad" => 45,
        "korting" => 0,
        "verkocht" => 2134
    ],
    [
        "naam" => "Google Pixel 8",
        "prijs" => 799,
        "categorie" => "Smartphones",
        "merk" => "Google",
        "rating" => 4.4,
        "voorraad" => 18,
        "korting" => 10,
        "verkocht" => 334
    ]
];

// Filter instellingen (pas deze aan om te testen)
$filter_categorie = ""; // leeg = alle categorieën
$filter_merk = ""; // leeg = alle merken
$filter_min_prijs = 0;
$filter_max_prijs = 3000;
$filter_min_rating = 0.0;
$filter_alleen_voorraad = true; // true = alleen producten op voorraad
$filter_met_korting = false; // true = alleen producten met korting
$sort_by = "prijs_oplopend"; // opties: prijs_oplopend, prijs_aflopend, rating, populariteit, naam_az

echo "<h2>🛒 Product Filter Systeem</h2>";
echo "<div style='background: #2c3e50; color: white; padding: 25px; border-radius: 15px;'>";

// Toon actieve filters
echo "<h3>🔍 Actieve Filters:</h3>";
echo "<div style='background: rgba(255,255,255,0.1); padding: 15px; border-radius: 10px; margin: 10px 0;'>";
// TODO: Toon welke filters actief zijn
echo "</div>";

// STAP 1: FILTERING
$gefilterde_producten = [];

// TODO: Loop door alle producten
// foreach ($producten as $product) { ... }

    // TODO: Maak een boolean $voldoet_aan_filters = true;

    // TODO: Check categorie filter (als niet leeg)
    // if ($filter_categorie !== "" && $product['categorie'] !== $filter_categorie) {
    //     $voldoet_aan_filters = false;
    // }

    // TODO: Check merk filter (als niet leeg)

    // TODO: Check prijs range
    // if ($product['prijs'] < $filter_min_prijs || $product['prijs'] > $filter_max_prijs) {
    //     $voldoet_aan_filters = false;
    // }

    // TODO: Check rating

    // TODO: Check voorraad (als filter_alleen_voorraad true is)
    // if ($filter_alleen_voorraad && $product['voorraad'] <= 0) {
    //     continue; // Skip dit product
    // }

    // TODO: Check korting filter

    // TODO: Als product voldoet aan alle filters, voeg toe aan $gefilterde_producten
    // if ($voldoet_aan_filters) {
    //     $gefilterde_producten[] = $product;
    // }

// STAP 2: SORTING
// TODO: Gebruik een switch statement om te sorteren op basis van $sort_by
// switch ($sort_by) {
//     case "prijs_oplopend":
//         // Sorteer $gefilterde_producten op prijs (laag naar hoog)
//         // Hint: gebruik een for loop met bubble sort of array functies
//         break;
//     case "prijs_aflopend":
//         // Sorteer prijs (hoog naar laag)
//         break;
//     case "rating":
//         // Sorteer op rating (hoog naar laag)
//         break;
//     case "populariteit":
//         // Sorteer op verkocht aantal (hoog naar laag)
//         break;
//     case "naam_az":
//         // Sorteer alfabetisch
//         break;
// }

// STAP 3: RESULTS DISPLAY
$aantal_resultaten = count($gefilterde_producten);

echo "<h3>📊 Resultaten: $aantal_resultaten producten gevonden</h3>";

// TODO: Check of er resultaten zijn
// if ($aantal_resultaten === 0) {
//     // Toon "geen producten gevonden" bericht
// } else {
    // TODO: Loop door gefilterde en gesorteerde producten
    // foreach ($gefilterde_producten as $product) {

        // TODO: Bereken korting prijs als er korting is
        // $prijs_na_korting = $product['prijs'];
        // if ($product['korting'] > 0) {
        //     $prijs_na_korting = $product['prijs'] * (1 - $product['korting'] / 100);
        // }

        // TODO: Bepaal voorraad status met if/else
        // if ($product['voorraad'] > 20) { $status = "✅ Op voorraad"; }
        // elseif ($product['voorraad'] > 0) { $status = "⚠️ Beperkte voorraad"; }
        // else { $status = "❌ Uitverkocht"; }

        // TODO: Toon product card met styling
        // Inclusief: naam, merk, prijs (doorgestreept als korting), rating, voorraad status
    // }
// }

echo "</div>";
?>
Stappen:

Implementeer de filter logica:
Loop door alle producten
Check elke filter voorwaarde met if statements
Gebruik continue om producten die niet voldoen over te slaan
Voeg voldoende producten toe aan $gefilterde_producten array
Implementeer sorting met switch statement:
Maak een switch die alle sort opties afhandelt
Voor elke case, sorteer de array anders
Tip: gebruik geneste for loops voor bubble sort of bekijk usort()
Display de resultaten:
Check eerst of er resultaten zijn (gebruik if/else)
Loop door gefilterde producten met foreach
Bereken kortingsprijzen met if statements
Toon voorraad status met if/elseif/else
Gebruik verschillende kleuren per voorraad status
Extra uitdaging:
Voeg een zoekfunctie toe (filter op productnaam)
Implementeer pagination (toon 4 producten per pagina)
Tel hoeveel producten per filter voldoen
3.9 Samenvatting
🎉 Gefeliciteerd! Je hebt alle belangrijke controle structuren en loops in PHP geleerd!

Wat heb je geleerd?
✅ Controle Structuren

if/else/elseif voor beslissingen maken
switch voor meerdere specifieke waarden
Vergelijkingsoperatoren (==, !=, >, <, >=, <=)
Logische operatoren (&&, ||, !)
✅ Loops

for loop voor bekende aantal herhalingen
while loop voor onbekende aantal herhalingen
do...while loop voor minimaal één iteratie
foreach loop voor arrays
✅ Geavanceerde Technieken

break om loops te stoppen
continue om iteraties over te slaan
Geneste loops en conditionals
Code-blokken en scope
✅ Best Practices

Altijd accolades gebruiken
Duidelijke variabelenamen
Commentaar bij complexe logica
DRY principe (Don’t Repeat Yourself)
Veelgemaakte Fouten
❌ Vergeten break in switch:

switch ($dag) {
    case "maandag":
        echo "Start week";
        // FOUT: geen break, valt door naar volgende case!
    case "dinsdag":
        echo "Dag 2";
        break;
}
❌ Oneindige loop:

$i = 0;
while ($i < 10) {
    echo $i;
    // FOUT: $i wordt nooit verhoogd!
}
❌ Off-by-one errors:

// Let op array indices starten bij 0!
for ($i = 1; $i < count($array); $i++) {
    // Mist eerste element!
}
Volgende Stappen
In hoofdstuk 4 gaan we verder met:

Functies maken en gebruiken
Parameters en return values
Variable scope
Built-in PHP functies
Bronnen
📚 Officiële Documentatie
PHP Control Structures - Officiële PHP documentatie over controle structuren
PHP Loops - Uitgebreide informatie over loops
PHP Arrays - Arrays en foreach loop
🎓 Tutorials en Leermateriaal
W3Schools PHP If…Else - Interactieve voorbeelden
W3Schools PHP Switch - Switch statement tutorial
W3Schools PHP Loops - Alle loop types uitgelegd
PHP The Right Way - Control Structures - Best practices
Codecademy PHP Course - Interactieve lessen
🛠️ Online Tools
PHP Sandbox - Test je loops en conditionals online
3v4l.org - Test code op verschillende PHP versies
PHP Fiddle - Snel code experimenteren
OnlineGDB PHP - Online PHP compiler met debugging
📱 Mobile Learning Apps
SoloLearn PHP - Leer loops op je telefoon
Mimo - 5 minuten per dag oefenen
Programming Hub - PHP tutorials voor beginners
Enki App - Dagelijkse coding challenges
🎮 Interactieve Oefeningen
Codewars PHP - Loop challenges
HackerRank PHP - Programming challenges
LeetCode - Algoritme oefeningen
Exercism PHP Track - Mentored learning
🇳🇱 Nederlandse Bronnen
Sitepoint PHP - Nederlandse artikelen
PHP.nl Forum - Nederlandse community
YouTube: “PHP Loops Nederlands” - Video tutorials
Programmeren.org - Nederlandse uitleg
📖 Aanbevolen Boeken
“Learning PHP, MySQL & JavaScript” - Robin Nixon
“Modern PHP” - Josh Lockhart
“PHP Objects, Patterns, and Practice” - Matt Zandstra
“PHP Cookbook” - David Sklar & Adam Trachtenberg
💡 Extra Resources
PHP Fig Standards - Coding standards
Awesome PHP - Curated lijst van resources
PHP Weekly - Nieuwsbrief met updates
🆘 Hulp Krijgen
Stack Overflow PHP Tag - Q&A community
Reddit r/PHPhelp - Vraag om hulp
PHP Discord - Real-time chat
Laracasts Forum - Actieve community
Je docent en medestudenten - Altijd de beste eerste keuze!
🔍 Cheat Sheets
PHP Control Structures Cheat Sheet - Snelle referentie
PHP Loop Cheat Sheet - Loops overzicht
DevHints PHP - Complete PHP cheat sheet
💪 Keep Coding! Blijf oefenen met loops en conditionals - ze vormen de basis van bijna alle programming logic!

© 2025 ROC-Midden Nederland – ICT-College – Amersfoort, Nederland

MBO Niveau 4 - Software Developer

PHP Tutorials – Controle Structuren en Loops in PHP

PHP Tutorial
ROC ICA Logo
H4-Arrays in PHP

Hoofdstuk 4: Arrays in PHP
In dit hoofdstuk duiken we in een belangrijk onderdeel van PHP: arrays. Arrays maken het mogelijk om meerdere waarden in één variabele op te slaan, wat vooral nuttig is wanneer je een lijst met gegevens wilt beheren. Dit is essentieel voor moderne webapplicaties waar je vaak met collecties van data werkt - van gebruikerslijsten tot productcatalogi.

Wat ga je leren?

Wat arrays zijn en waarom ze belangrijk zijn
Indexed arrays voor geordende lijsten
Associative arrays voor key-value data
Multidimensional arrays voor complexe structuren
Belangrijke array functies in PHP
Arrays debuggen met print_r() en var_dump()
Praktische toepassingen in real-world scenario’s
💡 Let op: Dit hoofdstuk bouwt voort op hoofdstuk 1, 2 en 3. Zorg dat je variabelen, datatypen en loops begrijpt voordat je verder gaat!

4.1 Wat zijn Arrays?
Een array is een verzameling van waarden die je in één enkele variabele kunt opslaan. In plaats van aparte variabelen te maken voor gerelateerde data, groepeer je deze in een array.

Waarom Arrays Gebruiken?
Zonder arrays:

<?php
$student1 = "Lisa";
$student2 = "Jan";
$student3 = "Sophie";
$student4 = "Ahmed";
// Dit wordt snel onoverzichtelijk!
?>
Met een array:

<?php
$studenten = ["Lisa", "Jan", "Sophie", "Ahmed"];
// Veel overzichtelijker en makkelijker te beheren!
?>
Soorten Arrays in PHP
PHP heeft drie hoofdtypen arrays:

Indexed Arrays – Arrays met numerieke indexen (0, 1, 2…)
Associative Arrays – Arrays met tekstuele sleutels (“naam”, “leeftijd”…)
Multidimensional Arrays – Arrays die andere arrays bevatten
4.2 Indexed Arrays
In een indexed array heeft elk element een numerieke index die automatisch bij 0 begint. Dit is het meest basale type array.

Een Indexed Array Maken
Er zijn twee manieren om een indexed array te maken:

Methode 1: Short array syntax (modern, aanbevolen):

<?php
$kleuren = ["rood", "blauw", "groen"];
?>
Methode 2: array() functie (oudere syntax):

<?php
$kleuren = array("rood", "blauw", "groen");
?>
💡 Best practice: Gebruik de short syntax [] - deze is moderner en sneller te typen!

💼 Engels als Standaard in de Wereld van Programmeren
Belangrijk voor je carrière: In professionele ontwikkelomgevingen is Engels de universele taal voor code. Dit geldt ook voor arrays!

Waarom Engels?

Internationale teams - Samenwerken met developers wereldwijd
Code delen - Open source en teamprojecten
Bedrijfsstandaard - Vrijwel alle bedrijven gebruiken Engels in code
Documentatie - Alle PHP docs en frameworks zijn in Engels
Leesbaarheid - Engels is vaak korter en duidelijker
Vergelijking Nederlands vs Engels:

<?php
// ❌ Nederlands (alleen voor leren)
$studenten = ["Lisa", "Jan", "Sophie"];
$productPrijzen = [100, 250, 75];
$gebruikersGegevens = [
    "naam" => "Lisa",
    "leeftijd" => 21,
    "woonplaats" => "Amsterdam"
];

// ✅ Engels (professionele standaard)
$students = ["Lisa", "Jan", "Sophie"];
$productPrices = [100, 250, 75];
$userData = [
    "name" => "Lisa",
    "age" => 21,
    "city" => "Amsterdam"
];
?>
Veel voorkomende Engelse array namen:

$users / $customers - Gebruikers/klanten
$products / $items - Producten/items
$orders - Bestellingen
$categories - Categorieën
$settings / $config - Instellingen
$results - Resultaten
$errors - Foutmeldingen
$data - Algemene data
$list / $collection - Lijst/collectie
Tips voor keys in associative arrays:

name in plaats van naam
age in plaats van leeftijd
email in plaats van emailadres
price in plaats van prijs
total in plaats van totaal
created_at in plaats van aangemaakt_op
💡 Praktische tip: Begin nu al met Engels! In de voorbeelden zul je vaak Nederlands zien voor duidelijkheid tijdens het leren, maar probeer vanaf je eerste echte projecten Engels te gebruiken.

Toegang tot Array Elementen
Je gebruikt de index tussen vierkante haken om een element te benaderen:

<?php
$kleuren = ["rood", "blauw", "groen"];

echo $kleuren[0]; // Toont: rood
echo $kleuren[1]; // Toont: blauw
echo $kleuren[2]; // Toont: groen
?>
Belangrijk: Array indexen beginnen bij 0, niet bij 1!

Eerste element: $array[0]
Tweede element: $array[1]
Derde element: $array[2]
🔧 Praktische Oefening 4.1
Opdracht: Maak een top 5 favoriete games lijst.

Maak een bestand top_games.php:

<?php
$top_games = [
    "The Legend of Zelda",
    "Minecraft",
    "Elden Ring",
    "Red Dead Redemption 2",
    "Cyberpunk 2077"
];

echo "<h2>🎮 Mijn Top 5 Games</h2>";
echo "<div style='background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 15px;'>";

echo "<h3>🥇 #1: " . $top_games[0] . "</h3>";
echo "<h3>🥈 #2: " . $top_games[1] . "</h3>";
echo "<h3>🥉 #3: " . $top_games[2] . "</h3>";
echo "<p>4: " . $top_games[3] . "</p>";
echo "<p>5: " . $top_games[4] . "</p>";

echo "</div>";
?>
Experimenteer:

Vervang de games door je eigen favorieten
Voeg een 6e game toe
Probeer element [5] te tonen - wat gebeurt er?
Elementen Toevoegen aan een Indexed Array
Er zijn meerdere manieren om elementen toe te voegen:

Methode 1: Lege brackets (voegt toe aan het einde):

<?php
$dieren = ["kat", "hond"];
$dieren[] = "vogel";  // Voeg toe aan het einde
$dieren[] = "vis";
print_r($dieren);
// Array ( [0] => kat [1] => hond [2] => vogel [3] => vis )
?>
Methode 2: Specifieke index:

<?php
$getallen = [1, 2, 3];
$getallen[3] = 4;  // Voeg toe op positie 3
$getallen[10] = 100; // Maakt gaten in de array!
print_r($getallen);
// Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [10] => 100 )
?>
⚠️ Let op: Als je een index overslaat, maakt PHP automatisch lege plekken!

Elementen Wijzigen
Je kunt bestaande elementen wijzigen door een nieuwe waarde toe te kennen:

<?php
$scores = [100, 250, 180];
echo "Oude score: " . $scores[1]; // 250

$scores[1] = 300; // Wijzig score
echo "Nieuwe score: " . $scores[1]; // 300
?>
🔧 Praktische Oefening 4.2
Opdracht: Bouw een shopping cart systeem.

Maak een bestand shopping_cart.php:

<?php
$cart = [];

// Voeg producten toe
$cart[] = "iPhone 15";
$cart[] = "AirPods Pro";
$cart[] = "MacBook Air";

echo "<h2>🛒 Winkelwagen</h2>";
echo "<div style='background: #2c3e50; color: white; padding: 25px; border-radius: 15px;'>";

echo "<h3>📦 Producten in winkelwagen:</h3>";
echo "<ul>";
echo "<li>Product 1: " . $cart[0] . "</li>";
echo "<li>Product 2: " . $cart[1] . "</li>";
echo "<li>Product 3: " . $cart[2] . "</li>";
echo "</ul>";

// Wijzig een product
$cart[1] = "AirPods Max";
echo "<p>⚠️ Product 2 gewijzigd naar: " . $cart[1] . "</p>";

// Voeg nog een product toe
$cart[] = "Apple Watch";
echo "<p>✅ Nieuw product toegevoegd: " . $cart[3] . "</p>";

$totaal_items = count($cart);
echo "<h3>Totaal items: $totaal_items</h3>";

echo "</div>";
?>
4.3 Associative Arrays
Een associative array gebruikt tekstuele sleutels (keys) in plaats van numerieke indexen. Dit maakt je data veel leesbaarder en betekenisvoller.

Een Associative Array Maken
Je gebruikt de => operator om een sleutel aan een waarde te koppelen:

<?php
$persoon = [
    "naam" => "Lisa",
    "leeftijd" => 21,
    "stad" => "Amsterdam",
    "opleiding" => "Software Development"
];
?>
Toegang tot Elementen
Je gebruikt de sleutel (tussen quotes!) om een waarde op te halen:

<?php
$persoon = [
    "naam" => "Lisa",
    "leeftijd" => 21,
    "stad" => "Amsterdam"
];

echo $persoon["naam"];     // Toont: Lisa
echo $persoon["leeftijd"]; // Toont: 21
echo $persoon["stad"];     // Toont: Amsterdam
?>
Elementen Toevoegen en Wijzigen
<?php
$persoon = [
    "naam" => "Lisa",
    "leeftijd" => 21
];

// Nieuw element toevoegen
$persoon["beroep"] = "student";
$persoon["email"] = "lisa@example.com";

// Element wijzigen
$persoon["leeftijd"] = 22;

print_r($persoon);
?>
🔧 Praktische Oefening 4.3
Opdracht: Maak een social media profiel.

Maak een bestand social_profile.php:

<?php
$profiel = [
    "username" => "techgirl_nl",
    "volgers" => 1523,
    "volgend" => 432,
    "posts" => 156,
    "bio" => "💻 Software Development Student | 📱 Tech Enthusiast",
    "geverifieerd" => true,
    "account_type" => "public"
];

echo "<h2>📱 Social Media Profiel</h2>";
echo "<div style='background: linear-gradient(45deg, #f093fb 0%, #f5576c 100%); color: white; padding: 25px; border-radius: 15px;'>";

echo "<h3>@{$profiel['username']}";
if ($profiel['geverifieerd']) {
    echo " ✓";
}
echo "</h3>";

echo "<p>{$profiel['bio']}</p>";

echo "<div style='display: flex; gap: 20px; margin: 20px 0;'>";
echo "<div><strong>{$profiel['posts']}</strong><br>Posts</div>";
echo "<div><strong>{$profiel['volgers']}</strong><br>Volgers</div>";
echo "<div><strong>{$profiel['volgend']}</strong><br>Volgend</div>";
echo "</div>";

echo "<p>📊 Account type: {$profiel['account_type']}</p>";

// Voeg nieuwe velden toe
$profiel['laatste_post'] = "2 uur geleden";
$profiel['locatie'] = "Nederland";

echo "<p>📍 Locatie: {$profiel['locatie']}</p>";
echo "<p>🕒 Laatste post: {$profiel['laatste_post']}</p>";

echo "</div>";
?>
Uitbreiding:

Voeg meer profiel velden toe
Maak een “edit profiel” functie
Bereken engagement rate
4.4 Multidimensional Arrays
Een multidimensional array is een array die andere arrays bevat. Dit is ideaal voor complexe datastructuren zoals tabellen, gebruikerslijsten met details, of productcatalogi.

Een 2D Array Maken
<?php
$studenten = [
    ["Lisa", 21, "Amsterdam"],
    ["Jan", 19, "Rotterdam"],
    ["Sophie", 20, "Utrecht"]
];

// Toegang: [rij][kolom]
echo $studenten[0][0]; // Lisa
echo $studenten[0][1]; // 21
echo $studenten[1][0]; // Jan
?>
Multidimensional Associative Arrays
De meest praktische vorm combineert beide typen:

<?php
$gebruikers = [
    [
        "naam" => "Lisa",
        "leeftijd" => 21,
        "rol" => "admin",
        "actief" => true
    ],
    [
        "naam" => "Jan",
        "leeftijd" => 19,
        "rol" => "gebruiker",
        "actief" => true
    ],
    [
        "naam" => "Sophie",
        "leeftijd" => 20,
        "rol" => "moderator",
        "actief" => false
    ]
];

// Toegang tot data
echo $gebruikers[0]["naam"];  // Lisa
echo $gebruikers[1]["rol"];   // gebruiker
echo $gebruikers[2]["actief"]; // false (leeg)
?>
🔧 Praktische Oefening 4.4
Opdracht: Bouw een Netflix-achtige serie database.

Maak een bestand netflix_database.php:

<?php
$series = [
    [
        "titel" => "Stranger Things",
        "seizoenen" => 4,
        "genre" => "Sci-Fi Horror",
        "rating" => 8.7,
        "jaar" => 2016,
        "cast" => ["Millie Bobby Brown", "Finn Wolfhard", "Winona Ryder"]
    ],
    [
        "titel" => "The Crown",
        "seizoenen" => 6,
        "genre" => "Drama",
        "rating" => 8.6,
        "jaar" => 2016,
        "cast" => ["Claire Foy", "Olivia Colman", "Imelda Staunton"]
    ],
    [
        "titel" => "Wednesday",
        "seizoenen" => 2,
        "genre" => "Comedy Horror",
        "rating" => 8.1,
        "jaar" => 2022,
        "cast" => ["Jenna Ortega", "Emma Myers", "Catherine Zeta-Jones"]
    ]
];

echo "<h2>🎬 Netflix Series Database</h2>";
echo "<div style='background: #E50914; color: white; padding: 25px; border-radius: 15px;'>";

foreach ($series as $index => $serie) {
    $serie_nummer = $index + 1;

    echo "<div style='background: rgba(0,0,0,0.3); padding: 20px; margin: 15px 0; border-radius: 10px;'>";
    echo "<h3>$serie_nummer. {$serie['titel']} ({$serie['jaar']})</h3>";
    echo "<p>🎭 Genre: {$serie['genre']}</p>";
    echo "<p>📺 Seizoenen: {$serie['seizoenen']}</p>";
    echo "<p>⭐ Rating: {$serie['rating']}/10</p>";

    echo "<p>👥 Cast:</p>";
    echo "<ul>";
    foreach ($serie['cast'] as $acteur) {
        echo "<li>$acteur</li>";
    }
    echo "</ul>";

    // Rating badge
    if ($serie['rating'] >= 8.5) {
        $badge = "🔥 Must Watch!";
        $kleur = "#00ff00";
    } elseif ($serie['rating'] >= 8.0) {
        $badge = "👍 Highly Rated";
        $kleur = "#ffff00";
    } else {
        $badge = "👌 Good";
        $kleur = "#ff8800";
    }

    echo "<p style='color: $kleur;'><strong>$badge</strong></p>";
    echo "</div>";
}

echo "</div>";
?>
4.5 Array Functies in PHP
PHP heeft tientallen ingebouwde functies voor het werken met arrays. Hier zijn de belangrijkste:

count() - Tel Elementen
<?php
$fruits = ["appel", "banaan", "peer", "druif"];
$aantal = count($fruits);
echo "Er zijn $aantal vruchten"; // Er zijn 4 vruchten
?>
array_push() - Voeg Toe aan Einde
<?php
$stack = ["rood", "groen"];
array_push($stack, "blauw", "geel");
print_r($stack);
// Array ( [0] => rood [1] => groen [2] => blauw [3] => geel )
?>
💡 Tip: $array[] = $value is sneller dan array_push() voor één element!

array_pop() - Verwijder Laatste Element
<?php
$stack = ["rood", "groen", "blauw"];
$laatste = array_pop($stack);
echo $laatste; // blauw
print_r($stack); // Array ( [0] => rood [1] => groen )
?>
array_shift() - Verwijder Eerste Element
<?php
$queue = ["eerste", "tweede", "derde"];
$eerste = array_shift($queue);
echo $eerste; // eerste
print_r($queue); // Array ( [0] => tweede [1] => derde )
?>
array_unshift() - Voeg Toe aan Begin
<?php
$queue = ["tweede", "derde"];
array_unshift($queue, "eerste");
print_r($queue); // Array ( [0] => eerste [1] => tweede [2] => derde )
?>
array_merge() - Combineer Arrays
<?php
$groep1 = ["Lisa", "Jan"];
$groep2 = ["Sophie", "Ahmed"];
$alle_studenten = array_merge($groep1, $groep2);
print_r($alle_studenten);
// Array ( [0] => Lisa [1] => Jan [2] => Sophie [3] => Ahmed )
?>
in_array() - Check of Waarde Bestaat
<?php
$kleuren = ["rood", "groen", "blauw"];

if (in_array("groen", $kleuren)) {
    echo "Groen gevonden!";
} else {
    echo "Groen niet gevonden";
}
?>
array_search() - Vind Index van Waarde
<?php
$namen = ["Lisa", "Jan", "Sophie"];
$positie = array_search("Jan", $namen);
echo "Jan staat op positie $positie"; // Jan staat op positie 1
?>
array_reverse() - Keer Array Om
<?php
$getallen = [1, 2, 3, 4, 5];
$omgekeerd = array_reverse($getallen);
print_r($omgekeerd); // Array ( [0] => 5 [1] => 4 [2] => 3 [3] => 2 [4] => 1 )
?>
sort() en rsort() - Sorteer Array
<?php
$getallen = [3, 1, 4, 1, 5, 9];

sort($getallen);  // Sorteer oplopend
print_r($getallen); // Array ( [0] => 1 [1] => 1 [2] => 3 [3] => 4 [4] => 5 [5] => 9 )

rsort($getallen); // Sorteer aflopend
print_r($getallen); // Array ( [0] => 9 [1] => 5 [2] => 4 [3] => 3 [4] => 1 [5] => 1 )
?>
🔧 Praktische Oefening 4.5
Opdracht: Maak een to-do list manager.

Maak een bestand todo_manager.php:

<?php
$todos = ["Code schrijven", "Testen", "Documentatie"];

echo "<h2>✅ To-Do List Manager</h2>";
echo "<div style='background: #2c3e50; color: white; padding: 25px; border-radius: 15px;'>";

echo "<h3>📝 Huidige taken (" . count($todos) . "):</h3>";
echo "<ol>";
foreach ($todos as $todo) {
    echo "<li>$todo</li>";
}
echo "</ol>";

// Voeg nieuwe taken toe
echo "<h3>➕ Taken toevoegen:</h3>";
array_push($todos, "Code review", "Deployment");
echo "<p>✅ 2 nieuwe taken toegevoegd</p>";

// Toon updated lijst
echo "<h3>📋 Updated lijst (" . count($todos) . "):</h3>";
echo "<ol>";
foreach ($todos as $index => $todo) {
    echo "<li>$todo</li>";
}
echo "</ol>";

// Verwijder eerste taak (voltooid)
$voltooid = array_shift($todos);
echo "<h3>🎉 Taak voltooid en verwijderd:</h3>";
echo "<p style='color: #00ff00;'>✓ $voltooid</p>";

// Check of specifieke taak bestaat
$zoek_taak = "Testen";
if (in_array($zoek_taak, $todos)) {
    $positie = array_search($zoek_taak, $todos);
    echo "<p>🔍 '$zoek_taak' gevonden op positie " . ($positie + 1) . "</p>";
}

// Toon finale lijst
echo "<h3>📌 Resterende taken (" . count($todos) . "):</h3>";
echo "<ol>";
foreach ($todos as $todo) {
    echo "<li>$todo</li>";
}
echo "</ol>";

echo "</div>";
?>
4.6 Arrays Debuggen: print_r() en var_dump()
Bij het werken met arrays is het vaak lastig om direct te zien wat er precies in een array zit. PHP biedt hiervoor twee handige functies: print_r() en var_dump().

print_r() - Leesbare Output
De print_r() functie toont de inhoud van een array op een leesbare manier:

<?php
$kleuren = ["rood", "blauw", "groen"];
print_r($kleuren);
?>
Output:

Array
(
    [0] => rood
    [1] => blauw
    [2] => groen
)
Met associative array:

<?php
$persoon = [
    "naam" => "Lisa",
    "leeftijd" => 21,
    "stad" => "Amsterdam"
];
print_r($persoon);
?>
Output:

Array
(
    [naam] => Lisa
    [leeftijd] => 21
    [stad] => Amsterdam
)
var_dump() - Gedetailleerde Informatie
De var_dump() functie geeft meer gedetailleerde informatie, inclusief datatypes en lengtes:

<?php
$kleuren = ["rood", "blauw", "groen"];
var_dump($kleuren);
?>
Output:

array(3) {
  [0]=> string(4) "rood"
  [1]=> string(5) "blauw"
  [2]=> string(5) "groen"
}
Met mixed datatypes:

<?php
$data = [
    "naam" => "Lisa",
    "leeftijd" => 21,
    "student" => true,
    "cijfer" => 8.5
];
var_dump($data);
?>
Output:

array(4) {
  ["naam"]=> string(4) "Lisa"
  ["leeftijd"]=> int(21)
  ["student"]=> bool(true)
  ["cijfer"]=> float(8.5)
}
Wanneer Welke Gebruiken?
Functie	Gebruik voor	Voordeel
print_r()	Snel overzicht van structuur	Compacter, makkelijker te lezen
var_dump()	Debuggen en type checking	Toont datatypes en lengtes
💡 Pro tip: Bij gebruik van Xdebug (zie Extra hoofdstuk) krijgt var_dump() automatisch mooie opmaak met kleuren!

HTML Formatting voor Debugging
Voor betere leesbaarheid in de browser:

<?php
$data = ["item1", "item2", "item3"];

echo "<pre>";
print_r($data);
echo "</pre>";

// Of:
echo "<pre>";
var_dump($data);
echo "</pre>";
?>
De <pre> tag behoudt de witruimte en maakt de output veel leesbaarder.

🔧 Praktische Oefening 4.6
Opdracht: Debug een complex array.

Maak een bestand array_debugger.php:

<?php
$webshop_data = [
    "winkel" => "TechStore",
    "producten" => [
        [
            "id" => 1,
            "naam" => "Laptop",
            "prijs" => 999.99,
            "voorraad" => 5,
            "specs" => ["RAM" => "16GB", "SSD" => "512GB"]
        ],
        [
            "id" => 2,
            "naam" => "Muis",
            "prijs" => 29.99,
            "voorraad" => 50,
            "specs" => ["DPI" => "16000", "Buttons" => 8]
        ]
    ],
    "actief" => true,
    "verzendkosten" => 5.95
];

echo "<h2>🐛 Array Debugger</h2>";
echo "<div style='background: #1a1a1a; color: #00ff00; padding: 25px; border-radius: 15px; font-family: monospace;'>";

echo "<h3>📋 print_r() output:</h3>";
echo "<pre>";
print_r($webshop_data);
echo "</pre>";

echo "<hr style='border-color: #333;'>";

echo "<h3>🔍 var_dump() output:</h3>";
echo "<pre>";
var_dump($webshop_data);
echo "</pre>";

echo "</div>";

// Praktisch gebruik in debugging
echo "<div style='background: #2c3e50; color: white; padding: 20px; margin-top: 20px; border-radius: 10px;'>";
echo "<h3>🎯 Praktisch voorbeeld - Data extractie:</h3>";
echo "<p>Winkel naam: {$webshop_data['winkel']}</p>";
echo "<p>Eerste product: {$webshop_data['producten'][0]['naam']}</p>";
echo "<p>Laptop RAM: {$webshop_data['producten'][0]['specs']['RAM']}</p>";
echo "<p>Winkel actief: " . ($webshop_data['actief'] ? "Ja" : "Nee") . "</p>";
echo "</div>";
?>
Experimenteer:

Voeg meer producten toe
Wijzig datastructuur
Gebruik var_dump() om types te controleren
4.7 Lab-opdrachten voor Arrays
📝 Lab-opdracht 4.1: Favoriete Dieren Lijst
Opdracht: Maak een script met je favoriete dieren en geef elk dier weer.

Maak een bestand favoriete_dieren.php
Maak een indexed array $dieren met minimaal 5 dieren
Gebruik een foreach-loop om elk dier te tonen
Startcode:

<?php
$dieren = ["kat", "hond", "papegaai", "konijn", "goudvis"];

echo "<h2>🐾 Mijn Favoriete Dieren</h2>";

// TODO: Gebruik een foreach loop om elk dier te tonen
// foreach ($dieren as $dier) {
//     echo "<p>Ik hou van: $dier</p>";
// }
?>
Resultaat: Toont “Ik hou van: kat”, “Ik hou van: hond”, etc.

📝 Lab-opdracht 4.2: Persoonlijke Gegevens
Opdracht: Maak een associative array met persoonlijke informatie.

Maak een bestand persoonlijke_gegevens.php
Maak een associative array $gegevens met: naam, leeftijd, woonplaats, opleiding
Toon alle gegevens met echo
Startcode:

<?php
$gegevens = [
    "naam" => "Emma",
    "leeftijd" => 22,
    "woonplaats" => "Utrecht",
    "opleiding" => "Software Development"
];

echo "<h2>👤 Persoonlijke Gegevens</h2>";

// TODO: Toon alle gegevens
// echo "<p>Naam: " . $gegevens["naam"] . "</p>";
// echo "<p>Leeftijd: " . $gegevens["leeftijd"] . "</p>";
// etc...
?>
📝 Lab-opdracht 4.3: Product Inventaris
Opdracht: Beheer een productvoorraad met array functies.

Maak een bestand inventaris.php
Start met een lege array $producten
Voeg 3 producten toe met array_push()
Tel en toon het aantal producten
Verwijder het laatste product met array_pop()
Startcode:

<?php
$producten = [];

echo "<h2>📦 Product Inventaris</h2>";

// TODO: Voeg producten toe
// array_push($producten, "Laptop", "Muis", "Toetsenbord");

// TODO: Tel producten
// $aantal = count($producten);
// echo "<p>Aantal producten: $aantal</p>";

// TODO: Toon alle producten met foreach

// TODO: Verwijder laatste product
// $verwijderd = array_pop($producten);
// echo "<p>Verwijderd: $verwijderd</p>";
?>
4.8 Eindopdrachten
📝 Opdracht 1 ⭐: Spotify Playlist Manager
Doel: Maak een eenvoudige playlist manager.

Eisen:

Indexed array met minimaal 5 liedjes
Toon alle liedjes met een loop
Tel het aantal liedjes
Voeg een nieuw liedje toe
Verwijder het eerste liedje
Bestand: playlist_manager.php

Startcode:

<?php
$playlist = [
    "Blinding Lights - The Weeknd",
    "Levitating - Dua Lipa",
    "Starboy - The Weeknd",
    "Don't Start Now - Dua Lipa",
    "Save Your Tears - The Weeknd"
];

echo "<h2>🎵 Spotify Playlist Manager</h2>";
echo "<div style='background: #1DB954; color: white; padding: 25px; border-radius: 15px;'>";

// TODO: Toon alle liedjes met foreach
// foreach ($playlist as $index => $liedje) {
//     $nummer = $index + 1;
//     echo "<p>$nummer. $liedje</p>";
// }

// TODO: Tel aantal liedjes
// $aantal = count($playlist);
// echo "<h3>Totaal: $aantal liedjes</h3>";

// TODO: Voeg nieuw liedje toe
// array_push($playlist, "Nieuw Liedje - Artiest");

// TODO: Verwijder eerste liedje
// $verwijderd = array_shift($playlist);
// echo "<p>Afgespeeld en verwijderd: $verwijderd</p>";

echo "</div>";
?>
Bonus:

Voeg een shuffle functie toe
Toon afspeeltijd (simuleer met random getallen)
Maak een “Afgespeeld” lijst
📝 Opdracht 2 ⭐⭐: Instagram Posts Dashboard
Doel: Maak een dashboard met social media posts.

Eisen:

Multidimensional array met minimaal 3 posts
Elke post heeft: gebruikersnaam, likes, comments, tijdstip, inhoud
Toon alle posts in een loop
Bereken totaal aantal likes
Vind post met meeste likes
Bestand: instagram_dashboard.php

Startcode:

<?php
$posts = [
    [
        "gebruiker" => "techgirl_nl",
        "likes" => 342,
        "comments" => 28,
        "tijd" => "2 uur geleden",
        "inhoud" => "Check mijn nieuwe project! 💻",
        "locatie" => "Amsterdam"
    ],
    [
        "gebruiker" => "travel_boy",
        "likes" => 891,
        "comments" => 54,
        "tijd" => "5 uur geleden",
        "inhoud" => "Sunset vibes 🌅",
        "locatie" => "Bali"
    ],
    [
        "gebruiker" => "foodie_adam",
        "likes" => 523,
        "comments" => 39,
        "tijd" => "1 dag geleden",
        "inhoud" => "Best pizza in town! 🍕",
        "locatie" => "Rotterdam"
    ]
];

echo "<h2>📱 Instagram Dashboard</h2>";
echo "<div style='background: linear-gradient(45deg, #f093fb 0%, #f5576c 100%); color: white; padding: 25px; border-radius: 15px;'>";

$totaal_likes = 0;
$meeste_likes = 0;
$populairste_post = "";

// TODO: Loop door alle posts
// foreach ($posts as $post) {
//     // Toon post details
//     echo "<div style='background: rgba(0,0,0,0.3); padding: 15px; margin: 10px 0; border-radius: 10px;'>";
//     echo "<h3>@{$post['gebruiker']}</h3>";
//     echo "<p>{$post['inhoud']}</p>";
//     echo "<p>📍 {$post['locatie']}</p>";
//     echo "<p>❤️ {$post['likes']} likes | 💬 {$post['comments']} comments</p>";
//     echo "<p>🕐 {$post['tijd']}</p>";
//     echo "</div>";
//
//     // Tel totaal likes
//     $totaal_likes += $post['likes'];
//
//     // Vind populairste post
//     if ($post['likes'] > $meeste_likes) {
//         $meeste_likes = $post['likes'];
//         $populairste_post = $post['gebruiker'];
//     }
// }

// TODO: Toon statistieken
// echo "<h3>📊 Statistieken</h3>";
// echo "<p>Totaal likes: $totaal_likes</p>";
// echo "<p>Populairste post: @$populairste_post met $meeste_likes likes</p>";

echo "</div>";
?>
📝 Opdracht 3 ⭐⭐⭐: E-commerce Product Catalogus
Doel: Bouw een complete productcatalogus met filter en sort functionaliteit.

Eisen:

Multidimensional associative array met minimaal 5 producten
Elk product heeft: naam, prijs, categorie, rating, voorraad
Filter op categorie
Sorteer op prijs (laag naar hoog)
Toon alleen producten op voorraad
Bereken totale voorraadwaarde
Bestand: product_catalogus.php

Startcode:

<?php
$producten = [
    [
        "naam" => "iPhone 15 Pro",
        "prijs" => 1199,
        "categorie" => "Smartphones",
        "rating" => 4.8,
        "voorraad" => 15,
        "merk" => "Apple"
    ],
    [
        "naam" => "Samsung Galaxy S24",
        "prijs" => 999,
        "categorie" => "Smartphones",
        "rating" => 4.6,
        "voorraad" => 23,
        "merk" => "Samsung"
    ],
    [
        "naam" => "MacBook Pro 14",
        "prijs" => 2299,
        "categorie" => "Laptops",
        "rating" => 4.9,
        "voorraad" => 8,
        "merk" => "Apple"
    ],
    [
        "naam" => "Dell XPS 15",
        "prijs" => 1599,
        "categorie" => "Laptops",
        "rating" => 4.5,
        "voorraad" => 12,
        "merk" => "Dell"
    ],
    [
        "naam" => "iPad Air",
        "prijs" => 699,
        "categorie" => "Tablets",
        "rating" => 4.7,
        "voorraad" => 0,
        "merk" => "Apple"
    ]
];

$filter_categorie = "Smartphones"; // Pas aan om te filteren

echo "<h2>🛒 Product Catalogus</h2>";
echo "<div style='background: #2c3e50; color: white; padding: 25px; border-radius: 15px;'>";

echo "<h3>🔍 Filter: $filter_categorie</h3>";

// TODO: Filter producten op categorie
$gefilterde_producten = [];
// foreach ($producten as $product) {
//     if ($product['categorie'] === $filter_categorie) {
//         $gefilterde_producten[] = $product;
//     }
// }

// TODO: Sorteer op prijs (laag naar hoog)
// Gebruik een simpele bubble sort of bekijk usort()

// TODO: Toon gefilterde en gesorteerde producten
// foreach ($gefilterde_producten as $product) {
//     if ($product['voorraad'] > 0) {
//         echo "<div style='background: rgba(255,255,255,0.1); padding: 15px; margin: 10px 0; border-radius: 10px;'>";
//         echo "<h4>{$product['naam']}</h4>";
//         echo "<p>💶 €{$product['prijs']}</p>";
//         echo "<p>⭐ Rating: {$product['rating']}/5</p>";
//         echo "<p>📦 Voorraad: {$product['voorraad']}</p>";
//         echo "<p>🏷️ {$product['merk']}</p>";
//         echo "</div>";
//     }
// }

// TODO: Bereken statistieken
// - Totaal aantal producten op voorraad
// - Totale voorraadwaarde
// - Gemiddelde prijs
// - Hoogste en laagste prijs

echo "</div>";
?>
Uitdaging:

Voeg meerdere filters toe (merk, prijs range)
Implementeer search functionaliteit
Maak een “Meest populair” sectie (hoogste rating)
📝 Opdracht 4 ⭐⭐⭐⭐: Student Management System
Doel: Bouw een compleet student management systeem.

Eisen:

Array met minimaal 5 studenten
Elke student heeft: naam, studentnummer, cijfers (array), aanwezigheid (%)
Bereken gemiddeld cijfer per student
Bepaal of student slaagt (gemiddelde >= 5.5 EN aanwezigheid >= 75%)
Vind beste en slechtste student
Toon top 3 studenten
Bereken klasgemiddelde
Tel aantal geslaagde vs gezakte studenten
Bestand: student_management.php

Startcode:

<?php
$studenten = [
    [
        "naam" => "Lisa de Vries",
        "studentnummer" => "SD001",
        "cijfers" => [8.5, 7.2, 9.0, 8.0, 7.5],
        "aanwezigheid" => 92
    ],
    [
        "naam" => "Jan Bakker",
        "studentnummer" => "SD002",
        "cijfers" => [6.0, 5.5, 6.5, 7.0, 6.2],
        "aanwezigheid" => 85
    ],
    [
        "naam" => "Sophie Jansen",
        "studentnummer" => "SD003",
        "cijfers" => [9.0, 8.5, 9.5, 9.0, 8.8],
        "aanwezigheid" => 98
    ],
    [
        "naam" => "Ahmed Hassan",
        "studentnummer" => "SD004",
        "cijfers" => [5.0, 4.5, 5.5, 6.0, 5.2],
        "aanwezigheid" => 70
    ],
    [
        "naam" => "Emma Visser",
        "studentnummer" => "SD005",
        "cijfers" => [7.5, 8.0, 7.0, 8.5, 7.8],
        "aanwezigheid" => 88
    ]
];

echo "<h2>🎓 Student Management System</h2>";
echo "<div style='background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 25px; border-radius: 15px;'>";

$totaal_klasgemiddelde = 0;
$geslaagd_count = 0;
$gezakt_count = 0;
$beste_gemiddelde = 0;
$beste_student = "";

// TODO: Loop door alle studenten
// foreach ($studenten as $student) {
//     // Bereken gemiddeld cijfer
//     $totaal_cijfers = 0;
//     foreach ($student['cijfers'] as $cijfer) {
//         $totaal_cijfers += $cijfer;
//     }
//     $gemiddelde = $totaal_cijfers / count($student['cijfers']);
//
//     // Bepaal status (geslaagd/gezakt)
//     $geslaagd = false;
//     if ($gemiddelde >= 5.5 && $student['aanwezigheid'] >= 75) {
//         $geslaagd = true;
//         $geslaagd_count++;
//         $status = "✅ Geslaagd";
//         $kleur = "#00ff00";
//     } else {
//         $gezakt_count++;
//         $status = "❌ Gezakt";
//         $kleur = "#ff0000";
//
//         // Bepaal reden
//         if ($gemiddelde < 5.5) {
//             $reden = "(Gemiddelde te laag)";
//         } else {
//             $reden = "(Aanwezigheid te laag)";
//         }
//     }
//
//     // Toon student info
//     echo "<div style='background: rgba(0,0,0,0.3); padding: 20px; margin: 15px 0; border-radius: 10px;'>";
//     echo "<h3>{$student['naam']}</h3>";
//     echo "<p>🔢 Studentnummer: {$student['studentnummer']}</p>";
//     echo "<p>📊 Cijfers: " . implode(", ", $student['cijfers']) . "</p>";
//     echo "<p>📈 Gemiddelde: " . round($gemiddelde, 2) . "</p>";
//     echo "<p>📅 Aanwezigheid: {$student['aanwezigheid']}%</p>";
//     echo "<p style='color: $kleur; font-weight: bold;'>$status";
//     if (!$geslaagd) {
//         echo " $reden";
//     }
//     echo "</p>";
//     echo "</div>";
//
//     // Track beste student
//     if ($gemiddelde > $beste_gemiddelde) {
//         $beste_gemiddelde = $gemiddelde;
//         $beste_student = $student['naam'];
//     }
//
//     $totaal_klasgemiddelde += $gemiddelde;
// }

// TODO: Bereken en toon klasstatistieken
// $klasgemiddelde = $totaal_klasgemiddelde / count($studenten);
// $slaagpercentage = ($geslaagd_count / count($studenten)) * 100;

// echo "<div style='background: rgba(255,255,255,0.2); padding: 20px; border-radius: 10px; margin-top: 20px;'>";
// echo "<h3>📊 Klasstatistieken</h3>";
// echo "<p>👥 Totaal studenten: " . count($studenten) . "</p>";
// echo "<p>📈 Klasgemiddelde: " . round($klasgemiddelde, 2) . "</p>";
// echo "<p>✅ Geslaagd: $geslaagd_count</p>";
// echo "<p>❌ Gezakt: $gezakt_count</p>";
// echo "<p>🎯 Slaagpercentage: " . round($slaagpercentage, 1) . "%</p>";
// echo "<p>🏆 Beste student: $beste_student (gemiddelde: " . round($beste_gemiddelde, 2) . ")</p>";
// echo "</div>";

echo "</div>";
?>
Extra uitdagingen:

Sorteer studenten op gemiddelde
Voeg een “waarschuwing” status toe voor studenten tussen 5.5-6.0
Maak een grafische progress bar voor aanwezigheid
Implementeer een cijfer trendanalyse (stijgend/dalend)
📝 Opdracht 5 ⭐⭐⭐⭐⭐: Advanced Game Leaderboard System
Doel: Bouw een geavanceerd gaming leaderboard met statistieken, rankings en achievements.

Eisen:

Complex multidimensional array met minimaal 8 spelers
Elke speler heeft: naam, level, XP, kills, deaths, wins, losses, playtime (uren)
Bereken K/D ratio (kills/deaths)
Bereken win rate percentage
Sorteer spelers op verschillende criteria (XP, K/D, win rate)
Bepaal rank badges (Bronze, Silver, Gold, Platinum, Diamond)
Toon top 3 in elk categorie
Implementeer achievement system
Bereken gemiddelde stats van alle spelers
Bestand: game_leaderboard.php

Startcode:

<?php
$spelers = [
    [
        "naam" => "ProGamer123",
        "level" => 45,
        "xp" => 28500,
        "kills" => 1523,
        "deaths" => 467,
        "wins" => 234,
        "losses" => 189,
        "playtime" => 187,
        "achievements" => ["First Blood", "Veteran", "Headshot Master"]
    ],
    [
        "naam" => "NinjaWarrior",
        "level" => 52,
        "xp" => 35200,
        "kills" => 2134,
        "deaths" => 523,
        "wins" => 312,
        "losses" => 201,
        "playtime" => 245,
        "achievements" => ["First Blood", "Veteran", "Legendary", "Unstoppable"]
    ],
    // TODO: Voeg minimaal 6 meer spelers toe met verschillende stats
];

echo "<h2>🎮 Game Leaderboard System</h2>";
echo "<div style='background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 25px; border-radius: 15px;'>";

// TODO: Bereken stats voor elke speler
// foreach ($spelers as &$speler) {
//     // Bereken K/D ratio
//     $speler['kd_ratio'] = $speler['kills'] / max($speler['deaths'], 1);
//
//     // Bereken win rate
//     $totaal_games = $speler['wins'] + $speler['losses'];
//     $speler['win_rate'] = ($speler['wins'] / $totaal_games) * 100;
//
//     // Bepaal rank op basis van XP
//     if ($speler['xp'] >= 50000) {
//         $speler['rank'] = "Diamond";
//         $speler['rank_icon'] = "💎";
//     } elseif ($speler['xp'] >= 35000) {
//         $speler['rank'] = "Platinum";
//         $speler['rank_icon'] = "🏆";
//     } elseif ($speler['xp'] >= 20000) {
//         $speler['rank'] = "Gold";
//         $speler['rank_icon'] = "🥇";
//     } elseif ($speler['xp'] >= 10000) {
//         $speler['rank'] = "Silver";
//         $speler['rank_icon'] = "🥈";
//     } else {
//         $speler['rank'] = "Bronze";
//         $speler['rank_icon'] = "🥉";
//     }
// }
// unset($speler); // Break reference

// TODO: Sorteer spelers op XP (hoog naar laag)
// TIP: Gebruik usort() met een custom compare functie

// TODO: Toon leaderboard
// echo "<h3>🏆 Leaderboard (Top Spelers)</h3>";
// foreach ($spelers as $positie => $speler) {
//     $rank_nummer = $positie + 1;
//
//     echo "<div style='background: rgba(0,0,0,0.3); padding: 20px; margin: 15px 0; border-radius: 10px;'>";
//     echo "<h3>#$rank_nummer - {$speler['rank_icon']} {$speler['naam']}</h3>";
//     echo "<p>🎖️ Rank: {$speler['rank']} | ⭐ Level {$speler['level']}</p>";
//     echo "<p>💎 XP: " . number_format($speler['xp']) . "</p>";
//     echo "<p>⚔️ Kills: {$speler['kills']} | 💀 Deaths: {$speler['deaths']} | 📊 K/D: " . round($speler['kd_ratio'], 2) . "</p>";
//     echo "<p>🏆 Wins: {$speler['wins']} | ❌ Losses: {$speler['losses']} | 📈 Win Rate: " . round($speler['win_rate'], 1) . "%</p>";
//     echo "<p>⏱️ Playtime: {$speler['playtime']} uren</p>";
//     echo "<p>🏅 Achievements: " . count($speler['achievements']) . " - " . implode(", ", $speler['achievements']) . "</p>";
//     echo "</div>";
// }

// TODO: Bereken en toon statistieken
// - Gemiddelde K/D ratio
// - Gemiddelde win rate
// - Totale speeltijd
// - Meeste kills (top 3)
// - Beste K/D ratio (top 3)
// - Hoogste win rate (top 3)

// TODO: Vind en toon records
// echo "<h3>📊 Records</h3>";
// Gebruik array functies om te vinden:
// - Speler met meeste kills
// - Speler met beste K/D
// - Speler met hoogste win rate
// - Speler met meeste achievements
// - Speler met meeste playtime

// TODO: Bonus - Rank distributie
// echo "<h3>📊 Rank Distributie</h3>";
// Tel hoeveel spelers in elke rank zitten
// $rank_count = [];
// foreach ($spelers as $speler) {
//     if (!isset($rank_count[$speler['rank']])) {
//         $rank_count[$speler['rank']] = 0;
//     }
//     $rank_count[$speler['rank']]++;
// }
// Toon als bar chart of percentages

echo "</div>";
?>
Geavanceerde uitdagingen:

Implementeer een ELO rating systeem
Voeg “recent form” toe (laatste 5 games)
Maak een “Similar players” functie
Implementeer skill-based matchmaking suggesties
Voeg seasonal statistics toe
Maak een comparison tool (vergelijk 2 spelers)
4.9 Samenvatting
🎉 Gefeliciteerd! Je hebt arrays volledig onder de knie!

Wat heb je geleerd?
✅ Array Basics

Indexed arrays voor geordende lijsten
Associative arrays voor key-value pairs
Multidimensional arrays voor complexe data
Array syntax: [] vs array()
✅ Array Functies

count() - tel elementen
array_push() / array_pop() - toevoegen/verwijderen einde
array_shift() / array_unshift() - toevoegen/verwijderen begin
array_merge() - arrays combineren
in_array() / array_search() - zoeken
sort() / rsort() - sorteren
✅ Debugging Tools

print_r() voor leesbare output
var_dump() voor gedetailleerde type info
<pre> tags voor formatting
✅ Best Practices

Gebruik meaningful keys in associative arrays
Gebruik [] syntax (modern)
Debug met var_dump() tijdens development
Check array indices om “undefined index” errors te voorkomen
Gebruik count() voor loop boundaries
Veelgemaakte Fouten
❌ Vergeten dat arrays bij 0 beginnen:

$namen = ["Lisa", "Jan", "Sophie"];
echo $namen[1]; // Geeft "Jan", niet "Lisa"!
❌ Undefined index errors:

$persoon = ["naam" => "Lisa"];
echo $persoon["leeftijd"]; // ERROR: Undefined index

// Fix:
if (isset($persoon["leeftijd"])) {
    echo $persoon["leeftijd"];
}
// Of gebruik null coalescing:
echo $persoon["leeftijd"] ?? "Onbekend";
❌ Vergeten quotes bij associative keys:

echo $persoon[naam]; // FOUT: PHP zoekt constante "naam"
echo $persoon["naam"]; // CORRECT
Performance Tips
💪 Efficiënte array operaties:

// Snel:
$array[] = $value;

// Langzamer (voor één element):
array_push($array, $value);

// isset() is sneller dan in_array() voor keys:
// Snel:
if (isset($array[$key])) { }

// Langzamer:
if (in_array($key, array_keys($array))) { }
Volgende Stappen
In hoofdstuk 5 gaan we verder met:

Functies - herbruikbare code blokken
Parameters en return values
Variable scope en globals
Anonymous functions en callbacks
Array manipulation met functies
4.10 Bronnen
📚 Officiële Documentatie (2026)
PHP Manual: Arrays - Complete officiële documentatie
PHP Manual: Array Functions - Alle array functies uitgelegd
PHP 8.3 Features - Nieuwste PHP features (2026)
PHP: The Right Way - Arrays - Best practices en moderne technieken
🎓 Tutorials en Leermateriaal
W3Schools PHP Arrays - Interactieve voorbeelden en oefeningen
MDN Web Docs - PHP Arrays - Gids voor webontwikkelaars
PHP Array Tutorial - TutorialsPoint - Uitgebreide tutorials
Codecademy: Learn PHP - Interactieve cursus met array sectie
freeCodeCamp PHP Course - Gratis video tutorials (2025-2026)
🛠️ Online Tools en Playgrounds
PHP Sandbox - Test array code online
3v4l.org - Test op 300+ PHP versies tegelijk
PHPFiddle - Snel experimenteren met arrays
OnlineGDB PHP - Online compiler met debugging
Replit PHP - Collaborative coding environment
📱 Mobile Apps voor Onderweg Leren
SoloLearn: PHP - Arrays module op je telefoon
Programming Hub - PHP tutorials met array oefeningen
Mimo: Learn Coding - Dagelijkse PHP lessen
Grasshopper - Coding fundamentals inclusief arrays
Enki App - Daily coding workout met PHP tracks
🎮 Interactieve Coding Challenges
Codewars - PHP - Array challenges van makkelijk tot expert
HackerRank - PHP - Competitieve programming challenges
LeetCode - Array algoritmes oefenen
Exercism - PHP Track - Mentored learning met array opdrachten
CodinGame - Game-based coding challenges
🇳🇱 Nederlandse Bronnen
PHP.nl Forum - Nederlandse PHP community
PHP.nu Tutorial - Nederlandse tutorials
Sitemasters PHP - Nederlandstalige uitleg
YouTube: PHP Arrays Nederlands - Video tutorials 2025-2026
Reddit r/thenetherlands - Programming - Nederlandse developers community
📖 Aanbevolen Boeken (2024-2026 Edities)
“Modern PHP” (2024 Edition) - Josh Lockhart
Hoofdstuk over arrays en collections
Best practices voor PHP 8.3+
“PHP 8 Programming and Solutions” - Steve Prettyman
Uitgebreide array manipulatie technieken
Real-world voorbeelden
“Learning PHP, MySQL & JavaScript (7th Edition)” - Robin Nixon
Fundamentals inclusief arrays
Webdevelopment focus
“PHP Cookbook (4th Edition)” - David Sklar & Adam Trachtenberg
250+ array recipes
Production-ready code
“PHP: The Complete Reference” - Steven Holzner
Encyclopedische coverage van array functies
🎥 Video Cursussen (2025-2026)
Laracasts: PHP for Beginners - Gratis intro cursus
Udemy: PHP Arrays Masterclass 2025 - Betaalde diepgaande cursus
YouTube: Traversy Media - PHP Arrays - Gratis tutorials
LinkedIn Learning: PHP Essential Training - Professional development
Pluralsight: PHP Fundamentals - Enterprise training
💡 Geavanceerde Resources
PHP Internals Book - Hoe arrays intern werken
PHP Fig Standards - Coding standards voor arrays
Awesome PHP - Curated lijst van packages en tools
PHP Weekly Newsletter - Wekelijkse updates (2026)
PHP Annotated Monthly - JetBrains blog
🆘 Hulp en Community (Actief in 2026)
Stack Overflow - PHP Tag - 1.4M+ vragen beantwoord
Reddit r/PHP - Actieve community met 200K+ members
Reddit r/PHPhelp - Specifiek voor hulpvragen
PHP Discord - Real-time chat met developers
Laravel Discord - Ook voor algemene PHP vragen
Dev.to #PHP - Artikelen en discussies
🔧 Development Tools
PhpStorm - Professionele IDE met array hints
Visual Studio Code + PHP Intelephense - Gratis alternatief
Xdebug - Essential voor array debugging
PHP CodeSniffer - Code quality checker
PHPStan - Static analysis tool
📊 Cheat Sheets en Quick Reference
PHP Array Functions Cheat Sheet - Visuele referentie 2026
OverAPI PHP - Alle functies op één pagina
DevHints PHP Cheatsheet - Modern design
PHP Reference by Josh Sherman - Searchable reference
Codecademy PHP Cheatsheet - Beginner-friendly
🔬 Testing en Quality
PHPUnit - Unit testing voor array manipulatie
Pest PHP - Modern testing framework
PHP Insights - Code quality analysis
Psalm - Static analysis voor type safety
🌐 API’s en Libraries voor Array Data (2026)
Laravel Collections - Powerful array wrapper
Doctrine Collections - Advanced array handling
Underscore.php - JavaScript underscore.js port
Arrays Library by The League - Utility functions
🎯 Learning Paths voor Verdieping
Beginner Path:
W3Schools PHP Arrays → Codecademy PHP → Oefeningen in dit hoofdstuk
Intermediate Path:
PHP.net documentatie → Codewars challenges → Laravel Collections
Advanced Path:
PHP Internals Book → Contribute to open source → Complex algoritmes met arrays
💪 Practice Projects
Bouw deze projecten om je array skills te verbeteren:

Contact Manager - CRUD operaties met arrays
Shopping Cart - Session-based cart met arrays
Blog System - Posts opslaan in arrays (voor database)
Todo App - Array manipulatie met filters
Grade Calculator - Statistieken berekenen
JSON API Consumer - Arrays van externe APIs verwerken
🏆 Certificeringen
Zend Certified PHP Engineer - Industry-recognized
PHP Certification (W3Schools) - Beginner friendly
LinkedIn PHP Skill Assessment - Profile badge
🚀 Keep Coding! Arrays zijn overal in PHP - master ze en je bent een stap dichter bij een professional PHP developer!

💬 Feedback? Heb je vragen over dit hoofdstuk? Vraag je docent of post in het PHP.nl forum!

© 2025 ROC-Midden Nederland – ICT-College – Amersfoort, Nederland

MBO Niveau 4 - Software Developer

PHP Tutorials – Arrays in PHP

PHP Tutorial
ROC ICA Logo
H5-Functies in PHP

Hoofdstuk 5: Functies in PHP
In dit hoofdstuk duiken we in een essentieel onderdeel van PHP (en vele andere programmeertalen): functies. Functies helpen je om stukken code te groeperen, zodat je deze code eenvoudig kunt hergebruiken en je script overzichtelijker maakt. Ze zijn de bouwstenen van clean, maintainable code.

Wat ga je leren?

Wat functies zijn en waarom ze cruciaal zijn
Functies maken en aanroepen
Parameters doorgeven (by value en by reference)
Return values gebruiken
Default parameters en type declarations
Variable scope (local vs global)
Anonymous functions en arrow functions (moderne PHP)
Best practices voor functie design
💡 Let op: Dit hoofdstuk bouwt voort op hoofdstuk 1-4. Zorg dat je variabelen, datatypen, loops en arrays begrijpt!

5.1 Wat zijn Functies?
Een functie is een herbruikbaar blok code dat een specifieke taak uitvoert. In plaats van dezelfde code steeds opnieuw te schrijven, definieer je een functie één keer en roep je deze aan wanneer nodig.

Waarom Functies Gebruiken?
Zonder functies:

<?php
// Bereken BTW voor product 1
$prijs1 = 100;
$btw1 = $prijs1 * 0.21;
$totaal1 = $prijs1 + $btw1;

// Bereken BTW voor product 2
$prijs2 = 250;
$btw2 = $prijs2 * 0.21;
$totaal2 = $prijs2 + $btw2;

// Bereken BTW voor product 3
$prijs3 = 75;
$btw3 = $prijs3 * 0.21;
$totaal3 = $prijs3 + $btw3;

// Dit is veel herhaalde code!
?>
Met functies:

<?php
function berekenTotaalMetBTW($prijs) {
    $btw = $prijs * 0.21;
    return $prijs + $btw;
}

$totaal1 = berekenTotaalMetBTW(100);  // 121
$totaal2 = berekenTotaalMetBTW(250);  // 302.5
$totaal3 = berekenTotaalMetBTW(75);   // 90.75

// Veel overzichtelijker en herbruikbaar!
?>
Voordelen van Functies
DRY Principe - Don’t Repeat Yourself (vermijd code duplicatie)
Onderhoudbaarheid - Wijzigingen hoef je maar op één plek te maken
Leesbaarheid - Code wordt logisch gestructureerd en makkelijker te begrijpen
Testbaarheid - Functies kunnen apart getest worden
Herbruikbaarheid - Gebruik dezelfde functie in verschillende projecten
5.2 Een Functie Maken
Een functie maak je met het function keyword, gevolgd door de functienaam, haakjes () en een codeblok {}.

Basis Syntax
<?php
function functieNaam() {
    // Code die uitgevoerd wordt
}
?>
Eenvoudige Functie
<?php
function zegHallo() {
    echo "Hallo, wereld!";
}

// Functie aanroepen
zegHallo(); // Output: Hallo, wereld!
?>
Naming Conventions
Best practices voor functienamen:

Gebruik camelCase: berekenTotaal(), stuurEmail(), valideerGebruiker()
Begin met een werkwoord: beschrijft wat de functie doet
Wees beschrijvend: getUserById() is beter dan get()
Vermijd afkortingen: calculateTotal() is beter dan calcTot()
Goede voorbeelden:

<?php
function berekenGemiddelde() { }
function valideerEmail() { }
function haalGebruikerOp() { }
function stuurBevestigingsmail() { }
?>
Slechte voorbeelden:

<?php
function gm() { }              // Te kort, onduidelijk
function DoStuff() { }         // PascalCase (gebruik camelCase)
function calculate_total() { } // snake_case (niet gebruikelijk in PHP functies)
?>
💼 Engels in de Professionele Wereld
Belangrijk voor je toekomst: In vrijwel alle professionele softwareontwikkeling omgevingen is Engels de standaard voor code. Dit geldt voor:

Functienamen: calculateTotal() in plaats van berekenTotaal()
Variabelen: $userName in plaats van $gebruikersNaam
Commentaar: Engels commentaar in de code
Documentatie: README’s, API docs, etc. in Engels
Waarom Engels?

Internationale samenwerking - Code wordt gedeeld met developers wereldwijd
Open source - Bijdragen aan open source projecten vereist Engels
Bedrijfsstandaard - De meeste bedrijven hebben Engels als voertaal voor code
Leesbaarheid - Engelse namen zijn vaak korter en universeler
Frameworks & Libraries - Alle PHP frameworks (Laravel, Symfony) gebruiken Engels
Vergelijking Nederlands vs Engels:

<?php
// ❌ Nederlands (alleen voor leren/oefenen)
function berekenTotaalMetBTW($prijs, $btwPercentage = 21) {
    $btwBedrag = $prijs * ($btwPercentage / 100);
    $totaalPrijs = $prijs + $btwBedrag;
    return $totaalPrijs;
}

$winkelwagen = [
    'producten' => ['laptop', 'muis'],
    'totaalBedrag' => 1050
];

// ✅ Engels (professionele standaard)
function calculateTotalWithVAT($price, $vatPercentage = 21) {
    $vatAmount = $price * ($vatPercentage / 100);
    $totalPrice = $price + $vatAmount;
    return $totalPrice;
}

$shoppingCart = [
    'products' => ['laptop', 'mouse'],
    'totalAmount' => 1050
];
?>
Aanbeveling voor dit hoofdstuk:

In de lesstof gebruiken we soms Nederlands voor duidelijkheid
In echte projecten en vanaf nu bij opdrachten probeer je Engels te gebruiken
Begin nu al met Engels te oefenen - het wordt makkelijker met de tijd!
💡 Tip: Veel IDE’s (PhpStorm, VS Code) hebben spelling checkers die je helpen bij correcte Engelse namen.

Veelgebruikte Engelse werkwoorden in functies:

get / fetch - Ophalen van data
set / update - Data wijzigen
create / add - Nieuwe data toevoegen
delete / remove - Data verwijderen
calculate / compute - Berekeningen
validate / check - Validatie
send - Versturen (email, data)
process - Verwerken van data
format / convert - Data transformeren
find / search - Zoeken
save / store - Opslaan
🔧 Praktische Oefening 5.1
Opdracht: Maak herbruikbare functies voor een webshop.

Maak een bestand webshop_functies.php:

<?php
function toonProductTitel($naam) {
    echo "<h2>🛍️ $naam</h2>";
}

function toonPrijs($prijs) {
    echo "<p class='prijs'>€" . number_format($prijs, 2, ',', '.') . "</p>";
}

function toonBeschikbaarheid($voorraad) {
    if ($voorraad > 0) {
        echo "<p style='color: green;'>✅ Op voorraad ($voorraad stuks)</p>";
    } else {
        echo "<p style='color: red;'>❌ Uitverkocht</p>";
    }
}

echo "<div style='background: #f5f5f5; padding: 20px; border-radius: 10px;'>";

// Gebruik de functies
toonProductTitel("iPhone 15 Pro");
toonPrijs(1199);
toonBeschikbaarheid(15);

echo "<hr>";

toonProductTitel("AirPods Pro");
toonPrijs(279);
toonBeschikbaarheid(0);

echo "</div>";
?>
Experimenteer:

Voeg meer producten toe
Maak een functie toonRating($sterren)
Maak een functie toonKorting($percentage)
5.3 Functies met Parameters
Parameters (ook wel arguments genoemd) maken functies flexibel. Je geeft waarden door aan de functie, die deze vervolgens kan gebruiken.

Enkele Parameter
<?php
function begroet($naam) {
    echo "Hallo, $naam!";
}

begroet("Lisa");   // Hallo, Lisa!
begroet("Jan");    // Hallo, Jan!
begroet("Sophie"); // Hallo, Sophie!
?>
Meerdere Parameters
<?php
function optellen($a, $b) {
    $som = $a + $b;
    echo "$a + $b = $som";
}

optellen(5, 10);  // 5 + 10 = 15
optellen(23, 17); // 23 + 17 = 40
?>
Type Declarations (PHP 7+)
Sinds PHP 7 kun je type hints toevoegen om aan te geven welk datatype verwacht wordt:

<?php
function berekenOppervlakte(float $lengte, float $breedte): float {
    return $lengte * $breedte;
}

echo berekenOppervlakte(5.5, 3.2); // 17.6

// Type error als je geen nummer doorgeeft:
// berekenOppervlakte("vijf", "drie"); // Fatal error!
?>
Beschikbare type hints:

int - Integer (geheel getal)
float - Float (decimaal getal)
string - String (tekst)
bool - Boolean (true/false)
array - Array
object - Object
callable - Callable (functie)
mixed - Elk type (PHP 8+)
🔧 Praktische Oefening 5.2
Opdracht: Bouw een Discord bot command systeem.

Maak een bestand discord_bot.php:

<?php
function stuurBericht(string $gebruiker, string $bericht, string $kanaal = "general") {
    echo "<div style='background: #36393f; color: white; padding: 15px; margin: 10px 0; border-radius: 8px;'>";
    echo "<p><strong style='color: #5865f2;'>@$gebruiker</strong> in #$kanaal</p>";
    echo "<p>$bericht</p>";
    echo "<p style='color: #72767d; font-size: 12px;'>📅 " . date('H:i') . "</p>";
    echo "</div>";
}

function stuurEmbed(string $titel, string $beschrijving, string $kleur = "#5865f2") {
    echo "<div style='background: $kleur; padding: 3px; border-radius: 5px; margin: 10px 0;'>";
    echo "<div style='background: #2f3136; padding: 15px; border-radius: 0 5px 5px 0;'>";
    echo "<h3 style='color: white; margin: 0;'>$titel</h3>";
    echo "<p style='color: #dcddde; margin: 10px 0 0 0;'>$beschrijving</p>";
    echo "</div>";
    echo "</div>";
}

function geefRol(string $gebruiker, string $rol, string $kleur = "#57f287") {
    echo "<div style='background: #2f3136; color: white; padding: 10px; margin: 5px 0; border-radius: 5px;'>";
    echo "<p>✅ <strong>$gebruiker</strong> heeft de rol ";
    echo "<span style='background: $kleur; padding: 2px 8px; border-radius: 3px; color: black;'>$rol</span> gekregen!</p>";
    echo "</div>";
}

echo "<h2>🤖 Discord Bot Simulator</h2>";
echo "<div style='background: #36393f; padding: 20px; border-radius: 10px;'>";

stuurBericht("TechGirl", "Hallo allemaal! 👋");
stuurBericht("CodeMaster", "Check mijn nieuwe project!", "coding");
stuurEmbed("📢 Announcement", "Nieuwe server regels zijn actief!", "#ed4245");
geefRol("NewUser123", "Member", "#57f287");

echo "</div>";
?>
5.4 Type Safety in PHP (Modern PHP 7.0+)
Type safety is een van de belangrijkste moderne features in PHP. Het helpt je om bugs te voorkomen door expliciet aan te geven welke datatypes je verwacht en retourneert.

Waarom Type Safety?
Zonder type declarations:

<?php
function bereken($a, $b) {
    return $a + $b;
}

echo bereken(5, 10);        // 15 ✅
echo bereken("5", "10");    // "510" ❌ String concatenatie!
echo bereken("test", 5);    // Warning + onverwacht resultaat ❌
?>
Met type declarations:

<?php
function bereken(int $a, int $b): int {
    return $a + $b;
}

echo bereken(5, 10);        // 15 ✅
echo bereken("5", "10");    // 15 ✅ (auto-convert naar int)
// echo bereken("test", 5); // TypeError! ✅ Voorkomt bugs!
?>
Type Declarations voor Parameters
PHP ondersteunt verschillende type hints:

<?php
// Scalar types (PHP 7.0+)
function verwerkString(string $tekst): void { }
function verwerkGetal(int $nummer): void { }
function verwerkDecimaal(float $getal): void { }
function verwerkBoolean(bool $waarde): void { }

// Array
function verwerkLijst(array $items): void { }

// Object types
function verwerkDatum(DateTime $datum): void { }

// Mixed (PHP 8.0+) - accepteert elk type
function verwerkWillekeurig(mixed $data): void { }

// Union types (PHP 8.0+)
function verwerkNummer(int|float $nummer): void { }

// Nullable types
function verwerkOptie(?string $waarde): void { } // string of null
?>
Return Type Declarations
Specificeer wat een functie teruggeeft:

<?php
function geefNaam(): string {
    return "Lisa";
}

function geefLeeftijd(): int {
    return 21;
}

function geefGemiddelde(): float {
    return 8.5;
}

function isActief(): bool {
    return true;
}

function geefGegevens(): array {
    return ["naam" => "Lisa", "leeftijd" => 21];
}

function logBericht(): void { // Geeft niets terug
    echo "Gelogd!";
}

function zoekGebruiker(): ?array { // Array of null
    // Return null als niet gevonden
    return null;
}
?>
Strict Types Mode
PHP heeft twee modi voor type checking:

Coercive mode (default) - PHP probeert types automatisch te converteren:

<?php
function optellen(int $a, int $b): int {
    return $a + $b;
}

echo optellen("5", "10"); // 15 - strings worden geconverteerd naar int
?>
Strict mode - Geen automatische conversie, alleen exacte types:

<?php
declare(strict_types=1); // Moet bovenaan het bestand!

function optellen(int $a, int $b): int {
    return $a + $b;
}

echo optellen(5, 10);      // 15 ✅
// echo optellen("5", "10"); // TypeError! ❌
?>
⚠️ Belangrijk: declare(strict_types=1); moet de eerste statement in het bestand zijn (na <?php)!

Union Types (PHP 8.0+)
Accepteer meerdere types:

<?php
// Accepteert int OF float
function berekenPercentage(int|float $waarde): float {
    return $waarde / 100;
}

echo berekenPercentage(50);    // 0.5 ✅
echo berekenPercentage(50.5);  // 0.505 ✅

// Accepteert string OF null
function verwerkNaam(string|null $naam): string {
    return $naam ?? "Onbekend";
}

// Array OF object
function verwerkData(array|object $data): void {
    // ...
}
?>
Nullable Types
Een parameter of return waarde die null mag zijn:

<?php
// Oude syntax (PHP 7.1+)
function zoekGebruiker(?int $id): ?array {
    if ($id === null) {
        return null;
    }
    // Zoek gebruiker...
    return ["naam" => "Lisa"];
}

// Modern equivalent met union type (PHP 8.0+)
function zoekProduct(int|null $id): array|null {
    // ...
}

$gebruiker = zoekGebruiker(null); // null ✅
$gebruiker = zoekGebruiker(5);    // array ✅
?>
Mixed Type (PHP 8.0+)
Accepteert elk type (equivalent aan geen type declaration):

<?php
function logData(mixed $data): void {
    if (is_string($data)) {
        echo "String: $data";
    } elseif (is_array($data)) {
        echo "Array met " . count($data) . " items";
    } else {
        echo "Ander type";
    }
}

logData("test");           // ✅
logData([1, 2, 3]);        // ✅
logData(42);               // ✅
logData(true);             // ✅
?>
Never Type (PHP 8.1+)
Voor functies die nooit returnen (altijd exception throwen of exit):

<?php
function stopMetFout(string $bericht): never {
    throw new Exception($bericht);
    // Komt hier nooit - never!
}

function redirectEnStop(string $url): never {
    header("Location: $url");
    exit;
}
?>
Praktisch Voorbeeld: E-commerce Systeem
<?php
declare(strict_types=1);

class Product {
    public function __construct(
        public string $naam,
        public float $prijs
    ) {}
}

function berekenTotaal(array $producten, float $kortingPercentage = 0): float {
    $totaal = 0.0;

    foreach ($producten as $product) {
        if (!$product instanceof Product) {
            throw new InvalidArgumentException("Array moet Product objecten bevatten");
        }
        $totaal += $product->prijs;
    }

    if ($kortingPercentage > 0) {
        $totaal *= (1 - $kortingPercentage / 100);
    }

    return $totaal;
}

function formateerPrijs(float $prijs): string {
    return "€" . number_format($prijs, 2, ',', '.');
}

function vindGoedkoopsteProduct(array $producten): ?Product {
    if (empty($producten)) {
        return null;
    }

    $goedkoopste = $producten[0];
    foreach ($producten as $product) {
        if ($product->prijs < $goedkoopste->prijs) {
            $goedkoopste = $product;
        }
    }

    return $goedkoopste;
}

// Gebruik
$producten = [
    new Product("Laptop", 999.99),
    new Product("Muis", 25.50),
    new Product("Toetsenbord", 75.00)
];

$totaal = berekenTotaal($producten, 10); // 10% korting
echo "Totaal: " . formateerPrijs($totaal) . "\n";

$goedkoopste = vindGoedkoopsteProduct($producten);
if ($goedkoopste !== null) {
    echo "Goedkoopste: {$goedkoopste->naam} - " . formateerPrijs($goedkoopste->prijs);
}
?>
Best Practices voor Type Safety
✅ DO:

Gebruik altijd type declarations voor parameters en return types
Gebruik declare(strict_types=1); in nieuwe projecten
Gebruik nullable types (?type of type|null) wanneer null toegestaan is
Documenteer complexe types met PHPDoc comments
❌ DON’T:

Gebruik mixed alleen als echt nodig
Vermijd te complexe union types (max 2-3 types)
Geen types weglaten “omdat het toch wel werkt”
Type Safety in Actie
<?php
declare(strict_types=1);

// ✅ GOED: Duidelijke types
function berekenBTW(float $bedrag, float $percentage = 21.0): float {
    return $bedrag * ($percentage / 100);
}

function valideerEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function haalGebruikersOp(): array {
    return [
        ["naam" => "Lisa", "leeftijd" => 21],
        ["naam" => "Jan", "leeftijd" => 19]
    ];
}

// ❌ SLECHT: Geen types
function berekenIets($x, $y) {
    return $x + $y; // Wat verwachten we? Wat retourneren we?
}
?>
🔧 Praktische Oefening 5.3b: Type-Safe Calculator
Opdracht: Maak een type-safe calculator met strict types.

Maak een bestand type_safe_calculator.php:

<?php
declare(strict_types=1);

function add(int|float $a, int|float $b): int|float {
    return $a + $b;
}

function subtract(int|float $a, int|float $b): int|float {
    return $a - $b;
}

function multiply(int|float $a, int|float $b): int|float {
    return $a * $b;
}

function divide(int|float $a, int|float $b): float {
    if ($b === 0 || $b === 0.0) {
        throw new DivisionByZeroError("Kan niet delen door nul");
    }
    return $a / $b;
}

function percentage(int|float $waarde, int|float $percentage): float {
    return ($waarde * $percentage) / 100;
}

function formatResult(int|float $result): string {
    if (is_int($result)) {
        return "Resultaat: $result";
    }
    return "Resultaat: " . number_format($result, 2);
}

echo "<h2>🧮 Type-Safe Calculator</h2>";
echo "<div style='background: #2c3e50; color: white; padding: 25px; border-radius: 15px; font-family: monospace;'>";

try {
    echo "<p>" . formatResult(add(10, 5)) . "</p>";
    echo "<p>" . formatResult(subtract(10, 5)) . "</p>";
    echo "<p>" . formatResult(multiply(10, 5)) . "</p>";
    echo "<p>" . formatResult(divide(10, 3)) . "</p>";
    echo "<p>" . formatResult(percentage(200, 15)) . "</p>";

    // Dit zou een error geven in strict mode:
    // echo formatResult(add("10", "5")); // TypeError!

} catch (DivisionByZeroError $e) {
    echo "<p style='color: #e74c3c;'>❌ Fout: {$e->getMessage()}</p>";
}

echo "</div>";
?>
Test:

Probeer de functie aan te roepen met strings (krijg je een TypeError?)
Test de divide functie met 0
Voeg meer wiskundige operaties toe (power, sqrt, etc.)
5.5 Return Values
Het return statement stuurt een waarde terug naar de code die de functie aanroept. Dit is essentieel voor functies die berekeningen maken of data verwerken.

Basis Return
<?php
function vermenigvuldig($a, $b) {
    return $a * $b;
}

$resultaat = vermenigvuldig(4, 5);
echo "Resultaat: $resultaat"; // Resultaat: 20
?>
Return met Type Declaration
<?php
function berekenBTW(float $prijs): float {
    return $prijs * 0.21;
}

$btw = berekenBTW(100);
echo "BTW: €" . number_format($btw, 2); // BTW: €21.00
?>
Meerdere Return Statements
Een functie kan meerdere return statements hebben (maar voert er slechts één uit):

<?php
function checkLeeftijd(int $leeftijd): string {
    if ($leeftijd < 12) {
        return "Kind";
    } elseif ($leeftijd < 18) {
        return "Tiener";
    } elseif ($leeftijd < 65) {
        return "Volwassene";
    } else {
        return "Senior";
    }
}

echo checkLeeftijd(15); // Tiener
echo checkLeeftijd(30); // Volwassene
?>
Return Array (meerdere waarden)
<?php
function berekenStatistieken(array $getallen): array {
    $som = array_sum($getallen);
    $aantal = count($getallen);
    $gemiddelde = $som / $aantal;

    return [
        'som' => $som,
        'aantal' => $aantal,
        'gemiddelde' => $gemiddelde,
        'minimum' => min($getallen),
        'maximum' => max($getallen)
    ];
}

$cijfers = [7, 8, 6, 9, 7, 8];
$stats = berekenStatistieken($cijfers);

echo "Aantal cijfers: {$stats['aantal']}<br>";
echo "Gemiddelde: " . round($stats['gemiddelde'], 1) . "<br>";
echo "Hoogste: {$stats['maximum']}<br>";
echo "Laagste: {$stats['minimum']}<br>";
?>
🔧 Praktische Oefening 5.3
Opdracht: Maak een YouTube video statistieken calculator.

Maak een bestand youtube_stats.php:

<?php
function berekenEngagementRate(int $views, int $likes, int $comments): float {
    if ($views === 0) return 0;
    return (($likes + $comments) / $views) * 100;
}

function formateerViews(int $views): string {
    if ($views >= 1000000) {
        return round($views / 1000000, 1) . "M";
    } elseif ($views >= 1000) {
        return round($views / 1000, 1) . "K";
    }
    return (string)$views;
}

function bepaalViralStatus(int $views, float $engagement): string {
    if ($views > 1000000 && $engagement > 5) {
        return "🔥 VIRAL HIT";
    } elseif ($views > 500000 && $engagement > 3) {
        return "📈 TRENDING";
    } elseif ($views > 100000) {
        return "👍 POPULAIR";
    } elseif ($views > 10000) {
        return "✅ GOED";
    }
    return "📊 NORMAAL";
}

function analyseVideo(string $titel, int $views, int $likes, int $comments, int $shares): array {
    $engagement = berekenEngagementRate($views, $likes, $comments);
    $status = bepaalViralStatus($views, $engagement);

    return [
        'titel' => $titel,
        'views_formatted' => formateerViews($views),
        'views_raw' => $views,
        'likes' => $likes,
        'comments' => $comments,
        'shares' => $shares,
        'engagement' => round($engagement, 2),
        'status' => $status
    ];
}

// Test de functies
$video1 = analyseVideo("PHP Tutorial for Beginners", 2500000, 125000, 8500, 3200);
$video2 = analyseVideo("My Daily Vlog", 45000, 2300, 156, 89);

echo "<h2>📺 YouTube Video Analytics</h2>";
echo "<div style='background: #ff0000; padding: 25px; border-radius: 15px;'>";

foreach ([$video1, $video2] as $video) {
    echo "<div style='background: rgba(0,0,0,0.3); color: white; padding: 20px; margin: 15px 0; border-radius: 10px;'>";
    echo "<h3>{$video['titel']}</h3>";
    echo "<p>👁️ Views: {$video['views_formatted']} ({$video['views_raw']} totaal)</p>";
    echo "<p>👍 Likes: " . number_format($video['likes']) . "</p>";
    echo "<p>💬 Comments: " . number_format($video['comments']) . "</p>";
    echo "<p>🔄 Shares: " . number_format($video['shares']) . "</p>";
    echo "<p>📊 Engagement: {$video['engagement']}%</p>";
    echo "<h4 style='color: #00ff00;'>{$video['status']}</h4>";
    echo "</div>";
}

echo "</div>";
?>
5.6 Default Parameters
Je kunt standaardwaarden toekennen aan parameters. Als de functie wordt aangeroepen zonder dat argument, wordt de standaardwaarde gebruikt.

Basis Voorbeeld
<?php
function begroet($naam = "gast") {
    echo "Hallo, $naam!";
}

begroet();        // Hallo, gast!
begroet("Lisa");  // Hallo, Lisa!
?>
Meerdere Default Parameters
<?php
function maakProfiel($naam, $leeftijd = 18, $land = "Nederland") {
    return [
        'naam' => $naam,
        'leeftijd' => $leeftijd,
        'land' => $land
    ];
}

$profiel1 = maakProfiel("Lisa");
// ['naam' => 'Lisa', 'leeftijd' => 18, 'land' => 'Nederland']

$profiel2 = maakProfiel("Jan", 25);
// ['naam' => 'Jan', 'leeftijd' => 25, 'land' => 'Nederland']

$profiel3 = maakProfiel("Sophie", 22, "België");
// ['naam' => 'Sophie', 'leeftijd' => 22, 'land' => 'België']
?>
⚠️ Belangrijk: Parameters met default waarden moeten altijd na parameters zonder defaults komen:

<?php
// ✅ CORRECT
function test($verplicht, $optioneel = "default") { }

// ❌ FOUT
function test($optioneel = "default", $verplicht) { }
// Dit geeft een deprecated warning/error!
?>
🔧 Praktische Oefening 5.4
Opdracht: Maak een notificatie systeem met defaults.

Maak een bestand notificaties.php:

<?php
function stuurNotificatie(
    string $bericht,
    string $type = "info",
    bool $toonTijd = true,
    string $icoon = "ℹ️"
): void {
    $kleuren = [
        'info' => '#3498db',
        'success' => '#2ecc71',
        'warning' => '#f39c12',
        'error' => '#e74c3c'
    ];

    $kleur = $kleuren[$type] ?? $kleuren['info'];

    echo "<div style='background: $kleur; color: white; padding: 15px; margin: 10px 0; border-radius: 8px; display: flex; align-items: center; gap: 10px;'>";
    echo "<span style='font-size: 24px;'>$icoon</span>";
    echo "<div style='flex: 1;'>";
    echo "<p style='margin: 0; font-weight: bold;'>$bericht</p>";
    if ($toonTijd) {
        echo "<p style='margin: 5px 0 0 0; font-size: 12px; opacity: 0.8;'>" . date('H:i:s') . "</p>";
    }
    echo "</div>";
    echo "</div>";
}

echo "<h2>🔔 Notificatie Systeem</h2>";

// Verschillende manieren van aanroepen
stuurNotificatie("Welkom bij de app!");
stuurNotificatie("Profiel succesvol bijgewerkt", "success", true, "✅");
stuurNotificatie("Let op: Je sessie verloopt binnenkort", "warning", false);
stuurNotificatie("Er is een fout opgetreden", "error", true, "❌");
stuurNotificatie("Nieuwe berichten ontvangen", "info", true, "📧");
?>
5.7 Pass by Reference
Normaal gesproken maakt PHP een kopie van een variabele wanneer je deze aan een functie doorgeeft (pass by value). Met het &-teken kun je de originele variabele doorgeven (pass by reference), zodat wijzigingen in de functie ook buiten de functie effect hebben.

Pass by Value (default)
<?php
function verhoogGetal($getal) {
    $getal += 10;
    echo "Binnen functie: $getal<br>"; // 15
}

$waarde = 5;
verhoogGetal($waarde);
echo "Buiten functie: $waarde<br>"; // Nog steeds 5!
?>
Pass by Reference
<?php
function verhoogGetal(&$getal) {  // Let op het & teken!
    $getal += 10;
    echo "Binnen functie: $getal<br>"; // 15
}

$waarde = 5;
verhoogGetal($waarde);
echo "Buiten functie: $waarde<br>"; // Nu 15!
?>
Praktisch Voorbeeld: Swap Functie
<?php
function wisselWaarden(&$a, &$b) {
    $temp = $a;
    $a = $b;
    $b = $temp;
}

$x = "Lisa";
$y = "Jan";

echo "Voor: x=$x, y=$y<br>";
wisselWaarden($x, $y);
echo "Na: x=$x, y=$y<br>";
// Voor: x=Lisa, y=Jan
// Na: x=Jan, y=Lisa
?>
Wanneer Reference Gebruiken?
✅ Gebruik reference wanneer:

Je een variabele wilt aanpassen binnen de functie
Je met grote arrays werkt (performance)
Je meerdere waarden wilt “retourneren”
❌ Vermijd reference wanneer:

Het niet nodig is (maakt code moeilijker te begrijpen)
Je pure functions wilt (functioneel programmeren)
Het onduidelijk is wat de functie doet met de variabele
🔧 Praktische Oefening 5.5
Opdracht: Maak een game inventory systeem met reference parameters.

Maak een bestand game_inventory.php:

<?php
function voegItemToe(array &$inventory, string $item, int $aantal = 1): void {
    if (isset($inventory[$item])) {
        $inventory[$item] += $aantal;
    } else {
        $inventory[$item] = $aantal;
    }
    echo "<p style='color: #2ecc71;'>✅ +$aantal $item toegevoegd aan inventory</p>";
}

function verwijderItem(array &$inventory, string $item, int $aantal = 1): bool {
    if (!isset($inventory[$item])) {
        echo "<p style='color: #e74c3c;'>❌ $item niet in inventory!</p>";
        return false;
    }

    if ($inventory[$item] < $aantal) {
        echo "<p style='color: #f39c12;'>⚠️ Niet genoeg $item (hebt: {$inventory[$item]}, nodig: $aantal)</p>";
        return false;
    }

    $inventory[$item] -= $aantal;
    if ($inventory[$item] === 0) {
        unset($inventory[$item]);
    }
    echo "<p style='color: #3498db;'>➖ -$aantal $item verwijderd uit inventory</p>";
    return true;
}

function toonInventory(array $inventory): void {
    echo "<div style='background: #34495e; color: white; padding: 20px; border-radius: 10px; margin: 15px 0;'>";
    echo "<h3>🎒 Inventory</h3>";

    if (empty($inventory)) {
        echo "<p style='opacity: 0.6;'>Inventory is leeg</p>";
    } else {
        echo "<ul style='list-style: none; padding: 0;'>";
        foreach ($inventory as $item => $aantal) {
            echo "<li style='padding: 5px 0;'>📦 $item: <strong>$aantal</strong>x</li>";
        }
        echo "</ul>";
    }
    echo "</div>";
}

// Game simulatie
$playerInventory = [];

echo "<h2>🎮 Game Inventory System</h2>";
echo "<div style='background: #2c3e50; padding: 25px; border-radius: 15px;'>";

toonInventory($playerInventory);

voegItemToe($playerInventory, "Health Potion", 3);
voegItemToe($playerInventory, "Sword", 1);
voegItemToe($playerInventory, "Gold Coins", 50);
voegItemToe($playerInventory, "Health Potion", 2); // Nog 2 bij

toonInventory($playerInventory);

verwijderItem($playerInventory, "Health Potion", 2);
verwijderItem($playerInventory, "Shield", 1); // Bestaat niet
verwijderItem($playerInventory, "Gold Coins", 100); // Te weinig

toonInventory($playerInventory);

echo "</div>";
?>
5.8 Variable Scope
Scope bepaalt waar in je code een variabele beschikbaar is. PHP heeft twee belangrijke scopes: local en global.

Local Scope
Variabelen binnen een functie zijn lokaal - alleen beschikbaar binnen die functie:

<?php
function testFunctie() {
    $lokaleVar = "Ik ben lokaal";
    echo $lokaleVar; // Werkt
}

testFunctie();
echo $lokaleVar; // ERROR: Undefined variable!
?>
Global Scope
Variabelen buiten functies zijn globaal, maar NIET automatisch beschikbaar binnen functies:

<?php
$globaleVar = "Ik ben globaal";

function testFunctie() {
    echo $globaleVar; // ERROR: Undefined variable!
}

testFunctie();
?>
Global Keyword
Om een globale variabele in een functie te gebruiken, gebruik het global keyword:

<?php
$teller = 0;

function verhoogTeller() {
    global $teller;
    $teller++;
}

verhoogTeller();
verhoogTeller();
verhoogTeller();

echo "Teller: $teller"; // Teller: 3
?>
⚠️ Waarschuwing: Vermijd global waar mogelijk! Het maakt code moeilijk te testen en te debuggen. Geef variabelen liever door als parameters.

Beter:

<?php
$teller = 0;

function verhoogTeller($huidigeWaarde) {
    return $huidigeWaarde + 1;
}

$teller = verhoogTeller($teller);
$teller = verhoogTeller($teller);
$teller = verhoogTeller($teller);

echo "Teller: $teller"; // Teller: 3
?>
Static Variables
Een static variabele behoudt zijn waarde tussen functie aanroepen:

<?php
function telAanroepen() {
    static $aanroepen = 0;
    $aanroepen++;
    echo "Deze functie is $aanroepen keer aangeroepen<br>";
}

telAanroepen(); // 1 keer
telAanroepen(); // 2 keer
telAanroepen(); // 3 keer
?>
5.9 Anonymous Functions & Arrow Functions
Anonymous Functions (Closures)
Een anonymous function (ook wel closure of lambda) is een functie zonder naam:

<?php
$begroet = function($naam) {
    return "Hallo, $naam!";
};

echo $begroet("Lisa"); // Hallo, Lisa!
?>
Gebruik in array functies:

<?php
$getallen = [1, 2, 3, 4, 5];

$verdubbeld = array_map(function($getal) {
    return $getal * 2;
}, $getallen);

print_r($verdubbeld); // [2, 4, 6, 8, 10]
?>
Arrow Functions (PHP 7.4+)
Arrow functions zijn een kortere syntax voor simple anonymous functions:

<?php
// Oude manier
$verdubbel = function($x) {
    return $x * 2;
};

// Arrow function (korter!)
$verdubbel = fn($x) => $x * 2;

echo $verdubbel(5); // 10
?>
Met array functies:

<?php
$producten = [
    ['naam' => 'Laptop', 'prijs' => 999],
    ['naam' => 'Muis', 'prijs' => 25],
    ['naam' => 'Toetsenbord', 'prijs' => 75]
];

// Filter producten goedkoper dan €100
$goedkoop = array_filter($producten, fn($p) => $p['prijs'] < 100);

print_r($goedkoop);
?>
🔧 Praktische Oefening 5.6
Opdracht: Maak een data filtering systeem met arrow functions.

Maak een bestand data_filters.php:

<?php
$studenten = [
    ['naam' => 'Lisa', 'leeftijd' => 21, 'cijfer' => 8.5, 'aanwezig' => 95],
    ['naam' => 'Jan', 'leeftijd' => 19, 'cijfer' => 6.2, 'aanwezig' => 80],
    ['naam' => 'Sophie', 'leeftijd' => 20, 'cijfer' => 9.0, 'aanwezig' => 98],
    ['naam' => 'Ahmed', 'leeftijd' => 22, 'cijfer' => 5.5, 'aanwezig' => 70],
    ['naam' => 'Emma', 'leeftijd' => 19, 'cijfer' => 7.8, 'aanwezig' => 88]
];

echo "<h2>🎓 Student Data Filters</h2>";
echo "<div style='background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 25px; border-radius: 15px;'>";

// Filter: Geslaagde studenten (cijfer >= 5.5)
$geslaagd = array_filter($studenten, fn($s) => $s['cijfer'] >= 5.5);
echo "<h3>✅ Geslaagde studenten (" . count($geslaagd) . ")</h3>";
foreach ($geslaagd as $student) {
    echo "<p>{$student['naam']} - Cijfer: {$student['cijfer']}</p>";
}

echo "<hr style='border-color: rgba(255,255,255,0.2);'>";

// Filter: Excellente studenten (cijfer >= 8 EN aanwezigheid >= 90)
$excellent = array_filter($studenten, fn($s) => $s['cijfer'] >= 8 && $s['aanwezig'] >= 90);
echo "<h3>🏆 Excellente studenten (" . count($excellent) . ")</h3>";
foreach ($excellent as $student) {
    echo "<p>{$student['naam']} - Cijfer: {$student['cijfer']}, Aanwezigheid: {$student['aanwezig']}%</p>";
}

echo "<hr style='border-color: rgba(255,255,255,0.2);'>";

// Map: Verhoog alle cijfers met 0.5 (bonus)
$metBonus = array_map(fn($s) => [
    ...$s,
    'cijfer_oud' => $s['cijfer'],
    'cijfer' => min($s['cijfer'] + 0.5, 10)
], $studenten);

echo "<h3>🎁 Cijfers met 0.5 bonus</h3>";
foreach ($metBonus as $student) {
    echo "<p>{$student['naam']}: {$student['cijfer_oud']} → {$student['cijfer']}</p>";
}

echo "<hr style='border-color: rgba(255,255,255,0.2);'>";

// Reduce: Bereken gemiddeld cijfer
$gemiddelde = array_reduce($studenten, fn($carry, $s) => $carry + $s['cijfer'], 0) / count($studenten);
echo "<h3>📊 Klasgemiddelde: " . round($gemiddelde, 2) . "</h3>";

echo "</div>";
?>
5.10 Best Practices voor Functies
1. Single Responsibility Principle
Elke functie moet één ding doen en dan wel goed:

<?php
// ❌ SLECHT: Doet te veel
function verwerkGebruiker($naam, $email) {
    // Valideer
    // Sla op in database
    // Stuur email
    // Log actie
    // Update cache
}

// ✅ GOED: Gebruik aparte functies
function valideerGebruiker($naam, $email) { }
function slaGebruikerOp($naam, $email) { }
function stuurWelkomEmail($email) { }
function logGebruikersActie($actie) { }
?>
2. Gebruik Meaningful Names
<?php
// ❌ SLECHT
function calc($a, $b) { }
function process() { }
function x() { }

// ✅ GOED
function berekenTotaalPrijs($prijs, $btw) { }
function verwerkBestelling() { }
function valideerEmailAdres($email) { }
?>
3. Beperk Aantal Parameters
Meer dan 3-4 parameters? Overweeg een array of object:

<?php
// ❌ TE VEEL PARAMETERS
function maakGebruiker($naam, $email, $leeftijd, $adres, $stad, $postcode, $telefoon) { }

// ✅ BETER: Gebruik array
function maakGebruiker(array $gegevens) {
    // $gegevens['naam'], $gegevens['email'], etc.
}
?>
4. Return Early
Vermijd diepe nesting met early returns:

<?php
// ❌ SLECHT: Diepe nesting
function verwerkBestelling($bestelling) {
    if ($bestelling !== null) {
        if ($bestelling['status'] === 'pending') {
            if ($bestelling['betaald']) {
                // Verwerk bestelling
                return true;
            }
        }
    }
    return false;
}

// ✅ GOED: Early returns
function verwerkBestelling($bestelling) {
    if ($bestelling === null) {
        return false;
    }

    if ($bestelling['status'] !== 'pending') {
        return false;
    }

    if (!$bestelling['betaald']) {
        return false;
    }

    // Verwerk bestelling
    return true;
}
?>
5. Vermijd Side Effects
Pure functions hebben geen side effects (wijzigen geen globale state):

<?php
// ❌ SLECHT: Side effects
$totaal = 0;
function telOp($getal) {
    global $totaal;
    $totaal += $getal; // Wijzigt globale variabele!
}

// ✅ GOED: Pure function
function telOp($totaal, $getal) {
    return $totaal + $getal;
}
?>
5.11 Lab-opdrachten
📝 Lab-opdracht 5.1: Berekeningen met Functies
Opdracht: Maak een functie die twee getallen optelt.

Maak een bestand berekening.php
Maak een functie optellen($a, $b) met return
Test met verschillende getallen
Startcode:

<?php
function optellen($a, $b) {
    // TODO: Return de som
}

// TODO: Test de functie
echo "5 + 10 = " . optellen(5, 10);
?>
📝 Lab-opdracht 5.2: BMI Calculator
Opdracht: Maak een BMI calculator functie.

Maak een bestand bmi.php
Functie berekenBMI($gewicht, $lengte) die BMI berekent
Functie bepaalKlasse($bmi) die de categorie bepaalt
Formule: BMI = gewicht / (lengte * lengte)
BMI Klassen:

< 18.5: Ondergewicht
18.5 - 24.9: Normaal gewicht
25 - 29.9: Overgewicht
30+: Obesitas
Startcode:

<?php
function berekenBMI(float $gewicht, float $lengte): float {
    // TODO: Bereken BMI
}

function bepaalKlasse(float $bmi): string {
    // TODO: Bepaal klasse op basis van BMI
}

// Test
$gewicht = 75; // kg
$lengte = 1.80; // meter

$bmi = berekenBMI($gewicht, $lengte);
$klasse = bepaalKlasse($bmi);

echo "BMI: " . round($bmi, 2) . " - $klasse";
?>
📝 Lab-opdracht 5.3: Functie met Reference
Opdracht: Maak een functie die een banksaldo bijwerkt.

Maak saldo_beheer.php
Functie stortGeld(&$saldo, $bedrag)
Functie neemOp(&$saldo, $bedrag) - check of genoeg saldo
Toon saldo na elke transactie
Startcode:

<?php
function stortGeld(&$saldo, float $bedrag): void {
    // TODO: Verhoog saldo
}

function neemOp(&$saldo, float $bedrag): bool {
    // TODO: Verlaag saldo (check eerst of genoeg saldo)
    // Return true bij succes, false bij onvoldoende saldo
}

$mijnSaldo = 100.00;

echo "Start saldo: €$mijnSaldo<br>";

stortGeld($mijnSaldo, 50);
echo "Na storting: €$mijnSaldo<br>";

neemOp($mijnSaldo, 30);
echo "Na opname: €$mijnSaldo<br>";
?>
5.12 Eindopdrachten
📝 Opdracht 1 ⭐: Wachtwoord Validator
Doel: Maak een wachtwoord validatie systeem met functies.

Eisen:

Functie controleerLengte($wachtwoord, $minLengte = 8)
Functie heeftHoofdletter($wachtwoord)
Functie heeftCijfer($wachtwoord)
Functie heeftSpeciaalTeken($wachtwoord)
Functie valideerWachtwoord($wachtwoord) die alle checks uitvoert
Bestand: wachtwoord_validator.php

Startcode:

<?php
function controleerLengte(string $wachtwoord, int $minLengte = 8): bool {
    // TODO: Return true als wachtwoord lang genoeg is
}

function heeftHoofdletter(string $wachtwoord): bool {
    // TODO: Check of wachtwoord minimaal 1 hoofdletter heeft
    // Hint: gebruik preg_match('/[A-Z]/', $wachtwoord)
}

function heeftCijfer(string $wachtwoord): bool {
    // TODO: Check of wachtwoord minimaal 1 cijfer heeft
}

function heeftSpeciaalTeken(string $wachtwoord): bool {
    // TODO: Check op !@#$%^&*
}

function valideerWachtwoord(string $wachtwoord): array {
    $resultaat = [
        'geldig' => false,
        'fouten' => []
    ];

    // TODO: Voer alle checks uit
    // Als een check faalt, voeg foutmelding toe aan array
    // Als alle checks slagen, set geldig op true

    return $resultaat;
}

// Test cases
$wachtwoorden = [
    "test",
    "Test1234",
    "SecurePass123!",
    "weak"
];

echo "<h2>🔒 Wachtwoord Validator</h2>";
foreach ($wachtwoorden as $ww) {
    $resultaat = valideerWachtwoord($ww);
    // TODO: Toon resultaat met styling
}
?>
📝 Opdracht 2 ⭐⭐: Shopping Cart Systeem
Doel: Bouw een shopping cart met verschillende berekeningsfuncties.

Eisen:

Functie voegProductToe(&$cart, $product, $prijs, $aantal)
Functie berekenSubtotaal($cart)
Functie berekenKorting($subtotaal, $kortingsPercentage)
Functie berekenBTW($bedrag, $btwPercentage = 21)
Functie berekenVerzendkosten($subtotaal, $gratis_vanaf = 50)
Functie berekenTotaal($cart, $korting = 0)
Bestand: shopping_cart.php

Startcode:

<?php
function voegProductToe(array &$cart, string $product, float $prijs, int $aantal = 1): void {
    // TODO: Voeg product toe of verhoog aantal
    // Cart structuur: ['productnaam' => ['prijs' => X, 'aantal' => Y]]
}

function berekenSubtotaal(array $cart): float {
    $totaal = 0;
    // TODO: Loop door cart en bereken totaal
    return $totaal;
}

function berekenKorting(float $subtotaal, float $kortingsPercentage): float {
    // TODO: Bereken kortingsbedrag
}

function berekenBTW(float $bedrag, float $btwPercentage = 21): float {
    // TODO: Bereken BTW bedrag
}

function berekenVerzendkosten(float $subtotaal, float $gratis_vanaf = 50): float {
    // TODO: Return 5.95 als subtotaal < gratis_vanaf, anders 0
}

function berekenTotaal(array $cart, float $kortingsPercentage = 0): array {
    // TODO: Bereken alle bedragen en return array met:
    // - subtotaal
    // - korting
    // - subtotaal_na_korting
    // - btw
    // - verzendkosten
    // - totaal
}

function toonCart(array $cart, array $berekening): void {
    // TODO: Toon mooie cart met alle producten en bedragen
}

// Test
$cart = [];
voegProductToe($cart, "Laptop", 999, 1);
voegProductToe($cart, "Muis", 25, 2);
voegProductToe($cart, "Toetsenbord", 75, 1);

$berekening = berekenTotaal($cart, 10); // 10% korting

toonCart($cart, $berekening);
?>
📝 Opdracht 3 ⭐⭐⭐: Text Analysis Tool
Doel: Maak een text analyzer met diverse analyse functies.

Eisen:

Functie telWoorden($tekst)
Functie telTekens($tekst, $metSpaties = true)
Functie telZinnen($tekst)
Functie berekenLeestijd($tekst, $woordenPerMinuut = 200)
Functie vind MeestVoorkomendWoord($tekst)
Functie berekenLeesbaarheid($tekst) - basis score
Functie haalKeywordsOp($tekst, $aantal = 5)
Functie analyseerTekst($tekst) - complete analyse
Bestand: text_analyzer.php

Startcode:

<?php
function telWoorden(string $tekst): int {
    // TODO: Tel aantal woorden
}

function telTekens(string $tekst, bool $metSpaties = true): int {
    // TODO: Tel karakters
}

function telZinnen(string $tekst): int {
    // TODO: Tel zinnen (splits op . ! ?)
}

function berekenLeestijd(string $tekst, int $woordenPerMinuut = 200): array {
    // TODO: Return array met minuten en seconden
}

function vindMeestVoorkomendWoord(string $tekst): array {
    // TODO: Return ['woord' => X, 'aantal' => Y]
    // Filter stopwoorden: de, het, een, en, van, etc.
}

function berekenLeesbaarheid(string $tekst): array {
    // TODO: Basis leesbaarheidscore
    // Bereken gemiddelde woordlengte
    // Bereken gemiddelde zinlengte
    // Return score tussen 0-100 (hoger = makkelijker)
}

function haalKeywordsOp(string $tekst, int $aantal = 5): array {
    // TODO: Vind meest voorkomende woorden (excl. stopwoorden)
}

function analyseerTekst(string $tekst): array {
    // TODO: Voer alle analyses uit en return complete array
}

function toonAnalyse(array $analyse): void {
    // TODO: Toon analyse in mooi opgemaakt HTML
}

// Test tekst
$tekst = "
PHP is een krachtige programmeertaal die veel wordt gebruikt voor webontwikkeling.
Het is eenvoudig te leren en heeft een grote community.
Veel websites draaien op PHP, waaronder Facebook en Wikipedia.
Met PHP kun je dynamische websites maken die werken met databases.
";

$analyse = analyseerTekst($tekst);
toonAnalyse($analyse);
?>
📝 Opdracht 4 ⭐⭐⭐⭐: Recipe Manager met Scaling
Doel: Bouw een recepten manager die ingrediënten kan schalen.

Eisen:

Functie maakRecept($naam, $personen, $ingredienten, $bereidingstijd)
Functie schaalRecept($recept, $nieuweAantalPersonen)
Functie berekenVoedingswaarden($recept) - basis calculatie
Functie converteerEenheid($hoeveelheid, $vanEenheid, $naarEenheid)
Functie vindVervangingen($ingredient) - suggesties
Functie berekenKosten($recept, $prijzen)
Complete recepten database met meerdere recepten
Bestand: recipe_manager.php

Startcode:

<?php
function maakRecept(
    string $naam,
    int $personen,
    array $ingredienten,
    int $bereidingstijd,
    string $moeilijkheidsgraad = "medium"
): array {
    return [
        'naam' => $naam,
        'personen' => $personen,
        'ingredienten' => $ingredienten,
        'bereidingstijd' => $bereidingstijd,
        'moeilijkheidsgraad' => $moeilijkheidsgraad
    ];
}

function schaalRecept(array $recept, int $nieuweAantalPersonen): array {
    // TODO: Schaal alle ingrediënten evenredig
    // Origineel voor 4 personen, nieuw voor 6 personen = 1.5x
    $factor = $nieuweAantalPersonen / $recept['personen'];

    // TODO: Vermenigvuldig alle hoeveelheden met factor
}

function converteerEenheid(float $hoeveelheid, string $vanEenheid, string $naarEenheid): float {
    // TODO: Converteer tussen verschillende eenheden
    // ml <-> l, g <-> kg, tsp <-> tbsp, etc.
}

function berekenVoedingswaarden(array $recept): array {
    // TODO: Basis berekening calorieën, eiwitten, koolhydraten
    // Gebruik simpele database van ingrediënt voedingswaarden
}

function vindVervangingen(string $ingredient): array {
    // TODO: Geef alternatieven voor een ingredient
    // bijv: "boter" => ["margarine", "olijfolie", "kokosolie"]
}

function berekenKosten(array $recept, array $prijzen): float {
    // TODO: Bereken totale kosten op basis van prijzen database
}

function toonRecept(array $recept, bool $metVoeding = true): void {
    // TODO: Toon recept in mooi opgemaakt HTML
}

// Voorbeeld recepten
$spaghetti = maakRecept(
    "Spaghetti Carbonara",
    4,
    [
        ['naam' => 'spaghetti', 'hoeveelheid' => 400, 'eenheid' => 'g'],
        ['naam' => 'spek', 'hoeveelheid' => 200, 'eenheid' => 'g'],
        ['naam' => 'eieren', 'hoeveelheid' => 4, 'eenheid' => 'stuks'],
        ['naam' => 'parmezaan', 'hoeveelheid' => 100, 'eenheid' => 'g'],
        ['naam' => 'zwarte peper', 'hoeveelheid' => 1, 'eenheid' => 'tl']
    ],
    25,
    "makkelijk"
);

// TODO: Test alle functies
// - Schaal recept voor 2 personen
// - Schaal recept voor 8 personen
// - Bereken voedingswaarden
// - Zoek vervangingen voor spek
// - Bereken kosten
?>
📝 Opdracht 5 ⭐⭐⭐⭐⭐: Advanced API Response Processor
Doel: Bouw een systeem dat API responses verwerkt, valideert en transformeert.

Eisen:

Functie valideerAPIResponse($response, $schema)
Functie transformeerData($data, $transformaties)
Functie filteerData($data, callable $filter)
Functie sorte erData($data, $veld, $richting)
Functie pagineerData($data, $pagina, $perPagina)
Functie cacheResponse($key, $data, $ttl)
Functie haalCacheOp($key)
Functie berekenRateLimits(&$limiter, $userId)
Complete API simulator met error handling
Bestand: api_processor.php

Startcode:

<?php
// Simuleer API response
function simuleerAPICall(string $endpoint): array {
    $responses = [
        '/users' => [
            ['id' => 1, 'naam' => 'Lisa', 'email' => 'lisa@example.com', 'rol' => 'admin', 'actief' => true],
            ['id' => 2, 'naam' => 'Jan', 'email' => 'jan@example.com', 'rol' => 'gebruiker', 'actief' => true],
            ['id' => 3, 'naam' => 'Sophie', 'email' => 'sophie@example.com', 'rol' => 'moderator', 'actief' => false],
            // ... meer users
        ],
        '/products' => [
            ['id' => 101, 'naam' => 'Laptop', 'prijs' => 999, 'categorie' => 'Electronics', 'voorraad' => 15],
            ['id' => 102, 'naam' => 'Muis', 'prijs' => 25, 'categorie' => 'Accessories', 'voorraad' => 50],
            // ... meer producten
        ]
    ];

    return $responses[$endpoint] ?? [];
}

function valideerAPIResponse(array $response, array $schema): array {
    // TODO: Valideer of response voldoet aan schema
    // Schema voorbeeld: ['id' => 'int', 'naam' => 'string', 'email' => 'email']
    // Return: ['geldig' => bool, 'fouten' => array]
}

function transformeerData(array $data, array $transformaties): array {
    // TODO: Pas transformaties toe op data
    // Transformaties: ['veld' => callable]
    // Bijv: ['prijs' => fn($p) => $p * 1.21] (voeg BTW toe)
}

function filteerData(array $data, callable $filter): array {
    // TODO: Filter data met custom filter functie
    return array_filter($data, $filter);
}

function sorteerData(array $data, string $veld, string $richting = 'asc'): array {
    // TODO: Sorteer data op specifiek veld
    // Richting: 'asc' of 'desc'
}

function pagineerData(array $data, int $pagina, int $perPagina): array {
    // TODO: Return gepagineerde data
    // Return: ['data' => [...], 'pagina' => X, 'totaal_paginas' => Y, 'totaal_items' => Z]
}

// Cache systeem (simpel, gebruik array als "cache")
$cache = [];

function cacheResponse(string $key, array $data, int $ttl = 3600): void {
    global $cache;
    $cache[$key] = [
        'data' => $data,
        'expires' => time() + $ttl
    ];
}

function haalCacheOp(string $key): ?array {
    global $cache;

    if (!isset($cache[$key])) {
        return null;
    }

    if ($cache[$key]['expires'] < time()) {
        unset($cache[$key]);
        return null;
    }

    return $cache[$key]['data'];
}

// Rate limiting
function berekenRateLimits(array &$limiter, string $userId, int $maxRequests = 100, int $timeWindow = 3600): array {
    // TODO: Implementeer rate limiting
    // Track aantal requests per user per tijdwindow
    // Return: ['toegestaan' => bool, 'resterend' => X, 'reset_over' => Y seconden]
}

// Main API processor
function verwerkAPIRequest(
    string $endpoint,
    array $filters = [],
    array $transformaties = [],
    ?string $sorteerVeld = null,
    string $sorteerRichting = 'asc',
    int $pagina = 1,
    int $perPagina = 10
): array {
    // TODO: Complete API verwerkingspipeline:
    // 1. Check cache
    // 2. Check rate limits
    // 3. Haal data op
    // 4. Valideer response
    // 5. Pas filters toe
    // 6. Transformeer data
    // 7. Sorteer
    // 8. Pagineer
    // 9. Cache resultaat
    // 10. Return met metadata
}

// Test het systeem
echo "<h2>🔌 API Response Processor</h2>";
echo "<div style='background: #1a1a1a; color: #00ff00; padding: 25px; border-radius: 15px; font-family: monospace;'>";

$result = verwerkAPIRequest(
    '/users',
    ['actief' => true, 'rol' => ['admin', 'moderator']], // Filters
    ['email' => fn($e) => strtolower($e)], // Transformaties
    'naam', // Sorteer veld
    'asc', // Sorteer richting
    1, // Pagina
    5 // Per pagina
);

// TODO: Toon resultaat met mooie formatting
// Toon: data, metadata (pagina info, rate limits, cache status)

echo "</div>";
?>
Extra uitdagingen:

Implementeer query builder voor complexe filters
Voeg data aggregatie toe (sum, average, count)
Maak een export functie (JSON, CSV, XML)
Implementeer webhooks voor data updates
Voeg error retry logica toe met exponential backoff
5.13 Samenvatting
🎉 Gefeliciteerd! Je beheerst nu functies in PHP!

Wat heb je geleerd?
✅ Functie Basics

Functies maken met function keyword
Functies aanroepen
Naming conventions (camelCase, beschrijvend)
✅ Parameters & Return

Parameters doorgeven (by value)
Reference parameters met &
Return values en type declarations
Default parameters
✅ Scope

Local vs global scope
global keyword (vermijd waar mogelijk)
static variables
✅ Moderne PHP

Anonymous functions (closures)
Arrow functions (fn() =>)
Type hints en return types
mixed, void, strict types
✅ Best Practices

Single Responsibility Principle
Pure functions (geen side effects)
Early returns
Meaningful names
DRY principle
Veelgemaakte Fouten
❌ Vergeten return:

function optellen($a, $b) {
    $a + $b; // Vergeten return!
}
$resultaat = optellen(5, 10); // NULL!
❌ Global misbruiken:

// Slecht:
global $config;
function doSomething() {
    global $config; // Vermijd dit!
}

// Beter:
function doSomething($config) {
    // Geef als parameter door
}
❌ Te veel parameters:

// Slecht:
function create($a, $b, $c, $d, $e, $f, $g) { }

// Beter:
function create(array $data) { }
Volgende Stappen
In hoofdstuk 6 gaan we verder met:

Object-Oriented Programming (OOP)
Classes en objects
Properties en methods
Constructors en destructors
Inheritance en polymorphism
5.14 Bronnen
📚 Officiële Documentatie (2026)
PHP Manual: Functions - Complete functie documentatie
PHP Manual: Anonymous Functions - Closures en callbacks
PHP Manual: Arrow Functions - Modern short syntax (PHP 7.4+)
PHP 8.3 Release Notes - Nieuwste features 2026
PHP: The Right Way - Functions - Best practices
🎓 Tutorials en Leermateriaal
W3Schools PHP Functions - Basis tutorials met voorbeelden
PHP Apprentice: Functions - Interactieve gids
Laracasts: PHP Functions - Video tutorial 2025
freeCodeCamp: PHP Functions Guide - Uitgebreide artikelen
Codecademy: PHP Functions - Hands-on oefeningen
🛠️ Online Tools
PHP Sandbox - Test functies online
3v4l.org - Test op 300+ PHP versies
PHPFiddle - Snel code delen en testen
OnlineGDB PHP - Met debugging support
Replit PHP - Collaborative coding
📱 Mobile Apps
SoloLearn: PHP - Functions module
Programming Hub - PHP functions op mobiel
Mimo - Dagelijkse function challenges
Enki App - PHP workouts
🎮 Coding Challenges
Codewars PHP - Function challenges (8 kyu - 1 kyu)
HackerRank PHP - Structured exercises
LeetCode - Algoritme oefeningen
Exercism PHP Track - Mentored learning
CodeSignal - Interview prep
🇳🇱 Nederlandse Bronnen
PHP.nl Forum: Functions - Nederlandse discussies
Sitemasters: PHP Functies - NL tutorials
YouTube: PHP Functies Nederlands 2025 - Video’s
Reddit r/thenetherlands - DevNL - NL developers
📖 Aanbevolen Boeken (2024-2026)
“Modern PHP (2024 Edition)” - Josh Lockhart
Hoofdstuk over functions en closures
Best practices voor PHP 8.3+
“PHP 8 Objects, Patterns, and Practice” - Matt Zandstra
Geavanceerde function technieken
Design patterns met functions
“Clean Code in PHP” - Carsten Windler & Alexandre Daubois
Function design principles
Refactoring technieken
“PHP Cookbook (4th Edition)” - David Sklar
300+ function recipes
Real-world voorbeelden
🎥 Video Cursussen (2025-2026)
Laracasts: PHP Foundations - Gratis modern PHP
Udemy: PHP Functions Mastery 2025 - Diepgaande cursus
YouTube: Traversy Media PHP - Praktische tutorials
LinkedIn Learning: PHP Functions - Professional training
Pluralsight: PHP Path - Complete learning path
💡 Advanced Resources
PHP Internals: How Functions Work - Deep dive
RFC: PHP Function Features - Toekomstige features
PHP Source Code - Leer van de source
Awesome PHP - Curated resources
PHP Weekly - Wekelijkse updates 2026
🆘 Community & Hulp
Stack Overflow - PHP Functions Tag - Q&A
Reddit r/PHP - 200K+ developers
Reddit r/PHPhelp - Specifieke hulp
PHP Discord - Real-time chat
Laracasts Forum - Actieve community
🔧 Development Tools
PhpStorm - Function hints & refactoring
VS Code + Intelephense
Xdebug - Function debugging & profiling
PHPStan - Static analysis voor functions
PHP CS Fixer - Code style
📊 Cheat Sheets
PHP Functions Cheat Sheet - Visual reference
DevHints PHP - Snelle lookup
OverAPI PHP - Alle functies
LearnXinYMinutes PHP - Quick overview
🔬 Testing
PHPUnit - Unit testing voor functions
Pest PHP - Modern testing framework
Mockery - Mocking library
Codeception - Full-stack testing
🌐 Function Libraries
Laravel Helpers - Useful function collection
Symfony Functions - Debug functies
Underscore.php - Functional programming
Functional PHP - FP library
📈 PHP 8.3+ Function Features (2026)
Nieuwe features in PHP 8.3 (2023) en 8.4 (2024):

<?php
// PHP 8.0+: Named Arguments
function maakGebruiker($naam, $email, $rol = 'user') {
    // ...
}
maakGebruiker(rol: 'admin', naam: 'Lisa', email: 'lisa@example.com');

// PHP 8.0+: Union Types
function process(int|float $number): int|float {
    return $number * 2;
}

// PHP 8.1+: Pure Intersection Types
function test(Countable&Traversable $collection) { }

// PHP 8.2+: DNF Types (Disjunctive Normal Form)
function example((A&B)|C $param) { }

// PHP 8.3+: Typed Class Constants
class Config {
    public const string API_KEY = "secret";
}
?>
🎯 Learning Paths
Beginner:
W3Schools basics → Codecademy → Lab opdrachten uit dit hoofdstuk
Intermediate:
PHP.net docs → Codewars (7-6 kyu) → Eindopdrachten ⭐⭐⭐
Advanced:
Clean Code principes → Design Patterns → Open source contributions
💪 Practice Projects
Bouw deze projecten om function skills te ontwikkelen:

Calculator API - RESTful calculator met verschillende operaties
Text Processor - String manipulatie toolkit
Data Validator - Form validation library
Template Engine - Simple templating system
Query Builder - Database query builder
Math Library - Scientific calculations
🚀 Keep Coding! Functies zijn de kern van programmeren - master ze en je code wordt elegant en herbruikbaar!

💬 Feedback? Vragen over dit hoofdstuk? Vraag je docent of post in het PHP.nl forum!

© 2025 ROC-Midden Nederland – ICT-College – Amersfoort, Nederland

MBO Niveau 4 - Software Developer

PHP Tutorials – Functies in PHP

PHP Tutorial
ROC ICA Logo
📋 Hoofdstuk 6: Werken met Formulieren en Gegevensverwerking in PHP
In dit hoofdstuk gaan we aan de slag met formulieren en gegevensverwerking in PHP. Formulieren zijn een belangrijk onderdeel van veel webapplicaties. Ze maken het mogelijk om gegevens van gebruikers te verzamelen, zoals hun naam, e-mailadres of andere informatie. PHP stelt je in staat om deze gegevens te verwerken en te gebruiken in je code.

🎯 Leerdoelen
Na dit hoofdstuk kun je:

HTML-formulieren maken en koppelen aan PHP
Gegevens verwerken met $_POST en $_GET
Het verschil tussen POST en GET uitleggen en toepassen
Formuliergegevens valideren op correctheid
Gebruikers omleiden na formulierverwerking
Het POST-Redirect-GET patroon implementeren
Beveiligde formulieren maken met input sanitization
6.1 HTML Formulieren en PHP
Een HTML-formulier is de interface waarmee een gebruiker gegevens kan invoeren. Het formulier verzendt deze gegevens naar een PHP-script, dat de gegevens kan verwerken, opslaan en weergeven.

📝 Voorbeeld van een Simpel HTML Formulier
Hieronder staat een basisformulier waarin de gebruiker zijn naam en leeftijd kan invoeren:

<form action="processForm.php" method="POST">
    Name: <input type="text" name="name"><br>
    Age: <input type="text" name="age"><br>
    <input type="submit" value="Submit">
</form>
🔍 Uitleg van de HTML-code
action: Het bestand waar de gegevens naartoe worden verzonden. In dit geval gaat het naar processForm.php.
method="POST": De HTTP-methode waarmee de gegevens worden verzonden. POST wordt meestal gebruikt bij het versturen van gevoelige of grotere gegevens.
name: De naam van het formulierveld. Deze naam wordt gebruikt om de verzonden waarde in PHP te identificeren.
💼 Engels als Standaard in Professionele Code
In de professionele wereld wordt Engels als standaard gebruikt voor:

Formulierveldnamen (name, email, age in plaats van naam, email, leeftijd)
Bestandsnamen (processForm.php in plaats van verwerk_formulier.php)
Variabelenamen in PHP
Commentaar in code (optioneel, afhankelijk van het team)
Waarom Engels?

Code wordt internationaal begrijpbaar
Samenwerking met internationale teams
Consistentie met frameworks en libraries (die Engels gebruiken)
Beter voor je CV en toekomstige carrière
Voor dit leerproces gebruiken we een mix: Engels voor code-elementen (zoals variabelen en functienamen) en Nederlands voor uitleg. Tijdens het leren mag je ook Nederlandse variabelenamen gebruiken, maar oefen regelmatig met Engels!

6.2 Het Verwerken van Formuliergegevens in PHP
Wanneer een formulier is verzonden, kun je de gegevens in PHP ophalen met behulp van $_POST (voor formulieren met method="POST") of $_GET (voor formulieren met method="GET").

📊 Voorbeeld van Gegevensverwerking met $_POST
Stel dat we het formulier van hierboven hebben verzonden naar processForm.php. Zo kun je de ingevoerde gegevens ophalen en weergeven in PHP:

<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];

    echo "Hello, " . htmlspecialchars($name) . "! You are " . htmlspecialchars($age) . " years old.";
}
?>
🔍 Uitleg van de PHP-code
$_POST["name"] en $_POST["age"]: Hiermee haal je de waarde op die door de gebruiker is ingevoerd in het veld met de naam name en age.
htmlspecialchars(): Deze functie voorkomt dat gebruikers schadelijke code kunnen invoeren door speciale karakters om te zetten in HTML-entities. Dit beschermt tegen Cross-Site Scripting (XSS)-aanvallen.
$_SERVER["REQUEST_METHOD"]: Controleert of het formulier via POST is verzonden.
🔒 Security Best Practice
Altijd htmlspecialchars() gebruiken bij het weergeven van gebruikersinvoer!

// ❌ NIET VEILIG - kwetsbaar voor XSS
echo "Hello, " . $_POST["name"];

// ✅ VEILIG - beschermt tegen XSS
echo "Hello, " . htmlspecialchars($_POST["name"]);
6.3 $_GET en $_POST: Verschillen en Gebruik
📮 $_POST
Gegevens worden verzonden in de HTTP-request body en zijn niet zichtbaar in de URL
Dit is veiliger voor gevoelige informatie, zoals wachtwoorden
Geen limiet aan de hoeveelheid data die verzonden kan worden
Geschikt voor: inlogformulieren, registratie, bestellingen
🔗 $_GET
Gegevens worden verzonden in de URL als querystring (na een vraagteken)
Dit is nuttig voor korte gegevens of navigatie-informatie, zoals een paginanummer
Houd er rekening mee dat $_GET-gegevens zichtbaar zijn in de URL
Niet geschikt voor gevoelige informatie
Limiet van ongeveer 2000 karakters (afhankelijk van browser)
Geschikt voor: zoekfuncties, filters, paginering
📝 Voorbeeld van $_GET
<form action="search.php" method="GET">
    Search term: <input type="text" name="searchTerm">
    <input type="submit" value="Search">
</form>
Wanneer dit formulier wordt verzonden, zal de URL bijvoorbeeld veranderen naar:

search.php?searchTerm=PHP
De gegevens ophalen in PHP:

<?php
if (isset($_GET["searchTerm"])) {
    $searchTerm = htmlspecialchars($_GET["searchTerm"]);
    echo "You searched for: " . $searchTerm;
}
?>
🎯 Wanneer gebruik je wat?
Situatie	Methode	Reden
Inlogformulier	POST	Wachtwoord mag niet in URL
Zoekfunctie	GET	URL kan gebookmarkt worden
Contactformulier	POST	Grote hoeveelheid data
Filteropties	GET	Gebruiker kan link delen
Registratieformulier	POST	Privégegevens
Paginanummer	GET	Navigeerbare URL’s
6.4 Validatie van Formuliergegevens
Validatie controleert of de gegevens die de gebruiker heeft ingevoerd aan bepaalde criteria voldoen. Dit kan voorkomen dat er foutieve of ongewenste gegevens worden verwerkt.

✅ Basis Validatie in PHP
Laten we een voorbeeld bekijken waarin we controleren of de gebruiker zowel zijn naam als leeftijd heeft ingevoerd:

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $age = trim($_POST["age"]);

    $errors = [];

    // Validate name
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    // Validate age
    if (empty($age)) {
        $errors[] = "Age is required.";
    } elseif (!is_numeric($age)) {
        $errors[] = "Age must be a number.";
    } elseif ($age < 0 || $age > 120) {
        $errors[] = "Age must be between 0 and 120.";
    }

    // Check if there are errors
    if (empty($errors)) {
        echo "<p>Hello, " . htmlspecialchars($name) . "! You are " . htmlspecialchars($age) . " years old.</p>";
    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
?>
🔍 Uitleg van Validatie Functies
empty(): Controleert of een waarde leeg is. Let op: 0 en "0" worden ook als leeg beschouwd!
is_numeric(): Controleert of de waarde numeriek is (een getal).
trim(): Verwijdert onnodige spaties aan het begin en einde van de invoer.
🎨 Verschillende Validatie Types
<?php
// Email validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email address.";
}

// String length validation
if (strlen($username) < 3 || strlen($username) > 20) {
    $errors[] = "Username must be between 3 and 20 characters.";
}

// Pattern validation (letters only)
if (!preg_match("/^[a-zA-Z]*$/", $name)) {
    $errors[] = "Name can only contain letters.";
}

// URL validation
if (!filter_var($website, FILTER_VALIDATE_URL)) {
    $errors[] = "Invalid URL.";
}
?>
6.5 Het Gebruik van isset() en empty()
De functies isset() en empty() zijn belangrijk bij het werken met formulieren om te controleren of een variabele bestaat en een waarde heeft.

🔍 isset($variable)
Controleert of een variabele bestaat en niet NULL is.

<?php
if (isset($_POST["name"])) {
    echo "The name field exists.";
}
?>
🔍 empty($variable)
Controleert of een variabele leeg is. Lege waarden zoals "", 0, NULL, false, of een lege array worden als leeg beschouwd.

<?php
if (empty($_POST["name"])) {
    echo "The name field is empty.";
}
?>
📊 Vergelijking tussen isset() en empty()
Waarde	isset()	empty()
"" (lege string)	true	true
0	true	true
"0"	true	true
NULL	false	true
false	true	true
[] (lege array)	true	true
niet gedeclareerd	false	true
"Hello"	true	false
💡 Best Practice: Combineer isset() en empty()
<?php
// Check if field exists AND is not empty
if (isset($_POST["name"]) && !empty($_POST["name"])) {
    echo "<p>Name is filled in.</p>";
} else {
    echo "<p>Name is not filled in.</p>";
}

// Modern PHP 7+ alternative: null coalescing operator
$name = $_POST["name"] ?? "";  // Returns "" if not set
?>
6.6 Redirecten na Formulierverwerking
Na het verwerken van een formulier kun je de gebruiker omleiden naar een andere pagina, bijvoorbeeld naar een bedankpagina. Dit doe je met de header()-functie.

🔄 Voorbeeld van Redirect
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the data
    $name = htmlspecialchars($_POST["name"]);
    // Save to database, send email, etc.

    // Redirect to thank you page
    header("Location: thankyou.php");
    exit;
}
?>
⚠️ Belangrijke Regels voor header()
Geen output vóór header(): Zorg ervoor dat je geen output hebt (geen echo, geen HTML, geen spaties) vóór de header()-functie, anders veroorzaakt dit een fout.
<?php
// ❌ FOUT - output vóór header()
echo "Processing...";
header("Location: thankyou.php");

// ✅ CORRECT - geen output vóór header()
header("Location: thankyou.php");
exit;
?>
Altijd exit na header(): Voorkom dat code erna nog wordt uitgevoerd.

Gebruik absolute of relatieve paden:

header("Location: thankyou.php");  // Relative path
header("Location: /contact/thankyou.php");  // Absolute path
header("Location: https://example.com/thankyou.php");  // Full URL
6.7 Het POST-Redirect-GET Patroon
Het POST-Redirect-GET (PRG) patroon is een veelgebruikte best practice om problemen zoals dubbele formulierverzending te voorkomen. Dit patroon zorgt voor een betere gebruikerservaring en voorkomt dat gegevens per ongeluk meerdere keren worden opgeslagen of verwerkt.

🔄 Wat is het POST-Redirect-GET Patroon?
Het PRG-patroon bestaat uit drie stappen:

POST: De gebruiker verzendt een formulier met de methode POST. Dit verzoek stuurt gegevens naar de server, waar ze worden verwerkt.

Redirect: Na het verwerken van de gegevens voert de server een redirect uit naar een andere pagina met de HTTP-statuscode 302 Found (of 303 See Other), waarbij de Location-header wordt gebruikt.

GET: De gebruiker wordt door de browser automatisch doorgestuurd naar de nieuwe pagina. Dit verzoek is een GET-verzoek, waarmee alleen gegevens worden opgehaald zonder nieuwe verwerking.

✅ Waarom het PRG-patroon gebruiken?
Voorkomt Dubbele Formulierverzending

Als een gebruiker een formulier verzendt met POST en de pagina vervolgens opnieuw laadt (F5), wordt het formulier opnieuw verzonden
Met het PRG-patroon voorkom je dit, omdat de gebruiker na de POST-verwerking wordt omgeleid naar een nieuwe GET-pagina
Zo is de herlaadactie veilig en veroorzaakt het geen nieuwe formulierverzending
Betere Gebruikerservaring

Door het PRG-patroon toe te passen, kun je de gebruiker omleiden naar een bedankpagina of een pagina met een bevestiging
Dit zorgt voor duidelijkheid en geeft een beter overzicht van de status van hun actie
Geschikt voor SEO en Bookmarks

Bij het PRG-patroon leidt de uiteindelijke pagina die de gebruiker ziet tot een GET-verzoek
Waardoor deze pagina gemakkelijker kan worden gebookmarkt en beter toegankelijk is voor zoekmachines
🛠️ Implementatie van het PRG-patroon
Stap 1: Maak een HTML Formulier
<!-- contact.php -->
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
</head>
<body>
    <h1>Contact Us</h1>
    <form action="processContact.php" method="POST">
        Name: <input type="text" name="name" required><br>
        Message: <textarea name="message" required></textarea><br>
        <input type="submit" value="Send">
    </form>
</body>
</html>
Stap 2: Verwerk het Formulier en Voer een Redirect Uit
<?php
// processContact.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validate the data
    if (empty($name) || empty($message)) {
        header("Location: contact.php?error=empty");
        exit;
    }

    // Process the message (e.g., save to database, send email)
    // ... your processing code here ...

    // Redirect to thank you page
    header("Location: thankyou.php");
    exit;
}
?>
Stap 3: Toon de Bedankpagina
<!-- thankyou.php -->
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Thank You</title>
</head>
<body>
    <h1>Thank you for your message!</h1>
    <p>We have received your message and will get back to you as soon as possible.</p>
    <p><a href="contact.php">Send another message</a></p>
</body>
</html>
💡 PRG-patroon met Sessies (Geavanceerd)
Je kunt het PRG-patroon combineren met sessies om success-berichten door te geven:

<?php
// processContact.php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Process the data...

    // Store success message in session
    $_SESSION['success_message'] = "Thank you, $name! Your message has been sent.";

    // Redirect
    header("Location: contact.php");
    exit;
}
?>
<?php
// contact.php
session_start();

// Display success message if exists
if (isset($_SESSION['success_message'])) {
    echo "<p style='color: green;'>" . $_SESSION['success_message'] . "</p>";
    unset($_SESSION['success_message']);  // Remove after displaying
}
?>
<!-- Rest of the contact form... -->
📦 Voorbeeld Scenario: E-commerce Bestelling
Een praktisch voorbeeld van het PRG-patroon is bij een webwinkel waar gebruikers een bestelling plaatsen:

POST: Gebruiker vult bestelformulier in en verzendt (bestel.php → verwerkBestelling.php)
Verwerking: Bestelling wordt opgeslagen in database, ordernummer wordt gegenereerd
Redirect: Gebruiker wordt doorgestuurd naar bevestigingspagina
GET: Bevestigingspagina toont ordernummer en details (bevestiging.php?order=12345)
Hierdoor wordt voorkomen dat gebruikers per ongeluk dezelfde bestelling meerdere keren plaatsen door de pagina te verversen!

🔧 6.8 Praktische Oefeningen
Oefening 6.1: Simpel Contactformulier
Maak een contactformulier met de volgende velden:

Naam (verplicht)
E-mail (verplicht, moet geldig e-mailadres zijn)
Bericht (verplicht, minimaal 10 karakters)
Valideer alle invoer en toon foutmeldingen indien nodig.

Tip: Gebruik filter_var($email, FILTER_VALIDATE_EMAIL) voor e-mailvalidatie.

Oefening 6.2: Zoekformulier met GET
Maak een zoekformulier dat gebruik maakt van de GET-methode:

Eén tekstveld voor de zoekterm
Toon de zoekterm op de resultatenpagina
Zorg dat de URL bookmarkbaar is
Bonus: Voeg een filter toe (bijvoorbeeld categorie) die ook via GET wordt meegegeven.

Oefening 6.3: Registratieformulier met Validatie
Maak een registratieformulier met:

Username (minimaal 3 karakters, alleen letters en cijfers)
E-mail (geldig formaat)
Wachtwoord (minimaal 8 karakters)
Wachtwoord bevestigen (moet overeenkomen)
Leeftijd (moet tussen 16 en 99 zijn)
Implementeer uitgebreide validatie en toon alle fouten in één keer.

📝 6.9 Lab-opdrachten
Lab-opdracht 6.1: Eenvoudig Inlogformulier
Opdracht: Maak een inlogformulier en controleer of de ingevoerde gebruikersnaam en wachtwoord correct zijn.

Stappen:

Maak een bestand login.php
Maak een formulier met velden voor gebruikersnaam en wachtwoord
Verwerk de gegevens in PHP en controleer of de gebruikersnaam "admin" en het wachtwoord "1234" is
Toon een succesbericht of een foutmelding
Startcode:

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // TODO: Implement login logic here
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="login.php">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
Uitdaging: Voeg een “Remember me” checkbox toe die de gebruikersnaam opslaat.

Lab-opdracht 6.2: Leeftijdscontrole met Validatie
Opdracht: Maak een formulier waarin een gebruiker zijn leeftijd invoert en geef een bericht op basis van de ingevoerde waarde.

Stappen:

Maak een bestand age.php
Maak een formulier waarin de gebruiker zijn leeftijd invoert
Verwerk de gegevens en controleer of de leeftijd is ingevoerd en een geldig getal is
Toon een bericht zoals:
“You are old enough to vote.” (18+)
“You are a teenager.” (13-17)
“You are a child.” (0-12)
“Invalid age.” (negatief of > 120)
Startcode:

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // TODO: Implement age validation and message logic
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Age Check</title>
</head>
<body>
    <h1>Age Verification</h1>
    <form method="POST" action="age.php">
        Age: <input type="text" name="age"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
Lab-opdracht 6.3: PRG Patroon Toevoegen
Opdracht: Zorg ervoor dat zowel in de eerste als tweede lab een form re-submit wordt voorkomen door een PRG-patroon hieraan toe te voegen.

Stappen:

Pas login.php aan zodat het PRG-patroon wordt gebruikt
Maak een loginSuccess.php pagina waar de gebruiker naartoe wordt geleid na succesvol inloggen
Pas age.php aan met het PRG-patroon
Maak een ageResult.php pagina die het resultaat toont
Tip: Gebruik sessies om de gegevens door te geven tussen de verwerking en de resultaatpagina:

<?php
session_start();
$_SESSION['user_data'] = $data;
header("Location: result.php");
exit;
?>
⭐ 6.10 Eindopdrachten
Eindopdracht 6.1: Basis Contactformulier (⭐)
Beschrijving: Bouw een compleet contactformulier met validatie en bedankpagina.

Requirements:

Formulier met naam, e-mail en bericht
Validatie voor alle velden
Gebruik van htmlspecialchars() voor beveiliging
Implementeer het PRG-patroon
Toon foutmeldingen bij ongeldige invoer
Bedankpagina na succesvol verzenden
Acceptatiecriteria:

Alle velden zijn verplicht
E-mail moet geldig zijn
Bericht moet minimaal 10 karakters bevatten
Formulier kan niet dubbel verzonden worden
Eindopdracht 6.2: Geavanceerde Registratie (⭐⭐)
Beschrijving: Maak een registratieformulier met uitgebreide validatie en gebruikersfeedback.

Requirements:

Formuliervelden: username, email, password, confirmPassword, age, termsAccepted (checkbox)
Uitgebreide validatie:
Username: 3-20 karakters, alleen letters, cijfers en underscore
Email: geldig formaat
Password: minimaal 8 karakters, moet letter en cijfer bevatten
Wachtwoorden moeten overeenkomen
Age: tussen 16 en 99
Algemene voorwaarden moeten geaccepteerd zijn
Toon alle fouten tegelijk (niet één voor één)
Client-side EN server-side validatie
PRG-patroon implementatie
Success pagina met overzicht van ingevoerde gegevens (zonder wachtwoord!)
Bonus:

Voeg een “Show password” toggle toe
Voeg een password strength indicator toe
Gebruik CSS voor visuele feedback bij validatie
Eindopdracht 6.3: Geavanceerd Zoeksysteem (⭐⭐⭐)
Beschrijving: Bouw een zoeksysteem met filters voor een productenlijst.

Requirements:

Array met minimaal 20 producten (naam, prijs, categorie, merk)
Zoekformulier met GET-methode
Zoekfunctionaliteit op productnaam
Filters:
Categorie (dropdown)
Prijsrange (min/max inputs)
Merk (checkboxes)
Sorteeropties (prijs oplopend/aflopend, naam A-Z/Z-A)
Resultaten tonen met gevonden producten
URL moet bookmarkbaar zijn (alle filters in URL)
“Clear filters” knop
Toon aantal gevonden resultaten
Voorbeeld producten:

<?php
$products = [
    ["name" => "iPhone 15 Pro", "price" => 1199, "category" => "smartphones", "brand" => "Apple"],
    ["name" => "Samsung Galaxy S24", "price" => 899, "category" => "smartphones", "brand" => "Samsung"],
    ["name" => "MacBook Air M3", "price" => 1299, "category" => "laptops", "brand" => "Apple"],
    // ... add more products
];
?>
Bonus:

Paginering toevoegen (10 resultaten per pagina)
“No results found” bericht met suggesties
Highlight de zoekterm in de resultaten
Eindopdracht 6.4: Feedback Systeem met Rating (⭐⭐⭐⭐)
Beschrijving: Creëer een feedback formulier waarbij gebruikers producten kunnen reviewen met rating, en alle reviews kunnen bekijken.

Requirements:

Formulier met: naam, email, rating (1-5 sterren), titel, review, aanbeveling (ja/nee radio)
Reviews opslaan in een tekstbestand of array in een session
Overzichtspagina met alle reviews
Sorteer reviews op rating of datum
Filter reviews op minimale rating
Validatie:
Alle velden verplicht
Review minimaal 20 karakters
Email geldig
Rating tussen 1-5
PRG-patroon
Reviews tonen met:
Visuele sterren (★★★★☆)
Datum van review
Aanbevelingspercentage
“Was deze review nuttig?” functionaliteit
Bonus:

File handling: sla reviews op in JSON-bestand
Zoekfunctie in reviews
Mogelijkheid om reviews te rapporteren
Gemiddelde rating berekenen en tonen
Eindopdracht 6.5: Complete Bestelformulier (⭐⭐⭐⭐⭐)
Beschrijving: Bouw een volledig bestelformulier voor een webshop met meerdere stappen en complete validatie.

Requirements:

Stap 1: Productkeize

Lijst met producten (minimaal 10)
Gebruiker kan producten selecteren met aantal
“Voeg toe aan winkelmandje” functionaliteit
Winkelmandje tonen met totaalprijs
Producten verwijderen uit winkelmandje
Stap 2: Klantgegevens

Formulier met: voornaam, achternaam, email, telefoon, adres, postcode, stad, land
Validatie voor alle velden
Postcode validatie (Nederlands formaat: 1234 AB)
Telefoonnummer validatie
Checkbox: “Gebruik andere factuuradres”
Als checked: extra formulier voor factuuradres
Stap 3: Verzending & Betaling

Verzendmethode kiezen (standaard €5, express €10)
Betaalmethode kiezen (iDeal, creditcard, PayPal)
Algemene voorwaarden accepteren
Overzicht van complete bestelling
Stap 4: Bevestiging

Bedankpagina met ordernummer
Overzicht van bestelde producten
Bezorgadres
Totaalprijs inclusief verzendkosten
Geschatte levertijd
Technische Requirements:

Gebruik sessies voor winkelmandje en formulierdata
PRG-patroon op elke stap
Uitgebreide validatie op elke stap
Mogelijkheid om terug te gaan naar vorige stap
Gebruiker kan pas naar volgende stap als huidige stap geldig is
“Opslaan en later verder” functionaliteit (bonus)
Security Requirements:

Alle input sanitizen met htmlspecialchars()
CSRF-protectie (token in hidden field)
Session hijacking preventie
Bonus:

Email bevestiging sturen (simuleer met echo)
PDF factuur genereren (simuleer met formatted text)
Kortingscode systeem
BTW berekening (21% of 9% voor bepaalde producten)
📚 6.11 Samenvatting
In dit hoofdstuk heb je geleerd:

✅ HTML Formulieren maken en koppelen aan PHP met action en method attributen

✅ Gegevens verwerken met $_POST en $_GET superglobals

✅ Het verschil tussen POST en GET:

POST: niet zichtbaar in URL, voor gevoelige data
GET: zichtbaar in URL, voor filters en zoeken
✅ Formuliergegevens valideren met functies zoals:

empty() - controleert of waarde leeg is
is_numeric() - controleert of waarde een getal is
filter_var() - valideert emails en URLs
strlen() - controleert lengte van strings
preg_match() - controleert patronen
✅ Input beveiligen met htmlspecialchars() tegen XSS-aanvallen

✅ Variabelen controleren met isset() en empty()

✅ Gebruikers omleiden na formulierverwerking met header("Location: ...")

✅ POST-Redirect-GET patroon implementeren om dubbele formulierverzending te voorkomen

✅ Engels gebruiken als standaard voor professionele code

✅ Type-safe validatie toepassen voor robuuste formulieren

📖 6.12 Bronnen
Officiële Documentatie
PHP: HTML Forms - PHP.net officiële tutorial
PHP: $_POST - PHP superglobal $_POST
PHP: $_GET - PHP superglobal $_GET
PHP: Filter Functions - Input validatie en filtering
PHP: htmlspecialchars() - XSS preventie
Tutorials en Guides (2026)
MDN Web Docs: HTML Forms - Complete HTML forms guide
W3Schools: PHP Forms - Basis PHP formulieren
PHP The Right Way: Security - Security best practices
OWASP: Input Validation - Security standaarden
Video Tutorials (2026)
Traversy Media: PHP Form Handling - Praktische PHP tutorials
Program With Gio: PHP Forms - Modern PHP development
Dave Gray: PHP Tutorial - Complete PHP course
Security Resources
OWASP Top 10 - Meest voorkomende security risico’s
PHP Security Guide - Uitgebreide PHP security guide
Cross-Site Scripting (XSS) - XSS aanvallen en preventie
Tools en Testing
Postman - API en formulier testing tool
XAMPP - Lokale PHP development environment
RegExr - Regular expression tester
HTML Validator - HTML code validatie
Best Practices en Patterns
POST-Redirect-GET Pattern - PRG patroon uitleg
PHP Standards Recommendations (PSR) - PHP coding standards
Clean Code PHP - Code quality principles
Nederlandse Resources
ROC Midden Nederland: PHP Cursus - Aanvullende lesmaterialen
Nederlandse PHP Gebruikersgroep - Community en events
Tweakers: Ontwikkeling Forum - Nederlandse developer community
Boeken (2026 edities)
“PHP & MySQL: Server-side Web Development” - Jon Duckett
“Modern PHP: New Features and Good Practices” - Josh Lockhart
“PHP Solutions: Dynamic Web Design Made Easy” - David Powers
💡 Tips voor verder leren:

Oefen met alle voorbeelden uit dit hoofdstuk
Bouw een eigen project waarbij je formulieren gebruikt
Bestudeer de broncode van populaire CMS-systemen zoals WordPress
Leer over SQL injection en andere security threats
Experimenteer met verschillende validatie methodes
Bekijk open-source projecten op GitHub voor real-world voorbeelden
🎯 Volgende stappen: In het volgende hoofdstuk gaan we kijken naar sessies en cookies in PHP, waarmee je gebruikersgegevens kunt bewaren tussen verschillende pagina’s!

Made with ❤️ for MBO Software Development Level 4 Students Version 1.0 - January 2026

© 2025 ROC-Midden Nederland – ICT-College – Amersfoort, Nederland

MBO Niveau 4 - Software Developer

PHP Tutorials – Werken met Formulieren en Gegevensverwerking in PHP

PHP Tutorial
ROC ICA Logo
H7-Werken met JSON in PHP

Hoofdstuk 7: Werken met JSON in PHP
In dit hoofdstuk leer je werken met JSON (JavaScript Object Notation), het meest gebruikte dataformaat voor het uitwisselen van informatie tussen applicaties, API’s en webservices. JSON is overal: van het ophalen van data uit een REST API tot het opslaan van configuraties.

Wat ga je leren?

Wat JSON is en waarom het belangrijk is
JSON structuur begrijpen (objecten en arrays)
PHP arrays naar JSON converteren (json_encode())
JSON naar PHP arrays converteren (json_decode())
Werken met API’s die JSON gebruiken
JSON bestanden lezen en schrijven
Error handling bij JSON operaties
Best practices voor JSON in professionele applicaties
💡 Let op: Dit hoofdstuk bouwt voort op hoofdstuk 1-6. Zorg dat je arrays, functies en formulieren begrijpt!

Voordat je Begint: PHP Extensies Checken
JSON Extensie
De JSON functionaliteit is vanaf PHP 5.2.0 standaard ingebouwd. Je hoeft normaal gesproken niets te installeren.

Check of JSON werkt:

<?php
if (function_exists('json_encode')) {
    echo "✅ JSON is available!";
} else {
    echo "❌ JSON is NOT available (zeer ongebruikelijk)";
}
?>
💡 Tip: Maak een bestand check_json.php met bovenstaande check om te verifiëren dat JSON werkt!

7.1 Wat is JSON?
JSON staat voor JavaScript Object Notation - een lichtgewicht dataformaat voor het opslaan en uitwisselen van data. Ondanks de naam “JavaScript” wordt JSON door vrijwel alle programmeertalen ondersteund, waaronder PHP.

Waarom JSON?
Voor JSON waren er verschillende formats:

XML - Te verbose en complex
CSV - Te simpel, geen structuur voor complexe data
Eigen formats - Niet universeel
JSON lost deze problemen op:

✅ Lichtgewicht en compact
✅ Makkelijk leesbaar voor mensen
✅ Makkelijk te parsen voor computers
✅ Ondersteund door alle moderne talen
✅ Perfecte match met JavaScript objects
✅ Ideaal voor API’s en webservices
JSON in de Echte Wereld
Waar zie je JSON?

REST API’s - Twitter, Instagram, Spotify, etc.
Configuration files - package.json, composer.json
Data storage - NoSQL databases (MongoDB)
AJAX requests - Frontend ↔ Backend communicatie
Mobile apps - Data uitwisseling met servers
Voorbeeld API Response (Spotify):

{
  "track": {
    "name": "As It Was",
    "artist": "Harry Styles",
    "album": "Harry's House",
    "duration_ms": 167303,
    "popularity": 95
  }
}
7.2 JSON Structuur Begrijpen
JSON heeft twee hoofdstructuren die perfect matchen met PHP:

1. JSON Object → PHP Associative Array
JSON Object:

{
  "firstName": "Emma",
  "lastName": "Johnson",
  "age": 19,
  "isStudent": true
}
PHP Equivalent:

<?php
$student = [
    "firstName" => "Emma",
    "lastName" => "Johnson",
    "age" => 19,
    "isStudent" => true
];
?>
2. JSON Array → PHP Indexed Array
JSON Array:

["HTML", "CSS", "JavaScript", "PHP"]
PHP Equivalent:

<?php
$skills = ["HTML", "CSS", "JavaScript", "PHP"];
?>
JSON Datatypen
JSON ondersteunt deze types:

JSON Type	Voorbeeld	PHP Equivalent
String	"Hello"	"Hello"
Number	42, 3.14	42, 3.14
Boolean	true, false	true, false
Null	null	null
Object	{"key": "value"}	Associative array
Array	[1, 2, 3]	Indexed array
⚠️ Let op: JSON heeft geen datatype voor datum/tijd. Datums worden meestal als string opgeslagen: "2026-01-13T10:30:00Z"

7.3 Van PHP naar JSON: json_encode()
De functie json_encode() converteert PHP data naar een JSON string.

Basis Gebruik
<?php
// PHP array
$student = [
    "name" => "Lisa de Vries",
    "age" => 20,
    "grade" => 8.5,
    "courses" => ["PHP", "JavaScript", "Database"]
];

// Converteer naar JSON
$json = json_encode($student);

echo $json;
// Output: {"name":"Lisa de Vries","age":20,"grade":8.5,"courses":["PHP","JavaScript","Database"]}
?>
Mooiere Output met JSON_PRETTY_PRINT
<?php
$student = [
    "name" => "Lisa de Vries",
    "age" => 20,
    "grade" => 8.5
];

// Leesbare JSON met indentatie
$json = json_encode($student, JSON_PRETTY_PRINT);

echo "<pre>$json</pre>";
?>
Output:

{
    "name": "Lisa de Vries",
    "age": 20,
    "grade": 8.5
}
💼 Engels als Standaard in JSON
Belangrijk voor je carrière: JSON wordt altijd met Engelse sleutels gebruikt in professionele applicaties.

❌ Vermijd Nederlands:

<?php
$product = [
    "naam" => "Laptop",
    "prijs" => 899.99,
    "voorraad" => 42
];
?>
✅ Gebruik Engels:

<?php
$product = [
    "name" => "Laptop",
    "price" => 899.99,
    "stock" => 42
];
?>
Waarom Engels?

API Standards - Alle public API’s gebruiken Engels
Internationale teams - Iedereen begrijpt de data
Compatibiliteit - Frontend frameworks verwachten Engels
Best practices - Industrie standaard
Documentatie - Alle JSON specs zijn in Engels
Encoding Opties
Belangrijke opties voor json_encode():

<?php
$data = [
    "message" => "Hello <b>World</b>",
    "unicode" => "Café ☕",
    "number" => 1234567890
];

// Standaard
$json1 = json_encode($data);
// {"message":"Hello <b>World<\/b>","unicode":"Caf\u00e9 \u2615","number":1234567890}

// JSON_PRETTY_PRINT - Mooie opmaak
$json2 = json_encode($data, JSON_PRETTY_PRINT);

// JSON_UNESCAPED_UNICODE - Unicode tekens behouden
$json3 = json_encode($data, JSON_UNESCAPED_UNICODE);
// {"message":"Hello <b>World<\/b>","unicode":"Café ☕","number":1234567890}

// JSON_UNESCAPED_SLASHES - Geen \/ voor slashes
$json4 = json_encode($data, JSON_UNESCAPED_SLASHES);
// {"message":"Hello <b>World</b>","unicode":"Caf\u00e9 \u2615","number":1234567890}

// Combineren met | (pipe operator)
$json5 = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>
🔧 Praktische Oefening 7.1: Product Catalogus naar JSON
Opdracht: Converteer een product array naar JSON voor een webshop API.

Maak een bestand product_to_json.php:

<?php
// Product data (zoals uit een database)
$products = [
    [
        "id" => 1,
        "name" => "iPhone 16 Pro",
        "brand" => "Apple",
        "price" => 1249.00,
        "inStock" => true,
        "categories" => ["Electronics", "Smartphones"],
        "rating" => 4.8
    ],
    [
        "id" => 2,
        "name" => "MacBook Air M3",
        "brand" => "Apple",
        "price" => 1499.00,
        "inStock" => true,
        "categories" => ["Electronics", "Laptops"],
        "rating" => 4.9
    ],
    [
        "id" => 3,
        "name" => "AirPods Pro",
        "brand" => "Apple",
        "price" => 279.00,
        "inStock" => false,
        "categories" => ["Electronics", "Audio"],
        "rating" => 4.7
    ]
];

// Converteer naar JSON
$json = json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

// Toon als API response
header("Content-Type: application/json");
echo $json;
?>
Test dit bestand in je browser - je ziet nu een JSON response zoals een echte API!

Extra uitdaging:

Voeg een product toe met jouw eigen gegevens
Voeg een “discount” veld toe (percentage als float)
Voeg een “releaseDate” veld toe (als string in formaat “YYYY-MM-DD”)
7.4 Van JSON naar PHP: json_decode()
De functie json_decode() converteert een JSON string terug naar PHP data.

Basis Gebruik
<?php
// JSON string (bijvoorbeeld van een API)
$json = '{
    "name": "Emma",
    "age": 19,
    "grade": 8.5
}';

// Converteer naar PHP array
$student = json_decode($json, true);

echo "Name: " . $student["name"] . "<br>";
echo "Age: " . $student["age"] . "<br>";
echo "Grade: " . $student["grade"] . "<br>";
?>
Object vs Array
json_decode() heeft een tweede parameter die bepaalt wat je terugkrijgt:

Parameter true → Associative Array (aanbevolen):

<?php
$json = '{"name": "Lisa", "age": 20}';
$data = json_decode($json, true);  // Array

echo $data["name"];  // Lisa
echo gettype($data); // array
?>
Parameter false of weglaten → Object:

<?php
$json = '{"name": "Lisa", "age": 20}';
$data = json_decode($json);  // Object (stdClass)

echo $data->name;    // Lisa - gebruik -> voor properties
echo gettype($data); // object
?>
💡 Best practice: Gebruik meestal json_decode($json, true) voor arrays - deze zijn flexibeler in PHP.

Nested Data
JSON kan geneste structuren bevatten:

<?php
$json = '{
    "student": {
        "name": "Ahmed",
        "courses": [
            {"name": "PHP", "grade": 8.5},
            {"name": "JavaScript", "grade": 7.8},
            {"name": "Database", "grade": 9.0}
        ]
    }
}';

$data = json_decode($json, true);

echo "Student: " . $data["student"]["name"] . "<br>";

foreach ($data["student"]["courses"] as $course) {
    echo $course["name"] . ": " . $course["grade"] . "<br>";
}
?>
🔧 Praktische Oefening 7.2: API Data Verwerken
Opdracht: Simuleer het ontvangen van data van een weer-API.

Maak een bestand weather_api.php:

<?php
// Simuleer JSON response van een weather API
$weatherJSON = '{
    "location": {
        "city": "Amsterdam",
        "country": "Netherlands",
        "latitude": 52.3676,
        "longitude": 4.9041
    },
    "current": {
        "temperature": 12.5,
        "feelsLike": 10.2,
        "humidity": 78,
        "windSpeed": 15.3,
        "conditions": "Partly Cloudy",
        "icon": "⛅"
    },
    "forecast": [
        {"day": "Monday", "high": 14, "low": 8, "conditions": "Rainy"},
        {"day": "Tuesday", "high": 16, "low": 10, "conditions": "Sunny"},
        {"day": "Wednesday", "high": 13, "low": 9, "conditions": "Cloudy"}
    ]
}';

// Parse JSON
$weather = json_decode($weatherJSON, true);

// Toon weer informatie
echo "<div style='background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; border-radius: 15px; max-width: 500px;'>";

echo "<h2>{$weather['current']['icon']} Weather in {$weather['location']['city']}</h2>";

echo "<div style='background: rgba(255,255,255,0.2); padding: 20px; border-radius: 10px; margin: 15px 0;'>";
echo "<h1 style='margin: 0; font-size: 48px;'>{$weather['current']['temperature']}°C</h1>";
echo "<p style='margin: 5px 0;'>{$weather['current']['conditions']}</p>";
echo "<p style='margin: 5px 0; font-size: 14px;'>Feels like: {$weather['current']['feelsLike']}°C</p>";
echo "</div>";

echo "<div style='display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin: 15px 0;'>";
echo "<div style='background: rgba(255,255,255,0.2); padding: 10px; border-radius: 8px;'>";
echo "<p style='margin: 0;'>💧 Humidity</p>";
echo "<p style='margin: 5px 0; font-size: 20px; font-weight: bold;'>{$weather['current']['humidity']}%</p>";
echo "</div>";
echo "<div style='background: rgba(255,255,255,0.2); padding: 10px; border-radius: 8px;'>";
echo "<p style='margin: 0;'>💨 Wind Speed</p>";
echo "<p style='margin: 5px 0; font-size: 20px; font-weight: bold;'>{$weather['current']['windSpeed']} km/h</p>";
echo "</div>";
echo "</div>";

echo "<h3>3-Day Forecast</h3>";
echo "<div style='display: flex; gap: 10px;'>";
foreach ($weather['forecast'] as $day) {
    echo "<div style='background: rgba(255,255,255,0.2); padding: 15px; border-radius: 8px; flex: 1; text-align: center;'>";
    echo "<p style='margin: 0; font-weight: bold;'>{$day['day']}</p>";
    echo "<p style='margin: 5px 0; font-size: 12px;'>{$day['conditions']}</p>";
    echo "<p style='margin: 5px 0;'>{$day['high']}° / {$day['low']}°</p>";
    echo "</div>";
}
echo "</div>";

echo "</div>";
?>
Extra uitdaging:

Voeg een “lastUpdated” timestamp toe aan de data
Toon extra informatie zoals UV index of zichtbaarheid
Maak een functie die een emoji kiest op basis van de conditions
7.5 Error Handling bij JSON
Niet alle JSON is valide. Het is cruciaal om errors af te handelen!

JSON Errors Checken
<?php
// Ongeldige JSON (komma teveel, quotes verkeerd)
$badJSON = '{"name": "Lisa",}';

$data = json_decode($badJSON, true);

// Check of decoding succesvol was
if (json_last_error() !== JSON_ERROR_NONE) {
    echo "JSON Error: " . json_last_error_msg();
    // Output: "JSON Error: Syntax error"
} else {
    echo "JSON decoded successfully!";
}
?>
Veilige JSON Decode Functie
<?php
function safeJsonDecode(string $json, bool $assoc = true): ?array {
    $data = json_decode($json, $assoc);

    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log("JSON Decode Error: " . json_last_error_msg());
        return null;
    }

    return $data;
}

// Gebruik
$json = '{"name": "Emma", "age": 19}';
$data = safeJsonDecode($json);

if ($data === null) {
    echo "Failed to decode JSON";
} else {
    echo "Name: " . $data["name"];
}
?>
Veel Voorkomende JSON Errors
Error	Oorzaak	Oplossing
JSON_ERROR_SYNTAX	Syntax fout (komma, quotes)	Valideer JSON met linter
JSON_ERROR_UTF8	Ongeldige UTF-8 karakters	Gebruik utf8_encode()
JSON_ERROR_DEPTH	Te diep genest (max 512 levels)	Vereenvoudig structuur
JSON_ERROR_CTRL_CHAR	Control characters in string	Sanitize input
🔧 Praktische Oefening 7.3: Validatie en Error Handling
Opdracht: Bouw een JSON validator met goede foutafhandeling.

Maak een bestand json_validator.php:

<?php
function validateAndDecodeJSON(string $json): array {
    // Trim whitespace
    $json = trim($json);

    // Check of het überhaupt iets is
    if (empty($json)) {
        return [
            "valid" => false,
            "error" => "JSON string is empty",
            "data" => null
        ];
    }

    // Probeer te decoden
    $data = json_decode($json, true);

    // Check voor errors
    if (json_last_error() !== JSON_ERROR_NONE) {
        return [
            "valid" => false,
            "error" => json_last_error_msg(),
            "errorCode" => json_last_error(),
            "data" => null
        ];
    }

    // Success!
    return [
        "valid" => true,
        "error" => null,
        "data" => $data
    ];
}

// Test cases
$testCases = [
    '{"name": "Lisa", "age": 20}',                    // ✅ Valid
    '{"name": "Emma", "age": 19,}',                   // ❌ Trailing comma
    '{name: "Ahmed", age: 21}',                       // ❌ Missing quotes on keys
    '{"message": "Hello "World""}',                   // ❌ Unescaped quotes
    '',                                                // ❌ Empty
    '{"validJSON": true, "nested": {"works": true}}'  // ✅ Valid nested
];

echo "<h2>🔍 JSON Validation Tests</h2>";

foreach ($testCases as $index => $testJSON) {
    $result = validateAndDecodeJSON($testJSON);

    echo "<div style='background: " . ($result['valid'] ? '#d4edda' : '#f8d7da') . "; padding: 15px; margin: 10px 0; border-radius: 8px; border-left: 4px solid " . ($result['valid'] ? '#28a745' : '#dc3545') . ";'>";

    echo "<h3>Test Case " . ($index + 1) . ": " . ($result['valid'] ? '✅ Valid' : '❌ Invalid') . "</h3>";

    echo "<p><strong>Input:</strong></p>";
    echo "<pre style='background: #f5f5f5; padding: 10px; border-radius: 5px; overflow-x: auto;'>" . htmlspecialchars($testJSON) . "</pre>";

    if (!$result['valid']) {
        echo "<p><strong>Error:</strong> " . htmlspecialchars($result['error']) . "</p>";
    } else {
        echo "<p><strong>Decoded Data:</strong></p>";
        echo "<pre style='background: #f5f5f5; padding: 10px; border-radius: 5px;'>";
        print_r($result['data']);
        echo "</pre>";
    }

    echo "</div>";
}
?>
7.6 JSON Bestanden Lezen en Schrijven
In de praktijk werk je vaak met JSON bestanden voor configuratie of data opslag.

JSON Bestand Lezen
<?php
// Lees JSON bestand
$jsonContent = file_get_contents("config.json");

if ($jsonContent === false) {
    die("Error: Could not read file");
}

// Parse JSON
$config = json_decode($jsonContent, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    die("Error: Invalid JSON - " . json_last_error_msg());
}

// Gebruik de data
echo "App Name: " . $config["appName"] . "<br>";
echo "Version: " . $config["version"] . "<br>";
?>
JSON Bestand Schrijven
<?php
// PHP data
$config = [
    "appName" => "MyWebApp",
    "version" => "2.1.0",
    "database" => [
        "host" => "localhost",
        "port" => 3306,
        "name" => "mywebapp_db"
    ],
    "features" => [
        "darkMode" => true,
        "notifications" => true,
        "analytics" => false
    ]
];

// Converteer naar JSON
$json = json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

// Schrijf naar bestand
$result = file_put_contents("config.json", $json);

if ($result === false) {
    echo "Error: Could not write file";
} else {
    echo "Config saved successfully! ($result bytes written)";
}
?>
Veilige File Operations Functie
<?php
function readJSONFile(string $filePath): ?array {
    // Check of bestand bestaat
    if (!file_exists($filePath)) {
        error_log("JSON file not found: $filePath");
        return null;
    }

    // Lees bestand
    $content = file_get_contents($filePath);
    if ($content === false) {
        error_log("Could not read file: $filePath");
        return null;
    }

    // Parse JSON
    $data = json_decode($content, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log("Invalid JSON in file $filePath: " . json_last_error_msg());
        return null;
    }

    return $data;
}

function writeJSONFile(string $filePath, array $data): bool {
    // Converteer naar JSON
    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    if ($json === false) {
        error_log("Could not encode data to JSON");
        return false;
    }

    // Schrijf naar bestand
    $result = file_put_contents($filePath, $json);

    if ($result === false) {
        error_log("Could not write to file: $filePath");
        return false;
    }

    return true;
}

// Gebruik
$data = readJSONFile("users.json");
if ($data !== null) {
    echo "Loaded " . count($data) . " users";
}
?>
🔧 Praktische Oefening 7.4: Todo List met JSON Opslag
Opdracht: Bouw een todo list app die data opslaat in JSON.

Maak een bestand todo_app.php:

<?php
// Functies voor JSON file handling
function loadTodos(): array {
    $file = "todos.json";
    if (!file_exists($file)) {
        return [];
    }

    $content = file_get_contents($file);
    $todos = json_decode($content, true);

    return $todos ?? [];
}

function saveTodos(array $todos): bool {
    $json = json_encode($todos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    return file_put_contents("todos.json", $json) !== false;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $todos = loadTodos();

    if (isset($_POST["action"])) {
        if ($_POST["action"] == "add" && !empty($_POST["task"])) {
            // Voeg nieuwe todo toe
            $todos[] = [
                "id" => uniqid(),
                "task" => htmlspecialchars(trim($_POST["task"])),
                "completed" => false,
                "createdAt" => date("Y-m-d H:i:s")
            ];
            saveTodos($todos);

            // Redirect om dubbele submit te voorkomen
            header("Location: " . $_SERVER["PHP_SELF"]);
            exit;
        } elseif ($_POST["action"] == "toggle" && isset($_POST["id"])) {
            // Toggle completed status
            foreach ($todos as &$todo) {
                if ($todo["id"] == $_POST["id"]) {
                    $todo["completed"] = !$todo["completed"];
                    break;
                }
            }
            saveTodos($todos);

            header("Location: " . $_SERVER["PHP_SELF"]);
            exit;
        } elseif ($_POST["action"] == "delete" && isset($_POST["id"])) {
            // Verwijder todo
            $todos = array_filter($todos, function($todo) {
                return $todo["id"] != $_POST["id"];
            });
            saveTodos($todos);

            header("Location: " . $_SERVER["PHP_SELF"]);
            exit;
        }
    }
}

// Laad todos
$todos = loadTodos();
$completedCount = count(array_filter($todos, fn($t) => $t["completed"]));
$totalCount = count($todos);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List - JSON Storage</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            margin: 0 0 10px 0;
            color: #333;
        }
        .stats {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .add-form {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        .add-form input[type="text"] {
            flex: 1;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
        }
        .add-form button {
            padding: 12px 24px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }
        .add-form button:hover {
            background: #0056b3;
        }
        .todo-item {
            display: flex;
            align-items: center;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .todo-item.completed {
            opacity: 0.6;
        }
        .todo-item.completed .task {
            text-decoration: line-through;
        }
        .task {
            flex: 1;
            margin: 0 15px;
        }
        .todo-actions {
            display: flex;
            gap: 5px;
        }
        .todo-actions button {
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
        }
        .btn-toggle {
            background: #28a745;
            color: white;
        }
        .btn-delete {
            background: #dc3545;
            color: white;
        }
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📝 Todo List</h1>
        <div class="stats">
            <?php echo $completedCount; ?> of <?php echo $totalCount; ?> completed
        </div>

        <form method="POST" class="add-form">
            <input type="hidden" name="action" value="add">
            <input type="text" name="task" placeholder="Add a new task..." required>
            <button type="submit">Add</button>
        </form>

        <?php if (empty($todos)): ?>
            <div class="empty-state">
                <p>🎉 No tasks yet! Add one above.</p>
            </div>
        <?php else: ?>
            <?php foreach ($todos as $todo): ?>
                <div class="todo-item <?php echo $todo['completed'] ? 'completed' : ''; ?>">
                    <input type="checkbox" <?php echo $todo['completed'] ? 'checked' : ''; ?> disabled>
                    <div class="task">
                        <div><?php echo $todo['task']; ?></div>
                        <small style="color: #999;"><?php echo $todo['createdAt']; ?></small>
                    </div>
                    <div class="todo-actions">
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="action" value="toggle">
                            <input type="hidden" name="id" value="<?php echo $todo['id']; ?>">
                            <button type="submit" class="btn-toggle">
                                <?php echo $todo['completed'] ? 'Undo' : 'Done'; ?>
                            </button>
                        </form>
                        <form method="POST" style="display: inline;">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $todo['id']; ?>">
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>
Test de applicatie:

Voeg taken toe
Mark taken als completed
Verwijder taken
Open todos.json om de JSON data te bekijken
7.7 JSON en Security
JSON kan veiligheidsrisico’s hebben. Leer hoe je veilig werkt met JSON.

XSS Prevention bij JSON Output
❌ GEVAARLIJK - Zonder escaping:

<?php
$userData = [
    "name" => $_POST["name"],  // User input!
    "bio" => $_POST["bio"]
];

$json = json_encode($userData);

// Als dit direct in HTML komt:
echo "<script>var user = $json;</script>";
// XSS risk! User kan scripts injecteren
?>
✅ VEILIG - Met htmlspecialchars:

<?php
$userData = [
    "name" => htmlspecialchars($_POST["name"]),
    "bio" => htmlspecialchars($_POST["bio"])
];

$json = json_encode($userData);
echo "<script>var user = $json;</script>";
?>
✅ NOG BETER - JSON_HEX_TAG:

<?php
$userData = [
    "name" => $_POST["name"],
    "bio" => $_POST["bio"]
];

// Escape HTML tags in JSON
$json = json_encode($userData, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);

echo "<script>var user = $json;</script>";
?>
Validatie van User Input voor JSON
<?php
function sanitizeForJSON(array $data): array {
    $sanitized = [];

    foreach ($data as $key => $value) {
        if (is_string($value)) {
            // Remove control characters
            $value = preg_replace('/[\x00-\x1F\x7F]/', '', $value);

            // Trim whitespace
            $value = trim($value);

            // Optioneel: htmlspecialchars voor extra veiligheid
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }

        $sanitized[$key] = $value;
    }

    return $sanitized;
}

// Gebruik
$userInput = [
    "name" => $_POST["name"],
    "email" => $_POST["email"],
    "message" => $_POST["message"]
];

$safe = sanitizeForJSON($userInput);
$json = json_encode($safe);
?>
Content-Type Header voor API’s
Altijd juiste headers sturen:

<?php
// JSON response
header("Content-Type: application/json; charset=UTF-8");

$response = [
    "success" => true,
    "data" => ["message" => "Hello World"]
];

echo json_encode($response);
exit;
?>
CORS Headers voor API’s
Als je API gebruikt wordt door JavaScript van andere domeinen:

<?php
// CORS headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

// Handle preflight requests
if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") {
    http_response_code(200);
    exit;
}

// API logic hier...
?>
7.8 Best Practices voor JSON in PHP
1. Gebruik Engelstalige Keys
<?php
// ✅ GOED - Engels
$product = [
    "name" => "Laptop",
    "price" => 899.99,
    "inStock" => true
];

// ❌ SLECHT - Nederlands
$product = [
    "naam" => "Laptop",
    "prijs" => 899.99,
    "opVoorraad" => true
];
?>
2. Consistente Naming Convention (camelCase)
<?php
// ✅ GOED - camelCase
$user = [
    "firstName" => "Emma",
    "lastName" => "Johnson",
    "emailAddress" => "emma@example.com",
    "phoneNumber" => "+31612345678"
];

// ❌ Vermijd - Mixed styles
$user = [
    "first_name" => "Emma",    // snake_case
    "LastName" => "Johnson",   // PascalCase
    "email" => "emma@..."      // lowercase
];
?>
3. Altijd Error Handling
<?php
// ✅ GOED
$data = json_decode($json, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    error_log("JSON Error: " . json_last_error_msg());
    // Handle error
}

// ❌ SLECHT
$data = json_decode($json, true);
// Geen check - kan null zijn!
?>
4. Type Hints Gebruiken (Modern PHP)
<?php
function getUserJSON(int $userId): ?string {
    $user = getUserFromDatabase($userId);

    if ($user === null) {
        return null;
    }

    return json_encode($user);
}

function parseUserJSON(string $json): ?array {
    $data = json_decode($json, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        return null;
    }

    return $data;
}
?>
5. JSON Response Helper Functie
<?php
function jsonResponse(array $data, int $statusCode = 200): void {
    http_response_code($statusCode);
    header("Content-Type: application/json; charset=UTF-8");

    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

// Gebruik
if ($user === null) {
    jsonResponse([
        "error" => true,
        "message" => "User not found"
    ], 404);
}

jsonResponse([
    "success" => true,
    "data" => $user
]);
?>
6. Structureer API Responses Consistent
<?php
// ✅ Success response
$response = [
    "success" => true,
    "data" => [
        "user" => $userData
    ],
    "message" => "User retrieved successfully",
    "timestamp" => time()
];

// ✅ Error response
$response = [
    "success" => false,
    "error" => [
        "code" => "USER_NOT_FOUND",
        "message" => "The requested user does not exist"
    ],
    "timestamp" => time()
];
?>
7.9 Lab-opdrachten
📝 Lab-opdracht 7.1: Contact Book met JSON
Opdracht: Bouw een contactenboek dat data opslaat in JSON.

Eisen:

Contacten toevoegen (naam, email, telefoon)
Contacten tonen in een lijst
Contacten verwijderen
Data opslaan in contacts.json
Validatie van email formaat
Error handling
Startcode structuur:

<?php
// contacts.php

function loadContacts(): array {
    // TODO: Implementeer
}

function saveContacts(array $contacts): bool {
    // TODO: Implementeer
}

function validateEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Handle POST requests hier...
?>
📝 Lab-opdracht 7.2: Mini Blog met JSON Storage
Opdracht: Maak een simpel blog systeem met JSON opslag.

Eisen:

Blog posts maken met titel, content, auteur
Posts tonen met datum
Posts verwijderen
Automatische ID generatie (uniqid)
Markdown-achtige formatting (optioneel)
JSON file: blog_posts.json
Extra features:

Tags/categories
Search functionaliteit
Sorting (nieuwste eerst)
7.10 Uitgebreide Eindopdrachten
⭐ Opdracht 1 (Basis): Product Catalogus
Doel: Bouw een product catalogus die data opslaat in JSON.

Eisen:

Producten toevoegen (naam, prijs, voorraad, categorie)
Producten tonen in een lijst
Producten verwijderen
Data opslaan in products.json
Basic styling
Voorbeeld products.json:

[
    {
        "id": 1,
        "name": "Laptop",
        "price": 899.99,
        "stock": 10,
        "category": "Electronics"
    }
]
⭐⭐ Opdracht 2 (Gemiddeld): Student Grades System
Doel: Maak een cijfer registratie systeem voor studenten.

Eisen:

Studenten toevoegen met naam en klas
Cijfers per vak toevoegen
Gemiddelde berekenen
Data opslaan in JSON
Overzicht tonen van alle studenten en cijfers
Export functie naar JSON bestand
Files:

students.json - Student gegevens
grades.json - Cijfers per student
⭐⭐⭐ Opdracht 3 (Gevorderd): Book Library System
Doel: Volledig bibliotheek systeem met JSON database.

Eisen:

Boeken toevoegen (titel, auteur, ISBN, jaar, genre)
Boeken zoeken en filteren
Boeken lenen/retourneren (status tracking)
Gebruikers systeem (simpel)
Statistieken (meest geleende boeken, etc.)
Export naar JSON
Import vanuit JSON
Files:

books.json - Alle boeken
users.json - Gebruikers
loans.json - Leningen tracking
⭐⭐⭐⭐ Opdracht 4 (Expert): Recipe Manager
Doel: Maak een recepten manager met JSON opslag.

Eisen:

Recepten toevoegen (naam, ingrediënten, stappen, categorie, kooktijd)
Recepten zoeken en filteren op categorie
Ingrediënten lijst genereren voor meerdere recepten
Favorietenlijst
JSON export/import functionaliteit
Print-vriendelijke receptkaarten
Foto upload (optioneel)
Files:

recipes.json - Alle recepten
favorites.json - Favorieten tracking
Extra features:

Portie calculator (ingrediënten vermenigvuldigen)
Shopping list generator
Rating systeem
⭐⭐⭐⭐⭐ Opdracht 5 (Master): Event Management System
Doel: Volledig evenementen beheersysteem met JSON database.

Eisen:

Evenementen aanmaken (titel, datum, locatie, beschrijving, max deelnemers)
Deelnemers registreren
Wachtlijst functionaliteit
Email confirmatie simulatie (opslaan in JSON)
Dashboard met statistieken
Kalender overzicht
QR code generatie voor tickets (optioneel)
JSON backup en restore functionaliteit
Files:

events.json - Evenement details
registrations.json - Aanmeldingen
confirmations.json - Verstuurde confirmaties
Extra features:

Herinnering systeem (datum check)
Event analytics (bezoekers per maand, populairste events)
Automatische wachtlijst management
7.11 Samenvatting
🎉 Gefeliciteerd! Je hebt geleerd werken met JSON in PHP!

⚠️ Belangrijke Setup Check
Voordat je met JSON werkt, controleer:

JSON extensie - Standaard aanwezig in moderne PHP (PHP 5.2+)

if (function_exists('json_encode')) {
    echo "✅ JSON is available!";
} else {
    echo "❌ JSON is NOT available";
}
💡 JSON is standaard ingebouwd in PHP sinds versie 5.2.0 - je hoeft normaal gesproken niets te installeren!

Wat heb je geleerd?
✅ JSON Basics:

JSON structuur (objects en arrays)
JSON datatypen
Waarom JSON belangrijk is
JSON vs XML, CSV
✅ PHP naar JSON:

json_encode() - PHP naar JSON string
Encoding opties (PRETTY_PRINT, UNESCAPED_UNICODE)
Associative arrays → JSON objects
Indexed arrays → JSON arrays
✅ JSON naar PHP:

json_decode() - JSON naar PHP data
Tweede parameter: array vs object
Nested data verwerken
Type conversie
✅ Error Handling:

json_last_error() en json_last_error_msg()
Validatie functies
Try-catch patterns
Veilige decode functies
✅ File Operations:

JSON bestanden lezen met file_get_contents()
JSON bestanden schrijven met file_put_contents()
Error handling bij file operations
Veilige wrapper functies
✅ Security:

XSS prevention bij JSON output
Input sanitization
JSON_HEX_TAG en JSON_HEX_AMP
CORS headers
Content-Type headers
✅ Best Practices:

Engelstalige keys gebruiken
camelCase naming convention
Consistente error handling
Type hints in functies
Consistent data structuur
Code reusability
🎯 Belangrijkste Lessen:

JSON is universeel - Data uitwisseling format voor moderne applicaties
Altijd error handling - JSON parsing kan falen, vang dit altijd af
Engels in production - Gebruik Engelse keys in professionele code
Security matters - Sanitize input, escape output
Consistent blijven - Gebruik consistente data structuur
File operations - Veilig lezen en schrijven van JSON bestanden
Validation is key - Controleer altijd of JSON geldig is
Veel Voorkomende Valkuilen
❌ Vergeten error checking:

$data = json_decode($json);  // Kan null zijn!
echo $data["name"];  // CRASH als decode faalde
✅ Correct:

$data = json_decode($json, true);
if (json_last_error() === JSON_ERROR_NONE) {
    echo $data["name"];
}
❌ Nederlandse keys in JSON:

["naam" => "Lisa"]  // Niet doen in productie!
✅ Correct:

["name" => "Lisa"]  // Internationaal begrijpbaar
❌ Geen Content-Type header:

echo json_encode($data);  // Browser weet niet dat het JSON is
✅ Correct:

header("Content-Type: application/json");
echo json_encode($data);
Volgende Stappen
Nu je JSON beheerst, kun je:

Werken met databases (MySQL + JSON columns)
Complexere data structuren bouwen
Frontend frameworks integreren (React, Vue)
Data uitwisseling tussen verschillende systemen
Configuration management systemen
Data backup en export functionaliteit
Continue Learning:

Bestudeer JSON Schema voor validatie
Leer over data normalisatie
Experimenteer met verschillende data formats (XML, CSV vs JSON)
Bouw complexere applicaties met JSON opslag
Ontdek NoSQL databases die JSON gebruiken (MongoDB)
Bronnen en Verdere Studie
📚 Officiële Documentatie
PHP JSON Functions:

PHP: json_encode - Officiële PHP docs
PHP: json_decode - JSON decoding
PHP: JSON Functions - Alle JSON functies
JSON.org - JSON specificatie en intro
HTTP en API’s:

MDN: HTTP Headers - Content-Type, CORS, etc.
MDN: HTTP Status Codes - 200, 404, 500, etc.
REST API Tutorial - REST principles
🎓 Tutorials en Guides (2026)
JSON in PHP:

PHP: The Right Way - JSON - Best practices
W3Schools: PHP JSON - Basis tutorial
TutorialRepublic: PHP JSON - Uitgebreid
API Development:

How to Build a REST API with PHP - Complete guide
RESTful API Design - Design patterns
API Security Best Practices - OWASP guide
🎬 Video Tutorials
Nederlands:

“PHP JSON Tutorial” - Codacademy NL
“REST API bouwen met PHP” - Dutch Coding
Engels:

Traversy Media: PHP REST API - Complete tutorial
freeCodeCamp: APIs for Beginners - API concepts
🔧 Tools
JSON Validators en Formatters:

JSONLint - Valideer en format JSON
JSON Editor Online - Visuele JSON editor
Postman - API testing tool
Insomnia - REST client
API Testing:

Hoppscotch - Open source API testing
cURL Command Builder - Genereer cURL commands
ReqBin - Online API testing
Public API’s voor Practice:

Public APIs List - 1000+ gratis API’s
JSONPlaceholder - Fake REST API voor testing
Random User Generator - Random user data
OpenWeatherMap - Weather API (gratis tier)
The Movie Database (TMDb) - Film data
📖 Aanbevolen Reading
Articles:

“Working with JSON in PHP” - DigitalOcean Tutorial (2026)
“PHP JSON Best Practices” - Toptal Engineering Blog
“Building RESTful Web Services with PHP” - IBM Developer
Books:

“RESTful Web API Design with Node.js” - (Concepts apply to PHP)
“API Design Patterns” - JJ Geewax
“Web API Design: The Missing Link” - Google API Design Guide
🌐 Community
Forums en Q&A:

Stack Overflow - PHP JSON Tag
Reddit: r/PHP
PHP Discord
Blogs:

dev.to - PHP Tag - Developer articles
Medium - PHP JSON - Tutorials en guides
Hashnode - PHP Community - Developer blogs
💡 Practice Resources
Challenges:

Exercism: PHP Track - Programming exercises
HackerRank: APIs - API challenges
CodeWars: PHP - Coding challenges
Project Ideas:

Build a personal dashboard met multiple API’s
Create a REST API voor je eigen applicatie
Maak een API wrapper voor je favoriete service
Build een JSON-based CMS
© 2025 ROC-Midden Nederland – ICT-College – Amersfoort, Nederland

MBO Niveau 4 - Software Developer

PHP Tutorials – Werken met JSON in PHP

PHP Tutorial
ROC ICA Logo
H8-Werken met Bestanden in PHP

Hoofdstuk 8: Werken met Bestanden in PHP
In dit hoofdstuk leer je werken met bestanden in PHP. Bestanden zijn essentieel voor het opslaan van data, configuratie, logs, uploads en exports. Je leert hoe je veilig bestanden kunt lezen, schrijven, uploaden en beheren.

Wat ga je leren?

Bestanden lezen en schrijven
File system navigatie (directories, paths)
Bestandsinformatie ophalen
Bestanden uploaden via formulieren
CSV bestanden verwerken
Veiligheid bij file operations
Error handling
Best practices voor file management
💡 Let op: Dit hoofdstuk bouwt voort op hoofdstuk 1-7. Zorg dat je arrays, functies, formulieren en JSON begrijpt!

8.1 Waarom Werken met Bestanden?
Bestanden zijn cruciaal in web development voor:

Data Opslag:

Configuratie bestanden (config.php, settings.ini)
Log bestanden voor debugging
Cache bestanden voor performance
User uploads (profielfoto’s, documenten)
Data exports (CSV, PDF, Excel)
Content Management:

Template bestanden
Content bestanden (artikelen, pagina’s)
Media bestanden (afbeeldingen, video’s)
Backup bestanden
Real-World Voorbeelden:

Blog systeem dat artikelen in bestanden opslaat
Webshop die product foto’s upload
CMS dat template bestanden gebruikt
Analytics systeem dat logs schrijft
Export functionaliteit voor rapportages
8.2 Bestanden Lezen
Basis File Reading
file_get_contents() - Lees hele bestand:

<?php
// Lees hele bestand als string
$content = file_get_contents("data.txt");

if ($content === false) {
    echo "Error: Could not read file";
} else {
    echo $content;
}
?>
file() - Lees bestand als array (per regel):

<?php
// Lees bestand, elke regel wordt een array element
$lines = file("data.txt");

if ($lines === false) {
    echo "Error: Could not read file";
} else {
    foreach ($lines as $lineNumber => $line) {
        echo "Line " . ($lineNumber + 1) . ": " . $line . "<br>";
    }
}
?>
fopen(), fgets(), fclose() - Regel voor regel lezen:

<?php
// Open bestand voor lezen
$file = fopen("data.txt", "r");

if ($file === false) {
    die("Error: Could not open file");
}

// Lees regel voor regel
while (($line = fgets($file)) !== false) {
    echo $line . "<br>";
}

// Sluit bestand
fclose($file);
?>
File Reading Modes
Mode	Beschrijving	Gebruik
"r"	Read - Alleen lezen	Bestand lezen
"r+"	Read/Write - Lezen en schrijven	Bestand aanpassen
"w"	Write - Alleen schrijven (overschrijft)	Nieuw bestand maken
"w+"	Write/Read - Lezen en schrijven (overschrijft)	Bestand vervangen
"a"	Append - Toevoegen aan einde	Log files
"a+"	Append/Read - Lezen en toevoegen	Log files met lezen
💼 Engels als Standaard
Gebruik altijd Engelse bestandsnamen en variabelen in professionele code:

✅ GOED:

<?php
$configContent = file_get_contents("config.txt");
$logEntries = file("application.log");
?>
❌ VERMIJD:

<?php
$inhoud = file_get_contents("configuratie.txt");
$regels = file("applicatie.log");
?>
🔧 Praktische Oefening 8.1: Lees een Quote Bestand
Opdracht: Maak een systeem dat random quotes toont uit een bestand.

Maak eerst een bestand quotes.txt:

De toekomst behoort toe aan degenen die geloven in de schoonheid van hun dromen.
Success is not final, failure is not fatal: it is the courage to continue that counts.
The only way to do great work is to love what you do.
Innovation distinguishes between a leader and a follower.
Your time is limited, don't waste it living someone else's life.
Maak dan quote_reader.php:

<?php
// Lees alle quotes
$quotes = file("quotes.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if ($quotes === false) {
    die("Error: Could not read quotes file");
}

// Selecteer random quote
$randomIndex = array_rand($quotes);
$quote = $quotes[$randomIndex];

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Quote van de Dag</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            max-width: 600px;
            margin: 100px auto;
            padding: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .quote-box {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            text-align: center;
        }
        .quote {
            font-size: 24px;
            font-style: italic;
            color: #333;
            margin: 20px 0;
            line-height: 1.6;
        }
        .quote::before {
            content: '"';
            font-size: 48px;
            color: #667eea;
        }
        .quote::after {
            content: '"';
            font-size: 48px;
            color: #667eea;
        }
        button {
            margin-top: 20px;
            padding: 12px 30px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background: #5568d3;
        }
    </style>
</head>
<body>
    <div class="quote-box">
        <h1>💭 Quote van de Dag</h1>
        <div class="quote">
            <?php echo htmlspecialchars($quote); ?>
        </div>
        <button onclick="location.reload()">🔄 Nieuwe Quote</button>
        <p style="color: #999; font-size: 14px; margin-top: 20px;">
            Quote <?php echo $randomIndex + 1; ?> van <?php echo count($quotes); ?>
        </p>
    </div>
</body>
</html>
Extra uitdaging:

Voeg meer quotes toe aan het bestand
Toon de auteur bij elke quote (formaat: “quote	auteur”)
Maak een “Quote History” die de laatste 5 quotes toont
8.3 Bestanden Schrijven
Basis File Writing
file_put_contents() - Schrijf hele string naar bestand:

<?php
$content = "Hello, World!\nThis is a test.";

// Schrijf naar bestand (overschrijft bestaand bestand)
$result = file_put_contents("output.txt", $content);

if ($result === false) {
    echo "Error: Could not write to file";
} else {
    echo "Successfully wrote $result bytes";
}
?>
Append Mode - Voeg toe aan bestaand bestand:

<?php
$newLine = "New line added!\n";

// FILE_APPEND zorgt dat we toevoegen i.p.v. overschrijven
$result = file_put_contents("log.txt", $newLine, FILE_APPEND);

if ($result === false) {
    echo "Error: Could not append to file";
} else {
    echo "Successfully appended!";
}
?>
fopen(), fwrite(), fclose() - Meer controle:

<?php
// Open bestand voor schrijven
$file = fopen("data.txt", "w");

if ($file === false) {
    die("Error: Could not open file for writing");
}

// Schrijf meerdere regels
fwrite($file, "First line\n");
fwrite($file, "Second line\n");
fwrite($file, "Third line\n");

// Sluit bestand
fclose($file);

echo "File written successfully!";
?>
🔧 Praktische Oefening 8.2: Guestbook
Opdracht: Maak een gastenboek waar bezoekers berichten kunnen achterlaten.

Maak een bestand guestbook.php:

<?php
$guestbookFile = "guestbook.txt";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["name"]) && !empty($_POST["message"])) {
    $name = htmlspecialchars(trim($_POST["name"]));
    $message = htmlspecialchars(trim($_POST["message"]));
    $timestamp = date("Y-m-d H:i:s");

    // Format: timestamp|name|message
    $entry = $timestamp . "|" . $name . "|" . $message . "\n";

    // Append to file
    if (file_put_contents($guestbookFile, $entry, FILE_APPEND) !== false) {
        $successMessage = "✅ Bericht toegevoegd!";
    } else {
        $errorMessage = "❌ Fout bij opslaan";
    }

    // Redirect to prevent form resubmission
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
}

// Read entries
$entries = [];
if (file_exists($guestbookFile)) {
    $lines = file($guestbookFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        $parts = explode("|", $line, 3);
        if (count($parts) == 3) {
            $entries[] = [
                "timestamp" => $parts[0],
                "name" => $parts[1],
                "message" => $parts[2]
            ];
        }
    }

    // Nieuwste eerst
    $entries = array_reverse($entries);
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Gastenboek</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            border-bottom: 3px solid #007bff;
            padding-bottom: 10px;
        }
        form {
            margin: 20px 0;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            padding: 12px 30px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #0056b3;
        }
        .entry {
            padding: 15px;
            margin: 15px 0;
            background: #fff;
            border-left: 4px solid #007bff;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .entry-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 14px;
            color: #666;
        }
        .entry-name {
            font-weight: bold;
            color: #007bff;
        }
        .entry-message {
            color: #333;
            line-height: 1.6;
        }
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📖 Gastenboek</h1>

        <form method="POST">
            <h3>Laat een bericht achter</h3>
            <input type="text" name="name" placeholder="Je naam" required maxlength="50">
            <textarea name="message" placeholder="Je bericht" rows="4" required maxlength="500"></textarea>
            <button type="submit">📝 Verstuur</button>
        </form>

        <h2>Berichten (<?php echo count($entries); ?>)</h2>

        <?php if (empty($entries)): ?>
            <div class="empty-state">
                <p>Nog geen berichten. Wees de eerste!</p>
            </div>
        <?php else: ?>
            <?php foreach ($entries as $entry): ?>
                <div class="entry">
                    <div class="entry-header">
                        <span class="entry-name"><?php echo $entry["name"]; ?></span>
                        <span class="entry-date"><?php echo $entry["timestamp"]; ?></span>
                    </div>
                    <div class="entry-message">
                        <?php echo nl2br($entry["message"]); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>
Test de applicatie:

Voeg berichten toe via het formulier
Bekijk het guestbook.txt bestand
Refresh de pagina - berichten blijven bewaard
8.4 File System Navigatie
Werken met Directories
Directory aanmaken:

<?php
$dirName = "uploads";

if (!file_exists($dirName)) {
    if (mkdir($dirName, 0755, true)) {
        echo "Directory created successfully";
    } else {
        echo "Error creating directory";
    }
} else {
    echo "Directory already exists";
}
?>
Files in directory tonen:

<?php
$directory = "uploads";

// Controleer of directory bestaat
if (!is_dir($directory)) {
    die("Directory does not exist");
}

// Open directory
$files = scandir($directory);

echo "<h2>Files in $directory:</h2>";
echo "<ul>";
foreach ($files as $file) {
    // Skip . en ..
    if ($file != "." && $file != "..") {
        echo "<li>$file</li>";
    }
}
echo "</ul>";
?>
Glob - Files filteren met pattern:

<?php
// Vind alle .txt bestanden
$txtFiles = glob("*.txt");

echo "<h2>Text Files:</h2>";
foreach ($txtFiles as $file) {
    echo "- $file<br>";
}

// Vind alle .php bestanden in subdirectory
$phpFiles = glob("includes/*.php");

// Vind alle bestanden
$allFiles = glob("*");
?>
Bestandsinformatie
file_exists() - Check of bestand bestaat:

<?php
$filename = "data.txt";

if (file_exists($filename)) {
    echo "File exists!";
} else {
    echo "File does not exist";
}
?>
is_file() vs is_dir():

<?php
$path = "uploads";

if (is_file($path)) {
    echo "$path is a file";
} elseif (is_dir($path)) {
    echo "$path is a directory";
} else {
    echo "$path does not exist";
}
?>
filesize() - Bestandsgrootte:

<?php
$filename = "data.txt";

if (file_exists($filename)) {
    $size = filesize($filename);

    // Converteer naar KB
    $sizeKB = round($size / 1024, 2);

    echo "File size: $size bytes ($sizeKB KB)";
}
?>
filemtime() - Laatste wijziging:

<?php
$filename = "data.txt";

if (file_exists($filename)) {
    $modTime = filemtime($filename);
    $dateModified = date("Y-m-d H:i:s", $modTime);

    echo "Last modified: $dateModified";
}
?>
🔧 Praktische Oefening 8.3: File Manager
Opdracht: Bouw een simpele file manager voor een directory.

Maak een bestand file_manager.php:

<?php
$directory = "files";

// Maak directory als die niet bestaat
if (!file_exists($directory)) {
    mkdir($directory, 0755, true);
}

// Helper functie voor grootte
function formatBytes($bytes) {
    if ($bytes >= 1073741824) {
        return round($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        return round($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        return round($bytes / 1024, 2) . ' KB';
    } else {
        return $bytes . ' bytes';
    }
}

// Lees files
$files = [];
$items = scandir($directory);

foreach ($items as $item) {
    if ($item != "." && $item != "..") {
        $path = $directory . "/" . $item;

        $files[] = [
            "name" => $item,
            "path" => $path,
            "size" => is_file($path) ? filesize($path) : 0,
            "modified" => filemtime($path),
            "type" => is_dir($path) ? "directory" : "file"
        ];
    }
}

// Sorteer op naam
usort($files, function($a, $b) {
    return strcmp($a["name"], $b["name"]);
});
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>File Manager</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            margin: 0 0 20px 0;
            color: #333;
        }
        .stats {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background: #007bff;
            color: white;
            padding: 12px;
            text-align: left;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background: #f8f9fa;
        }
        .file-icon {
            font-size: 20px;
            margin-right: 10px;
        }
        .directory {
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📁 File Manager</h1>

        <div class="stats">
            <strong>Directory:</strong> <?php echo $directory; ?><br>
            <strong>Total Items:</strong> <?php echo count($files); ?><br>
            <strong>Total Size:</strong> <?php
                $totalSize = array_sum(array_column($files, 'size'));
                echo formatBytes($totalSize);
            ?>
        </div>

        <?php if (empty($files)): ?>
            <p style="text-align: center; color: #999; padding: 40px;">
                Directory is empty
            </p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Size</th>
                        <th>Modified</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($files as $file): ?>
                        <tr>
                            <td>
                                <span class="file-icon">
                                    <?php echo $file["type"] == "directory" ? "📁" : "📄"; ?>
                                </span>
                                <span class="<?php echo $file["type"] == "directory" ? "directory" : ""; ?>">
                                    <?php echo htmlspecialchars($file["name"]); ?>
                                </span>
                            </td>
                            <td>
                                <?php
                                    echo $file["type"] == "file"
                                        ? formatBytes($file["size"])
                                        : "-";
                                ?>
                            </td>
                            <td>
                                <?php echo date("Y-m-d H:i:s", $file["modified"]); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
Test de applicatie:

Plaats enkele bestanden in de files directory
Bekijk de listing met metadata
Voeg subdirectories toe
8.5 File Uploads
File uploads zijn essentieel voor user-generated content zoals profielfoto’s, documenten, etc.

Basis Upload Form
HTML Form (upload_form.html):

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>File Upload</title>
</head>
<body>
    <h1>Upload een bestand</h1>

    <!-- BELANGRIJK: enctype="multipart/form-data" -->
    <form action="upload_handler.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="uploaded_file" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
Upload Handler
PHP Upload Handler (upload_handler.php):

<?php
$uploadDir = "uploads/";

// Maak upload directory als die niet bestaat
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// Check of bestand is geupload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["uploaded_file"])) {

    $file = $_FILES["uploaded_file"];

    // Check for upload errors
    if ($file["error"] !== UPLOAD_ERR_OK) {
        die("Upload error: " . $file["error"]);
    }

    // Bestandsinformatie
    $fileName = $file["name"];
    $fileTmpPath = $file["tmp_name"];
    $fileSize = $file["size"];
    $fileType = $file["type"];

    // Genereer veilige bestandsnaam
    $safeFileName = preg_replace("/[^a-zA-Z0-9._-]/", "", $fileName);
    $destination = $uploadDir . $safeFileName;

    // Verplaats bestand van temp naar destination
    if (move_uploaded_file($fileTmpPath, $destination)) {
        echo "✅ File uploaded successfully!<br>";
        echo "File: $safeFileName<br>";
        echo "Size: " . round($fileSize / 1024, 2) . " KB<br>";
        echo "Type: $fileType<br>";
    } else {
        echo "❌ Error moving uploaded file";
    }

} else {
    echo "No file uploaded";
}
?>
Veilige Upload met Validatie
Professionele upload handler met checks:

<?php
$uploadDir = "uploads/";
$maxFileSize = 5 * 1024 * 1024; // 5 MB
$allowedTypes = ["image/jpeg", "image/png", "image/gif", "application/pdf"];
$allowedExtensions = ["jpg", "jpeg", "png", "gif", "pdf"];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["uploaded_file"])) {

    $file = $_FILES["uploaded_file"];

    // Check for upload errors
    if ($file["error"] !== UPLOAD_ERR_OK) {
        die("Upload error code: " . $file["error"]);
    }

    $fileName = $file["name"];
    $fileTmpPath = $file["tmp_name"];
    $fileSize = $file["size"];
    $fileType = mime_content_type($fileTmpPath);

    // Get extension
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Validatie 1: File size
    if ($fileSize > $maxFileSize) {
        die("❌ Error: File is too large. Max size: 5 MB");
    }

    // Validatie 2: File type
    if (!in_array($fileType, $allowedTypes)) {
        die("❌ Error: File type not allowed. Allowed: JPEG, PNG, GIF, PDF");
    }

    // Validatie 3: Extension
    if (!in_array($fileExtension, $allowedExtensions)) {
        die("❌ Error: File extension not allowed");
    }

    // Genereer unieke veilige bestandsnaam
    $newFileName = uniqid() . "_" . preg_replace("/[^a-zA-Z0-9._-]/", "", $fileName);
    $destination = $uploadDir . $newFileName;

    // Verplaats bestand
    if (move_uploaded_file($fileTmpPath, $destination)) {
        echo "✅ File uploaded successfully!<br>";
        echo "<img src='$destination' style='max-width: 400px;'>";
    } else {
        echo "❌ Error moving uploaded file";
    }

} else {
    echo "No file uploaded";
}
?>
Upload Error Codes
Code	Constant	Betekenis
0	UPLOAD_ERR_OK	Geen error, upload succesvol
1	UPLOAD_ERR_INI_SIZE	Bestand groter dan upload_max_filesize in php.ini
2	UPLOAD_ERR_FORM_SIZE	Bestand groter dan MAX_FILE_SIZE in form
3	UPLOAD_ERR_PARTIAL	Bestand slechts gedeeltelijk geupload
4	UPLOAD_ERR_NO_FILE	Geen bestand geupload
6	UPLOAD_ERR_NO_TMP_DIR	Temp directory ontbreekt
7	UPLOAD_ERR_CANT_WRITE	Schrijven naar disk gefaald
8	UPLOAD_ERR_EXTENSION	PHP extensie stopte upload
🔧 Praktische Oefening 8.4: Image Upload Gallery
Opdracht: Maak een image gallery met upload functionaliteit.

Maak een bestand gallery.php:

<?php
$uploadDir = "gallery/";
$maxFileSize = 5 * 1024 * 1024; // 5 MB
$allowedTypes = ["image/jpeg", "image/png", "image/gif"];

// Maak directory als die niet bestaat
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

$message = "";

// Handle upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {

    $file = $_FILES["image"];

    if ($file["error"] === UPLOAD_ERR_OK) {
        $fileTmpPath = $file["tmp_name"];
        $fileSize = $file["size"];
        $fileType = mime_content_type($fileTmpPath);

        // Validatie
        if ($fileSize > $maxFileSize) {
            $message = "❌ File too large (max 5 MB)";
        } elseif (!in_array($fileType, $allowedTypes)) {
            $message = "❌ Only JPEG, PNG and GIF allowed";
        } else {
            // Genereer unieke naam
            $extension = pathinfo($file["name"], PATHINFO_EXTENSION);
            $newFileName = uniqid() . "." . $extension;
            $destination = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $destination)) {
                $message = "✅ Image uploaded successfully!";
            } else {
                $message = "❌ Error uploading file";
            }
        }
    } else {
        $message = "❌ Upload error: " . $file["error"];
    }

    // Redirect to prevent resubmission
    header("Location: " . $_SERVER["PHP_SELF"] . "?msg=" . urlencode($message));
    exit;
}

// Toon message van redirect
if (isset($_GET["msg"])) {
    $message = $_GET["msg"];
}

// Lees images
$images = glob($uploadDir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
// Sorteer nieuwste eerst
usort($images, function($a, $b) {
    return filemtime($b) - filemtime($a);
});
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Image Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
        }
        .upload-form {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        input[type="file"] {
            margin: 10px 0;
        }
        button {
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .message {
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            text-align: center;
        }
        .message.success {
            background: #d4edda;
            color: #155724;
        }
        .message.error {
            background: #f8d7da;
            color: #721c24;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .gallery-item {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .gallery-item:hover {
            transform: scale(1.05);
        }
        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }
        .gallery-item-info {
            padding: 10px;
            background: #f8f9fa;
            font-size: 12px;
            color: #666;
        }
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📸 Image Gallery</h1>

        <div class="upload-form">
            <h3>Upload een afbeelding</h3>
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="image" accept="image/*" required>
                <button type="submit">Upload</button>
            </form>
            <p style="color: #666; font-size: 14px; margin-top: 10px;">
                Max 5 MB • JPEG, PNG, GIF
            </p>
        </div>

        <?php if (!empty($message)): ?>
            <div class="message <?php echo strpos($message, '✅') !== false ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <h2>Gallery (<?php echo count($images); ?> images)</h2>

        <?php if (empty($images)): ?>
            <div class="empty-state">
                <p>📷</p>
                <p>Nog geen afbeeldingen. Upload je eerste foto!</p>
            </div>
        <?php else: ?>
            <div class="gallery">
                <?php foreach ($images as $image): ?>
                    <div class="gallery-item">
                        <img src="<?php echo $image; ?>" alt="Gallery image">
                        <div class="gallery-item-info">
                            <?php
                                $size = filesize($image);
                                $date = date("Y-m-d H:i", filemtime($image));
                                echo round($size / 1024, 1) . " KB • $date";
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
8.6 Werken met CSV Bestanden
CSV (Comma-Separated Values) is een veelgebruikt format voor data import/export.

CSV Lezen
fgetcsv() - Lees CSV regel voor regel:

<?php
$csvFile = "products.csv";

// Open bestand
$file = fopen($csvFile, "r");

if ($file === false) {
    die("Error: Could not open CSV file");
}

echo "<table border='1'>";

// Lees header
$header = fgetcsv($file);
echo "<tr>";
foreach ($header as $column) {
    echo "<th>$column</th>";
}
echo "</tr>";

// Lees data rows
while (($row = fgetcsv($file)) !== false) {
    echo "<tr>";
    foreach ($row as $cell) {
        echo "<td>$cell</td>";
    }
    echo "</tr>";
}

echo "</table>";

fclose($file);
?>
CSV Schrijven
fputcsv() - Schrijf naar CSV:

<?php
$products = [
    ["ID", "Name", "Price", "Stock"],
    [1, "Laptop", 899.99, 15],
    [2, "Mouse", 29.99, 50],
    [3, "Keyboard", 79.99, 30]
];

$csvFile = "products.csv";
$file = fopen($csvFile, "w");

if ($file === false) {
    die("Error: Could not create CSV file");
}

// Schrijf elke row
foreach ($products as $row) {
    fputcsv($file, $row);
}

fclose($file);

echo "CSV file created successfully!";
?>
🔧 Praktische Oefening 8.5: Student Data Export
Opdracht: Maak een systeem dat student data kan exporteren naar CSV.

Maak een bestand student_export.php:

<?php
// Sample student data
$students = [
    ["id" => 1, "name" => "Emma Johnson", "grade" => 8.5, "class" => "4A"],
    ["id" => 2, "name" => "Liam Smith", "grade" => 7.2, "class" => "4A"],
    ["id" => 3, "name" => "Sophia Brown", "grade" => 9.1, "class" => "4B"],
    ["id" => 4, "name" => "Noah Davis", "grade" => 6.8, "class" => "4B"],
    ["id" => 5, "name" => "Olivia Wilson", "grade" => 8.9, "class" => "4A"]
];

// Handle export
if (isset($_GET["export"])) {
    // Set headers voor download
    header("Content-Type: text/csv");
    header("Content-Disposition: attachment; filename=students_" . date("Y-m-d") . ".csv");

    // Open output stream
    $output = fopen("php://output", "w");

    // Write header
    fputcsv($output, ["ID", "Name", "Grade", "Class"]);

    // Write data
    foreach ($students as $student) {
        fputcsv($output, [
            $student["id"],
            $student["name"],
            $student["grade"],
            $student["class"]
        ]);
    }

    fclose($output);
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Student Data Export</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th {
            background: #007bff;
            color: white;
            padding: 12px;
            text-align: left;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background: #f8f9fa;
        }
        .export-btn {
            display: inline-block;
            padding: 12px 24px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
        .export-btn:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <h1>📊 Student Data</h1>

    <a href="?export=true" class="export-btn">📥 Export to CSV</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Grade</th>
                <th>Class</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo $student["id"]; ?></td>
                    <td><?php echo $student["name"]; ?></td>
                    <td><?php echo $student["grade"]; ?></td>
                    <td><?php echo $student["class"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-top: 20px;">
        <h3>ℹ️ About CSV Export</h3>
        <p>De CSV file kan geopend worden in:</p>
        <ul>
            <li>Microsoft Excel</li>
            <li>Google Sheets</li>
            <li>LibreOffice Calc</li>
            <li>Elke text editor</li>
        </ul>
    </div>
</body>
</html>
8.7 Veiligheid bij File Operations
Security Best Practices
1. Valideer bestandsnamen:

<?php
// ❌ GEVAARLIJK - Directory traversal attack
$filename = $_GET["file"];  // User input: "../../../etc/passwd"
$content = file_get_contents($filename);

// ✅ VEILIG - Valideer en sanitize
$filename = basename($_GET["file"]);  // Verwijdert directory path
$allowedDir = "uploads/";
$fullPath = $allowedDir . $filename;

if (file_exists($fullPath) && is_file($fullPath)) {
    $content = file_get_contents($fullPath);
}
?>
2. Valideer upload types:

<?php
// ❌ GEVAARLIJK - Trust client
$fileType = $_FILES["file"]["type"];

// ✅ VEILIG - Check mime type server-side
$filePath = $_FILES["file"]["tmp_name"];
$fileType = mime_content_type($filePath);

$allowedTypes = ["image/jpeg", "image/png", "image/gif"];
if (!in_array($fileType, $allowedTypes)) {
    die("File type not allowed");
}
?>
3. Gebruik unieke bestandsnamen:

<?php
// ✅ Voorkom overschrijven van bestanden
$originalName = $_FILES["file"]["name"];
$extension = pathinfo($originalName, PATHINFO_EXTENSION);
$newName = uniqid() . "_" . time() . "." . $extension;
?>
4. Stel file permissions correct in:

<?php
// Directories: 0755 (rwxr-xr-x)
mkdir("uploads", 0755);

// Files: 0644 (rw-r--r--)
chmod("file.txt", 0644);
?>
5. Limiteer file size:

<?php
$maxSize = 5 * 1024 * 1024; // 5 MB

if ($_FILES["file"]["size"] > $maxSize) {
    die("File too large");
}
?>
PHP.ini Settings voor Uploads
; Maximum upload file size
upload_max_filesize = 10M

; Maximum POST data size
post_max_size = 12M

; Maximum execution time
max_execution_time = 300

; Maximum input time
max_input_time = 300
Veelvoorkomende Security Risks
Risk	Beschrijving	Preventie
Directory Traversal	../../etc/passwd in filename	Gebruik basename()
Code Injection	Upload .php file, voer uit	Check mime type, block executable types
File Overwrite	Overschrijf belangrijke files	Gebruik unieke namen
DoS via Large Files	Upload enorme files	Limiteer file size
XSS via Filename	Script in filename	Sanitize filenames
8.8 Error Handling
Try-Catch voor File Operations
<?php
function safeReadFile(string $filename): ?string {
    try {
        if (!file_exists($filename)) {
            throw new Exception("File does not exist: $filename");
        }

        if (!is_readable($filename)) {
            throw new Exception("File is not readable: $filename");
        }

        $content = file_get_contents($filename);

        if ($content === false) {
            throw new Exception("Could not read file: $filename");
        }

        return $content;

    } catch (Exception $e) {
        error_log($e->getMessage());
        return null;
    }
}

// Gebruik
$content = safeReadFile("data.txt");

if ($content === null) {
    echo "Error reading file";
} else {
    echo $content;
}
?>
Error Suppression (@) - Gebruik met Voorzichtigheid
<?php
// ❌ SLECHT - Errors hidden
$content = @file_get_contents("file.txt");

// ✅ BETER - Expliciet error handling
$content = file_get_contents("file.txt");
if ($content === false) {
    $error = error_get_last();
    error_log("File read error: " . $error["message"]);
}

// ✅ BEST - Try-catch
try {
    $content = file_get_contents("file.txt");
    if ($content === false) {
        throw new Exception("Could not read file");
    }
} catch (Exception $e) {
    error_log($e->getMessage());
}
?>
8.9 Best Practices
1. Gebruik Engelstalige Namen
<?php
// ✅ GOED
$uploadDirectory = "uploads/";
$fileName = "document.pdf";
$fileSize = filesize($fileName);

// ❌ VERMIJD
$uploadMap = "uploads/";
$bestandsNaam = "document.pdf";
$grootte = filesize($bestandsNaam);
?>
2. Organiseer Uploads in Subdirectories
<?php
$uploadBase = "uploads/";

// Organiseer per jaar/maand
$year = date("Y");
$month = date("m");
$uploadDir = $uploadBase . $year . "/" . $month . "/";

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}
?>
3. Log File Operations
<?php
function logFileOperation(string $operation, string $filename, bool $success): void {
    $logFile = "file_operations.log";
    $timestamp = date("Y-m-d H:i:s");
    $status = $success ? "SUCCESS" : "FAILED";
    $message = "[$timestamp] $operation: $filename - $status\n";

    file_put_contents($logFile, $message, FILE_APPEND);
}

// Gebruik
$result = file_put_contents("data.txt", "content");
logFileOperation("WRITE", "data.txt", $result !== false);
?>
4. Gebruik Type Hints
<?php
function readTextFile(string $filename): ?string {
    if (!file_exists($filename)) {
        return null;
    }

    $content = file_get_contents($filename);
    return $content !== false ? $content : null;
}

function writeTextFile(string $filename, string $content): bool {
    return file_put_contents($filename, $content) !== false;
}
?>
5. Cleanup Old Files
<?php
function cleanupOldFiles(string $directory, int $daysOld = 30): int {
    $deleted = 0;
    $cutoffTime = time() - ($daysOld * 24 * 60 * 60);

    $files = glob($directory . "/*");

    foreach ($files as $file) {
        if (is_file($file) && filemtime($file) < $cutoffTime) {
            if (unlink($file)) {
                $deleted++;
            }
        }
    }

    return $deleted;
}

// Verwijder files ouder dan 30 dagen
$deletedCount = cleanupOldFiles("temp/", 30);
echo "Deleted $deletedCount old files";
?>
8.10 Lab-opdrachten
📝 Lab-opdracht 8.1: Log System
Opdracht: Bouw een log systeem voor applicatie events.

Eisen:

Functie logEvent($level, $message) met levels: INFO, WARNING, ERROR
Log naar application.log
Timestamp bij elk log entry
Functie om logs te lezen en filteren op level
Viewer pagina met color-coding per level
Startcode:

<?php
function logEvent(string $level, string $message): void {
    // TODO: Implementeer
}

function readLogs(?string $filterLevel = null): array {
    // TODO: Implementeer
}
?>
📝 Lab-opdracht 8.2: File-Based Todo App
Opdracht: Maak een todo app die data opslaat in text files (niet JSON).

Eisen:

Elke todo in eigen file: todo_[id].txt
Format: regel 1 = titel, regel 2 = status (done/pending), regel 3+ = description
CRUD operations (Create, Read, Update, Delete)
List overzicht van alle todos
Detail pagina per todo
8.11 Uitgebreide Eindopdrachten
⭐ Opdracht 1 (Basis): Note Taking App
Doel: Simpele note-taking app met file storage.

Eisen:

Notes maken met titel en content
Notes opslaan als text files
Notes lijst met preview
Notes bewerken en verwijderen
Search functionaliteit
⭐⭐ Opdracht 2 (Gemiddeld): Document Manager
Doel: Upload en beheer documenten.

Eisen:

File upload (PDF, DOCX, TXT)
File metadata (naam, grootte, upload datum, type)
Download counter per file
Preview voor text files
Zoeken op bestandsnaam
Sorteer op naam, grootte, datum
Metadata opslag: JSON file per document

⭐⭐⭐ Opdracht 3 (Gevorderd): Blog System
Doel: Volledig blog systeem met file-based storage.

Eisen:

Blog posts in text files
Post metadata (titel, auteur, datum, categorie, tags)
Image uploads voor posts
Categories en tags systeem
Archive functionaliteit (per maand/jaar)
RSS feed generatie
Export naar Markdown
Files:

/posts/[year]/[month]/[post-id].txt - Post content
/posts/[year]/[month]/[post-id].meta.json - Metadata
/images/posts/[post-id]/ - Post images
⭐⭐⭐⭐ Opdracht 4 (Expert): File-Based CMS
Doel: Content Management System met file storage.

Eisen:

Pages systeem (create, edit, delete)
Template system (header, footer, layouts)
Media library (images, documents)
User uploads
Version control (page revisions in files)
Backup/restore functionaliteit
Site export (download alle content)
Structure:

/content/pages/[slug].md - Page content (Markdown)
/content/pages/[slug].meta.json - Page metadata
/media/uploads/ - User uploads
/templates/ - Template files
/backups/ - Backup files
⭐⭐⭐⭐⭐ Opdracht 5 (Master): Advanced File Management System
Doel: Enterprise-level file management systeem.

Eisen:

Multi-user support met permissions
Directory browsing met breadcrumbs
File/folder operations (create, rename, move, copy, delete)
File search (naam, type, content)
Thumbnail generation voor images
Zip/unzip functionaliteit
File sharing met expiry links
Activity logging
Disk quota management per user
Trash/recycle bin functionality
Bulk operations
Advanced Features:

File versioning
Preview voor office documents
Collaborative editing tracking
Custom metadata tags
Advanced search filters
Download statistics
8.12 Samenvatting
🎉 Gefeliciteerd! Je hebt geleerd werken met bestanden in PHP!

Wat heb je geleerd?
✅ File Reading:

file_get_contents() - Lees hele bestand
file() - Lees als array per regel
fopen(), fgets(), fclose() - Regel voor regel
File reading modes
✅ File Writing:

file_put_contents() - Schrijf string naar bestand
FILE_APPEND - Toevoegen i.p.v. overschrijven
fopen(), fwrite(), fclose() - Meer controle
Write modes
✅ File System:

mkdir() - Directory aanmaken
scandir(), glob() - Directory listing
file_exists(), is_file(), is_dir() - Checks
filesize(), filemtime() - Metadata
✅ File Uploads:

$_FILES superglobal
move_uploaded_file() - Veilig verplaatsen
Upload validatie (size, type, extension)
Error handling met error codes
Security best practices
✅ CSV Operations:

fgetcsv() - CSV lezen
fputcsv() - CSV schrijven
Data export functionaliteit
CSV als data interchange format
✅ Security:

Directory traversal prevention
File type validation
Upload size limits
Unique filenames
Proper permissions
✅ Best Practices:

Engelstalige namen
Error handling
Logging
Type hints
File organization
🎯 Belangrijkste Lessen:

Valideer altijd - User input kan gevaarlijk zijn
Error handling - File operations kunnen falen
Security first - Protect tegen directory traversal, code injection
Unieke namen - Voorkom file overwrites
Check file types - Valideer server-side, niet client-side
Limit file size - Voorkom DoS attacks
Proper cleanup - Verwijder oude/temp files
Veel Voorkomende Valkuilen
❌ Vergeten file_exists() check:

$content = file_get_contents("data.txt");  // Kan fatal error geven!
✅ Correct:

if (file_exists("data.txt")) {
    $content = file_get_contents("data.txt");
}
❌ Trust user filename:

$file = $_GET["file"];
$content = file_get_contents($file);  // Directory traversal!
✅ Correct:

$file = basename($_GET["file"]);
$fullPath = "uploads/" . $file;
if (file_exists($fullPath)) {
    $content = file_get_contents($fullPath);
}
❌ Geen upload validatie:

move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $_FILES["file"]["name"]);
✅ Correct:

// Valideer type, size, extension
// Genereer veilige unieke naam
// Dan pas move_uploaded_file()
Volgende Stappen
Nu je file handling beheerst, kun je:

Werken met databases én files (hybrid storage)
Image manipulation (GD library, ImageMagick)
PDF generation
File caching strategies
Stream handling voor grote files
FTP/SFTP operations
Continue Learning:

Bestudeer SPL (Standard PHP Library) file classes
Leer over streams en filters
Experimenteer met file locking
Bouw een complete file-based CMS
Ontdek image processing libraries
Bronnen en Verdere Studie
📚 Officiële Documentatie
PHP File Functions:

PHP: Filesystem Functions - Alle file functies
PHP: File Uploads - Upload handling
PHP: Directory Functions - Directory operations
PHP: SPL Files - SPL file classes
🎓 Tutorials en Guides (2026)
File Handling:

PHP: The Right Way - Files - Best practices
W3Schools: PHP File Handling - Basis tutorial
TutorialRepublic: PHP File System - Uitgebreid
Upload Security:

OWASP: File Upload Cheat Sheet - Security guide
PHP Security: File Uploads - Security best practices
🔧 Tools
Development:

XAMPP - Local development met file permissions
WinSCP - FTP/SFTP client
FileZilla - FTP client
File Analysis:

ExifTool - Metadata extraction
TrID - File type identification
📖 Community & Help
Stack Overflow - PHP Files
Reddit r/PHPhelp
PHP Discord
Veel succes met file handling in PHP! 🚀

Remember: Valideer altijd user input en test je security!

© 2025 ROC-Midden Nederland – ICT-College – Amersfoort, Nederland

MBO Niveau 4 - Software Developer

PHP Tutorials – Werken met Bestanden in PHP

PHP Tutorial
ROC ICA Logo
H9-Werken met Classes in PHP

Hoofdstuk 9: Werken met Classes in PHP
Tot nu toe heb je gewerkt met procedurele programmering - code die van boven naar beneden wordt uitgevoerd met functies en variabelen. In dit hoofdstuk leer je Object-Oriented Programming (OOP) kennen - een fundamenteel andere manier van programmeren die je code structureert rond objecten en classes.

OOP is een krachtige programmeerparadigma die code organiseert, herbruikbaar maakt en onderhoudbaar houdt. Vrijwel alle moderne PHP-applicaties en frameworks (Laravel, Symfony, WordPress core) gebruiken OOP. En let op: niet alleen PHP - ook talen zoals Java, C#, Python en JavaScript zijn OOP-georiënteerd. Iedere professionele ontwikkelaar moet OOP begrijpen!

OOP is een nieuwe manier van denken. Als je beginner bent, kan het in het begin verwarrend zijn. Dat is normaal! Neem de tijd om elk concept goed te begrijpen voordat je verder gaat. En ik kan het niet genoeg herhalen, alles wat je in dit hoofdstuk leert, is essentieel voor professionele PHP-ontwikkeling maar ook voor andere talen. Dus zorg dat je dit hoofdstuk grondig doorneemt en de oefeningen maakt!

Wat ga je Leren?
In dit hoofdstuk leer je:

Wat classes en objects zijn - De fundamenten van OOP
Properties en methods - Data en gedrag in classes
Constructors en destructors - Object initialisatie en opruiming
Access modifiers - public, private, protected
Inheritance (overerving) - Classes uitbreiden
Type declarations - Strong typing in OOP
JSON en OOP - Objects converteren naar JSON
Praktische toepassingen - Real-world voorbeelden
💡 Let op: Dit hoofdstuk bouwt voort op hoofdstuk 1-8. Zorg dat je variabelen, functies, arrays en JSON begrijpt!

Voordat je Begint: Modern PHP Setup
Strict Types Mode
In dit hoofdstuk gebruiken we strict types mode - dit zorgt voor betere type safety:

<?php
declare(strict_types=1);

// Nu wordt type checking afgedwongen!
?>
💡 Waarom strict types?

Voorkomt type-gerelateerde bugs
Maakt code voorspelbaarder
Is de moderne PHP standaard
Verplicht in professionele projecten
Check je PHP versie:

php -v
Je hebt minimaal PHP 7.0 nodig voor type declarations, maar PHP 8.0+ is aanbevolen.

9.1 Wat zijn Classes en Objects?
Het Concept Begrijpen
Stel je voor dat je een blauwdruk hebt voor een huis. Die blauwdruk beschrijft hoe het huis eruit ziet, maar is zelf geen huis. Je kunt die blauwdruk gebruiken om meerdere huizen te bouwen.

In programmeren:

Class = De blauwdruk (blueprint)
Object = Het daadwerkelijke huis (instance)
Real-World Voorbeeld: Auto’s
<?php
// Class = Blauwdruk voor een auto
class Car {
    // Properties (eigenschappen)
    public string $brand;
    public string $color;
    public int $speed;

    // Methods (gedrag)
    public function drive(): void {
        echo "The {$this->brand} is driving!";
    }
}

// Objects = Daadwerkelijke auto's
$car1 = new Car();  // Object 1
$car1->brand = "Tesla";
$car1->color = "Red";

$car2 = new Car();  // Object 2
$car2->brand = "BMW";
$car2->color = "Blue";

// Elk object heeft zijn eigen data!
echo $car1->brand;  // Tesla
echo $car2->brand;  // BMW
?>
Belangrijke concepten:

class Car { } - Definieert de class (blauwdruk)
new Car() - Creëert een object (instance)
$this->brand - Verwijst naar de property van HET object
-> - Object operator (pijltje)
🔧 Praktische Oefening 9.1: Je Eerste Class
Opdracht: Maak een Student class.

Maak een bestand student_class.php:

<?php
declare(strict_types=1);

class Student {
    // Properties
    public string $name;
    public int $age;
    public string $course;

    // Method
    public function introduce(): void {
        echo "Hi! I'm {$this->name}, {$this->age} years old, studying {$this->course}.";
    }
}

// Maak student objects
$student1 = new Student();
$student1->name = "Emma";
$student1->age = 20;
$student1->course = "Software Development";

$student2 = new Student();
$student2->name = "Lucas";
$student2->age = 19;
$student2->course = "ICT Infrastructure";
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Student Classes</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .student-card {
            border: 2px solid #007bff;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            background: #f0f8ff;
        }
    </style>
</head>
<body>
    <h1>Student Information</h1>

    <div class="student-card">
        <h3><?= htmlspecialchars($student1->name) ?></h3>
        <p><strong>Age:</strong> <?= $student1->age ?></p>
        <p><strong>Course:</strong> <?= htmlspecialchars($student1->course) ?></p>
        <p><?php $student1->introduce(); ?></p>
    </div>

    <div class="student-card">
        <h3><?= htmlspecialchars($student2->name) ?></h3>
        <p><strong>Age:</strong> <?= $student2->age ?></p>
        <p><strong>Course:</strong> htmlspecialchars($student2->course) ?></p>
        <p><?php $student2->introduce(); ?></p>
    </div>
</body>
</html>
Test dit bestand in je browser. Je ziet twee student cards met verschillende data!

9.2 Constructors - Objects Initialiseren
Het Probleem met Handmatige Initialisatie
In het vorige voorbeeld moesten we elk object handmatig instellen:

<?php
$student = new Student();
$student->name = "Emma";      // 😞 Veel werk
$student->age = 20;
$student->course = "Software Development";
?>
Problemen:

Veel code
Vergeet je een property? Object is onvolledig!
Niet handig bij 10+ properties
De Constructor: __construct()
Een constructor wordt automatisch aangeroepen wanneer je een object maakt:

<?php
declare(strict_types=1);

class Student {
    public string $name;
    public int $age;
    public string $course;

    // Constructor - wordt AUTOMATISCH aangeroepen
    public function __construct(string $name, int $age, string $course) {
        $this->name = $name;
        $this->age = $age;
        $this->course = $course;
    }

    public function introduce(): void {
        echo "Hi! I'm {$this->name}, {$this->age} years old.";
    }
}

// Nu is het VEEL eenvoudiger!
$student1 = new Student("Emma", 20, "Software Development");
$student2 = new Student("Lucas", 19, "ICT Infrastructure");

$student1->introduce();  // Hi! I'm Emma, 20 years old.
?>
Voordelen:

✅ Eén regel code per object
✅ Alle properties worden ingesteld
✅ Type checking door strict types
✅ Kan niet vergeten properties in te stellen
Constructor met Default Values
Je kunt default waarden instellen:

<?php
declare(strict_types=1);

class Product {
    public string $name;
    public float $price;
    public bool $inStock;

    // Default value voor $inStock
    public function __construct(string $name, float $price, bool $inStock = true) {
        $this->name = $name;
        $this->price = $price;
        $this->inStock = $inStock;
    }
}

// $inStock is automatisch true
$product1 = new Product("Laptop", 999.99);

// Of expliciet instellen
$product2 = new Product("Mouse", 29.99, false);
?>
🔧 Praktische Oefening 9.2: Product Class met Constructor
Opdracht: Maak een product catalogus met constructor.

Maak een bestand product_class.php:

<?php
declare(strict_types=1);

class Product {
    public string $name;
    public float $price;
    public string $category;
    public int $stock;

    public function __construct(string $name, float $price, string $category, int $stock = 0) {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
        $this->stock = $stock;
    }

    public function getPriceWithVAT(float $vatPercentage = 21): float {
        return round($this->price * (1 + $vatPercentage / 100), 2);
    }

    public function isInStock(): bool {
        return $this->stock > 0;
    }

    public function getStockStatus(): string {
        if ($this->stock > 10) {
            return "✅ In stock";
        } elseif ($this->stock > 0) {
            return "⚠️ Low stock";
        } else {
            return "❌ Out of stock";
        }
    }
}

// Maak producten
$products = [
    new Product("Laptop Dell XPS", 1299.99, "Electronics", 15),
    new Product("iPhone 15", 999.99, "Electronics", 3),
    new Product("Desk Chair", 249.99, "Furniture", 0),
    new Product("Monitor 27\"", 349.99, "Electronics", 25)
];
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Product Catalog</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        h1 { color: #333; }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .product-card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .product-card h3 { margin-top: 0; color: #007bff; }
        .price { font-size: 1.3em; color: #28a745; font-weight: bold; }
        .category {
            background: #6c757d;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
            font-size: 0.85em;
        }
    </style>
</head>
<body>
    <h1>📦 Product Catalog</h1>

    <div class="product-grid">
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <h3><?= htmlspecialchars($product->name) ?></h3>
                <p><span class="category"><?= htmlspecialchars($product->category) ?></span></p>
                <p class="price">€<?= number_format($product->price, 2) ?></p>
                <p><strong>Price incl. VAT:</strong> €<?= number_format($product->getPriceWithVAT(), 2) ?></p>
                <p><strong>Stock:</strong> <?= $product->stock ?> units</p>
                <p><?= $product->getStockStatus() ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
Test dit bestand! Je ziet nu een professionele product catalogus.

9.3 Access Modifiers - Encapsulation
Tot nu toe hebben we alle properties public gemaakt. Maar dat is niet veilig!

Het Probleem met Public Properties
<?php
class BankAccount {
    public float $balance;  // 😱 GEVAARLIJK!

    public function __construct(float $initialBalance) {
        $this->balance = $initialBalance;
    }
}

$account = new BankAccount(1000.00);

// OH NEE! Iedereen kan het saldo direct aanpassen!
$account->balance = 999999.99;  // 😈 Hackers paradise
?>
De Oplossing: Private Properties
<?php
declare(strict_types=1);

class BankAccount {
    private float $balance;  // ✅ VEILIG - alleen binnen de class toegankelijk

    public function __construct(float $initialBalance) {
        if ($initialBalance < 0) {
            throw new Exception("Initial balance cannot be negative");
        }
        $this->balance = $initialBalance;
    }

    // Getter - lezen van balance
    public function getBalance(): float {
        return $this->balance;
    }

    // Controlled method om geld toe te voegen
    public function deposit(float $amount): void {
        if ($amount <= 0) {
            throw new Exception("Deposit amount must be positive");
        }
        $this->balance += $amount;
    }

    // Controlled method om geld op te nemen
    public function withdraw(float $amount): bool {
        if ($amount <= 0) {
            return false;
        }
        if ($amount > $this->balance) {
            return false;  // Insufficient funds
        }
        $this->balance -= $amount;
        return true;
    }
}

$account = new BankAccount(1000.00);

// Dit werkt NIET meer - balance is private!
// $account->balance = 999999.99;  // ❌ ERROR!

// Alleen via methods (gecontroleerd)
echo $account->getBalance();  // 1000.00
$account->deposit(500.00);
echo $account->getBalance();  // 1500.00
$account->withdraw(200.00);
echo $account->getBalance();  // 1300.00
?>
Access Modifiers Overzicht
Modifier	Toegankelijk van?	Wanneer gebruiken?
public	Overal	Methods die van buiten aangeroepen worden
private	Alleen binnen de class zelf	Properties en interne helper methods
protected	Binnen class en child classes	Properties/methods voor inheritance
Best Practice: Getters en Setters
<?php
declare(strict_types=1);

class User {
    private string $email;
    private int $age;

    public function __construct(string $email, int $age) {
        $this->setEmail($email);  // Use setter for validation
        $this->setAge($age);
    }

    // Getter voor email
    public function getEmail(): string {
        return $this->email;
    }

    // Setter met validatie
    public function setEmail(string $email): void {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format");
        }
        $this->email = $email;
    }

    // Getter voor age
    public function getAge(): int {
        return $this->age;
    }

    // Setter met validatie
    public function setAge(int $age): void {
        if ($age < 0 || $age > 150) {
            throw new Exception("Invalid age");
        }
        $this->age = $age;
    }
}

$user = new User("emma@example.com", 20);
echo $user->getEmail();  // emma@example.com

// Validatie werkt!
try {
    $user->setEmail("invalid-email");  // ❌ Exception!
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
🔧 Praktische Oefening 9.3: Veilige Product Class
Opdracht: Maak een Product class met private properties en getters/setters.

Maak een bestand secure_product.php:

<?php
declare(strict_types=1);

class Product {
    private string $name;
    private float $price;
    private int $stock;

    public function __construct(string $name, float $price, int $stock = 0) {
        $this->setName($name);
        $this->setPrice($price);
        $this->setStock($stock);
    }

    // Getters
    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getStock(): int {
        return $this->stock;
    }

    // Setters with validation
    public function setName(string $name): void {
        if (strlen(trim($name)) === 0) {
            throw new Exception("Product name cannot be empty");
        }
        $this->name = trim($name);
    }

    public function setPrice(float $price): void {
        if ($price < 0) {
            throw new Exception("Price cannot be negative");
        }
        $this->price = $price;
    }

    public function setStock(int $stock): void {
        if ($stock < 0) {
            throw new Exception("Stock cannot be negative");
        }
        $this->stock = $stock;
    }

    // Business logic methods
    public function addStock(int $quantity): void {
        if ($quantity <= 0) {
            throw new Exception("Quantity must be positive");
        }
        $this->stock += $quantity;
    }

    public function removeStock(int $quantity): bool {
        if ($quantity <= 0) {
            return false;
        }
        if ($quantity > $this->stock) {
            return false;  // Not enough stock
        }
        $this->stock -= $quantity;
        return true;
    }

    public function getPriceWithVAT(float $vatPercentage = 21): float {
        return round($this->price * (1 + $vatPercentage / 100), 2);
    }
}

// Test de class
$product = new Product("Laptop", 999.99, 10);

echo "<h2>Product Information</h2>";
echo "<p><strong>Name:</strong> " . htmlspecialchars($product->getName()) . "</p>";
echo "<p><strong>Price:</strong> €" . number_format($product->getPrice(), 2) . "</p>";
echo "<p><strong>Stock:</strong> " . $product->getStock() . " units</p>";

// Voeg stock toe
$product->addStock(5);
echo "<p>After adding 5 units: " . $product->getStock() . " units</p>";

// Verwijder stock
if ($product->removeStock(3)) {
    echo "<p>After removing 3 units: " . $product->getStock() . " units</p>";
}

// Test validation
try {
    $invalidProduct = new Product("", -50, 10);  // ❌ Should fail
} catch (Exception $e) {
    echo "<p style='color: red;'>Validation works! Error: " . $e->getMessage() . "</p>";
}
?>
9.4 Inheritance - Classes Uitbreiden
Inheritance (overerving) laat je een nieuwe class maken gebaseerd op een bestaande class.

Waarom Inheritance?
Stel je voor dat je verschillende soorten producten hebt:

Elektronisch product - heeft garantie
Kleding product - heeft maat en kleur
Voedsel product - heeft vervaldatum
Alle producten delen eigenschappen (naam, prijs), maar hebben ook unieke eigenschappen.

Het Parent-Child Concept
<?php
declare(strict_types=1);

// Parent class (basis)
class Product {
    protected string $name;    // protected = accessible in child classes
    protected float $price;

    public function __construct(string $name, float $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getInfo(): string {
        return "{$this->name} - €{$this->price}";
    }
}

// Child class (extends parent)
class ElectronicProduct extends Product {
    private int $warrantyMonths;

    public function __construct(string $name, float $price, int $warrantyMonths) {
        parent::__construct($name, $price);  // Call parent constructor
        $this->warrantyMonths = $warrantyMonths;
    }

    public function getWarrantyMonths(): int {
        return $this->warrantyMonths;
    }

    // Override parent method
    public function getInfo(): string {
        return parent::getInfo() . " (Warranty: {$this->warrantyMonths} months)";
    }
}

// Another child class
class ClothingProduct extends Product {
    private string $size;
    private string $color;

    public function __construct(string $name, float $price, string $size, string $color) {
        parent::__construct($name, $price);
        $this->size = $size;
        $this->color = $color;
    }

    public function getSize(): string {
        return $this->size;
    }

    public function getColor(): string {
        return $this->color;
    }

    public function getInfo(): string {
        return parent::getInfo() . " (Size: {$this->size}, Color: {$this->color})";
    }
}

// Gebruik de classes
$laptop = new ElectronicProduct("Dell XPS 15", 1499.99, 24);
$shirt = new ClothingProduct("T-Shirt", 29.99, "L", "Blue");

echo $laptop->getInfo();  // Dell XPS 15 - €1499.99 (Warranty: 24 months)
echo "<br>";
echo $shirt->getInfo();   // T-Shirt - €29.99 (Size: L, Color: Blue)
?>
Belangrijke concepten:

extends - Maakt een child class
parent::__construct() - Roept parent constructor aan
parent::methodName() - Roept parent method aan
protected - Toegankelijk in parent EN child classes
Override - Child method vervangt parent method
🔧 Praktische Oefening 9.4: Vehicle Inheritance
Opdracht: Maak een vehicle hierarchy.

Maak een bestand vehicle_inheritance.php:

<?php
declare(strict_types=1);

// Base class
class Vehicle {
    protected string $brand;
    protected string $model;
    protected int $year;
    protected float $price;

    public function __construct(string $brand, string $model, int $year, float $price) {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->price = $price;
    }

    public function getBrand(): string {
        return $this->brand;
    }

    public function getModel(): string {
        return $this->model;
    }

    public function getYear(): int {
        return $this->year;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getDescription(): string {
        return "{$this->year} {$this->brand} {$this->model} - €" . number_format($this->price, 2);
    }
}

// Child class: Car
class Car extends Vehicle {
    private int $doors;
    private string $fuelType;

    public function __construct(
        string $brand,
        string $model,
        int $year,
        float $price,
        int $doors,
        string $fuelType
    ) {
        parent::__construct($brand, $model, $year, $price);
        $this->doors = $doors;
        $this->fuelType = $fuelType;
    }

    public function getDoors(): int {
        return $this->doors;
    }

    public function getFuelType(): string {
        return $this->fuelType;
    }

    public function getDescription(): string {
        return parent::getDescription() . " | {$this->doors} doors, {$this->fuelType}";
    }
}

// Child class: Motorcycle
class Motorcycle extends Vehicle {
    private int $engineCC;
    private bool $hasABS;

    public function __construct(
        string $brand,
        string $model,
        int $year,
        float $price,
        int $engineCC,
        bool $hasABS
    ) {
        parent::__construct($brand, $model, $year, $price);
        $this->engineCC = $engineCC;
        $this->hasABS = $hasABS;
    }

    public function getEngineCC(): int {
        return $this->engineCC;
    }

    public function hasABS(): bool {
        return $this->hasABS;
    }

    public function getDescription(): string {
        $abs = $this->hasABS ? "with ABS" : "without ABS";
        return parent::getDescription() . " | {$this->engineCC}cc, {$abs}";
    }
}

// Child class: Truck
class Truck extends Vehicle {
    private float $loadCapacityKg;
    private int $axles;

    public function __construct(
        string $brand,
        string $model,
        int $year,
        float $price,
        float $loadCapacityKg,
        int $axles
    ) {
        parent::__construct($brand, $model, $year, $price);
        $this->loadCapacityKg = $loadCapacityKg;
        $this->axles = $axles;
    }

    public function getLoadCapacityKg(): float {
        return $this->loadCapacityKg;
    }

    public function getAxles(): int {
        return $this->axles;
    }

    public function getDescription(): string {
        return parent::getDescription() . " | Load: {$this->loadCapacityKg}kg, {$this->axles} axles";
    }
}

// Maak verschillende voertuigen
$vehicles = [
    new Car("Tesla", "Model 3", 2024, 45000, 4, "Electric"),
    new Car("BMW", "3 Series", 2023, 55000, 4, "Diesel"),
    new Motorcycle("Harley-Davidson", "Sportster", 2024, 12000, 1200, true),
    new Motorcycle("Yamaha", "MT-07", 2023, 8000, 689, true),
    new Truck("Volvo", "FH16", 2023, 95000, 25000, 3),
    new Truck("Mercedes", "Actros", 2024, 105000, 28000, 4)
];
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Vehicle Dealership</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        h1 { color: #333; }
        .vehicle-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
        }
        .vehicle-card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .vehicle-card h3 { margin-top: 0; color: #007bff; }
        .type-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.85em;
            font-weight: bold;
            color: white;
        }
        .type-car { background: #28a745; }
        .type-motorcycle { background: #fd7e14; }
        .type-truck { background: #6c757d; }
        .price { font-size: 1.2em; color: #28a745; font-weight: bold; margin: 10px 0; }
    </style>
</head>
<body>
    <h1>🚗 Vehicle Dealership</h1>

    <div class="vehicle-grid">
        <?php foreach ($vehicles as $vehicle): ?>
            <div class="vehicle-card">
                <?php if ($vehicle instanceof Car): ?>
                    <span class="type-badge type-car">CAR</span>
                <?php elseif ($vehicle instanceof Motorcycle): ?>
                    <span class="type-badge type-motorcycle">MOTORCYCLE</span>
                <?php elseif ($vehicle instanceof Truck): ?>
                    <span class="type-badge type-truck">TRUCK</span>
                <?php endif; ?>

                <h3><?= htmlspecialchars($vehicle->getBrand() . " " . $vehicle->getModel()) ?></h3>
                <p class="price">€<?= number_format($vehicle->getPrice(), 2) ?></p>
                <p><strong>Year:</strong> <?= $vehicle->getYear() ?></p>

                <?php if ($vehicle instanceof Car): ?>
                    <p><strong>Doors:</strong> <?= $vehicle->getDoors() ?></p>
                    <p><strong>Fuel:</strong> <?= htmlspecialchars($vehicle->getFuelType()) ?></p>
                <?php elseif ($vehicle instanceof Motorcycle): ?>
                    <p><strong>Engine:</strong> <?= $vehicle->getEngineCC() ?>cc</p>
                    <p><strong>ABS:</strong> <?= $vehicle->hasABS() ? "✅ Yes" : "❌ No" ?></p>
                <?php elseif ($vehicle instanceof Truck): ?>
                    <p><strong>Load Capacity:</strong> <?= number_format($vehicle->getLoadCapacityKg()) ?>kg</p>
                    <p><strong>Axles:</strong> <?= $vehicle->getAxles() ?></p>
                <?php endif; ?>

                <p><small><?= htmlspecialchars($vehicle->getDescription()) ?></small></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
Test dit bestand! Je ziet een complete vehicle dealership met verschillende voertuigtypes.

9.5 Type Declarations en Return Types
Modern PHP gebruikt type declarations voor betere code quality.

Parameter Type Declarations
<?php
declare(strict_types=1);

class Calculator {
    // Type declarations voor parameters
    public function add(int $a, int $b): int {
        return $a + $b;
    }

    public function divide(float $a, float $b): float {
        if ($b === 0.0) {
            throw new Exception("Cannot divide by zero");
        }
        return $a / $b;
    }

    public function concatenate(string $a, string $b): string {
        return $a . $b;
    }
}

$calc = new Calculator();

echo $calc->add(10, 20);           // 30
echo $calc->divide(10.0, 3.0);     // 3.333...
echo $calc->concatenate("Hello", " World");  // Hello World

// Dit geeft een ERROR met strict_types=1:
// $calc->add("10", "20");  // ❌ TypeError!
?>
Return Type Declarations
<?php
declare(strict_types=1);

class User {
    private string $name;
    private int $age;

    public function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
    }

    // Return type: string
    public function getName(): string {
        return $this->name;
    }

    // Return type: int
    public function getAge(): int {
        return $this->age;
    }

    // Return type: bool
    public function isAdult(): bool {
        return $this->age >= 18;
    }

    // Return type: void (geen return waarde)
    public function celebrateBirthday(): void {
        $this->age++;
        echo "Happy birthday! You are now {$this->age} years old.";
    }

    // Return type: array
    public function toArray(): array {
        return [
            'name' => $this->name,
            'age' => $this->age
        ];
    }
}
?>
Nullable Types (PHP 7.1+)
<?php
declare(strict_types=1);

class Profile {
    private string $username;
    private ?string $bio;  // Nullable - kan string of null zijn

    public function __construct(string $username, ?string $bio = null) {
        $this->username = $username;
        $this->bio = $bio;
    }

    public function getBio(): ?string {
        return $this->bio;
    }

    public function setBio(?string $bio): void {
        $this->bio = $bio;
    }
}

$profile1 = new Profile("emma");  // bio is null
$profile2 = new Profile("lucas", "Software developer");

echo $profile1->getBio();  // null
echo $profile2->getBio();  // Software developer
?>
Union Types (PHP 8.0+)
<?php
declare(strict_types=1);

class DataProcessor {
    // Accepteert int OF float
    public function process(int|float $value): int|float {
        return $value * 2;
    }

    // Accepteert string OF array
    public function format(string|array $data): string {
        if (is_array($data)) {
            return implode(", ", $data);
        }
        return $data;
    }
}

$processor = new DataProcessor();
echo $processor->process(10);      // 20
echo $processor->process(10.5);    // 21.0
echo $processor->format("Hello");  // Hello
echo $processor->format(["A", "B", "C"]);  // A, B, C
?>
9.6 JSON en Object-Oriented Programming
Classes werken perfect samen met JSON voor data uitwisseling.

Objects naar JSON Converteren
<?php
declare(strict_types=1);

class Product {
    private string $name;
    private float $price;
    private int $stock;

    public function __construct(string $name, float $price, int $stock) {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    // Converteer naar array voor JSON
    public function toArray(): array {
        return [
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock
        ];
    }

    // Direct naar JSON
    public function toJSON(): string {
        return json_encode($this->toArray(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}

$product = new Product("Laptop", 999.99, 10);
echo $product->toJSON();

// Output:
// {
//     "name": "Laptop",
//     "price": 999.99,
//     "stock": 10
// }
?>
JSON naar Objects Converteren
<?php
declare(strict_types=1);

class Product {
    private string $name;
    private float $price;
    private int $stock;

    public function __construct(string $name, float $price, int $stock) {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getStock(): int {
        return $this->stock;
    }

    // Static method: Create Product from JSON
    public static function fromJSON(string $json): Product {
        $data = json_decode($json, true);

        if ($data === null) {
            throw new Exception("Invalid JSON");
        }

        if (!isset($data['name'], $data['price'], $data['stock'])) {
            throw new Exception("Missing required fields");
        }

        return new Product($data['name'], $data['price'], $data['stock']);
    }

    // Static method: Create Product from array
    public static function fromArray(array $data): Product {
        if (!isset($data['name'], $data['price'], $data['stock'])) {
            throw new Exception("Missing required fields");
        }

        return new Product($data['name'], $data['price'], $data['stock']);
    }
}

// JSON naar Product object
$json = '{"name":"Monitor","price":299.99,"stock":15}';
$product = Product::fromJSON($json);

echo $product->getName();   // Monitor
echo $product->getPrice();  // 299.99
?>
🔧 Praktische Oefening 9.6: Product API met JSON
Opdracht: Maak een product API die JSON retourneert.

Maak een bestand product_api.php:

<?php
declare(strict_types=1);

class Product {
    private int $id;
    private string $name;
    private float $price;
    private string $category;
    private int $stock;

    public function __construct(int $id, string $name, float $price, string $category, int $stock) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
        $this->stock = $stock;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getCategory(): string {
        return $this->category;
    }

    public function getStock(): int {
        return $this->stock;
    }

    public function isInStock(): bool {
        return $this->stock > 0;
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'category' => $this->category,
            'stock' => $this->stock,
            'inStock' => $this->isInStock()
        ];
    }
}

class ProductRepository {
    private array $products = [];

    public function __construct() {
        // Simuleer database data
        $this->products = [
            new Product(1, "Laptop Dell XPS", 1299.99, "Electronics", 15),
            new Product(2, "iPhone 15", 999.99, "Electronics", 25),
            new Product(3, "Desk Chair", 249.99, "Furniture", 0),
            new Product(4, "Monitor 27\"", 349.99, "Electronics", 8),
            new Product(5, "Keyboard Mechanical", 129.99, "Accessories", 30)
        ];
    }

    public function getAll(): array {
        return $this->products;
    }

    public function getById(int $id): ?Product {
        foreach ($this->products as $product) {
            if ($product->getId() === $id) {
                return $product;
            }
        }
        return null;
    }

    public function getByCategory(string $category): array {
        return array_filter($this->products, function($product) use ($category) {
            return $product->getCategory() === $category;
        });
    }

    public function getInStock(): array {
        return array_filter($this->products, function($product) {
            return $product->isInStock();
        });
    }
}

// API Logic
$repo = new ProductRepository();

// Get action from query parameter
$action = $_GET['action'] ?? 'all';
$response = [];

switch ($action) {
    case 'all':
        $products = $repo->getAll();
        $response = [
            'success' => true,
            'count' => count($products),
            'data' => array_map(fn($p) => $p->toArray(), $products)
        ];
        break;

    case 'single':
        $id = (int)($_GET['id'] ?? 0);
        $product = $repo->getById($id);

        if ($product) {
            $response = [
                'success' => true,
                'data' => $product->toArray()
            ];
        } else {
            $response = [
                'success' => false,
                'error' => 'Product not found'
            ];
        }
        break;

    case 'category':
        $category = $_GET['category'] ?? '';
        $products = $repo->getByCategory($category);
        $response = [
            'success' => true,
            'category' => $category,
            'count' => count($products),
            'data' => array_map(fn($p) => $p->toArray(), $products)
        ];
        break;

    case 'in-stock':
        $products = $repo->getInStock();
        $response = [
            'success' => true,
            'count' => count($products),
            'data' => array_map(fn($p) => $p->toArray(), $products)
        ];
        break;

    default:
        $response = [
            'success' => false,
            'error' => 'Invalid action'
        ];
}

// Return JSON
header('Content-Type: application/json; charset=utf-8');
echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
Test de API:

product_api.php?action=all - Alle producten
product_api.php?action=single&id=1 - Specifiek product
product_api.php?action=category&category=Electronics - Per categorie
product_api.php?action=in-stock - Alleen op voorraad
Maak nu ook een frontend product_viewer.html:

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Viewer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f5f5f5;
        }
        h1 { color: #333; }
        .controls {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        button {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }
        button:hover { background: #0056b3; }
        #output {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        pre {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <h1>📦 Product API Viewer</h1>

    <div class="controls">
        <h3>API Actions:</h3>
        <button onclick="fetchProducts('all')">All Products</button>
        <button onclick="fetchProducts('single&id=1')">Product ID 1</button>
        <button onclick="fetchProducts('category&category=Electronics')">Electronics</button>
        <button onclick="fetchProducts('in-stock')">In Stock Only</button>
    </div>

    <div id="output">
        <p>Click a button to fetch data...</p>
    </div>

    <script>
        async function fetchProducts(action) {
            const output = document.getElementById('output');
            output.innerHTML = '<p>Loading...</p>';

            try {
                const response = await fetch(`product_api.php?action=${action}`);
                const data = await response.json();

                output.innerHTML = '<h3>API Response:</h3><pre>' +
                                   JSON.stringify(data, null, 2) +
                                   '</pre>';
            } catch (error) {
                output.innerHTML = '<p style="color: red;">Error: ' + error.message + '</p>';
            }
        }
    </script>
</body>
</html>
9.7 Destructor - Object Cleanup
De destructor wordt aangeroepen wanneer een object wordt vernietigd.

Wanneer Gebruik je een Destructor?
<?php
declare(strict_types=1);

class DatabaseConnection {
    private ?PDO $pdo = null;
    private string $connectionName;

    public function __construct(string $connectionName, string $host, string $db, string $user, string $pass) {
        $this->connectionName = $connectionName;

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "✅ [{$this->connectionName}] Database connection opened<br>";
        } catch (PDOException $e) {
            echo "❌ [{$this->connectionName}] Connection failed: " . $e->getMessage() . "<br>";
        }
    }

    public function query(string $sql): ?array {
        if ($this->pdo === null) {
            return null;
        }

        try {
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Query error: " . $e->getMessage() . "<br>";
            return null;
        }
    }

    // Destructor - cleanup
    public function __destruct() {
        if ($this->pdo !== null) {
            $this->pdo = null;
            echo "🔒 [{$this->connectionName}] Database connection closed<br>";
        }
    }
}

// Gebruik
$db = new DatabaseConnection("MainDB", "localhost", "test_db", "root", "");
$results = $db->query("SELECT * FROM users");

// Aan het einde van het script of bij unset($db) wordt de destructor aangeroepen
unset($db);  // 🔒 [MainDB] Database connection closed

echo "Script continues...<br>";
?>
Gebruik Cases voor Destructors
Database verbindingen sluiten
File handles sluiten
Temporary files opruimen
Logging van object lifecycle
Resources vrijgeven
<?php
declare(strict_types=1);

class FileLogger {
    private $fileHandle;
    private string $filename;

    public function __construct(string $filename) {
        $this->filename = $filename;
        $this->fileHandle = fopen($filename, 'a');

        if ($this->fileHandle === false) {
            throw new Exception("Cannot open file: $filename");
        }

        $this->log("Logger started");
    }

    public function log(string $message): void {
        if ($this->fileHandle !== false) {
            $timestamp = date('Y-m-d H:i:s');
            fwrite($this->fileHandle, "[$timestamp] $message\n");
        }
    }

    public function __destruct() {
        if ($this->fileHandle !== false) {
            $this->log("Logger stopped");
            fclose($this->fileHandle);
            echo "✅ Log file '{$this->filename}' closed<br>";
        }
    }
}

$logger = new FileLogger("app.log");
$logger->log("User logged in");
$logger->log("Data processed");

// Destructor wordt automatisch aangeroepen aan het einde
?>
9.8 Static Properties en Methods
Static properties en methods behoren tot de class zelf, niet tot individuele objects.

Static Properties
<?php
declare(strict_types=1);

class User {
    private static int $userCount = 0;  // Static property
    private string $name;

    public function __construct(string $name) {
        $this->name = $name;
        self::$userCount++;  // Increment static counter
    }

    public static function getUserCount(): int {
        return self::$userCount;
    }

    public function __destruct() {
        self::$userCount--;
    }
}

echo "Users: " . User::getUserCount() . "<br>";  // 0

$user1 = new User("Emma");
echo "Users: " . User::getUserCount() . "<br>";  // 1

$user2 = new User("Lucas");
$user3 = new User("Sophie");
echo "Users: " . User::getUserCount() . "<br>";  // 3

unset($user1);
echo "Users: " . User::getUserCount() . "<br>";  // 2
?>
Static Methods
<?php
declare(strict_types=1);

class MathHelper {
    // Static methods - geen object nodig
    public static function add(int $a, int $b): int {
        return $a + $b;
    }

    public static function multiply(int $a, int $b): int {
        return $a * $b;
    }

    public static function factorial(int $n): int {
        if ($n <= 1) return 1;
        return $n * self::factorial($n - 1);
    }
}

// Gebruik zonder object te maken
echo MathHelper::add(10, 20);        // 30
echo MathHelper::multiply(5, 6);     // 30
echo MathHelper::factorial(5);       // 120
?>
Praktisch Voorbeeld: Factory Pattern
<?php
declare(strict_types=1);

class Product {
    private string $name;
    private float $price;
    private string $category;

    private function __construct(string $name, float $price, string $category) {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }

    // Static factory methods
    public static function createElectronics(string $name, float $price): Product {
        return new Product($name, $price, "Electronics");
    }

    public static function createFurniture(string $name, float $price): Product {
        return new Product($name, $price, "Furniture");
    }

    public static function createFromArray(array $data): Product {
        return new Product($data['name'], $data['price'], $data['category']);
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getCategory(): string {
        return $this->category;
    }
}

// Gebruik factory methods
$laptop = Product::createElectronics("Laptop", 999.99);
$chair = Product::createFurniture("Office Chair", 299.99);
$phone = Product::createFromArray(['name' => 'iPhone', 'price' => 899.99, 'category' => 'Electronics']);

echo $laptop->getCategory();  // Electronics
echo $chair->getCategory();   // Furniture
?>
9.9 Best Practices voor OOP in PHP
1. Single Responsibility Principle
Elke class moet één duidelijke verantwoordelijkheid hebben.

<?php
// ❌ BAD - Class doet te veel
class User {
    public function save() { /* database logic */ }
    public function sendEmail() { /* email logic */ }
    public function validatePassword() { /* validation */ }
    public function generateReport() { /* reporting */ }
}

// ✅ GOOD - Elke class heeft één taak
class User {
    private string $email;
    private string $passwordHash;
}

class UserRepository {
    public function save(User $user): void { /* database */ }
    public function findById(int $id): ?User { /* database */ }
}

class EmailService {
    public function sendWelcomeEmail(User $user): void { /* email */ }
}

class PasswordValidator {
    public function isValid(string $password): bool { /* validation */ }
}
?>
2. Gebruik Type Declarations
<?php
// ✅ ALWAYS use type declarations
declare(strict_types=1);

class Product {
    public function __construct(
        private string $name,      // PHP 8.0+ property promotion
        private float $price,
        private int $stock
    ) {}

    public function getName(): string {
        return $this->name;
    }

    public function getPrice(): float {
        return $this->price;
    }
}
?>
3. Encapsulation - Private Properties
<?php
// ✅ GOOD - Private properties, public methods
class BankAccount {
    private float $balance;

    public function __construct(float $initialBalance) {
        $this->balance = $initialBalance;
    }

    public function getBalance(): float {
        return $this->balance;
    }

    public function deposit(float $amount): void {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }
}
?>
4. Constructor Property Promotion (PHP 8.0+)
<?php
// Old way (verbose)
class Product {
    private string $name;
    private float $price;

    public function __construct(string $name, float $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

// ✅ Modern way (PHP 8.0+) - Constructor promotion
class Product {
    public function __construct(
        private string $name,
        private float $price
    ) {}

    public function getName(): string {
        return $this->name;
    }
}
?>
5. Readonly Properties (PHP 8.1+)
<?php
// ✅ Readonly properties (PHP 8.1+)
class Product {
    public function __construct(
        public readonly string $name,
        public readonly float $price
    ) {}
}

$product = new Product("Laptop", 999.99);
echo $product->name;  // OK - reading
// $product->name = "Phone";  // ❌ ERROR - cannot modify readonly
?>
9.10 Lab-opdrachten
📝 Lab-opdracht 9.1: Student Management System
Opdracht: Bouw een student management systeem met OOP.

Eisen:

Student class met properties: id, name, email, enrollmentDate
Course class met properties: id, name, credits
Enrollment class die student en course verbindt
Constructor met type declarations
Getters voor alle properties
Method getStudentInfo() die formatted string retourneert
JSON export functionaliteit
Bonus:

Grade tracking per course
GPA calculation
Student search functionaliteit
📝 Lab-opdracht 9.2: E-commerce Product Catalog
Opdracht: Maak een product catalogus systeem.

Eisen:

Base Product class
ElectronicProduct extends Product (warranty, brand)
ClothingProduct extends Product (size, color, material)
FoodProduct extends Product (expirationDate, ingredients)
Shopping cart functionality
Price calculations (VAT, discounts)
JSON API voor products
Bonus:

Inventory management
Low stock warnings
Category filtering
9.11 Uitgebreide Eindopdrachten
⭐ Opdracht 1 (Basis): Library Book System
Doel: Maak een bibliotheek systeem met OOP.

Eisen:

Book class (title, author, ISBN, publicationYear)
Member class (name, memberID, email)
Loan class (book, member, loanDate, returnDate)
Methods: borrowBook(), returnBook(), isOverdue()
List all books
List all active loans
JSON export
Files:

book_system.php - Main logic
Classes in separate files (optioneel)
⭐⭐ Opdracht 2 (Gemiddeld): Vehicle Rental System
Doel: Maak een voertuig verhuur systeem.

Eisen:

Base Vehicle class
Car, Motorcycle, Truck child classes
Customer class
Rental class met rental period en price calculation
Daily/weekly rates
Availability checking
Rental history per customer
Invoice generation
Dashboard met statistieken
⭐⭐⭐ Opdracht 3 (Gevorderd): Employee Management System
Doel: Volledig employee management systeem.

Eisen:

Base Employee class
Developer, Manager, Designer child classes
Salary calculations (different formulas per type)
Department class
Project class
Employee assignment to projects
Time tracking
Payroll calculation
Performance reviews
JSON API for all operations
Search and filter functionality
Extra features:

Leave management
Overtime calculation
Team hierarchy
⭐⭐⭐⭐ Opdracht 4 (Expert): Banking System
Doel: Simuleer een banking systeem.

Eisen:

Account class (checking, savings)
Customer class met multiple accounts
Transaction class (deposit, withdrawal, transfer)
Transaction history
Interest calculation voor savings
Overdraft protection
Monthly statements
Transaction limits
Account freezing/unfreezing
Admin dashboard
JSON export/import
Transaction logs
Extra features:

Credit cards with limits
Loan system
Currency conversion
Fraud detection simulation
⭐⭐⭐⭐⭐ Opdracht 5 (Master): Hospital Management System
Doel: Volledig ziekenhuis management systeem.

Eisen:

Patient class met medical history
Doctor class met specialization
Appointment class met scheduling
Department class
MedicalRecord class
Prescription class
Appointment scheduling system
Doctor availability management
Patient medical history tracking
Prescription management
Department management
Emergency priority system
Billing system
Insurance processing simulation
JSON API voor alle operations
Admin, Doctor, Patient dashboards
Search en filter op alle entities
Extra features:

Lab test results
Bed/room management
Staff scheduling
Inventory voor medical supplies
Appointment reminders
Patient portal
9.12 Samenvatting
🎉 Gefeliciteerd! Je beheerst nu Object-Oriented Programming in PHP!

Wat heb je geleerd?
✅ OOP Fundamentals:

Classes en Objects - Blauwdrukken vs instances
Properties en Methods - Data en gedrag
Constructor - Automatic initialization
Destructor - Cleanup en resource management
$this keyword - Verwijzing naar current object
-> operator - Object member access
✅ Access Modifiers:

public - Overal toegankelijk
private - Alleen binnen class
protected - Class + child classes
Encapsulation - Data hiding
Getters en Setters - Controlled access
✅ Inheritance:

extends keyword - Class uitbreiden
parent:: - Parent methods aanroepen
Method overriding - Child vervangt parent
protected voor inheritance
Code reusability
✅ Type System:

declare(strict_types=1) - Type enforcement
Parameter type declarations
Return type declarations
Nullable types (?string)
Union types (int|float) - PHP 8.0+
Property promotion - PHP 8.0+
Readonly properties - PHP 8.1+
✅ Static Members:

Static properties - Class-level data
Static methods - Geen object nodig
self:: keyword
Factory pattern
Utility classes
✅ JSON Integration:

Objects naar JSON converteren
JSON naar objects converteren
toArray() method pattern
fromJSON() static factory
API development
✅ Best Practices:

Single Responsibility Principle
Private properties, public methods
Type declarations overal
Meaningful class en method names
English naming in production
Constructor voor initialization
Validation in setters
🎯 Belangrijkste Lessen
OOP organiseert code - Classes groeperen gerelateerde functionaliteit
Encapsulation beschermt data - Private properties, public methods
Inheritance voorkomt duplicatie - Shared code in parent class
Type safety voorkomt bugs - Strict types + declarations
Objects zijn herbruikbaar - Eén class, multiple instances
JSON verbindt systemen - Objects ↔ JSON voor data exchange
Veel Voorkomende Valkuilen
❌ Public properties zonder validatie:

class User {
    public $email;  // Iedereen kan dit veranderen!
}
✅ Private met validated setter:

class User {
    private string $email;

    public function setEmail(string $email): void {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email");
        }
        $this->email = $email;
    }
}
❌ Vergeten parent constructor aan te roepen:

class Child extends Parent {
    public function __construct($extra) {
        // ❌ Parent constructor wordt NIET aangeroepen!
        $this->extra = $extra;
    }
}
✅ Parent constructor aanroepen:

class Child extends Parent {
    public function __construct($parentData, $extra) {
        parent::__construct($parentData);  // ✅
        $this->extra = $extra;
    }
}
❌ Geen type declarations:

function calculate($a, $b) {  // Wat zijn de types?
    return $a + $b;
}
✅ Met type declarations:

function calculate(int $a, int $b): int {
    return $a + $b;
}
Volgende Stappen
Nu je OOP beheerst, kun je:

Advanced OOP: Interfaces, Abstract classes, Traits
Design Patterns: Singleton, Factory, Observer, etc.
Frameworks: Laravel, Symfony (100% OOP)
Database OOP: PDO met prepared statements
Namespaces: Code organisatie in grote projecten
Composer: Dependency management
Testing: PHPUnit voor unit tests
MVC Pattern: Model-View-Controller architecture
Continue Learning:

Bestudeer Laravel source code
Leer design patterns
Bouw eigen framework (leerzaam!)
Contributeer aan open source PHP projecten
Bronnen en Verdere Studie
📚 Officiële Documentatie
PHP OOP:

PHP Classes and Objects - Officiële PHP OOP docs
PHP Type Declarations - Type system
PHP 8.0 Features - Constructor promotion, union types
PHP 8.1 Features - Readonly properties
Best Practices:

PHP-FIG PSR-12 - Coding style
PHP The Right Way - OOP - Modern PHP practices
🎥 Video Tutorials (Engels)
YouTube Channels:

Traversy Media - PHP OOP - Beginner-friendly
Program With Gio - PHP OOP - Complete series
Dave Gray - PHP OOP - Modern PHP 8+
The Net Ninja - PHP OOP - Playlist
📖 Boeken
Nederlands:

“Programmeren in PHP” - inclusief OOP hoofdstukken
“Objectgeoriënteerd Programmeren” - Algemeen OOP concept
Engels:

“PHP Objects, Patterns, and Practice” - Matt Zandstra
“Modern PHP” - Josh Lockhart
“Object-Oriented PHP” - Packt Publishing
“Design Patterns in PHP” - Practical OOP patterns
🌐 Online Resources
Interactive Learning:

PHP Sandbox - Test PHP code online
3v4l.org - Test in multiple PHP versions
Laracasts - Video tutorials (deels gratis)
Code Examples:

PHP Design Patterns - Praktische voorbeelden
GitHub PHP OOP Examples - Open source voorbeelden
Communities:

r/PHP - Reddit community
PHP Discord - Live chat
Stack Overflow PHP - Q&A
🛠️ Tools
IDEs met OOP Support:

PhpStorm - Best-in-class (betaald, student license gratis)
VS Code + PHP Intelephense - Gratis alternatief
NetBeans - Gratis, goede PHP support
Quality Tools:

PHPStan - Static analysis
Psalm - Type checking
PHP_CodeSniffer - Coding standards
🎓 Certificering
Zend PHP Certification:

Zend Certified PHP Engineer
Bevat uitgebreide OOP vragen
Internationaal erkend
💡 Project Ideas
Oefen OOP met deze projecten:

Task Management System
User, Task, Project classes
Priority levels, deadlines
JSON storage
Online Shop
Product hierarchy (Electronics, Clothing, etc.)
Shopping cart, Orders
Payment simulation
Social Media Clone
User, Post, Comment classes
Friends/Following system
Like/Share functionality
School Management
Student, Teacher, Course classes
Grades, Attendance
Reports generation
Blog/CMS
Post, Category, Author, Comment
Publishing workflow
Media library
🚀 Je bent nu klaar voor professionele PHP development met OOP!

Veel succes met het bouwen van geweldige applicaties! 💪

© 2025 ROC-Midden Nederland – ICT-College – Amersfoort, Nederland

MBO Niveau 4 - Software Developer

PHP Tutorials – Werken met Classes in PHP