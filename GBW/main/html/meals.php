<?php
  require_once('config.php');

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

	if(!$conn){
   	die('could not connect' . mysqli_error());
  } 
    echo 'Meals';
    echo 'CONNECTED TO DB';
//test
 ?>

<html lang="en" class="no-js">
<head>
  <!-- <link rel="stylesheet" href="css/view-recipe.css"> -->
  <link rel="stylesheet" href="css/demo.css"> 
</head>
  <body>
    <header>
     <?php include 'header.php';?>
    </header>

    <div class="cd-intro">
		<h1>Meals</h1>
	</div>

  </body>

</html>
