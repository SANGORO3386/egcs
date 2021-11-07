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

                    <?php 
                    if(!empty($_POST['submit'])){
                        $stid=$_REQUEST['mystudent'];
                        $crsid=$_REQUEST['mycourse'];
                        $sql="select  from grade where studentid='$stid' and courseid='$crsid'";
                        $res=mysqli_query($link,$sql);
                        if(mysqli_num_rows($res)==0){
                        $grd=$row[0];
                        $sqli="select * from course where studentid='$stid' and id='$crsid'";
                        $resi=mysqli_query($link,$sqli);
                        while($row1 = mysqli_fetch_array($resi)){
                        $code=$row1['course_code'];
                        $string="
                        <div class='d-sm-flex align-items-center justify-content-between mb-4'>
                        <h1 class='h3 mb-0 text-gray-800'>Grading</h1>
                        <a href='report.php' class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm'><i
                                class='fas fa-download fa-sm text-white-50'></i> Generate Report</a>
                    </div>

                        <div class='card shadow mb-4'>
                        <div class='card-header py-3'>
                            <h6 class='m-0 font-weight-bold text-primary'>Course Information</h6>
                        </div>
                        <div class='card-body'>
                            <div class='table-responsive'>
                                <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                    <thead class='bg-secondary text-white'>
                                        <tr>
                                            <th>Course Code</th>
                                            <th>Course Title</th>
                                            <th>Credit Hours</th>
                                            <th>Semester Taken</th>
                                            <th>Academic Year</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>".$row1['course_code']."</td>
                                            <td>".$row1['name']."</td>
                                            <td>".$row1['credithours']."</td>
                                            <td>".$row1['semester']."</td>
                                            <td>".$row1['academicYear']."</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>";
                        }
                    $sql="select * from students where id='$stid'";
                    $res=mysqli_query($link,$sql);
                    while($row = mysqli_fetch_array($res)){
                    $id=$row['id'];
                    $name=$row['name'];
                    $string.=
                    "
                    <div class='card shadow mb-4'>
                    <div class='card-header py-3'>
                        <h6 class='m-0 font-weight-bold text-primary'>Student Information</h6>
                    </div>
                    <div class='card-body'>
                        <div class='table-responsive'>
                        <form action='succeed.php'>
                            <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                <thead class='bg-secondary text-white'>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Student ID</th>
                                        <th>Grade(required)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type='text' class='form-control' value='$name' readonly />
                                        <input hidden type='text' class='form-control' value='$crsid' name='crid' readonly /></td>
                                        <td><input type='text' class='form-control' value='$stid' name='stdid' readonly /></td>
                                        <td><select class='form-control' name='grade' required>
                                        <option value='A'>A</option>
                                        <option value='A-'>A-</option>
                                        <option value='B+'>B+</option>
                                        <option value='B'>B</option>
                                        <option value='B-'>B-</option>
                                        <option value='C+'>C+</option>
                                        <option value='C'>C</option>
                                        <option value='C-'>C-</option>
                                        <option value='D+'>D+</option>
                                        <option value='D'>D</option>
                                        <option value='D-'>D-</option>
                                        <option value='E'>E</option>
                                        </select></td>
                                    </tr>
                                </tbody>
                            </table>
                            <input class='btn btn-primary' type='submit' value='Grade' name='sbmt' />
                        </form>
                        </div>
                    </div>
                </div>
                        ";
                    }
                    echo $string;
                }else{
                    echo "<center><div class='alert alert-info'>Grade already exists!</div>
                    <br/><div class='btn btn-primary'><a class='text-white' href='course.php'>New Search</a></div></center>";
                }
                        }
                        if(!empty($_POST['update'])){
                            $stid=$_REQUEST['mystudent'];
                            $crsid=$_REQUEST['mycourse'];
                            $sel="select * from requests where studentid='$stid' and courseid='$crsid'";
                            $count=mysqli_query($link,$sel);
                            if(mysqli_num_rows($count)==0){
                            $sql="select grade from grade where studentid='$stid' and courseid='$crsid'";
                            $res=mysqli_query($link,$sql);
                            if(mysqli_num_rows($res)!=0){
                            while($row = mysqli_fetch_array($res)){
                            $grd=$row[0];
                            $sqli="select * from course where studentid='$stid' and id='$crsid'";
                            $resi=mysqli_query($link,$sqli);
                            while($row1 = mysqli_fetch_array($resi)){
                            $code=$row1['course_code'];
                            $string="
                            <div class='d-sm-flex align-items-center justify-content-between mb-4'>
                            <h1 class='h3 mb-0 text-gray-800'>Changing Grade</h1>
                            <a href='report.php' class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm'><i
                                    class='fas fa-download fa-sm text-white-50'></i> Generate Report</a>
                                    </div>
                            <div class='card shadow mb-4'>
                            <div class='card-header py-3'>
                                <h6 class='m-0 font-weight-bold text-primary'>Course Information</h6>
                            </div>
                            <div class='card-body'>
                                <div class='table-responsive'>
                                    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                        <thead class='bg-secondary text-white'>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Title</th>
                                                <th>Credit Hours</th>
                                                <th>Semester Taken</th>
                                                <th>Academic Year</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>".$row1['course_code']."</td>
                                                <td>".$row1['name']."</td>
                                                <td>".$row1['credithours']."</td>
                                                <td>".$row1['semester']."</td>
                                                <td>".$row1['academicYear']."</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>";
                            }
                        $sql="select * from students where id='$stid'";
                        $res=mysqli_query($link,$sql);
                        while($row = mysqli_fetch_array($res)){
                        $id=$row['id'];
                        $name=$row['name'];
                        $email=$row['email'];
                        $string.="
                        <div class='card shadow mb-4'>
                        <div class='card-header py-3'>
                            <h6 class='m-0 font-weight-bold text-primary'>Student Information</h6>
                        </div>
                        <div class='card-body'>
                            <div class='table-responsive'>
                            <form action='succeed.php'>
                                <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                    <thead class='bg-secondary text-white'>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Student ID</th>
                                            <th>Student Email</th>
                                            <th>Current Grade</th>
                                            <th>New Grade(required)</th>
                                            <th class='w-25'>Reason(required)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type='text' class='form-control' value='$name' readonly />
                                            <input hidden type='text' class='form-control' value='$crsid' name='crid' readonly /></td>
                                            <td><input type='text' class='form-control' value='$stid' name='stdid' readonly /></td>
                                            <td><input type='text' class='form-control' value='$email' name='email' readonly /></td>
                                            <td><input type='text' class='form-control' value='$grd' readonly /></td>
                                            <td><select class='form-control' name='grade' required>
                                            <option value='A'>A</option>
                                            <option value='A-'>A-</option>
                                            <option value='B+'>B+</option>
                                            <option value='B'>B</option>
                                            <option value='B-'>B-</option>
                                            <option value='C+'>C+</option>
                                            <option value='C'>C</option>
                                            <option value='C-'>C-</option>
                                            <option value='D+'>D+</option>
                                            <option value='D'>D</option>
                                            <option value='D-'>D-</option>
                                            <option value='E'>E</option>
                                            </select></td>
                                            <td><textarea class='form-control' name='reason' required></textarea></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input class='btn btn-primary' type='submit' value='Submit' name='sbmt2' />
                            </table>
                            </div>
                        </div>
                    </div>
                            ";
                        }
                    }
                }else{
                    $string= "<center>
                    <div class='alert alert-info'>Sorry, Please assign Grade first.</div>
                    <br/><div class='btn btn-primary'><a class='text-white' href='course.php'>New Search</a></div>
                    <div class='btn btn-primary'><a class='text-white' href='managegrades.php'>View Full List</a></div></center>";
                }
                    echo $string;
                }
                else{
                    echo "<center>
                    <div class='alert alert-info'>Sorry, it seems you already applied for grade change. Please wait approval is still in progress...</div>
                    <br/><div class='btn btn-primary'><a class='text-white' href='course.php'>New Search</a></div>
                    <div class='btn btn-primary'><a class='text-white' href='gradechange.php'>View Full List</a></div></center>";
                }
                            }
         
                    ?>
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