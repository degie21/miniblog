<?php

include 'header.php';

$username = $email = $password = $confpassword = $userErr = $emailErr = $passwordErr = $confpasswordErr = $result = "";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if(empty($_POST["username"])){
        $userErr = "Username is required!";
    }else{
        $username = $_POST["username"];
    }
    if(empty($_POST["email"])){
        $emailErr = "Email is required!";
    }else{
        $email = $_POST["email"];
    }
    if(empty($_POST["password"])){
        $passwordErr = "Password is required!";
    }else{
        $password = $_POST["password"];
    }
    if(empty($_POST["confpassword"])){
        $confpasswordErr = "Confirm Password is required!";
    }else{
        $confpassword = $_POST["confpassword"];
    }
    if($username && $email && $password && $confpassword){
        if($password != $confpassword){
            $confpasswordErr = "Password is not the same";
        }else{
            $query = "INSERT into user ( username, email, password) VALUES ('$username', '$email' , '$password')";
            $qresult  = mysqli_query($connections, $query);
            if ($qresult){
                $result = "Successfully Registered";
            }else{
                $result = "Error";
            }
        }
    }
}

?>

 <h2 class="register">Registration</h2>
 <?php echo $result ?>
<div class="container">
    <h2 class="loginTitle">See the Registration Rules</h2>
    <form method="POST">
        <input class="form-control" name="username" type="text" placeholder="Enter Username" value="<?php echo $username ?>">
        <span><?php echo $userErr; ?></span>
        <input class="form-control" name="email" type="email" placeholder="Enter Email" value="<?php echo $email ?>">
        <span><?php echo $emailErr; ?></span>
        <input class="form-control" name="password" type="password" placeholder="Enter Password" value="<?php echo $password ?>">
        <span><?php echo $passwordErr; ?></span>
        <input class="form-control" name="confpassword" type="password" placeholder="Confirm Password"  value="<?php echo $confpassword ?>">
        <span><?php echo $confpasswordErr; ?></span>
        <input type="submit" class="btn" value="Register">
        <p>Return to the <a href="./">LOGIN PAGE</a></p>
    </form>
</div>

<?php

include 'footer.php';

?>