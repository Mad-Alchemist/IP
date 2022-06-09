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
        $_SESSION['permission']=$row['permission'];
        echo "<script>location.replace('main.php');</script>";
        mysqli_close($con);
    }
    else
    {
        echo "<script>alert('아이디 혹은 비밀번호를 확인해 주십오')</script>";
        echo "<script>location.replace('main.php');</script>";
        mysqli_close($con);
    }
?>