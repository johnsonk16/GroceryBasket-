 <?php

 require_once('config.php');
  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
  $error = mysqli_connect_error();
  if($error != null){
    $output = "<p>Unable to connect to database.</p>".$error;
    exit($output);
  }
?>
<!DOCTYPE html>

<style>
.center {
    display: block;
    margin-left: 35%;   
    padding: 50px 50px;
}
</style>

<html>


<head>
   <!-- Including jQuery is required. -->

   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

   <!-- Including our scripting file. -->
   <link rel="stylesheet" href="css/home.css"> <!-- Resource style -->
   <?php include 'header.php' ?>

   <script type="text/javascript" src="scripts.js"></script>
   <script> jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
      </script>

</head>



<body>

  <div id="main">
      <br>

    <?php
            $results = NULL;
            // Get search parameters
            if(isset($_POST["term"])){
                $searchTerm = $_POST["term"];
                // Get recipes with keywords in name
                $query = $conn->query("SELECT Recipe_ID FROM Recipes WHERE Recipe_Name LIKE '%".$searchTerm."%' ORDER BY Recipe_Name ASC");
                // Generate result array
                $termResults = array();
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $data = $row['Recipe_ID'];
                        array_push($termResults, $data);
                    }
                }
                $results = $termResults;
            } else{
                $termResults = NULL;
            }
            if($results == NULL || count($results)==0){
                echo "<h2 class='no_result'>No results.</h2><h3 class='no_result'>Try changing your search parameters.</h3>";
                echo '<p><a href="javascript:history.back()">< Back to search</a></p>';
            } else {
                if(count($results)==1){
                    echo '<p><a href="javascript:history.back()">< Back to search</a></p>';
                    echo "<h2 id='resultTitle'>1 result:</h2>";
                } else{
                    echo '<p><a href="javascript:history.back()">< Back to search</a></p>'; 
                    echo "<h2 id='resultTitle'>".count($results)." results:</h2>";
                }
                echo "<p style='text-align:center'><table id='results' style='text-align: center;table-layout:fixed; width:100%; border-collapse: collapse;'>";
                foreach($results as $recipe){
                    echo "<tr class='clickable-row' data-href='viewRecipe.php?Recipe_ID=".$recipe."'>";
                    $query = $conn -> query("SELECT * FROM Recipes WHERE Recipe_ID = ".$recipe);
                    if($query->num_rows>0){
                        $row = $query->fetch_assoc();
                        $name = $row['Recipe_Name'];
                        $img = $row['Recipe_Img'];
                        $time = $row['Time_ID'];
                        $serving = $row['Serving'];
                        $query = $conn -> query("SELECT Amount FROM Time WHERE Time_ID = ".$time);
                        if($query->num_rows>0){
                             $row = $query->fetch_assoc();
                             $time = $row['Amount'];
                        }
                        if($img=="NULL"){
                            echo"<td style='text-align:center; width:40%;'><img src='img/GroceryBasket.jpg' height='100px' style='float:left; margin:10px; '></td>";
                        }else{
                            echo"<td style='text-align:center; width:40%;'><img src='img/".$img."' height='100px' style='float:left; margin:10px; '></td>";
                        }
                        echo "<td><h3>".$name."</h3><br/>Time: ".$time."<br/>Servings: ".$serving."</td>";
                    }
                    echo "</tr>";
                }
                echo "</table></p>";
            }
     ?>
    </div>

</body>

</html>