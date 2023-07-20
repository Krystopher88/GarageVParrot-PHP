# Evaluation Studi ECF Hiver 23-24

## Evaluation dans le cadre dans la formation Graduate Développeur Front-End de chez Studi

Ce projet à était dévelloper dans l'objectif de la formation Graduate Développeur Front-End,
le théme est un site vitrine d'un garage automobile, Garage Vincent Parrot.

Les compétences demandé sont
Activité – Type 1 : Développer la partie front-end d’une application web ou web
mobile en intégrant les recommandations de sécurité
● 1 Maquetter une application
● 2 Réaliser une interface utilisateur web statique et adaptable
● 3 Développer une interface utilisateur web dynamique
● 4 Réaliser une interface utilisateur avec une solution de gestion de contenu ou ecommerce

Activité – Type 2 : Développer la partie back-end d’une application web ou web
mobile en intégrant les recommandations de sécurité
● 5 Créer une base de données
● 6 Développer les composants d’accès aux données
● 7 Développer la partie back-end d’une application web ou web mobile
● 8 Élaborer et mettre en œuvre des composants dans une application de gestion de
contenu ou e-commerce 

# Si vous souhaitez deployer le projet en local

## Étape 1 : Installation de WampServer
Si vous n'avez pas encore installé WampServer, suivez ces étapes :

Téléchargez le programme d'installation de WampServer à partir du site officiel : WampServer.
Lancez le programme d'installation et suivez les instructions à l'écran pour installer WampServer sur votre système.

## Étape 2 : Préparation des fichiers du site web
Assurez-vous que tous les fichiers de votre site web (HTML, CSS, JavaScript, etc.) sont placés dans un répertoire accessible sur votre ordinateur. Vous pouvez créer un nouveau répertoire dans le répertoire "www" de WampServer pour votre site web.

## Étape 3 : Démarrage de WampServer
Lancez WampServer en cliquant sur son icône depuis le bureau ou le menu de démarrage.
Vérifiez que les services Apache et MySQL sont en cours d'exécution. Vous verrez des icônes vertes dans la barre des tâches pour indiquer leur statut.

## Étape 4 : Configuration de la base de données (si nécessaire)
Si votre site web nécessite une base de données MySQL, suivez ces étapes :

Cliquez sur l'icône WampServer dans la barre des tâches pour ouvrir le menu.
Sélectionnez "phpMyAdmin" pour accéder à l'interface de gestion de la base de données.
Créez une nouvelle base de données et importez vos tables si nécessaire.

## Étape 5 : Accéder à votre site web
Ouvrez un navigateur web (Google Chrome, Mozilla Firefox, etc.).
Tapez l'adresse suivante dans la barre d'adresse : http://localhost/NOM_DU_REPERTOIRE_DE_VOTRE_SITE.
Assurez-vous de remplacer "NOM_DU_REPERTOIRE_DE_VOTRE_SITE" par le nom du répertoire que vous avez créé dans le répertoire "www" de WampServer.

## Étape 6 : Visualisation de votre site web
Félicitations ! Vous devriez maintenant pouvoir visualiser votre site web en local via WampServer. Naviguez à travers les différentes pages pour vérifier que tout fonctionne correctement.

## Informations
Pour acceder au panel administrateur, Tapez l'adresse suivante dans la barre d'adresse : http://localhost/NOM_DU_REPERTOIRE_DE_VOTRE_SITE/admin.php

* Pour tester les modes **administrateurs** et **employés**, des comptes *'exemples'* ont été créés et insérés dans la base de donnée :

| Identifiant        | Mot de passe      | Type de compte |
| ------|-----|-----|
| vparrot 	        | admin 	           | **Administrateur**	|
| sparrot         	| 1234	             | Employé	|

Le projet est aussi deployer en ligne à cette adresse
https://garagevparrot.krystdev.yj.lu/index.php

Les principales fonctions sont opérationnelles, un bug persiste lors de l'utilisation du filtre sur les véhicules d'occasion, et le menu burger, non fonctionnel,
Bug n'existant pas sur la version locale, uniquement sur la version en ligne.
Il reste le formulaire de demande de renseignements pour les véhicules d'occasion,et le responsive à développez.

