<!-- formulaire d'accès à l'interface admin -->
<div id="divAccesInterfaceAdmin">
	<div id="popupAdmin">
		<form method="POST" action="index.php?action=connexion">
			<label for="login">Login :</label></br>
			<input type="text" name="login"></br>
			
			<label for="mdp">Mot de passe :</label></br>
			<input type="password" name="mdp"></br>

			<input type="submit" value="Accéder">
		</form>
	</div>

	<button id="boutonPopup" onclick="togglePopup()">Interface administrateur</button>
</div>

<!-- script JS-->
<script src="Vue/js/popupAccesInterfaceAdmin.js"></script>