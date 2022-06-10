<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="./css/view.css" type="text/css">
</head>

<body>
    <?php
    $connect = mysqli_connect('127.0.0.1', 'root', '', 'web');
    $number = $_GET['number'];  // GET 방식 사용
    $query = "select title, content, date, hit, name, id from board where number = $number and b_num=4";
    $result = $connect->query($query);
    $rows = mysqli_fetch_assoc($result);
    $uphit="update board set hit +=1;"
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
        <button class="read_btn1" onclick="location.href='./board.php'">목록</button>&nbsp;&nbsp;
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