<?php

// error_reporting(E_ALL);
session_start();

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);

define('BASE_URL', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].':'.$_SERVER['SERVER_PORT'].'/sufi-ppdb/');

$is_login = false;

// $database = [
//   'host' => 'localhost',
//   'username' => 'id20992651_sufi',
//   'password' => 'Cq76uaJ54^Pv',
//   'database' => 'id20992651_appsufi'
// ];

$database = [
  'host' => 'localhost',
  'username' => 'root',
  'password' => '',
  'database' => 'sufi_ppdb',
];

$connection = mysqli_connect($database['host'], $database['username'], $database['password'], $database['database']);
$akun_detail = null;

if (isset($_SESSION['user_email'])) {
    $is_login = true;
    $email = $_SESSION['user_email'];

    // Retrieve user details from the table
    $query = "SELECT * FROM akun WHERE email = '$email'";
    $result = mysqli_query($connection, $query);

    // Check if the query was successful
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the user details
        $akun_detail = mysqli_fetch_assoc($result);
    }
}

// Use the $akun variable as needed
include 'functions.php';
