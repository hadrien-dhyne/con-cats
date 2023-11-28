<?php
require("admin-requestSQL.php");
session_start();
if(isset($_POST['bSignUp']) || isset($_POST['bUpdate'])){
    $message = null;
    isset($_POST['bUpdate'])? $id = $_POST['user-id']:'';
    $name = htmlspecialchars(strtolower(trim($_POST['lastname'])));
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $birthdate = htmlspecialchars(trim($_POST['birthdate']));
    $email = htmlspecialchars(strtolower(trim($_POST['email'])));
    $username = htmlspecialchars(strtolower(trim($_POST['username'])));
    $password = md5(htmlspecialchars(trim($_POST['password'])));
    $password_repeat = md5(htmlspecialchars(trim($_POST['password_repeat'])));
    
    //var_dump($nom,$prenom,$fonction,$dateDeNaissance,$username,$password1,$password2);



    //PAUSE ICI



    
    if($password === $password_repeat){
        //$message = "Les mots de passes correspondent.";
        if(isset($_POST['bUpdate'])){
            $message = userUpdate($id,$nom,$prenom,$fonction,$dateDeNaissance,$username,$password1);
        }else{
            $message = insertdata($nom,$prenom,$fonction,$dateDeNaissance,$username,$password1);
        }
        
        if(isset($_SESSION['user_id'])){
            header('Location: ../paccueil.php?message='.$message);
        }else{
            header('Location: ../pconnexion.php?message='.$message);
        }exit;
        
    }else{
        $message = "Les mots de passes ne correspondent pas.";
    }
    echo $message;
}

?>