<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>Notes Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="stylesheet" href="css/formNotes.css" type="text/css">
</head>
<body style="background-image: url(images/woodtexture.jpg);">
	<div class="container">
		<!--NAVIGATION BAR PANEL-->
		<div class="panelNavBar">
			<img id="imgLogo" src="images/logoBoston.png">
			<div id="lblCurrentPage"><p><b>Notes</b></p></div>
				<a id="btnHome" class="btn" href="dashboardSalesRep.php"><p>Home</p></a>
				<a name="btnManageClients" id="btnManageClients" class="btn" href="formManageClients.php"><p>Manage Clients</p></a>
				<a id="btnClientReport" class="btn" href=""><p>Client Reports</p></a>
				<a id="btnSalesReports" class="btn" href=""><p>Sales Reports</p></a>
				<a id="btnLogout" class="btn" href="logout.php"><p>Log Out</p></a>
		</div>
		<!--HEADER PANEL-->
        <div class="panelHeader">
			<div id="lblWelcomeMessage">
			<p>Sales Representative Dashboard</p>
			<p>You are logged in as -Name- -Surname-</p>
			</div>
		</div>
		<!--MAIN PANEL-->
		<div class="panelMain">
			<!--LOCATION TABLE-->
			<table class="tblClients tblMargin" name ="tblClients">
				<tr>
					<td>
						<table id = "tblClientsHeader" class="tblClients" name = "tblClientsHeader">
							<tr>
								<th>Location:</th>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<!--CONTENT OF TABLE-->
						<div id="divTableClientsContent" style="width:100%; height:150px; overflow:auto;">
							<table name="tblClientsContent" id = "tblClientsContent" class="tblClients">
								<tr>
									<td>Tiger's Milk - Claremont</td>
								</tr>
							</table>  
						</div>
					</td>
				</tr>
			</table>
			
			<!--DESCRIPTION NOTE-->
			<table class="tblDesc" name ="tblDesc">
				<tr>
					<td>
						<table id = "tblDescHeader" class="tblDesc" name = "tblDescHeader">
							<tr>
								<th>Note:</th>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<!--CONTENT OF TABLE-->
						<div id="divTableDescContent" style="width:100%; height:150px; overflow:auto;">
							<table name="tblDescContent" id = "tblDescContent" class="tblDesc">
								<tr>
								<div id="wrap">
								<textarea rows="6">Once a Location value is selected, the note description will be displayed here
								</textarea>
								</div>
								</tr>
							</table>  
						</div>
					</td>
				</tr>
			</table>
			
			<button name="btnUpdateNote" class="btn btnUpdate"><p>Update Note</p></button>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>