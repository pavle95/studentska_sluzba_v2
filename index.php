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
                </tr>
              </thead>
              <tbody>
              <?php
              $result = mysqli_query($conn,"SELECT * FROM student");
              while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['index_number'] . "</td>";
                  echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                  echo "<td>" . $row['gender'] . "</td>";
                  echo "<td>" . $row['birthday'] . "</td>";
                  echo "<td>" . $row['course'] . "</td>";
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
