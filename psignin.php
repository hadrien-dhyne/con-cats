<?php
$title = "Sign in";
include ('header.php');
session_start();
?>

<body class="d-flex align-items-center justify-content-center">

    <div class="container">

        <div class="row">
            
            <div class="col-md-6 mx-auto my-auto shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                
                <h1 class="title_blue">Sign In</h1>

                <form>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input autofocus type="text" class="form-control" id="username">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        
                        <img src="./assets/images/logo_sign_up_flip.png" alt="logo sign in">
                        
                            <div class="block_sign_in">
                                <button type="submit" class="btn btn-primary">Sign in</button>
                                <a href="psignup.php" class="link-underline-primary">Don't have an account? Sign up here!</a>
                            </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>
