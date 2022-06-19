<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <?php
    $b_num=$_POST['b_num'];
     if ($b_num==1){?>
        <link rel="stylesheet" href="./css/view.css" type="text/css">
    <?php } else if($b_num==2){?>
        <link rel="stylesheet" href="./css/view.css" type="text/css">
    <?php } else if($b_num==3){?>
        <link rel="stylesheet" href="./css/view3.css" type="text/css">
    <?php } else if($b_num==4){?>
        <link rel="stylesheet" href="./css/view4.css" type="text/css">
        <?php }?>
</head>

<body>
    <?php
    $connect = mysqli_connect('127.0.0.1', 'root', '', 'web');
    $number = $_GET['number'];  // GET 방식 사용
    $query = "select title, content, date, hit, name, id from board where number = $number";
    $result = $connect->query($query);
    $rows = mysqli_fetch_assoc($result);
    $connect->query("update board set hit=hit+1 where number=$number");

    $cquery="select number, name, content, date, id from comment where $number=b_num";
    $cresult=$connect->query($cquery);
    ?>
    <table class="read_table" align=center>
        <tr>
            <td colspan="4" class="read_title"><?php echo $rows['title'] ?></td>
        </tr>
        <tr>
            <td class="read_id">작성자</td>
            <td class="read_id2"><?php echo $rows['name'] ?></td>
            <td class="read_hit">조회수</td>
            <td class="read_hit2"><?php echo $rows['hit'] ?></td>
        </tr>


        <tr>
            <td colspan="4" class="read_content" valign="top">
                <?php echo $rows['content'] ?></td>
        </tr>
        <tr>
            <td width="50px" class="com" align="center">작성자</td>
            <td width="600px" class="com" align="center">댓글</td>
            <td width="150px" class="com" align="center">작성시간</td>
            </tr>
        <tbody>
            <?php
            while ($crows = mysqli_fetch_assoc($cresult)){?>
            <tr>
            <td width="50px" align="center"><?php echo $crows['name']?></td>
            <td width="600px" align="center"><?php echo $crows['content']?></td>
            <td width="150px" align="center"><?php echo $crows['date']?></td>
            <?php if (isset($_SESSION['id']) && $crows['id']==$_SESSION['id']){?>
            <td width="100px" align="right"><button class="codel" a onclick="cask();">삭제</button>
            <script>
            function cask() {
                if (confirm("댓글을 삭제하시겠습니까?")) {
                    window.location = "./cdel.php?number=<?= $crows['number']?>"
                }
            }
            </script>
            </tr>
            <?php } } ?>
            </td>
        <?php if (isset($_SESSION['name'])){?>
        <tr>
            <form method="POST" action="./com.php">
            <td width="50px" align="center"><?php echo $_SESSION['name']?></td>
            <td width="600px" align="center">
                    <textarea name="comment" cols=75 rows=3 required></textarea>
                    <input type="hidden" name="b_num" value="<?php echo $number?>">
                </td>
            <td width="150px" align="center">
                <button class="cbtn" type="submit"> 댓글 작성
             </button>
             </td>
             </form>
            </tr>
            <?php } ?>
            
            
            </tbody>
    </table>

    <!-- MODIFY & DELETE 추후 세션처리로 보완 예정 -->
    <div class="read_btn">
        <form method="post" action="./board.php" style="display:inline;">
            <input type="hidden" name="b_num" value="<?php echo $b_num ?>">
            <button type="submit" class="read_btn1">목록</button>&nbsp;&nbsp;
        </form>
        <?php
        if (isset($_SESSION['id']) && $_SESSION['id'] == $rows['id']) { ?>
            <button class="read_btn1" onclick="location.href='./modify.php?number=<?= $number ?>'">수정</button>&nbsp;&nbsp;
            <button class="read_btn1" a onclick="ask();">삭제</button>

            <script>
            function ask() {
                if (confirm("게시글을 삭제하시겠습니까?")) {
                    window.location = "./delete.php?number=<?= $number ?>"
                }
            }
            </script>
        <?php } ?>
    </div>


</body>

</html>