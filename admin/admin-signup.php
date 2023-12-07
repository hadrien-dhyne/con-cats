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
            $message = userUpdate($id,$name,$firstname,$birthdate,$email,$username,$password);
        }else{
            $message = insertdata($name,$firstname,$birthdate,$email,$username,$password);
        }
        
        if(isset($_SESSION['user_id'])){
            header('Location: ../phome.php?message='.$message);
        }else{
            header('Location: ../psignin.php?message='.$message);
        }exit;
        
    }else{
        $message = "Passwords dont match. Please try again.";
    }
    echo $message;
}

?>