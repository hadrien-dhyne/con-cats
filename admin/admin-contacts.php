<?php
include('admin-connectdb.php');
session_start();
$errorMessages = array();
$contacts = array();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    try {
        $user_id = $_SESSION['id'];
        $firstnamec = $_POST['firstnamec'];
        $lastnamec = $_POST['lastnamec'];
        $phone_number = $_POST['phone'];
        $birthday = $_POST['birthday'];

    

    
        if (empty($errorMessages)) {
             
            $sql = "INSERT INTO contacts (user_id, namec, firstnamec, phone_number, birthday) 
                    VALUES (?, ?, ?, ?, ?)";
            $stmt = $db->prepare($sql);

    
            if ($stmt === false) {
                die('Erreur de préparation de la requête SQL: ' . $db->error);
            }

    
            $result = $stmt->bind_param("issss", $user_id, $lastnamec, $firstnamec, $phone_number, $birthday);

    
            if ($result === false) {
                die('Erreur de liaison des paramètres: ' . $stmt->error);
            }

    
            $result = $stmt->execute();

    
            if ($result === false) {
                die('Erreur d\'exécution de la requête: ' . $stmt->error);
            }
            else header('Location: ../pcontacts.php');
    
            $stmt->close();
        }
    } catch (\Exception $e) {
    
        echo "Erreur: " . $e->getMessage();
        exit();
    }
}



$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

if (isset($_GET['action']) && isset($_GET['id'])) {
    try {
    $contact_id = $_GET['id'];

    
    $sql = "DELETE FROM contacts WHERE idc = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $contact_id);

    
    if ($stmt->execute()) {
    
        header('Location: ../pcontacts.php');
        exit;
    } else {
        echo "Couldnt delete contact.";
    }
    
    $stmt->close();
    
    exit();
}
catch (\Exception $e) {
    
    echo "Erreur: " . $e->getMessage();
    exit();
}
}

else{

$user_id = $_SESSION['id'];

 
$sql = "SELECT idc, firstnamec, namec, phone_number, birthday FROM contacts WHERE user_id = ?";
$stmt = $db->prepare($sql);

 
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
