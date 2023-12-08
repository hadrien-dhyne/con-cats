<?php
include('admin-connectdb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // on définit a quoi correspond chaque champ du formulaire recupere en POST
    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $password_repeat = $_POST['password_repeat']; 
    try {
        $stmt_check_user = $db->prepare("SELECT id FROM user WHERE username = ?");
        $stmt_check_user->bind_param("s", $username);
        $stmt_check_user->execute();
        $stmt_check_user->store_result();

        if ($stmt_check_user->num_rows > 0) {
            session_start();
            $_SESSION['error_username'] = "Username already exists. Please choose a different one.";
            header("Location: ../psignup.php");
            exit();
        }

        $stmt_check_user->close();
        // si les mots de passe correspondent
        if ($password_repeat == $password) {
            // on enregistre les infos en bdd
            $stmt = $db->prepare("INSERT INTO user (name, firstname, birthdate, email, username, password) 
                            VALUES (?, ?, ?, ?, ?, ?)");

        // on hache le mot de passe pour le securiser
$hashedpassword = password_hash($password, PASSWORD_DEFAULT);
// on lie les infomations
$stmt->bind_param("ssssss", $name, $firstname, $birthdate, $email, $username, $hashedpassword);

        $stmt->execute();

        // une fois que l'utilisateur est enregistre on l'envoi vers la page de connexion
        header("Location: ../plogin.php");
        exit();
        } 
        // si les mots de passe ne correspondent pas on envoie le message d'erreur
        else {
             
            session_start();
            $_SESSION['error_passwords'] = "Passwords don't match";
            header("Location: ../psignup.php");
            exit();
        }
        
    } catch (\Exception $e) {
        echo "Error : " . $e->getMessage();
    }
}
?>
