<?php
// on essaie de se connecter à la db avec les coordonnées et les id pour s'y connecter
try {
    $db = new mysqli('127.0.0.1', 'root', '', 'project-contact', 3308);


    if ($db->connect_error) {
        die("Error : " . $db->connect_error);
    }

    
    if (!$db->set_charset("utf8mb4")) {
        echo "Error utf8mb4 : " . $db->error;
        exit;
    }

} catch (\Exception $e) {
    echo "Couldnt connect : " . $e->getMessage();
    exit;
}
?>