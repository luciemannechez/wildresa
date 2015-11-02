wildresa
========


Une application permettant de réserver la machine à laver et le sèche linge de la Wild Code School


##Installation


Cloner le projet puis positionnez-vous dans le dossier du projet.


Dans le dossier app, dupliquez le fichier parameters.yml.dist dans un fichier parameters.yml et changer la configuration de la base de données.


Exécutez ces commandes :

    composer install
    
##Création de la base de données

    php app/console doctrine:database:create
    php app/console doctrine:schema:update --force

##Configuration


Pour créer un administrateur : php app/console fos:user:create --super-admin

Pour accéder à l'administration "/admin"

##Contribuer

Les bonnes pratiques à respecter sont celles définies par sensiolabs dans le document suivant [http://symfony.com/doc/current/best_practices/index.html][1]
Les config de doctrine, des services et des validations sont en YAML.

[1]:  http://symfony.com/doc/current/best_practices/index.html











