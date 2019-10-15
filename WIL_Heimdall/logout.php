<?php

// Includes config page for global settings configuration
include_once "config.php";

// Destroys session to sanitize the records and ensure security is kept
session_destroy();

//Redirects user back to login page, change this to landing page when created
header("Location: {$home_url}login.php");
