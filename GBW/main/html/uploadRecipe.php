 <?php
  require_once('config.php');

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

	if(!$conn){
   	die('could not connect' . mysqli_error());
  } 
   
    echo 'CONNECTED TO DB';

 if(isset($_POST["steps"])){
        $steps = $_POST["steps"];
    } else{
        $steps = [];
    }

    for($i=0;$i<count($steps);$i++){
        $stepNo = $i + 1;
        echo $stepNo.": ".$steps[$i];
        $sql = "INSERT INTO Step VALUES (".$recipeID.", '".$steps[$i]."', ".$stepNo.");";
        echo "<br/>".$sql;
        mysqli_query($conn, $sql);
    }
 ?>