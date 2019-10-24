<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>Bar Manager Dashboard</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="stylesheet" href="css/dashboardBarManager.css" type="text/css">
    <?php
    //login restriction method and code
    if (!empty($_SESSION['role_id'])) {
        if (((int)$_SESSION['role_id'] == 4 || (int)$_SESSION['role_id'] == 1 ) && (int)$_SESSION['valid'] == 1 ) {
            //header("Location: {$home_url}dashboardAdminSupport.php");
            //echo '<pre>' . print_r($_SESSION['role_id'], TRUE) . '</pre>';
        }else{
            header("Location: {$home_url}login.php?action=access_denied");
        }

    }else{
        header("Location: {$home_url}login.php?action=login_denied");
    }
    ?>
</head>
<body style="background-image: url(images/woodtexture.jpg);">
	<div class="container">
		<!--NAVIGATION BAR PANEL-->
		<div class="panelNavBar">
			<img id="imgLogo" src="images/logoBoston.png">
			<div id="lblCurrentPage"><p><b>Home</b></p></div>
				<a name="btnReports" id="btnReports" class="btn" href=""><p>Reports</p></a>
				<a name="btnNotes" id="btnNotes" class="btn" href="formNotesBM.php"><p>Notes</p></a>
				<a id="-" class="btn" href=""><p>-</p></a>
				<a id="-" class="btn" href=""><p>-</p></a>
				<a name="btnLogout" id="btnLogout" class="btn" href="logout.php"><p>Log Out</p></a>
		</div>
		<!--HEADER PANEL-->
        <div class="panelHeader">
			<div id="lblWelcomeMessage">
			<p>Bar Manager Dashboard</p>
			<p>You are logged in as -Name- -Surname-</p>
			</div>
		</div>
		<!--MAIN PANEL-->
		<div class="panelMain">
			<div class="panelCol1">
				<img id="imgGraph" src="images/graph.png">
				<img id="imgGraph" src="images/graph.png">
			</div>
			<div class="panelCol2">
				<img id="imgGraph" src="images/graph.png">
				<img id="imgGraph" src="images/graph.png">
			</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
