<?php

/** Logs out the logged in user and redirect to index.php*/
session_start();
session_destroy();
header("location:index.php");

?>