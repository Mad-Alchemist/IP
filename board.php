<?php
    $b_num=$_POST['b_num'];
    ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Board</title>
    <?php if ($b_num==1){?>
        <link rel="stylesheet" href="./css/board.css" type="text/css">
    <?php } else if($b_num==2){?>
        <link rel="stylesheet" href="./css/board2.css" type="text/css">
    <?php } else if($b_num==3){?>
        <link rel="stylesheet" href="./css/board3.css" type="text/css">
    <?php } else if($b_num==4){?>
        <link rel="stylesheet" href="./css/board.css" type="text/css">
        <?php }?>
</head>

<body>
    <?php
    $connect = mysqli_connect('127.0.0.1', 'root', '', 'web') or die("connect failed");
    $query = "select * from board where b_num='$b_num' order by number desc";    //역순 출력
    $result = mysqli_query($connect, $query);
    //$result = $connect->query($query);
    $total = mysqli_num_rows($result);  //result set의 총 레코드(행) 수 반환
    ?>
    <a href="main.php">
     <img src="./img/title.png" class="home">
        </a>
    <?php if($b_num==1){ ?>
    <p style="font-size:25px; text-align:center"><b>정보 게시판</b></p>
    <?php }
    else if($b_num==2)
    {?>
        <p style="font-size:25px; text-align:center"><b>카풀 혹은 택시</b></p>
        <?php }
    else if($b_num==3)
    {?>
    <div class="skgus">
        <img class="img1"src="./img/carrot.png">
        <p style="font-size:25px; text-align:center"><b>아냥 마켓</b></p>
        <img class="img2" src="./img/book.png">
    </div>
        <?php }
    else if($b_num==4)
    {?>
        <p style="font-size:25px; text-align:center"><b>커뮤니티</b></p>
    <?php }?>
    <table align=center>
        <thead align="center">
            <tr>
                <td width="50" align="center">번호</td>
                <td width="500" align="center">제목</td>
                <td width="100" align="center">작성자</td>
                <td width="200" align="center">날짜</td>
                <td width="50" align="center">조회수</td>
            </tr>
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
                        <input type="hidden" name="b_num" value="<?php echo $b_num;?>">
                        <button type="submit" class="tle">
                            <?php echo $rows['title'] ?></button>
                    </td>
                    <td width="100" align="center"><?php echo $rows['name'] ?></td>
                    <td width="200" align="center"><?php echo $rows['date'] ?></td>
                    <td width="50" align="center"><?php echo $rows['hit'] ?></td>
                    </form>
                    </tr>
                    
                <?php
                $total--;
            }
                ?>
        </tbody>
    </table>
    
    <div class=text>
        <?php if (isset($_SESSION['id'])){?>
            <form method="post" action="./write.php">
                <input type="hidden" value=<?php echo $b_num ?> name="b_num">
                <button class="sbtn" type="submit">글쓰기</button>
            </form>
        <?php }?>
    </div>
</body>

</html>