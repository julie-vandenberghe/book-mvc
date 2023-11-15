# MVC en PHP - Gestion de livres

## But du projet
Voici un mini framework en MVC (avec la POO PHP). 

## Initialisation du projet
On a utilisé Composer pour installer des librairies. Si c'est la première fois que vous utilisez ce framework, voici la commande pour l'installer :

```
composer install
```

Si Composer est déjà installé, voici la commande pour initialiser le projet et téléchanger le dossier "vendor" :
```
composer init
```

Nous avons utilisé les librairies Var dumper et Whoops. Voici les commandes pour les télécharger :
```
composer require symfony/var-dumper
```

```
composer require symfony/var-dumper
```

## Les contrôleurs

Les contrôleurs sont rangés dans `src/Controller`. Un contrôleur sert à ranger son code PHP (uniquement le PHP). Une page = Une méthode dans un contrôleur.

Le contrôleur va souvent renvoyer une vue (uniquement le HTML).

Pour aller sur le site, on va bien sur le fichier `public/index.php`.

## Lancer un serveur de dev

On a une commande qui permet de lancer un serveur :

```
php -S 127.0.0.1:8000 -t public
```
Pour info : on ne peut pas le faire sur le port 80 car utilisé par Wamp/Mamp.
On pourra maintenant aller sur `http://localhost:8000`.

## Fonctionnalités implémentées

- Create : OK ✅
- Delete : OK ✅
- Update : in progress 🚧
- Search : in progress 🚧
- Filter : not done ❌
