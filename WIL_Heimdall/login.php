<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    //include_once "config.php";
    $page_title = "Login";
    //login checker
    //include_once "loginCheck.php";
    //$require_login = false;

    $access_denied = false;

    // post code will be here

    if(isset($_POST['btnLogin'])){
        // email check will be here
        // include classes
        include_once "GateKeeper.php";
        include_once "Objects/Users.php";

        $GateKeeper = new GateKeeper();
        $dbKey = $GateKeeper->getConnection();

        // initialize objects
        $currentUser = new Users($dbKey);

        // check if email and password are in the database
        $currentUser->email=$_POST['txtBoxEmail'];

        // check if email exists, also get user details using this emailExists() method
        $email_exists = $currentUser->emailExists();

        // login validation will be here
        //To be used when hashing passwords in future
        //if ($email_exists && password_verify($_POST['txtBoxPassword'], $currentUser->password)) {

        if($email_exists && $currentUser->password == $_POST['txtBoxPassword']){

            session_start();

            // if it is, set the session value to true
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $currentUser->user_id;
            $_SESSION['role_id'] = $currentUser->role_id;
            $_SESSION['valid'] = $currentUser->valid;
            $_SESSION['firstname'] = htmlspecialchars($currentUser->first_name, ENT_QUOTES, 'UTF-8');
            $_SESSION['surname'] = $currentUser->surname;

            if ($currentUser->role_id == 1 && $currentUser->valid == 1) {
                header("Location: {$home_url}dashboardAdminSupport.php?action=login_success");
                //header("Location: {$home_url}dashboardAdminSupport.php");
            } elseif ($currentUser->role_id == 2 && $currentUser->valid == 1) {
                header("Location: {$home_url}dashboardAdminHardware.php?action=login_success");
                //header("Location: {$home_url}dashboardAdminHardware.php");
            } elseif ($currentUser->role_id == 3 && $currentUser->valid == 1) {
                header("Location: {$home_url}dashboardSalesRep.php?action=login_success");
                //header("Location: {$home_url}dashboardSalesRep.php");
            } elseif ($currentUser->role_id == 4 && $currentUser->valid == 1) {
                header("Location: {$home_url}dashboardBarManager.php?action=login_success");
                //header("Location: {$home_url}dashboardBarManager.php");
            } else{
                //change to error message
                header("Location: {$home_url}TestPage.php");
            }
        }

            //else {
            //route invalid user or no user to this page.
            //}

        // if email does not exist or password is wrong
           else{
            $access_denied = true;
            //header("Location: {$home_url}TestPage.php");
               //not able to login in message
               echo "it broke";
        }

           //post ends here
    }

    //include('loginValidation.php');
    ?>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/login.css" type="text/css">
</head>
<body style="background-image: url(images/woodtexture.jpg);">
	<div class="container">
		<div class="panelLogin">
			<img id="imgLogo" src="images/logoBoston.png">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
				<input type="text" id="txtBoxUsername" name="txtBoxEmail" value="" placeholder="Email">
				<input type="password" id="txtBoxPassword" name="txtBoxPassword" value="" placeholder="Password">
				<input type="submit" name="btnLogin" id="btnLogin" class="btn" value="Login" style="text-align:center;">
            </form>
		</div>
		<div class="panelInfo">
			<label>
			<p>Enter credentials assigned by admin<p>
			</label>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>