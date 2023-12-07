<?php
try {
    $db = new mysqli('127.0.0.1', 'root', '', 'project-contact', 3308);

    // Vérifier la connexion
    if ($db->connect_error) {
        die("Échec de la connexion : " . $db->connect_error);
    }

    // Définir le jeu de caractères sur utf8mb4
    if (!$db->set_charset("utf8mb4")) {
        echo "Erreur lors du chargement du jeu de caractères utf8mb4 : " . $db->error;
        exit;
    }

} catch (\Exception $e) {
    echo "Échec de la connexion : " . $e->getMessage();
    exit;
}
?>