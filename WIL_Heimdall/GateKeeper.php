<?php

$location ="localhost";
$user = "root";
$password = "";
$database = "test";

$DBConnect = NULL;
$ErrorMsgs = array();
$DBConnect = @new mysqli($location,$user,$password,$database);
if($DBConnect->connect_error){
    $ErrorMsgs[] = "The database server is not available" ;
    echo "Error in communcation ". $DBConnect->connect_error;
}
else{
    echo"Connection Made";
};

