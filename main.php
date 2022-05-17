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
<ul>
  <li><a class="Link" href="Lobby.html">Main</a></li>
  <li><a class="Link" href="Lunch.html">Lunch</a></li>
  <li><a class="Link" href="car.html">Go to Univ</a></li>
  <li><a class="Link" href="Market.html">Market</a></li>
  <li><a class="Link" href="Community.html">Community</a></li>
  <li><a class="Link" id="btl" href="javascript:Login_Open();">Login</a></li>
</ul>
</nav>

<div id="Login">
 <form method="post" id="authForm" action="loing.php">
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
          <input type="password" id="loginPw" name="password" placeholder="Password" maxlength="20" required>
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

</body>
</html>