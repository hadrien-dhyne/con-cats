<?php
$title = "Contacts";
include ('header.php');
session_start();
?>


<body class="d-flex align-items-center justify-content-center welcome-body">
    
<div class="welcome-overlay">
    Welcome "user"
</div>


    <div class="container">
    
    
        <div class="row">
            
        <div class="col-md-6 mx-auto my-auto; ; shadow-sm p-3 mb-5 bg-body-tertiary rounded; rounded">
        <h1 class="title_blue">Con-Cats</h1>
       
<button class="btn btn-primary" onclick="toggleForm()">Add contact</button>

<form method="POST" action="" style="display: none;" id="contactForm">
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
                    <th scope="col">Birthday</th>
                    </tr>
                </thead>
                
                <tbody>
                
                    <tr>
                        <th scope="row">1</th>
                        <td>Emmanuelle</td>
                        <td>Ntsama</td>
                        <td>+32495346294</td>
                        <td>26/12/2003</td>
                    </tr>

                    <tr>
                    <th scope="row">2</th>
                        <td>Emmanuelle</td>
                        <td>Ntsama</td>
                        <td>+32495346294</td>
                        <td>26/12/2003</td>
                    </tr>
                
                    <tr>
                        <th scope="row">3</th>
                        <td>Emmanuelle</td>
                        <td>Ntsama</td>
                        <td>+32495346294</td>
                        <td>26/12/2003</td>
                    </tr>
                    
                    <tr>
                        <th scope="row">4</th>
                        <td>Hadrien</td>
                        <td>Dhyne</td>
                        <td>+32495346294</td>
                        <td>28/09/1999</td>
                    </tr>

                </tbody>
            </table>

            <img src="assets/images/logo_contacts_bottom.png" alt="meow">
            <div class="d-flex justify-content-end">
                    <a href="plogin.php" class="link-underline-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>
        

    

</body>
