<?php

//okay so heres what it does, it prints out all ingredients from the checked off recipes that are in meals. (7/18) - kristin

//now the count is being weird and not working????? 

  require_once('config.php');
  require('../fpdf.php'); //for generating pdf file 

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

	if(!$conn){
   	die('could not connect' . mysqli_error());
  } 

  // $pdf = new FPDF();
  // $pdf->AddPage();
  // $pdf->SetFont('Times', 'B',18);

  // if the check box is checked in meals.php, add it to the DB as a value 1. then pull only the rows that have a value of 1??????




if (isset($_GET['recipe'])){
 //$checked_arr = $_GET['recipe'];
 $count = sizeof(explode('&', $_GET['recipe']));
 echo "There are ".$count." checkboxe(s) are checked";

 echo "<br>";

for ($i=0; $i<$count; $i++){
$IDarray = $_GET['recipe'];


  echo $IDarray[$i]; 
  echo "<br>";

 $sql = "SELECT * FROM Recipe_Ingredients WHERE Recipe_ID = ".$IDarray[$i];
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
             }
       echo "<br>";  
     }
  }
  else
    echo "no recipes selected";

    
 // $pdf->Cell(40,10,$name);
 // $pdf->output('basket.pdf','I');
 ?>  
