<?php

include('admin-connectdb.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer l'ID du contact à supprimer
    $contact_id = $_POST['contact_id'];

    // Préparer la requête SQL pour supprimer le contact
    $sql = "DELETE FROM contacts WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $contact_id);

    // Exécuter la requête
    if ($stmt->execute()) {
        // Rediriger l'utilisateur vers la page des contacts
        header('Location: admin-contacts.php');
        exit;
    } else {
        echo "Couldnt delete contact.";
    }

    $stmt->close();
}
?>