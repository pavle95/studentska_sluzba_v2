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
    <script src="js/sb-admin.js"></script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation based on logged in user-->
<?php include "navbar.php"; ?>
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
        <!-- Icon Cards-->

        <!-- Student DataTable-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Students</div>
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
                            <?php

                            /*
                            * Based on the user role it shows additional table data
                            *  such as options to edit or delete the records
                            */

                            if(isset($_SESSION["username"]))
                            {
                                if ($_SESSION["is_admin"] == 1) {
                                    echo "<th>Edit</th>";
                                    echo "<th>Delete</th>";
                                }
                            }
                            ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        /*
                         * Takes all the data from students table
                         * and presents them as a table which is dynamic based on the logged in users role
                         */

                        $result = mysqli_query($conn,"SELECT * FROM student");
                        while($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['index_number'] . "</td>";
                            echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                            echo "<td>" . $row['gender'] . "</td>";
                            echo "<td>" . $row['birthday'] . "</td>";
                            echo "<td>" . $row['course'] . "</td>";
                            if(isset($_SESSION["username"]))
                            {
                                if ($_SESSION["is_admin"] == 1)
                                {
                                    echo "<td><a href='edit-student.php?id=" . $row['id'] . "'>Edit</a></td>";
                                    echo "<td><a href='delete-student.php?id=" . $row['id'] . "'>Delete</a></td>";
                                }
                            }
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
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