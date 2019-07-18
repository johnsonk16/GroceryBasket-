<?php

  require_once('config.php');

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

 if(!$conn){
    die('could not connect' . mysqli_error());
  }
  ?>

              function addToFavorites(){
        
              //add recipe and user id to favorites table
                <?php
                //if Rec/Usr ID combo in DB, it will be removed, else it'll be added
                //needs to be fixed so JS doenst run on page reload  (7/16) - kristin
                $favCheckSQL = "SELECT Recipe_ID FROM Favorites WHERE Recipe_ID = '".$recipeID."'AND User_ID = ".$_SESSION['id'];
                $favCheck = mysqli_query($conn, $favCheckSQL);
                $numFavs = mysqli_num_rows($favCheck);
                $msg=""; 


                if ($numFavs == 0){
                $sqlF = "INSERT INTO Favorites VALUES (".$recipeID.", ".$_SESSION['id'].")";
                $inputF = mysqli_query($conn,$sqlF);
                $msg = "Added to Favorites";
                }

                else {
               
                $rmFav = "DELETE FROM `Favorites` WHERE Recipe_ID = '".$recipeID."' AND User_ID ='".$_SESSION['id']."'";
                  $rm = mysqli_query($conn,$rmFav);
                  $msg = "Removed from Favorites";
                }

                ?>

                  alert(<? echo $numFavs ?>);
                }
              

