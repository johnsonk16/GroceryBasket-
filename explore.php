<?php
    session_start();
  require_once('config.php');

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

	if(!$conn){
   	die('could not connect' . mysqli_error());
  } 
   
  //  echo 'CONNECTED TO DB';
 ?>


<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/home.css"> <!-- Resource style -->
	<link rel="stylesheet" href="css/demo.css"> <!-- Demo style -->
	<link rel="stylesheet" href="css/add-meal.css"> <!-- Add meal modal style -->
  
	<title>Grocery Basket</title>
</head>
<body>
	<header class="cd-main-header">
		<header>
     <?php include 'header.php';?>
    </header>
	
	<div class="cd-intro">
		<h1>Explore</h1>

		<div class="cd-nugget-info">
			<a id="add-meal-btn" onclick="addmeal()">Add Your Own Recipe</a>
		</div> <!-- cd-nugget-info -->

	</div>

	<div id="add_meal_modal" class="modal">
		<div class="modal-content">
			<div class="modal-header">
      			<span class="close">&times;</span>
      			<h2>Add Recipe</h2>
    		</div>

    		<div class="modal-body">
    			<form id="add-meal-form" name="add-meal-form" action="uploadRecipe.php" method="post">
    			<!-- <div class="modal-body"> -->
    				<div class="row">
    					<div class="col-25">
    						<label for="recipe-name">Recipe Name: </label>
      					</div>
     			 		<div class="col-75">
        					<input type="text" id="RecipeName" name="RecipeName" placeholder="Your recipe name..">
        					<span class="error"><p id="name_error"></p></span>
      					</div>
    				</div>

    				<div class="row">
      					<div class="col-25">
        					<label for="ingredients">Ingredients: </label>
      					</div>
      					<div class="col-75">
      						<table id="ingredients"> 
                    			<tr id="ingredientRow">
                        		<td class="measurement"><input type="text" class="number" name="measurements[]" placeholder="(ex. 2 cups)"></td>
                        		<span class="error"><p id="ingredients_error"></p></span>

                             <td><select class="ingredient" id="newest" name="ingredients[]" data-placeholder="Select ingredient..." required="">
                              <option value="">Select ingredient...</option>
                           <optgroup label='Fruit'><option value='21'>Apple</option><option value='30'>Avocado</option><option value='23'>Banana</option><option value='29'>Blackberry</option><option value='27'>Blueberry</option><option value='24'>Grape</option><option value='121'>Lime</option><option value='122'>Lemon</option><option value='31'>Mango</option><option value='22'>Orange</option><option value='28'>Peach</option><option value='25'>Pineapple</option><option value='32'>Plum</option><option value='26'>Strawberry</option><optgroup label='Vegetables'><option value='36'>Arugula</option><option value='43'>Broccoli<option value='98'>Black Bean</option>Broccoli</option><option value='44'>Brussels Sprouts</option><option value='39'>Cabbage</option><option value='33'>Carrot</option><option value='128'>Cauliflower</option><option value='37'>Celery</option><option value='34'>Corn</option><option value='42'>Green Bean</option><option value ='97'>Green Pepper</option><<option value='123'>Jalapeno</option>option value='38'>Kale</option><option value='146'>Lettuce</option><option value='147'>Onion</option><option value='41'>Peas</option><option value ='96'>Red Pepper</option><option value='124'>Shallots</option><option value='35'>Spinach</option><option value='40'>Tomato</option><option value='120'>Zucchini</option><optgroup label='Meat'><option value ='149'>Bacon</option><option value='51'>Chicken Breast</option><option value='52'>Chicken Wings</option><option value='45'>Ground Beef</option><option value='46'>Ground Turkey</option><option value='49'>Ham</option><option value='50'>Pork Chop</option><option value='54'>Pork Loin</option><option value='143'>Sausage</option><option value='47'>Steak</option><option value='53'>Steak Tips</option><option value='48'>Turkey</option><optgroup label='Seafood'><option value='61'>Catfish</option><option value='59'>Clam</option><option value='60'>Cod</option><option value='58'>Crab</option><option value='62'>Lobster</option><option value='63'>Mussels</option><option value='56'>Salmon</option><option value='55'>Shrimp</option><option value='64'>Swordfish</option><option value='57'>Tuna</option><optgroup label='Spices'><option value='12'>Basil</option><option value='141'>Bay Leaves</option><option value ="18">Cayenne Powder</option><option value='15'>Chili Powder</option><option value='14'>Cilantro</option><option value='144'>Cinnamon</option><option value='9'>Garlic</option><option value='10'>Garlic Powder</option><option value='16'>Ginger</option><option value='140'>Italian Seasoning</option><option value='150'>Mustard Seed</option><option value='131'>Nutmeg</option><option value='20'>Onion Powder</option><option value='13'>Oregano</option><option value='11'>Paprika</option><option value='19'>Parsley</option><option value='125'>Red Pepper Flakes</option><option value='17'>Thyme</option><optgroup label='Grains'><option value='68'>Barley</option><option value='66'>Buckwheat</option><option value='69'>Oat</option><option value='65'>Quinoa</option><option value='67'>Rice</option><option value='70'>Rye</option><optgroup label='Dairy'><option value='73'>1% Milk</option><option value='72'>2% Milk</option><option value='104'>American Cheese</option><option value='102'>Blue Cheese</option><option value='74'>Butter(Salted)</option><option value='75'>Butter(Unsalted)</option><option value='103'>Cheddar Cheese</option><option value='130'>Clarified Butter</option><option value='129'>Heavy Whipping Cream</option><option value='100'>Mozzarella Cheese</option><option value='99'>Parmesan Cheese</option><option value='101'>Ricotta Cheese</option><option value='148'>Sour Cream</option><option value='71'>Whole Milk</option><optgroup label='Oil'><option value='78'>Canola Oil</option><option value='77'>Coconut Oil</option><option value='76'>Olive Oil</option><option value='79'>Peanut Oil</option><option value='81'>Peanut Oil</option><option value='80'>Sesame Oil</option><optgroup label='Dry Goods'><option value='116'>Almond Flour</option><option value='6'>Baking Powder</option><option value='5'>Baking Soda</option><option value='137'>Bread Crumbs</option><option value='4'>Brown Sugar</option><option value='135'>Chocolate Chip</option><option value='85'>Cornstarch</option><option value='2'>Flour</option><option value='114'>Ground Cornmeal</option><option value='84'>Pasta</option><option value='8'>Pepper</option><option value='108'>Potato Starch</option><option value='82'>Powdered Sugar</option><option value='110'>Rice Flour</option><option value='113'>Rye Bread</option><option value='7'>Salt</option><option value='109'>Soy Flour</option><option value='111'>Wheat Bread</option><option value='112'>Wheat Bread</option><option value='95'>Wheat Flour</option><option value='3'>White Sugar</option><option value='107'>Xanthan Gum</option><option value='86'>Yeast</option><optgroup label='Wet Goods'><option value='136'>Almond Extract</option><option value='88'>Apple Cider Vinegar</option><option value='119'>Beef Stock</option><option value='106'>Buttermilk</option><option value='118'>Chicken Broth</option><option value='92'>Corn Syrup</option><option value='90'>Honey</option><option value='138'>Hot Sauce</option><option value='133'>Ketchup</option><option value='145'>Lemon Juice</option><option value='93'>Maple Syrup</option><option value='94'>Molasses</option><option value='132'>Mustard</option><option value='127'>Red Wine</option><option value='105'>Soy Sauce</option><option value='83'>Tomato Paste</option><option value='142'>Tomato Sauce</option><option value='134'>Unsweetened Cocoa Powder</option><option value='91'>Vanilla</option><option value='117'>Water</option><option value='126'>White Wine</option><option value='87'>White Vinegar</option><option value='89'>Wine Vinegar</option><option value='139'>Worcestershire Sauce</option><optgroup label='Other'><option value='1'>Egg</option><option value='115'>Shortening</option>

                     		</table>
                     		<button type="button" onclick=addIngredient() id="addStepBtn" >Add Ingredient...</button>
      					</div>
    				</div>

    				<div class="row">
      					<div class="col-25">
        					<label for="tags">Tags: </label>
      					</div>
      					<div class="col-75">
        					<select class="chosen-select" id="tags" name="tags[]" multiple data-placeholder="Select tag(s)..." required="">

                     		<?php
                        		$sql = "SELECT * FROM Tag ORDER BY Tag_Type";
                        		$result = mysqli_query($conn, $sql);
                        		if($result->num_rows>0){
                          			while($row = $result->fetch_assoc()){
                            			echo "<option value='".$row["Tag_ID"]."'>".$row["Tag_Type"]."</option>";
                          			}
                        		}
                        	?>

        					</select>
      					</div>
    				</div>

    				<div class="row">
      					<div class="col-25">
       						<label for="time">Total Time: </label>
      					</div>
     					<div class="col-75">
        					<select id="time" name="totaltime" required="">
          					<?php
                     			$sql = "SELECT * FROM Time ORDER BY Time_ID";
                        		$result = mysqli_query($conn, $sql);
                        		if($result->num_rows>0){
                          			while($row = $result->fetch_assoc()){
                            			echo "<option value='".$row["Time_ID"]."'>".$row["Amount"]."</option>";
                          			}
                        		}
                      		?>

        					</select>
      					</div>
    				</div>

    				<div class="row">
      					<div class="col-25">
        					<label for="servings">Servings: </label>
      					</div>
      					<div class="col-75">
        					<input id="servings" type="number" class="number" name="servings" placeholder="0">
        					<span class="error"><p id="servings_error"></p></span>
      					</div>
    				</div>
    			
    				<div class="row">
      					<div class="col-25">
        					<label for="instructions">Instructions: </label>
      					</div>
      					<div class="col-75">
      						<table id="steps">
              					<tr>
                					<td id="step" name="step" class="step">Step 1:</td>
                					<td><textarea id="instruction" type="text" name="steps[]" placeholder="Enter step..." style="height:50px; width: 300px; max-width: 300px;"></textarea></td>
                          <span class="error"><p id="instructions_error"></p></span>
              					</tr>
            				</table>
							<td><button type="button" onclick= addStep() id="addStepBtn" >Add Step...</button></td>
      					</div>
    				</div>

    				<div class="row">
      					<div class="col-25">
        					<label for="uploadphoto">Upload Photo: </label>
      					</div>
      					<div class="col-75">
        					<input id="uploadphoto" type="file" name="photoUpload">
      					</div>
    				</div>
    
    				<div class="row">
      					<input class="submit_btn" type="submit" value="Submit" onclick="validateForm()">
    				</div>

    				<div class="row">
    					<p class="add-meal-modal__reset-fields" onclick="location.reload()"><a>Reset Fields</a></p>
    				</div>
    			</form>
    		</div>	
  		</div>
  	</div>

	
<!-- <script type="text/javascript" src="js/exploreScript.js"></script> -->
<script src="js/add-meal.js"></script>

</body>
</html>
