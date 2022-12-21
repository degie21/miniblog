<?php
    $connections = mysqli_connect("localhost","root","","miniblog");
    $id = $_REQUEST["id"];
    $blog_title = $_REQUEST["blogtitle"];
    mysqli_query($connections, ("DELETE FROM blog WHERE id = '$id'"));
    echo "Sucessfully Deleted " . $blog_title;

    echo "<script>window.location.href='./index.php';</script>";
?>