<!DOCTYPE html>
<html lang="en">
<head>
	<?php
	include('loginValidation.php');
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
            <form action="/loginValidation.php" method="post">
				<input type="text" id="txtBoxUsername" name="txtBoxUsername" value="" placeholder="Email">
				<input type="password" id="txtBoxPassword" name="txtBoxPassword" value="" placeholder="Password">
				<input type="button" name="btnLogin" id="btnLogin" class="btn" value="Login" style="text-align:center;">
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