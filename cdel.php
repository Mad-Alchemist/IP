<?php
$connect = mysqli_connect('127.0.0.1', 'root', '', 'web') or die("connect failed");
$number = $_GET['number'];

$query = "select id from comment where number = $number";
$result = $connect->query($query);
$rows = mysqli_fetch_assoc($result);

$userid = $rows['id'];

?>

<?php
if (!isset($_SESSION['id'])) {
?> <script>
        alert("권한이 없습니다.");
        location.replace("main.php");
    </script>

<?php } else if ($_SESSION['id'] == $userid) {
    $query1 = "delete from comment where number = $number";
    $result1 = $connect->query($query1); ?>
    <script>
        alert("댓글이 삭제되었습니다.");
        location.replace("main.php");
    </script>

<?php } else { ?>
    <script>
        alert("권한이 없습니다.");
        location.replace("main.php");
    </script>
<?php }
?>