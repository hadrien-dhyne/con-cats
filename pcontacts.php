<?php
$title = "Contacts";
include ('header.php');
include ('admin/admin-contacts.php');

if (!isset($_SESSION['welcome_message_displayed'])) {
    $_SESSION['welcome_message_displayed'] = true;
    $showWelcomeMessage = true;
} else {
    $showWelcomeMessage = false;
}


if (isset($_SESSION['id'])) {
?>

<body class="d-flex align-items-center justify-content-center welcome-body">
<?php if ($showWelcomeMessage) : ?>
        <div class="welcome-overlay">
            Welcome <?php if (isset($_SESSION['username'])) echo $_SESSION['username']; ?>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto my-auto shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                <h1 class="title_blue">Con-Cats</h1>

                
                  
<form method="POST" action="admin/admin-contacts.php">  
    <!-- <//?php if(isset($_SESSION['contacts'])){ ?><input type="hidden" name="user-id" value="<//?php echo $_SESSION['contacts']['user'];?>"><//?php }?> -->

    <div class="mb-3">
        <label for="firstnamec" class="form-label">First name</label>
        <input autofocus type="text" class="form-control" id="cfirstname" name="firstnamec" required>
    </div>

    <div class="mb-3">
        <label for="lastnamec" class="form-label">Last name</label>
        <input type="text" class="form-control" id="clastname" name="lastnamec" required>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Phone number</label>
        <input type="text" class="form-control" id="cphone-number" name="phone" maxlength="12" minlength="12" value="+32" required> 
        <p style="font-size: 12px;">(ex:+32470454545)</p>
    </div>
    
    <div class="mb-3">
            <label for="birthday" class="form-label">Birthday</label>
            <input type="date" class="form-control" id="birthday" name="birthday" required> 
    </div>

    <button type="submit" class="btn btn-primary">Register</button>
    </form>
            
<div class="float-end">
    <img src="assets/images/logo_contacts_up.png" alt="meow">
</div>



    <table class="table ">
                <thead>
                    <tr>
                    <th scope="col"> </th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Birthday</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                
                <tbody>
                
                <?php
        // Afficher les contacts dans le tableau
        foreach ($contacts as $contacts):?>
         <tr>
            <th scope='row'></th>
             <td> <?=$contacts["firstnamec"]?> </td>
             <td> <?=$contacts["namec"]?> </td>
             <td> <?=$contacts["phone_number"]?> </td>
             <td> <?=date('d/m/Y', strtotime($contacts["birthday"]))?> </td>
             <td> <a href="pcontacts.php?action=delete&id=<?=$contacts["idc"]?>"><button class="btn btn-danger" name="bDelete">Delete</button></a></td>

             </tr>
        
            <?php endforeach?>
                </tbody>
            </table>
            
            <img src="assets/images/logo_contacts_bottom.png" alt="meow">
                <div class="d-flex justify-content-end">
                    <a href="admin/admin-logout.php" class="link-underline-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>
<?php } else {
    header('Location: plogin.php');
    exit;
} ?>