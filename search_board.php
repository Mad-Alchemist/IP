<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="./css/board.css" type="text/css">
</head>

<body>
    <?php
    $b_num=$_POST['b_num'];
    $title=$_POST['title'];
    $connect = mysqli_connect('127.0.0.1', 'root', '', 'web') or die("connect failed");
    $query = "select * from board where b_num='$b_num' and title like '%$title%' order by number desc";    //역순 출력
    $result = mysqli_query($connect, $query);
    //$result = $connect->query($query);
    $total = mysqli_num_rows($result);  //result set의 총 레코드(행) 수 반환
    $url=$_SERVER['HTTP_REFERER'];
    if($total==0)
    {  
        echo "<script>alert('검색 결과가 존재하지 않습니다.');</script>";
        echo "<script>location.href='$url'</script>";
    }
    ?>
    <a href="main.php">
     <img src="./img/title.png" class="home">
        </a>
    <p style="font-size:25px; text-align:center"><b>검색 결과</b></p>
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
                    <td width="50" align="center"><?php echo $total ?></td>
                    <td width="500" align="center">
                        <a href="view.php?number=<?php echo $rows['number'] ?>">
                            <?php echo $rows['title'] ?>
                    </td>
                    <td width="100" align="center"><?php echo $rows['name'] ?></td>
                    <td width="200" align="center"><?php echo $rows['date'] ?></td>
                    <td width="50" align="center"><?php echo $rows['hit'] ?></td>
                    </tr>
                <?php
                $total--;
            }
                ?>
        </tbody>
    </table>
</body>

</html>