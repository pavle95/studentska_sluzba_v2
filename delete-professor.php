<?php

/*
 * Deletes selected professor and relevant user data
 */

require "connection.php";
$id = $_REQUEST['id'];
mysqli_query($conn,"DELETE FROM professor WHERE id = '$id'");
mysqli_query($conn,"DELETE FROM users WHERE professor_id = '$id'");
header("location: professors.php");