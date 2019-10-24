<?php
include "config.php";
include_once "GateKeeper.php";
include_once "Objects/Notes.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>Notes Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Changed File paths here -->
<link rel="stylesheet" href="css/main.css" type="text/css">
    <!-- Changed File paths here -->
<link rel="stylesheet" href="css/formNotes.css" type="text/css">

    <?php
    //login restriction method and code
        if (!empty($_SESSION['role_id'])) {
            if (((int)$_SESSION['role_id'] == 3 || (int)$_SESSION['role_id'] == 4 || (int)$_SESSION['role_id'] == 1 ) && (int)$_SESSION['valid'] == 1 ) {
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
<!-- Changed File paths here -->
<body style="background-image: url(images/woodtexture.jpg);">
	<div class="container">
		<!--NAVIGATION BAR PANEL-->
		<div class="panelNavBar">
			<img id="imgLogo" src="images/logoBoston.png">
			<div id="lblCurrentPage"><p><b>Notes</b></p></div>
				<a name="btnHome" id="btnHome" class="btn" href="dashboardSalesRep.php"><p>Home</p></a>
				<a name="btnManageClients" id="btnManageClients" class="btn" href="formManageClients.php"><p>Manage Clients</p></a>
				<a name="btnClientReport" id="btnClientReport" class="btn" href="formClientReport.php"><p>Client Reports</p></a>
				<a name="btnSalesReport" id="btnSalesReports" class="btn" href="formSalesReport.php"><p>Sales Reports</p></a>
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

                                <?php

                                $user_id = $_SESSION['user_id'];
                                $dbh;

                                        try {
                                            $dbh = new PDO("mysql:host=localhost;dbname=bostoczw_Test", "root", "");
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

                               foreach ($notes as $row){
                                   $current_id =  $row['LOCATION_ID'];
                                   /*$current_name =
                                   $current_street =
                                       $current_sub*/
                                   echo '<tr id= "$current_id">';
                                   echo "<td>";
                                   echo ($row['COMPANY_NAME']);
                                   echo "</td>";
                                   echo "<td>";
                                   echo ($row['STREET_NAME']);
                                   echo " , ";
                                   echo ($row['SUBURB']);
                                   echo "</td>";
                                   echo "</tr>";
                               }}
                               else {
    echo 'The SQL query failed with error '.$dbh->errorCode;
}



                                ?>








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
								<textarea id="note_area"  onkeyup="char_count(this.value)"> rows="6">Once a Location value is selected, the note description will be displayed here
								</textarea>
                                    <span id=count></span>
                                    <script>
                                        function char_count(str) {
                                            var lng = str.length;
                                            document.getElementById("count").innerHTML = lng + ' out of 255 characters';
                                        }
                                    </script>
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