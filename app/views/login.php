<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="../../public/css/login.css">
</head>

<body>

	<div class="center">
		<h1>Login</h1>
		
		<form action="../controllers/AuthUser.php" method="POST" autocomplete="off">
			<div class="txt_field">
				<input type="email" name="email" id="email" required>
				<span></span>
				<label>E-mail</label>
			</div>
			<div class="txt_field">
				<input type="password" name="password" id="password" required>
				<span></span>
				<label>Password</label>
			</div>
			<div class="pass">Forgot the password?</div>
			<input type="submit" value="Login">
				<?php
            	if (isset($_SESSION["error"]))
            	{
                	echo "<div class='error'>$_SESSION[error]</div>";
            	}	
            		unset($_SESSION["error"]);
        		?>
			<div class="signup_link">
				Don't have an account? <a href="register.php">Subscribe</a>
			</div>
		</form>
	</div>

</body>

</html>