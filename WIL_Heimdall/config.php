<?php

// Enables showing error reporting
error_reporting(E_ALL);

// Starts php session
session_start();

// Set initial time zone, change to get server timestamp if expands international
date_default_timezone_set('Africa/Johannesburg');

// Home directory location, change this on final site
//changed url should be: $home_url = "http://flowbro.bostonbreweriesglutenfree.co.za/";
$home_url = "http://localhost/Flobro/WIL_Heimdall/";

// Gets the page given and returns in URL parameter, default page is one, best practices implemented
//$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Set number of records per page, but not needed for now, this limits ddos attacks
//$records_per_page = 5;

// Starts calculating for the query LIMIT clause, refer to above comment
//$from_record_num = ($records_per_page * $page) - $records_per_page;
