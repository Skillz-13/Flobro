<<<<<<< HEAD
<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>Client Report Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="stylesheet" href="css/formClientReport.css" type="text/css">
</head>
<!-- Changed File paths here -->
<body style="background-image: url(images/woodtexture.jpg);">
	<div class="container">
		<!--NAVIGATION BAR PANEL-->
		<div class="panelNavBar">
			<img id="imgLogo" src="images/logoBoston.png">
			<div id="lblCurrentPage"><p><b>Client Report</b></p></div>
				<a name="btnHome" id="btnHome" class="btn" href="dashboardSalesRep.php"><p>Home</p></a>
				<a name="btnManageClients" id="btnManageClients" class="btn" href="formManageClients.php"><p>Manage Clients</p></a>
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
			<div class="panelMainClientTable">
				<table class="tblClients" name ="tblClients">
				<tr>
					<td>
						<table id = "tblClientsHeader" class="tblClients" name = "tblClientsHeader">
							<tr>
								<th>Venue Name</th>
								<th>Location</th>
								<th><input type="checkbox" checked="checked" disabled="disabled"></th>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<!--CONTENT OF TABLE-->
						<div id="divTableClientsContent" style="width:100%; height:400px; overflow:auto;">
							<table name="tblClientsContent" id = "tblClientsContent" class="tblClients">
								<!--<tr>
									<td>Venue</td>
									<td>Location</td>
									<td><input type="checkbox" name="" value="true"></td>
								</tr>-->
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
			</div>
			<div class="panelMainFilters">
			<form>
				<label><h3><u>Report Filters:</u></h3></label>
				<label><h5>Venue Name:</h5></label>
				<input type="text" id="txtBoxVenue" name="txtBoxVenue" value="" placeholder="Venue"/>
				<label><h5>Location:</h5></label>
				<input type="text" id="txtBoxLocation" name="txtBoxLocation" value="" placeholder="Location"/>
				<label><h5>Date Range:</h5></label>
				<input name="dateStart" type="date" id="inputMDEx" class="form-control">
				<label><h5>To</h5></label>
				<input name="dateEnd" type="date" class="form-control">
				<a name="btnGenerateClientReport" class="btn btnGenerateClientReport" href="" ><p>Generate Client Report</p></a>
			</form>
			</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
=======
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>Client Report Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="stylesheet" href="css/formClientReport.css" type="text/css">
</head>
<!-- Changed File paths here -->
<body style="background-image: url(images/woodtexture.jpg);">
	<div class="container">
		<!--NAVIGATION BAR PANEL-->
		<div class="panelNavBar">
			<img id="imgLogo" src="images/logoBoston.png">
			<div id="lblCurrentPage"><p><b>Client Report</b></p></div>
				<a name="btnHome" id="btnHome" class="btn" href="dashboardSalesRep.php"><p>Home</p></a>
				<a name="btnManageClients" id="btnManageClients" class="btn" href="formManageClients.php"><p>Manage Clients</p></a>
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
			<div class="panelMainClientTable">
				<table class="tblClients" name ="tblClients">
				<tr>
					<td>
						<table id = "tblClientsHeader" class="tblClients" name = "tblClientsHeader">
							<tr>
								<th>Venue Name</th>
								<th>Location</th>
								<th><input type="checkbox" checked="checked" disabled="disabled"></th>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<!--CONTENT OF TABLE-->
						<div id="divTableClientsContent" style="width:100%; height:400px; overflow:auto;">
							<table name="tblClientsContent" id = "tblClientsContent" class="tblClients">
								<tr>
									<td>Venue</td>
									<td>Location</td>
									<td><input type="checkbox" name="" value="true"></td>
								</tr>
							</table>  
						</div>
					</td>
				</tr>
			</table>
			</div>
			<div class="panelMainFilters">
			<form>
				<label><h3><u>Report Filters:</u></h3></label>
				<label><h5>Venue Name:</h5></label>
				<input type="text" id="txtBoxVenue" name="txtBoxVenue" value="" placeholder="Venue"/>
				<label><h5>Location:</h5></label>
				<input type="text" id="txtBoxLocation" name="txtBoxLocation" value="" placeholder="Location"/>
				<label><h5>Date Range:</h5></label>
				<input name="dateStart" type="date" id="inputMDEx" class="form-control">
				<label><h5>To</h5></label>
				<input name="dateEnd" type="date" class="form-control">
				<a name="btnGenerateClientReport" class="btn btnGenerateClientReport" href="" ><p>Generate Client Report</p></a>
			</form>
			</div>
		</div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
>>>>>>> origin/master
</html>