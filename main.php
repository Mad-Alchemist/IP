<!DOCTYPE html>
<html>
<head>
<script src="./js/Login.js"></script>
<script src="./js/something.js"></script>
<title> AYU-LIFE </title>
</head>
<link rel="stylesheet" href="./css/a.css" type="text/css">
<link rel="stylesheet" href="./css/login.css" type="text/css">
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css"> 
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> 
<body style="background-color:black;">
<?php if (isset($_SESSION['name'])) { ?>
<p class="userName"><?php echo ($_SESSION['name']); ?>님 반갑습니다.</p>
<?php }?>

<nav id="TopBar">
  <ul>
    <li><a class="Link" href="main.php">메인 페이지</a></li>
    <li><a class="Link" href="inforboard.php">정보</a></li>
    <form id="bs" method="post" action="./board.php">
      <input type="hidden" id="b_num" name="b_num" value="">
      <li><a class="Link" onclick="subit(2)">카풀/택시</a></li>
      <li><a class="Link" onclick="subit(3)">마켓</a></li>
      <li><a class="Link" onclick="subit(4)">커뮤니티</a>
        
    </li>
  </form>
    <li>
  <?php if (isset($_SESSION['id'])){ ?>
    <a class="Link" id="btl" href="logout.php">로그아웃</a>
  <?php }
    else {?>
      <a class="Link" id="btl" href="javascript:Login_Open();">로그인</a>
    <?php }?>
    </li>
    </ul>
  </nav>

<div id="Login">
 <form method="post" id="authForm" action="login.php">
    <input type="hidden" name="redirectUrl" value="">
	<button type="button" class="LC" onclick="javascript:Login_Close();">X</button>
    <fieldset>
      <div class="box_login">
        <div class="inp_text">
          <label for="loginId" class="screen_out">아이디</label>
          <input type="email" id="loginId" name="loginId" placeholder="E-mail" required>
        </div>
        <div class="inp_text">
          <label for="loginPw" class="screen_out">비밀번호</label>
          <input type="password" id="loginPw" name="loginPw" placeholder="Password" maxlength="20" required>
        </div>
      </div>
      <button type="submit" class="btn_login">로그인</button>
      <div class="login_append">
    <button type="button" class="sbt" onclick="javascript:Sign_up_Open();">회원가입</button>
        </div>
      </div>
      
    </fieldset>
  </form>
</div>

<div id="sup">
  <form method="post" id="sform" action="./signup.php">
    <button type="button" class="SC" onclick="javascript:Sign_up_Close();">X</button>
    <fieldset>
      <div class="box_sup">
        <div class="inp_text">
          <label for="UName" class="screen_out">이름</label>
          <input type="text" id="UName" name="UName" placeholder="성명" maxlength="20" required>
        </div>
        <div class="inp_text">
          <label for="supID" class="screen_out">아이디</label>
          <input type="email" id="supID" name="supID" placeholder="E-mail" required>
        </div>
        <div class="inp_text">
          <label for="supPW" class="screen_out">비밀번호</label>
          <input type="password" id="supPW" name="supPW" placeholder="Password" maxlength="20" required>
        </div>
      </div>
      <button type="submit" class="btn_sup">회원가입</button>
    </fieldset>
  </form>
</div>
<div class="anim">
  <img class="MImg" src="./img/123.png" data-aos="fade" data-aos-duration="2000">
  <p id="T">아래로 스크롤 하여 확인하기 </p>
  <div class="aos" data-aos="fade-up-right" data-aos-duration="2000" data-aos-offset="800">
    <p class="intr">학교 생활에 대한 <br>정보가 필요하신가요?</p>
    </div>
  <div class="aos" data-aos="fade-up-left" data-aos-duration="2000" data-aos-offset="600">
    <p class="intr">당신을 위한 정보</p>
    </div>
  <div class="aos" data-aos="fade" data-aos-duration="2000" data-aos-offset="800">
    <img class="img" src="./img/img1.png">
    </div>
  <div class="aos" data-aos="fade-up-left" data-aos-duration="2000" data-aos-offset="800">
    <img class="img" src="./img/ex2.png">
    </div>
  <div class="aos" data-aos="fade-up-left" data-aos-duration="2000" data-aos-offset="800">
    <img class="img" src="./img/ex2.png">
    </div>
  <div class="aos" data-aos="fade-up-left" data-aos-duration="2000" data-aos-offset="800">
    <img class="img" src="./img/ex2.png">
    </div>
  <div class="aos" data-aos="fade-up-left" data-aos-duration="2000" data-aos-offset="800">
    <img class="img" src="./img/ex2.png">
  </div>
</div>

<script> 
  AOS.init(); 
  </script>
</body>
</html>