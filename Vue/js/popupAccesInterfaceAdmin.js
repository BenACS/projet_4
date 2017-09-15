var popup = document.getElementById('popupAdmin');

/* Si le formulaire de connexion est déjà affiché, alors cliquer sur le bouton
cachera le formulaire. Si le formulaire n'est pas affiché, alors cliquer sur le
bouton affichera le formulaire de connexion */
function togglePopup() {
	if (popup.style.display == "block") {
		popup.style.display = "none";
	}
	else {
		popup.style.display = "block";
	}
}