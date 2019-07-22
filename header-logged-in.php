<?php
    // session_start();
  	require_once('config.php');

  	$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

	if(!$conn){
   		die('could not connect' . mysqli_error());
  	} 
   
    //echo 'CONNECTED TO DB';
 ?>

<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/home.css"> <!-- Resource style -->
	<link rel="stylesheet" href="css/demo.css"> <!-- Demo style -->
  	
	<title>Grocery Basket</title>
</head>
<body>
	<header class="cd-main-header">
		<div class="cd-main-header__logo">
			<h1>Grocery Basket <br> Hi, <b><?php echo htmlspecialchars($_SESSION['email']); ?></b></h1>
		</div>

		<nav class="cd-main-nav js-main-nav">
			<ul class="cd-main-nav__list js-signin-modal-trigger">
				<li><a class="cd-main-nav__item cd-main-nav__item--home" href="home.php">Home</a></li>
				<li><a class="cd-main-nav__item cd-main-nav__item--meals" href="meals.php">Meals</a></li>
				
				<!-- inser more links here -->
				<li><a class="cd-main-nav__item cd-main-nav__item--signin" href="signout.php" data-signin="login">Log out</a></li>
				<!--<li><a class="cd-main-nav__item cd-main-nav__item--signup" href="#0" data-signin="signup">Sign up</a></li> -->

				<!-- TODO: print username when logged in and use this header-logged-in.php file instead of header.php when logged in -->
				<!-- <li><a class="cd-main-nav__user-name cd-main-nav__item--username" href="#">Hello, User</a></li> -->
				
			</ul>
		</nav>
	</header>

<script src="js/placeholders.min.js"></script> <!-- polyfill for the HTML5 placeholder attribute -->
<script src="js/main.js"></script> <!-- Resource JavaScript -->
</body>


</html>