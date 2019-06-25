<?php
    session_start();
  require_once('config.php');

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

	if(!$conn){
   	die('could not connect' . mysqli_error());
  } 
   
   // echo 'CONNECTED TO DB';
 ?>	


<html lang="en" class="no-js">
<?php include 'header.php';?>

	<div class="cd-intro">
		<h1>Grocery Basket</h1>

		<div class="row">
			<div class="column">
    			<img src="img/burrito.jpeg" alt="Burrito">
  			</div>
  			<div class="column">
    			<img src="img/hamburger.jpeg" alt="hambuger">
  			</div>
  			<div class="column">
    			<img src="img/pasta.jpg" alt="pasta">
  			</div>
  			<div class="column">
    			<img src="img/sushi.jpg" alt="sushi">
  			</div>
		</div>
	</div>

		<br>
		<div id="main">
        <form class="center" id="form" action="search.php" method="post">
            <h1>Find a Recipe</h1>
            <br>
            <input type="text" id="textBar" placeholder="enter keywords (optional)" name='term' autofocus>
            <tr>
                  <td colspan="2" style="text-align:center;">
                    <input type="submit" class="formButton" value="Search Recipes"/>
                    <button class="formButton" type="button" onclick="location.reload()" >Reset Fields</button>
                  </td>
                </tr>
        </form>
      </div>

	<div class="cd-nugget-info">
			<a href="explore.php">Explore</a>
	<!-- cd-nugget-info -->
	</div>
</body>


</html>