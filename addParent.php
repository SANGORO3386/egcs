<?php
include_once('../../service/mysqlcon.php');
$check=$_SESSION['login_id'];
$session=mysqli_query($link,"SELECT name  FROM admin WHERE id='$check' ");
$row=mysqli_fetch_array($session);
$login_session = $loged_user_name = $row['name'];
if(!isset($login_session)){
    header("Location:../../");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EGCS - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
    <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="notifications.js" type="text/javascript"></script>
    <script src = "JS/login_logout.js"></script>
        <script src = "JS/currentDate.js"></script>
        <script src = "JS/newParentValidation.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <?php include("leftbar.php");?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <?php include("../../service/header.php");?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <center>
            <h2>Parent Registration.</h2><hr/>
            <form action="#" method="post"onsubmit="return newParentValidation();">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                      <td>Parent Id:</td>
                      <td><input id="id" class="form-control" type="text" name="id" placeholder="Enter Id"></td>
                    </tr>
                    <tr>
                        <td>Parent Password:</td>
                        <td><input id="password" class="form-control" type="text" name="password" placeholder="Enter Password"></td>
                    </tr>
                    <tr>
                        <td>Father Name:</td>
                        <td><input id="fathername" class="form-control" type="text" name="fathername" placeholder="Enter Father Name"></td>
                    </tr>
                    <tr>
                        <td>Mother Name:</td>
                        <td><input id="mothername" class="form-control" type="text" name="mothername" placeholder="Enter Mother Name"></td>
                    </tr>
                    <tr>
                        <td>Father Phone:</td>
                        <td><input id="fatherphone" class="form-control" type="text" name="fatherphone" placeholder="Enter Father Phone"></td>
                    </tr>
                    <tr>
                        <td>Mother Phone:</td>
                        <td><input id="motherphone" class="form-control" type="text" name="motherphone" placeholder="Enter Mother Phone"></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><input id="address" class="form-control"  type="text" name="address" placeholder="Enter Address"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" class="form-control btn btn-primary" name="submit"value="Submit"></td>
                    </tr>
                </table>
            </form>
        </center>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include("../../service/footer.php");?>


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

</body>

</html>
<?php
include_once('../../service/mysqlcon.php');
if(!empty($_POST['submit'])){
    $id = $_POST['id'];
    $password = $_POST['password'];
    $fathername = $_POST['fathername'];
    $mothername = $_POST['mothername'];
    $fatherphone = $_POST['fatherphone'];
    $motherphone = $_POST['motherphone'];
    $address = $_POST['address'];
    $sql = "INSERT INTO parents VALUES('$id','$password','$fathername','$mothername','$fatherphone','$motherphone','$address')";
    $success = mysqli_query($link,$sql);
    if(!$success) {
        die('Could not enter data: '.mysqli_error($link));
    }
    $sql = "INSERT INTO users VALUES('$id','$password','parent')";
    $success = mysqli_query( $link,$sql);
    echo "Entered data successfully\n";
}
?>