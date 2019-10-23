<!DOCTYPE html>
<?php
    include "GateKeeper.php";
    include "search.php";


    // initialize objects

    ?>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>Manage Users Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="stylesheet" href="css/formManageUsers.css" type="text/css">
</head>
<body style="background-image: url(images/woodtexture.jpg);">
	<div class="container">
		<!--NAVIGATION BAR PANEL-->
		<div class="panelNavBar">
			<img id="imgLogo" src="images/logoBoston.png">
			<div id="lblCurrentPage"><p><b>Manage Users</b></p></div>
				<a name="btnHome" id="btnHome" class="btn" href="dashboardSupportAdmin.php"><p>Home</p></a>
                <a name="btnManageUsers" id="btnManageUsers" class="btn" href="formManageLocations.php"><p>Manage Locations</p></a>
                <a name="btnAssignSalesRep" id="btnAssignSalesRep" class="btn" href="formAssignSalesRep.php"><p>Assign Sales Rep</p></a>
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
		<div class="panelMainUserTable">
		<form>
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
								<th>Contact Number</th>
								<th>Email</th>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <!--CONTENT OF TABLE-->
                        <div id="divTableUsersContent" style="width:100%; height:300px; overflow:auto;">
                            <table name="tblUsersContent" id = "tblUsersContent" class="tblUsers">
                                <tr>
                                    <td>Name</td>
                                    <td>Surname</td>
									<td>Contact Number</td>
									<td>Email</td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
			</table>
		</form>
		</div>
			<!--FORM BUTTONS-->
			<div class="panelMainButtons">
			<button name="btnAddUser" class="btn btnAdd" data-toggle="modal" data-target="#dialogAddUser"><p>Add</p></button>
			<button name="btnRemoveUser" class="btn btnRemove" data-toggle="modal" data-target="#dialogRemoveUser"><p>Remove</p></button>
			<button name="btnViewEditInfo" class="btn btnUpdate" data-toggle="modal" data-target="#dialogViewUpdateUser"><p>View Info/Update</p></button>
			</div>
		</div>
	</div>
	
	<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
	<!--MODAL DIALOG BOX FOR ADDING, REMOVING AND UPDATING/VIEWING DETAILED USER INFO-->
	
	<!--ADD USER DIALOG FORM-->
	<div class="modal fade" id="dialogAddUser" tabindex="-1" role="dialog" aria-labelledby="lblAddUser" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="lblAddUser"><b><u>Add User</u></b></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<form>
					<div class="form-group">
						<h5><u>Add new User</u></h5>
						<label for="txtBoxName" class="col-form-label">Name:</label>
						<input name="txtBoxName" type="text" class="form-control" id="txtBoxVenueName">
						<label for="txtBoxSurname" class="col-form-label">Surname:</label>
						<input name="txtBoxSurname" type="text" class="form-control" id="txtBoxEmailAddress">
						<label for="txtBoxContactNumber" class="col-form-label">Contact Number:</label>
						<input name="txtBoxContactNumber" type="tel" class="form-control" id="txtBoxContactNumber" pattern="[0-9]{10}">
						<label for="txtBoxEmail" class="col-form-label">Email:</label>
						<input name="txtBoxVatNumber" type="email" class="form-control" id="txtBoxVatNumber">
						<label for="ddlRole" class="col-form-label">Role:</label>
						<select name="ddlUserType" id="ddlUserType" class="form-control">
							<option value="Sales Representatives">Sales Representative</option>
							<option value="Bar Manager">Bar Manager</option>
						</select>
						<label for="txtBoxPassword" class="col-form-label">Password:</label>
						<input name="txtBoxPassword" type="password" class="form-control" id="txtBoxVenueName">
						<label for="txtBoxConfirmPassword" class="col-form-label">Re-enter Password:</label>
						<input name="txtBoxConfirmPassword" type="password" class="form-control" id="txtBoxVenueName">
					</div>
					
				</form>
				</div>
				<div class="modal-footer">
					<button name="btnDismiss" type="button" class="btn-secondary" data-dismiss="modal">Close</button>
					<button name="btnConfirmAdd" type="button" class="btn-primary">Add User</button>
				</div>
			</div>
		</div>
	</div>
	
	<!--REMOVE USER DIALOG CONFIRM-->
	<div class="modal" tabindex="-1" role="dialog" id="dialogRemoveUser">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Confirm User Removal</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Removing a user cannot be undone.</p>
					<p>Are you sure you would like to remove selected user?</p>
				</div>
				<div class="modal-footer">
					<button name="btnConfirmRemove" type="button" class="btn-primary">Confirm</button>
					<button name="btnDismiss" type="button" class="btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<!--UPDATE/VIEW USER DETAILS DIALOG FORM-->
	<div class="modal fade" id="dialogViewUpdateUser" tabindex="-1" role="dialog" aria-labelledby="lblViewUpdateUser" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="lblViewUpdateUser"><b><u>View/Update User Info</u></b></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<form>
					<div class="form-group">
						<h5><u>View/Update User Info</u></h5>
						<label for="txtBoxName" class="col-form-label">Name:</label>
						<input name="txtBoxName" type="text" class="form-control" id="txtBoxVenueName">
						<label for="txtBoxSurname" class="col-form-label">Surname:</label>
						<input name="txtBoxSurname" type="text" class="form-control" id="txtBoxEmailAddress">
						<label for="txtBoxContactNumber" class="col-form-label">Contact Number:</label>
						<input name="txtBoxContactNumber" type="tel" class="form-control" id="txtBoxContactNumber" pattern="[0-9]{10}">
						<label for="txtBoxEmail" class="col-form-label">Email:</label>
						<input name="txtBoxVatNumber" type="email" class="form-control" id="txtBoxVatNumber">
						<label for="ddlRole" class="col-form-label">Role:</label>
							<select name="ddlUserType" id="ddlUserType" class="form-control">
						<option value="Sales Representatives">Sales Rep</option>
						<option value="Bar Manager">Bar Manager</option>
							</select>
						<label for="txtBoxPassword" class="col-form-label">Password:</label>
						<input name="txtBoxPassword" type="password" class="form-control" id="txtBoxVenueName">
						<label for="txtBoxConfirmPassword" class="col-form-label">Re-enter Password:</label>
						<input name="txtBoxConfirmPassword" type="password" class="form-control" id="txtBoxVenueName">
				
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