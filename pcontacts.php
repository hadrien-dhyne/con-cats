<?php
$title = "Contacts";
include ('header.php');
session_start();
?>


<body class="d-flex align-items-center justify-content-center">
    
    <!-- <div class="container"> -->
    
    <!-- <div id="welcomeOverlay" class="overlay"> -->
                <!-- <h2>Welcome "user"</h2> -->
            <!-- </div> -->
    
        <div class="row">
            
        <div class="col-md-6 mx-auto my-auto; ; shadow-sm p-3 mb-5 bg-body-tertiary rounded; rounded">
        <h1 class="title_blue">Contacts</h1>
            <button id="showFormBtn" class="btn btn-primary">Add contact</button>
        
            <div id="formContainer" class="d-none">
           
          

        
              
            <form method="POST" action="" class="form-inline">
            <?php if(isset($_SESSION['contacts'])){ ?><input type="hidden" name="user-id" value="<?php echo $_SESSION['contacts']['user'];?>"><?php }?>
    
            <div class="mb-3">
            <label for="firstname" class="form-label">First name</label>
            <input autofocus type="text" class="form-control" id="cfirstname">
            </div>

            <div class="mb-3">
                <label for="lastname" class="form-label">Last name</label>
                <input type="text" class="form-control" id="clastname">
            </div>

            <div class="mb-3">
                <label for="phone-number" class="form-label">Phone number</label>
                <input type="text" class="form-control" id="cphone-number">
            </div>
            
            <button type="submit" class="btn btn-primary">Register</button>

            </form>
            </div>
           
            <div class="float-end"> 
                    <img src="assets/images/logo_contacts_up.png" alt="meow">
            </div>

            <table class="table">
                
                <thead>
                    <tr>
                    <th scope="col"> </th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Phone</th>
                    </tr>
                </thead>
                
                <tbody>
                
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>

                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>

                </tbody>
            </table>

            <img src="assets/images/logo_contacts_bottom.png" alt="meow">
            <!-- <div id="backgroundOverlay" class="overlay"></div> -->
            </div>
            
        </div>
        
        </div>

    </div>

</body>
