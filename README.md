wildresa
========


Une application permettant de réserver la machine à laver et le sèche linge de la Wild Code School


##Installation


Cloner le projet puis positionnez-vous dans le dossier du projet.


Dans le dossier app, dupliquez le fichier parameters.yml.dist dans un fichier parameters.yml et changer la configuration de la base de données.


Exécutez ces commandes :

1. composer install

2. php app/console doctrine:schema:update


##Configuration


Pour créer un administrateur : php app/console fos:user:create --super-admin

Pour accéder à l'administration "/admin"




