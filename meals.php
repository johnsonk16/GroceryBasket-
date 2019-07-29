<?php
  error_reporting(0);
  session_start();
  $_SESSION['email'];
  $_SESSION['id'];

  require_once('config.php');

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);


	if(!$conn){
   	die('could not connect' . mysqli_error());
  } 
 ?>

<html lang="en" class="no-js">
<head>
  <link rel="stylesheet" href="css/reset.css"> 
  <link rel="stylesheet" href="css/home.css"> 
  <link rel="stylesheet" href="css/demo.css"> 
  <link rel="stylesheet" href="css/meals.css">
  <?php
    if(isset($_SESSION["login"]) && $_SESSION["login"] == true) {
		include 'header-logged-in.php';
	} else {
		include 'header.php';
  } 
  ?>

</head>
  <body>

  <div class="tab">
    <button class="tablinks" onclick="openTab(event, 'meals')">Meals</button>
    <button class="tablinks" onclick="openTab(event, 'favorites')">Favorites</button>
  </div>

  <div id="meals" class="tabcontent">
    <h2>Meals</h2>
                  <!-- have it write to a file instead of a page -->
                  <!-- change number of servings (drop down selction) -->
     

     <form name = 'ChangeServings' id = 'ChangeServings' action = "basket.php" method='Get'>
            Servings: <input type="text" name="Serving" size="3" value = 1>
        <button type = "submit" onclick = "window.location.href= 'basket.php'"> Generate Shopping List</button>     
    </form>
  


    <div class="meals resize"> 
      <?php
      $result = mysqli_query($conn, "SELECT Recipe_ID FROM Meals WHERE User_ID = ".$_SESSION['id']);
      $numRecipes = mysqli_num_rows($result);

      if ($numRecipes != 0) {
        for($i=0; $i<$numRecipes;$i++) { 
          while($row=mysqli_fetch_array($result, MYSQLI_NUM)) {
            $RecipeID= $row[0];

            $sql = "SELECT * FROM Recipes WHERE Recipe_ID = '".$RecipeID. "'";

            $resultR = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($resultR);
            $recipeName = $data['Recipe_Name'];
            $recipeIMG= $data['Recipe_Img'];
       
            if($recipeIMG!="NULL")
              echo "<img src='img/".$recipeIMG."' id='recipeImage'>";
       
            else
              echo "<img src='img/GroceryBasket.jpg' id='recipeImage'>";
            ?>

            </td>
            </tr>

            <!-- Recipe Name -->
            <tr>             

            <td colspan="2"><h1>
            <?php 
              echo "<a href='viewRecipe.php?Recipe_ID=".$RecipeID." '>".$recipeName;
              //  echo $recipeName;
            ?>
    
            <br>
            <?php
          } 
        }   
      }
      else {
        ?> 
        <div class="message-no-meals"> 
          <p>You have no meals saved currently. Start exploring...</p>
          <div class="cd-nugget-info">
            <a href="home.php">Explore</a>
          </div> 
        </div>  
        <?php
      }       
    ?>
    </div>
  </div>

<div id="favorites" class="tabcontent">
  <h2>Favorites</h2>
  <div class="favorites resize">
    <?php
      $resultF = mysqli_query($conn, "SELECT Recipe_ID FROM Favorites WHERE User_ID = ".$_SESSION['id']);

      $numRecipesF = mysqli_num_rows($resultF);

      if ($numRecipesF != 0) {
        for($i=0; $i<$numRecipesF;$i++){
          while($rowF=mysqli_fetch_array($resultF, MYSQLI_NUM)){
            $RecipeIDF= $rowF[0];
                    
            $sqlF = "SELECT * FROM Recipes WHERE Recipe_ID = '".$RecipeIDF. "'";

            $resultR = mysqli_query($conn, $sqlF);
            $dataF = mysqli_fetch_assoc($resultR);
            $recipeNameF = $dataF['Recipe_Name'];
            $recipeIMGF= $dataF['Recipe_Img'];

            if($recipeIMGF!="NULL")
              echo "<img src='img/".$recipeIMGF."' id='recipeImage'>";
            else
              echo "<img src='img/GroceryBasket.jpg' id='recipeImage'>";
            ?>
            </td>
            </tr>
            <!-- Recipe Name -->
            <tr>

            <td colspan="2"><h1>
            <?php 
              echo "<a href='viewRecipe.php?Recipe_ID=".$RecipeIDF." '>".$recipeNameF;
              // echo $recipeNameF;
          }
        }
      }
      else {
        ?> 
        <div class="message-no-meals"> 
          <p>You have no meals saved currently. Start exploring...</p>
          <div class="cd-nugget-info">
            <a href="home.php">Explore</a>
          </div> 
        </div>  
        <?php

      }       
    ?>

  </div>
</div>

  
<script>
  function openTab(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
    }
  </script>

</body>
</html>