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
 - Ez az útmutató lépésről lépésre bemutatja, hogyan telepítheted és használhatod a Laravel alapú receptkezelő webalkalmazást.

Hardver és szoftver követelmények:

Minimális rendszerkövetelmények:

    Operációs rendszer: Windows 10 vagy 11 (64 bites)
    Processzor: Minimum 1.6 GHz
    Memória: Minimum 4 GB RAM
    Ajánlott eszköz: Windows alapú PC vagy laptop


Telepítés és elindítás:

1.Visual Studio Code telepítése:
   - Töltsd le a Visual Studio Code-ot(https://code.visualstudio.com/) és telepítsd.

2.GitHub repository klónozása:
   -A VS Code-ban nyisd meg a Source Control panelt.
   - Illeszd be a GitHub repository linket és klónozd a projektet.

3.Fejlesztői környezet beállítása:
   - Telepítsd a XAMPP(https://www.apachefriends.org/index.html) csomagot.
   - Indítsd el az Apache és MySQL szolgáltatásokat.
   - Hozz létre egy adatbázist a phpMyAdmin felületen.

4.Laravel parancsok futtatása:
 - composer install
 - cp .env.example .env
 - php artisan key:generate
 - php artisan migrate
 - php artisan serve


Alkalmazás használata:
 - Főoldal
 - Megjeleníti az összes feltöltött receptet.
 - A fejlécben elérhető: Otthon, Recept hozzáadása, keresőmező.

Recept hozzáadása:

A "Recept hozzáadása" menüpont alatt lehet új receptet feltölteni:
 - Hozzávalók
 - Elkészítési mód
 - Főzési és előkészítési idő
 - Kategória kiválasztása
 - Allergének megjelölése
 - Kép feltöltése (ha nincs, egy alapértelmezett kép jelenik meg)

Recept részletező oldal:
 - A feltöltött recept átirányít a saját oldalára.
 - Itt megtekinthető a teljes tartalom.
 - Alul: Szerkesztés és Törlés gombok.

Recept szerkesztése:
 - A szerkesztő oldalon az adatok előre kitöltve jelennek meg.
 - Módosítás után a "Mentés" gombra kattintva frissül a recept.

Böngészés és keresés:
 - Keresőmező: kulcsszavas keresés Enter lenyomásával vagy a Keresés gombbal.

Szűrési lehetőségek:
 - Betűrend (A-Z, Z-A)
 - Kategória szerinti szűrés (pl. Levesek, Desszertek stb.)

Lehetséges hibák:
 - Kategória nincs kiválasztva: figyelmeztető üzenetet kapsz a mentés során.
 - Jelenleg nincs regisztráció vagy admin funkció — mindenki szabadon használhatja az oldalt.

Egyéb tudnivalók:
 - Nincs karakterlimit – hosszabb szövegek is elfogadottak.
 - Karakterérzékenység nincs – kis- és nagybetűk, szimbólumok egyaránt megengedettek.
 - Az alkalmazás jelenleg publikus, bejelentkezés nem szükséges.

