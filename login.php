<?php
    session_start();
    $con=mysqli_connect('127.0.0.1','root','','web');
    $id=$_POST['loginId'];
    $pwd=hash('sha256',$_POST['loginPw']);
    $sid=mysqli_query($con,"SELECT id FROM members WHERE id='$id'");
    
    $q="SELECT * FROM members WHERE '$id' AND passwod='$pwd'";

    $result=mysqli_query($con,$q);
    $row=$result->fetch_array(MYSQLI_ASSOC);

    if($row!=null)
    {
        $_SESSION['id']=$row['id'];
        $_SESSION['name']=$row['name'];
        echo "<script>location.replace('loggedin_main.php');</script>";
        exit;
    }
    else
    {
        echo "<script>alert('아이디 혹은 비밀번호를 확인해 주십오')</script>";
        echo "<script>location.replace('main.php');</script>";
        exit;
    }
?>