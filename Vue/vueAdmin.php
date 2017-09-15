<?php foreach ($billets as $billet):
    ?>
    <article>
        <header>
			<form id="formAdmin" method="POST" action="index.php?action=admin">
				<input type="hidden" name="idActuel" value="<?= $billet['id'] ?>">
				<input type="submit" name="action" value="supprimer">
			</form>
			<button onclick="toggleTinyMCE()">Modifier</button>
            <!-- Billet -->
            <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
                <h2 class="titreBillet"><?= $billet['titre'] ?></h2>
            </a>
            <p>posté le <?= $billet['date'] ?></p>
        </header>
        <p><?= $billet['contenu'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>