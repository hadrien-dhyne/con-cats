<?php
include('admin-connectdb.php');
session_start();
$errorMessages = array();
$contacts = array();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    try {
        $user_id = $_SESSION['id'];
        $firstnamec = $_POST['firstnamec'];
        $lastnamec = $_POST['lastnamec'];
        $phone_number = $_POST['phone'];
        $birthday = $_POST['birthday'];

        // Valider les données (ajoutez vos propres règles de validation ici)

        // Si aucune erreur de validation, insérez les données dans la table contacts
        if (empty($errorMessages)) {
            // Préparer la requête SQL
            $sql = "INSERT INTO contacts (user_id, namec, firstnamec, phone_number, birthday) 
                    VALUES (?, ?, ?, ?, ?)";
            $stmt = $db->prepare($sql);

            // Vérifier si la préparation de la requête a échoué
            if ($stmt === false) {
                die('Erreur de préparation de la requête SQL: ' . $db->error);
            }

            // Liaison des paramètres
            $result = $stmt->bind_param("issss", $user_id, $lastnamec, $firstnamec, $phone_number, $birthday);

            // Vérifier si la liaison des paramètres a échoué
            if ($result === false) {
                die('Erreur de liaison des paramètres: ' . $stmt->error);
            }

            // Exécution de la requête
            $result = $stmt->execute();

            // Vérifier si l'exécution de la requête a échoué
            if ($result === false) {
                die('Erreur d\'exécution de la requête: ' . $stmt->error);
            }
            else header('Location: ../pcontacts.php');
            // Fermer la déclaration
            $stmt->close();
        }
    } catch (\Exception $e) {
        // Afficher les erreurs qui se produisent pendant le processus
        echo "Erreur: " . $e->getMessage();
        exit();
    }
}



$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

if (isset($_GET['action']) && isset($_GET['id'])) {
    try {
    $contact_id = $_GET['id'];

    // Préparer la requête SQL pour supprimer le contact
    $sql = "DELETE FROM contacts WHERE idc = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $contact_id);

    // Exécuter la requête
    if ($stmt->execute()) {
        // Rediriger l'utilisateur vers la page des contacts
        header('Location: ../pcontacts.php');
        exit;
    } else {
        echo "Couldnt delete contact.";
    }
    
    $stmt->close();
    
    exit();
}
catch (\Exception $e) {
    // Afficher les erreurs qui se produisent pendant le processus
    echo "Erreur: " . $e->getMessage();
    exit();
}
}

else{

$user_id = $_SESSION['id'];

// Récupérer les contacts de l'utilisateur depuis la base de données
$sql = "SELECT idc, firstnamec, namec, phone_number, birthday FROM contacts WHERE user_id = ?";
$stmt = $db->prepare($sql);

// Vérifier si la préparation de la requête a échoué
if ($stmt === false) {
    die('Erreur de préparation de la requête SQL: ' . $db->error);
}

// Liaison du paramètre
$stmt->bind_param("i", $user_id);

// Exécution de la requête
$result = $stmt->execute();

// Vérifier si l'exécution de la requête a échoué
if ($result === false) {
    die('Erreur d\'exécution de la requête: ' . $stmt->error);
}

// Récupérer les résultats de la requête
$contacts = $stmt->get_result();

// Fermer la déclaration
$stmt->close();

}
?>
