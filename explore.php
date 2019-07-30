<?php
  error_reporting(0);
  session_start();
  require_once('config.php');

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

  if(!$conn){
    die('could not connect' . mysqli_error());
  } 
   // echo 'CONNECTED TO DB';

 ?> 
<html>

<?php    
if(isset($_SESSION["login"]) && $_SESSION["login"] == true) {
    include 'header-logged-in.php';
  } else {
    include 'header.php';
  }
?>

<style>

.container .gallery a img {
  float: left;
  display: block;
  width: 25%;
  height: 50%;
  border: 2px solid #fff;
  -webkit-transition: -webkit-transform .15s ease;
  -moz-transition: -moz-transform .15s ease;
  -o-transition: -o-transform .15s ease;
  -ms-transition: -ms-transform .15s ease;
  transition: transform .15s ease;
  position: relative;
  overflow: hidden;
  box-sizing: border-box;
}

.container .gallery a:hover img {
  -webkit-transform: scale(1.05);
  -moz-transform: scale(1.05);
  -o-transform: scale(1.05);
  -ms-transform: scale(1.05);
  transform: scale(1.05);
  z-index: 5;
}
.clear {
  clear: both;
  float: none;
  width: 100%;
}
</style>

<div class='container'>
 <div class="gallery">
 
  <?php
    $result = mysqli_query($conn,"SELECT * FROM Recipes"); 
    $numRecipes = mysqli_num_rows($result);

    $count = 1;

    if ($numRecipes != 0) {
      for($i=0; $i<$numRecipes;$i++) { 
        while($row=mysqli_fetch_array($result, MYSQLI_NUM)) {
          $RecipeID= $row[0];

          $sql = "SELECT * FROM Recipes WHERE Recipe_ID = '".$RecipeID. "'";

          $resultR = mysqli_query($conn, $sql);
          $data = mysqli_fetch_assoc($resultR);
          $recipeName = $data['Recipe_Name'];
          $recipeIMG= $data['Recipe_Img'];
                 
          if($recipeIMG!="NULL"){
            echo "<a href='viewRecipe.php?Recipe_ID=".$RecipeID." '>".$recipeName;
            echo "<br>";
            echo "<img src='img/".$recipeIMG."' id='recipeImage'>";
          }
        }
      }
    }
    //code commented out below was previous way of calling images but
    //it wouldn't call the recipe names correctly
   /*  $files = glob("gallery/*.*");
     for ($i=0; $i<count($files); $i++)
      {
        $image = $files[$i];
        $supported_file = array(
                'gif',
                'jpg',
                'jpeg',
                'png'
         );

         $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
         if (in_array($ext, $supported_file)) {
            $path_parts= pathinfo($image);
           // echo basename($image)."<br />"; // show only image name if you want to show full path then use this code // echo $image."<br />";
            $filename =  $path_parts["filename"];
          //  echo $filename;
             echo "<a href='viewRecipe.php?".$filename." '>";
             echo '<img src="'.$image .'" alt="Random image" />'."<br /><br />";
          if( $count%4 == 0){
       ?>
         <div class="clear"></div>
       <?php 
       }
       $count++;
         
            } else {
                continue;
            }
          }
*/
 ?>
 </div>
</div>
</html>