<?php  
include_once('main.php');
 $em = $_REQUEST['cid'];


$courseinfo = "SELECT * FROM teachers WHERE id in (select teacherid from course where id='$em' and studentid='$check')";
$rescou = mysqli_query($conn,$courseinfo);
$courseid = "SELECT * FROM class WHERE id in (select classid from course where id='$em' and studentid='$check')";
$rescoud = mysqli_query($link,$courseid);
$st=mysqli_fetch_array($rescoud);

while($rn=mysqli_fetch_array($rescou))
{
 echo "<span class='font-weight-bold'>Teacher ID: </span>",$rn['id'],"<br/>";
 echo "<span class='font-weight-bold'>Teacher Name: </span>",$rn['name'],"<br/>";
 echo "<span class='font-weight-bold'>Teacher Email: </span>",$rn['email'],"<br/>";
  echo "<span class='font-weight-bold'>Your Section : </span>",$st['section'],"<br/>";
  echo "<span class='font-weight-bold'>Your Class Room : </span>",$st['room'],"<br/>";
 

}


?>
