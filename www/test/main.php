<?php

$con = mysqli_connect("localhost","chiao","chiao2377");
if(!$con){
    die('資料庫連接失敗').mysqli_error();
}

//else echo '<script>alert("連線成功");</script>';

mysqli_select_db($con,'db');
mysqli_query($con,"SET NAMES 'utf8'"); 
$sql = 'select * from tb';
$res = mysqli_query($con,$sql);
$arr = [];
while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
    $row['send_time'] = date('Y-m-d H:i:s',$row['send_time']);
    $arr[] = $row;
}

if(isset($res)){
    echo json_encode(array(
        'code'=>0,
        'msg'=>'ok',
        'data'=>$arr
    ));
}else{
    echo json_encode(array(
        'code'=>0,
        'msg'=>'聊天資訊為空'
    ));
}

?>