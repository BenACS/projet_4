<!-- formulaire d'accès à l'interface admin -->
<div id="popupAdmin">
	<form method="POST" action="index.php?action=connexion">
		Veuillez vous connecter afin d'accéder à l'interface d'administration du blog.</br>
		<label for="login">Login :</label></br>
		<input type="text" name="login"></br>
		
		<label for="mdp">Mot de passe :</label></br>
		<input type="password" name="mdp"></br>

		<input type="submit" value="Accéder">
	</form>
</div>

<button id="boutonPopup" onclick="afficherPopup()">Interface administrateur</button>

<!-- script JS-->
<script src="Vue/js/popupAccesInterfaceAdmin.js"></script>