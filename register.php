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
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Custom JS-->
    <script src="js/validate/user.js"></script>
</head>

<body class="bg-dark">
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Register</div>
        <div class="card-body">
            <form method="post" name="add_user" onsubmit="return validateAddUser()">
                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $role = $_POST['role'];
                    $admin = 0;
                    $sql = "Select * from users where email = '$email' " ;
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<p style='color:red; text-align:center; font-weight:bold;'>User already exists</p>";
                        return;
                    }
                    $sql = "INSERT INTO users( username, email, password, is_admin, role) VALUES ('$username', '$email', '$password', '$admin', '$role')";
                    if ($conn->query($sql) == true) {
                        echo '<script type="text/javascript"> window.location = "index.php"</script>';
                    }
                }
                ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input class="form-control" id="exampleInputEmail1" type="text" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Username</label>
                    <input class="form-control" id="exampleInputUsername1" type="text" name="username" aria-describedby="emailHelp" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputRole1">Role</label>
                    <select class="custom-select" name="role" id="exampleInputRole1"><option value="student">Student</option><option value="professor">Professor</option></select>
                </div>
                <input class="btn btn-primary btn-block" type="submit" value="Register">
            </form>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
