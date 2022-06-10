<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>정보 게시판</title>
    <link rel="stylesheet" href="./css/infor.css" type="text/css">
</head>

<body>
<?php
    $connect = mysqli_connect('127.0.0.1', 'root', '', 'web') or die("connect failed");
    $query = "select * from board where b_num=1 order by number desc limit 5";    //역순 출력
    $result = mysqli_query($connect, $query);
    //$result = $connect->query($query);
    $total = mysqli_num_rows($result);  //result set의 총 레코드(행) 수 반환
    ?>
    <a href="main.php">
     <img src="./img/title.png" class="home">
        </a>
    <p style="font-size:50px; color:gray; text-align:center"><b>정보 게시판</b></p>
	
    <table align=center>
        <thead align="center">
			<tr>
               <td align="center">제목</td>
                <td colspan="2">
                    <form method="post" action="./search_board.php">
                        <input type="hidden" name="b_num" value=1>
                        <input type="text" name="title" style="width:600px;" align="center" required />
                        <button class="sbtn" type="submit" name="search">검색</button>
                        </form>
                    </td>
                <td>
                    <form method="post" action="board.php">
                        <input type="hidden" name="b_num" value=1>
                        <button type="submit" class="mo" href="./board.php">더보기</a>
                        </form>
                </td>
				
                
            <tr>
                <td width="50" align="center">번호</td>
                <td width="800" align="center">제목</td>
                <td width="200" align="center">날짜</td>
                <td width="50" align="center">조회수</td>
            </tr>
            <div>
        </div>
        </thead>

        <tbody>
        
            <?php
            while ($rows = mysqli_fetch_assoc($result)) { //result set에서 레코드(행)를 1개씩 리턴
                if ($total % 2 == 0) {
            ?>
                    <tr class="even">
                        <!--배경색 진하게-->
                    <?php } else {
                    ?>
                    <tr>
                        <!--배경색 그냥-->
                    <?php } ?>
                    <form method="post" action="view.php?number=<?php echo $rows['number'] ?>">
                    <td width="50" align="center"><?php echo $total ?></td>
                    <td width="500" align="center">
                        <input type="hidden" name="b_num" value="1">
                        <button type="submit" class="tle">
                            <?php echo $rows['title'] ?></button>
                    </td>
                    <td width="200" align="center"><?php echo $rows['date'] ?></td>
                    <td width="50" align="center"><?php echo $rows['hit'] ?></td>
                    </form>
                    </tr>
                    
                <?php
                $total--;
            }
                ?>
	
    <td colspan="2" rowspan="2">
        <div align=left>홍보 게시판-> 💪제 1회 수도권 대학생 팔씨름 대회-팔로워(WAR)💪</div><br>

        <table class="tb1" border="1">
            <tr>
                <th colspan="6" align="center">안양대 동아리</th>
            </tr>
            <tbody>
            
                <td><img class="img" src="./img/동아리1.jpg"></td>
                <td><img class="img" src="./img/동아리2.jpg"></td>
                <td><img class="img" src="./img/동아리3.jpg"></td>
                <td><img class="img" src="./img/동아리4.jpg"></td>
                <td><img class="img" src="./img/동아리5.jpg"></td>
            </tr>
            
            </tbody>
        </table>
    </td>
    <td colspan="1">
        <img id="img" src="./img/배차간격.png">
        
    </td>
	

        </tbody>
    </table>
<?php if (isset($_SESSION['permission'])!=NULL){?>
    <form method="post" action="./write.php">
    <div class=text>
            <input type="hidden" value=1 name="b_num">
                <button type="submit">글쓰기</button>
            </div>
        </form>
<?php }?>
</body>

</html>