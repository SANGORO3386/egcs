<?php
include_once('main.php');
if(!empty($_GET['appid']))
{
	$id=intval($_GET['appid']);
	$query=mysqli_query($link,"UPDATE requests SET approvals='2' WHERE id='$id'");
    if($query){
        $sel=mysqli_query($link,"SELECT id FROM admin WHERE title='registrar'");
        $row=mysqli_fetch_array($sel);
        $regid=$row['id'];
        $insert="INSERT INTO notifications(user_id,module,action_type,added_by,status) VALUES('$regid','Grading','Grade Change Request','$check','unread')";
        $result=mysqli_query($link,$insert);
        $appmsg="Grade approved";
    }
}
if(!empty($_GET['disid']))
{
	$id=intval($_GET['disid']);
	$query=mysqli_query($link,"UPDATE requests SET approval='5' WHERE id='$id'");
	$dismsg="Grade rejected";
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">School Dean Approval</h1>
                        <a href="report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <div class="row">
                            <div class="col-sm-6">  
                            
                            <?php if(!empty($appmsg)){ ?>
                            <div class="alert alert-success" role="alert">
                            <strong>Well done!</strong> <?php echo htmlentities($appmsg);?>
                            </div>
                            <?php } ?>

                            <?php if(!empty($dismsg)){ ?>
                            <div class="alert alert-danger" role="alert">
                            <strong>Oh snap!</strong> <?php echo htmlentities($dismsg);?></div>
                            <?php } ?>


                            </div>
                    </div>
                    <div class='card shadow mb-4'>
                    <div class='card-header py-3'>
                        <h6 class='m-0 font-weight-bold text-primary'>Grade Change Requests</h6>
                    </div>
                    <div class='card-body'>
                        <div class='table-responsive'>
                            <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                <thead class='bg-secondary text-white'>
                                    <tr>
                                    <th>Student Name</th>
                                    <th>Student ID</th>
                                    <th>Course Title</th>
                                    <th>Course Code</th>
                                    <th>Credit Hours</th>
                                    <th>Semester Taken</th>
                                    <th>Academic Year</th>
                                    <th>Current Grade</th>
                                    <th>Grade Submitted</th>
                                    <th>Reason</th>
                                    <th>Instructor Name</th>
                                    <th class='w-25'>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php 
                            $sel=mysqli_query($link,"SELECT id FROM schools WHERE dean='$check'");
                            while($row = mysqli_fetch_array($sel)){
                            $sid=$row['id'];
                            $sql=mysqli_query($link,"SELECT id FROM departments WHERE schoolid='$sid'");
                            while($row = mysqli_fetch_array($sql)){
                                $did=$row['id'];
                                $request=mysqli_query($link,"SELECT id FROM course WHERE departid='$did'");
                                while($res = mysqli_fetch_array($request)){
                                    $crid=$res['id'];
                                $sqly=mysqli_query($link,"SELECT * FROM requests WHERE courseid='$crid' AND approvals=1");
                                while($rowy = mysqli_fetch_array($sqly)){
                                    $rid=$rowy['id'];
                                    $csid=$rowy['courseid'];
                                    $stid=$rowy['studentid'];
                                    $tid=$rowy['teacherid'];
                                    $teach=mysqli_query($link,"SELECT name FROM teachers WHERE id='$tid'");
                                    while($teachs = mysqli_fetch_array($teach)){
                                    $course=mysqli_query($link,"SELECT * FROM course WHERE id='$crid'");
                                    while($courses = mysqli_fetch_array($course)){
                                    $student=mysqli_query($link,"SELECT name FROM students WHERE id='$stid'");
                                    while($students = mysqli_fetch_array($student)){
                                    $Add=mysqli_query($link,"SELECT * FROM course WHERE studentid='$stid' AND courseid='$crid'");
                                    while($courses = mysqli_fetch_array($course)){
                                        $cr = courses['course'];
                                        echo "<tr>
                                                <td>".$students['name']."</td>
                                                <td>$stid</td>
                                                <td>".$courses['name']."</td>
                                                <td>".$courses['course_code']."</td>
                                                <td>".$courses['credithours']."</td>
                                                <td>".$courses['semester']."</td>
                                                <td>".$courses['academicYear']."</td>
                                                <td>$grd</td>
                                                <td>".$rowy['course']."</td>
                                                <td>".$rowy['reason']."</td>
                                                <td>".$teachs['name']."</td>
                                                <td class='w-25'>
                                                <a href='nextapprove.php?appid=$rid' title='Approve'><i class='fas fa-check-circle text-success'></i></a>
                                                <a href='nextapprove.php?disid=$rid' title='Reject'><i class='fas fa-times-circle text-danger'></i></a>
                                                </td></tr>";
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }}
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">School Dean Approval</h1>
                        <a href="report.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <div class="row">
                            <div class="col-sm-6">  
                            
                            <?php if(!empty($appmsg)){ ?>
                            <div class="alert alert-success" role="alert">
                            <strong>Well done!</strong> <?php echo htmlentities($appmsg);?>
                            </div>
                            <?php } ?>

                            <?php if(!empty($dismsg)){ ?>
                            <div class="alert alert-danger" role="alert">
                            <strong>Oh snap!</strong> <?php echo htmlentities($dismsg);?></div>
                            <?php } ?>


                            </div>
                    </div>
                    <div class='card shadow mb-4'>
                    <div class='card-header py-3'>
                        <h6 class='m-0 font-weight-bold text-primary'>course Change Requests</h6>
                    </div>
                    <div class='card-body'>
                        <div class='table-responsive'>
                            <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                <thead class='bg-secondary text-white'>
                                    <tr>
                                    <th>Student Name</th>
                                    <th>Student ID</th>
                                    <th>Course Title</th>
                                    <th>Course Code</th>
                                    <th>Credit Hours</th>
                                    <th>Semester Taken</th>
                                    <th>Academic Year</th>
                                    <th>Current course</th>
                                    <th>course registered</th>
                                    <th>Reason</th>
                                    <th>Instructor Name</th>
                                    <th class='w-25'>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php 
                            $sel=mysqli_query($link,"SELECT id FROM schools WHERE dean='$check'");
                            while($row = mysqli_fetch_array($sel)){
                            $sid=$row['id'];
                            $sql=mysqli_query($link,"SELECT id FROM departments WHERE schoolid='$sid'");
                            while($row = mysqli_fetch_array($sql)){
                                $did=$row['id'];
                                $request=mysqli_query($link,"SELECT id FROM course WHERE departid='$did'");
                                while($res = mysqli_fetch_array($request)){
                                    $crid=$res['id'];
                                $sqly=mysqli_query($link,"SELECT * FROM requests WHERE courseid='$crid' AND approvals=1");
                                while($rowy = mysqli_fetch_array($sqly)){
                                    $rid=$rowy['id'];
                                    $csid=$rowy['courseid'];
                                    $stid=$rowy['studentid'];
                                    $tid=$rowy['teacherid'];
                                    $teach=mysqli_query($link,"SELECT name FROM teachers WHERE id='$tid'");
                                    while($teachs = mysqli_fetch_array($teach)){
                                    $course=mysqli_query($link,"SELECT * FROM course WHERE id='$crid'");
                                    while($courses = mysqli_fetch_array($course)){
                                   
                                        $crs = $courses['course'];
                                        echo "<tr>
                                                <td>".$students['name']."</td>
                                                <td>$stid</td>
                                                <td>".$courses['name']."</td>
                                                <td>".$courses['course_code']."</td>
                                                <td>".$courses['credithours']."</td>
                                                <td>".$courses['semester']."</td>
                                                <td>".$courses['academicYear']."</td>
                                                <td>$grd</td>
                                                <td>".$rowy['course']."</td>
                                                <td>".$rowy['reason']."</td>
                                                <td>".$teachs['name']."</td>
                                                <td class='w-25'>
                                                <a href='nextapprove.php?appid=$rid' title='Approve'><i class='fas fa-check-circle text-success'></i></a>
                                                <a href='nextapprove.php?disid=$rid' title='Reject'><i class='fas fa-times-circle text-danger'></i></a>
                                                </td></tr>";
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }}
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