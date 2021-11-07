<?php  
include_once('main.php');
 $em = $_REQUEST['id'];


$courseinfo = "SELECT * FROM course WHERE courseid='$em' and teacherid='$check'";
$resc = mysqli_query($link,$courseinfo);

while($r=mysqli_fetch_array($resc))
{
    echo "<span class='font-weight-bold'>Grade: </span>",$r['course'],"<br/>";

}


?>
