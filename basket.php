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
  if (isset($_GET['Serving'])){
  $serving = $_GET['Serving'];
  }
  else
    echo "ERROR";

 ?>
 <body>
  
<div id="basket" class="tabcontent">
    <div>
<?php
  
 $myfile = fopen("basket.txt", "w+") or die("Unable to open file!");
 fwrite($myfile, "Your basket: ");
 fwrite($myfile, "\n");
 fwrite($myfile, "Serving: ");
 fwrite($myfile,$serving);
 fwrite($myfile, "\n\n");

?>

<a href="meals.php"> <-- Back to Meals </a>
<br>
<br>

<?php

echo "Your Basket List: ";
echo "<br>";
echo "<br>";

  $resultB = mysqli_query($conn, "SELECT Recipe_ID FROM Meals WHERE User_ID = ".$_SESSION['id']);
    $numRecipesB = mysqli_num_rows($resultB);

  if ($numRecipesB != 0){
      for($i=0; $i<$numRecipesB;$i++){
           while($rowB=mysqli_fetch_array($resultB, MYSQLI_NUM)){
          $RecipeIDB= $rowB[0];
         
                    
      $sqlB = "SELECT * FROM Recipes WHERE Recipe_ID = '".$RecipeIDB. "'";

      $resultB1 = mysqli_query($conn, $sqlB);
      $dataB = mysqli_fetch_assoc($resultB1);
      $recipeNameB = $dataB['Recipe_Name'];

   
      fwrite($myfile, $recipeNameB);
      fwrite($myfile, "\n\n");

      echo $recipeNameB;
      echo "<br>";

      $sqlRI = "SELECT * FROM Recipe_Ingredients WHERE Recipe_ID = ".$RecipeIDB;

      $sqlRI = "SELECT * FROM Recipe_Ingredients WHERE Recipe_ID = ".$RecipeIDB;
        $resultB2 = mysqli_query($conn, $sqlRI);
          if($resultB2->num_rows>0){
    
            while($row = $resultB2->fetch_assoc()){
              $sqlName = "SELECT Ingredient_Name FROM Ingredients WHERE Ingredient_ID = ".$row["Ingredient_ID"];
              $sqlMmt = "SELECT Measurement FROM Measurement WHERE Measurement_ID = ".$row["Measurement_ID"];
              $getName = mysqli_query($conn, $sqlName);
              $getMeasurement = mysqli_query($conn,$sqlMmt);
                if($getName->num_rows>0) {
                  $name = mysqli_fetch_assoc($getName);
                  $measurement = mysqli_fetch_assoc($getMeasurement);
                  $ingredientName = $name['Ingredient_Name'];
                  $ingMeasurement = $measurement['Measurement'];
                  $row["Quantity"] = $row["Quantity"]*$serving; 

                     if ($row["Quantity"] == "0")
                        { $row["Quantity"] = "";}
                      $fullMeasurement = $row["Quantity"]." ".$ingMeasurement." ".$ingredientName;
                fwrite($myfile, $fullMeasurement);
                fwrite($myfile, "\n");

                echo $fullMeasurement;
                echo "<br>";

        
                    }

                  }
                  fwrite($myfile, "\n");
                  echo "<br>";
      

                }
      
              }
  
            }
               
          }
           fwrite($myfile, "\n\n");
           fclose($myfile);
          echo "<br>";
   

?>
</div>
  </div>
</body>

