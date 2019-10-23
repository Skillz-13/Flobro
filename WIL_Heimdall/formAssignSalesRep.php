<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>Assign Sales Representative Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="stylesheet" href="css/formAssignSalesRep.css" type="text/css">
</head>
<body style="background-image: url(images/woodtexture.jpg);">
	<div class="container">
		<!--NAVIGATION BAR PANEL-->
		<div class="panelNavBar">
			<img id="imgLogo" src="images/logoBoston.png">
			<div id="lblCurrentPage"><p><b>Assign Sales Rep</b></p></div>
				<a name="btnHome" id="btnHome" class="btn" href="dashboardAdminSupport.php"><p>Home</p></a>
				<a name="btnManageLocations" id="btnManageLocations" class="btn" href="formManageLocations.php"><p>Manage Locations</p></a>
				<a name="btnManageCompanies" id="btnManageCompanies" class="btn" href="formManageCompanies.php"><p>Manage Companies</p></a>
				<a name="btnManageUsers" id="btnManageUsers" class="btn" href="adminManageUsers.php"><p>Manage Users</p></a>
				<a name="btnReports" id="btnReports" class="btn" href=""><p>Reports</p></a>
				<a name="btnLogout" id="btnLogout" class="btn" href="logout.php"><p>Log Out</p></a>
		</div>
		<!--HEADER PANEL-->
        <div class="panelHeader">
			<div id="lblWelcomeMessage">
			<p>Support Admin Dashboard</p>
			<p>You are logged in as -Name- -Surname-</p>
			</div>
		</div>
		<!--MAIN PANEL-->
		<div class="panelMain">
			<div class="panelMainUserDisplay">
			<form>
				<label for="txtBoxSalesReps" class="col-form-label"><u><h5>Users:</h5></u></label>
				<select name="ddlUserType" id="ddlUserType" class="form-control">
					<option value="Sales Representatives">Sales Representative</option>
					<option value="Bar Manager">Bar Manager</option>
				</select>
				<table class="tblUsers" name ="tblUsers">
				<tr>
					<td>
						<table id = "tblUsersHeader" class="tblUsers" name = "tblUsersHeader">
							<tr>
								<th>Name</th>
								<th>Surname</th>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<!--CONTENT OF TABLE-->
						<div id="divTableUsersContent" style="width:100%; height:340px; overflow:auto;">
							<table name="tblUsersContent" id = "tblUsersContent" class="tblUsers">
								<tr>
									<td>Name</td>
									<td>Surname</td>
								</tr>
							</table>  
						</div>
					</td>
				</tr>
			</table>
			</form>
			</div>
			
			<div class="panelMainLocationDisplay">
			<form>
			<label for="txtBoxLocation" class="col-form-label"><u><h5>All Locations:</h5></u></label>
			<table class="tblLocation" name ="tblLocation">
				<tr>
					<td>
						<table id = "tblLocationHeader" class="tblLocation" name = "tblLocationHeader">
							<tr>
								<th>Company Name</th>
								<th>Suburb</th>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<!--CONTENT OF TABLE-->
						<div id="divTableLocationContent" style="width:100%; height:100px; overflow:auto;">
							<table name="tblLocationContent" id = "tblLocationContent" class="tblLocation">
								<tr>
									<td>Tiger's Milk</td>
									<td>Claremont</td>
								</tr>
							</table>  
						</div>
					</td>
				</tr>
			</table>
			</form>
			<button name="btnAddLocation" class="btn btnAdd"><p>Add</p></button>
			</div>
			
			<div class="panelMainAssLocationDisplay">
			<form>
			<label for="txtBoxAssLocation" class="col-form-label"><u><h5>Assigned Locations:</h5></u></label>
			<table class="tblAssLocation" name ="tblAssLocation">
				<tr>
					<td>
						<table id = "tblAssLocationHeader" class="tblAssLocation" name = "tblAssLocationHeader">
							<tr>
								<th>Company Name</th>
								<th>Suburb</th>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<!--CONTENT OF TABLE-->
						<div id="divTableAssLocationContent" style="width:100%; height:60px; overflow:auto;">
							<table name="tblAssLocationContent" id = "tblAssLocationContent" class="tblAssLocation">
								<tr>
									
								
								</tr>
							</table>  
						</div>
					</td>
				</tr>
			</table>
			</form>
			<button name="btnRemoveLocation" class="btn btnRemove"><p>Remove</p></button>
			</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>