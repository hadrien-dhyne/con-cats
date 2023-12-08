<?php
 
include('admin-connectdb.php');
session_start();

 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
         
        $stmt = $db->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

         
        if ($result->num_rows > 0) {
             
            $user = $result->fetch_assoc();

             
            if (password_verify($password, $user['password'])) {
                 
                 
                $_SESSION['username'] = $user['username'];
                $_SESSION['id'] = $user['id'];
                 
                header("Location: ../pcontacts.php");
                exit();
            } else {
                 
                $_SESSION['error_login_password'] = "Incorrect password";
                header("Location: ../plogin.php");
                exit();
            }
        }  else {
             
            $_SESSION['error_login_user'] = "User not found";
            header("Location: ../plogin.php");
            exit();
        }
        
    } catch (\Exception $e) {
         
        echo "Error: " . $e->getMessage();
        exit();
    }
}

 
header("Location: ../plogin.php");
exit();
?>
