<?php
include('admin-connectdb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Récupérer les données du formulaire
  $name = $_POST['name'];
  $firstname = $_POST['firstname'];
  $birthdate = $_POST['birthdate'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password']; // Assurez-vous de traiter les mots de passe de manière sécurisée en production

  try {
      // Préparer et exécuter la requête SQL pour insérer les données
      $stmt = $db->prepare("INSERT INTO user (name, firstname, birthdate, email, username, password) 
                            VALUES (:name, :firstname, :birthdate, :email, :username, :password)");

      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':firstname', $firstname);
      $stmt->bindParam(':birthdate', $birthdate);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':password', $password); // Assurez-vous de traiter les mots de passe de manière sécurisée en production

      $stmt->execute();

      echo "Enregistrement réussi !";
  } catch (\PDOException $e) {
      echo "Erreur d'enregistrement : " . $e->getMessage();
  }
}
?>