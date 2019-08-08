<?php
error_reporting(E_ERROR | E_PARSE);
  session_start();
  
  $_SESSION['email'];
  $_SESSION['id'];

  require_once('config.php');

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

 if(!$conn){
    die('could not connect' . mysqli_error());
  }

  if (isset($_GET['data'])){
  $recipeID = $_GET['data'];}
  else
    echo "ERROR";

$CheckSQL = "SELECT Recipe_ID FROM Favorites WHERE Recipe_ID = '".$recipeID."'AND User_ID = ".$_SESSION['id'];
    $Check = mysqli_query($conn, $CheckSQL);
    $num = mysqli_num_rows($Check);
        
        if ($num == 0){
            $sqlM = "INSERT INTO Favorites VALUES (".$recipeID.", ".$_SESSION['id'].")";
                $inputM = mysqli_query($conn,$sqlM);
               
                echo "Added to Favorites";
                }
        else {
          $rmMeal = "DELETE FROM `Favorites` WHERE Recipe_ID = '".$recipeID."' AND User_ID ='".$_SESSION['id']."'";
            $rm = mysqli_query($conn,$rmMeal);
            
              echo "Removed from Favorites";
               
             }

  ?>

  <body onload="window.location.href = 'viewRecipe.php?Recipe_ID=<?php echo $recipeID?>'"/>