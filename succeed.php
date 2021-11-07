<?php
include('main.php');


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
                        <?php
                        if(!empty($_REQUEST['sbmt']))
                        {
                        $crid=$_REQUEST["crid"];
                        $std=$_REQUEST["stdid"];
                        $cr=$_REQUEST['course'];
                        $sql="insert into grade (studentid,grade,courseid) values ('$std','$cr','$crid')";
                        //echo $sql;
                        $s=mysqli_query($link,$sql);
                        if(!$s)
                        {
                        echo "<div class='alert alert-danger'>Sorry, please try again!</div>";
                        }
                        echo "<div class='alert alert-success'>Grade added successfully</div>";
                        }

                        else
                        {
                        $crid=$_REQUEST["crid"];
                        $std=$_REQUEST["stdid"];
                        
                        $reason = $_REQUEST['reason'];
                        $approval =0;
                        $sql1="INSERT INTO requests (studentid,courseid,teacherid,reason,approvals)
                         VALUES ('$std','$crid','$gd','$check','$reason','$approval')";
                        $s=mysqli_query($link,$sql1);
                        if(!$s)
                        {
                        echo "<div class='alert alert-danger'>Sorry, please try again!</div>";
                        }
                        $select = mysqli_query($link, "select departid from course where id='$crid'");
                        $row = mysqli_fetch_array($select);
                        $departid = $row['departid'];
                        $selector = mysqli_query($link, "select chair from departments where id='$departid'");
                        $row = mysqli_fetch_array($selector);
                        $chair = $row['chair'];
                        $sql = "INSERT INTO notifications (user_id,module,action_type,added_by,status)
                         VALUES('$chair','adding','Course Change Request','$check','unread')";
                        $success = mysqli_query( $link,$sql);
                        echo "<div class='alert alert-success'>Request sent successfully, Waiting for approval!</div>";
                        }
                        ?>
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
