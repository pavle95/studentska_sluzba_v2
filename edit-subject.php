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
    <script src="js/validate/subject.js"></script>
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
                <i class="fa fa-book"></i>Edit Subject</div>
            <div class="card-body">
                <div class="table-responsive">
                    <?php
                    $id = $_REQUEST['id'];
                    $sql = "SELECT * from subject where id=".$id;
                    $result = $conn->query($sql);
                    $name;$semester;$ecdl;$description;
                    if($result->num_rows>0) {
                        while ($row = $result->fetch_assoc()) {
                            $name = $row['name'];
                            $semester = $row['semester'];
                            $ecdl = $row['ecdl_credits'];
                            $description = $row['description'];
                        }
                    }
                    ?>
                    <form method="post" name="edit_subject" onsubmit="return validateEditSubject()">
                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $name = $_POST['name'];
                            $semester = $_POST['semester'];
                            $ecdl = $_POST['ecdl'];
                            $description = $_POST['description'];
                            $sql = "UPDATE subject SET name='".$name."',semester=".$semester.",ecdl_credits=".$ecdl.",description='".$description."' WHERE id=".$id;
                            if ($conn->query($sql) == true) {
                                echo '<script type="text/javascript"> window.location = "subjects.php"</script>';
                            }else{
                                echo $sql;
                            }
                        }
                        ?>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name"  value="<?php echo $name ?>">
                        </div>
                        <div class="form-group">
                            <label>Semester</label>
                            <select class="form-control" name="semester">
                                <?php
                                for ($i = 1; $i<=6; $i++){
                                    if($i==$semester){
                                        echo "<option value='".$i."' selected>".$i."</option>";
                                    }else{
                                        echo "<option value='".$i."'>".$i."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>ECDL</label>
                            <input type="number" class="form-control" name="ecdl" value="<?php echo $ecdl ?>">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="2"><?php echo $description ?></textarea>
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