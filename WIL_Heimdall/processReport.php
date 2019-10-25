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
if(isset($_POST["ddlLocation"])){
    // Capture selected country
    $location_id = $_POST["ddlLocation"];

    $user_id = $_SESSION['user_id'];
    $dbh;

    try {
        $dbh = new PDO("mysql:host=localhost;dbname=bostoczw_Test", "bostoczw_Matt", "TestScript");
        $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $query = "SELECT * FROM `tbl_arduino_location` WHERE VALID = 1 AND LOCATION_ID = ?";

    $stmt = $dbh->prepare( $query );

    $stmt->bindParam(1, $location_id);

    $stmt->execute();
    $adrduinos = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($adrduinos !== false) {

    echo '<select name="ddlArduino"  id="ddlArduino"">';
    echo"<option>Select Arduino</option>";
    foreach ($adrduinos as $row) {

        $IMEI = $row['ARD_IMEI_NUMBER'];

        echo "<option value= $IMEI >" . $row['ARD_IMEI_NUMBER'] . "</option>";

    }

    echo "</select>";
}

}
?>
