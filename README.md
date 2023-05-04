## SAE 2.03 Equipe 12

## Présentation du projet

* Pour ce projet nous avons décider de faire un container docker dans l'idée d'un chat en ligne.
* Ce container est basé sur différentes images afin de pouvoir lancer le serveur web et de stocker des informations dans une base de données.

## Prérequis pour lancer le container 

* Avoir docker d'installer sur sa machine
* Avoir git d'installer sur sa machine

## Lancement du container

* Cloner le repository git à l'aide de la commande suivante : <b>git clone git@github.com:IKLSI/docker-sae-203-equipe12-chat</b>
* Se placer dans le dossier docker-sae-203-equipe12-chat puis dans le dossier content
* Lancer la commande suivante : <b>docker-compose up -d</b>
* Enfin, ouvrir un navigateur et taper l'adresse suivante : <b>localhost:3000</b>

## Conditions d'utilisation

* Avant d'accèder à la page php sur le port 3000, il faut se connecter à mysql sur le port 8080
* Pour se connecter à mysql, il faut utiliser les identifiants suivants : <b>user : root</b> et <b>password : dbsae</b>
* Une fois connecté à mysql, il faut créer une base de données nommée <b>chat</b> et insérer une table nommée utilisateurchat avec les colonnes suivantes : <b>pseudo (varchar), message (text) et heure (time)</b>

## Piste d'amélioration

* Automatisation de la création de la base de données lors du build du container afin d'éviter à l'utilisateur de le faire manuellement.

## Contraintes 

* Initialement nous n'avions qu'un dockerfile cependant nous avons remarqué que nous ne pouvions pas utiliser plusieurs services (php / mysql) en même temps en procédant de cette façon. 
* Nous avond donc dû créer également un docker-compose afin de répondre à ces critères.

## Autres projets 

* `gh-pages` : <a href="https://iklsi.github.io/docker-sae-203-equipe12/">Lien</a>
* `dépôt` : <a href="https://github.com/IKLSI/docker-sae-203-equipe12-depot">Lien</a>
* `vscode` : <a href="https://github.com/IKLSI/docker-sae-203-equipe12-vscode">Lien</a>

## LEVESQUE Kyliann, LE BRETON Kyllian, MENARD Esteban