# StudyCrew – Backend Web Examen Eindopdracht


## Projectbeschrijving

StudyCrew is een dynamisch studentenplatform gebouwd met Laravel 13. Het platform helpt studenten om nieuws, informatie en ondersteuning te vinden.
Gebruikers kunnen nieuws lezen, FAQ’s raadplegen, contact opnemen en een persoonlijk profiel beheren. Admins hebben extra rechten om content en gebruikers te beheren.
Het project werd ontwikkeld als eindopdracht voor het vak **Backend Web** en volgt de **MVC-architectuur van Laravel**.

---

## Functionaliteiten

### Authenticatie

- Registreren
- Inloggen
- Uitloggen
- Remember me
- Wachtwoord resetten bij vergeten wachtwoord
- Rollen systeem:
    - gewone gebruiker
    - admin

### Admin rechten

Admins kunnen:

- Gebruikers promoveren tot admin
- Adminrechten verwijderen
- Nieuwe gebruikers manueel aanmaken
- Nieuws beheren
- FAQ beheren

---

### Profielpagina

Elke gebruiker heeft een publieke profielpagina.Een gebruiker kan zijn eigen profiel aanpassen:

- Username
- Verjaardag
- Profielfoto
- Bio / Over mij tekst

Publieke profielpagina toegankelijk voor iedereen.

---

### Nieuws

Admins kunnen:

- Nieuws toevoegen
- Nieuws wijzigen
- Nieuws verwijderen

Elke bezoeker kan:

- Alle nieuwsartikelen bekijken
- Een detailpagina bekijken

Een nieuwsitem bevat:

- Titel
- Afbeelding
- Content
- Publicatiedatum

Extra feature:

- Reactiesysteem op nieuwsartikelen

---

### FAQ

FAQ’s zijn gegroepeerd per categorie.

Admins kunnen:

- FAQ categorieën toevoegen
- FAQ’s toevoegen
- FAQ’s wijzigen
- FAQ’s verwijderen

Bezoekers kunnen alle FAQ’s bekijken.

---

### Contact

Iedere bezoeker kan een contactformulier invullen.

Bij het versturen van een contactformulier ontvangt de admin een email.




## Implementatie van elke technisch vereiste (waar in de code?/lijnnummer)

Views
- Gebruik minstens twee layouts
- Gebruik een component waar logisch
- Gebruik de technieken die aan bod gekomen zijn in de cursus en de oefeningen
   - Control structures
   - XSS protection
   - CSRF protection
   - Client-side validation

Routes
- Alle routes gebruiken controller methods
- Alle routes gebruiken de nodige middleware
- Indien mogelijk: groepeer je routes

Controller
- Gebruik controllers om je logica op te splitsen
- Denk terug aan resource controllers voor CRUD operaties

Models
- Gebruik Eloquent models per entiteit
- Les de nodige relaties
   - Minstens één one-to-many
   - Optioneel een many-to-many

Database
- Ik zal "php artisan migrate:fresh --seed" uitvoeren op elk project en mijn eigen .env-file gebruiken om met de database te connecten
- Zorg dat je database werkt
- Zorg dat je database alle nodige basisdata bevat

Authentication
- Standaard functionaliteiten
   - Log in/out
   - 'Remember me'
   - Registreer
   - Mogelijkheid om wachtwoord te resetten bij vergeten wachtwoord
- Voeg één default admin toe
   - Username: admin
   - Email: admin@ehb.be
   - Password: Password!321
Layout
- Dit is geen design vak dus steek niet teveel tijd in het mooi maken van je project, maar zorg voor een duidelijke en professionele layout


## Installatiehandleiding

### 1. Repository clonen

Clone de GitHub repository:

```bash
git clone [repository-url]
```

### 2. Open het project

Ga naar de projectmap:

```bash
cd studycrew
```

### 3. Installeer dependencies

Installeer alle PHP en JavaScript packages:

```bash
composer install
npm install
```

### 4. Maak een `.env` bestand

Maak een kopie van het voorbeeldbestand:

```bash
cp .env.example .env
```

### 5. Genereer application key

Laravel heeft een application key nodig:

```bash
php artisan key:generate
```

### 6. Configureer de database

Pas de database instellingen aan in het `.env` bestand.

Voorbeeld:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=studycrew
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Migreer en seed de database

Voer migrations en seeders uit:

```bash
php artisan migrate:fresh --seed
```

Dit maakt automatisch aan:

- gebruikers
- nieuwsartikelen
- FAQ categorieën
- FAQ’s
- comments
- tags
- default admin account

### 8. Maak storage link

Voor uploads en profielfoto’s:

```bash
php artisan storage:link
```

### 9. Start Vite

```bash
npm run dev
```

### 10. Start Laravel server

```bash
php artisan serve
```

### 11. Open de website

Open:

```text
http://127.0.0.1:8000
```

### Default Admin Account

Na `migrate:fresh --seed` wordt automatisch een admin account aangemaakt:

**Username:** admin  
**Email:** admin@ehb.be  
**Password:** Password!321

## Screenshots van de applicatie
## Gebruikte bronnen (inclusief AI chatlog)
