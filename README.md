# WebSymfony
Projet web symfony

##Installation du projet

php bin/console doctrine:database:create  
php bin/console doctrine:migrations:migrate  
php bin/console doctrine:fixtures:load  

##Ouvrir le serveur

php -S 127.0.0.1:8000 -t public