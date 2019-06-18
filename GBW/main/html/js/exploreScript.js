
//add another step field
var stepNum=2;
function addStep(){
		var step = document.createElement("tr");
		step.innerHTML= "<td class='step'>Step "+stepNum+":</td><td><textarea name='steps[]'></textarea></td>"

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
//submit form 
function submitRecipeForm(){
	document.forms["submitForm"].submit();
	
}