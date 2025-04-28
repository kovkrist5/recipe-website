Recept 2025

Programunk egy adatbázis körül épített weboldal, ahol lehetősége van felhasználóknak recepteket megnézni, feltölteni, szerkeszteni, és törölni.
Visual studio code-ban, mysql, és laravel keretrendszerben lett megírva, valamint xammp. 

#Telepítés:#
Futtatáshoz szükséges:
 - composer
 - xampp
ezután xampon el kell indítani:
 - apache
 - mysql
github pull után kell a terminálban néhány dolgot lerendezni.
 - composer: composer install
 - .env: cp .env.example .env
 - key: php artisan key:generate
 - adatbázis migrálása: php artisan migrate --seed (ez 2 előre elkészített receptel jön)


Felhasználói segédlet:

