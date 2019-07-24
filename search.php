 <?php
session_start();
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
   <?php  	 
if(isset($_SESSION["login"]) && $_SESSION["login"] == true) {
		include 'header-logged-in.php';
	} else {
		include 'header.php';
	}
?>	    

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
                    echo "<h2 id='resultTitle' style='font-weight:bold; margin-top:15px; margin-left:15px;'>".count($results)." results:</h2>";
                }
                echo "<p style='text-align:center'><table id='results' style='text-align: center;table-layout:fixed; width:100%; border-collapse: collapse;'>";
                foreach($results as $recipe){
                    echo "<tr style='height:100px;'' class='clickable-row' data-href='viewRecipe.php?Recipe_ID=".$recipe."'>";
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
                            echo"<td valign='center' style='width:50%'><img src='img/GroceryBasket.jpg' height='100px' style='float:center; margin-left:420px; margin-bottom:20px;'></td>";
                        }else{
                            echo"<td valign='center' style='width:50%'><img src='img/".$img."' height='100px' style='float:center; margin-left:400px; margin-bottom:20px;'></td>";
                        }
                        echo "<td valign='center' style='vertical-align:top;'><div style='text-align:center; margin-right:500px;'><h3 style='font-weight:bold;'>".$name."</h3><br/><a>Time: ".$time."</a><br/><a>Servings: ".$serving."</a></div></td>";
                    }
                    echo "</tr>";
                }
                echo "</table></p>";
                echo '<p><a href="javascript:history.back()">< Back to search</a></p>';
            }
     ?>
    </div>

</body>

</html>