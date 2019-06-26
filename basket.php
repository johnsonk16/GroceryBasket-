<?php
  require_once('config.php');

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

	if(!$conn){
   	die('could not connect' . mysqli_error());
  } 
   echo 'basket';
    echo 'CONNECTED TO DB';
 ?>

<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/home.css"> <!-- Resource style -->
  	<link rel="stylesheet" href="css/demo.css"> <!-- Demo style -->
  	
	<title>Grocery Basket</title>
</head>

<body>
	<header class="cd-main-header">
		<header>
     		<?php include 'header.php';?>
    	</header>
  	</header>

  	<br>
  	<div class="cd-intro">
  		<h1>Basket List</h1>  
	</div>


<script src="js/placeholders.min.js"></script> <!-- polyfill for the HTML5 placeholder attribute -->
<script src="js/main.js"></script> <!-- Resource JavaScript -->
</body>
</html> 
