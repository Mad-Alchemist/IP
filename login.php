<?php
    session_start();
    $con=mysqli_connect('127.0.0.1','root','','web');
    $id=$_POST['loginId'];
    $pwd=hash('sha256',$_POST['loginPw']);
    $q="SELECT * FROM members WHERE id='$id' AND password='$pwd'";

    $result=mysqli_query($con,$q);
    $row=$result->fetch_array(MYSQLI_ASSOC);

    if($row!=null)
    {
        $_SESSION['id']=$row['id'];
        $_SESSION['name']=$row['name'];
        mysqli_close();
    }
    else
    {
        echo "<script>alert('아이디 혹은 비밀번호를 확인해 주십오')</script>";
        echo "<script>location.replace('main.php');</script>";
        mysqli_close();
    }
?>

<!DOCTYPE html>
<html>
<head>
<script src="./js/Login.js"></script>
<title> AYU-LIFE </title>
</head>
<link rel="stylesheet" href="./css/a.css" type="text/css">
<link rel="stylesheet" href="./css/login.css" type="text/css">
<body style="background-color:black;">
<nav id="TopBar">
  <a class="Uname"><?php $_SESSION['name'] ?>님 반갑습니다.</a>
<ul>
  <li><a class="Link" href="Lobby.html">Main</a></li>
  <li><a class="Link" href="Lunch.html">Lunch</a></li>
  <li><a class="Link" href="car.html">Go to Univ</a></li>
  <li><a class="Link" href="Market.html">Market</a></li>
  <li><a class="Link" href="Community.html">Community</a></li>
  <li><a class="Link" id="btl" href="logout.php">Logout</a></li>
</ul>
</nav>
</body>
</html>