<?php
session_start();
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "student_service";

/** Create a connection*/
$conn = mysqli_connect($servername, $username, $password, $dbname);
/** Check the connection*/
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}