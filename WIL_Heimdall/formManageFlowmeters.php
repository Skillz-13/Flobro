<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>Manage Flowmeters Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="stylesheet" href="css/formManageFlowmeters.css" type="text/css">
</head>
<body style="background-image: url(images/woodtexture.jpg);">
	<div class="container">
		<!--NAVIGATION BAR PANEL-->
		<div class="panelNavBar">
			<img id="imgLogo" src="images/logoBoston.png">
			<div id="lblCurrentPage"><p><b>Manage Flowmeters</b></p></div>
				<a name="btnHome" id="btnHome" class="btn" href="dashboardAdminHardware.php"><p>Home</p></a>
				<a name="btnManageArduinos" id="btnManageArduinos" class="btn" href="formManageArduinos.php"><p>Manage Arduinos</p></a>
				<a name="btnAssignArduinos" id="btnAssignArduinos" class="btn" href="formAssignArduinos.php"><p>Assign Arduinos</p></a>
				<a id="-" class="btn" href=""><p>-</p></a>
				<a name="btnLogout" id="btnLogout" class="btn" href="logout.php"><p>Log Out</p></a>
		</div>
		<!--HEADER PANEL-->
        <div class="panelHeader">
			<div id="lblWelcomeMessage">
			<p>Hardware Admin Dashboard</p>
			<p>You are logged in as -Name- -Surname-</p>
			</div>
		</div>
		<!--MAIN PANEL-->
		<div class="panelMain">
			<div class="panelMainFlowmeterTable">
				<label name="lblRegisteredArduino" class="col-form-label"><u><h5>Registered Arduinos:</h5></u></label>
				<select name="ddlArduino" id="ddlArduino" class="form-control">
					<option value="IMEI">IMEI</option>
					<option value="IMEI">IMEI</option>
				</select>
				<label name="lblRegisteredFlowmeter" class="col-form-label"><u><h5>Registered Flowmeters:</h5></u></label>
				<table class="tblFlowmeter" name ="tblFlowmeter">
				<tr>
					<td>
						<table id = "tblFlowmeterHeader" class="tblFlowmeter" name = "tblFlowmeterHeader">
							<tr>
								<th>Port #</th>
								<th>Beer Type</th>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<!--CONTENT OF TABLE-->
						<div id="divTableFlowmeterContent" style="width:100%; height:270px; overflow:auto;">
							<table name="tblFlowmeterContent" id = "tblFlowmeterContent" class="tblFlowmeter">
								<tr>
									<td>1</td>
									<td>Beer Type</td>
								</tr>
							</table>  
						</div>
					</td>
				</tr>
				</table>
			</div>
			
			<div class="panelMainFormElements">
			<form>
			<label for="ddlPortNumber" class="col-form-label"><h5>Port Number:</h5></label>
			<select name="ddlPortNumber" id="ddlPortNumber" class="form-control">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
			<label for="ddlBeerType" class="col-form-label"><h5>Beer Type:</h5></label>
			<select name="ddlBeerType" id="ddlBeerType" class="form-control">
				<option value="BeerType">BeerType</option>
				<option value="BeerType">BeerType</option>
				<option value="BeerType">BeerType</option>
				<option value="BeerType">BeerType</option>
			</select>
			</form>
			</div>
			
			<div class="panelMainButtons">
				<button name="btnAddArduino" class="btn btnAdd"><p>Add</p></button>
				<button name="btnRemoveArduino" class="btn btnRemove"><p>Remove</p></button>
			</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>