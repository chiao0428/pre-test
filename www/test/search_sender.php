<?php

$sender = $_GET['sender'];
$con = mysqli_connect("localhost","chiao","chiao2377");
if(!$con){
    echo $con;
    die('資料庫連接失敗').mysqli_error();
}
mysqli_select_db($con,'db');
mysqli_query($con,"SET NAMES 'utf8'"); 


$searchString = "%$searchString%";

$sql = "SELECT * FROM tb WHERE sender LIKE '".$_GET['sender']."'";
$prepared_stmt = $con->prepare($sql);
$prepared_stmt->bind_param('s', $searchString);
$prepared_stmt->execute();
$result = $prepared_stmt->get_result();


if ($result->num_rows === 0) {
    echo "<center>No match found<br><br>";
    echo "<input type =\"button\" onclick=\"history.back()\" value=\"回上一頁\"></input></center>";

} else {
    while ($row = $result->fetch_assoc()) {
    echo "<center>編號:".$row['id']." 發佈者:". $row['sender'] . " 內容". $row['content'] . " 時間". date('Y-m-d H:i:s',$row['send_time']) ."<center><br/>";
    echo "<br/>";
    } 
    echo "<input type =\"button\" onclick=\"history.back()\" value=\"回上一頁\"></input>";
    }
    
?>