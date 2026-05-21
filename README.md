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
- Nieuws bekijken
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
- Gebruik minstens twee layouts -> resources/views/layouts (app.blade.php, admin.blade.php, guest.blade.php)
- Gebruik een component waar logisch -> resources/views/profile/partials (vb lijn 19)
- Gebruik de technieken die aan bod gekomen zijn in de cursus en de oefeningen 
   - Control structures -> vb resources/views/news/show.blade.php lijn 24, lijn 91,...
   - XSS protection -> vb resources/views/news/show.blade.php lijn 16, lijn 33,...
   - CSRF protection ->vb resources/views/news/show.blade.php lijn 64,...
   - Client-side validation -> vb resources/views/admin/users/create.blade.php lijn 38, lijn 51,..

Routes
- Alle routes gebruiken controller methods -> routes/web.php vb lijn 53, lijn 59,..
- Alle routes gebruiken de nodige middleware ->routes/web.php vb lijn 84, lijn 209,...
- Indien mogelijk: groepeer je routes -> routes/web.php vb lijn 209 tot lijn 222,...

Controller
- Gebruik controllers om je logica op te splitsen -> app/Http/Controllers (NewsController, FAQController, UserController, ProfileController, CommentController, ContactController)
- Denk terug aan resource controllers voor CRUD operaties -> app/Http/Controllers/FAQController vb lijn 59, lijn 88,...

Models
- Gebruik Eloquent models per entiteit -> app/Models (User, News, Comment, Faq,FaqCategory, Tag, ContactMessage)
- Les de nodige relaties
   - Minstens één one-to-many -> app/Models/News vb lijn 35 tot lijn 38,...
   - Optioneel een many-to-many -> app/Models/News vb lijn 61,...

Database
- Ik zal "php artisan migrate:fresh --seed" uitvoeren op elk project en mijn eigen .env-file gebruiken om met de database te connecten 
- Zorg dat je database werkt 
- Zorg dat je database alle nodige basisdata bevat -> database/seeders/FakeDataSeeder.php

Authentication
- Standaard functionaliteiten
   - Log in/out ->
   routes/auth.php
resources/views/auth/login.blade.php
app/Http/Controllers/Auth/AuthenticatedSessionController.php
   - 'Remember me' ->
   resources/views/auth/login.blade.php
   - Registreer ->
   routes/auth.php
resources/views/auth/register.blade.php
app/Http/Controllers/Auth/RegisteredUserController.php
   - Mogelijkheid om wachtwoord te resetten bij vergeten wachtwoord ->
   routes/auth.php
resources/views/auth/forgot-password.blade.php
resources/views/auth/reset-password.blade.php
- Voeg één default admin toe -> database/seeders/AdminUserSeeder.php
   - Username: admin
   - Email: admin@ehb.be
   - Password: Password!321
Layout
- Dit is geen design vak dus steek niet teveel tijd in het mooi maken van je project, maar zorg voor een duidelijke en professionele layout ->
resources/views/layouts/app.blade.php
resources/views/layouts/admin.blade.php
resources/views/layouts/guest.blade.php
resources/views/welcome.blade.php


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


## Gebruikte bronnen (inclusief AI chatlog)

- GitHub repositories (voor codevoorbeelden, documentatie en probleemoplossing)
- YouTube-tutorials (voor uitleg en praktische demonstraties)
- Canvas lesmateriaal (cursusmateriaal en opdrachten)
- ChatGPT werd gebruikt als hulpmiddel bij de verschillende stappen van het project
AI-chatlog : https://chatgpt.com/share/6a0e212d-400c-83eb-b3f6-690a6d3df436
- Afbeeldingen gebruikt in de applicatie werden gegenereerd met behulp van ChatGPT.

## Screenshots van de applicatie
### Niet ingelogd
Homepage
![](<screenshots/Screenshot 2026-05-21 150800.png>)
![](<screenshots/Screenshot 2026-05-21 150829.png>)
![](<screenshots/Screenshot 2026-05-21 150842.png>)
Nieuws overzicht
![](<screenshots/Screenshot 2026-05-21 150902.png>)
Nieuws detail
![](<screenshots/Screenshot 2026-05-21 150932.png>)
FAQ
![](<screenshots/Screenshot 2026-05-21 150945.png>)
Contact
![](<screenshots/Screenshot 2026-05-21 150959.png>)
Login
![](<screenshots/Screenshot 2026-05-21 151224.png>)
Register
![](<screenshots/Screenshot 2026-05-21 151258.png>)
Forgot password
![](<screenshots/Screenshot 2026-05-21 151241.png>)s
### Ingelogd
Profile page
![](<screenshots/ingelogd/Screenshot 2026-05-21 152945.png>)
Profile edit
![](<screenshots/ingelogd/Screenshot 2026-05-21 153019.png>)
![](<screenshots/ingelogd/Screenshot 2026-05-21 153033.png>)
![](<screenshots/ingelogd/Screenshot 2026-05-21 153043.png>)
Comment plaatsen op nieuws
![](<screenshots/ingelogd/Screenshot 2026-05-21 153115.png>)
Navbar wanneer ingelogd
![](<screenshots/ingelogd/Screenshot 2026-05-21 152931.png>)
### Admin panel
Dashboard
![](<screenshots/admin/Screenshot 2026-05-21 153509.png>)
Gebruikers beheren
![](<screenshots/admin/Screenshot 2026-05-21 153524.png>)
Nieuwe gebruiker maken
![](<screenshots/admin/Screenshot 2026-05-21 153534.png>)
Nieuwsbeheer
![](<screenshots/admin/Screenshot 2026-05-21 153807.png>)
Nieuws detail admin
![](<screenshots/admin/Screenshot 2026-05-21 154033.png>)
Nieuws aanmaken
![](<screenshots/admin/Screenshot 2026-05-21 154056.png>)
FAQ beheer/ edit
![](<screenshots/admin/Screenshot 2026-05-21 154117.png>)
![](<screenshots/admin/Screenshot 2026-05-21 154126.png>)
Berichten/contact admin
![](<screenshots/admin/Screenshot 2026-05-21 154141.png>)