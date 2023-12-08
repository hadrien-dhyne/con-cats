<?php

include('admin-connectdb.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     
    $contact_id = $_POST['contact_id'];

     
    $sql = "DELETE FROM contacts WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $contact_id);

     
    if ($stmt->execute()) {
         
        header('Location: admin-contacts.php');
        exit;
    } else {
        echo "Couldnt delete contact.";
    }

    $stmt->close();
}
?>