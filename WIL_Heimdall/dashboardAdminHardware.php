<?php include_once "config.php";  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>Hardware Admin Dashboard</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="stylesheet" href="css/dashboardAdminHardware.css" type="text/css">
</head>
<body style="background-image: url(images/woodtexture.jpg);">
	<div class="container">
		<!--NAVIGATION BAR PANEL-->
		<div class="panelNavBar">
			<img id="imgLogo" src="images/logoBoston.png">
			<div id="lblCurrentPage"><p><b>Home</b></p></div>
				<a name="btnManageArduinos" id="btnManageArduinos" class="btn" href=""><p>Manage Arduinos</p></a>
				<a name="btnManageFlowmeters" id="btnManageFlowmeters" class="btn" href=""><p>Manage Flowmeters</p></a>
				<a id="-" class="btn" href=""><p>-</p></a>
				<a id="-" class="btn" href=""><p>-</p></a>
				<a id="btnLogout" class="btn" href="logout.php"><p>Log Out</p></a>
		</div>
		<!--HEADER PANEL-->
        <div class="panelHeader">
			<div id="lblWelcomeMessage">
			<p>Hardware Admin Dashboard</p>
                <?php echo "<p>You are logged in as -" .$_SESSION['firstname'] ."- -" .$_SESSION['surname'] ."-</p>" ?>
			</div>
		</div>
		<!--MAIN PANEL-->
		<div class="panelMain">
			<div class="panelMainHardwareDisplay">
				<select name="ddlHardware" id="ddlHardware">
					<option value="Arduino">Arduino</option>
					<option value="Flow Meter">Flow Meter</option>
				</select> 
				<table class="tblHardware" name ="tblHardware">
				<tr>
					<td>
						<table id = "tblHardwareHeader" class="tblHardware" name = "tblHardwareHeader">
							<tr>
								<th>Arduino Number</th>
								<th>Installed Venue</th>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<!--CONTENT OF TABLE-->
						<div id="divTableHardwareContent" style="width:100%; height:350px; overflow:auto;">
							<table name="tblHardwareContent" id = "tblHardwareContent" class="tblHardware">
								<tr>
									<td>#</td>
									<td>Venue</td>
								</tr>
							</table>  
						</div>
					</td>
				</tr>
			</table>
			</div>
			<div class="panelMainGraphs">
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