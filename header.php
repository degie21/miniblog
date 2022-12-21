<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniBlog</title>
    <link rel="stylesheet" href="http://localhost/miniblog/css/style.css">
    <?php
						session_start();
    
        $username ="";
        include 'conn.php';
        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
            $usernameq = mysqli_query($connections, ("SELECT username FROM user WHERE user_id = '$user_id'"));
            while ($row = mysqli_fetch_assoc($usernameq)){
            $username = $row["username"];
            }
        }
    ?>
</head>
<body>
<header>
    <nav>
        <div class="logo">
            MiniBlog1
        </div>
        <div class="links">
            <?php
                if (!isset($_SESSION["user_id"])):
            ?>
                <a href="./">Login</a>
            <?php
                else:
            ?>
            <h4>Hi <?php echo $username ?>!</h4>
            <a href="./">Home</a>
            <a href="./logout.php">Logout</a>
            <?php
                endif;
            ?>
        </div>
    </nav>
</header>