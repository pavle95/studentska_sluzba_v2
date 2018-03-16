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
    <script src="js/validate/professor.js"></script>
    <script src="js/sb-admin.js"></script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation based on permissions-->
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

        <!-- Add professor form-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-user-plus"></i>Add Professor</div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" name="add_professor" onsubmit="return validateAddProfessor()">
                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $firstname = $_POST['firstname'];
                            $lastname = $_POST['lastname'];
                            $age = $_POST['age'];
                            $subject = $_POST['subject'];
                            $sql = "Select * from professor where first_name='$firstname' and last_name='$lastname'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<p style='color:red; text-align:center; font-weight:bold;'>Professor already exists</p>";
                                return;
                            }
                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $sql = "Select * from users where email = '$email' " ;
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                echo "<p style='color:red; text-align:center; font-weight:bold;'>User already exists</p>";
                                return;
                            }
                            $sql = "INSERT INTO professor( first_name, last_name, age, subject_id) VALUES ('$firstname', '$lastname', $age, $subject)";
                            if ($conn->query($sql) == false) {
                                return $sql;
                            }
                            $sql = "Select * from professor where first_name='$firstname' and last_name='$lastname'";
                            $result = $conn->query($sql);
                            if ($row = $result->fetch_assoc()) {
                                $professor = $row['id'];
                            }
                            $admin = 0;
                            $sql = "INSERT INTO users( username, email, password, is_admin, student_id, professor_id) VALUES ('$username', '$email', '$password', '$admin', 0, $professor)";
                            if ($conn->query($sql) == true) {
                                echo '<script type="text/javascript"> window.location = "professors.php"</script>';
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
                            <input type="text" class="form-control" name="firstname"  placeholder="Enter first name">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lastname"  placeholder="Enter last name">
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input type="text" class="form-control" name="age" placeholder="Enter age">
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <select class="form-control" name="subject">
                                <?php
                                $sql = "select * from subject where id not in (select subject_id from professor)";
                                $result = $conn->query($sql);
                                if($result->num_rows>0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='".$row['id']."'>".$row['name']."</option>";
                                    }
                                }
                                ?>
                            </select>
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