<?php
  session_start();
  $_SESSION['email'];
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


        $sqlID = "SELECT User_ID FROM User_Info WHERE Email = '".$email."'";
        $IDSQL = mysqli_query($conn,$sqlID);

        while($row=mysqli_fetch_array($IDSQL,MYSQLI_NUM)){
          $userID = $row[0];
        }
 ?>


<html lang="en" class="no-js">
<head>
  <link rel="stylesheet" href="css/view-recipe.css">
</head>
  <body>
    <header>
     <?php include 'header.php';?>
    </header>

    <div id="main">
      <form method="post" id="child">
     <table class="center" id="searchFilters" align="center" cellpadding="2" cellspacing="5" border="0"> 

        <col width = 30%>
        <col witdh =70%>

  <script>
            //trying to set function to go back to results page. 
          function goBack(){
           <?php
               header("location: home.php");
               ?>
          } 
          </script>
        <!-- Recipe Image -->
        <tr>
          <td colspan="2" id="imageCell">
          <button onclick="goBack()">Back to results</button> 

            <?php

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
              echo $recipeName;
            ?>
      
            <!-- Favorite Recipe -->
    <script type="text/javascript">
              function addToFavorites(){
               
                <?php
               
               $sqlF = "INSERT INTO Favorites VALUES (".$recipeID.", ".$userID.")";
               $inputF = mysqli_query($conn,$sqlF);
                ?>


              } 

                function addToMeals(){
               
                <?php
              $sqlM = "INSERT INTO Meals VALUES (".$recipeID.", ".$userID.")";
              $inputM = mysqli_query($conn,$sqlM);
         ?>
            </script>


           <input onclick= "addToFavorites()" type="image" src="img/starClicked.png" width="40" height="40" /> 



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
