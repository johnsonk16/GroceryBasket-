<?php
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


</head>
  <body>
    <header>
     <?php include 'header.php';?>
    </header>


  <div class="tab">
    <button class="tablinks" onclick="openTab(event, 'meals')">Meals</button>
    <button class="tablinks" onclick="openTab(event, 'favorites')">Favorites</button>
    <button class="tablinks" onclick="openTab(event, 'basket')">Basket</button>
  </div>

  <div id="meals" class="tabcontent">
    <h2>Meals</h2>
    <div class="meals">
          <?php
            $result = mysqli_query($conn, "SELECT Recipe_ID FROM Meals WHERE User_ID = ".$_SESSION['id']);
            $numRecipes = mysqli_num_rows($result);
  
            //create an array of recipe ids (similar to how the user id is selcted) use $i to itterate through 
            //right now, its just going the for loop 1 by 1 

            if ($numRecipes != 0){
              for($i=1; $i<$numRecipes +1;$i++){

                $sql = "SELECT * FROM Recipes WHERE Recipe_ID = '" .mysqli_real_escape_string($conn,$i) . "'";
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_assoc($result);
                $recipeID= $data['Recipe_ID'];
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
                  echo "<a href='viewRecipe.php?Recipe_ID=".$recipeID." '>".$recipeName
                  ;
              }
            }
            else {
              ?>  <div class="message-no-meals">
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
    <div class="message-no-meals">
      <p>You have no favorites saved currently. Start exploring...</p>
      <div class="btn">
        <a href="home.php">Explore</a>
      </div> 
    </div>
  </div>

  <div id="basket" class="tabcontent">
    <h2>Basket</h2>
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
