<?php
  session_start();
  $_SESSION['email'];
  $_SESSION['id'];

  require_once('config.php');

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

 if(!$conn){
    die('could not connect' . mysqli_error());
  }

  $recipeID=$_GET["Recipe_ID"];

  $sql = "SELECT * FROM Recipes WHERE Recipe_ID=".$recipeID;
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);
  $recipeName = $data['Recipe_Name'];
  $recipeIMG= $data['Recipe_Img'];
  $timeID= $data['Time_ID'];
  $servings = $data['Serving'];
  $email = $_SESSION['email'];
 ?>

<html lang="en" class="no-js">
<head>
  <link rel="stylesheet" href="css/view-recipe.css">
   <script type="text/javascript" src = "favorite.js"></script>
</head>
  <body>
    <header>
    <?php
    if(isset($_SESSION["login"]) && $_SESSION["login"] == true) {
		include 'header-logged-in.php';
	} else {
		include 'header.php';
  } 
  ?>
    
    </header>

    <div id="main">
      <form method="post" id="child">
     <table class="center" id="searchFilters" align="center" cellpadding="2" cellspacing="5" border="0"> 

        <col width = 30%>
        <col witdh =70%>

<script type="text/javascript">
  
//if Rec/Usr ID combo in DB, it will be removed, else it'll be added
 //needs to be fixed so JS doenst run on page reload  (7/16) - kristin
 //hidden form
    function addToFavorites(){
      <?
    $favCheckSQL = "SELECT Recipe_ID FROM Favorites WHERE Recipe_ID = '".$recipeID."'AND User_ID = ".$_SESSION['id'];
    $favCheck = mysqli_query($conn, $favCheckSQL);
    $numFavs = mysqli_num_rows($favCheck);
        
        if ($numFavs == 0){
            $sqlF = "INSERT INTO Favorites VALUES (".$recipeID.", ".$_SESSION['id'].")";
                $inputF = mysqli_query($conn,$sqlF);
               ?>
                alert("Added to Favorites");
                <?
                }

        else {
          $rmFav = "DELETE FROM `Favorites` WHERE Recipe_ID = '".$recipeID."' AND User_ID ='".$_SESSION['id']."'";
            $rm = mysqli_query($conn,$rmFav);
               alert("Removed from Favorites");
             }

                ?>

                  
                }
