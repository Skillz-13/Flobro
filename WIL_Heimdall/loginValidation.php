<?php

//require "pdoDB.php";

$currentUser = null;
$currentPassword = null;



if(!isset($_POST)){
    session_start();
    $currentUser = $_POST['txtBoxUsername'];
    $currentPassword = $_POST['txtBoxPassword'];
    $handle = $link -> prepare('SELECT * FROM TBL_USER WHERE EMAIL= ? AND PASSWORD =?');
    $handle->bindValue(1, $currentUser);
    $handle->bindValue(2,$currentPassword);
    $handle->execute();

    echo ($currentPassword);

    $userRecord = $handle->fetchAll(PDO::FETCH_OBJ);
    /*foreach($result as $row){
        print($row->Username);
    }*/
    if($userRecord != null){
        //session_start();
        $_SESSION["role"] = $userRecord["roleID"];
        if($_SESSION["role"] == 0 ){
            echo "success";
        }

    }

}

/*if($DBConnect != null){

    //echo "connect";
    session_start();


}*/


