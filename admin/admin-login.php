<?php
// Include the database connection file
include('admin-connectdb.php');
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the entered username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Prepare and execute the SQL query
        $stmt = $db->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the user exists
        if ($result->num_rows > 0) {
            // Fetch user data
            $user = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Set session variables for the logged-in user
                //  $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['id'] = $user['id'];
                // Redirect to contacts.php on successful login
                header("Location: ../pcontacts.php");
                exit();
            } else {
                // Incorrect password
                $_SESSION['error_login_password'] = "Incorrect password";
                header("Location: ../plogin.php");
                exit();
            }
        }  else {
            // Utilisateur non trouvé
            $_SESSION['error_login_user'] = "User not found";
            header("Location: ../plogin.php");
            exit();
        }
        
    } catch (\Exception $e) {
        // Display any errors that occur during the process
        echo "Error: " . $e->getMessage();
        exit();
    }
}

// If the form is not submitted or there are errors, redirect to the login page
header("Location: ../plogin.php");
exit();
?>
