<<<<<<< HEAD
<!DOCTYPE html>
<?php
    include "GateKeeper.php";
    include "search.php";
    include "config.php";
    // initialize objects
    ?>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>Manage Clients Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="stylesheet" href="css/formManageClients.css" type="text/css">
    <?php
    //login restriction method and code
    if (!empty($_SESSION['role_id'])) {
        if (((int)$_SESSION['role_id'] == 3 || (int)$_SESSION['role_id'] == 1 ) && (int)$_SESSION['valid'] == 1 ) {
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
			<div id="lblCurrentPage"><p><b>Manage Clients</b></p></div>
				<a name="btnHome" id="btnHome" class="btn" href="dashboardSalesRep.php"><p>Home</p></a>
				<a name="btnClientReport" id="btnClientReport" class="btn" href="formClientReport.php"><p>Client Reports</p></a>
				<a name="btnSalesReports" id="btnSalesReports" class="btn" href="formSalesReport.php"><p>Sales Reports</p></a>
				<a name="btnNotes" id="btnNotes" class="btn" href="formNotes.php"><p>Notes</p></a>
				<a name="btnLogout" id="btnLogout" class="btn" href="logout.php"><p>Log Out</p></a>
		</div>
		<!--HEADER PANEL-->
        <div class="panelHeader">
			<div id="lblWelcomeMessage">
			<p>Sales Representative Dashboard</p>
			<?php echo "<p>You are logged in as -" .$_SESSION['firstname'] ."- -" .$_SESSION['surname'] ."-</p>" ?>
			</div>
		</div>
		<!--MAIN PANEL-->
		<div class="panelMain">
			<input type="text" id="txtBoxSearch" name="txtBoxSearch" value="" placeholder="Search">
			<table class="tblClients" name ="tblClients">
				<tr>
					<td>
						<table id = "tblClientsHeader" class="tblClients" name = "tblClientsHeader">
							<tr>
								<th>Venue Name</th>
								<th>Suburb</th>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<!--CONTENT OF TABLE-->
						<div id="divTableClientsContent" style="width:100%; height:300px; overflow:auto;">
							<table name="tblClientsContent" id = "tblClientsContent" class="tblClients">
                                <?php
                                $user_id = $_SESSION['user_id'];
                                $dbh;

                                try {
                                    $dbh = new PDO("mysql:host=localhost;dbname=bostoczw_Test", "bostoczw_Matt", "TestScript");
                                    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                                } catch(PDOException $e) {
                                    echo $e->getMessage();
                                }

                                //query the database, loop through the results, and output the rows
                                $query = "SELECT USER_ID, tbl_assignment.COMPANY_ID, tbl_assignment.LOCATION_ID, tbl_company.COMPANY_NAME, 
                                            tbl_location.STREET_NAME, tbl_location.SUBURB, NOTES FROM tbl_assignment 
                                            JOIN tbl_company ON tbl_assignment.COMPANY_ID = tbl_company.COMPANY_ID 
                                            JOIN tbl_location ON tbl_assignment.LOCATION_ID = tbl_location.LOCATION_ID WHERE USER_ID = ?";
                                $stmt = $dbh->prepare( $query );
                                $stmt->bindParam(1, $user_id);

                                $stmt->execute();
                                $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                if ($notes !== false) {

                                    foreach ($notes as $row){;
                                        /*$current_name =
                                        $current_street =
                                            $current_sub*/
                                        echo "<tr onclick=''>";
                                        echo "<td>";
                                        echo ($row['COMPANY_NAME']);
                                        echo "</td>";
                                        echo "<td>";
                                        echo ($row['STREET_NAME']);
                                        echo " , ";
                                        echo ($row['SUBURB']);
                                        echo "</td>";
                                        echo "</tr>";
                                    }


                                }else {
                                    echo 'The SQL query failed with error '.$dbh->errorCode;}
                                ?>
							</table>  
						</div>
					</td>
				</tr>
			</table>
			<!--FORM BUTTONS-->
			<button name="btnAddClient" class="btn btnAdd" data-toggle="modal" data-target="#dialogAddClient"><p>Add</p></button>
			<button name="btnRemoveClient" class="btn btnRemove" data-toggle="modal" data-target="#dialogRemoveClient"><p>Remove</p></button>
			<button name="btnViewEditInfo" class="btn btnUpdate" data-toggle="modal" data-target="#dialogViewUpdateClient"><p>View Info/Update</p></button>
		</div>
	</div>
	
	<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
	<!--MODAL DIALOG BOX FOR ADDING, REMOVING AND UPDATING/VIEWING DETAILED CLIENT INFO-->
	
	<!--ADD CLIENT DIALOG FORM-->
	<div class="modal fade" id="dialogAddClient" tabindex="-1" role="dialog" aria-labelledby="lblAddClient" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="lblAddClient"><b><u>Add Client</u></b></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<form>
					<div class="form-group">
						<h5><u>Client Details</u></h5>
						<label for="txtBoxVenueName" class="col-form-label">Venue Name:</label>
						<input name="txtBoxVenueName" type="text" class="form-control" id="txtBoxVenueName">
						<label for="txtBoxEmailAddress" class="col-form-label">Email Address:</label>
						<input name="txtBoxEmailAddress" type="email" class="form-control" id="txtBoxEmailAddress">
						<label for="txtBoxContactNumber" class="col-form-label">Contact Number:</label>
						<input name="txtBoxContactNumber" type="tel" class="form-control" id="txtBoxContactNumber" pattern="[0-9]{10}">
						<label for="txtBoxVatNumber" class="col-form-label">VAT Number:</label>
						<input name="txtBoxVatNumber" type="text" class="form-control" id="txtBoxVatNumber">
					</div>
					<div class="form-group">
						<h5><u>Venue Location</u></h5>
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
	
	<!--REMOVE CLIENT DIALOG CONFIRM-->
	<div class="modal" tabindex="-1" role="dialog" id="dialogRemoveClient">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Confirm Client Removal</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Removing a client cannot be undone.</p>
					<p>Are you sure you would like to remove selected client?</p>
				</div>
				<div class="modal-footer">
					<button name="btnConfirmRemove" type="button" class="btn-primary">Confirm</button>
					<button name="btnDismiss" type="button" class="btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<!--UPDATE/VIEW CLIENT DETAILS DIALOG FORM-->
	<div class="modal fade" id="dialogViewUpdateClient" tabindex="-1" role="dialog" aria-labelledby="lblViewUpdateClient" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="lblViewUpdateClient"><b><u>View/Update Client Info</u></b></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<form>
					<div class="form-group">
						<h5><u>Client Details</u></h5>
						<label for="txtBoxVenueName" class="col-form-label">Venue Name:</label>
						<input name="txtBoxVenueName" type="text" class="form-control" id="txtBoxVenueName" value="">
						<label for="txtBoxEmailAddress" class="col-form-label">Email Address:</label>
						<input name="txtBoxEmailAddress" type="email" class="form-control" id="txtBoxEmailAddress" value="">
						<label for="txtBoxContactNumber" class="col-form-label">Contact Number:</label>
						<input name="txtBoxContactNumber" type="tel" class="form-control" id="txtBoxContactNumber" pattern="[0-9]{10}" value="">
						<label for="txtBoxVatNumber" class="col-form-label">VAT Number:</label>
						<input name="txtBoxVatNumber" type="text" class="form-control" id="txtBoxVatNumber" value="">
					</div>
					<div class="form-group">
						<h5><u>Venue Location</u></h5>
						<label for="txtBoxStreetNumber" class="col-form-label">Street Number:</label>
						<input name="txtBoxStreetNumber" type="text" class="form-control" id="txtBoxStreetNumber" value="">
						<label for="txtBoxStreetName" class="col-form-label">Street Name:</label>
						<input name="txtBoxStreetName" type="text" class="form-control" id="txtBoxStreetName" value="">
						<label for="txtBoxSuburb" class="col-form-label">Suburb:</label>
						<input name="txtBoxSuburb" type="text" class="form-control" id="txtBoxSuburb" value="">
						<label for="txtBoxCity" class="col-form-label">City:</label>
						<input name="txtBoxCity" type="text" class="form-control" id="txtBoxCity" value="">
						<label for="txtBoxProvince" class="col-form-label">Province:</label>
						<input name="txtBoxProvince" type="text" class="form-control" id="txtBoxProvince" value="">
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
=======
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
<title>Manage Clients Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="stylesheet" href="css/formManageClients.css" type="text/css">
</head>
<body style="background-image: url(images/woodtexture.jpg);">
	<div class="container">
		<!--NAVIGATION BAR PANEL-->
		<div class="panelNavBar">
			<img id="imgLogo" src="images/logoBoston.png">
			<div id="lblCurrentPage"><p><b>Manage Clients</b></p></div>
				<a name="btnHome" id="btnHome" class="btn" href="dashboardSalesRep.php"><p>Home</p></a>
				<a name="btnClientReport" id="btnClientReport" class="btn" href="formClientReport.php"><p>Client Reports</p></a>
				<a name="btnSalesReports" id="btnSalesReports" class="btn" href="formSalesReport.php"><p>Sales Reports</p></a>
				<a name="btnNotes" id="btnNotes" class="btn" href="formNotes.php"><p>Notes</p></a>
				<a name="btnLogout" id="btnLogout" class="btn" href="logout.php"><p>Log Out</p></a>
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
			<input type="text" id="txtBoxSearch" name="txtBoxSearch" value="" placeholder="Search">
			<table class="tblClients" name ="tblClients">
				<tr>
					<td>
						<table id = "tblClientsHeader" class="tblClients" name = "tblClientsHeader">
							<tr>
								<th>Venue Name</th>
								<th>Suburb</th>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<!--CONTENT OF TABLE-->
						<div id="divTableClientsContent" style="width:100%; height:300px; overflow:auto;">
							<table name="tblClientsContent" id = "tblClientsContent" class="tblClients">
								<tr>
									<td>Tiger's Milk</td>
									<td>Claremont</td>
								</tr>
								<tr>
									<td>Slug and Lettuce</td>
									<td>Newlands</td>
								</tr>
								<tr>
									<td>Oroboros</td>
									<td>Muizenberg</td>
								</tr>
								<tr>
									<td>Tiger's Milk</td>
									<td>Claremont</td>
								</tr>
								<tr>
									<td>Slug and Lettuce</td>
									<td>Newlands</td>
								</tr>
								<tr>
									<td>Oroboros</td>
									<td>Muizenberg</td>
								</tr>
								<tr>
									<td>Tiger's Milk</td>
									<td>Claremont</td>
								</tr>
								<tr>
									<td>Slug and Lettuce</td>
									<td>Newlands</td>
								</tr>
								<tr>
									<td>Oroboros</td>
									<td>Muizenberg</td>
								</tr>
								<tr>
									<td>Tiger's Milk</td>
									<td>Claremont</td>
								</tr>
								<tr>
									<td>Slug and Lettuce</td>
									<td>Newlands</td>
								</tr>
								<tr>
									<td>Oroboros</td>
									<td>Muizenberg</td>
								</tr>
								<tr>
									<td>Tiger's Milk</td>
									<td>Claremont</td>
								</tr>
								<tr>
									<td>Slug and Lettuce</td>
									<td>Newlands</td>
								</tr>
								<tr>
									<td>Oroboros</td>
									<td>Muizenberg</td>
								</tr>
							</table>  
						</div>
					</td>
				</tr>
			</table>
			<!--FORM BUTTONS-->
			<button name="btnAddClient" class="btn btnAdd" data-toggle="modal" data-target="#dialogAddClient"><p>Add</p></button>
			<button name="btnRemoveClient" class="btn btnRemove" data-toggle="modal" data-target="#dialogRemoveClient"><p>Remove</p></button>
			<button name="btnViewEditInfo" class="btn btnUpdate" data-toggle="modal" data-target="#dialogViewUpdateClient"><p>View Info/Update</p></button>
		</div>
	</div>
	
	<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
	<!--MODAL DIALOG BOX FOR ADDING, REMOVING AND UPDATING/VIEWING DETAILED CLIENT INFO-->
	
	<!--ADD CLIENT DIALOG FORM-->
	<div class="modal fade" id="dialogAddClient" tabindex="-1" role="dialog" aria-labelledby="lblAddClient" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="lblAddClient"><b><u>Add Client</u></b></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<form>
					<div class="form-group">
						<h5><u>Client Details</u></h5>
						<label for="txtBoxVenueName" class="col-form-label">Venue Name:</label>
						<input name="txtBoxVenueName" type="text" class="form-control" id="txtBoxVenueName">
						<label for="txtBoxEmailAddress" class="col-form-label">Email Address:</label>
						<input name="txtBoxEmailAddress" type="email" class="form-control" id="txtBoxEmailAddress">
						<label for="txtBoxContactNumber" class="col-form-label">Contact Number:</label>
						<input name="txtBoxContactNumber" type="tel" class="form-control" id="txtBoxContactNumber" pattern="[0-9]{10}">
						<label for="txtBoxVatNumber" class="col-form-label">VAT Number:</label>
						<input name="txtBoxVatNumber" type="text" class="form-control" id="txtBoxVatNumber">
					</div>
					<div class="form-group">
						<h5><u>Venue Location</u></h5>
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
	
	<!--REMOVE CLIENT DIALOG CONFIRM-->
	<div class="modal" tabindex="-1" role="dialog" id="dialogRemoveClient">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Confirm Client Removal</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Removing a client cannot be undone.</p>
					<p>Are you sure you would like to remove selected client?</p>
				</div>
				<div class="modal-footer">
					<button name="btnConfirmRemove" type="button" class="btn-primary">Confirm</button>
					<button name="btnDismiss" type="button" class="btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<!--UPDATE/VIEW CLIENT DETAILS DIALOG FORM-->
	<div class="modal fade" id="dialogViewUpdateClient" tabindex="-1" role="dialog" aria-labelledby="lblViewUpdateClient" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="lblViewUpdateClient"><b><u>View/Update Client Info</u></b></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<form>
					<div class="form-group">
						<h5><u>Client Details</u></h5>
						<label for="txtBoxVenueName" class="col-form-label">Venue Name:</label>
						<input name="txtBoxVenueName" type="text" class="form-control" id="txtBoxVenueName" value="">
						<label for="txtBoxEmailAddress" class="col-form-label">Email Address:</label>
						<input name="txtBoxEmailAddress" type="email" class="form-control" id="txtBoxEmailAddress" value="">
						<label for="txtBoxContactNumber" class="col-form-label">Contact Number:</label>
						<input name="txtBoxContactNumber" type="tel" class="form-control" id="txtBoxContactNumber" pattern="[0-9]{10}" value="">
						<label for="txtBoxVatNumber" class="col-form-label">VAT Number:</label>
						<input name="txtBoxVatNumber" type="text" class="form-control" id="txtBoxVatNumber" value="">
					</div>
					<div class="form-group">
						<h5><u>Venue Location</u></h5>
						<label for="txtBoxStreetNumber" class="col-form-label">Street Number:</label>
						<input name="txtBoxStreetNumber" type="text" class="form-control" id="txtBoxStreetNumber" value="">
						<label for="txtBoxStreetName" class="col-form-label">Street Name:</label>
						<input name="txtBoxStreetName" type="text" class="form-control" id="txtBoxStreetName" value="">
						<label for="txtBoxSuburb" class="col-form-label">Suburb:</label>
						<input name="txtBoxSuburb" type="text" class="form-control" id="txtBoxSuburb" value="">
						<label for="txtBoxCity" class="col-form-label">City:</label>
						<input name="txtBoxCity" type="text" class="form-control" id="txtBoxCity" value="">
						<label for="txtBoxProvince" class="col-form-label">Province:</label>
						<input name="txtBoxProvince" type="text" class="form-control" id="txtBoxProvince" value="">
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
>>>>>>> origin/master
</html>