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
    <script src="js/validate/grades.js"></script>
    <script src="js/sb-admin.js"></script>
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
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>

        <!-- Student DataTable-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Student grades</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Index</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Birth date</th>
                            <th>Course</th>
                            <th>Points(Grade)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                         /*
                         *Select and display students and number of points from subjects that logged in professor is teaching.
                         */

                        $pid = $_SESSION['professor_id'];
                        $sql = "select s.*, ss.number_of_points from student s, student_subject ss where ss.number_of_points IS NOT NULL and ss.student_id=s.id and ss.subject_id = (select subject_id from professor where id = '$pid')";
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['index_number'] . "</td>";
                            echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                            echo "<td>" . $row['gender'] . "</td>";
                            echo "<td>" . $row['birthday'] . "</td>";
                            echo "<td>" . $row['course'] . "</td>";
                            $grade;
                            $points = $row['number_of_points'];
                            switch (true){
                                case ($points >= 51 && $points<60):$grade="E";break;
                                case ($points >= 60 && $points<70):$grade="D";break;
                                case ($points >= 70 && $points<80):$grade="C";break;
                                case ($points >= 80 && $points<90):$grade="B";break;
                                case ($points >= 90 && $points<=100):$grade="A";break;
                                default:$grade="F";break;
                            }
                            echo "<td>" . $points . "(" . $grade . ")</td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Professor DataTable -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-plus"></i>Add Points to Students</div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" name="student_subject" onsubmit="return validateSubjectGrade()">
                        <?php

                        /*
                         *If number of points is valid update student_subject table with student id from form.
                         */

                        if($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $student = $_POST['student'];
                            $points = $_POST['points'];
                            $sql = "UPDATE student_subject set number_of_points = '$points' where student_id='$student' and subject_id = (select subject_id from professor where id = '$pid')";
                            if ($conn->query($sql) == true) {
                                echo '<script type="text/javascript"> window.location = "students-subject.php"</script>';
                            }else{
                                $sql;
                            }
                        }
                        ?>
                        <div class="form-group">
                            <label>Student</label>
                            <select class="form-control" name="student" id="student">
                                <?php

                                /*
                                 *  Select students that are enrolled in subject but are not graded yet
                                 */

                                $sql = "select s.* from student s, student_subject ss where ss.student_id = s.id and ss.number_of_points IS NULL and ss.subject_id = (select subject_id from professor where id = '$pid') group by s.id";
                                $result = $conn->query($sql);
                                if($result->num_rows>0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='".$row['id']."'>".$row['first_name']." ".$row['last_name']."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPoints">Points</label>
                            <input class="form-control" id="exampleInputPoints" type="text" name="points" id="points">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
</div>
</body>

</html>