# Big Tasty moet terug - Petitiewebsite
*De code achter de petitiewebsite bigtastymoetterug.nl*

## Doel
In 2011 startte ik dit project, omdat de enige hamburger die ik bij McDonald's lekker vind (de Big Tasty) van de menukaart was geschrapt. Het doel van het project: zoveel mogelijk hongerige fans verzamelen om de Big Tasty terug op het menu te krijgen!

In maart 2013 hadden meer dan 4000 mensen de petitie getekend. Vanaf dat moment belde McDonald's dat de burger mede dankzij deze website terug naar Nederland kwam.

Na het plaatsen van dit verhaal op 9gag (http://9gag.com/gag/3652901) hadden nog eens 500 mensen de petitie getekend.

## Code

`config.php` en `connect.php` bevatten de inloggegevens voor de database;

`ajax.js` en `boo.php` zorgen ervoor dat de teller met het aantal bevestigde e-mailadressen elke 5 seconden herladen wordt;

`bevestig.php` kijkt of het e-mailadres en random-ID in de URL (die de gebruiker in een bevestigings e-mail ontvangt) overeenkomen in de database. Als dit het geval is, krijgt het e-mailadres in de database de status confirmed;

`sign.php` plaatst e-mailadressen in de database;

`send.php` werd gebruikt om massaal e-mails te verzenden toen de Big Tasty terug was;

`remove.php` liet mensen zich uitschrijven voor e-mails;

`ipn.php` bevat de koppeling met PayPal;

`js/fd-slider.js` bevat een HTML5 Input Range polyfill voor het invoeren van het PayPal-donatie bedrag.
`css/fd-slider.css` bevat de CSS voor deze polyfill;

`images/` bevat afbeeldingen voor de site;

`email/` bevat afbeeldingen voor de validatie e-mail;

## Preview
De website is inmiddels offline, maar hier kun je zien hoe het er uit zag:

**De website toen die gelanceerd werd**
![De website toen die gelanceerd werd](https://raw.githubusercontent.com/laurensbruijn/bigtastymoetterug/master/previews/bigtastymoetterug-1.png "De website toen die gelanceerd werd")

**De tweede versie van de website**
![De tweede versie van de website](https://raw.githubusercontent.com/laurensbruijn/bigtastymoetterug/master/previews/bigtastymoetterug-2.png "De tweede versie van de website")

**De website toen de petitie gesloten was**
![De website toen de petitie gesloten was](https://raw.githubusercontent.com/laurensbruijn/bigtastymoetterug/master/previews/bigtastymoetterug-3.png "De website toen de petitie gesloten was")