<?php
if(isset($_SESSION["username"])) {

    if ($_SESSION["is_admin"] == 1) {
        include "nav.php";
    } elseif ($_SESSION['student_id'] != 0) {
        include "studentnav.php";
    } else {
        include "professornav.php";
    }
}else{
    include "guestnav.php";
}
