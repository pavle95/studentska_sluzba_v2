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
    <script src="js/validate/student.js"></script>
    <script src="js/sb-admin.js"></script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation based on permission-->
<?php include "nav.php"; ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <!-- Icon Cards-->

        <!-- Add student form-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-user-plus"></i>Add Student</div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" name="add_student" onsubmit="return validateAddStudent()">
                        <?php

                        /*
                         *Gets the form data and checks to see if the given index-number matches an existing one in the database
                         * and if it doesn't it proceeds with adding the user to the database, otherwise it
                         * will give a warning that index number is already assigned to another student
                         */

                        if($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $firstname = $_POST['firstname'];
                            $lastname = $_POST['lastname'];
                            $gender = $_POST['gender'];
                            $index = $_POST['index'];
                            $birt_date = $_POST['birth_date'];
                            $course = $_POST['course'];
                            $sql = "Select * from student where index_number='$index'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<p style='color:red; text-align:center; font-weight:bold;'>Students can't have the same index</p>";
                                return;
                            }

                            /*
                             *Gets the form data and checks to see if the given email address matches an existing one in the database
                             * and if it doesn't it proceeds with adding the user to the database, otherwise it
                             * will give a warning that email address is already in use
                             */

                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $sql = "Select * from users where email = '$email' " ;
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<p style='color:red; text-align:center; font-weight:bold;'>User already exists</p>";
                                return;
                            }

                            /*
                             * Inserts form data into relevant tables, in this case adds the students data to student table
                             * and his register credentials to the user table.Finally it will redirect back to the students list.
                             */

                            $sql = "INSERT INTO student(index_number, first_name, last_name, gender, birthday, course) VALUES ('$index', '$firstname', '$lastname', '$gender', '$birt_date', '$course')";
                            if ($conn->query($sql) == false) {
                                return $sql;
                            }
                            $sql = "Select * from student where index_number='$index'";
                            $result = $conn->query($sql);
                            if ($row = $result->fetch_assoc()) {
                                $student = $row['id'];
                            }
                            $sql = "INSERT INTO users( username, email, password, is_admin, student_id, professor_id) VALUES ('$username', '$email', '$password', 0, $student, 0)";
                            if ($conn->query($sql) == true) {
                                echo '<script type="text/javascript"> window.location = "students.php"</script>';
                            }else{
                                echo $sql;
                            }
                        }
                        ?>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email"  placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username"  placeholder="Enter username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password"  placeholder="Enter password">
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="firstname"  placeholder="Enter firstname">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lastname" placeholder="Enter lastname">
                        </div>
                        <div class="form-group"><label>Gender</label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="gender"  id="gender_male"  value="male" checked> Male<br>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="gender"  id="gender_female"  value="female"> Female<br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Index</label>
                            <input type="text" class="form-control" name="index" placeholder="Enter index">
                        </div>
                        <div class="form-group">
                            <label>Birth date</label>
                            <input type="date" class="form-control" name="birth_date" placeholder="Enter birth date">
                        </div>
                        <div class="form-group">
                            <label>Course</label>
                            <input type="text" class="form-control" name="course" placeholder="Enter course">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Professor DataTable -->
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
    <?php include "modals.php";?>
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