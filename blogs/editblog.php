<?php

    include '../header.php';
	$id = $_REQUEST["id"];
    $blog_title = $blog_content = $titleErr = $contentErr = $result = "";
    $blogs = mysqli_query($connections, "SELECT * FROM blog where id = '$id'");
    $get_blogs_row = mysqli_num_rows($blogs);
    while ($row = mysqli_fetch_assoc($blogs)){
        $blog_title = $row["blog_title"];
        $blog_content = $row["blog_content"];
    }
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $blog_title = $_POST["blog_title"];
        $blog_content = $_POST["blog_content"];
        if($blog_title && $blog_content){
            $query = mysqli_query($connections, "UPDATE blog SET blog_title = '$blog_title', blog_content = '$blog_content' WHERE id='$id'");
            if ($query){
                $result = "Blog Successfuly Edited!";
            }else{
                $result = "Error";
            }
        }
    }
?>
<div class="container editblog">
    <h3>Edit Post - <?php echo $blog_title ?></h3>
    <h5><?php echo $result ?></h5>
    <form method="post">
        <input type="text" name="blog_title" placeholder="Enter Title" value="<?php echo $blog_title; ?>">
        <span><?php echo $titleErr; ?></span>
        <textarea name="blog_content" id="" placeholder="Enter Content"><?php echo $blog_content; ?></textarea>
        <span><?php echo $contentErr; ?></span>
        <input type="submit" value="SAVE">
    </form>
</div>

<?php

    include '../footer.php';

?>