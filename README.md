# Projet L3 MIAGE

    Autheurs :

        ATTHOH Syntiche
        TOMBEZE Noah

Contexte :

    Création d'une application pour un club sportif qui possède des licenciés qui appartiennent à des catégorie. Les licenciés et les catégories ont des attributs bien spécifiques.
    De plus, il y a dans ce club des éducateurs (licenciés particulier), qui peuvent être administrateurs, c'est-à-dire ayant accès à cette application

## Partie 1 : PHP DAO/MVC, réalisation d'une application backend

1. Implémentation des classes :  Categories, Educateur, Licencie, Contact. A l'aide d'une partie models et de la partie dao qui connecte models avec la base de donnée réel.

Amélioration : 

Création d' une classe connexion qui possede un attribut pdo et c'est cette classe qu'on instanciera pour avoir acces a un objet pdo 
(regarder maintenant,  le constructeur de ContactDAO et l'utilisation de $this->connexion->pdo dans les methodes)
dans les controlleurs, on instanciera contactDAO (avec un objet de type connexion, qui fournira pdo)


2. Implémentation de fonctionnalités dans la partie controllers pour nos différentes classes:
l'ajout(Add), la modification(Edit), la suppression(Delete).

Ces fonctionnalités doivent être accessible seulement par les administrateurs.

3. On pourra tester notre application et toutes ces fonctionnalitées a partir d'index.php et des différentes views.


## Partie 2 : Symfony, réalisation de la partie front-end de l'application
