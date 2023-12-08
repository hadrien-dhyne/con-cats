<?php
$title = "Log in";
include ('header.php');
session_start();
?>

<body class="d-flex align-items-center justify-content-center">

    <div class="container">

        <div class="row">
            
            <div class="col-md-6 mx-auto my-auto shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                
                <h1 class="title_blue">Log In</h1>
                <?php
                if (isset($_SESSION['error_login_user'])) {
                    echo '<div style="border: 1px solid red; padding: 10px; margin-bottom: 10px; color: red;">' . $_SESSION['error_login_user'] . '</div>';
                    unset($_SESSION['error_login_user']);
                }
                ?>
                <?php if (isset($_SESSION['error_login_password'])) {
     echo '<div style="border: 1px solid red; padding: 10px; margin-bottom: 10px; color: red;">' . $_SESSION['error_login_password'] . '</div>';
    unset($_SESSION['error_login_password']); 
}
?>
                <form method="POST" action="admin/admin-login.php">

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input autofocus type="text" class="form-control" id="username" name="username">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        
                        <img src="./assets/images/logo_sign_up_flip.png" alt="logo sign in">
                        
                            <div class="block_log_in">
                            <button type="submit" class="btn btn-primary">Log in</button>
                                <a href="psignup.php" class="link-underline-primary">Don't have an account? Sign up here!</a>
                            </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>
