<?php
require 'connection.php';
$id = $_REQUEST['id'];
mysqli_query($conn,"DELETE FROM subject WHERE id = '$id'");
mysqli_query($conn, "DELETE FROM student_subject where subject_id ='$id'");
header("location: subjects.php");