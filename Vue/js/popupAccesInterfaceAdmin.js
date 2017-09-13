function afficherPopup() {
	document.getElementById('popupAdmin').style.display = "block";
}

function cacherPopup() {
	document.getElementById('popupAdmin').style.display = "none";
}

function msgErreur() {
	var para = document.createElement("p");
	var node = document.createTextNote("Combinaison login / mot de passe invalide.");

	para.appendChild(para);

	var element = document.getElementById("boutonPopup");
	element.appendChild(para);
}

msgErreur();