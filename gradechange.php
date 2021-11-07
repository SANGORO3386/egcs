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
                    <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Course Change Requests</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="bg-secondary text-white">
                                            <tr>
                                                <th>Student Name</th>
                                                <th>Student ID</th>
                                                <th>Course Title</th>
                                                <th>Course Code</th>
                                                <th>Credit Hours</th>
                                                <th>Semester Taken</th>
                                                <th>Academic Year</th>
                                                <th>Grade Submitted</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                    <?php 
                            $sql="select * from requests where teacherid='$check'";
                            $res=mysqli_query($link,$sql);
                            while($row = mysqli_fetch_array($res)){
                            $stid=$row['studentid'];
                            $crid=$row['courseid'];
                            if($row['approvals']==0){
                                $status = "Awaiting...";
                            }elseif($row['approvals']==1){
                                $status = "Department Chair Approved";
                            }elseif($row['approvals']==2){
                                $status = "School Dean also Approved";
                            }elseif($row['approvals']==3){
                                $status = "Fully Approved";
                            }elseif($row['approvals']==5){
                                $status = "Rejected";
                            }
                            $sqli="select name from students where id='$stid'";
                            $resi=mysqli_query($link,$sqli);
                            while($row1 = mysqli_fetch_array($resi)){
                                $sqly="select * from course where id='$crid'";
                                $resy=mysqli_query($link,$sqly);
                                while($rowy = mysqli_fetch_array($resy)){
                            $string="
                                            <tr>
                                                <td>".$row1['name']."</td>
                                                <td>$stid</td>
                                                <td>".$rowy['name']."</td>
                                                <td>".$rowy['course_code']."</td>
                                                <td>".$rowy['credithours']."</td>
                                                <td>".$rowy['semester']."</td>
                                                <td>".$rowy['academicYear']."</td>
                                                <td>".$row['grade']."</td>
                                                <td>$status</td>
                                            </tr>";
                            }
                        }
                        echo $string;
                    }
                    ?>
                                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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