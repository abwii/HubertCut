# Uber Cut

[![Symfony](https://img.shields.io/badge/Symfony-5.x-blue)](https://symfony.com/)
[![PHP](https://img.shields.io/badge/PHP-7.x-blue)](https://www.php.net/)

Uber Cut (ou Hubert Cut) est une application web permettant de mettre en relation les clients et les coiffeurs dans une zone géographique.<br>
Son fonctionnement est similaire à celui de Uber Eats.

## Prérequis de développement

- PHP 7.x
- Composer
- Symfony 5.x

## Installation

1. Clonez ce dépôt : `git clone https://github.com/abwii/HubertCut`
2. Accédez au répertoire du projet : `cd votre-projet`
3. Installez les dépendances : `composer install`
4. Configurez la base de données dans le fichier `.env`
5. Créez la base de données : `php bin/console doctrine:database:create`
6. Effectuez les migrations : `php bin/console doctrine:migrations:migrate`
7. Lancez le serveur de développement : `symfony serve`

## Conclusion

Il s'agit d'un projet de fin d'études pour mon diplôme de Bachelor 3 en Développement Web & Application à l'école EFREI Paris.
