# wildSeries  *by Khatastrov*   

Ensemble de quêtes **wild-series** (beta-series like) sur Odyssey   

Le projet est découpé en branches :   
-  Une branche par quête ->  [n° de la quête]_[nom de la quête]   
ex: *05_routing*
-  seules les quêtes validées sont mergées sur `Master`

#### 1) Comment récupérer le projet sur votre ordinateur ?

Avant toute chose, assurez-vous d'avoir au minimum `PHP 7.1`, `Composer` et `yarn` installés sur votre machine.   
Pour vous en assurer, dans le terminal, tapez : `$ php -v`, `$ composer -v`, `$ yarn -v`   
Si le terminal ne vous renvoi pas la version de ces programmes, ou un message d'erreur, alors installez-les avant de poursuivre.   

Maintenant, placez-vous dans le repertoire qui accueillera le projet, et tapez:   
`$ git clone https://github.com/Khatastrov/wildSeries.git`   
`$ cd wildSeries`   

#### 2) Comment installer le projet
Vous êtes arrivés sur la branche `Master`, placez-vous sur la branche correspondante à la quête que vous souhaitez
 corriger :   
 `$ git checkout [nomDeLaBranche]`   
 
 Vous pouvez maintenant installer les dépendances :   
 `$ composer install`  
 `$ yarn install`   
 et si vous êtes au-delà de la quête *04_webpack* :   
 `$ yarn encore dev` ce qui installera les assets.   
 
 #### 3) ajout de la Base de données
 Pour la connexion à la base de données, copiez le fichier .env qui se trouve à la racine du projet.
 Par convention, renommez-le en `env.local`.   
 Vous modifierez la ligne `DATABASE_URL` avec vos propres informations.   
 Si vous avez déjà créé une BDD pour cette série de quêtes, inutile d'en créer une nouvelle. Il vou suffit de renseigner
 le fichier `.env.local` avec les informations de votre base (J'ai utilisé les noms de tables et de champs indiqués dans les quêtes.)
    
 Si en revanche vous n'en avez pas encore, suivez les étapes ci-dessous.   
 
 Pour créer la base de données, dans le terminal :   
 `$ php bin/console doctrine:database:create`   
 et ajouter les tables (les classes de migration sont déjà incluses) :     
 `$ php bin/console doctrine:migrations:migrate`
 
___
 
 Vous rencontrez un soucis, vous avez une question, n'hésitez pas à me contacter.   
 **Merci !**