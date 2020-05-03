# wildSeries  *by Khatastrov*   

Ensemble de quêtes **wild-series** (beta-series like) sur Odyssey   

Le projet est découpé en branches :   
-  Une branche par quête ->  [n° de la quête]_[nom de la quête]   
ex: *05_routing*
-  seules les quêtes validées sont mergées sur `Master`

#### 1) Comment installer le projet sur votre ordinateur ?

Avant toute chose, assurez-vous d'avoir au minimum `PHP 7.1`, `Composer` et `yarn` installés sur votre machine.   
Pour vous en assurer, dans le terminal, tapez : `$ php -v`, `$ composer -v`, `$ yarn -v`   

Placez-vous dans le repertoire qui accueillera le projet, et tapez:   
`$ git clone https://github.com/Khatastrov/wildSeries.git`   
`$ cd wildSeries`   

Vous êtes alors sur la branche `Master`, placez-vous sur la branche correspondante à la quête que vous souhaitez
 corriger :   
 `$ git checkout [nomDeLaBranche]`   
 
 Vous pouvez maintenant installer les dépendances :   
 `$ composer install`  
 `$ yarn install`   
 et si vous êtes au-delà de la quête *04_webpack* :   
 `$ yarn encore dev` ce qui installera les assets.   
 
 Pour la connexion à la base de données, copiez le fichier .env qui se trouve à la racine du projet.
 Par convention, renommez-le en `env.local`.   
 Vous modifierez la ligne `DATABASE_URL` avec vos propres informations.
 
 Pour créer la base de données, dans le terminal :   
 `$ php bin/console doctrine:database:create`   
 puis la peupler (les classes de migration sont déjà incluses) :     
 `$ php bin/console doctrine:migrations:migrate`
 
___
 
 Vous rencontrez un soucis, vous avez une question, n'hésitez pas à me contacter.   
 **Merci !**