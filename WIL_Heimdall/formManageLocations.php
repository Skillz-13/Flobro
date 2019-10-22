<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>Manage Locations Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="stylesheet" href="css/formManageLocations.css" type="text/css">
</head>
<body style="background-image: url(images/woodtexture.jpg);">
	<div class="container">
		<!--NAVIGATION BAR PANEL-->
		<div class="panelNavBar">
			<img id="imgLogo" src="images/logoBoston.png">
			<div id="lblCurrentPage"><p><b>Manage Locations</b></p></div>
				<a name="btnHome" id="btnHome" class="btn" href="dashboardAdminSupport.php"><p>Home</p></a>
				<a name="btnManageUsers" id="btnManageUsers" class="btn" href="formManageUsers.php"><p>Manage Users</p></a>
				<a name = "btnAssignSalesRep" id="btnAssignSalesRep" class="btn" href="formAssignSalesRep.php"><p>Assign Sales Rep</p></a>
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
			<div class="panelMainLocationDisplay">
				<label for="txtBoxLocation" class="col-form-label"><u><h3>Location:</h3></u></label>
				<table class="tblLocation" name ="tblLocation">
				<tr>
					<td>
						<table id = "tblLocationHeader" class="tblLocation" name = "tblLocationHeader">
							<tr>
								<th class="id">ID</th>
								<th class="col1">Province</th>
								<th class="col2">City</th>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<!--CONTENT OF TABLE-->
						<div id="divTableLocationContent" style="width:100%; height:300px; overflow:auto;">
							<table name="tblLocationContent" id = "tblLocationContent" class="tblLocation">
								<tr>
									<td class="id">1</td>
									<td class="col1">Western Cape</td>
									<td class="col2">Cape Town</td>
								</tr>
							</table>  
						</div>
					</td>
				</tr>
			</table>
			</div>
			<div class="panelMainCompanyDisplay">
			<label for="txtBoxCompany" class="col-form-label"><u><h3>Company:</h3></u></label>
			<table class="tblCompany" name ="tblCompany">
				<tr>
					<td>
						<table id = "tblCompanyHeader" class="tblCompany" name = "tblCompanyHeader">
							<tr>
								<th class="id">ID</th>
								<th class="col1">Company Name</th>
								<th class="col2">Suburb</th>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<!--CONTENT OF TABLE-->
						<div id="divTableCompanyContent" style="width:100%; height:300px; overflow:auto;">
							<table name="tblCompanyContent" id = "tblCompanyContent" class="tblCompany">
								<tr>
									<td class="id">1</td>
									<td class="col1">Tiger's Milk</td>
									<td class="col2">Claremont</td>
								</tr>
							</table>  
						</div>
					</td>
				</tr>
			</table>
			</div>
			<!--FORM BUTTONS-->
			<div class="panelMainButtons">
			<button name="btnAddLocation" class="btn btnAdd" data-toggle="modal" data-target="#dialogAddLocation"><p>Add</p></button>
			<button name="btnRemoveLocation" class="btn btnRemove" data-toggle="modal" data-target="#dialogRemoveLocation"><p>Remove</p></button>
			<button name="btnViewEditLocation" class="btn btnUpdate" data-toggle="modal" data-target="#dialogViewUpdateLocation"><p>View Info/Update</p></button>
			</div>
		</div>
	</div>
	
	<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
	<!--MODAL DIALOG BOX FOR ADDING, REMOVING AND UPDATING/VIEWING DETAILED LOCATION AND COMPANY INFO-->
	
	<!--ADD LOCATION DIALOG FORM-->
	<div class="modal fade" id="dialogAddLocation" tabindex="-1" role="dialog" aria-labelledby="lblAddLocation" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="lblAddLocation"><b><u>Add Location</u></b></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<form>
					<div class="form-group">
						<h5><u>Location</u></h5>
						<label for="txtBoxUnitNumber" class="col-form-label">Unit Number:</label>
						<input name="txtBoxUnitNumber" type="text" class="form-control" id="txtBoxUnitNumber">
						<label for="txtBoxStreetNumber" class="col-form-label">Street Number:</label>
						<input name="txtBoxStreetNumber" type="text" class="form-control" id="txtBoxStreetNumber">
						<label for="txtBoxStreetName" class="col-form-label">Street Name:</label>
						<input name="txtBoxStreetName" type="text" class="form-control" id="txtBoxStreetName">
						<label for="txtBoxSuburb" class="col-form-label">Suburb:</label>
						<input name="txtBoxSuburb" type="text" class="form-control" id="txtBoxSuburb">
						<label for="txtBoxCity" class="col-form-label">City:</label>
						<input name="txtBoxCity" type="text" class="form-control" id="txtBoxCity">
						<label for="txtBoxProvince" class="col-form-label">Province:</label>
						<input name="txtBoxProvince" type="text" class="form-control" id="txtBoxProvince">
						<label for="txtBoxLat" class="col-form-label">Latitude:</label>
						<input name="txtBoxLat" type="text" class="form-control" id="txtBoxLat">
						<label for="txtBoxLong" class="col-form-label">Longitude:</label>
						<input name="txtBoxLong" type="text" class="form-control" id="txtBoxLong">
					</div>
					<div class="form-group">
						<h5><u>Company Details</u></h5>
						<label for="txtBoxBusinessRegNumber" class="col-form-label">Business Reg Number:</label>
						<input name="txtBoxBusinessRegNumber" type="text" class="form-control" id="txtBoxBusinessRegNumber">
						<label for="txtBoxCompanyName" class="col-form-label">Company Name:</label>
						<input name="txtBoxCompanyName" type="text" class="form-control" id="txtBoxCompanyName">
						<label for="ddlLocation" class="col-form-label">Location:</label>
						<select name="ddlLocation" id="ddlLocation" class="form-control">
							<option value="Location">Location</option>
							<option value="Location">Location</option>
							<option value="Location">Location</option>
							<option value="Location">Location</option>
						</select>
					</div>
					
				</form>
				</div>
				<div class="modal-footer">
					<button name="btnDismiss" type="button" class="btn-secondary" data-dismiss="modal">Close</button>
					<button name="btnConfirmAdd" type="button" class="btn-primary">Add Client</button>
				</div>
			</div>
		</div>
	</div>
	
	<!--REMOVE LOCATION DIALOG CONFIRM-->
	<div class="modal" tabindex="-1" role="dialog" id="dialogRemoveLocation">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Confirm Location Removal</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Removing a Location cannot be undone.</p>
					<p>Are you sure you would like to remove selected Location?</p>
				</div>
				<div class="modal-footer">
					<button name="btnConfirmRemove" type="button" class="btn-primary">Confirm</button>
					<button name="btnDismiss" type="button" class="btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<!--UPDATE/VIEW LOCATION DETAILS DIALOG FORM-->
	<div class="modal fade" id="dialogViewUpdateLocation" tabindex="-1" role="dialog" aria-labelledby="lblViewUpdateLocation" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="lblViewUpdateClient"><b><u>View/Update Location Info</u></b></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<form>
					<div class="form-group">
						<h5><u>Location</u></h5>
						<label for="txtBoxUnitNumber" class="col-form-label">Unit Number:</label>
						<input name="txtBoxUnitNumber" type="text" class="form-control" id="txtBoxUnitNumber">
						<label for="txtBoxStreetNumber" class="col-form-label">Street Number:</label>
						<input name="txtBoxStreetNumber" type="text" class="form-control" id="txtBoxStreetNumber">
						<label for="txtBoxStreetName" class="col-form-label">Street Name:</label>
						<input name="txtBoxStreetName" type="text" class="form-control" id="txtBoxStreetName">
						<label for="txtBoxSuburb" class="col-form-label">Suburb:</label>
						<input name="txtBoxSuburb" type="text" class="form-control" id="txtBoxSuburb">
						<label for="txtBoxCity" class="col-form-label">City:</label>
						<input name="txtBoxCity" type="text" class="form-control" id="txtBoxCity">
						<label for="txtBoxProvince" class="col-form-label">Province:</label>
						<input name="txtBoxProvince" type="text" class="form-control" id="txtBoxProvince">
						<label for="txtBoxLat" class="col-form-label">Latitude:</label>
						<input name="txtBoxLat" type="text" class="form-control" id="txtBoxLat">
						<label for="txtBoxLong" class="col-form-label">Longitude:</label>
						<input name="txtBoxLong" type="text" class="form-control" id="txtBoxLong">
					</div>
					<div class="form-group">
						<h5><u>Company Details</u></h5>
						<label for="txtBoxBusinessRegNumber" class="col-form-label">Business Reg Number:</label>
						<input name="txtBoxBusinessRegNumber" type="text" class="form-control" id="txtBoxBusinessRegNumber">
						<label for="txtBoxCompanyName" class="col-form-label">Company Name:</label>
						<input name="txtBoxCompanyName" type="text" class="form-control" id="txtBoxCompanyName">
						<label for="ddlLocation" class="col-form-label">Location:</label>
						<select name="ddlLocation" id="ddlLocation" class="form-control">
							<option value="Location">Location</option>
							<option value="Location">Location</option>
							<option value="Location">Location</option>
							<option value="Location">Location</option>
						</select>
					</div>
				</form>
				</div>
				<div class="modal-footer">
					<button name="btnDismiss" type="button" class="btn-secondary" data-dismiss="modal">Close</button>
					<button name="btnConfirmUpdate" type="button" class="btn-primary">Save Changes</button>
				</div>
			</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>