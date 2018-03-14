<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'connection.php';?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Start Bootstrap Template</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
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
?>
<!-- -->
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i>My Subjects</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Professor</th>
                            <th>Semester</th>
                            <th>ECDL credits</th>
                            <th>Description</th>
                            <th>Points(Grade)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sid = $_SESSION['student_id'];
                        $sql = "SELECT s.*, ss.number_of_points, p.first_name, p.last_name FROM subject s, student_subject ss, professor p where p.subject_id = s.id and s.id = ss.subject_id and ss.student_id = '$sid' and s.id in (SELECT subject_id from student_subject where student_id = '$sid') group by s.id";
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                            echo "<td>" . $row['semester'] . "</td>";
                            echo "<td>" . $row['ecdl_credits'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            $grade="";
                            $points = $row['number_of_points'];
                            switch (true){
                                case ($points >= 51 && $points<60):$grade="E";break;
                                case ($points >= 60 && $points<70):$grade="D";break;
                                case ($points >= 70 && $points<80):$grade="C";break;
                                case ($points >= 80 && $points<90):$grade="B";break;
                                case ($points >= 90 && $points<=100):$grade="A";break;
                                default:$grade="F";break;
                            }
                            if($points==0){
                                echo "<td> Not Graded</td>";
                            }else{
                                echo "<td>" . $points . "(" . $grade . ")</td>";
                            }
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Subjects</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Professor</th>
                            <th>Semester</th>
                            <th>ECDL credits</th>
                            <th>Description</th>
                            <th>Enroll</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sid = $_SESSION['student_id'];
                        $sql = "SELECT s.*, p.first_name, p.last_name  FROM subject s, professor p where s.id = p.subject_id and s.id not in (SELECT subject_id from student_subject where student_id = '$sid')";
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                            echo "<td>" . $row['semester'] . "</td>";
                            echo "<td>" . $row['ecdl_credits'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            echo "<td><a href='add-student-subject.php?id=" . $row['id'] . "'>Enroll</a></td>";
                            echo "</tr>";
                        }
                        mysqli_close($conn);
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © Your Website 2018</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
</div>
</body>

</html>
