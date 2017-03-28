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
		  <tr>
		    <td>Degree</td>
		    <td>Time</td> 
		    <td>Location</td>
		  </tr>
		  <tr>
		    <td>Bachelor</td>
		    <td>2011-2015</td> 
		    <td>Queensland, Australia</td>
		  </tr>
		  <tr>
		    <td>PhD</td>
		    <td>2016-2019</td> 
		    <td>Queensland, Australia</td>
		  </tr>
		</table>
	</section>

	<script src="js/main.js"></script>
</body>
</html>