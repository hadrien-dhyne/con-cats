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
        $stmt = $db->prepare("INSERT INTO user (name, firstname, birthdate, email, username, password) 
                            VALUES (?, ?, ?, ?, ?, ?)");

        // Associer les variables aux paramètres de la déclaration
        $hashedpassword=sha1($password);
        $stmt->bind_param("ssssss", $name, $firstname, $birthdate, $email, $username, $hashedpassword);

        $stmt->execute();

       
    } catch (\Exception $e) {
        echo "Erreur d'enregistrement : " . $e->getMessage();
    }
} 

?>