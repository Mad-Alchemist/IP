<?php
$conn=mysqli_connect('localhost','root','','web');
$_SESSION['name']=$_POST[UName];
$_SESSION['uid']=$_POST[supID];
$_SESSION['pwd']=$_POST[supPW];

$sql="insert into web $_SESSION['name'],$_SESSION['uid'],$_SESSION['pwd']"
?>
