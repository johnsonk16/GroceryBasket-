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
<?php
    if(isset($_SESSION["login"]) && $_SESSION["login"] == true) {
		include 'header-logged-in.php';
	} else {
		include 'header.php';
  } 
  ?>
<head>
<style>
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 180px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>
</head>

<body>
  <div class='container'>
    <div class="gallery">
      <?php
      $result = mysqli_query($conn,"SELECT * FROM Recipes"); 
      // calculates the number of recipes in DB
      $num_rows = mysqli_num_rows($result);
      
      for($i=1; $i<=$num_rows;$i++){
        $sql = "SELECT * FROM Recipes WHERE Recipe_ID = '" .mysqli_real_escape_string($conn,$i) . "'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        $recipeID= $data['Recipe_ID'];
        $recipeName = $data['Recipe_Name'];
        $recipeIMG= $data['Recipe_Img'];

        $count = 1;

        if($recipeIMG!="NULL")
          // image gallery
          echo "<a href='viewRecipe.php?Recipe_ID=".$recipeID." '>".$recipeName;
              echo "<img src='img/".$recipeIMG."' id='recipeImage'>";
          // Break
          if( $count%4 == 0){
            ?>
            <div class="clear"></div>
          <?php 
          }
          $count++;
        }
        ?>
      </div>
    </div>
  </body>
  </html>