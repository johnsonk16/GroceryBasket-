// Get the modal
var modal = document.getElementById("add_meal_modal");

// Get the button that opens the modal
var btn = document.getElementById("add-meal-btn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];



// When the user clicks the button, open the modal 
function addmeal() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

//add another step field
var stepNum=2;
function addStep(){
	var step = document.createElement("tr");
	step.innerHTML= "<td class='step'>Step " + stepNum + ": </td><td><textarea name='steps[]' placeholder='Enter step...' style='height:50px; width: 300px; max-width: 350px; font-size: 14px;'></textarea></td>"

	document.getElementById("steps").appendChild(step);

	stepNum=stepNum+1;
};

//add another ingredient field 
function addIngredient(){
	var ing = document.getElementById("ingredientRow");
	var inside = ing.innerHTML;
	var newIng = document.createElement("tr");
	newIng.innerHTML = inside;
	document.getElementById("ingredients").appendChild(newIng);
}

function validateForm() {
	
}

//submit form 
function submitRecipeForm(){
	document.forms["add-meal-form"].submit();
	
}

function resetform() {
	document.getElementById("add-meal-form").reset();
}

//TODO:
//	1. fix responsive design of modal -- not working
//	2. add function to delete added step/ingredient
//	3. write to database with user's input 
