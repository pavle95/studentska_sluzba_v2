<?php
require "connection.php";
$id = $_REQUEST['id'];
mysqli_query($conn,"DELETE FROM users WHERE id = '$id'");

header("location: users.php");
