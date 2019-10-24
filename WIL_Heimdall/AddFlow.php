<?php
include "config.php";
include "Objects/FlowReading.php";
include "libs/Utils.php";
include_once "GateKeeper.php";
?>

<!DOCTYPE html>
<html lang ="en">
<head>
</head>
<body>
<?php
if(isset($_GET['imei'])) {

    //session_start();

    //port limit security
    $port_limit = 4;

    $GateKeeper = new GateKeeper();
    $dbKey = $GateKeeper->getConnection();

    $utils = new Utils();

    $currentReading = new FlowReading($dbKey);

    $currentReading->ARD_IMEI_NUMBER = $_GET['imei'];

    $ard_exists = $currentReading->arduino_exists();

    if ($ard_exists && $currentReading->valid == 1) {

        /*$_SESSION['date'] = $currentReading->date_time;
        $_SESSION['IMEI'] = $_GET['imei'];
        $_SESSION['port_number'] = $_GET['port_number'];
        $_SESSION['volume'] = $_GET['volume'];
        $_SESSION['temperature'] = 12;*/

        echo "found IMEI";

        if($_GET['port_number'] <= $port_limit) {
            $currentReading->LOG_DATE = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
            $currentReading->ARD_IMEI_NUMBER = $_GET['imei'];
            $currentReading->PORT_NUMBER = $_GET['port_number'];
            $currentReading->VOLUME = $_GET['volume'];
            $currentReading->TEMPERATURE = 12;
            //$currentReading->LOG_ENTRY = null;
        }

        echo ($_SERVER['REQUEST_TIME']);

        echo "<pre>";
        echo "</br>";
        //echo ($currentReading->LOG_ENTRY);
        echo "</br>";
        echo "</br>";
        echo ($currentReading->LOG_DATE);
        echo "</br>";
        echo ($currentReading->ARD_IMEI_NUMBER);
        echo "</br>";
        echo ($currentReading->PORT_NUMBER);
        echo "</br>";
        echo ($currentReading->VOLUME);
        echo "</br>";
        echo ($currentReading->TEMPERATURE);
        echo "</pre>";

        if($currentReading->create()){

            $_GET = array();

        }

    }
}
//$_SESSION['exists'] = true;

/*if(isset($_GET['tapID']))
{

    $sqlInsert = "INSERT INTO Test VALUES (CAST('".date("Y-m-d H:i:s")."' AS DATETIME),".$_GET['tapID'].",".$_GET['amount'].")";
    $insertResult = $DBConnect->query($sqlInsert);
    if($insertResult){
        echo"Insert Sucessful";
        echo "Jay is jesus";

    }
    else{

        echo"Oopsie No insert";
        echo $sqlInsert;
    }


}
else{
    echo"Get is not set";
}*/
?>
</body>
</html>

