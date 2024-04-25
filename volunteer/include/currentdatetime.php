<?php
session_start();

// Set the timezone to Manila
date_default_timezone_set('Asia/Manila');
// Set the content type header to JSON
header('Content-Type: application/json');

// Get the current date and time
$currentDateTime = date("Y-m-d H:i:s");
$_SESSION['login_time'] = $currentDateTime;

// Output the current date and time as JSON
echo json_encode($_SESSION['login_time']);
