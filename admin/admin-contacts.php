<?php
include('admin-connectdb.php');

session_start();

// on definit les tableaux pour le message d'erreur et les contacts
$errorMessages = array();
$contacts = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // on definit que l'id de la session correspond a celui de l'utilisateur
        $user_id = $_SESSION['id'];

        // on définit a quoi correspond chaque champ du formulaire recupere en POST
        $firstnamec = $_POST['firstnamec'];
        $lastnamec = $_POST['lastnamec'];
        $phone_number = $_POST['phone'];
        $birthday = $_POST['birthday'];

        // si il n'y a pas de message d'erreurs, on met les donnees dans la base de données
        if (empty($errorMessages)) {
            $sql = "INSERT INTO contacts (user_id, namec, firstnamec, phone_number, birthday) 
                    VALUES (?, ?, ?, ?, ?)";
            $stmt = $db->prepare($sql);

            // on regarde si l'enregistrement a reussi
            if ($stmt === false) {
                die('Error: ' . $db->error);
            }
            // on lie les infomations
            $result = $stmt->bind_param("issss", $user_id, $lastnamec, $firstnamec, $phone_number, $birthday);

            // on regarde si la liasion a eu lieu
            if ($result === false) {
                die('Erreur de liaison des paramètres: ' . $stmt->error);
            }

            $result = $stmt->execute();

            if ($result === false) {
                die('Erreur d\'exécution de la requête: ' . $stmt->error);
            } else {
                // on redirige pour rester sur la page contacts apres l'enrengistrement
                header('Location: ../pcontacts.php');
            }

            $stmt->close();
        }
    } catch (\Exception $e) {
        echo "Erreur: " . $e->getMessage();
        exit();
    }
}

// on récupère les actions pour le delete
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
// si action et id ont bien ete recupere
if (isset($_GET['action']) && isset($_GET['id'])) {
    // on essaie...
    try {
        // on récupere l'id du contact
        $contact_id = $_GET['id'];

        // on supprime de la table contact a laquelle on est connectee
        $sql = "DELETE FROM contacts WHERE idc = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $contact_id);

        // on confirme la suppression et on redirige vers pcontacts pour rester sur la page
        if ($stmt->execute()) {
            header('Location: ../pcontacts.php');
            exit;
        } else {
            echo "Could not delete contact.";
        }

        $stmt->close();

        exit();
    } catch (\Exception $e) {
        echo "Erreur: " . $e->getMessage();
        exit();
    }
    // si action et id n'ont pas ete trouve
} else {
    // on verifie que l'utilisateur est connecte
    $user_id = $_SESSION['id'];
    $sql = "SELECT idc, firstnamec, namec, phone_number, birthday FROM contacts WHERE user_id = ?";
    $stmt = $db->prepare($sql);

    // on verifie d'ou vient l'erreur
    if ($stmt === false) {
        die('Erreur de préparation de la requête SQL: ' . $db->error);
    }
    $stmt->bind_param("i", $user_id);

    $result = $stmt->execute();

    if ($result === false) {
        die('Erreur d\'exécution de la requête: ' . $stmt->error);
    }

    $contacts = $stmt->get_result();

    $stmt->close();
}
?>
