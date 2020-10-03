function printError(message){
	var newItem = document.createElement("p");
	var textnode = document.createTextNode(message);
	newItem.appendChild(textnode);  

	var nodeUnder = document.getElementById("nodeUnderErrorMessage");
	nodeUnder.insertBefore(newItem, nodeUnder.childNodes[0]);
}

function addMailToField(message){
	document.getElementById('email').value = message;
}