<?php
include_once('main.php');
include_once('../../service/mysqlcon.php');
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
                <div align="center">
                <form action="#" method="GET">
                <div class="row">
                        <div class="col-md-4">
                        Enter Student ID:
                        </div>
                        <div class="col-md-8 mb-3">
                 <input type="text" class="form-control"  name='key' placeholder="st-XXX-X"/><br>
                 <input type="submit" class="btn btn-primary" name='submit' value="submit"/>
                        </div>
                </div>
                </form>
                    <!-- Page Heading -->
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <?php
                    if(!empty($_GET['submit'])){
                    $searchKey = $_GET['key'];
                    $images_dir = "../images";
                    $string = "<thead><tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>Addmission Date</th>
                        <th>Address</th>
                        <th>Parent Id</th>
                        <th>Class Id</th>
                        <th>picture</th>

                    </tr></thead>";
                    $sql = "SELECT * FROM students WHERE id like '$searchKey%' OR name like '$searchKey%' OR classid = '$searchKey';";
                    $res = mysqli_query($link,$sql);
                    while($row = mysqli_fetch_array($res)){
                        $picname = $row['id'];
                        echo $string;
                        
                        echo '<tr><td>'.$row['id'].'</td><td>'.$row['name'].
                        '</td><td>'.$row['phone'].'</td><td>'.$row['email'].
                        '</td><td>'.$row['sex'].'</td><td>'.$row['dob'].
                        '</td><td>'.$row['addmissiondate'].'</td><td>'.$row['address'].
                        '</td><td>'.$row['parentid'].'</td><td>'.$row['classid'].'</td>';
                                                
                    // echo $string;
                    echo "<td><img src='".$images_dir."/".$picname.".jpg' alt='$picname' class='img-fluid' >".'</td></tr>'; 
                    }

                    echo "</table>";

                    //echo $images_dir.$picname.".jpg";
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