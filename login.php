
<?php

$username = $password = "";
$usernameErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	if (empty($_POST["username"])) {
		$usernameErr = "Username is required!";
	}
	else{
		$username = $_POST["username"];
	}
	if (empty($_POST["password"])) {
		$passwordErr = "Password is required!";
	}
	else{
		$password = $_POST["password"];
	}
	if($username && $password){
		$check_username = mysqli_query($connections,"SELECT * FROM user WHERE username='$username'");
		$check_username_row = mysqli_num_rows($check_username);
		if($check_username_row > 0){
			while ($row = mysqli_fetch_assoc($check_username)) {
				$db_password = $row["password"];
				if ($password == $db_password) {
						$user_id = $row["user_id"];
						$_SESSION["user_id"] = $user_id;
						echo "<script>window.location.href='blogs'</script>";

				}else{
					$passwordErr = "Incorrect password!";
				}
			}
		}else{
			$usernameErr = "Username is not registered!";
		}
	}
}

?>
<div class="container">
	<h2 class="loginTitle">Login</h2>
    <form  method="POST">
        <input class="form-control" type="text" name="username" placeholder="Username" value="<?php echo $username ?>">
        <span class="error"><?php echo $usernameErr; ?></span>
        <input class="form-control" type="password" name="password" placeholder="Password">
        <span class="error"><?php echo $passwordErr; ?></span>
		<div>
			<input type="submit" class ="btn" value="LOGIN">
			<a href="./register.php">REGISTER</a>
		</div>
		<p>Currently logged out.</p>
    </form>
</div>
