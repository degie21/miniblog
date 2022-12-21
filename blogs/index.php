<?php

include '../header.php';
$counter = 0;
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
}
else{
    echo "<script>window.location.href='../index.php';</script>";
}
    $q = "SELECT * FROM blog WHERE user_id = $user_id";
    $query = mysqli_query($connections, $q);
	$c_q = mysqli_num_rows($query);
    if($c_q != 0):
    while ($row = mysqli_fetch_assoc($query)):
            $counter++;
            $blog_id = $row["id"];
            $blog_title = $row["blog_title"];
            $blog_content = $row["blog_content"];
            $date_time = $row["date_time"];
            $day = date('jS \o\f F Y H:i:s A', strtotime($date_time));
        ?>
        <div class="container">
            <div class="blog-details">
                <div class="title">
                    <?php echo $blog_title; ?>
                </div>
                <div class="content">
                    <?php echo $blog_content; ?>
                </div>
                <div class="datetime">
                    Date <?php echo $day ?>
                </div>
            </div>
            <div class="blog_link">
                <a class='blog_delete btn' href='./deleteblog.php?id=<?php echo $blog_id ?>' onclick="confirmDelete()">Delete</a>
                <a class='blog_edit btn' href="./editblog.php?id=<?php echo $blog_id ?>">Edit</a>
            </div>
        </div>
        <?php
    endwhile;
    else:
?>

<h2 class="center">No Blog Created</h2>
<?php
endif;
?>
<div class="container blog">
    <a class="addblog" href="./addblog.php">CREATE A NEW POST</a>
</div>
<script>
    function confirmDelete()
{
   if(confirm("Are you sure ?")){
        window.location.href = './deleteblog.php';
     return true;
   }else{
    return false;
   }
  
}
</script>
<?php

include '../footer.php';

?>