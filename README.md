# Bibliothèque de Prompts

Une application Symfony 7 pour gérer et organiser vos prompts d'IA (ChatGPT, Midjourney, Stable Diffusion, etc.).

## 🚀 Fonctionnalités

- ✨ Création, modification et suppression de prompts
- 📂 Organisation par catégories (ChatGPT, Midjourney, Stable Diffusion, etc.)
- 🔍 Recherche de prompts
- 📱 Interface responsive avec Bootstrap
- 📅 Suivi des dates de création et modification

## 🛠️ Prérequis

- PHP 8.2 ou supérieur
- Composer
- MySQL 8.0 ou supérieur
- Symfony CLI

## 📥 Installation

1. **Cloner le projet**
```bash
git clone [url-du-projet]
cd prompt-library
```

2. **Installer les dépendances**
```bash
composer install
```

3. **Configurer l'environnement**
- Copiez le fichier `.env` en `.env.local`
```bash
cp .env .env.local
```
- Modifiez la variable `DATABASE_URL` dans `.env.local` avec vos informations de base de données :
```
DATABASE_URL="mysql://[user]:[password]@127.0.0.1:3306/prompt_library?serverVersion=8.0.32&charset=utf8mb4"
```

4. **Créer la base de données**
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

## 🚀 Lancement

1. **Démarrer le serveur Symfony**
```bash
symfony server:start
```

2. **Accéder à l'application**
- Ouvrez votre navigateur
- Accédez à `http://localhost:8000/prompts`

## 📁 Structure du Projet

```
prompt-library/
├── src/
│   ├── Controller/
│   │   └── PromptController.php
│   ├── Entity/
│   │   └── Prompt.php
│   ├── Form/
│   │   └── PromptType.php
│   └── Repository/
│       └── PromptRepository.php
├── templates/
│   ├── base.html.twig
│   └── prompt/
│       ├── index.html.twig
│       ├── new.html.twig
│       ├── edit.html.twig
│       └── show.html.twig
└── .env
```

## 🔧 Utilisation

### Créer un nouveau prompt
1. Cliquez sur "Nouveau Prompt" dans la barre de navigation
2. Remplissez le formulaire avec :
   - Titre du prompt
   - Contenu
   - Catégorie
3. Cliquez sur "Créer"

### Modifier un prompt
1. Dans la liste des prompts, cliquez sur "Modifier"
2. Mettez à jour les informations
3. Cliquez sur "Enregistrer"

### Supprimer un prompt
1. Ouvrez le prompt à supprimer
2. Cliquez sur le bouton "Supprimer"
3. Confirmez la suppression

## 🔍 Fonctionnalités de Recherche

Le repository `PromptRepository` propose deux méthodes de recherche :
- `findByCategory()` : Filtrer les prompts par catégorie
- `search()` : Rechercher dans les titres et contenus des prompts

## 🤝 Contribution

1. Fork le projet
2. Créez votre branche (`git checkout -b feature/AmazingFeature`)
3. Committez vos changements (`git commit -m 'Add some AmazingFeature'`)
4. Push vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrez une Pull Request

## 📝 License

 `LICENSE` free: https://github.com/DanihStephane.

## 🆘 Support

Pour toute question ou problème :
1. Consultez la documentation Symfony : https://symfony.com/doc
2. Ouvrez une issue sur le repository
3. Contactez l'équipe de maintenance
