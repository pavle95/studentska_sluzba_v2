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
    <script src="js/validate/user.js"></script>
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
                <i class="fa fa-user-plus"></i>Edit User</div>
            <div class="card-body">
                <div class="table-responsive">

                    <?php

                    /*
                     *Gets the selected user form data containing his existing data and
                     * updates them according to the changes made inside the input fields.
                     * Finally it redirects back to the user list
                     */

                    $id = $_REQUEST['id'];
                    $sql = "SELECT * from users where id=".$id;
                    $result = $conn->query($sql);
                    $username;$email;$password;$admin;$role;
                    if($result->num_rows>0) {
                        while ($row = $result->fetch_assoc()) {
                            $username = $row['username'];
                            $email = $row['email'];
                            $password = $row['password'];
                            $is_admin = $row['is_admin'];
                        }
                    }
                    ?>
                    <form method="post" name="edit_user" onsubmit="return validateEditUser()">
                        <?php

                        /*
                         * Updates the user data inside the database based on the changes
                         * made inside the input fields
                         */

                        if($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $is_admin = $_POST['is_admin'];

                            $sql = "UPDATE users SET username='".$username."',password='".$password."',email='".$email."' WHERE id=".$id;
                            if ($conn->query($sql) == true) {
                                echo '<script type="text/javascript"> window.location = "user-list.php"</script>';
                            }
                        }
                        ?>
                        Username:<br>
                        <input type="text" class="form-control" name="username" id="username" value="<?php echo $username ?>"><br>

                        Email:<br>
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $email ?>"><br>

                        Password:<br>
                        <input type="password" class="form-control" name="password"  id="password"  value="<?php echo $password ?>"><br>

                        <input type="submit" class="btn btn-primary" value="Submit">
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