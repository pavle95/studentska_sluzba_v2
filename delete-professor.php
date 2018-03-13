<?php
require "connection.php";
$id = $_REQUEST['id'];
mysqli_query($conn,"DELETE FROM professor WHERE id = '$id'");
header("location: professors.php");