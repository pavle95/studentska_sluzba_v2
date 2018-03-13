<?php
require 'connection.php';
$id = $_REQUEST['id'];
mysqli_query($conn,"DELETE FROM student WHERE id = '$id'");
mysqli_query($conn, "DELETE FROM student_subject where student_id ='$id'");
header("location: students.php");