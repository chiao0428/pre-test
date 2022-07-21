<?php

$con = mysqli_connect("localhost","chiao","chiao2377");
if(!$con){
    echo $con;
    die('資料庫連接失敗').mysqli_error();
}
mysqli_select_db($con,'db');
mysqli_query($con,"SET NAMES 'utf8'"); 

$sql="select * from tb where id=".$_GET[id];
$res= mysqli_query($con,$sql);
while ($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){
?>
<center>
<FORM METHOD="POST" ACTION="postEdit.php">
    <input type="hidden" name="id" value="<?=$row[id]?>">
    <INPUT TYPE="text" NAME="sender" value="<?=$row[sender]?>"/><br />
    <TEXTAREA NAME="content" ROWS="8" COLS="30"><?=$row[content]?></TEXTAREA><br />
    <br>
    <INPUT TYPE="submit" name="submit" value="完成"/>
</FORM>
<center>
<?php }
?>
