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
        <link rel="stylesheet" href="./css/view.css" type="text/css">
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