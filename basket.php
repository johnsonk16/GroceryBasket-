

<?php
//require "pdfcrowd.php";

// $pdf = $client->convertFile('/GroceryBasket-Web/meals.php');
// $pdf = $client->convertString('<b>bold</b> and <i>italic</i>');
  session_start();
  $_SESSION['email'];
  $_SESSION['id'];


  require_once('config.php');
  require('../fpdf.php'); //for generating pdf file 


  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);


  if(!$conn){
    die('could not connect' . mysqli_error());
  }

  $pdf = new FPDF();
  $pdf->AddPage();
  $pdf->SetFont('Times', 'B',18); 
  $pdf->Cell(40,10,"Your Basket List: ");
 ?>

<div id="basket" class="tabcontent">
    <h2>Basket</h2>
    <!-- <button onsubmit= "basket.php">Basket</button> -->
    <div>
<?php
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

     // $pdf->Cell(40,10,$recipeNameB);

     echo $recipeNameB;

      $sqlRI = "SELECT * FROM Recipe_Ingredients WHERE Recipe_ID = ".$RecipeIDB;

      $sqlRI = "SELECT * FROM Recipe_Ingredients WHERE Recipe_ID = ".$RecipeIDB;
        $resultB2 = mysqli_query($conn, $sqlRI);
          if($resultB2->num_rows>0){
           echo "<ul>";
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
                     if ($row["Quantity"] == "0")
                        { $row["Quantity"] = "";}
                //      $pdf->Cell($row["Quantity"]." ".$ingMeasurement." ".$ingredientName);

                echo "<li>".$row["Quantity"]." ".$ingMeasurement." ".$ingredientName."</li>";

                    }
                  }
                 echo "</ul>";
                     echo "<br>";
                }
      
              }
  
            }
            
          }
     // $pdf->Output();
?>
</div>
  </div>


