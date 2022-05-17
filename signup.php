<?php
$con=mysqli_connect('127.0.0.1','root','','web');
if (mysqli_connect_errno())
  {
  echo "<script>alert('로그인 서버 연결에 실패하였습니다.')</script>";
  }
  else
  {
    $name=$_POST['UName'];
    $id=$_POST['supID'];
    $pwd=hash('sha256',$_POST['supPW']);
    $sid=mysqli_query($con,"SELECT id FROM members WHERE id='$id'");
    while ($checkid=mysqli_fetch_array($sid))
    {
      $id_e=$checkid['id'];
    }
    if($id==$id_e)
    {
      echo "<script>alert('중복된 아이디 입니다.')</script>";
      echo "<script>location.replace('main.php')</script>";
    }
    else{
      $sql="INSERT INTO members(id,password,name)  VALUES ('$id','$pwd','$name');";
      mysqli_query($con,$sql);
      echo "<script>alert('회원가입에 성공하였습니다.')</script>";
      echo "<script>location.replace('main.php')</script>";
    }
  }

?>
