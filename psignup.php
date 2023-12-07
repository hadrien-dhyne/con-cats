<?php
$title = "Sign up";
include ('header.php');
session_start();
?>

<body class="d-flex align-items-center justify-content-center" style="margin-top: 30px;">

  <div class="container">

    <div class="row">
      <div class="col-md-6 mx-auto my-auto shadow-sm p-3 mb-5 bg-body-tertiary rounded">
        
        <h1 class="title_blue">Sign Up</h1>
        <!-- essayer d'ajouter l'image -->
        <form method="POST" action="admin/admin-signup.php" onsubmit="return false;">
        <?php if(isset($_SESSION['contacts'])){ ?><input type="hidden" name="user-id" value="<?php echo $_SESSION['contacts']['user'];?>"><?php }?>
          
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input autofocus type="text" class="form-control" id="name">
          </div>

          <div class="mb-3">
            <label for="firstname" class="form-label">First name</label>
            <input type="text" class="form-control" id="firstname">
          </div>

          <div class="mb-3">
            <label for="birthdate" class="form-label">Birthdate</label>
            <input type="date" class="form-control" id="birthdate">
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email">
          </div>

          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username">
          </div>

          <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <div class="input-group">
        <input class="form-control" type="password" id="password">
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
    <input type="password" class="form-control" id="password_repeat">
</div>

          <?php
          if(isset($SESSION['contacts'])){ ?>
          <button type="submit" class="btn btn-primary" name="bUpdate">Update</button>
          <?php 
          }
          else{?>
          <a href="psignin.php"><button type="submit" class="btn btn-primary" name="bSignUp">Sign up</button></a>
         <?php }?><div> 
          <a href="psignin.php" class="link-underline-primary">Already have an account?</a>
        </div>
        </form>

      </div>

    </div>
    </div>

  </div>

</body>
