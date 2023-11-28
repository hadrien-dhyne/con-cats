<?php
$title = "Sign up";
include ('header.php');
session_start();
?>



<body  class="d-flex align-items-center justify-content-center;">

  <div class="container">
    
    <div class="row">
        <div class="col-md-6 mx-auto my-auto; ; shadow-sm p-3 mb-5 bg-body-tertiary rounded; rounded">
            
            <h1 class="title_blue">Sign Up</h1>
            
            
            <form>
              
              <div class="mb-3">
                <label for="lastname" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="lastname">
              </div>
            
              <div class="mb-3">
                <label for="firstname" class="form-label">Your Firstname</label>
                <input type="text" class="form-control" id="firstname">
              </div>
  
              <div class="mb-3">
                <label for="birthdate" class="form-label">Your Birthdate</label>
                <input type="date" class="form-control" id="birthdate">
              </div>          
  
              <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" class="form-control" id="email">
              </div>

              <div class="mb-3">
                <label for="username" class="form-label">Your Username</label>
                <input type="text" class="form-control" id="username">
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group" id="show_hide_password">
                <input class="form-control" type="password">
              </div>

              <div class="mb-3">
                <label for="password_repeat" class="form-label">Repeat your password</label>
                <input type="password" class="form-control" id="password_repeat">
              </div>

              <button type="submit" class="btn btn-primary" name="bSignUp">Sign up</button>
            
            </form>

            <div>
              <a href="psignin.php" class="link-underline-primary">Already have an account?</a>
            </div>
          
          </div>
    
        </div>

      </div>


  </body>