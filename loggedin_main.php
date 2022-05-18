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