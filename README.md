# Educatieve Webapplicatie voor Webbeveiliging

## Bewerkt door Roan Beens

Deze repository bevat de broncode van een educatieve webapplicatie die is ontworpen om studenten kennis te laten maken met webbeveiliging en veilige programmeertechnieken.

De applicatie simuleert een bankwebsite van Omanido en bevat verschillende opzettelijk ingebouwde beveiligingskwetsbaarheden. Studenten onderzoeken deze kwetsbaarheden, analyseren de risico's en passen verbeteringen toe om de applicatie veiliger te maken.

Onderwerpen die binnen dit project aan bod komen zijn:

* SQL-injectie
* Cross-Site Scripting (XSS)
* Datavalidatie
* Cryptografie
* Gebroken toegangscontrole
* Authenticatie en autorisatie
* Secure Coding Practices

Het doel van deze applicatie is om praktijkervaring op te doen met het herkennen, testen en oplossen van beveiligingsproblemen binnen webapplicaties.

---

## Installatie met Docker

### Vereisten

Zorg ervoor dat Docker Desktop is geïnstalleerd op je systeem.

### Repository downloaden

Clone of download de repository:

```bash
git clone <repository-url>
```

Ga vervolgens naar de projectmap:

```bash
cd secureprogramminglessons
```

### Docker Compose starten

Start de applicatie met:

```bash
docker compose up
```

of:

```bash
docker-compose up
```

Docker zal automatisch de benodigde containers bouwen en starten.

---

## Toegang tot de applicatie

Open de website via:

```text
http://localhost:8000
```

Voor phpMyAdmin:

```text
http://localhost:8080
```

---

## Leerdoelen

Tijdens dit project leren studenten:

* Veelvoorkomende kwetsbaarheden herkennen
* Beveiligingsproblemen analyseren
* Veilige code schrijven
* Werken volgens OWASP-richtlijnen
* Samenwerken met GitHub en versiebeheer
* Beveiligingsoplossingen presenteren en onderbouwen

---

## Auteur

Roan Beens

Secure Programming Project – Software Development
