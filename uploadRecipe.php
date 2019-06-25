 <?php

  require_once('config.php');

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

 if(!$conn){
    die('could not connect' . mysqli_error());
  } else{
  
  $sql = "SELECT COUNT(*) FROM Recipes";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    $recipeID = $data['COUNT(*)'] + 1;
    echo $recipeID;
    if(isset($_POST["RecipeName"])){
        $recipename = $_POST["RecipeName"];
    } else{
        $recipename = NULL;
    }

    if(isset($_POST["measurements"])){
        $measurements = $_POST["measurements"];
    } else{
        $measurements = []; 
    }
    if(isset($_POST["ingredients"])){
        $ingredients = $_POST["ingredients"];
    } else{
        $ingredients = []; 
    }
    if(isset($_POST["tags"])){
        $tags = $_POST["tags"];
    } else{
        $tags = []; 
    }
    if(isset($_POST["totaltime"])){
        $time = $_POST["totaltime"];
    } else{
        $time = "NULL";
    }
    if(isset($_POST["servings"])){
        $servings = $_POST["servings"];
    } else{
        $servings = 0;
    }
    if(isset($_POST["steps"])){
        $steps = $_POST["steps"];
    } else{
        $steps = [];
    }
    global $filename;

    $filename = "NULL";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Check if file was uploaded without errors
        if(isset($_FILES["photoUpload"]) && $_FILES["photoUpload"]["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $_FILES["photoUpload"]["name"];
            $filetype = $_FILES["photoUpload"]["type"];
            $filesize = $_FILES["photoUpload"]["size"];
        
            // Verify file extension
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
        
            // Verify file size - 5MB maximum
            $maxsize = 5 * 1024 * 1024;
            if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");


            // Verify MYME type of the file

            if(in_array($filetype, $allowed)){
                // Check whether file exists before uploading it
                if(file_exists("img/" . $filename)){
                    $filename = $recipeID.$filename;
                    move_uploaded_file($_FILES["photoUpload"]["tmp_name"], "img/" . $filename);
                } else{
                    move_uploaded_file($_FILES["photoUpload"]["tmp_name"], "img/" . $filename);
                } 
            } else{
                echo "Error: There was a problem uploading your file. Please try again."; 
            }

        } 
    }

      $sql = "INSERT INTO Recipes VALUES (".$recipeID.", '".$recipename."', '".$time."', ".$servings.", '".$filename."')";
      echo $sql."<br/>";
    
      mysqli_query($conn, $sql);


    for($i=0; ($i<count($measurements) && !empty($measurements) && !empty($ingredients)) ; $i++){
        
        $sql = "INSERT INTO Recipe_Ingredients VALUES (".$ingredients[$i].", ".$recipeID.", '".$measurements[$i]."');";
        echo $sql;
        mysqli_query($conn, $sql);
    }
    
    foreach($tags as $tag){
        $sql = "INSERT INTO Recipe_Tags VALUES (".$tag.", ".$recipeID.");";
        mysqli_query($conn, $sql);
    }
    
    
    for($i=0;$i<count($steps);$i++){
        $stepNo = $i + 1;
        echo $stepNo.": ".$steps[$i];
        $sql = "INSERT INTO Step VALUES (".$recipeID.", '".$steps[$i]."', ".$stepNo.");";
        echo "<br/>".$sql;
        mysqli_query($conn, $sql);
    }
    ?>
    <script>
      alert("Recipe Added");
    </script>
<?php
    header("LOCATION: viewRecipe.php?Recipe_ID=".$recipeID);
}

 ?>
