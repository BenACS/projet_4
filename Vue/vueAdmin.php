<!-- Ajouter un billet -->
<form method="POST" action="index.php?action=nouveauBillet">
    <input type="submit" value="Ajouter un nouveau billet">
</form>
<hr />
<?php foreach ($billets as $billet):
    ?>
    <article>
        <header>
            <!-- Billet -->
            <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
                <h2 class="titreBillet"><?= $billet['titre'] ?></h2>
            </a>
            <p>posté le <?= $billet['date'] ?></p>
        </header>
        <!-- Modifier le billet -->
        <form method="POST" action="<?= "index.php?action=modifBillet&id=" . $billet['id'] ?>">
            <input type="submit" value="Modifier">
        </form>
        <!-- Supprimer le billet -->
        <form method="POST" action="<?= "index.php?action=supprimerBillet&id=" . $billet['id'] ?>">
            <input type="submit" value="Supprimer">
        </form>
    </article>
    <hr />
<?php endforeach; ?>