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
  <link rel="stylesheet" href="css/meals.css">

</head>
  <body>
    <header>
     <?php include 'header.php';?>
    </header>

    <!-- <div class="cd-intro">
		  <h1>Meals</h1>
	   </div>

     <div class="message-no-meals">
       <p>You have no meals saved currently. Start exploring...</p>
       <div class="cd-nugget-info">
          <a href="home.php">Explore</a>
        </div> 
     </div> -->

    <div class="meals-page"> <!-- meals page below header-->
      <div class="meals-page__container"> <!-- this is the container wrapper -->
        <ul class="meals-page__switcher js-meals-page-switcher js-meals-page-trigger">
          <li><a href="#0" data-signin="meals" data-type="meals">Meals</a></li>
          <li><a href="#0" data-signin="favorites" data-type="favorites">Favorites</a></li>
        </ul>

      <div class="meals-page__block js-meals-page-block" data-type="meals"> <!-- meals -->
        <div class="message-no-meals">
          <p>You have no meals saved currently. Start exploring...</p>
          <div class="cd-nugget-info">
            <a href="home.php">Explore</a>
          </div> 
        </div>
      </div> <!-- meals block -->

      <div class="meals-page__block js-meals-page-block" data-type="favorites"> <!-- favorites -->
        <div class="message-no-favorites">
          <p>You have no favorites saved currently. Start exploring...</p>
          <div class="cd-nugget-info">
            <a href="home.php">Explore</a>
          </div> 
        </div>
      </div> <!-- favorites block -->

    </div> <!-- meals-page__container -->
  </div> <!-- meals page below header -->

  </body>

</html>
