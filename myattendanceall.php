<?php  
include_once('main.php');
$attendmon = "SELECT DISTINCT(date) FROM attendance WHERE attendedid='$check'";
$resmon = mysqli_query($link,$attendmon);
echo "<thead><tr> <th>Attend All Dates:</th></tr></thead>";
while($r=mysqli_fetch_array($resmon))
{
 echo "<tr><td>",$r['date'],"</td></tr>";

}
?>
