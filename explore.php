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
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/home.css"> 
<link rel="stylesheet" href="css/demo.css"> 
<link rel="stylesheet" href="css/add-meal.css"> <!-- Add meal modal style -->

<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->

<?php  	 
if(isset($_SESSION["login"]) && $_SESSION["login"] == true) {
		include 'header-logged-in.php';
	} else {
		include 'header.php';
	}
?>

<br>
<div id="main">
	<form class="center" id="form">
		<h1>Explore Recipes</h1>
		<br>

	<style>
.column2 { 
  float: left; 
  width: 30%;
	margin: 25px;	
}

/* Clear floats after image containers */
.row::after {
  content: "";
  clear: both;
	display: table;
}

.container {
  position: relative; 
  max-width: 800px; /* Maximum width */
  margin: 0 auto; /* Center it */
}

</style>
<div class="responsive">
	<div class="row">
  <div class="column2">
	  <a href="viewRecipe.php?Recipe_ID=1">
    <img src="img/bacon.jpg" alt="Bacon" class="resize" ><h1>Spiced Candied Bacon</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=2">
    <img src="img/bananabread.jpg" alt="BananaBread" class="resize"><h1>Banana Bread</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=3">
    <img src="img/southern-oven-fried-chicken-3058647-5_preview-5b0ec6ecba61770036491ed7.jpeg" alt="Fried Chicken" class="resize"><h1>Fried Chicken</h1>
  </div>	
</div>


<br>
<br>

<div class="row">
  <div class="column2">
	  <a href="viewRecipe.php?Recipe_ID=4">
    <img src="img/beefstrog.jpg" alt="Beef Stroganoff" class="resize" ><h1>Beef Stroganoff</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=13">
    <img src="img/caulimaccheese.jpg" alt="Cauliflower Mac and Cheese" class="resize"><h1>Cauliflower Mac and Cheese</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=21">
    <img src="img/cauliricebeef.jpg" alt="Cauliflower Rice Beef Bowl" class="resize"><h1>Cauliflower Rice Beef Bowl</h1>
  </div>	
</div>

<div class="row">
  <div class="column2">
	  <a href="viewRecipe.php?Recipe_ID=5">
    <img src="img/1005880.jpg" alt="Zesty Quinoa Salad" class="resize" ><h1>Zesty Quinoa Salad</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=6">
    <img src="img/pastasauce.jpg" alt="Pasta Sauce" class="resize"><h1>Pasta Sauce</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=7">
    <img src="img/6524311.jpg" alt="Chicken Pot Pie" class="resize"><h1>Chicken Pot Pie</h1>
  </div>	
</div>


<br>
<br>

<div class="row">
  <div class="column2">
	  <a href="viewRecipe.php?Recipe_ID=8">
    <img src="img/6320409.jpg" alt="Easy Meatloaf" class="resize" ><h1>Easy Meatloaf</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=9">
    <img src="img/basic-french-omelet-930x550.jpg" alt="French Omlette" class="resize"><h1>French Omlette</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=10">
    <img src="img/sugar cookie.jpg" alt="Chewy Sugar Cookies" class="resize"><h1>Chewy Sugar Cookies</h1>
  </div>	
</div>

<div class="row">
  <div class="column2">
	  <a href="viewRecipe.php?Recipe_ID=11">
    <img src="img/chickenparm.jpg" alt="Chicken Parmesan" class="resize" ><h1>Chicken Parmesan</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=12">
    <img src="img/lasagna.jpg" alt="Lasagna" class="resize"><h1>Lasagna</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=15">
    <img src="img/risotto.jpg" alt="Risotto" class="resize"><h1>Risotto</h1>
  </div>	
</div>


<br>
<br>

<div class="row">
  <div class="column2">
	  <a href="viewRecipe.php?Recipe_ID=14">
    <img src="img/baked-eggs-with-marinara-parmesan-2.jpg" alt="Baked Eggs w. Sauce and Cheese" class="resize" ><h1>Baked Eggs w. Sauce and Cheese</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=16">
    <img src="img/IMG_7209.jpg" alt="French Toast" class="resize"><h1>French Toast</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=17">
    <img src="img/lemonbars.jpg" alt="lemon bars" class="resize"><h1>Lemon Bars</h1>
  </div>	
</div>

<div class="row">
  <div class="column2">
	  <a href="viewRecipe.php?Recipe_ID=18">
    <img src="img/frittataspinach.jpg" alt="Frittata with Fresh Spinach" class="resize" ><h1>Frittata with Fresh Spinach</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=19">
    <img src="img/caulihash.jpg" alt="Cauliflower Hash Browns" class="resize"><h1>Cauliflower Hash Browns</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=20">
    <img src="img/nuggets.jpeg" alt="Chicken Nuggets" class="resize"><h1>Chicken Nuggets</h1>
  </div>	
</div>


<br>
<br>

<div class="row">
  <div class="column2">
	  <a href="viewRecipe.php?Recipe_ID=24">
    <img src="img/gfbread.png" alt="Gluten Free Bread" class="resize" ><h1>Gluten Free Bread</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=23">
    <img src="img/chickensoup.jpg" alt="Chicken Soup" class="resize"><h1>Chicken Soup</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=22">
    <img src="img/salsa.jpeg" alt="salsa" class="resize"><h1>Salsa</h1>
  </div>	
</div>

<div class="row">
  <div class="column2">
	  <a href="viewRecipe.php?Recipe_ID=25">
    <img src="img/anymeatmarinade.jpg" alt="Any Meat Marinade" class="resize" ><h1>Any Meat Marinade</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=26">
    <img src="img/GB.png" alt="Sauteed Greenbeans" class="resize"><h1>Sauteed Greenbeans</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=27">
    <img src="img/Screen Shot 2019-04-10 at 6.05.03 PM.png" alt="Coffee Cake Mug" class="resize"><h1>Coffee Cake Mug</h1>
  </div>	
</div>


<br>
<br>

<div class="row">
  <div class="column2">
	  <a href="viewRecipe.php?Recipe_ID=28">
    <img src="img/mugcake.jpg" alt="Chocolate Mug Cake" class="resize" ><h1>Chocolate Mug Cake</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=29">
    <img src="img/nochurnicecream.jpg" alt="No Churn Ice Cream" class="resize"><h1>No Churn Ice Cream</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=30">
    <img src="img/emma-e1512057882922-600x324.jpg" alt="Whole Wheat Pancakes" class="resize"><h1>Whole Wheat Pancakes</h1>
  </div>	
</div>

<div class="row">
  <div class="column2">
	  <a href="viewRecipe.php?Recipe_ID=31">
    <img src="img/brusselslaw.jpg" alt="Brussels Sprout Slaw" class="resize" ><h1>Brussels Sprout Slaw</h1>
  </div>
  <div class="column2">
		<a href="viewRecipe.php?Recipe_ID=32">
    <img src="img/Screen Shot 2019-04-10 at 6.56.28 PM.png" alt="Honey Soy Pork Chops" class="resize"><h1>Honey Soy Pork Chops</h1>
  </div>
</div>

</div>
<br>
<br>


</html>