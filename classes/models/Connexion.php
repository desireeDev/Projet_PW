<?php


class Connexion{

    
    public function __construct(){ 
    
    global $host;
    global $database;
    global $username;
    global $password;
    // Connexion à la base de données en utilisant PDO
    try {
    $this->pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // Définir le mode d'erreur PDO à exception
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher un message d'erreur
    die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
    }

}
?>
