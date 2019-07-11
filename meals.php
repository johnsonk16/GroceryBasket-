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

    <div class="cd-intro">
		  <h1>Meals</h1>
	   </div>
<?php
    $numRecipes = 0; //# of recipes user has added to meals
    
  

?>
     <!-- 'You have no meals' type of message -->
     <div class="message-no-meals">
       <p>You have no meals saved currently. Start exploring...</p>
       <div class="cd-nugget-info">
          <a href="home.php">Explore</a>
        </div> 
     </div>

  </body>

</html>
