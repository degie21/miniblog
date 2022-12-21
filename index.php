
<?php
include 'header.php';
if(isset($_SESSION["user_id"])){
    $username = $_SESSION["user_id"];
    echo "<script>window.location.href='blogs';</script>";
    echo "login success";
}
include 'login.php';
include 'footer.php';
?>
    