<?php
  require_once('config.php');

  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

	if(!$conn){
   	die('could not connect' . mysqli_error());
  } 
   
    echo 'CONNECTED TO DB';
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
  	
	<title>Grocery Basket</title>
</head>
<body>
	<header class="cd-main-header">
		<div class="cd-main-header__logo"><a href="#0"><img src="img/cd-logo.svg" alt="Logo"></a></div>

		<nav class="cd-main-nav js-main-nav">
			<ul class="cd-main-nav__list js-signin-modal-trigger">
				<li><a class="cd-main-nav__item cd-main-nav__item--home" href="home.html">Home</a></li>
				<li><a class="cd-main-nav__item cd-main-nav__item--meals" href="#1">Meals</a></li>
				<li><a class="cd-main-nav__item cd-main-nav__item--home" href="#1">Basket</a></li>
				<li><a class="cd-main-nav__item cd-main-nav__item--home" href="#1">Favorites</a></li>

				<!-- inser more links here -->
				<li><a class="cd-main-nav__item cd-main-nav__item--signin" href="#0" data-signin="login">Sign in</a></li>
				<li><a class="cd-main-nav__item cd-main-nav__item--signup" href="#0" data-signin="signup">Sign up</a></li>
			</ul>
		</nav>
	</header>

	<div class="cd-intro">
		<h1>Explore</h1>
		<div class="cd-nugget-info">
		
		<form id="submitForm" action="uploadRecipe.php" method="post" enctype="multipart/form-data">
        

            <table id="displayRecipe">
                <tr>
                  <td class="label">Recipe Name:</td>
                  <td><input type="text" id="textBar" name="name" placeholder="Enter recipe name..." autofocus required></td>
                </tr>
 
                <tr>
                  <td class="label">Ingredients:</td>
                  <td>
                    <table id="ingredients"> 
                      <tr id="ingredientRow">
                        <td class="measurement"><input type="text" class="number" name="measurements[]" placeholder="(ex. 2 cups)"></td>
                      </table>
                    </td>
                </tr>

                <tr>
					      <td class="label"></td>
				      	<td><button type="button" onclick=addIngredient() id="addStepBtn" >Add Ingredient...</button></td>
				        </tr>

                <tr>
                  <td class="label">Tags: </td>
                  <td><select class="chosen-select" name="tags[]" id="tags" multiple data-placeholder="Select tag(s)...">
                  <?php
                        $sql = "SELECT * FROM Tag ORDER BY Tag_Type";
                        $result = mysqli_query($conn, $sql);
                        if($result->num_rows>0){
                          while($row = $result->fetch_assoc()){
                            echo "<option value='".$row["Tag_ID"]."'>".$row["Tag_Type"]."</option>";
                          }
                        }

                      ?>
                  </select></td>
                </tr>

                <tr>
                  <td class="label">Total Time:</td>
                  <td><select name="time">
                  <?php
                        $result = mysqli_query($conn, $sql);
                        if($result->num_rows>0){
                          while($row = $result->fetch_assoc()){
                            echo "<option value='".$row["Time_ID"]."'>".$row["Amount"]."</option>";
                          }
                        }
                      ?>
                  </select></td>
                </tr>
				
				<tr>
            <td class="label">Servings:</td>
            <td><input type="number" class="number" name="servings" placeholder="0"></td>
        </tr>
				
				<tr>
          <td class="label">Instructions:</td>
		<td>
            <table id="steps">
              <tr>
                <td class="step">Step 1:</td>
                <td><textarea name='steps[]'></textarea></td>
              </tr>
            </table>
         </td>
				</tr>
				
				<tr>
					<td class="label"></td>
					<td><button type="button" onclick= addTextArea() id="addStepBtn" >Add Step...</button></td>
				</tr>
				
				<tr>
					<td class="label">Upload a Photo:</td>
					<td><input type="file" name="photoUpload"></td>
				</tr>

                <tr>
                  <td colspan="2" style="text-align:center;">
                    <button onclick="submitRecipeForm" class="formButton">Submit Recipe</button>
                    <button class="formButton" onclick="location.reload()">Reset Fields</button>
                  </td>
                </tr>
              </table>
        </form>

		</div> <!-- cd-nugget-info -->
	</div>

	<div class="cd-signin-modal js-signin-modal"> <!-- this is the entire modal form, including the background -->
		<div class="cd-signin-modal__container"> <!-- this is the container wrapper -->
			<ul class="cd-signin-modal__switcher js-signin-modal-switcher js-signin-modal-trigger">
				<li><a href="#0" data-signin="login" data-type="login">Sign in</a></li>
				<li><a href="#0" data-signin="signup" data-type="signup">New account</a></li>
			</ul>

			<div class="cd-signin-modal__block js-signin-modal-block" data-type="login"> <!-- log in form -->
				<form class="cd-signin-modal__form">
					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--email cd-signin-modal__label--image-replace" for="signin-email">E-mail</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="signin-email" type="email" placeholder="E-mail">
						<span class="cd-signin-modal__error">Error!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace" for="signin-password">Password</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="signin-password" type="text"  placeholder="Password">
						<a href="#0" class="cd-signin-modal__hide-password js-hide-password">Hide</a>
						<span class="cd-signin-modal__error">Error!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<input type="checkbox" id="remember-me" checked class="cd-signin-modal__input ">
						<label for="remember-me">Remember me</label>
					</p>

					<p class="cd-signin-modal__fieldset">
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width" type="submit" value="Login">
					</p>
				</form>
				
				<p class="cd-signin-modal__bottom-message js-signin-modal-trigger"><a href="#0" data-signin="reset">Forgot your password?</a></p>
			</div> <!-- cd-signin-modal__block -->

			<div class="cd-signin-modal__block js-signin-modal-block" data-type="signup"> <!-- sign up form -->
				<form class="cd-signin-modal__form">
					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--username cd-signin-modal__label--image-replace" for="signup-username">Username</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="signup-username" type="text" placeholder="Username">
						<span class="cd-signin-modal__error">Error!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--email cd-signin-modal__label--image-replace" for="signup-email">E-mail</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="signup-email" type="email" placeholder="E-mail">
						<span class="cd-signin-modal__error">Error!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace" for="signup-password">Password</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="signup-password" type="text"  placeholder="Password">
						<a href="#0" class="cd-signin-modal__hide-password js-hide-password">Hide</a>
						<span class="cd-signin-modal__error">Error!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<input type="checkbox" id="accept-terms" class="cd-signin-modal__input ">
						<label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
					</p>

					<p class="cd-signin-modal__fieldset">
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding" type="submit" value="Create account">
					</p>
				</form>
			</div> <!-- cd-signin-modal__block -->

			<div class="cd-signin-modal__block js-signin-modal-block" data-type="reset"> <!-- reset password form -->
				<p class="cd-signin-modal__message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

				<form class="cd-signin-modal__form">
					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--email cd-signin-modal__label--image-replace" for="reset-email">E-mail</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="reset-email" type="email" placeholder="E-mail">
						<span class="cd-signin-modal__error">Error!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding" type="submit" value="Reset password">
					</p>
				</form>

				<p class="cd-signin-modal__bottom-message js-signin-modal-trigger"><a href="#0" data-signin="login">Back to log-in</a></p>
			</div> <!-- cd-signin-modal__block -->
			<a href="#0" class="cd-signin-modal__close js-close">Close</a>
		</div> <!-- cd-signin-modal__container -->
	</div> <!-- cd-signin-modal -->
<script src="js/placeholders.min.js"></script> <!-- polyfill for the HTML5 placeholder attribute -->
<script src="js/main.js"></script> <!-- Resource JavaScript -->
</body>
</html>