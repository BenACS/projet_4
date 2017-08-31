<!-- formulaire d'accès à l'interface admin -->
<div id="popupAdmin">
	<form method="POST">
		Veuillez entrer le login et mot de passe afin d'accéder à l'interface d'administration du blog.</br>
		<label for="login">Login</label>
		<input type="text" name="login"></br>
		
		<label for="mdp">Mot de passe</label>
		<input type="password" name="mdp">
	</form>
</div>

<button id="boutonPopup" onclick="afficher_div()">Admin</button>

<!-- script JS-->
<script src="js/popupAccesInterfaceAdmin.js"></script>