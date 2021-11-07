<?php
include_once('main.php');
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
                        <h1>Student Tuition Fees</h1>
                        <form action="#" method="post">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <td>Student ID:</td>
                                <td><input type="text" name="id" class="form-control" placeholder="Enter Student Id."></td>
                            </tr>
                            <tr>
                                <td>Amount:</td>
                                <td><input type="text" class="form-control" name="ammount" placeholder="Enter Ammount."></td>
                            </tr>
                            <tr>
                                <td>Month:</td>
                                <td><input type="text" class="form-control" name="month" placeholder="Enter Month.(April as 4)"></td>
                            </tr>
                            <tr>
                                <td>Year:</td>
                                <td><input type="text" class="form-control" name="year" placeholder="Enter Year.(2016)"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" class="form-control btn btn-primary" name="submit" value="Submit"></td>
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
    $ammount = $_POST['ammount'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $sql = "INSERT INTO payment VALUES('','$id','$ammount','$month','$year')";
    $success = mysqli_query($link,$sql );
    if(!$success) {
        die('Could not enter data: '.mysqli_error($link));
    }
    echo "Transaction successfull\n";
}
?>
