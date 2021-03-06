Jobinder
========

A Symfony project created on May 25, 2018, 9:07 am.

L'application utilisera les API de Pôle Emploi, Geocoder et Leaflet pour respectivement :
	--> récupérer les offres d'emploi
	--> récupérer la latitude et la longitude d'une adresse
	--> afficher une map

L'objectif étant dans un 1er temps de localiser sur une map interactive les offres d'emploi.
Nous envisageons ensuite si le temps nous le permet d'élargir les fonctionnalités :
- Recherche inversée depuis une localisation.
- Créer un espace membre permettant à l'utilisateur de se connecter à son compte Pole Emploi pour
créer un suivi des recherches effectuées.
- S'appuyer sur les recherches effectuées pour notifier via un système d'alerte sur les nouvelles offres
d'emploi apparues dans la région recherchée.



Documentation API:
https://www.emploi-store-dev.fr/portail-developpeur/catalogueapi
https://leafletjs.com/
https://geocoder.opencagedata.com/

Tokens API Pole Emploi:
Identifiant : PAR_jobinder_0177f48ab1c53cf82653eb0bdb87104e7c12fc084019ae41139e2e709d92c6bc
Clé secrète : 7cea572bfe4721915135fa22213b9805172a066bbb667314d3ecdb82be5f5259

Installation:
git clone https://github.com/Diox7167/JobinderCESI
Copier via clef USB les éléments manquants du dossier vendor
modifier le parameters.yml
Créer une BDD jobinder
lancer la commande : php bin/console doctrine:schema:update --force

Commandes GIT :
git flow init (laisser les paramètres par défautet appuyer sur entrée autant de fois que nécessaire)
git flow feature start <nom_de_la_branche>
git add .
git commit -m""
git flow feature finish

git pull
git fetch
git stash
git pop
