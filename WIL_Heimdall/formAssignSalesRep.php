<?php include "config.php"; ?>
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
				<a name="btnManageUsers" id="btnManageUsers" class="btn" href="formManageUsers.php"><p>Manage Users</p></a>
				<a name="btnReports" id="btnReports" class="btn" href=""><p>Reports</p></a>
				<a name="btnLogout" id="btnLogout" class="btn" href="logout.php"><p>Log Out</p></a>
		</div>
		<!--HEADER PANEL-->
        <div class="panelHeader">
			<div id="lblWelcomeMessage">
			<p>Support Admin Dashboard</p>
                <?php echo "<p>You are logged in as -" .$_SESSION['firstname'] ."- -" .$_SESSION['surname'] ."-</p>" ?>
			</div>
		</div>
		<!--MAIN PANEL-->
		<div class="panelMain">
			<div class="panelMainUserDisplay">
			<form>
				<label for="txtBoxSalesReps" class="col-form-label"><u><h5>Sales Representatives:</h5></u></label>
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
						<div id="divTableUsersContent" style="width:100%; height:360px; overflow:auto;">
							<table name="tblUsersContent" id = "tblUsersContent" class="tblUsers">
                                <?php

                                //$user_id = $_SESSION['user_id'];
                                $dbh;

                                try {
                                    $dbh = new PDO("mysql:host=localhost;dbname=bostoczw_Test", "bostoczw_Matt", "TestScript");
                                    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                                } catch(PDOException $e) {
                                    echo $e->getMessage();
                                }

                                $valid = 1;
                                $sales_rep = 3;
                                $customer = 4;

                                //query the database, loop through the results, and output the rows
                                $query = "SELECT * FROM tbl_user WHERE (VALID = ?) AND (ROLE_ID = ? OR ROLE_ID = ?) ";
                                $stmt = $dbh->prepare( $query );
                                $stmt->bindParam(1, $valid);
                                $stmt->bindParam(2, $sales_rep);
                                $stmt->bindParam(3, $customer);
                                $stmt->execute();
                                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                if ($users !== false) {
                                    foreach ($users as $row){;
                                        /*$current_name =
                                        $current_street =
                                            $current_sub*/
                                        echo "<tr onclick=''>";
                                        echo "<td>";
                                        echo ($row['FIRST_NAME']);
                                        echo "</td>";
                                        echo "<td>";
                                        echo ($row['SURNAME']);
                                        //echo " , ";
                                        //echo ($row['SUBURB']);
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
                                    <?php

                                    $dbh;

                                    try {
                                        $dbh = new PDO("mysql:host=localhost;dbname=bostoczw_Test", "bostoczw_Matt", "TestScript");
                                        $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                                    } catch (PDOException $e) {
                                        echo $e->getMessage();
                                    }

                                    $query = "SELECT tbl_company.COMPANY_ID, tbl_location.LOCATION_ID ,tbl_company.COMPANY_NAME, tbl_location.STREET_NAME, 
                                    tbl_location.SUBURB FROM tbl_location JOIN tbl_company ON tbl_location.COMPANY_ID = tbl_company.COMPANY_ID";
                                    $stmt = $dbh->prepare( $query );
                                    $stmt->execute();
                                    $locations = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    if ($locations !== false) {
                                        foreach ($locations as $row){;
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
                                <?php

                                $dbh;

                                try {
                                $dbh = new PDO("mysql:host=localhost;dbname=bostoczw_Test", "bostoczw_Matt", "TestScript");
                                $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                                } catch(PDOException $e) {
                                echo $e->getMessage();
                                }

                                //query the database, loop through the results, and output the rows
                                $query = "SELECT tbl_assignment.USER_ID, tbl_user.FIRST_NAME, tbl_user.SURNAME, tbl_assignment.COMPANY_ID, tbl_assignment.LOCATION_ID, tbl_company.COMPANY_NAME,
                                tbl_location.STREET_NAME, tbl_location.SUBURB, NOTES FROM tbl_assignment
                                JOIN tbl_company ON tbl_assignment.COMPANY_ID = tbl_company.COMPANY_ID
                                JOIN tbl_location ON tbl_assignment.LOCATION_ID = tbl_location.LOCATION_ID
                                JOIN tbl_user on tbl_assignment.USER_ID = tbl_user.USER_ID";
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
                                    echo "<td>";
                                    echo ($row['FIRST_NAME'] ." ". $row['SURNAME']);
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