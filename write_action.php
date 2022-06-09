<?php
$connect = mysqli_connect("127.0.0.1", "root", "", "web") or die("fail");

$id = $_SESSION['id'];
$name=$_SESSION['name'];                //Writer
$title = $_POST['title'];               //Title
$content = $_POST['content'];           //Content
$date = date('Y-m-d H:i:s');            //Date
$b_num=$_POST['b_num'];

$URL = './board.php';                   //return URL


$query = "INSERT INTO board (b_num,number, title, content, name, id, date, hit) 
        values($b_num,null,'$title', '$content', '$name', '$id', '$date', 0)";


$result = $connect->query($query);
if ($result) {
?> <script>
        alert("<?php echo "게시글이 등록되었습니다." ?>");
        location.replace("<?php echo $URL ?>");
    </script>
<?php
} else {
    echo "게시글 등록에 실패하였습니다.";
}

mysqli_close($connect);
?>