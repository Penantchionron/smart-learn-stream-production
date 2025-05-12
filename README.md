Smart Learn Stream – Mini plateforme de streaming vidéos

##  Description du projet

Smart Learn Stream est une mini-plateforme de streaming éducatif développée pour simuler un parcours utilisateur complet (Client Experience – CX) dans le cadre d'un projet fictif. Elle permet de diffuser des vidéos éducatives gratuites via une interface moderne, responsive et interactive.

Le projet intègre un front-end dynamique avec Vue.js (Inertia), un back-end robuste via Laravel, une base stylisée grâce à Tailwind CSS et un template UI personnalisé TailDashboard. Le parcours inclut la découverte des vidéos, une fiche descriptive, ainsi qu’un système de filtrage par catégories.

##  Objectifs fonctionnels

* ✅ Interface web responsive et ergonomique
* ✅ Affichage des vidéos via YouTube Embed ou vidéos locales
* ✅ Page d’accueil listant les vidéos (titre, image, catégorie)
* ✅ Fiche vidéo avec description et lecteur intégré (modal ou page)
* ✅ Filtrage par thème ou catégorie
* ✅ (Facultatif) Système d’abonnement utilisateur
* ✅ (Facultatif) Paiement mobile

##  Stack technique utilisée

| Élément         | Technologie               | Justification                                                         |
| --------------- | ------------------------- | --------------------------------------------------------------------- |
| Frontend        | Vue.js (Vite, Inertia.js) | SPA performant, rendu rapide, couplé à Laravel via Inertia            |
| Backend         | Laravel (PHP 8.2.12 +)    | Framework robuste, sécurité intégrée,API RESTFull,Gestion d'authentification support Inertia.js,vite |
| UI/Design       | Tailwind CSS + TailTubeUI | Design moderne, responsive et personnalisable                               |
| Base de données | MySQL                     | Simple à mettre en œuvre , simple pour faire des tests
| Hébergement     | Render.com                | Déploiement rapide, CI/CD intégré                                       | 

##  Fonctionnalités développées

* ✅ Interface d’accueil listant toutes les vidéos
* ✅ Chargement dynamique des vidéos (YouTube embed)
* ✅ Système de filtrage par catégorie/thème
* ✅ Fiche vidéo avec lecteur + description en modal
* ✅ Interface responsive (mobile/tablette/desktop)
* ✅ Système d’inscription et de connexion (Dashboard utilisateur connecté)
* ✅ Dashboard Admin (Ajout/Modification/Suppression de vidéos)
* ✅ Système d'abonnement (prévu en extension)
* ✅ Paiement mobile (prévu en extension)

##  Instructions d'installation

### Prérequis

* Node.js (v20.x ou +)
* Git (v2.x ou +)
* Composer (v2.8.8 ou +)
* PHP (>= 8.2.12)
* MySQL (ou MariaDB)

### Étapes d'installation locale

1. Cloner le projet

```bash
git clone https://github.com/Penantchionron/smart-learn-stream.git
```

2. Installation

```bash
cd smart-learn-stream
composer install
npm install 
cp .env.example .env
php artisan key:generate
code .
```
![Installation](https://github.com/user-attachments/assets/fac2abac-5395-44dc-9c85-60d9f4023a2c)

3. Créer la base de données et configurer `.env`

```
DB_DATABASE=smartlearn
DB_USERNAME=your_user // root si c'est MySQL
DB_PASSWORD=your_password // pas de mot de pas si c'est MySQL
```
![Configuration](https://github.com/user-attachments/assets/92df464e-637a-4c55-b59b-8116ed1b8215)

4. Démmarer le serveur et Exécuter les migrations et les seeders

```bash
php artisan migrate --seed
```
![demarrer le serveur](https://github.com/user-attachments/assets/f3f9918f-10c6-45fb-abf0-e20a6a7b1e3f)

### Lancer Vite (compiler le frontend) et ### Lancer le serveur de développement de l'application 

```bash
npm run dev
npm run build 
php artisan serve
```
![image](https://github.com/user-attachments/assets/0b713960-2c97-4ea0-9689-455aa59994e4)

5. tapper dans le navigateur : http://127.0.0.1:8000

#### 🧑‍💼 Site Démo
![Page d'accueil](https://github.com/user-attachments/assets/eed52604-9b8a-4c8d-b0c1-17e5ce074a34)
![Dashoard](https://github.com/user-attachments/assets/f7a172c6-6c48-44a6-9552-c547e1397884)
![mobile](https://github.com/user-attachments/assets/8f911b81-8e94-4219-8d57-e88df2e07c73)
![lecture](https://github.com/user-attachments/assets/7464d2d6-7a9c-429e-8109-440d391e34db)
![ThèmeN](https://github.com/user-attachments/assets/28a9500c-71f7-4044-8695-f9d2f2630b4a)
Lien pour tester ici 👉 bientot

##  Documentation technique 

👉 [https://github.com/Penantchionron/smart-learn-stream/main/docs/plan-technique.md ](https://github.com/Penantchionron/smart-learn-stream/blob/main/docs/plan-technique.md)
