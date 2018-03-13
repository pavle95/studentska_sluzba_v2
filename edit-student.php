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
<!-- Navigation-->
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

        <!-- Student DataTable-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-user-plus"></i>Add Student</div>
            <div class="card-body">
                <div class="table-responsive">
                        <!--  Uzimaju se podaci od trazenog studenta  -->
                    <?php
                    $id = $_REQUEST['id'];
                    $sql = "SELECT s.*, u.* from student s, users u where s.id = u.student_id and s.id=".$id;
                    $result = $conn->query($sql);
                    $firstname;$lastname;$gender;$birthday;$course;$index;$username;$password;$email;
                    if($result->num_rows>0) {
                        while ($row = $result->fetch_assoc()) {
                            $firstname = $row['first_name'];
                            $lastname = $row['last_name'];
                            $index = $row['index_number'];
                            $gender = $row['gender'];
                            $birthday = $row['birthday'];
                            $course = $row['course'];
                            $username = $row['username'];
                            $password = $row['password'];
                            $email = $row['email'];
                        }
                    }
                    ?>
                    <form method="post" name="edit_student" onsubmit="return validateEditStudent()">
                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST') {
                            echo "aaa";
                            $firstname = $_POST['firstname'];
                            $lastname = $_POST['lastname'];
                            $gender = $_POST['gender'];
                            $index = $_POST['index'];
                            $birt_date = $_POST['birth_date'];
                            $course = $_POST['course'];
                            $sql = "UPDATE student SET index_number='".$index."',first_name='".$firstname."',last_name='".$lastname."',gender='".$gender."',birthday='".$birt_date."',course='".$course."' WHERE id=".$id;
                            if ($conn->query($sql) == false) {
                                echo $sql;
                            }
                            $email =$_POST['email'];
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $sql = "UPDATE users SET email='$email', username='$username', password='$password' where student_id=".$id;
                            if ($conn->query($sql) == true) {
                                echo '<script type="text/javascript"> window.location = "students.php"</script>';
                            }else{
                                echo $sql;
                            }
                        }
                        ?>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email"  value="<?php echo $email ?>">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username"  value="<?php echo $username ?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password"  value="<?php echo $password ?>">
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="firstname"  value="<?php echo $firstname ?>">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lastname" value="<?php echo $lastname ?>">
                        </div>
                        <div class="form-group"><label>Gender</label>
                            <?php if($gender == "male") {
                                echo "<div class='form-check'><input type='radio' class='form-check-input' name='gender' id='gender_male' value='male' checked> Male<br></div>";
                                echo "<div class='form-check'><input type='radio' class='form-check-input' name='gender' id='gender_male' value='female' > Female<br></div>";
                            }else{
                                echo "<div class='form-check'><input type='radio' class='form-check-input' name='gender' id='gender_male' value='male'> Male<br></div>";
                                echo "<div class='form-check'><input type='radio' class='form-check-input' name='gender' id='gender_male' value='female' checked> Female<br></div>";
                            } ?>
                        </div>
                        <div class="form-group">
                            <label>Index</label>
                            <input type="text" class="form-control" name="index" value="<?php echo $index?>">
                        </div>
                        <div class="form-group">
                            <label>Birth date</label>
                            <input type="date" class="form-control" name="birth_date" value="<?php echo $birthday?>">
                        </div>
                        <div class="form-group">
                            <label>Course</label>
                            <input type="text" class="form-control" name="course" value="<?php echo $course?>">
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