</script>
  

          <script>
            function addToMeals(){
              $('.Delete').live('click',function(e){
              $(this).parent().remove();
              });
               <?php
                $mealCheckSQL = "SELECT Recipe_ID FROM Meals WHERE Recipe_ID = '".$recipeID."'AND User_ID = ".$_SESSION['id'];
                $mealCheck = mysqli_query($conn, $mealCheckSQL);
                $numMeals = mysqli_num_rows($mealCheck);
  
                if ($numMeals == 0){
                $sqlM = "INSERT INTO Meals VALUES (".$recipeID.", ".$_SESSION['id'].")";
                $inputM = mysqli_query($conn,$sqlM);
                ?>
                alert("Added to Meals");
                <?
                
                  }
                  

               // else {
               
               // $rmMeal = "DELETE FROM `Meals` WHERE Recipe_ID = '".$recipeID."' AND User_ID ='".$_SESSION['id']."'";
               //   $Mrm = mysqli_query($conn,$rmMeal);
               //  ?>
               // alert("Removed from Meals");
                <?
                //}

                ?>   
                }
          </script>
        <!-- Recipe Image -->
        <tr>
          <td colspan="2" id="imageCell" >
     <?php

               if($recipeIMG!="NULL")
                 echo "<img src='img/".$recipeIMG."' id='resize'>";
       
               else
               echo "<img src='img/GroceryBasket.jpg' id='recipeImage'>";
            ?>
          </td>
        </tr>
  
        <!-- Recipe Name -->
        <tr>

          <td colspan="2"><h1>
            <?php 
              echo $recipeName;
            ?>
      

           <input onclick = "addToFavorites()" type="image" src="img/starClicked.png" width="40" height="40" />

          <button onclick = "addToMeals()">Add to Meals</button>
          

          </h1></td>
        </tr>
        <!-- Recipe Ingredients -->
        <tr>
          <td class="left">Ingredients Required:</td>
          <td>
            <?php
              $sql = "SELECT * FROM Recipe_Ingredients WHERE Recipe_ID = ".$recipeID;
              $result = mysqli_query($conn, $sql);
                if($result->num_rows>0){
                  echo "<ul>";
                  while($row = $result->fetch_assoc()){
                    $sql = "SELECT Ingredient_Name FROM Ingredients WHERE Ingredient_ID = ".$row["Ingredient_ID"];
                    $sql2 = "SELECT Measurement FROM Measurement WHERE Measurement_ID = ".$row["Measurement_ID"];
                    $getName = mysqli_query($conn, $sql);
                    $getMeasurement = mysqli_query($conn,$sql2);
                    if($getName->num_rows>0) {
                      $name = mysqli_fetch_assoc($getName);
                      $measurement = mysqli_fetch_assoc($getMeasurement);
                      $ingredientName = $name['Ingredient_Name'];
                      $ingMeasurement = $measurement['Measurement'];

                       if ($row["Quantity"] == "0")
                        { $row["Quantity"] = "";}
                      echo "<li>".$row["Quantity"]." ".$ingMeasurement." ".$ingredientName."</li>";
                    }
                  }
                  echo "</ul>";
                } else{
                  echo "<i>None specified.</i>";
                }
            ?>
          </td>
        </tr>
          
        <!-- Recipe Tags -->
        <tr>
          <td class="left">Tags:</td>
          <td>
            <?php
              $sql = "SELECT * FROM Recipe_Tag WHERE Recipe_ID = ".$recipeID;
              $result = mysqli_query($conn, $sql);
              if($result->num_rows>0){
                echo "<ul>";
                while($row = $result->fetch_assoc()){
                  $sql = "SELECT Tag_Type FROM Tag WHERE Tag_ID = ".$row["Tag_ID"];
                  $getName = mysqli_query($conn, $sql);
                  if($getName->num_rows>0){
                    $data = mysqli_fetch_assoc($getName);
                    $tagName = $data['Tag_Type'];
                    echo "<li>".$tagName."</li>";
                  }
                }
                echo "</ul>";
              } else{
                echo "<i>None specified.</i>";
              }
            ?>
          </td>
        </tr>

        <!-- Recipe Time -->
        <tr>
          <td class="left">Time Required:</td>
          <td>
            <?php
              $sql = "SELECT Amount FROM Time WHERE Time_ID = ".$timeID;
              $getName = mysqli_query($conn, $sql);
              if($getName->num_rows>0){
                $data = mysqli_fetch_assoc($getName);
                $tagName = $data['Amount'];
                echo "<li>".$tagName."</li>";
              } else{
                echo "<i>None specified.</i>";
              }
            ?>
          </td>
        </tr>
          
        <!-- Recipe Servings -->
        <tr>
          <td class="left">Servings:</td>
          <td>
            <?php                
              echo $servings;
            ?>
          </td>
        </tr>
         
       <!-- Recipe Steps -->
        <tr>
          <td class="left">Steps:</td>
          <td>
            <?php
              $sql = "SELECT * FROM Step WHERE Recipe_ID = ".$recipeID." ORDER BY Step_Number";
              $result = mysqli_query($conn, $sql);
              if($result->num_rows>0){
                echo "<ol>";
                while($row = $result->fetch_assoc()){
                  echo "<li>".$row["Step_Content"]."</li>";
                }
                echo "</ol>";
              } else{
                echo "<i>None specified.</i>";
              }
            ?> 
          
         
          </td>
        </tr>
       
      </table>
      </form>

    </div>
  </body>

</html>
