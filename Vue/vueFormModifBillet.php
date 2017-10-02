<form id="formModifBillet" method="POST" action="index.php?action=modifierBillet">
	<input type="hidden" name="id" value="<?= $_GET['id'] ?>">

	<label for="titre">Titre du billet :</label></br>
	<input type="text" name="titre" value="<?= htmlspecialchars($billet['titre']) ?>" ></br></br>

	<label for="contenu">Contenu du billet :</label></br>
	<textarea name="contenu" id="divTinyMCE"><?= htmlspecialchars($billet['contenu']) ?></textarea></br>

	<input type="submit" value="Modifier ce billet">
</form>