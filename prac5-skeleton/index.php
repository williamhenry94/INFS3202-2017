<?php
	session_start();
	if(!isset($_SESSION['secret'])){
		header('Location: login.php');
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
	<h1 class="black">Personal Page</h1>
	<div id="avator"></div>

	<section class="about">
		<p class="black">Hi, my name is John Don and I am currently a <a href="https://www.uq.edu.au/">UQ</a> student enrolled in INFS3202.</p>
	</section>

	<section id="contact" class="contact">
		<ul>
			<li>
				<a href="mailto:John.Don@uq.edu.au">email</a>
			</li>
			<li>
				<a href="logout.php">Logout</a>
			</li>
			<li>
			
			</li>
		</ul>
	</section>
<style>
.education{
}
</style>
	<section class="education black">
		<h1>Education</h1>
		<table>
			<thead>
				<tr>
					<td>ID</td>
					<td>Degree</td>
					<td>Time</td> 
					<td>Location</td>
					<td>Operations</td>
				</tr>
		  	</thead>
		  <tbody id="education-history">
		  </tbody>
		  
		 
		  </tr>
			
		</table>
	</section>
	<section class="black">
		<div>
			
			Degree: <input type="text" name="degree" id="degree">
			<br>
			Time: <input type="text" name="time" id="time">
			<br>
			Location: <input type="text" name="location" id="location">
			<br>
			<button id="send">Submit</button>
			<button id="reset">Reset</button>
		</div>

	</section>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
	<script src="js/main.js"></script>
	<script src="js/education.js"></script>
</body>
</html>