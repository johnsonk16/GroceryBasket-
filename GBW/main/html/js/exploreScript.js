
// //add another step field
// var stepNum=2;
// function addStep(){
// 	var step = document.createElement("tr");
// 	step.innerHTML= "<td class='step'>Step " + stepNum + ": </td><td><textarea name='steps[]' placeholder='Enter step...' style='height:50px; width: 300px; max-width: 350px; font-size: 14px;'></textarea></td>"

// 	document.getElementById("steps").appendChild(step);

// 	stepNum=stepNum+1;
// };

// //add another ingredient field 
// function addIngredient(){
// 	var ing = document.getElementById("ingredientRow");
// 	var inside = ing.innerHTML;
// 	var newIng = document.createElement("tr");
// 	newIng.innerHTML = inside;
// 	document.getElementById("ingredients").appendChild(newIng);
// }

// //submit form 
// function submitRecipeForm(){
// 	document.forms["add-meal-form"].submit();
	
// }

// function resetform() {
// 	document.getElementById("add-meal-form").reset();
// }

//TODO:
//	1. fix responsive design of modal -- not working
//	2. add function to delete added step/ingredient
//	3. write to database with user's input