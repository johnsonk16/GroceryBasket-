<?php
  require_once('config.php');

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

	if(!$conn){
   	die('could not connect' . mysqli_error());
  } 
    // echo 'Meals';
    // echo 'CONNECTED TO DB';
//test
 ?>

<html lang="en" class="no-js">
<head>
  <link rel="stylesheet" href="css/reset.css"> 
  <link rel="stylesheet" href="css/home.css"> 
  <link rel="stylesheet" href="css/demo.css"> 
<!--   <link rel="stylesheet" href="css/meals.css">
 -->
</head>
  <body>
    <header>
     <?php include 'header.php';?>
    </header>

    <!-- <div class="cd-intro">
		  <h1>Meals</h1>
	   </div>
    <?php
      $numRecipes = 0; //# of recipes user has added to meals
    ?> -->

    <div class="split left">
      <div class="centered">
        <h2>Meals</h2>
        <div class="message-no-meals">
          <p>You have no meals saved currently. Start exploring...</p>
          <div class="cd-nugget-info">
            <a href="home.php">Explore</a>
          </div> 
        </div>
      </div>
    </div>

    <div class="split right">
      <div class="centered">
        <h2>Favorites</h2>
        <div class="message-no-meals">
          <p>You have no favorites saved currently. Start exploring...</p>
          <div class="cd-nugget-info">
            <a href="home.php">Explore</a>
          </div> 

         <!-- TODO: add carasoul from favorites to be added -->

        </div>
      </div>
    </div>

<script src="js/meals-favorite.js"></script>
</body>

</html>
