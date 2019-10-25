<!DOCTYPE html>
<?php
include "GateKeeper.php";
include "search.php";
include "config.php";
// initialize objects
if (!empty($_SESSION['role_id'])) {
    if (((int)$_SESSION['role_id'] == 3 || (int)$_SESSION['role_id'] == 4 || (int)$_SESSION['role_id'] == 1) && (int)$_SESSION['valid'] == 1) {
        //header("Location: {$home_url}dashboardAdminSupport.php");
        //echo '<pre>' . print_r($_SESSION['role_id'], TRUE) . '</pre>';
    } else {
        header("Location: {$home_url}login.php?action=access_denied");
    }

} else {
    header("Location: {$home_url}login.php?action=login_denied");
}
?>
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
        <a name="btnManageClients" id="btnManageClients" class="btn" href="formManageClients.php"><p>Manage Clients</p>
        </a>
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
    <div id="divTableClientsContent" style="width:100%; height:490px; overflow:auto;">

        <table align="center">

            <form method="post" action="report.php">
                <h3><u>Report Metrics:</u></h3>

                    <tr>
                        <td>
                            <label><h5>Location:</h5></label>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <select class="ddlLocation" id="ddlArduino">
                                <?php
                                $user_id = $_SESSION['user_id'];
                                $dbh;

                                try {
                                    $dbh = new PDO("mysql:host=localhost;dbname=bostoczw_Test", "bostoczw_Matt", "TestScript");
                                    $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                                } catch (PDOException $e) {
                                    echo $e->getMessage();
                                }

                                //query the database, loop through the results, and output the rows
                                $query = "SELECT USER_ID, tbl_assignment.COMPANY_ID, tbl_assignment.LOCATION_ID, tbl_company.COMPANY_NAME, 
                                            tbl_location.STREET_NAME, tbl_location.SUBURB, NOTES FROM tbl_assignment 
                                            JOIN tbl_company ON tbl_assignment.COMPANY_ID = tbl_company.COMPANY_ID 
                                            JOIN tbl_location ON tbl_assignment.LOCATION_ID = tbl_location.LOCATION_ID WHERE USER_ID = ?";
                                $stmt = $dbh->prepare($query);
                                $stmt->bindParam(1, $user_id);

                                $stmt->execute();
                                $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);


                                if ($notes !== false) {

                                    echo"<option > Select Location </option>";

                                    foreach ($notes as $row) {

                                        $local = $row['LOCATION_ID'];

                                        echo "<option value= $local >" . $row['COMPANY_NAME'] . " , " . $row['STREET_NAME'] . " , " . $row['SUBURB'] . "</option>";

                                    }

                                } else {
                                    echo 'The SQL query failed with error ' . $dbh->errorCode;
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><h5>Arduino:</h5></label>
                        </td>
                    </tr>
                    <tr>
                        <td id="response">

                        </td>
                    </tr>


                <tr>
                    <td>
                        <label><h5>Date Range:</h5></label>
                        <input name="dateStart" type="date" id="inputMDEx" class="form-control" required="true">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label><h5>To</h5></label>
                        <input name="dateEnd" type="date" class="form-control" required="true">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input name="submit" class="btn btnGenerateClientReport" type="submit"
                               value="Generate Client Report">
                    </td>
                </tr>
            </form>


    </div>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $(document).on('ready', function () {
        $("select.ddlLocation").on('change', function () {
            var selectedLocation = $(".ddlLocation option:selected").val();
            $.ajax({
                type: "POST",
                url: "processReport.php",
                data: {ddlLocation: selectedLocation}
            }).done(function (data) {
                $("#response").html(data);
            });
        });
    });
</script>
</body>
</html>

