<?php
include('admin-connectdb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $password_repeat = $_POST['password_repeat']; 
    try {
        
        
        if ($password_repeat == $password) {
            $stmt = $db->prepare("INSERT INTO user (name, firstname, birthdate, email, username, password) 
                            VALUES (?, ?, ?, ?, ?, ?)");

        
$hashedpassword = password_hash($password, PASSWORD_DEFAULT);
$stmt->bind_param("ssssss", $name, $firstname, $birthdate, $email, $username, $hashedpassword);

        $stmt->execute();

        
        header("Location: ../plogin.php");
        exit();
        } else {
            // Stocker le message d'erreur dans une variable de session
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
