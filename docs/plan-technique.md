#  Plan Technique de Travail – Smart Learn Stream

##  Objectif du projet

Développer une mini-plateforme web de diffusion de vidéos gratuites dans un contexte éducatif.

---

## 📋 Cahier des charges

- Conception d'une interface web fonctionnelle (front + back)
- Affichage des vidéos via YouTube Embed ou vidéos locales
- Page d’accueil listant les vidéos (titre, catégorie, image)
- Fiche vidéo avec lecteur intégré (modal ou page)
- Tri/filtrage par thème ou catégorie
- (Optionnel) Authentification, gestion utilisateurs/admins
- (Optionnel) Paiement mobile pour abonnement premium

---

## Stack choisie

| Élément         | Choix                            |
|----------------|----------------------------------|
| Frontend        | Vue.js + Inertia.js              |
| Backend         | Laravel PHP 8.2.12               |
| UI              | Tailwind CSS + UI TailDashboard  |
| Base de données | MySQL                            |
| Outils          | Git, Composer, Node.js, Vite     |
| Hébergement     | Render.com                       |

---

## Structure de base (Entités)

- **Utilisateur** : `id, name, email, password, role_id, premium, created_at`
- **Rôle** : `id, nom`
- **Vidéo** : `id, titre, description, url, youtube_id, categorie_id, premium, created_at`
- **Catégorie** : `id, nom`
- **Favoris** : `id, utilisateur_id, video_id, created_at`
- **Paiement** : `id, utilisateur_id, montant, moyen, statut, date_paiement`
- **Commentaire** : `id, utilisateur_id, video_id, contenu, created_at`

---

##  Relations

- Un **Utilisateur** a un **Rôle**
- Un **Utilisateur** peut avoir plusieurs **Favoris**
- Un **Utilisateur** peut avoir plusieurs **Commentaires**
- Une **Vidéo** appartient à une **Catégorie**
- Une **Vidéo** peut être commentée
- Un **Utilisateur** peut effectuer des **Paiements**

---

## Phases de travail

### Phase 1 – Setup
- Initialisation du repo Git, Laravel, Vite, Tailwind
- Configuration de l’authentification Laravel Breeze vue + Inertia

### Phase 2 – UI/UX
- Accueil : liste des vidéos
- Fiche vidéo : lecteur modal/page
- Filtres : par thème / catégorie
- Responsive design mobile

### Phase 3 – Admin & Authentification
- Dashboard utilisateur : favoris, vidéos premium
- Dashboard admin : gestion des vidéos/catégories

### Phase 4 – Extension 
- Intégration d’un système d’abonnement
- Paiement mobile via API locale (Orange/Moov test)

---

## Déploiement

Effectué via Render.com :
- Build du backend via Composer
- Build du frontend avec `npm run build`


---

