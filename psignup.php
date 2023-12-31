<?php
$title = "Sign up";
include('header.php');
session_start();

$errorPasswords = isset($_SESSION['error_passwords']) ? $_SESSION['error_passwords'] : '';
unset($_SESSION['error_passwords']); // Supprimer la variable de session

$errorUsername = isset($_SESSION['error_username']) ? $_SESSION['error_username'] : '';
unset($_SESSION['error_username']); // Supprimer la variable de session
?>

<body class="d-flex align-items-center justify-content-center" style="margin-top: 30px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto my-auto shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                <h1 class="title_blue">Sign Up</h1>

                <?php if (!empty($errorPasswords)) : ?>
                    <div style="border: 1px solid red; padding: 10px; margin-bottom: 10px; color: red;">
                        <?= $errorPasswords ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($errorUsername)) : ?>
                    <div style="border: 1px solid red; padding: 10px; margin-bottom: 10px; color: red;">
                        <?= $errorUsername ?>
                    </div>
                <?php endif; ?>
        
        <form method="POST" action="admin/admin-signup.php">
        <?php if(isset($_SESSION['contacts'])){ ?><input type="hidden" name="user-id" value="<?php echo $_SESSION['contacts']['user'];?>"><?php }?>
          
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input autofocus type="text" class="form-control" id="name" name="name">
          </div>

          <div class="mb-3">
            <label for="firstname" class="form-label">First name</label>
            <input type="text" class="form-control" id="firstname" name="firstname">
          </div>

          <div class="mb-3">
            <label for="birthdate" class="form-label">Birthdate</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate"> 
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>

          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>

          <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <div class="input-group">
        <input class="form-control" type="password" id="password" name="password">
        <div class="input-group-append">
            <button class="btn btn-secondary" type="button" id="generatePasswordBtn" onclick="generatePassword()"><img style="margin-bottom: 3px;" src="assets/images/random-sign.png" alt="randomize your password"> Generate Password</button>
        </div>
    </div>
    <div class="form-check mt-2">
        <input class="form-check-input" type="checkbox" onclick="togglePasswordVisibility()" id="showPasswordCheckbox">
        <label class="form-check-label" for="showPasswordCheckbox">Show Password</label>
    </div>
</div>

<div class="mb-3">
    <label for="password_repeat" class="form-label">Repeat your password</label>
    <input type="password" class="form-control" id="password_repeat" name="password_repeat">
</div>

          <a href="plogin.php"><button type="submit" class="btn btn-primary" name="bSignUp">Sign up</button></a>
         <div> 
          <a href="plogin.php" class="link-underline-primary">Already have an account?</a>
        </div>
        </form>

      </div>

    </div>
    </div>

  </div>

</body>
