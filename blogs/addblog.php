<?php

    include '../header.php';
    $post_title = $post_content = $titleErr = $contentErr = $result = "";
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        if(empty($_POST["post_title"])){
            $titleErr = "Title is required!";
        }else{
            $post_title = $_POST["post_title"];
        }
        if(empty($_POST["post_content"])){
            $contentErr = "Title is required!";
        }else{
            $post_content = $_POST["post_content"];
        }
        if($post_title && $post_content){
            date_default_timezone_set('Asia/Manila');
            $now = date_create()->format('Y-m-d H:i:s');
            $user_id = $_SESSION["user_id"];
            $query = "INSERT into blog ( user_id, blog_title, blog_content, date_time) VALUES ('$user_id','$post_title', '$post_content' , '$now')";
            $qresult  = mysqli_query($connections, $query);
            if ($qresult){
                $result = "Successfully Added Blog";
            }else{
                $result = "Error";
            }
        }
    }
?>
<div class="container addblog">
    <form method="post">
    <h3>Create a Post!</h3>
    <h5><?php echo $result ?></h5>
        <input type="text" name="post_title" placeholder="Enter Title" value="<?php echo $post_title; ?>">
        <span><?php echo $titleErr; ?></span>
        <textarea oninput="autoHeight(this)" name="post_content" id="" placeholder="Enter Content"><?php echo $post_content; ?></textarea>
        <span><?php echo $contentErr; ?></span>
        <input type="submit" value="Post">
    </form>
</div>
<script>
    function autoHeight(element){
        element.style.height=(element.scrollHeight)+'px';
    }
</script>
<?php

    include '../footer.php';

?>