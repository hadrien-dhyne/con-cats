<?php
try {
  $db = new PDO('mysql:host=localhost;dbname=project-contact', 'root');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // On lance une exception à chaque fois qu'une requête a échoué.

  // Sélectionner la base de données après la connexion
  $db->exec("SET NAMES 'utf8mb4'");
} catch (\PDOException $e) {
    echo "Connexion to the data base failed : " . $e->getMessage();
    var_dump($e->getMessage());
    exit;
}?>