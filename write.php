<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="./css/write.css" type="text/css">
</head>

<body>
    <?php $turl='./main.php'?>
    <form method="post" action="write_action.php">
        <!-- method : POST!!! (GET X) -->
        <table style="padding-top:50px" align=center width=auto border=0 cellpadding=2>
            <tr>
                <td style="height:40; float:center; background-color:#3C3C3C">
                    <p style="font-size:25px; text-align:center; color:white; margin-top:15px; margin-bottom:15px"><b>게시글 작성하기</b></p>
                </td>
            </tr>
            <tr>
                <td bgcolor=white>
                    <table class="table2">
                        <tr>
                            <td>제목</td>
                            <td><input type="text" name="title" size=70></td>
                        </tr>

                        <tr>
                            <td>내용</td>
                            <td><textarea name="content" cols=75 rows=15></textarea></td>
                        </tr>
                
                    </table>
                    <input type="hidden" value=<?php echo $_POST['b_num']?> name="b_num">
                    <input type="hidden" value=<?php echo $turl?> name="turl">
                    <center>
                        <input style="height:26px; width:47px; font-size:16px;" type="submit" value="작성">
                    </center>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>