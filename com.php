<?php
$connect = mysqli_connect("127.0.0.1", "root", "", "web") or die("fail");

$id = $_SESSION['id'];
$name=$_SESSION['name'];                //Writer             //Title
$comment = $_POST['comment'];           //Content
$date = date('Y-m-d H:i:s');            //Date
$b_num=$_POST['b_num'];


$query = "INSERT INTO comment (b_num, content, name, id, date) 
        values('$b_num', '$comment', '$name', '$id', '$date')";


$result = $connect->query($query);
if ($result) {
?> <script>
        alert("<?php echo "댓글이 등록되었습니다." ?>");
        location.replace("./main.php");
    </script>
<?php
} else {
    echo "댓글 등록에 실패하였습니다.";
}

mysqli_close($connect);
?>