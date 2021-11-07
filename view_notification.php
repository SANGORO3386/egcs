<?php
include_once('main.php');
$sql="UPDATE notifications SET status='read' WHERE status='unread' and user_id='$check'";	
$result=mysqli_query($link, $sql);

$sql="SELECT * FROM notifications WHERE user_id='$check' ORDER BY id DESC limit 5";
$result=mysqli_query($link, $sql);

$response='';
while($row=mysqli_fetch_array($result)) {
    $userid=$row['user_id'];
    $tid = $row['added_by'];
    $sel = mysqli_query($link,"SELECT name FROM teachers WHERE id='$tid'");
    $res = mysqli_fetch_array($sel);
    $checkd=mysqli_query($link,"select * from departments where chair='$userid'");
    if(mysqli_num_rows($checkd) > 0){
        $response = $response. "
        <a class='dropdown-item d-flex align-items-center' href='approve.php'>
        <div class='mr-3'>
            <div class='icon-circle bg-warning'>
                <i class='fas fa-user text-white'></i>
            </div>
        </div>
        <div>
            <div class='small text-gray-500'>". $row['postingdate']."</div>
           <span class='small'> You have received a ". $row['action_type']." from ".$res['name']."</span>
        </div>
    </a>";
    }else{
        $response = $response. "
        <a class='dropdown-item d-flex align-items-center' href='nextapprove.php'>
        <div class='mr-3'>
            <div class='icon-circle bg-warning'>
                <i class='fas fa-user text-white'></i>
            </div>
        </div>
        <div>
            <div class='small text-gray-500'>". $row['postingdate']."</div>
           <span class='small'> You have received a ". $row['action_type']." from ".$res['name']."</span>
        </div>
    </a>";
    }
}
if(!empty($response)) {
	print $response;
}


?>