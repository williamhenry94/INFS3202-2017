<?php
	session_start();
	if (isset($_SESSION['username']) && isset($_SESSION['password'])){
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Portfolio</title>
	<link href="images/avator.ico" type="image/x-icon" rel="shortcut icon"/>
  	<link href="images/avator.ico" type="image/x-icon" rel="icon"/>
	<link rel="stylesheet" href="styles/main.css">
</head>
<body>
	<h1 class="black">Login Page</h1>
	<div id="avator"></div>
	<section class="education">
		<?php
			if(isset($_SESSION['error'])){
				echo "<p class='red'>".$_SESSION['error']."</p>";
			};
		?>
		<form method="POST" action="authenticate.php">
            <p class="black">
				username:<input type="text" placeholder="username" name="username"/>
			</p>
            <p class="black">
				password:<input type="password" placeholder="password" name="password"/>
			</p>
            <input type="submit" value="Login" name="login"/>
        </form>
	</section>

	<script src="js/main.js"></script>
</body>
</html>